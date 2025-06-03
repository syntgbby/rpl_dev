<?php

namespace App\Controllers\Aplikan;

use App\Models\View\ViewKurikulum;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class Detailpendaftaran extends BaseController
{
    // Tampilan Index
    public function index()
    {
        return $this->render('Aplikan/Detailpendaftaran/index');
    }

}