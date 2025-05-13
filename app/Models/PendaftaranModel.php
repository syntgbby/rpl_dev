<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'user_id', 'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'no_hp', 'email', 'status_pendaftaran', 'program_study', 'tahun_angkatan'
    ];

    public function getPendaftaran()
    {
        return $this->findAll();
    }
}
