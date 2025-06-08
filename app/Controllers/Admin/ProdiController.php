<?php

namespace App\Controllers\Admin;

use App\Models\ProdiModel;
use App\Controllers\BaseController;

class ProdiController extends BaseController
{
    public function index()
    {
        $model = new ProdiModel();

        $data['prodi'] = $model->orderBy('nama_prodi', 'ASC')->findAll();

        return $this->render('Admin/Prodi/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/Prodi/form');
    }

    public function store()
    {
        $model = new ProdiModel();

        $checkProdi = $model->where('nama_prodi', $this->request->getPost('nama_prodi'))->findAll();

        if ($checkProdi) {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi sudah ada');
        }

        $kategori = $this->request->getPost('kategori');

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'deskripsi_singkat' => $this->request->getPost('deskripsi_singkat'),
            'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
            'kategori' => $kategori,
            'type' => '1',
            'deskripsi_lengkap' => $this->request->getPost('deskripsi_lengkap'),
            'jenjang_karir' => $this->request->getPost('jenjang_karir'),
            'status' => $this->request->getPost('status'),
        ];

        if ($kategori == "Business") {
            $data['pict'] = "assets/img/business.png";
        } else if ($kategori == "Communication") {
            $data['pict'] = "assets/img/communication.png";
        } else if ($kategori == "Business") {
            $data['pict'] = "assets/img/business.png";
        } else if ($kategori == "Finance") {
            $data['pict'] = "assets/img/finance.png";
        } else {
            $data['pict'] = "assets/img/technology.png";
        }

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $model = new ProdiModel();
        $data['dtprodi'] = $model->find($id);

        return $this->render('Admin/Prodi/form', $data);
    }

    public function update($id)
    {
        $model = new ProdiModel();
        $kategori = $this->request->getPost('kategori');

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
            'kategori' => $kategori,
            'deskripsi_singkat' => $this->request->getPost('deskripsi_singkat'),
            'deskripsi_lengkap' => $this->request->getPost('deskripsi_lengkap'),
            'jenjang_karir' => $this->request->getPost('jenjang_karir'),
            'status' => $this->request->getPost('status'),
        ];

        if ($kategori == "Business") {
            $data['pict'] = "assets/img/business.png";
        } else if ($kategori == "Communication") {
            $data['pict'] = "assets/img/communication.png";
        } else if ($kategori == "Business") {
            $data['pict'] = "assets/img/business.png";
        } else if ($kategori == "Finance") {
            $data['pict'] = "assets/img/finance.png";
        } else {
            $data['pict'] = "assets/img/technology.png";
        }

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil diubah!');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal diubah!');
        }
    }

    public function delete($id)
    {
        $model = new ProdiModel();
        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil dihapus!');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal dihapus!');
        }
    }
}