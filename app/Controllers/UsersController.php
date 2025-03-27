<?php

namespace App\Controllers;

class UsersController extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $query = $db->table("users")->get()->getResultArray();
        $data = [
            'data' => $query
        ];
        return $this->render('Users/master_users', $data);
    }

    public function indexAdd()
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_user")->get()->getResultArray();
        $data = [
            'group' => $query
        ];
        return $this->render('Users/add_user', $data);
    }

    public function getById($rowid)
    {
        $db = \Config\Database::connect();
        // Gunakan query builder atau parameterized query untuk menghindari SQL Injection
        $query = $db->table("users")->where("rowid", $rowid)->get()->getResultArray();

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
        $name = $data['name'];
        $group_cd = $data['group_cd'];
        $email = $data['email'];
        $status = $data['status'];

        date_default_timezone_set('Asia/Jakarta');
        $data_date = date('Y-m-d H:i:s');

        $data_insert = [
            'name' => $name,
            'group_cd' => $group_cd,
            'email' => $email,
            'status' => $status,
            'data_date' => $data_date
        ];

        if ($rowid == 0) {
            $query = $db->table("users")->insert($data_insert);

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
            $dt_update = [
                'group_cd' => $group_cd,
                'name' => $name,
                'email' => $email,
                'status' => $status,
                'data_date' => $data_date
            ];

            $query = $db->table('users')->where('rowid', $rowid)->update($dt_update);

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
        
        $query = $db->table("users")->where("rowid", $rowid)->delete();

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

        return redirect()->to('/users');
    }

}
