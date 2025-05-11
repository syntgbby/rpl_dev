<?php

namespace App\Controllers\Asesor;

use App\Models\View\ViewDataPendaftaran;
use App\Controllers\BaseController;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        $model = new ViewDataPendaftaran();

        $data['dtpendaftaran'] = $model->findAll();

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