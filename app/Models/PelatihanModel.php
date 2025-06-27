<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'nama_pelatihan', 'penyelenggara', 'tahun', 'file_bukti','lama_jam','lama_hari'
    ];
}
