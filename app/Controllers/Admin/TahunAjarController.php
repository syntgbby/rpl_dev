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

        $status = $this->request->getPost('status');

        // Cek apakah sudah ada data aktif
        if ($status === 'Y') {
            $isActiveExist = $model->where('status', 'Y')->first();
            if ($isActiveExist) {
                return redirect()->to('/admin/tahun-ajar')->with('error', 'Sudah ada tahun ajar aktif!');
            }
        }

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'status' => $status,
        ];

        if ($model->save($data)) {
            return redirect()->to('/admin/tahun-ajar')->with('success', 'Tahun Ajaran berhasil ditambahkan!');
        }

        return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran gagal ditambahkan!');
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
        $status = $this->request->getPost('status');

        // Cek status Y, dan pastikan tidak ada data Y lain selain data yang sedang diupdate
        if ($status === 'Y') {
            $activeExist = $model->where('status', 'Y')->where('id !=', $id)->first();
            if ($activeExist) {
                return redirect()->to('/admin/tahun-ajar')->with('error', 'Sudah ada tahun ajar aktif!');
            }
        }

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'status' => $status,
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/admin/tahun-ajar')->with('success', 'Tahun Ajaran berhasil diubah!');
        }

        return redirect()->to('/admin/tahun-ajar')->with('error', 'Tahun Ajaran gagal diubah!');
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