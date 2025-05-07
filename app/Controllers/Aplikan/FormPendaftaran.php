<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;
helper('text');

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
        $db = \Config\Database::connect();
        $builderForm = $db->table('form_rpl');
        $builderPelatihan = $db->table('pelatihan_users');
        $builderPengalaman = $db->table('pengalaman_rpl');
        $builderWorkDtl = $db->table('pengalaman_kerja_dtl');

        date_default_timezone_set('Asia/Jakarta');
        $form_id = 'FRPL' . date('Ym') . random_string('numeric', 3);

        // Data utama untuk form_rpl
        $data_insert_form = [
            'form_id' => $form_id,
            'nama' => $data['name'],
            'email' => $data['email'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'provinsi' => $data['provinsi'],
            'kota' => $data['kota'],
            'pendidikan_terakhir' => $data['riwayat_pendidikan'],
            'tempat_pendidikan' => $data['tempat_pendidikan'],
            'nama_company' => $data['nama_company'],
            'alamat_company' => $data['alamat_company'],
            'kota_company' => $data['kota_company'],
            'provinsi_company' => $data['provinsi_company'],
            'negara_company' => $data['negara_company'],
            'kode_pos_company' => $data['kode_pos_company'],
            'hp_company' => $data['hp_company'],
            'lama_kerja' => $data['lama_kerja'],
            'start_work' => $data['start_work'],
            'end_work' => $data['end_work'],
            'nama_pihak_company' => $data['nama_pihak_company'],
            'telp_pihak_company' => $data['hp_pihak_company'],
            'tahun_angkatan' => date('Y'),
            'upload_status' => '1',
            'audit_date' => date('Y-m-d H:i:s'),
        ];

        // Insert ke form_rpl
        $insert_form = $builderForm->insert($data_insert_form);

        if($insert_form) {
            // ---------- INSERT WORK DETAIL ----------
            for ($i = 1; $i <= 3; $i++) {
                $posisi = $data["posisi_$i"];
                $lamawaktu = $data["lamawaktu_$i"];
    
                if (!empty($posisi) && !empty($lamawaktu)) {
                    $builderWorkDtl->insert([
                        'form_id' => $form_id,
                        'email' => $data['email'],
                        'posisi' => $posisi,
                        'lama_waktu' => $lamawaktu
                    ]);
                }
            }
    
            // ---------- INSERT PELATIHAN ----------
            if (!empty($data['pelatihan'])) {
                $pelatihan = json_decode($data['pelatihan'], true); // pastikan ini dikirim sebagai JSON string
    
                foreach ($pelatihan as $row) {
                    $builderPelatihan->insert([
                        'form_id' => $form_id,
                        'nama_pelatihan' => $row['nama_pelatihan'],
                        'penyelenggara' => $row['penyelenggara'],
                        'peran_serta' => $row['peran_serta'],
                        'durasi' => $row['durasi'],
                        'nomor_sertifikat' => $row['no_sertifikat'],
                        'tahun_pelatihan' => $row['tahun_pelatihan'],
                    ]);
                }
            }

            $response = [
                'status' => 'success',
                'message' => 'Form RPL added successfully'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Form RPL added failed'
            ];
            return $this->response->setJSON($response);
        }
    }

    public function storeFile()
    {
        $data = $this->request->getVar();
        $db = \Config\Database::connect();
        $builderPengalaman = $db->table('pengalaman_rpl');
        
    }
}
