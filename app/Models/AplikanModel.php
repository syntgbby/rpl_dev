<?php

namespace App\Models;

use CodeIgniter\Model;

class AplikanModel extends Model
{
    protected $table = 'aplikan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'provinsi', 'kota', 'riwayat_pendidikan', 'tempat_pendidikan', 'created_at'];

    public function getAplikan()
    {
        return $this->findAll();
    }

    public function getAplikanByYear($year)
    {
        return $this->where('YEAR(created_at)', $year)
                    ->findAll();
    }
} 