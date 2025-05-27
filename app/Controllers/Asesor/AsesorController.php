<?php

namespace App\Controllers\Asesor;

use CodeIgniter\Controller;
use App\Models\{ApprovalRplModel, FinalApprovalModel};
use App\Models\View\ViewDataPendaftaran;
use App\Models\PendaftaranModel;
use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;
helper('url');

class AsesorController extends Controller
{
    public function approveRpl()
    {
        $approvalModel = new ApprovalRplModel();
        $pendaftaranModel = new PendaftaranModel();
        $viewPendaftaranModel = new ViewDataPendaftaran();
        $finalApprovalModel = new FinalApprovalModel();

        $pendaftaranId = $this->request->getPost('pendaftaran_id');
        $tahunajarId = $this->request->getPost('tahunSelectApprove');
        $status = $this->request->getPost('status');
        $type = $this->request->getPost('type');
        
        $rplData = $this->request->getPost('rpl'); // Array dari checkbox "Ya"
        
        if (empty($rplData) || empty($pendaftaranId)) {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Tidak ada mata kuliah yang dipilih atau data pendaftaran tidak valid.');
        }
        if (empty($status)) {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Status belum dimasukkan.');
        }

        $dataToInsert = [];
        $dataToInsert[] = [
            'pendaftaran_id' => $pendaftaranId,
            'kurikulum_id' => $tahunajarId
        ];

        if (!empty($dataToInsert)) {
            $approvalModel->insertBatch($dataToInsert);
            // Update status pendaftaran menggunakan method yang benar
            $pendaftaranModel->updateStatusPendaftaran($pendaftaranId, $status);
            $finalApprovalModel->insert([
                'pendaftaran_id' => $pendaftaranId,
                'status' => $status,
                'type' => $type
            ]);

            $dtemail = $viewPendaftaranModel->where('pendaftaran_id', $pendaftaranId)->first();
            $email = $dtemail['email'];

            if ($status == 'approved') {
                if (!empty($dtemail['tahun_ajar'])) {
                    $parts = explode(' ', $dtemail['tahun_ajar']);

                    if (count($parts) == 2) {
                        $semester = $parts[1]; // 'genap' atau 'ganjil'

                        if ($semester == 'genap') {
                            $sms = "Genap";
                        } else {
                            $sms = "Ganjil";
                        }
                    }
                }
                // Data untuk isi surat keputusan
                $dataSurat = [
                    'nama' => $dtemail['nama_lengkap'],
                    'email' => $email,
                    'tanggal' => date('d F Y'),
                    'prodi' => $dtemail['program_study'],
                    'type' => $dtemail['type'],
                    'semester' => $sms
                    // tambahkan data lain sesuai view surat_keputusan
                ];

                $filename = 'SK_RPL_' . $pendaftaranId . '_' . time() . '.pdf';
                $filePath = $this->generateSuratKeputusan($dataSurat, $filename);
                // dd($filePath);
                $link = base_url('surat_keputusan/' . $filename);


                $dataEmail = [
                    'pendaftaran_id' => $pendaftaranId,
                    'nama' => $dtemail['nama_lengkap'],
                    'link' => $link
                ];

                helper('url');
                $htmlEmail = view('ContentEmail/status_rpl', $dataEmail);

                $pendaftaranModel->updateSuratPernyataan($pendaftaranId, $filePath);
                $attributes = [
                    'to' => $email,
                    'subject' => 'Status Pendaftaran RPL ' . $dtemail['nama_lengkap'],
                    'message' => $htmlEmail
                ];

            } else {
                $alasan = $this->request->getPost('alasan');

                $pendaftaranModel->updateAlasanPernyataan($pendaftaranId, $alasan);

                $attributes = [
                    'to' => $email,
                    'subject' => 'Status Pendaftaran RPL ' . $dtemail['nama_lengkap'],
                    'message' => 'Maaf, RPL anda telah di ' . $status . '!' . ' Alasan: ' . $alasan
                ];
            }

            kirimEmail($attributes);

            return redirect()->to('/asesor/data-pendaftaran')->with('success', 'Data RPL berhasil di ' . $status . '!');
        } else {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Data RPL gagal di-approve.');
        }
    }

    private function generateSuratKeputusan($data, $filename)
    {
        set_time_limit(0); // supaya script ini nggak dibatasi waktunya
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Buat tampilan HTML surat keputusan
        $html = view('aplikan/surat_keputusan', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Simpan file di writable
        $writableFolder = WRITEPATH . 'surat_keputusan/';
        if (!is_dir($writableFolder)) {
            mkdir($writableFolder, 0777, true);
        }
        $writablePath = $writableFolder . $filename;
        file_put_contents($writablePath, $dompdf->output());

        // Salin juga ke folder public supaya bisa diakses lewat browser
        $publicFolder = FCPATH . 'surat_keputusan/';
        if (!is_dir($publicFolder)) {
            mkdir($publicFolder, 0777, true);
        }
        $publicPath = $publicFolder . $filename;
        copy($writablePath, $publicPath);

        // Kembalikan URL akses file di browser
        return base_url('surat_keputusan/' . $filename);
    }

}