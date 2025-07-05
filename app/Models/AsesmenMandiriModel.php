<?php
namespace App\Models;

use CodeIgniter\Model;

class AsesmenMandiriModel extends Model
{
    protected $table = 'asesmen_mandiri';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'kurikulum_id', 'status'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getAsesmenMandiri($pendaftaran_id)
    {
        return $this->select('asesmen_mandiri.*, 
            view_kurikulum.kode_matkul,
            view_kurikulum.nama_matkul, 
            view_kurikulum.sks, 
            view_kurikulum.nama_prodi, 
            view_kurikulum.tahun')
            ->join('view_kurikulum', 'asesmen_mandiri.kurikulum_id = view_kurikulum.id')
            ->where('asesmen_mandiri.pendaftaran_id', $pendaftaran_id)
            ->orderBy('view_kurikulum.nama_matkul', 'ASC')
            ->findAll();
    }

}