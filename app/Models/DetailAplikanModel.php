<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAplikanModel extends Model
{
    protected $table = 'detail_aplikan';
    protected $allowedFields = ['email', 'jenis_kelamin', 'agama', 'tempat_lahir', 'bukti_pembayaran', 'tanggal_lahir', 'telepon', 'alamat', 'prodi_id', 'pendidikan_terakhir', 'nama_asal_sekolah', 'tahun_lulus', 'asal_informasi', 'asal_informasi_lainnya', 'pertanyaan_id', 'jawaban'];

    public function getDetailAplikan($email)
    {
        return $this->where('email', $email)->first();
    }
}