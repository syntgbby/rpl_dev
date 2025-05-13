<?php

namespace App\Controllers\Admin;

use App\Models\View\ViewDataPendaftaran;
use App\Models\UserModel;
use App\Models\PendaftaranModel;
use App\Controllers\BaseController;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        $model = new ViewDataPendaftaran();

        $data['dtpendaftaran'] = $model->where('asesor_id', '')->findAll();

        return $this->render('Admin/DataPendaftaran/index', $data);
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $asesor = new UserModel();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['asesor'] = $asesor->where('role', 'asesor')->where('status', 'Y')->findAll();

        // dd($data);
        return $this->render('Admin/DataPendaftaran/view-detail', $data);
    }

    public function assignAsesor()
    {
        $id = $this->request->getVar('pendaftaran_id');
        $asesor_id = $this->request->getVar('asesor_id');

        $model = new PendaftaranModel();
        $model->where('pendaftaran_id', $id)->set(['asesor_id' => $asesor_id])->update();

        return redirect()->to(base_url('admin/data-pendaftaran'))->with('success', 'Asesor berhasil diassign');
    }
}