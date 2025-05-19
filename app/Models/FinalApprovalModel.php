<?php
namespace App\Models;

use CodeIgniter\Model;

class FinalApprovalModel extends Model
{
    protected $table = 'final_approval';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'status', 'type'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}