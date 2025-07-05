<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganisasiModel extends Model
{
    protected $table = 'organisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id',
        'nama_organisasi',
        'jabatan_anggota',
        'tahun',
        'file_bukti'
    ];
}
