<?php

namespace App\Models;

use CodeIgniter\Model;

class KurikulumProdiModel extends Model
{
    protected $table = 'kurikulum_prodi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prodi_id', 'tahun_ajar_id', 'status'];

    public function getActiveKurikulumWithTahunAjar($prodi_id)
    {
        return $this->select('kurikulum_prodi.*, tahun_ajar.tahun_ajar')
            ->join('tahun_ajar', 'tahun_ajar.id = kurikulum_prodi.tahun_ajar_id')
            ->where('kurikulum_prodi.prodi_id', $prodi_id)
            ->where('kurikulum_prodi.status', 'Y')
            ->first();
    }
}
