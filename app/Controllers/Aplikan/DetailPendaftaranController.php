<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;
use App\Models\View\{ViewDataPendaftaran, ViewAsesmenKurikulum};
use App\Models\{ApprovalRplModel, CapaianDtl, UserModel, KurikulumModel, PelatihanModel, PendaftaranModel, PengalamanKerjaModel, TahunAjarModel};
use Dompdf\Dompdf;
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
        $data['dtpekerjaan'] = $modelPekerjaan->where('pendaftaran_id', $pendaftaran_id)->findAll();
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($pendaftaran_id);

        return $this->render('Aplikan/DetailPendaftaran/index', $data);
    }

    public function getViewAsesmenKurikulum($kode_matkul)
    {
        $asesmenModel = new ViewAsesmenKurikulum();
        $asesmen = $asesmenModel->where('kode_matkul', $kode_matkul)->findAll();
        return $this->render('Aplikan/DetailPendaftaran/asesmen', ['asesmen' => $asesmen]);
    }

    public function getViewAsesmenPdf()
    {
        $email = session()->get('email');

        // Load model dan data
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $modelPekerjaan = new PengalamanKerjaModel();
        $approvalModel = new ApprovalRplModel();
        $asesmenModel = new ViewAsesmenKurikulum();

        $getData = $model->where('email', $email)->first();
        $id = $getData['pendaftaran_id'];

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->where('pendaftaran_id', $id)->findAll();
        // Hitung total lama bekerja
        $totalLamaBekerja = 0;
        if (!empty($data['dtpekerjaan'])) {
            foreach ($data['dtpekerjaan'] as $pekerjaan) {
                if (!empty($pekerjaan['tahun_mulai']) && !empty($pekerjaan['tahun_selesai'])) {
                    $totalLamaBekerja += (int) $pekerjaan['tahun_selesai'] - (int) $pekerjaan['tahun_mulai'];
                }
            }
        }
        $data['totalLamaBekerja'] = $totalLamaBekerja; // Kirim ke view
        $data['approvalWithKurikulum'] = $approvalModel->getApprovalWithKurikulum($id);


        // Ambil data asesmen untuk SEMUA mata kuliah (tanpa filter status)
        $asesmenData = [];
        if (!empty($data['approvalWithKurikulum'])) {
            foreach ($data['approvalWithKurikulum'] as $kurikulum) {
                // Hapus kondisi if($kurikulum['status'] == 'Y') agar mengambil semua status
                $asesmen = $asesmenModel->where('kode_matkul', $kurikulum['kode_matkul'])->findAll();
                $asesmenData[$kurikulum['kode_matkul']] = [
                    'nama_matkul' => $kurikulum['nama_matkul'],
                    'status_approval' => $kurikulum['status'], // Tambahkan status approval
                    'asesmen' => $asesmen
                ];
            }
        }
        $data['asesmenData'] = $asesmenData;

        // Load library DomPDF
        $dompdf = new Dompdf();

        // Render view khusus PDF
        $html = view('aplikan/DetailPendaftaran/pdf_template', $data);
        $dompdf->loadHtml($html);

        // Setup kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF
        $dompdf->stream("laporan.pdf", array("Attachment" => false));
    }
}