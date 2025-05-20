<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function indexEdit()
    {
        $email = session()->get('email');
        $users = new UserModel();

        // Ambil data user berdasarkan email
        $query = $users->where('email', $email)->first();

        if (!$query) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
        }

        return $this->render('Aplikan/editprofile', ['get' => $query]);
    }

    public function update()
    {
        try {
            $users = new UserModel();

            $role = session()->get('role');
            $email = session()->get('email');

            // Ambil data user dulu
            $user = $users->where('email', $email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            // Data untuk update
            $updateData = [
                'username'       => $this->request->getPost('name'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'telepon'        => $this->request->getPost('telepon'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'agama'          => $this->request->getPost('agama'),
            ];

            // Handle file upload jika ada
            $pict = $this->request->getFile('pict');
            if ($pict && $pict->isValid() && !$pict->hasMoved()) {
                $path = 'uploads/profile/' . $role;

                // Pastikan direktori ada
                if (!is_dir(FCPATH . $path)) {
                    mkdir(FCPATH . $path, 0777, true);
                }

                // Bikin nama file unik
                $extension = $pict->getExtension();
                $pict_name = $this->request->getPost('name') . '_' . time() . '.' . $extension;

                $checkfoto = FCPATH . $path . '/' . $pict_name;
                if (file_exists($checkfoto)) {
                    unlink($checkfoto);
                }
                $pict->move(FCPATH . $path, $pict_name);

                // Simpan URL pict
                $updateData['pict'] = base_url($path . '/' . $pict_name);
            } else {
                // Jika tidak upload gambar, tetap pakai yang lama
                $updateData['pict'] = $user['pict'];
            }

            // Update data
            $update = $users->where('email', $email)->set($updateData)->update();

            if ($update) {
                return redirect()->to('/dashboard')->with('success', 'Profile berhasil diupdate');
            } else {
                return redirect()->back()->with('error', 'Profile gagal diupdate');
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
