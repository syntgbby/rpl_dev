<?php
namespace App\Models;

use CodeIgniter\Model;

class TimelineModel extends Model
{
    protected $table = 'timeline';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'status', 'keterangan'];

    public function getTimeline()
    {
        return $this->findAll();
    }
}