<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\View\ViewDataPendaftaran;
use App\Models\PelatihanModel;

class DataNotApprovedController extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new ViewDataPendaftaran();
        $data['pendaftaran'] = $pendaftaranModel->where('status', 'rejected')->findAll();
        return $this->render('Asesor/DataNotApproved/index', $data);
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        return $this->render('Asesor/DataNotApproved/view-detail', $data);
    }
}