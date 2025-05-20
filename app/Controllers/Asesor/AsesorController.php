<?php

namespace App\Controllers\Asesor;

use CodeIgniter\Controller;
use App\Models\{ApprovalRplModel, FinalApprovalModel};
use App\Models\PendaftaranModel;

class AsesorController extends Controller
{
    public function approveRpl()
    {
        $approvalModel = new ApprovalRplModel();
        $pendaftaranModel = new PendaftaranModel();
        $finalApprovalModel = new FinalApprovalModel();

        $pendaftaranId = $this->request->getPost('pendaftaran_id');
        $tahunajarId = $this->request->getPost('tahunSelectApprove');
        $status = $this->request->getPost('status');
        $type = $this->request->getPost('type');

        $rplData = $this->request->getPost('rpl'); // Array dari checkbox "Ya"

        if (empty($rplData) || empty($pendaftaranId)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada mata kuliah yang dipilih atau data pendaftaran tidak valid.'
            ]);
        }
        if (empty($status)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Status belum dimasukkan.'
            ]);
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

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data RPL berhasil di approve.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data RPL gagal di-approve.'
            ]);
        }
    }
}