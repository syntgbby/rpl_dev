<?php

namespace App\Controllers;

class MasterMatkulController extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_matkul")->get()->getResultArray();

        $data = [
            'data' => $query
        ];

        return $this->render('MasterMatkul/master_matkul', $data);
    }

    public function indexAdd()
    {
        return $this->render('MasterMatkul/add_matkul');
    }

    public function getById($rowid)
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_matkul")->where("rowid", $rowid)->get()->getResultArray();

        if ($query) {
            return $this->response->setJSON($query);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Matkul not found']);
        }
    }

    public function store()
    {
        $data = $this->request->getVar();
        $db = \Config\Database::connect();

        $rowid = $data['rowid'];
        $matkul_cd = $data['matkul_cd'];
        $matkul_descs = $data['matkul_descs'];
        $status = $data['status'];

        date_default_timezone_set('Asia/Jakarta');
        $data_date = date('Y-m-d H:i:s');

        $data_insert = [
            'matkul_cd' => $matkul_cd,
            'matkul_descs' => $matkul_descs,
            'status' => $status,
            'data_date' => $data_date
        ];

        if ($rowid == 0) {
            $query = $db->table("master_matkul")->insert($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Mata Kuliah added successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Mata Kuliah added failed'
                ];
                return $this->response->setJSON($response);
            }
        } else {
            $query = $db->table("master_matkul")->where("rowid", $rowid)->update($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Mata Kuliah updated successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Mata Kuliah updated failed'
                ];
                return $this->response->setJSON($response);
            }
        }

        return redirect()->to('/master-matkul');
    }

    public function delete()
    {
        $data = $this->request->getVar();
        $rowid = $data['rowid'];

        $db = \Config\Database::connect();
        
        $query = $db->table("master_matkul")->where("rowid", $rowid)->delete();

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Mata Kuliah deleted successfully'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Mata Kuliah deleted failed'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->to('/master-matkul');
    }

}
