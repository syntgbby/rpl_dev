<?php

namespace App\Controllers\Aplikan;

use App\Models\{UserModel, PendaftaranModel, PelatihanModel, PengalamanKerjaModel, BuktiPendukungModel, TimelineModel, ProdiModel, DetailAplikanModel, TahunAjarModel, KonfirmasiStepModel};
use App\Controllers\BaseController;

helper('text');

class PendaftaranController extends BaseController
{
    protected $pendaftaranModel;
    protected $pelatihanModel;
    protected $detailAplikanModel;
    protected $pengalamanKerjaModel;
    protected $buktiPendukungModel;
    protected $timelineModel;
    protected $prodiModel;
    protected $tahunAjarModel;
    protected $konfirmasiStepModel;
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->pelatihanModel = new PelatihanModel();
        $this->detailAplikanModel = new DetailAplikanModel();
        $this->pengalamanKerjaModel = new PengalamanKerjaModel();
        $this->buktiPendukungModel = new BuktiPendukungModel();
        $this->timelineModel = new TimelineModel();
        $this->prodiModel = new ProdiModel();
        $this->tahunAjarModel = new TahunAjarModel();
        $this->konfirmasiStepModel = new KonfirmasiStepModel();
    }

    public function statusPendaftaran()
    {
        return $this->render('Dash/status-pendaftaran');
    }

    public function step1()
    {
        $email = session()->get('email'); // pastikan user sudah login
        $nama_lengkap = session()->get('name');
        $user = $this->userModel->where('email', $email)->first();

        $dataUser = $this->detailAplikanModel->where('email', $email)->first();

        if ($dataUser) {
            $dataUser['nama_lengkap'] = $user['nama_lengkap'];
            $prodi = $this->prodiModel->findAll();

            return $this->render('aplikan/pendaftaran/step1', ['data' => $dataUser, 'prodi' => $prodi]);
        } else {
            $dataUser['nama_lengkap'] = $nama_lengkap;
            $prodi = $this->prodiModel->findAll();

            return redirect()->to('/dashboard')->with('error', 'Lengkapi Biodata Diri Terlebih Dahulu Dengan Benar!');
        }
    }

    public function saveStep1()
    {
        $email = session()->get('email');
        $tahunAngkatan = date('Y');
        $formatTahun = date('Ym');
        $tanggalLahir = $this->request->getPost('tanggal_lahir');
        $formatTanggalLahir = date('ym', strtotime($tanggalLahir));
        $tahunAjar = $this->tahunAjarModel->where('status', 'Y')->first();
        $pendaftaranId = 'FRPL' . $formatTahun . random_string('numeric', 2) . $formatTanggalLahir;

        $getUser = $this->detailAplikanModel->where('email', $email)->first();

        $checkPendaftaran = $this->pendaftaranModel->where('email', $email)->first();

        if ($checkPendaftaran) {
            return redirect()->to('/aplikan/pendaftaran')->with('error', 'Anda sudah melakukan pendaftaran!');
        }

        $data = [
            'pendaftaran_id' => $pendaftaranId,
            'tahun_angkatan' => $tahunAngkatan,
            'tahun_ajar_id' => $tahunAjar['id'],
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nik' => $this->request->getPost('nik'),
            'program_study_id' => $this->request->getPost('program_studi'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $getUser['jenis_kelamin'],
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $email,
        ];

        $this->pendaftaranModel->insert($data);

        $data_timeline = [
            'pendaftaran_id' => $pendaftaranId,
            'icon' => 'ki-outline ki-user fs-2 text-warning',
            'status' => 'Upload Biodata',
            'keterangan' => 'Biodata berhasil diupload',
        ];

        $this->timelineModel->insert($data_timeline);

        $data_konfirmasi_step = [
            [
                'pendaftaran_id' => $pendaftaranId,
                'step' => 'step2',
                'status' => null,
            ],
            [
                'pendaftaran_id' => $pendaftaranId,
                'step' => 'step3',
                'status' => null,
            ]
        ];

        $this->konfirmasiStepModel->insertBatch($data_konfirmasi_step);
        $this->pendaftaranModel->updateStatusPendaftaran($pendaftaranId, 'draft');

        return redirect()->to('/aplikan/pendaftaran/step2')->with('success', 'Submit Biodata Diri berhasil!');
    }

    public function step2()
    {
        $email = session()->get('email');
        $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();

        if ($pendaftaran) {
            $pendaftaranId = $pendaftaran['pendaftaran_id'];

            $konfirmasi_step = $this->konfirmasiStepModel->where('pendaftaran_id =', $pendaftaranId)->where('step =', 'step2')->first();
            $pelatihans = $this->pelatihanModel->where('pendaftaran_id =', $pendaftaranId)->get()->getResultArray();
        } else {
            $konfirmasi_step = [];
            $pelatihans = [];
        }

        return $this->render('aplikan/pendaftaran/step2', ['pelatihan' => $pelatihans, 'konfirmasi_step' => $konfirmasi_step]);
    }

    public function updateKonfirmasiStep($step, $status)
    {
        $email = session()->get('email');
        $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $pendaftaranId = $pendaftaran['pendaftaran_id'];

        $data_konfirmasi_step = [
            'status' => $status,
        ];

        if ($step == 'step2') {
            $langkah = 'Pelatihan';
        } else {
            $langkah = 'Pengalaman Kerja';
        }

        $data_timeline = [
            'pendaftaran_id' => $pendaftaranId,
            'icon' => 'ki-outline ki-minus-folder fs-2 text-warning',
            'status' => 'Konfirmasi ' . $langkah,
            'keterangan' => 'Konfirmasi pengisian data ' . $langkah,
        ];

        $this->konfirmasiStepModel->updateKonfirmasiStep($pendaftaranId, $step, $data_konfirmasi_step);
        $this->timelineModel->insert($data_timeline);

        if ($step == 'step2' && $status == 'Y') {
            return redirect()->to('/aplikan/pendaftaran/step2');
        } else if ($step == 'step3' && $status == 'Y') {
            return redirect()->to('/aplikan/pendaftaran/step3');
        } else if ($step == 'step2' && $status == 'N') {
            return redirect()->to('/aplikan/pendaftaran/step3');
        } else {
            return redirect()->to('/aplikan/pendaftaran/step4');
        }
    }

    public function saveStep2()
    {
        $email = session()->get('email');
        $user = $this->userModel->where('email', $email)->first();
        $nama = $user['nama_lengkap'];

        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_bukti' => [
                'label' => 'File Bukti',
                'rules' => 'uploaded[file_bukti]|ext_in[file_bukti,pdf,jpg,jpeg,png]|max_size[file_bukti,2048]',
            ],
        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('file_bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
            // Generate nama acak untuk file
            $fileName = $file->getRandomName();
            $path = FCPATH . 'uploads/bukti-pelatihan/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $file->move($path, $fileName);

                // Buat URL file
                $fileUrl = base_url('uploads/bukti-pelatihan/' . $formatNama . '/' . $fileName);

                // Insert data pelatihan ke database
                $this->pelatihanModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'nama_pelatihan' => $this->request->getPost('nama_pelatihan'),
                    'penyelenggara' => $this->request->getPost('penyelenggara'),
                    'tahun' => $this->request->getPost('tahun'),
                    'file_bukti' => $fileUrl, // Simpan URL file
                ]);

                $checkTimeline = $this->timelineModel->where('pendaftaran_id', $getPendaftaran['pendaftaran_id'])
                    ->where('status', 'Upload Pelatihan')
                    ->first();

                if (!$checkTimeline) {
                    $data_timeline = [
                        'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                        'icon' => 'ki-outline ki-book-open fs-2 text-primary',
                        'status' => 'Upload Pelatihan',
                        'keterangan' => 'Pelatihan berhasil diupload',
                    ];

                    $this->timelineModel->insert($data_timeline);
                }

                $this->pendaftaranModel->updateStatusPendaftaran($getPendaftaran['pendaftaran_id'], 'draft');

                // Redirect ke halaman step 2 dengan pesan sukses
                return redirect()->to('/aplikan/pendaftaran/step2')->with('success', 'Data pelatihan berhasil disimpan');
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }

    public function deletePelatihan($id)
    {
        $this->pelatihanModel->delete($id);
        return redirect()->to('/aplikan/pendaftaran/step2')->with('success', 'Data pelatihan berhasil dihapus');
    }

    public function step3()
    {
        $email = session()->get('email');
        $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();

        if ($pendaftaran) {
            $pendaftaranId = $pendaftaran['pendaftaran_id'];
            $konfirmasi_step = $this->konfirmasiStepModel->where('pendaftaran_id =', $pendaftaranId)->where('step =', 'step3')->first();
            $riwayat_kerja = $this->pengalamanKerjaModel->where('pendaftaran_id =', $pendaftaranId)->get()->getResultArray();

        } else {
            $konfirmasi_step = [];
            $riwayat_kerja = [];
        }

        return $this->render('aplikan/pendaftaran/step3', ['riwayat_kerja' => $riwayat_kerja, 'konfirmasi_step' => $konfirmasi_step]);
    }

    public function saveStep3()
    {
        $email = session()->get('email');

        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $nama = $getPendaftaran['nama_lengkap'];
        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_bukti' => [
                'label' => 'File Bukti',
                'rules' => 'uploaded[file_bukti]|ext_in[file_bukti,pdf,jpg,jpeg,png]|max_size[file_bukti,2048]',
            ],
        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('file_bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama acak untuk file
            $fileName = $file->getRandomName();
            $path = FCPATH . 'uploads/bukti-pengalaman-kerja/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $file->move($path, $fileName);

                // Buat URL file
                $fileUrl = base_url('uploads/bukti-pengalaman-kerja/' . $formatNama . '/' . $fileName);

                // Insert data pelatihan ke database
                $this->pengalamanKerjaModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                    'deskripsi_pekerjaan' => $this->request->getPost('deskripsi_pekerjaan'),
                    'posisi' => $this->request->getPost('posisi'),
                    'tahun_mulai' => $this->request->getPost('tahun_mulai'),
                    'tahun_selesai' => $this->request->getPost('tahun_selesai'),
                    'file_bukti' => $fileUrl, // Simpan URL file
                ]);

                $checkTimeline = $this->timelineModel->where('pendaftaran_id', $getPendaftaran['pendaftaran_id'])
                    ->where('status', 'Upload Pengalaman Kerja')
                    ->first();

                if (!$checkTimeline) {
                    $data_timeline = [
                        'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                        'icon' => 'ki-outline ki-briefcase fs-2 text-dark',
                        'status' => 'Upload Pengalaman Kerja',
                        'keterangan' => 'Pengalaman kerja berhasil diupload',
                    ];

                    $this->timelineModel->insert($data_timeline);
                }

                $this->pendaftaranModel->updateStatusPendaftaran($getPendaftaran['pendaftaran_id'], 'draft');
                // Redirect ke halaman step 2 dengan pesan sukses
                return redirect()->to('/aplikan/pendaftaran/step3')->with('success', 'Data pengalaman kerja berhasil disimpan');
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }

    public function step4()
    {
        return $this->render('aplikan/pendaftaran/step4');
    }

    public function saveStep4()
    {
        $email = session()->get('email');

        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $nama = $getPendaftaran['nama_lengkap'];
        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_ktp' => [
                'label' => 'File KTP',
                'rules' => 'uploaded[file_ktp]|ext_in[file_ktp,pdf,jpg,jpeg,png]|max_size[file_ktp,2048]',
            ],
            'file_kk' => [
                'label' => 'File KK',
                'rules' => 'uploaded[file_kk]|ext_in[file_kk,pdf,jpg,jpeg,png]|max_size[file_kk,2048]',
            ],
            'file_ijazah' => [
                'label' => 'File SKL',
                'rules' => 'uploaded[file_ijazah]|ext_in[file_ijazah,pdf,jpg,jpeg,png]|max_size[file_ijazah,2048]',
            ],
            'file_foto' => [
                'label' => 'File Foto Diri',
                'rules' => 'uploaded[file_foto]|ext_in[file_foto,jpg,jpeg,png]|max_size[file_foto,2048]',
            ],
        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $fileKtp = $this->request->getFile('file_ktp');
        $fileKk = $this->request->getFile('file_kk');
        $fileIjazah = $this->request->getFile('file_ijazah');
        $fileFoto = $this->request->getFile('file_foto');

        if ($fileKtp->isValid() && !$fileKtp->hasMoved() && $fileKk->isValid() && !$fileKk->hasMoved() && $fileIjazah->isValid() && !$fileIjazah->hasMoved() && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Generate nama acak untuk file
            $fileNameKtp = $fileKtp->getRandomName();
            $fileNameKk = $fileKk->getRandomName();
            $fileNameIjazah = $fileIjazah->getRandomName();
            $fileNameFoto = $fileFoto->getRandomName();
            $path = FCPATH . 'uploads/bukti-pendukung/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $fileKtp->move($path, $fileNameKtp);
                $fileKk->move($path, $fileNameKk);
                $fileIjazah->move($path, $fileNameIjazah);
                $fileFoto->move($path, $fileNameFoto);

                // Buat URL file
                $fileUrlKtp = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameKtp);
                $fileUrlKk = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameKk);
                $fileUrlIjazah = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameIjazah);
                $fileUrlFoto = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameFoto);

                // Insert data pelatihan ke database
                $this->buktiPendukungModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'file_ktp' => $fileUrlKtp,
                    'file_kk' => $fileUrlKk,
                    'file_ijazah' => $fileUrlIjazah,
                    'file_foto' => $fileUrlFoto,
                ]);

                $this->pendaftaranModel->updateStatusPendaftaran($getPendaftaran['pendaftaran_id'], 'done');

                $data_timeline1 = [
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'icon' => 'ki-outline ki-folder-added fs-2 text-info',
                    'status' => 'Upload Bukti Pendukung',
                    'keterangan' => 'Bukti pendukung berhasil diupload',
                ];

                $this->timelineModel->insert($data_timeline1);

                $data_timeline2 = [
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'icon' => 'ki-outline ki-check-circle fs-2 text-success',
                    'status' => 'Pendaftaran Selesai',
                    'keterangan' => 'Pendaftaran berhasil disubmit',
                ];

                $insert = $this->timelineModel->insert($data_timeline2);

                // Redirect ke halaman step 2 dengan pesan sukses
                if ($insert) {
                    return redirect()->to('/dashboard')->with('success', 'Pendaftaran RPL berhasil disimpan');
                } else {
                    return redirect()->to('/dashboard')->with('error', 'Pendaftaran RPL gagal disimpan');
                }
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }

    public function cekStep()
    {
        $email = session()->get('email');

        // Ambil data pendaftaran berdasarkan email
        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();

        // Cari step yang belum diselesaikan (status NULL)
        $nextStep = $this->konfirmasiStepModel
            ->where('pendaftaran_id', $getPendaftaran['pendaftaran_id'])
            ->where('status', null)
            ->orderBy('step', 'asc')
            ->first();

        if ($nextStep) {
            // Redirect langsung ke step yang ditemukan
            return redirect()->to('/aplikan/pendaftaran/' . $nextStep['step']);
        }

        // Kalau semua step selesai dan kamu nggak mau redirect ke mana-mana
        // Bisa juga tampilkan error atau diamkan
        return redirect()->back()->with('message', 'Semua step telah diselesaikan.');
    }
}
