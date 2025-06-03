<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\View\{ViewDataPendaftaran, ViewAsesmenKurikulum};
use App\Models\{ApprovalRplModel, CapaianDtl, UserModel, KurikulumModel, PelatihanModel, PendaftaranModel, PengalamanKerjaModel, TahunAjarModel};
use Dompdf\Dompdf;
use Dompdf\Options;
helper('url');

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

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->getPengalamanKerja($id);
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($id);

        return $this->render('Asesor/DataLaporan/view-detail', $data);
    }

    public function getViewAsesmenKurikulum($kode_matkul)
    {
        $asesmenModel = new ViewAsesmenKurikulum();
        $asesmen = $asesmenModel->where('kode_matkul', $kode_matkul)->findAll();
        return $this->render('Asesor/DataLaporan/asesmen', ['asesmen' => $asesmen]);
    }

    public function getViewAsesmenPdf($id)
    {
        // Load model dan data
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel(); 
        $modelPekerjaan = new PengalamanKerjaModel();
        $approvalModel = new ApprovalRplModel(); 

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->getPengalamanKerja($id);
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($id);

        // Load library DomPDF
        $dompdf = new Dompdf();

        // Render view khusus PDF
        $html = view('asesor/DataLaporan/pdf_template', $data);
        $dompdf->loadHtml($html);

        // Setup kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF
        $dompdf->stream("laporan.pdf", array("Attachment" => false));
    }


}