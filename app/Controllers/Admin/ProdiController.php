<?php

namespace App\Controllers\Admin;

use App\Models\ProdiModel;
use App\Controllers\BaseController;

class ProdiController extends BaseController
{
    public function index()
    {
        $model = new ProdiModel();
        $data['prodi'] = $model->findAll();

        return $this->render('Admin/Prodi/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/Prodi/form');
    }

    public function store()
    {
        $model = new ProdiModel();

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'deskripsi_singkat' => $this->request->getPost('deskripsi_singkat'),
            'deskripsi_lengkap' => $this->request->getPost('deskripsi_lengkap'),
            'jenjang_karir' => $this->request->getPost('jenjang_karir'),
            'status' => $this->request->getPost('status'),
        ];

        $pict = $this->request->getFile('pict');

        if ($pict && $pict->isValid()) {
            $extension = $pict->getExtension();
            $pict_name = $this->request->getPost('nama_prodi') . '.' . $extension;
            $pict->move(FCPATH . 'uploads/prodi/', $pict_name);

            $data['pict'] = base_url('uploads/prodi/' . $pict_name);
        }

        $model->save($data);

        return redirect()->to('/admin/prodi');
    }

    public function edit($id)
    {
        $model = new ProdiModel();
        $data['dtprodi'] = $model->find($id);
        // dd($data['user']);

        return $this->render('Admin/Prodi/form', $data);
    }

    public function update($id)
    {
        $model = new ProdiModel();

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'deskripsi_singkat' => $this->request->getPost('deskripsi_singkat'),
            'deskripsi_lengkap' => $this->request->getPost('deskripsi_lengkap'),
            'jenjang_karir' => $this->request->getPost('jenjang_karir'),
            'status' => $this->request->getPost('status'),
        ];

        $pict = $this->request->getFile('pict');

        if (!empty($pict)) {
            if ($pict && $pict->isValid()) {
                $extension = $pict->getExtension();
                $pict_name = $this->request->getPost('nama_prodi') . '.' . $extension;
                $pict->move(FCPATH . 'uploads/prodi/', $pict_name);

                $data['pict'] = base_url('uploads/prodi/' . $pict_name);
            }
        } else {
            unset($data['pict']);
        }

        $model->update($id, $data);

        return redirect()->to('/admin/prodi');
    }

    public function delete($id)
    {
        $model = new ProdiModel();
        $model->delete($id);

        return redirect()->to('/admin/prodi');
    }
}