<?php

namespace App\Controllers\Admin;

use App\Models\{UserModel, DetailAsesorModel, DetailAplikanModel, PendaftaranModel, BuktiPendukungModel, KonfirmasiStepModel, PelatihanModel, PengalamanKerjaModel, TimelineModel, ApprovalRplModel, CapaianDtl};
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        return $this->render('Admin/Users/index');
    }

    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('users')->whereIn('role', ['kaprodi', 'asesor']); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('nama_lengkap', $search)
                ->orLike('email', $search)
                ->orLike('role', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['id', 'nama_lengkap', 'email', 'role', 'status'];
        $builder->orderBy($columns[$orderColumnIndex] ?? 'id', $orderDirection);

        // Get data
        $data = $builder->get()->getResultArray();

        // Response sesuai format DataTables
        return $this->response->setJSON([
            'draw' => intval($request->getGet('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }

    public function create()
    {
        return $this->render('Admin/Users/form');
    }

    public function store()
    {
        $model = new UserModel();

        $datas = $this->request->getPost();

        $email = trim(strtolower($this->request->getPost('email')));
        $nama_lengkap = strtolower($datas['nama_lengkap']);
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $datas['password']));
        $role = $datas['role'];
        $status = $datas['status'];

        $checkEmail = $model->where('email', $email)->first();

        if ($checkEmail) {
            return redirect()->to('/admin/users/create')->with('error', 'Email sudah terdaftar!');
        }

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
        $email = trim(strtolower($this->request->getPost('email')));
        $role = $datas['role'];
        $status = $datas['status'];

        $checkEmail = $model->where('email', $email)->first();

        if ($checkEmail) {
            return redirect()->to('/admin/users/create')->with('error', 'Email sudah terdaftar!');
        }

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
        $modelDetailAsesor = new DetailAsesorModel();
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
            $modelPendaftaran->where('email', $email)->delete();
            $modelDetailAplikan->where('email', $email)->delete();

            $delete = $model->delete($id);
        } else {
            $modelDetailAsesor->where('email', $email)->delete();

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