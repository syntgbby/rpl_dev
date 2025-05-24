<?php

namespace App\Controllers\Admin;

use App\Models\View\ViewKurikulum;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class KurikulumController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        $kurikulum = new ViewKurikulum();

        $data['kurikulum'] = $kurikulum->getViewKurikulum();

        return $this->render('Admin/Kurikulum/index', $data);
    }

    // Tampilan Form Tambah Kurikulum
    public function create()
    {
        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->findAll();
        $data['tahun_ajar'] = $tahunAjar->where('status', 'Y')->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    // Proses Tambah Kurikulum
    public function store()
    {
        $model = new KurikulumModel();

        $checkKurikulum = $model->where('tahun_ajar_id', $this->request->getPost('tahun_ajar_id'))
            ->where('prodi_id', $this->request->getPost('prodi_id'))
            ->where('kode_matkul', $this->request->getPost('kode_matkul'))
            ->findAll();

        if ($checkKurikulum) {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum sudah ada');
        }

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'status' => $this->request->getPost('status'),
        ];

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal ditambahkan!');
        }
    }

    // Tampilan Form Edit Kurikulum
    public function edit($id)
    {
        $model = new KurikulumModel();
        $data['dtkurikulum'] = $model->find($id);

        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->findAll();
        $data['tahun_ajar'] = $tahunAjar->where('status', 'Y')->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    // Proses Edit Kurikulum
    public function update($id)
    {
        $model = new KurikulumModel();

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'status' => $this->request->getPost('status'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil diubah!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal diubah!');
        }
    }

    // Proses Hapus Kurikulum
    public function delete($id)
    {
        $model = new KurikulumModel();

        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil dihapus!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal dihapus!');
        }
    }
}