<?php

namespace App\Controllers;

class RegisterUsersController extends BaseController
{
    public function index(): string
    {
        return $this->render('RegisterUsers/form_regist');
    }

    public function indexAdd()
    {
        return $this->render('MasterUser/add_user');
    }

    public function getById($rowid)
    {
        $db = \Config\Database::connect();
        // Gunakan query builder atau parameterized query untuk menghindari SQL Injection
        $query = $db->query("SELECT * FROM master_user WHERE rowid = :rowid:", ['rowid' => $rowid]);
        $get = $query->getResultArray();

        if ($get) {
            return $this->response->setJSON($get);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    }

    public function add()
    {
        $data = $this->request->getVar();

        $rowid = $data['rowid'];
        $group_cd = $data['group_cd'];
        $descs = $data['descs'];
        $status = $data['status'];

        if ($rowid == 0) {
            $db = \Config\Database::connect();
            $query = $db->query("INSERT INTO master_user (group_cd, descs, status) VALUES ('$group_cd', '$descs', '$status')");

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'User added successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'User added failed'
                ];
                return $this->response->setJSON($response);
            }
        } else {
            $db = \Config\Database::connect();

            $dt_update = [
                'group_cd' => $group_cd,
                'descs' => $descs,
                'status' => $status
            ];

            $query = $db->table('master_user')->where('rowid', $rowid)->update($dt_update);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'User updated successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'User updated failed'
                ];
            }
        }
    }

    public function delete()
    {
        $data = $this->request->getVar();
        $rowid = $data['rowid'];

        $db = \Config\Database::connect();
        
        $query = $db->query("DELETE FROM master_user WHERE rowid = '$rowid'");

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'User deleted successfully'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'User deleted failed'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->to('/master-user');
    }

}
