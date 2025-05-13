<?php

namespace App\Controllers\Asesor;

use App\Models\View\ViewDataPendaftaran;
use App\Models\UserModel;
use App\Controllers\BaseController;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        $email = session()->get('email');

        $user = new UserModel();
        $asesor = $user->where('email', $email)->first();

        $model = new ViewDataPendaftaran();

        $data['dtpendaftaran'] = $model->where('asesor_id', $asesor['id'])->findAll();

        return $this->render('Asesor/DataPendaftaran/index', $data);
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        return $this->render('Asesor/DataPendaftaran/view-detail', $data);
    }

    public function approvePendaftaran($id)
    {
        $model = new ViewDataPendaftaran();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        return $this->render('Asesor/validasi', $data);
    }
}