<?php
namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiStepModel extends Model
{
    protected $table = 'konfirmasi_step';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'step', 'status'];

    public function getKonfirmasiStep()
    {
        return $this->findAll();
    }
}