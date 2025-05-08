<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_prodi', 'deskripsi_singkat', 'deskripsi_lengkap', 'jenjang_karir', 'pict'];

    public function getProdi()
    {
        return $this->findAll();
    }
}