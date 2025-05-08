<?php
namespace App\Models;

use CodeIgniter\Model;

class PertanyaanModel extends Model
{
    protected $table = 'pertanyaan_keamanan';
    protected $allowedFields = ['pertanyaan'];

    public function getPertanyaan()
    {
        return $this->findAll();
    }
}