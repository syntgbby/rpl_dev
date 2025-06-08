<?php

namespace App\Controllers\Admin;

use App\Models\{UserModel, DetailAplikanModel, PendaftaranModel, BuktiPendukungModel, KonfirmasiStepModel, PelatihanModel, PengalamanKerjaModel, TimelineModel, ApprovalRplModel, CapaianDtl};
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model
            ->whereIn('role', ['kaprodi', 'asesor'])
            ->findAll();

        return $this->render('Admin/Users/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/Users/form');
    }

    public function store()
    {
        $model = new UserModel();

        $datas = $this->request->getPost();

        $email = strtolower($datas['email']);
        $nama_lengkap = strtolower($datas['nama_lengkap']);
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $datas['password']));
        $role = $datas['role'];
        $status = $datas['status'];

        $checkEmail = $model->where('email', $email)->first();

        if ($checkEmail) {
            return redirect()->to('/admin/users/create')->with('error', 'Email sudah terdaftar!');
        } else {
            $data = [
                'email' => $email,
                'nama_lengkap' => $nama_lengkap,
                'password' => $passHash,
                'role' => $role,
                'status' => $status,
            ];

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

        $data['dtuser'] = $model->find($id);

        return $this->render('Admin/Users/form', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $datas = $this->request->getPost();

        $nama_lengkap = $datas['nama_lengkap'];
        $email = strtolower($datas['email']);
        $role = $datas['role'];
        $status = $datas['status'];

        $data = [
            'email' => $email,
            'nama_lengkap' => $nama_lengkap,
            'role' => $role,
            'status' => $status,
        ];

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
        $modelApproval = new ApprovalRplModel();
        $modelCapaianDtl = new CapaianDtl();
        $modelDetailAplikan = new DetailAplikanModel();
        $modelPendaftaran = new PendaftaranModel();
        $modelBuktiPendukung = new BuktiPendukungModel();
        $modelKonfirmasiStep = new KonfirmasiStepModel();
        $modelPelatihan = new PelatihanModel();
        $modelPengalamanKerja = new PengalamanKerjaModel();
        $modelTimeline = new TimelineModel();
        $user = $model->find($id);

        $email = $user['email'];
        $nama = $user['nama_lengkap'];
        $nama_lengkap = str_replace(' ', '-', $nama);

        $checkPendaftaran = $modelPendaftaran->where('email', $email)->first();

        if ($checkPendaftaran) {
            $idPendaftaran = $checkPendaftaran['pendaftaran_id'];
            $modelApproval->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelCapaianDtl->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelBuktiPendukung->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelKonfirmasiStep->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPelatihan->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPengalamanKerja->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelTimeline->where('pendaftaran_id', $idPendaftaran)->delete();
            $modelPendaftaran->where('email', $nama_lengkap)->delete();
            $modelDetailAplikan->where('email', $nama_lengkap)->delete();
            $delete = $model->delete($id);
        } else {
            $delete = $model->delete($id);
        }

        if ($delete) {
            // Hapus folder berdasarkan nama_lengkap
            $folders = [
                FCPATH . 'uploads/bukti-pelatihan/' . $nama_lengkap,
                FCPATH . 'uploads/bukti-pendukung/' . $nama_lengkap,
                FCPATH . 'uploads/bukti-pengalaman-kerja/' . $nama_lengkap,
            ];
            foreach ($folders as $folder) {
                deleteFolder($folder);
            }

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

function deleteFolder($dir)
{
    if (!file_exists($dir))
        return;
    if (!is_dir($dir))
        return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..')
            continue;
        deleteFolder($dir . DIRECTORY_SEPARATOR . $item);
    }
    rmdir($dir);
}