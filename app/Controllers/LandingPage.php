<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ProdiModel;
use App\Models\GelombangModel;

helper('url');

class LandingPage extends Controller
{
    public function index()
    {
        $gelombangModel = new GelombangModel();
        $prodiModel = new ProdiModel();

        $data['gelombang'] = $gelombangModel->findAll();
        $data['prodi'] = $prodiModel->findAll();

        $data['baseURL'] = "http://localhost:8080/";

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