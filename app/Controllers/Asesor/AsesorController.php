<?php

namespace App\Controllers\Asesor;

use CodeIgniter\Controller;
use App\Models\{ApprovalRplModel, FinalApprovalModel, CapaianRPL, CapaianDtl};
use App\Models\View\{ViewDataPendaftaran, ViewCapaian};
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
        $capaianModel = new CapaianRPL();
        $capaianDtlModel = new CapaianDtl();

        $pendaftaranId = $this->request->getPost('pendaftaran_id');
        $tahunajarId = $this->request->getPost('tahunSelectApprove');
        $status = $this->request->getPost('status');
        $type = $this->request->getPost('type');
        $alasan = $this->request->getPost('alasan');

        $rplArray = $this->request->getPost('rpl'); // checkbox "Ya", key = kode matkul
        $asesmenArray = $this->request->getPost('asesmen');
        // dd($this->request->getPost());

        if (!$pendaftaranId || !$rplArray || !$asesmenArray || !$status) {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Data tidak lengkap.');
        }

        if ($status === 'rejected' && empty($alasan)) {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Alasan penolakan wajib diisi.');
        }

        $dataToInsert = [];
        foreach ($rplArray as $kurikulumId => $value) {
            $dataToInsert[] = [
                'pendaftaran_id' => $pendaftaranId,
                'kurikulum_id' => $kurikulumId
            ];
        }

        if (!empty($dataToInsert)) {
            //save approval kurikulum
            $approvalModel->insertBatch($dataToInsert);


            // save approval asesmen
            $dataToInsertAsesmen = [];
            foreach ($asesmenArray as $kurikulumIdA => $value) {
                $capaianList = $capaianModel->where('kurikulum_id', $kurikulumIdA)->findAll();
                if (!empty($capaianList)) {
                    foreach ($capaianList as $capaian) {
                        $capaianId = $capaian['id'];
                        $dataToInsertAsesmen[] = [
                            'pendaftaran_id' => $pendaftaranId,
                            'capaian_id' => $capaianId,
                            'status' => $value
                        ];
                    }
                }
            }

            $capaianDtlModel->insertBatch($dataToInsertAsesmen);

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

    private function generateSuratAsesmenPerMatkul($pendaftaranId, $rplArray, $dtemail)
    {
        $viewCapaian = new ViewCapaian();
        $capaianModel = new CapaianRPL();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $folder = WRITEPATH . 'surat_asesmen/';
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $folderPublic = FCPATH . 'surat_asesmen/';
        if (!is_dir($folderPublic)) {
            mkdir($folderPublic, 0777, true);
        }

        foreach ($rplArray as $kurikulumId => $v) {
            $listCapaian = $viewCapaian->where('pendaftaran_id', $pendaftaranId)
                ->where('kurikulum_id', $kurikulumId)
                ->findAll();

            if (empty($listCapaian)) {
                continue; // skip kalau nggak ada data capaian
            }

            $dataView = [
                'nama' => $dtemail['nama_lengkap'],
                'prodi' => $dtemail['program_study'],
                'semester' => $dtemail['tahun_ajar'],
                'mata_kuliah' => $listCapaian[0]['nama_matkul'],
                'capaian_list' => $listCapaian,
                'tanggal' => date('d F Y')
            ];

            $html = view('aplikan/surat_asesmen_matkul', $dataView);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $filename = 'Surat_Asesmen_' . $kurikulumId . '_' . time() . '.pdf';

            file_put_contents($folder . $filename, $dompdf->output());
            copy($folder . $filename, $folderPublic . $filename);
        }
    }
}