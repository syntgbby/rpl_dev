<?php
namespace App\Models;

use CodeIgniter\Model;

class StatusRPLModel extends Model
{
    protected $table = 'status_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'icon', 'status', 'keterangan', 'created_at'];

    public function getTimeline()
    {
        return $this->findAll();
    }
}