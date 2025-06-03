<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAsesorModel extends Model
{
    protected $table = 'detail_asesor';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'nama_lengkap', 'nip_nidn', 'tempat_lahir', 'tanggal_lahir', 'pangkat_golongan', 'jabatan', 'bidang_ilmu_keahlian', 'pendidikan_terakhir', 'telepon', 'alamat', 'created_at'];

    public function getDetailAsesor($email)
    {
        return $this->where('email', $email)->first();
    }
    
    public function updateAsesor($email, $nama)
    {
        return $this->update($email, ['nama_lengkap' => $nama]);
    }
}