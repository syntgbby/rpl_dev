<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianDtl extends Model
{
    protected $table = 'capaian_rpl_dtl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'capaian_id', 'status'];

    // Method untuk inner join dengan capaian_rpl
    public function getAsesmenWithCapaian()
    {
        return $this->select('capaian_rpl_dtl.*, capaian_rpl.deskripsi, capaian_rpl.kurikulum_id')
            ->join('capaian_rpl', 'capaian_rpl.id = capaian_rpl_dtl.capaian_id')
            ->findAll();
    }
}