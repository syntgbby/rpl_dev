<?php

namespace App\Controllers\Asesor;

use App\Models\View\ViewDataPendaftaran;
use App\Models\View\ViewKurikulum;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\KurikulumModel;
use App\Models\PendaftaranModel;
use App\Models\TahunAjarModel;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        $email = session()->get('email');
        $id = session()->get('user_id');

        $user = new UserModel();
        $asesor = $user->where('email', $email)->first();

        if ($asesor['id'] != $id) {
            return redirect()->to('/asesor/login')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        } else {
            $model = new ViewDataPendaftaran();
            $dtPendaftaran = $model->where('asesor_id', $asesor['id'])->where('status', 'submitted')->findAll();

            if ($dtPendaftaran) {
                $data['dtpendaftaran'] = $dtPendaftaran;
            } else {
                $data['dtpendaftaran'] = [];
            }

            return $this->render('Asesor/DataPendaftaran/index', $data);
        }
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        return $this->render('Asesor/DataPendaftaran/view-detail', $data);
    }

    public function approvePendaftaran($id)
    {
        $model = new ViewDataPendaftaran();
        $model_kurikulum = new TahunAjarModel();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtkurikulum'] = $model_kurikulum->getTahunAjar();
        return $this->render('Asesor/validasi', $data);
    }

    public function getMatkulByTahun($tahun)
    {
        if (!$tahun) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tahun kurikulum tidak ditemukan.'
            ])->setStatusCode(400);
        }

        $kurikulumModel = new KurikulumModel();

        // Asumsi kamu punya method getMatkulByTahun di KurikulumModel
        $data = $kurikulumModel->getMatkulByTahun($tahun);

        if ($data) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil ditemukan.',
                'data' => $data
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'empty',
                'message' => 'Tidak ada data mata kuliah di tahun tersebut.',
                'data' => []
            ]);
        }
    }


}