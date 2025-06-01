<?php
namespace App\Models;

use CodeIgniter\Model;

class TimelineModel extends Model
{
    protected $table = 'timeline';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'icon', 'status', 'keterangan', 'waktu'];

    public function getTimeline()
    {
        return $this->findAll();
    }

    // Fungsi cek status konfirmasi
    public function getStatusKonfirmasiByPendaftaranId($pendaftaran_id)
    {
        return $this->where('pendaftaran_id', $pendaftaran_id)
                    ->where('status', 'konfirmasi') // sesuaikan nilai 'konfirmasi' dengan data sebenarnya
                    ->first();
    }
}
