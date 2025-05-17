<?php

namespace App\Models;

use CodeIgniter\Model;

class KurikulumModel extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prodi_id', 'tahun_ajar_id', 'kode_matkul', 'status'];
    
    public function getMatkulByTahun($tahun)
    {
        return $this->select('kurikulum.id, kurikulum.kode_matkul, kurikulum.nama_matkul')
            ->join('tahun_ajar', 'tahun_ajar.id = kurikulum.tahun_ajar_id')
            ->where('tahun_ajar.tahun', $tahun)
            ->findAll();
    }
}
