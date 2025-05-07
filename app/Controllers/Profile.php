<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function indexEdit($hashEmail)
    {
        $email = base64_decode($hashEmail);
        $users = new UserModel();

        // Ambil data user berdasarkan email
        $query = $users->where('email', $email)->first();
        // dd($query);

        if (!$query) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
        }

        return $this->render('Aplikan/editprofile', ['get' => $query]);
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