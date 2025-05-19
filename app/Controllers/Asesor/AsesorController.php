<?php

namespace App\Controllers\Asesor;

use CodeIgniter\Controller;
use App\Models\ApprovalRplModel;
use App\Models\PendaftaranModel;

class AsesorController extends Controller
{
    public function approveRpl()
    {
        $approvalModel = new ApprovalRplModel();
        $pendaftaranModel = new PendaftaranModel();

        $pendaftaranId = $this->request->getPost('pendaftaran_id');
        $tahunajarId = $this->request->getPost('tahunSelectApprove');
        $convertNilai = $this->request->getPost('Nilai');
        $rplData = $this->request->getPost('rpl'); // Array dari checkbox "Ya"

        if (empty($rplData) || empty($pendaftaranId)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada mata kuliah yang dipilih atau data pendaftaran tidak valid.'
            ]);
        }
        if (empty($convertNilai)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Nilai Akhir belum dimasukkan.'
            ]);
        }

        $dataToInsert = [];
        $dataToInsert[] = [
            'pendaftaran_id' => $pendaftaranId,
            'kurikulum_id' => $tahunajarId,
            'penilaian_asesor' => $convertNilai // Default, sesuaikan jika perlu
        ];

        if (!empty($dataToInsert)) {
            $approvalModel->insertBatch($dataToInsert);
            // Optional: Update status pendaftaran
            $pendaftaranModel->updateStatusPendaftaran($pendaftaranId, 'approved');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data RPL berhasil di-approve.'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Tidak ada mata kuliah yang dipilih untuk RPL.'
        ]);
    }


}
