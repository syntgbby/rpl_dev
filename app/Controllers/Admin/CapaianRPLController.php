<?php

namespace App\Controllers\Admin;

use App\Models\View\ViewCapaian;
use App\Models\CapaianRPL;
use App\Models\MataKuliahModel;
use App\Controllers\BaseController;

class CapaianRPLController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        $capaian = new ViewCapaian();

        $data['capaian'] = $capaian->getViewcapaian();

        return $this->render('Admin/CapaianRPL/index', $data);
    }

    // Tampilan Form Tambah Asesmen
    public function create()
    {
        $mataKuliah = new MataKuliahModel();

        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/CapaianRPL/form', $data);
    }

    // Proses Tambah Asesmen
    public function store()
    {
        $model = new CapaianRPL();

        $checkCapaian = $model->where('deskripsi', $this->request->getPost('deskripsi'))
            ->findAll();

        if ($checkCapaian) {
            return redirect()->to('/admin/capaian-rpl')->with('error', 'Asesmen sudah ada');
        }

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
        ];

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

        $mataKuliah = new MataKuliahModel();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/CapaianRPL/form', $data);
    }

    // Proses Edit Asesmen
    public function update($id)
    {
        $model = new CapaianRPL();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
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