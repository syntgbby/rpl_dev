<?php
namespace App\Models;

use CodeIgniter\Model;

class TahunAjarModel extends Model
{
    protected $table = 'tahun_ajar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tahun', 'status'];

    public function getTahunAjar()
    {
        return $this->findAll();
    }
    public function getDistinctTahun()
    {
        return $this->select('tahun')
                    ->distinct()
                    ->orderBy('tahun', 'DESC')
                    ->findAll();
    }
}