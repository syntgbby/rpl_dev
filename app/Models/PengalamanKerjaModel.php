<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanKerjaModel extends Model
{
    protected $table = 'riwayat_kerja';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'nama_perusahaan', 'deskripsi_pekerjaan', 'posisi', 'tahun_mulai', 'tahun_selesai', 'file_bukti'
    ];

    public function getPengalamanKerja()
    {
        return $this->findAll();
    }
}
