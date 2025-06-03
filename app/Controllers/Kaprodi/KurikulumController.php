<?php

namespace App\Controllers\Kaprodi;

use App\Models\View\{ViewKurikulum, ViewCapaian};
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Models\CapaianRPL;
use App\Controllers\BaseController;

class KurikulumController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        $kurikulumModel = new ViewKurikulum();
        $prodiModel = new ProdiModel();
        $tahunModel = new TahunAjarModel();

        // Ambil data filter dari input GET
        $filterProdi = $this->request->getGet('prodi');
        $filterTahun = $this->request->getGet('tahun');

        // Gunakan model dengan chaining `where()`
        if ($filterProdi && $filterTahun) {
            $kurikulum = $kurikulumModel->where('prodi_id', $filterProdi)
                ->where('tahun', $filterTahun)
                ->orderBy('nama_matkul', 'ASC')
                ->findAll();
        } elseif ($filterProdi) {
            $kurikulum = $kurikulumModel->where('prodi_id', $filterProdi)->orderBy('nama_matkul', 'ASC')->findAll();
        } elseif ($filterTahun) {
            $kurikulum = $kurikulumModel->where('tahun', $filterTahun)->orderBy('nama_matkul', 'ASC')->findAll();
        } else {
            $kurikulum = $kurikulumModel->orderBy('nama_matkul', 'ASC')->findAll();
        }

        $data = [
            'kurikulum' => $kurikulum,
            'prodi' => $prodiModel->findAll(),
            'listTahun' => $tahunModel->select('tahun')->groupBy('tahun')->findAll(),
            'filterProdi' => $filterProdi,
            'filterTahun' => $filterTahun
        ];

        return $this->render('Kaprodi/DataKurikulum/index', $data);
    }

    public function getAsesmen($kode_matkul)
    {
        $asesmenModel = new ViewCapaian();
        $asesmen = $asesmenModel->where('kode_matkul', $kode_matkul)->findAll();
        return $this->render('Kaprodi/DataKurikulum/asesmen', ['asesmen' => $asesmen]);
    }
}