<?php

namespace App\Controllers\Admin;

use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class TahunAjarController extends BaseController
{
    public function index()
    {
        $model = new TahunAjarModel();
        $data['tahun_ajar'] = $model->findAll();

        return $this->render('Admin/TahunAjar/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/TahunAjar/form');
    }

    public function store()
    {
        $model = new TahunAjarModel();

        $checkTahunAjar = $model->where('tahun', $this->request->getPost('tahun'))->findAll();

        if ($checkTahunAjar) {
            return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran sudah ada');
        }

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'status' => $this->request->getPost('status'),
        ];

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/tahun-ajar')->with('success', 'Tahun Ajaran berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $model = new TahunAjarModel();
        $data['dttahun_ajar'] = $model->find($id);

        return $this->render('Admin/TahunAjar/form', $data);
    }

    public function update($id)
    {
        $model = new TahunAjarModel();

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'status' => $this->request->getPost('status'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/tahun-ajar')->with('success', 'Tahun Ajaran berhasil diubah!');
        } else {
            return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran gagal diubah!');
        }
    }

    public function delete($id)
    {
        $model = new TahunAjarModel();
        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/tahun-ajar')->with('success', 'Tahun Ajaran berhasil dihapus!');
        } else {
            return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran gagal dihapus!');
        }
    }
}