<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AplikanModel;
use App\Models\ProdiModel;
use App\Models\PendaftaranModel;
use App\Models\TimelineModel;
use App\Models\View\ViewDataPendaftaran;
use CodeIgniter\Database\RawSql;

class DashController extends BaseController
{
    protected $userModel;
    protected $aplikanModel;
    protected $prodiModel;
    protected $pendaftaranModel;
    protected $timelineModel;
    protected $viewPendaftaran;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->aplikanModel = new AplikanModel();
        $this->prodiModel = new ProdiModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->timelineModel = new TimelineModel();
        $this->viewPendaftaran = new ViewDataPendaftaran();
    }

    public function index()
    {
        $email = session()->get('email');

        if (!$email) {
            return redirect()->to('/login');
        }

        $where = ['email' => $email];
        $dataUser = $this->userModel->where($where)->first();

        if (!$dataUser) {
            return redirect()->to('/login');
        }

        $user = $this->userModel->where($where)->first();

        if ($dataUser['role'] === "aplikan") {
            $pendaftaran = $this->viewPendaftaran->where('email', $email)->first();

            if ($pendaftaran) {
                $timeline = $this->timelineModel->where('pendaftaran_id', $pendaftaran['pendaftaran_id'])->findAll();
            } else {
                $timeline = [];
            }

            $data_aplikan = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole('aplikan'),
                'pendaftaran' => $pendaftaran,
                'timeline' => $timeline
            ];
            return $this->render('Dashboard/dashboard-aplikan', $data_aplikan);
        } else if ($dataUser['role'] === "admin") {
            // Query untuk mendapatkan user yang belum mendaftar
            $getSdhMendaftar = $this->userModel->select('users.*')
                ->join('pendaftaran_rpl', 'users.email = pendaftaran_rpl.email', 'left')
                ->where('users.role', 'aplikan')
                ->where('pendaftaran_rpl.email IS NOT NULL')
                ->findAll();

            // Query untuk mendapatkan total aplikan
            $totalAplikan = $this->userModel->where('role', 'aplikan')->countAllResults();

            // Query untuk mendapatkan jumlah asesor aktif
            $asesor = $this->userModel->where('role', 'asesor')
                ->where('status', 'y')
                ->countAllResults();

            $data_admin = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole('aplikan'),
                'sdhMendaftar' => $getSdhMendaftar,
                'totalAplikan' => $totalAplikan,
                'asesor' => $asesor
            ];
            return $this->render('Dashboard/dashboard-admin', $data_admin);
        } else if ($dataUser['role'] === "kaprodi") {
            // Query untuk mendapatkan jumlah asesor aktif
            $asesor = $this->userModel->where('role', 'asesor')
                ->where('status', 'y')
                ->countAllResults();

            $prodi = $this->prodiModel->countAllResults();

            $data_kaprodi = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $prodi,
                'aplikan' => $this->userModel->getAplikanByRole($dataUser['role']),
                'asesor' => $asesor
            ];

            return $this->render('Dashboard/dashboard-kaprodi', $data_kaprodi);
        } else {
            // Query untuk mendapatkan jumlah asesor aktif
            $asesor = $this->userModel->where('role', 'asesor')
                ->where('status', 'y')
                ->countAllResults();

            $data_asesor = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->findAll(),
                'pendaftaran' => $this->pendaftaranModel->select('prodi.nama_prodi, pendaftaran_rpl.*')->join('prodi', 'prodi.id = pendaftaran_rpl.program_study_id', 'left')
                    ->where('pendaftaran_rpl.created_at >=', new RawSql('DATE_SUB(NOW(), INTERVAL 60 DAY)'))
                    ->orderBy('pendaftaran_rpl.created_at', 'desc')
                    ->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole($dataUser['role']),
                'asesor' => $asesor
            ];
            return $this->render('Dashboard/dashboard-asesor', $data_asesor);
        }
    }
}
