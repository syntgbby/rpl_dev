<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index($email)
    {
        $session = \config\Services::session();
        $email = $session->get('email');

        $db = \config\Database::connect();
        $query = $db->query("SELECT * FROM users WHERE email = '$email'");
        $get = $query->getRowArray();

        return $this->render('Aplikan/editprofile', ['get' => $get]);
    }
    public function indexEdit($hashEmail)
    {
        $email = base64_decode($hashEmail);
        $db = \config\Database::connect();
        $query = $db->query("SELECT * FROM users WHERE email = '$email'")->getResultArray();

        return $this->render('Aplikan/editprofile', ['get' => $query]);
    }
    
    public function getById($email)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM users");
        // Gunakan query builder atau parameterized query untuk menghindari SQL Injection
        $query = $db->query("SELECT * FROM users WHERE email = :email:", ['email' => $email]);
        $get = $query->getResultArray();

        if ($get) {
            return $this->response->setJSON($get);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Menu not found']);
        }
    }

    public function updateProfile()
    {
        try {
            $db = \Config\Database::connect();
            $data = $this->request->getPost();

            $email = session()->get('email');
            $get_groupcd = session()->get('group_cd');
            $name = ucwords(strtolower($data['name']));
            $tempat_lahir = ucwords(strtolower($data['tempat_lahir']));
            $tanggal_lahir = $data['tanggal_lahir'];
            $telepon = $data['telepon'];
            $jenis_kelamin = $data['jenis_kelamin'];
            $agama = $data['agama'];
            
            // Data untuk update
            $data = [
                'name' => $name,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'telepon' => $telepon,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
            ];

            if ($get_groupcd == 'ASR') {
                $path = 'uploads/profile/asesor/';
            } else if ($get_groupcd == 'ADM') {
                $path = 'uploads/profile/admin/';
            } else {
                $path = 'uploads/profile/aplikan/';
            }

            // Handle file upload
            $pict = $this->request->getFile('pict');

            if ($pict && $pict->isValid()) {
                $extension = $pict->getExtension();
                $pict_name = $name . '.' . $extension;
                $pict->move(FCPATH . $path, $pict_name);

                $data['pict'] = base_url($path . $pict_name);
            }

            // Update data
            $db->table('users')
            ->where('email', $email)
            ->update($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Profile updated successfully'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function updateEmail()
    {
        try {
            $db = \Config\Database::connect();
            $data = $this->request->getPost();
            dd($data);

            $email = session()->get('email');
            $emailaddress = $data['emailaddress'];
            $confirmemailpassword = $data['confirmemailpassword'];

            if ($emailaddress == $email) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Email tidak boleh sama dengan email sebelumnya'
                ]);
            }

            $passHash = strtoupper(md5(strtoupper(md5($emailaddress)) . 'P@ssw0rd' . $confirmemailpassword));
            
            $dt_update = [
                'email' => $emailaddress,
                'pass_hash' => $passHash
            ];

            $update = $db->table('users')
            ->where('email', $email)
            ->update($dt_update);

            if ($update) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Email berhasil diupdate'
                ]);
                
                $session = session();
                $session->remove('is_login');
                $session->destroy();
                return redirect()->to('/')->with('alert', 'Silahkan login kembali dengan email baru!');
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Email gagal diupdate'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }   
    }
    
}
