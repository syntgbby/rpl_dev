<?php

namespace App\Controllers\Admin;

use App\Models\MataKuliahModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class MataKuliahController extends BaseController
{
    public function index()
    {
        $model = new MataKuliahModel();
        $prodiModel = new ProdiModel();
        $tahunAjarModel = new TahunAjarModel();

        $data['mata_kuliah'] = $model->findAll();
        $data['prodi'] = $prodiModel->findAll();
        $data['tahun_ajar'] = $tahunAjarModel->findAll();

        return $this->render('Admin/MataKuliah/index', $data);
    }

    public function create()
    {
        $prodiModel = new ProdiModel();
        $data['prodi'] = $prodiModel->getProdi();

        $tahunAjarModel = new TahunAjarModel();
        $data['tahun_ajar'] = $tahunAjarModel->findAll();

        return $this->render('Admin/MataKuliah/form', $data);
    }

    public function store()
    {
        $model = new MataKuliahModel();

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
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
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'sks' => $this->request->getPost('sks'),
            'status' => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/mata-kuliah');
    }

    public function delete($id)
    {
        $model = new ProdiModel();
        $model->delete($id);

        return redirect()->to('/admin/mata-kuliah');
    }
}