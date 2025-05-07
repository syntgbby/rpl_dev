<?php

namespace App\Controllers;

class DashController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data = $db->table('master_prodi')->get()->getResultArray();
        $data_form = $db->table('form_rpl')->where('email', session()->get('email'))->get()->getRowArray();
        // dd($data_form);
        return $this->render('Dash/dashboard', ['data' => $data, 'data_form' => $data_form]);
    }
}
