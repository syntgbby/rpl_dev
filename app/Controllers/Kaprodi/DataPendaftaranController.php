<?php

namespace App\Controllers\Kaprodi;

use App\Models\View\ViewDataPendaftaran;
use App\Models\{UserModel, PelatihanModel};
use App\Models\PendaftaranModel;
use App\Controllers\BaseController;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        $model = new ViewDataPendaftaran();

        $data['dtpendaftaran'] = $model->where('asesor_id', null)->findAll();

        return $this->render('Kaprodi/DataPendaftaran/index', $data);
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $asesor = new UserModel();

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['asesor'] = $asesor->select('users.id, detail_asesor.nama_lengkap')->join('detail_asesor', 'detail_asesor.email = users.email')->where('role', 'asesor')->where('status', 'Y')->findAll();

        return $this->render('Kaprodi/DataPendaftaran/view-detail', $data);
    }

    public function assignAsesor()
    {
        $id = $this->request->getVar('pendaftaran_id');
        $asesor_id = $this->request->getVar('asesor_id');

        $model = new PendaftaranModel();
        $assign = $model->where('pendaftaran_id', $id)->set(['asesor_id' => $asesor_id])->update();

        if ($assign) {
            return redirect()->to('/kaprodi/data-pendaftaran')->with('success', 'Assign Asesor berhasi!');
        } else {
            return redirect()->to('/kaprodi/data-pendaftaran')->with('error', 'Assign Asesor gagal!');
        }
    }
}