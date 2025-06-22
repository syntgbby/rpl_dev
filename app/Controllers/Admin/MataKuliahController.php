<?php

namespace App\Controllers\Admin;

use App\Models\MataKuliahModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Models\View\ViewMataKuliah;
use App\Controllers\BaseController;

class MataKuliahController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        return $this->render('Admin/MataKuliah/index');
    }

    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('mata_kuliah')->orderBy('nama_matkul', 'ASC'); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('kode_matkul', $search)
                ->orLike('nama_matkul', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['id', 'kode_matkul', 'nama_matkul', 'sks', 'status'];
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
    // Tampilan Form Tambah Mata Kuliah
    public function create()
    {
        return $this->render('Admin/MataKuliah/form');
    }

    public function store()
    {
        $model = new MataKuliahModel();

        $checkMataKuliah = $model->where('kode_matkul', $this->request->getPost('kode_matkul'))->findAll();

        if ($checkMataKuliah) {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah sudah ada!');
        }

        $data = [
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $model = new MataKuliahModel();
        $data['dtmata_kuliah'] = $model->find($id);

        return $this->render('Admin/MataKuliah/form', $data);
    }

    public function update($id)
    {
        $model = new MataKuliahModel();

        $checkMataKuliah = $model->where('kode_matkul', $this->request->getPost('kode_matkul'))->findAll();

        if ($checkMataKuliah) {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah sudah ada!');
        }

        $data = [
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil diubah!');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal diubah!');
        }
    }

    public function delete($id)
    {
        $model = new MataKuliahModel();
        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil dihapus!');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal dihapus!');
        }
    }
}