<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;

class FormPendaftaran extends BaseController
{
    public function index(): string
    {
        return $this->render('Aplikan/FormPendaftaran/form_regist');
    }

    public function addPK()
    {
        return $this->render('Aplikan/FormPendaftaran/Steps/add-pk');
    }

    public function store()
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
