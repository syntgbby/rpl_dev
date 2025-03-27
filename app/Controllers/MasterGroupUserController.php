<?php

namespace App\Controllers;

class MasterGroupUserController extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_user")->get()->getResultArray();
        $data = [
            'data' => $query
        ];
        return $this->render('MasterGroupUser/master_group_user', $data);
    }

    public function indexAdd()
    {
        return $this->render('MasterGroupUser/add_group_user');
    }

    public function getById($rowid)
    {
        $db = \Config\Database::connect();
        // Gunakan query builder atau parameterized query untuk menghindari SQL Injection
        $query = $db->table("master_user")->where("rowid", $rowid)->get()->getResultArray();

        if ($query) {
            return $this->response->setJSON($query);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    }

    public function store()
    {
        $data = $this->request->getVar();
        $db = \Config\Database::connect();

        $rowid = $data['rowid'];
        $group_cd = $data['group_cd'];
        $descs = $data['descs'];
        $status = $data['status'];

        date_default_timezone_set('Asia/Jakarta');
        $data_date = date('Y-m-d H:i:s');

        $data_insert = [
            'group_cd' => $group_cd,
            'descs' => $descs,
            'status' => $status,
            'data_date' => $data_date
        ];

        if ($rowid == 0) {
            $query = $db->table("master_user")->insert($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Master User added successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Master User added failed'
                ];
                return $this->response->setJSON($response);
            }
        } else {
            $query = $db->table('master_user')->where('rowid', $rowid)->update($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Master User updated successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Master User updated failed'
                ];
                return $this->response->setJSON($response);
            }
        }

        return redirect()->to('/master-group-user');
    }

    public function delete()
    {
        $data = $this->request->getVar();
        $rowid = $data['rowid'];

        $db = \Config\Database::connect();
        
        $query = $db->table("master_user")->where("rowid", $rowid)->delete();

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Master User deleted successfully'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Master User deleted failed'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->to('/master-group-user');
    }

}
