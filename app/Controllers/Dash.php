<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AplikanModel;

class Dash extends BaseController
{
    protected $userModel;
    protected $aplikanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->aplikanModel = new AplikanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->userModel->getUser(),
            'aplikan' => $this->aplikanModel->getAplikan(),
            'aplikan2025' => $this->aplikanModel->getAplikanByYear(2025)
        ];
        return view('Dash/dashboard', $data);
    }
} 