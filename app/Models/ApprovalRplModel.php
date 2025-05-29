<?php
namespace App\Models;

use CodeIgniter\Model;

class ApprovalRplModel extends Model
{
    protected $table = 'approval_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'kurikulum_id', 'status'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}