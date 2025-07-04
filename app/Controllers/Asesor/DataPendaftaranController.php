<?php

namespace App\Controllers\Asesor;

use App\Models\View\{ViewDataPendaftaran, ViewKurikulum, ViewCapaian};
use App\Models\{UserModel, KurikulumModel, PelatihanModel, PendaftaranModel, TahunAjarModel, PengalamanKerjaModel, PiagamModel, SeminarModel, OrganisasiModel};
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
        $modelPelatihan = new PelatihanModel();
        $modelPiagam = new PiagamModel();
        $modelSeminar = new SeminarModel();
        $modelOrganisasi = new OrganisasiModel();
        $modelPekerjaan = new PengalamanKerjaModel();

        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $modelPelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpiagam'] = $modelPiagam->where('pendaftaran_id', $id)->findAll();
        $data['dtseminar'] = $modelSeminar->where('pendaftaran_id', $id)->findAll();
        $data['dtorganisasi'] = $modelOrganisasi->where('pendaftaran_id', $id)->findAll();
        $data['dtpekerjaan'] = $modelPekerjaan->where('pendaftaran_id', $id)->findAll();

        return $this->render('Asesor/DataPendaftaran/view-detail', $data);
    }

    public function approvePendaftaran($id)
    {
        $model = new ViewDataPendaftaran();
        $model_pelatihan = new PelatihanModel();
        $modelPiagam = new PiagamModel();
        $modelSeminar = new SeminarModel();
        $modelOrganisasi = new OrganisasiModel();
        $model_kurikulum = new TahunAjarModel();
        $modelPekerjaan = new PengalamanKerjaModel();

        $data['dtpekerjaan'] = $modelPekerjaan->where('pendaftaran_id', $id)->findAll();
        $data['dtpendaftaran'] = $model->getDataPendaftaranById($id);
        $data['dtpelatihan'] = $model_pelatihan->where('pendaftaran_id', $id)->findAll();
        $data['dtpiagam'] = $modelPiagam->where('pendaftaran_id', $id)->findAll();
        $data['dtseminar'] = $modelSeminar->where('pendaftaran_id', $id)->findAll();
        $data['dtorganisasi'] = $modelOrganisasi->where('pendaftaran_id', $id)->findAll();
        $data['dtkurikulum'] = $model_kurikulum->where('status', 'Y')->findAll();

        return $this->render('Asesor/validasi', $data);
    }

    public function getMatkulByTahun()
    {
        $tahun = $this->request->getGet('tahun');
        $pendaftaran_id = $this->request->getGet('pendaftaran_id');

        if (!$tahun) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tahun kurikulum tidak ditemukan.'
            ])->setStatusCode(400);
        }

        $kurikulumModel = new KurikulumModel();
        $pendaftaranModel = new PendaftaranModel();

        $pendaftaran = $pendaftaranModel->where('pendaftaran_id', $pendaftaran_id)->first();
        $prodi = $pendaftaran['program_study_id']; // Jika model return array

        // Asumsi kamu punya method getMatkulByTahun di KurikulumModel
        $data = $kurikulumModel->getMatkulByTahun($tahun, $prodi);

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
    // Asesmen
    public function getAsesmen($kode_matkul)
    {
        $asesmenModel = new ViewCapaian();
        $asesmen = $asesmenModel->where('kode_matkul', $kode_matkul)->findAll();
        return $this->render('Asesor/DataCapaian/asesmen', ['asesmen' => $asesmen]);
    }

}