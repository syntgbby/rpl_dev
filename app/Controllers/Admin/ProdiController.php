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

        $checkProdi = $model->where('nama_prodi', $this->request->getPost('nama_prodi'))->findAll();

        if ($checkProdi) {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi sudah ada');
        }

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

            $checkfoto = FCPATH . 'uploads/prodi/' . $pict_name;
            if (file_exists($checkfoto)) {
                unlink($checkfoto);
            }
            
            $pict->move(FCPATH . 'uploads/prodi/', $pict_name);

            $data['pict'] = base_url('uploads/prodi/' . $pict_name);
        }

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil ditambahkan');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal ditambahkan');
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

                $checkfoto = FCPATH . 'uploads/prodi/' . $pict_name;
                if (file_exists($checkfoto)) {
                    unlink($checkfoto);
                }
                $pict->move(FCPATH . 'uploads/prodi/', $pict_name);

                $data['pict'] = base_url('uploads/prodi/' . $pict_name);
            }
        } else {
            unset($data['pict']);
        }

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil diubah');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal diubah');
        }
    }

    public function delete($id)
    {
        $model = new ProdiModel();
        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/prodi')->with('success', 'Program Studi berhasil dihapus');
        } else {
            return redirect()->to('/admin/prodi')->with('error', 'Program Studi gagal dihapus');
        }
    }
}