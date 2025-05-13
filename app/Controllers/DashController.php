<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AplikanModel;
use App\Models\ProdiModel;
use App\Models\PendaftaranModel;
use App\Models\TimelineModel;

class DashController extends BaseController
{
    protected $userModel;
    protected $aplikanModel;
    protected $prodiModel;
    protected $pendaftaranModel;
    protected $timelineModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->aplikanModel = new AplikanModel();
        $this->prodiModel = new ProdiModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->timelineModel = new TimelineModel();
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

        // Query untuk mendapatkan user yang belum mendaftar
        $getBlmMendaftar = $this->userModel->select('users.*')
            ->join('pendaftaran_rpl', 'users.email = pendaftaran_rpl.email', 'left')
            ->where('users.role', 'aplikan')
            ->where('pendaftaran_rpl.pendaftaran_id IS NULL')
            ->findAll();

        // Query untuk mendapatkan total aplikan
        $totalAplikan = $this->userModel->where('role', 'aplikan')->countAllResults();

        // Query untuk mendapatkan jumlah asesor aktif
        $asesor = $this->userModel->where('role', 'asesor')
            ->where('status', 'y')
            ->countAllResults();

        $user = $this->userModel->where($where)->first();

        if ($dataUser['role'] === "aplikan") {
            $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();

            if ($pendaftaran) {
                $timeline = $this->timelineModel->where('pendaftaran_id', $pendaftaran['pendaftaran_id'])->findAll();
            } else {
                $timeline = [];
            }

            $data_aplikan = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->where('type =', 1)->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole($dataUser['role']),
                'belumMendaftar' => $getBlmMendaftar,
                'totalAplikan' => $totalAplikan,
                'asesor' => $asesor,
                'pendaftaran' => $pendaftaran,
                'timeline' => $timeline,
                // 'aplikan' => $this->aplikanModel->getAplikan(),
                // 'aplikan2025' => $this->aplikanModel->getAplikanByYear(2025)
            ];
            return $this->render('Dash/dashboard-aplikan', $data_aplikan);
        } else if ($dataUser['role'] === "admin") {
            $data_admin = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->where('type =', 1)->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole($dataUser['role']),
                'belumMendaftar' => $getBlmMendaftar,
                'totalAplikan' => $totalAplikan,
                'asesor' => $asesor,
                // 'aplikan' => $this->aplikanModel->getAplikan(),
                // 'aplikan2025' => $this->aplikanModel->getAplikanByYear(2025)
            ];
            return $this->render('Dash/dashboard-admin', $data_admin);
        } else {
            $data_asesor = [
                'title' => 'Dashboard',
                'user' => $this->userModel->getUser(),
                'dataUser' => $user,
                'prodi' => $this->prodiModel->where('type =', 1)->findAll(),
                'aplikan' => $this->userModel->getAplikanByRole($dataUser['role']),
                'belumMendaftar' => $getBlmMendaftar,
                'totalAplikan' => $totalAplikan,
                'asesor' => $asesor,
                // 'aplikan' => $this->aplikanModel->getAplikan(),
                // 'aplikan2025' => $this->aplikanModel->getAplikanByYear(2025)
            ];
            return $this->render('Dash/dashboard-asesor', $data_asesor);
        }
    }

    public function timeline()
    {
        $email = session()->get('email');
        $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();
    }
}
