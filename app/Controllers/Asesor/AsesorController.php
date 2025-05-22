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

            return redirect()->to('/asesor/data-pendaftaran')->with('success', 'Data RPL berhasil di approve.');
        } else {
            return redirect()->to('/asesor/data-pendaftaran')->with('error', 'Data RPL gagal di-approve.');
        }
    }
}