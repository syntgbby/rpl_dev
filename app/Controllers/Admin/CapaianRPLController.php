<?php

namespace App\Controllers\Admin;

use App\Models\View\{ViewCapaian, ViewKurikulum};
use App\Models\CapaianRPL;
use App\Models\MataKuliahModel;
use App\Controllers\BaseController;

class CapaianRPLController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        return $this->render('Admin/CapaianRPL/index');
    }

    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('view_capaian'); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('nama_prodi', $search)
                ->orLike('kode_matkul', $search)
                ->orLike('nama_matkul', $search)
                ->orLike('deskripsi', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['id', 'nama_prodi', 'kode_matkul', 'nama_matkul', 'deskripsi'];
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

    // Tampilan Form Tambah Asesmen
    public function create()
    {
        $mataKuliah = new ViewKurikulum();

        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/CapaianRPL/form', $data);
    }

    // Proses Tambah Asesmen
    public function store()
    {
        $model = new CapaianRPL();

        $checkCapaian = $model
            ->where('deskripsi', $this->request->getPost('deskripsi'))
            ->where('kurikulum_id', $this->request->getPost('kurikulum_id'))
            ->findAll();

        if ($checkCapaian) {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen sudah ada');
        }

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kurikulum_id' => $this->request->getPost('kurikulum_id'),
        ];
        // dd($data);

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/capaian-rpl')->with('success', 'Asesmen berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen gagal ditambahkan!');
        }
    }

    // Tampilan Form Edit Asesmen
    public function edit($id)
    {
        $model = new CapaianRPL();
        $data['dtasesmen'] = $model->find($id);

        $mataKuliah = new ViewKurikulum();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/CapaianRPL/form', $data);
    }

    // Proses Edit Asesmen
    public function update($id)
    {
        $model = new CapaianRPL();

        $checkCapaian = $model
            ->where('deskripsi', $this->request->getPost('deskripsi'))
            ->where('kurikulum_id', $this->request->getPost('kurikulum_id'))
            ->findAll();

        if ($checkCapaian) {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen sudah ada');
        }

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kurikulum_id' => $this->request->getPost('kurikulum_id'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/capaian-rpl')->with('success', 'Asesmen berhasil diubah!');
        } else {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen gagal diubah!');
        }
    }

    // Proses Hapus Asesmen
    public function delete($id)
    {
        $model = new CapaianRPL();

        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/capaian-rpl')->with('success', 'Asesmen berhasil dihapus!');
        } else {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen gagal dihapus!');
        }
    }
}