<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;

class Pendaftaran extends BaseController
{
    public function checkStatusPendaftaran($pendaftaran_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('timeline');

        $timeline = $builder->where('pendaftaran_id', $pendaftaran_id)->get()->getRowArray();

        if (!$timeline) {
            return redirect()->to('/aplikan/pendaftaran/step1');
        }

        if (empty($timeline['step1'])) {
            return redirect()->to('/aplikan/pendaftaran/step1');
        }

        if (empty($timeline['step2'])) {
            return redirect()->to('/aplikan/pendaftaran/step2');
        }

        if (empty($timeline['step3'])) {
            return redirect()->to('/aplikan/pendaftaran/step3');
        }

        return redirect()->to('/aplikan/pendaftaran/selesai');
    }
}
