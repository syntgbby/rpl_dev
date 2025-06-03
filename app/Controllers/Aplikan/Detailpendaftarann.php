<?php

namespace App\Controllers\Aplikan;

use App\Models\View\ViewKurikulum;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class Detailpendaftarann extends BaseController
{
    // Tampilan Index
    public function index()
    {
        return $this->render('Aplikan/Detailpendaftarann/index');
    }
    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $modelPekerjaan = new PengalamanKerjaModel();
        $approvalModel = new ApprovalRplModel();

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->getPengalamanKerja($id);
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($id);

        if (!$data['dtpendaftaran']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data pendaftaran tidak ditemukan.");
        }

        return view('Aplikan/Detailpendaftarann/index', $data);
    }
}