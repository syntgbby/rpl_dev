<?php

namespace App\Models;

use CodeIgniter\Model;

class KurikulumModel extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prodi_id', 'tahun_ajar_id', 'kode_matkul', 'status'];

    public function getMatkulByTahun($tahun, $prodi)
    {
        return $this->select('kurikulum.id, kurikulum.kode_matkul, mata_kuliah.nama_matkul')
            ->join('tahun_ajar', 'tahun_ajar.id = kurikulum.tahun_ajar_id')
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul = kurikulum.kode_matkul')
            ->where('kurikulum.status', 'Y')
            ->where('tahun_ajar.id', $tahun)
            ->where('kurikulum.prodi_id', $prodi)
            ->orderBy('mata_kuliah.nama_matkul', 'ASC')
            ->findAll();
    }
}