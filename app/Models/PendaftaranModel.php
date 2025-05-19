<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'asesor_id', 'user_id', 'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'no_hp', 'email', 'status_pendaftaran', 'program_study_id', 'tahun_angkatan', 'tahun_ajar_id', 'status_pendaftaran'
    ];

    public function getPendaftaran()
    {
        return $this->findAll();
    }

    public function getDataPendaftaranById($id)
    {
        return $this->where('pendaftaran_id', $id)->first();
    }

    public function updateStatusPendaftaran($pendaftaranId, $status)
    {
        $this->update($pendaftaranId, ['status_pendaftaran' => $status]);
    }

    public function assignAsesor($pendaftaranId, $asesorId)
    {
        $this->update('pendaftaran_rpl', ['asesor_id' => $asesorId], ['pendaftaran_id' => $pendaftaranId]);
    }
}
