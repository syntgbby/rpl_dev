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

}