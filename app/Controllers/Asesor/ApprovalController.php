<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\View\ViewDataPendaftaran;

class ApprovalController extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new ViewDataPendaftaran();
        $data['pendaftaran'] = $pendaftaranModel->where('status', 'approved')->findAll();
        return $this->render('Asesor/DataApproved/index', $data);
    }
}