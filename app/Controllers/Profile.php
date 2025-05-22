<?php

namespace App\Controllers;

use App\Models\{UserModel, DetailAplikanModel};

class Profile extends BaseController
{
    public function indexEdit()
    {
        $email = session()->get('email');
        $role = session()->get('role');
        $detailAplikan = new DetailAplikanModel();

        if ($role == 'aplikan') {
            // Ambil data user berdasarkan email
            $query = $detailAplikan->where('email', $email)->first();

            if (!$query) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
            }
            return $this->render('Aplikan/editprofile', ['get' => $query]);
        } else if ($role == 'asesor') {
            // Ambil data user berdasarkan email
            $query = $detailAplikan->where('email', $email)->first();

            if (!$query) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
            }
            return $this->render('Asesor/editprofile', ['get' => $query]);
        }
    }

    public function update()
    {
        try {
            $detailAplikan = new DetailAplikanModel();

            $role = session()->get('role');
            $email = session()->get('email');

            // Ambil data user dulu
            $user = $detailAplikan->where('email', $email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            if ($role == 'aplikan') {
                // Data untuk update
                $updateDataDetailAplikan = [
                    'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                    'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                    'telepon'        => $this->request->getPost('telepon'),
                    'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                    'agama'          => $this->request->getPost('agama'),
                ];

                $update = $detailAplikan->where('email', $email)->set($updateDataDetailAplikan)->update();

                if ($update) {
                    return redirect()->to('/dashboard')->with('success', 'Profile berhasil diupdate');
                } else {
                    return redirect()->back()->with('error', 'Profile gagal diupdate');
                }
            } else if ($role == 'asesor') {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengubah profile');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
