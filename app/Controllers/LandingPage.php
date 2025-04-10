<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class LandingPage extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $total = $db->table('users')->countAllResults();
        // dd($total);

        $prodi = $db->table('master_prodi')->orderBy('prodi_name', 'ASC')->get()->getResultArray();
        
        $data = [
            'total_user' => $total,
            'prodi' => $prodi
        ];

        return view('LandingPage/template', $data);
    }
}
