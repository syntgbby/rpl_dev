<?php

namespace App\Controllers\Asesor;

use App\Models\View\ViewDataPendaftaran;
use App\Models\UserModel;
use App\Controllers\BaseController;

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
            $dtPendaftaran = $model->where('asesor_id', $asesor['id'])->findAll();

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
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        return $this->render('Asesor/validasi', $data);
    }
}
