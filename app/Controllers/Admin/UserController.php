<?php

namespace App\Controllers\Admin;

use App\Models\{UserModel, PendaftaranModel, BuktiPendukungModel, KonfirmasiStepModel, PelatihanModel, PengalamanKerjaModel, TimelineModel, DetailAsesorModel};
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        return $this->render('Admin/Users/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/Users/form');
    }

    public function store()
    {
        $model = new UserModel();
        $modelDetailAsesor = new DetailAsesorModel();

        $datas = $this->request->getPost();

        $email = strtolower($datas['email']);
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $datas['password']));
        $role = $datas['role'];
        $status = $datas['status'];

        $checkEmail = $model->where('email', $email)->first();

        if ($checkEmail) {
            return redirect()->to('/admin/users/create')->with('error', 'Email sudah terdaftar!');
        } else {
            if ($role == 'asesor') {
                $username = ucwords($datas['nama_lengkap']);

                $data = [
                    'email' => $email,
                    'password' => $passHash,
                    'role' => $role,
                    'status' => $status,
                ];

                $modelDetailAsesor->insert([
                    'email' => $email,
                    'nama_lengkap' => $username,
                ]);
            } else {
                $data = [
                    'email' => $email,
                    'password' => $passHash,
                    'role' => $role,
                    'status' => $status,
                ];
            }

            $insert = $model->save($data);

            if ($insert) {
                return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan!');
            } else {
                return redirect()->to('/admin/users/create')->with('error', 'User gagal ditambahkan!');
            }
        }
    }

    public function edit($id)
    {
        $model = new UserModel();
        $modelDetailAsesor = new DetailAsesorModel();

        $data['dtuser'] = $model->find($id);
        $data['dtasesor'] = $modelDetailAsesor->where('email', $data['dtuser']['email'])->first();

        return $this->render('Admin/Users/form', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $modelDetailAsesor = new DetailAsesorModel();
        $datas = $this->request->getPost();

        $email = strtolower($datas['email']);
        $role = $datas['role'];
        $status = $datas['status'];

        $data = [
            'email' => $email,
            'role' => $role,
            'status' => $status,
        ];

        if ($role == 'asesor') {
            $nama = ucwords($datas['nama_lengkap']);
            $modelDetailAsesor->updateAsesor($datas['email'], $nama);
        }

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/users')->with('success', 'Data User berhasil diubah!');
        } else {
            return redirect()->to('/admin/users')->with('error', 'Data User gagal diubah!');
        }
    }

    public function delete($id)
    {
        $model = new UserModel();
        $modelPendaftaran = new PendaftaranModel();
        $modelBuktiPendukung = new BuktiPendukungModel();
        $modelKonfirmasiStep = new KonfirmasiStepModel();
        $modelPelatihan = new PelatihanModel();
        $modelPengalamanKerja = new PengalamanKerjaModel();
        $modelTimeline = new TimelineModel();
        $email = $model->find($id)['email'];

        $checkPendaftaran = $modelPendaftaran->where('email', $email)->first();

        if ($checkPendaftaran) {
            $idPendaftaran = $checkPendaftaran['pendaftaran_id'];
            $modelBuktiPendukung->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelKonfirmasiStep->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPelatihan->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPengalamanKerja->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelTimeline->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPendaftaran->delete($idPendaftaran);
            $delete = $model->delete($id);
        } else {
            $delete = $model->delete($id);
        }

        if ($delete) {
            return redirect()->to('/admin/users')->with('success', 'User berhasil dihapus!');
        } else {
            return redirect()->to('/admin/users')->with('error', 'User gagal dihapus!');
        }
    }

    public function deactivate($id)
    {
        $model = new UserModel();

        $deactivate = $model->update($id, ['status' => 'N']);

        if ($deactivate) {
            return redirect()->to('/admin/users')->with('success', 'User berhasil dinonaktifkan!');
        } else {
            return redirect()->to('/admin/users')->with('error', 'User gagal dinonaktifkan!');
        }
    }
}
