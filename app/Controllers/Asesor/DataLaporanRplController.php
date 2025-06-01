<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\View\ViewDataPendaftaran;
use App\Models\{ApprovalRplModel, CapaianDtl, UserModel, KurikulumModel, PelatihanModel, PendaftaranModel, PengalamanKerjaModel, TahunAjarModel};

class DataLaporanRplController extends BaseController
{
    public function index()
    {
        {
        $email = session()->get('email');
        $id = session()->get('user_id');

        $user = new UserModel();
        $asesor = $user->where('email', $email)->first();

        if ($asesor['id'] != $id) {
            return redirect()->to('/asesor/login')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        } else {
            $model = new ViewDataPendaftaran();
            $dtPendaftaran = $model->where('asesor_id', $asesor['id'])->where('status', 'approved')->findAll();

            if ($dtPendaftaran) {
                $data['dtpendaftaran'] = $dtPendaftaran;
            } else {
                $data['dtpendaftaran'] = [];
            }

            return $this->render('Asesor/DataLaporan/index', $data);
        }
    }}

    public function filterData()
    {
        $model = new ViewDataPendaftaran();
        
        // Ambil parameter tanggal dari input GET
        $startDate = $this->request->getGet('start_date'); // 2025-05-02
        $endDate = $this->request->getGet('end_date');     // 2025-05-05

        if ($startDate && $endDate) {
            // Untuk query, tambahkan jam pada endDate
            $endDateQuery = $endDate . ' 23:59:59';
            $data['dtpendaftaran'] = $model->getDataByFilter($startDate, $endDateQuery);
        } else {
            $data['dtpendaftaran'] = $model->getDataPendaftaran();
        }
        $data['start_date'] = $startDate;
        $data['end_date'] = $endDate;

        return $this->render('Asesor/DataLaporan/index', $data);
    }

    
    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $modelPekerjaan = new PengalamanKerjaModel();
        $approvalModel = new ApprovalRplModel(); 

        $data['dtpendaftaran'] = $model->getDataPendaftaran($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->getPengalamanKerja($id);
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($id);

        return $this->render('Asesor/DataLaporan/view-detail', $data);
    }

    public function getAsesmen($kode_matkul)
    {
        $capaianDtlModel = new CapaianDtl();
        $data['asesmen'] = $capaianDtlModel->getAsesmenWithCapaian();
        return $this->render('Asesor/DataLaporan/asasmen', $data);
    }
}