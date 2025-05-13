<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'user_id', 'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'no_hp', 'email', 'status_pendaftaran', 'program_study_id', 'tahun_angkatan', 'tahun_ajar_id'
    ];

    public function getPendaftaran()
    {
        return $this->findAll();
    }

    public function updateStatusPendaftaran($pendaftaranId, $status)
    {
        $this->update($pendaftaranId, ['status_pendaftaran' => $status]);
    }
}
