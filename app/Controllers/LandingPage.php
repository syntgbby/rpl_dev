<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ProdiModel;
use App\Models\GelombangModel;

class LandingPage extends Controller
{
    public function index()
    {
        $gelombangModel = new GelombangModel();
        $prodiModel = new ProdiModel();

        $data['gelombang'] = $gelombangModel->findAll();
        $data['prodi'] = $prodiModel->where('type', '1')->findAll();

        return view('LandingPage/template', $data);
    }

    public function detailProdi($id)
    {
        $prodiModel = new ProdiModel();
        $data['prodi'] = $prodiModel->where('id', $id)->first();

        if (!$data['prodi']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('LandingPage/detail_prodi', $data);
    }
}