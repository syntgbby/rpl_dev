<?php

namespace App\Controllers\Admin;

use App\Models\MataKuliahModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Models\View\ViewMataKuliah;
use App\Controllers\BaseController;

class MataKuliahController extends BaseController
{
    public function index()
    {
        $mataKuliah = new MataKuliahModel();

        $data['mata_kuliah'] = $mataKuliah->findAll();

        return $this->render('Admin/MataKuliah/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/MataKuliah/form');
    }

    public function store()
    {
        $model = new MataKuliahModel();

        $data = [
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $model->save($data);

        return redirect()->to('/admin/mata-kuliah');
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

        $model->update($id, $data);

        return redirect()->to('/admin/mata-kuliah');
    }

    public function delete($id)
    {
        $model = new MataKuliahModel();
        $model->delete($id);

        return redirect()->to('/admin/mata-kuliah');
    }
}