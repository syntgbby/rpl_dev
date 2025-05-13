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
    public function index()
    {
        $kurikulum = new ViewKurikulum();

        $data['kurikulum'] = $kurikulum->getViewKurikulum();

        return $this->render('Admin/Kurikulum/index', $data);
    }

    public function create()
    {
        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->where('type', '1')->findAll();
        $data['tahun_ajar'] = $tahunAjar->where('status', 'Y')->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    public function store()
    {
        $model = new KurikulumModel();

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'matkul_id' => $this->request->getPost('matkul_id'),
            'status' => $this->request->getPost('status'),
        ];

        $model->save($data);

        return redirect()->to('/admin/kurikulum');
    }

    public function edit($id)
    {
        $model = new KurikulumModel();
        $data['dtkurikulum'] = $model->find($id);

        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->where('type', '1')->findAll();
        $data['tahun_ajar'] = $tahunAjar->where('status', 'Y')->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    public function update($id)
    {
        $model = new KurikulumModel();

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'matkul_id' => $this->request->getPost('matkul_id'),
            'status' => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/kurikulum');
    }

    public function delete($id)
    {
        $model = new KurikulumModel();
        $model->delete($id);

        return redirect()->to('/admin/kurikulum');
    }
}