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

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'status' => $this->request->getPost('status'),
        ];

        $model->save($data);

        return redirect()->to('/admin/tahun-ajar');
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

        $model->update($id, $data);

        return redirect()->to('/admin/tahun-ajar');
    }

    public function delete($id)
    {
        $model = new TahunAjarModel();
        $model->delete($id);

        return redirect()->to('/admin/tahun-ajar');
    }
}