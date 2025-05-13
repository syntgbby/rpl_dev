<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_matkul', 'sks', 'status'
    ];

    protected $useTimestamps = true;

    public function getMataKuliah()
    {
        return $this->findAll();
    }
}
