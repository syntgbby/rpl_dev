<?php

namespace App\Controllers\Kaprodi;

use App\Models\View\ViewDataPendaftaran;
use App\Models\{UserModel, PelatihanModel, PengalamanKerjaModel};
use App\Models\PendaftaranModel;
use App\Controllers\BaseController;

class DataPendaftaranController extends BaseController
{
    public function index()
    {
        return $this->render('Kaprodi/DataPendaftaran/index');
    }

    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('view_data_pendaftaran')->where('asesor_id', null); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('nama_lengkap', $search)
                ->orLike('program_study', $search)
                ->orLike('status', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['pendaftaran_id', 'nama_lengkap', 'program_study', 'status'];
        $builder->orderBy($columns[$orderColumnIndex] ?? 'pendaftaran_id', $orderDirection);

        // Get data
        $data = $builder->get()->getResultArray();

        // Response sesuai format DataTables
        return $this->response->setJSON([
            'draw' => intval($request->getGet('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }

    public function viewDetail($id)
    {
        $model = new ViewDataPendaftaran();
        $modelPelatihan = new PelatihanModel();
        $modelPekerjaan = new PengalamanKerjaModel();
        $asesor = new UserModel();

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->where('pendaftaran_id', $id)->findAll();
        $data['asesor'] = $asesor->select('users.id, detail_asesor.nama_lengkap')->join('detail_asesor', 'detail_asesor.email = users.email')->where('role', 'asesor')->where('status', 'Y')->findAll();

        return $this->render('Kaprodi/DataPendaftaran/view-detail', $data);
    }

    public function assignAsesor()
    {
        $id = $this->request->getVar('pendaftaran_id');
        $asesor_id = $this->request->getVar('asesor_id');

        $model = new PendaftaranModel();
        $assign = $model->where('pendaftaran_id', $id)->set(['asesor_id' => $asesor_id])->update();
        $model->updateStatusPendaftaran($id, 'submitted');

        if ($assign) {
            return redirect()->to('/kaprodi/data-pendaftaran')->with('success', 'Assign Asesor berhasi!');
        } else {
            return redirect()->to('/kaprodi/data-pendaftaran')->with('error', 'Assign Asesor gagal!');
        }
    }
}