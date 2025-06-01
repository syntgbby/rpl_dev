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

    // Di ApprovalRplModel
    public function getApprovalWithKurikulum($pendaftaran_id)
    {
        return $this->select('approval_rpl.*, 
            view_kurikulum.kode_matkul,
            view_kurikulum.nama_matkul, 
            view_kurikulum.sks, 
            view_kurikulum.nama_prodi, 
            view_kurikulum.tahun')
            ->join('view_kurikulum', 'approval_rpl.kurikulum_id = view_kurikulum.id')
            ->where('approval_rpl.pendaftaran_id', $pendaftaran_id)
            ->findAll();
    }
}