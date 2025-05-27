<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\View\ViewDataPendaftaran;
use App\Models\PelatihanModel;

class DataLaporanRplController extends BaseController
{
    public function index()
    {
        return view('Asesor/DataLaporan/index');
    }
}