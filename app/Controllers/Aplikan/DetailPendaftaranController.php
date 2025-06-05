<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;
use App\Models\View\{ViewDataPendaftaran, ViewAsesmenKurikulum};
use App\Models\{ApprovalRplModel, CapaianDtl, UserModel, KurikulumModel, PelatihanModel, PendaftaranModel, PengalamanKerjaModel, TahunAjarModel};
helper('url');

class DetailPendaftaranController extends BaseController
{
    public function index()
    {
        $email = session()->get('email');
        $model = new ViewDataPendaftaran();

        $getData = $model->where('email', $email)->first();
        $pendaftaran_id = $getData['pendaftaran_id'];

        $modelPelatihan = new PelatihanModel();
        $modelPekerjaan = new PengalamanKerjaModel();
        $approvalModel = new ApprovalRplModel(); 

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($pendaftaran_id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $pendaftaran_id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->getPengalamanKerja($pendaftaran_id);
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($pendaftaran_id);

        return $this->render('Aplikan/DetailPendaftaran/index', $data);
    }

    public function getViewAsesmenKurikulum($kode_matkul)
    {
        $asesmenModel = new ViewAsesmenKurikulum();
        $asesmen = $asesmenModel->where('kode_matkul', $kode_matkul)->findAll();
        return $this->render('Aplikan/DetailPendaftaran/asesmen', ['asesmen' => $asesmen]);
    }
}