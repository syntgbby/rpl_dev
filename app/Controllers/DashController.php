<?php

namespace App\Controllers;

use App\Models\ProdiModel;

class DashController extends BaseController
{
    public function index()
    {
        $prodiModel = new ProdiModel();

        // $data['gelombang'] = $gelombangModel->findAll();
        $data['prodi'] = $prodiModel->findAll();

        // return view('LandingPage/template', $data);

        // $db = \Config\Database::connect();

        // $data = $db->table('master_prodi')->get()->getResultArray();
        // $data_form = $db->table('form_rpl')->where('email', session()->get('email'))->get()->getRowArray();
        // dd($data_form);
        return $this->render('Dash/dashboard', $data);
    }
}