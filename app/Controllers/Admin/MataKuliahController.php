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
        $mataKuliah = new MataKuliahModel();

        $data['mata_kuliah'] = $mataKuliah->findAll();

        return $this->render('Admin/MataKuliah/index', $data);
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
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah sudah ada');
        }

        $data = [
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil ditambahkan');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal ditambahkan');
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

        $data = [
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil diubah');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal diubah');
        }
    }

    public function delete($id)
    {
        $model = new MataKuliahModel();
        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/mata-kuliah')->with('success', 'Mata Kuliah berhasil dihapus');
        } else {
            return redirect()->to('/admin/mata-kuliah')->with('error', 'Mata Kuliah gagal dihapus');
        }
    }
}