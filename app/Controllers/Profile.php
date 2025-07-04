<?php

namespace App\Controllers;

use App\Models\{UserModel, DetailAplikanModel, DetailAsesorModel};
use App\Models\View\{ViewAplikan, ViewAsesor};

class Profile extends BaseController
{
    public function indexEdit()
    {
        $email = session()->get('email');
        $role = session()->get('role');
        $detailAplikan = new ViewAplikan();
        $detailAsesor = new ViewAsesor();

        if ($role == 'aplikan') {
            // Ambil data user berdasarkan email
            $query = $detailAplikan->where('email', $email)->first();

            if (!$query) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
            }
            return $this->render('Aplikan/editprofile', ['get' => $query]);
        } else if ($role == 'asesor') {
            // Ambil data user berdasarkan email
            $query = $detailAsesor->where('email', $email)->first();

            if (!$query) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan.");
            }
            // dd($query);
            return $this->render('Asesor/editprofile', ['get' => $query]);
        }
    }

    public function update()
    {
        try {
            $detailAplikan = new DetailAplikanModel();
            $detailAsesor = new DetailAsesorModel();
            $userModel = new userModel();

            $role = session()->get('role');
            $email = session()->get('email');

            // Ambil data user dulu
            $user = $userModel->where('email', $email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            if ($role == 'aplikan') {
                $cekDetail = $detailAplikan->where('email', $email)->first();

                if ($cekDetail) {
                    // Data untuk update
                    $updateDataDetailAplikan = [
                        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                        'telepon' => $this->request->getPost('telepon'),
                        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                        'agama' => $this->request->getPost('agama'),
                    ];

                    $update = $detailAplikan->where('email', $email)->set($updateDataDetailAplikan)->update();

                    if ($update) {
                        $updateUser = [
                            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                        ];

                        $userModel->where('email', $email)->set($updateUser)->update();

                        return redirect()->to('/dashboard')->with('success', 'Profile berhasil diupdate');
                    } else {
                        return redirect()->back()->with('error', 'Profile gagal diupdate');
                    }
                }
            } else if ($role == 'asesor') {
                $cekDetail = $detailAsesor->where('email', $email)->first();
                $nama = $cekDetail['nama_lengkap'];
                $formatNama = str_replace(' ', '-', $nama);

                // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
                $validationRule = [
                    'file_sk' => [
                        'label' => 'File Bukti',
                        'rules' => 'uploaded[file_sk]|ext_in[file_sk,pdf,jpg,jpeg,png]|max_size[file_sk,2048]',
                    ],
                ];

                // Validasi input
                if (!$this->validate($validationRule)) {
                    return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                }

                // Handle file upload
                $fileBukti = $this->request->getFile('file_sk');

                if ($fileBukti->isValid() && !$fileBukti->hasMoved()) {
                    // Generate nama unik untuk file
                    $fileName = $fileBukti->getRandomName();
                    $uploadPath = FCPATH . 'uploads/bukti_sk/' . $formatNama;

                    // Buat direktori jika belum ada
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }

                    // Pindahkan file ke direktori
                    $fileBukti->move($uploadPath, $fileName);
                    $filePath = base_url('uploads/bukti_sk/' . $formatNama . '/' . $fileName);

                    // Hapus file lama jika ada
                    if ($cekDetail && !empty($cekDetail['file_bukti'])) {
                        $oldFilePath = FCPATH . 'uploads/bukti_sk/' . $formatNama . '/' . basename($cekDetail['file_bukti']);
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                }

                if ($cekDetail) {
                    $updateDataDetailAsesor = [
                        'nip_nidn' => $this->request->getPost('nip_nidn'),
                        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                        'pangkat_golongan' => $this->request->getPost('pangkat_golongan'),
                        'jabatan' => $this->request->getPost('jabatan'),
                        'bidang_ilmu_keahlian' => $this->request->getPost('bidang_ilmu_keahlian'),
                        'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                        'telepon' => $this->request->getPost('telepon'),
                        'alamat' => $this->request->getPost('alamat'),
                    ];

                    // Tambahkan path file jika ada upload baru
                    if ($filePath) {
                        $updateDataDetailAsesor['file_bukti'] = $filePath;
                    }

                    $update = $detailAsesor->where('email', $email)->set($updateDataDetailAsesor)->update();

                    if ($update) {
                        $updateUser = ['nama_lengkap' => $this->request->getPost('nama_lengkap')];
                        $userModel->where('email', $email)->set($updateUser)->update();
                        return redirect()->to('/dashboard')->with('success', 'Profile berhasil diupdate');
                    } else {
                        return redirect()->back()->with('error', 'Profile gagal diupdate');
                    }
                }
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

    public function updatePassword()
    {
    }
}
