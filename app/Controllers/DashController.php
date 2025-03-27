<?php

namespace App\Controllers;

class DashController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data = $db->table('master_prodi')->get()->getResultArray();

        return $this->render('Dash/dashboard', ['data' => $data]);
    }
}
