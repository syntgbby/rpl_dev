<?php

namespace App\Models;

use CodeIgniter\Model;

class SeminarModel extends Model
{
    protected $table = 'seminar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id',
        'judul_kegiatan',
        'penyelenggara',
        'tahun',
        'peran',
        'file_bukti'
    ];
}
