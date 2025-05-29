<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keputusan RPL <?= $prodi ?></title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .mt-2 {
            margin-top: 1rem;
        }

        .fw-bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        .content {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        td,
        th {
            padding: 6px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="content">
        <!-- Tambahkan gambar di sini -->
        <?php helper('url'); ?>
        <?php
        $imgPath = FCPATH . 'assets/img/lp3itugasta.jpeg';
        $type = pathinfo($imgPath, PATHINFO_EXTENSION);
        $data = file_get_contents($imgPath);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <div class="text-center">
            <img src="<?= $base64 ?>" style="width: 700px; height:auto;">
        </div>
        <div class="content">
            <?php $tahunAkademik = date('Y') . '/' . (date('Y') + 1); ?>
            <h4 class="text-center fw-bold underline">SURAT KEPUTUSAN</h4>
            <h4 class="text-center fw-bold">PIMPINAN PERGURUAN TINGGI POLITEKNIK LP3I JAKARTA</h4>
            <h5 class="text-center">NOMOR: ................................................</h5>
            <h5 class="text-center mt-2">TENTANG</h5>
            <h5 class="text-center fw-bold">PENGAKUAN KELULUSAN MATA KULIAH PROSES ASESMEN</h5>
            <h5 class="text-center fw-bold">PROGRAM REKOGNISI PEMBELAJARAN LAMPAU <br>PROGRAM STUDI
                <?= strtoupper($prodi) ?>
            </h5>
            <h5 class="text-center">TAHUN AKADEMIK <?= $tahunAkademik ?></h5>

            <p class="mt-4"><strong>Direktur Politeknik LP3I Jakarta, Akhwanul Akhmal, M.Si</strong></p>

            <p><strong>Menimbang:</strong></p>
            <ol type="a">
                <li>bahwa berdasarkan pelaksanaan asesmen pemohon pada Program Rekognisi Pembelajaran Lampau Program
                    <?= $prodi ?> Perguruan Tinggi Politeknik LP3I Jakarta perlu menetapkan hasil/nilai asesmen
                    rekognisi pembelajaran lampau Tahun Akademik <?= $tahunAkademik ?>
                </li>
                <li>bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a, perlu menetapkan Keputusan
                    Pimpinan Perguruan Tinggi Politeknik LP3I Jakarta tentang Pengakuan Kelulusan Mata Kuliah Proses
                    Asesmen Program Rekognisi Pembelajaran Lampau Program Studi <?= $prodi ?> Perguruan Tinggi
                    Politeknik LP3I Jakarta Tahun Akademik <?= $tahunAkademik ?></li>
            </ol>

            <p><strong>Mengingat:</strong></p>
            <ol type="a">
                <li>Undang-undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi;</li>
                <li>Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi;</li>
                <li>Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 26 Tahun 2016 tentang Rekognisi
                    Pembelajaran Lampau;</li>
                <li>Keputusan Direktur Perguruan Tinggi Politeknik LP3I Jakarta Nomor ............. tentang Peraturan
                    Akademik dan Kedisiplinan Mahasiswa;</li>
            </ol>

            <p class="fw-bold mt-4">MEMUTUSKAN:</p>

            <p><strong>Menetapkan:</strong> Keputusan Direktur Politeknik LP3I Jakarta tentang Pengakuan Kelulusan Mata
                Kuliah Proses Asesmen Program Rekognisi Pembelajaran Lampau Program Studi <?= $prodi ?> Tahun
                Akademik <?= $tahunAkademik ?></p>

            <p><strong>Kesatu:</strong> Setelah mengikuti asesmen pada Program Studi <?= $prodi ?> Perguruan
                Tinggi Politeknik LP3I Jakarta maka calon
                mahasiswa yang namanya terdapat pada lajur 2 dinyatakan lulus untuk
                mata kuliah seperti yang didiskripsikan pada lajur 4 sebagaimana
                Pedoman RPL Tipe <?= $type ?> Prodi <?= $prodi ?> – <?= $tahunAkademik ?>
                tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan
                dari Keputusan Pimpinan Perguruan Tinggi Politeknik LP3I Jakarta ini.</p>
            <p><strong>Kedua:</strong> Calon mahasiswa sebagaimana dimaksud dalam Diktum KESATU
                diwajibkan melakukan registrasi untuk pendidikan selanjutnya dan
                mengikuti semua ketentuan peraturan perundang-undangan</p>
            <p><strong>Ketiga:</strong> Keputusan Pimpinan Perguruan Tinggi Politeknik LP3I Jakarta ini mulai
                berlaku pada semester <?= $semester ?> Tahun Akademik <?= $tahunAkademik ?></p> <br>

            <h5 class="text-dark mb-3 border-bottom pb-2">Daftar Mata Kuliah Pengajuan RPL</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead style="background-color: #e2eafc;">
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Mengajukan RPL</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rplMatkul)): ?>
                            <?php $no = 1;
                            foreach ($rplMatkul as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="text-start"><?= esc($row['nama_matkul']) ?></td>
                                    <td>
                                        <?php if ($row['status'] === 'Y'): ?>
                                            <span class="badge bg-success">Ya</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Tidak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] === 'Y'): ?>
                                            <span class="text-success fw-bold">Disetujui</span>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak diajukan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pengajuan RPL</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>



            <p class="mt-4 text-right">Jakarta, <?= tanggal_indo(date('Y-m-d')) ?><br>
                Direktur,<br><br><br><br>
                <strong>Akhwanul Akhmal, M.Si</strong>
            </p>
        </div>
</body>

</html>