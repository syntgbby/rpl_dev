<!DOCTYPE html>
<?php
$logoPath = FCPATH . 'assets/media/logos/logoLP3I.png';
$logoSrc = '';
if (file_exists($logoPath)) {
    $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
    $logoData = base64_encode(file_get_contents($logoPath));
    $logoSrc = 'data:image/' . $logoType . ';base64,' . $logoData;
}
?>
<html>

<head>
    <style>
        @page {
            margin-top: 50px;
            margin-bottom: 40px;
            margin-left: 50px;
            margin-right: 50px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
        }

        header {
            position: fixed;
            top: -90px;
            left: 0;
            right: 0;
            height: 90px;
            border-bottom: 2px solid #003366;
            padding: 10px 0 5px 0;
            background: #fff;
        }

        .header-table {
            width: 80%;
            margin: 0 auto;

        }

        .header-table td {
            vertical-align: middle;
        }

        .header-title {
            color: #003366;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding-bottom: 4px;
            letter-spacing: 1px;
        }

        .header-desc {
            font-size: 12px;
            text-align: center;
            color: #003366;
        }

        .header-link {
            color: #003366;
            text-decoration: underline;
        }

        .card {
            border: 1px solid #ddd;
            padding: 18px 15px;
            margin-bottom: 18px;
            border-radius: 7px;
            background: #fff;
            page-break-inside: avoid;
        }

        .card h3,
        .card h4 {
            margin: 0 0 12px 0;
            color: #2c3e50;
            font-size: 15px;
            font-weight: bold;
            border-bottom: 2px solid #333;
            padding-bottom: 6px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-gray-600 {
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #bfc3c9;
            padding: 8px 6px;
            font-size: 12px;
        }

        th {
            background: #1976d2;
            color: #fff;
            font-size: 14px;
            letter-spacing: 1px;
            text-align: center;
        }

        tr:nth-child(even) td {
            background: #f6f8fa;
        }

        .status-badge {
            display: inline-block;
            min-width: 70px;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            color: #fff;
        }
    </style>
</head>

<body>
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

    <!-- Informasi Biodata -->
    <div class="card">
        <h3>Informasi Biodata</h3>
        <table>
            <tr>
                <th style="width:25%; text-align:left;">Nama Lengkap</th>
                <td><?= $dtpendaftaran['nama_lengkap'] ?? '-' ?></td>
            </tr>
            <tr>
                <th style=" text-align:left;">Email</th>
                <td><?= $dtpendaftaran['email'] ?? '-' ?></td>
            </tr>
            <tr>
                <th style=" text-align:left;">N I K</th>
                <td><?= $dtpendaftaran['nik'] ?? '-' ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Tempat dan Tanggal Lahir</th>
                <td>
                    <?= $dtpendaftaran['tempat_lahir'] ?? '-' ?>,
                    <?= isset($dtpendaftaran['tanggal_lahir']) ? date('d F Y', strtotime($dtpendaftaran['tanggal_lahir'])) : '-' ?>
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">No Hp</th>
                <td><?= $dtpendaftaran['no_hp'] ?? '-' ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Alamat</th>
                <td><?= $dtpendaftaran['alamat'] ?? '-' ?></td>
            </tr>
        </table>
    </div>

    <!-- Data Pelatihan -->
    <div class="card">
        <h3>Data Pelatihan</h3>
        <?php if ($dtpelatihan && count($dtpelatihan) > 0): ?>
            <?php foreach ($dtpelatihan as $row): ?>
                <table>
                    <tr>
                        <th style="width:25%; text-align:left;">Nama Pelatihan</th>
                        <td><?= $row['nama_pelatihan'] ?></td>

                    </tr>
                    <tr>
                        <th style="text-align:left;">Penyelenggara</th>
                        <td><?= $row['penyelenggara'] ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Tahun</th>
                        <td><?= $row['tahun'] ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <div>Tidak ada data pelatihan.</div>
        <?php endif; ?>
    </div>

    <!-- Data Piagam -->
    <div class="card">
        <h3>Data Piagam/Penghargaan</h3>
        <table>
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px">No</th>
                    <th>Bentuk Penghargaan</th>
                    <th>Pemberi</th>
                    <th class="text-center">Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtpiagam): ?>
                    <?php $no = 1;
                    foreach ($dtpiagam as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['bentuk_penghargaan'] ?></td>
                            <td><?= $row['pemberi'] ?></td>
                            <td class="text-center"><?= $row['tahun'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aplikan tidak mengisi piagam/penghargaan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Data Seminar -->
    <div class="card">
        <h3>Data Seminar</h3>
        <table>
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px">No</th>
                    <th>Judul Kegiatan</th>
                    <th>Penyelenggara</th>
                    <th>Peran</th>
                    <th class="text-center">Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtseminar): ?>
                    <?php $no = 1;
                    foreach ($dtseminar as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['judul_kegiatan'] ?></td>
                            <td><?= $row['penyelenggara'] ?></td>
                            <td><?= $row['peran'] ?></td>
                            <td class="text-center"><?= $row['tahun'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aplikan tidak mengisi seminar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Data Organisasi -->
    <div class="card">
        <h3>Data Organisasi</h3>
        <table>
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px">No</th>
                    <th>Nama Organisasi</th>
                    <th>Jabatan</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Bukti</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtorganisasi): ?>
                    <?php $no = 1;
                    foreach ($dtorganisasi as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_organisasi'] ?></td>
                            <td><?= $row['jabatan_anggota'] ?></td>
                            <td class="text-center"><?= $row['tahun'] ?></td>
                            <td class="text-center">
                                <?php if ($row['file_bukti']): ?>
                                    <a href="<?= $row['file_bukti'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fas fa-file-pdf me-1"></i> Lihat Bukti
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aplikan tidak mengisi organisasi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Data Riwayat Pekerjaan -->
    <div class="card">
        <h3>Data Riwayat Pekerjaan</h3>
        <?php if ($dtpekerjaan && count($dtpekerjaan) > 0): ?>
            <?php foreach ($dtpekerjaan as $row): ?>
                <table>
                    <tr>
                        <th style="width:25%; text-align:left;">Nama Perusahaan</th>
                        <td><?= $row['nama_perusahaan'] ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Deskripsi Pekerjaan</th>
                        <td><?= $row['deskripsi_pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Posisi</th>
                        <td><?= $row['posisi'] ?></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Lama Kerja</th>
                        <td><?= $totalLamaBekerja ?> Tahun</td>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <div>Tidak ada data pekerjaan.</div>
        <?php endif; ?>
    </div>

    <!-- Data Kurikulum Asesmen Mandiri -->
    <div class="card">
        <h3>Data Kurikulum Asesmen Mandiri</h3>
        <table>
            <thead class="table-light">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Mata Kuliah</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">Tahun Ajaran</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($asesmenMandiri): ?>
                    <?php $no = 1;
                    foreach ($asesmenMandiri as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['kode_matkul'] ?></td>
                            <td><?= $row['nama_matkul'] ?></td>
                            <td><?= $row['tahun'] ?></td>
                            <td><?= $row['sks'] ?></td>
                            <td class="text-center">
                                <?php if ($row['status'] == 'Y'): ?>
                                    <span class="badge bg-warning text-white">Mengajukan</span>
                                <?php else: ?>
                                    <span class="badge bg-info text-white">Tidak Mengajukan</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Anda belum melakukan asesmen mandiri</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Data Kurikulum yang Diapprove -->
    <div class="card">
        <h3>Data Kurikulum yang Diapprove</h3>
        <table>
            <thead>
                <tr>
                    <th style="width:40px;">No</th>
                    <th style="width:100px;">Kode Mata Kuliah</th>
                    <th>Mata Kuliah</th>
                    <th style="width:100px;">Tahun Ajaran</th>
                    <th style="width:40px;">SKS</th>
                    <th style="width:70px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($approvalWithKurikulum && count($approvalWithKurikulum) > 0): ?>
                    <?php $no = 1;
                    foreach ($approvalWithKurikulum as $row): ?>
                        <tr>
                            <td style="text-align:center;"><?= $no++ ?></td>
                            <td><?= $row['kode_matkul'] ?></td>
                            <td><?= $row['nama_matkul'] ?></td>
                            <td style="text-align:center;"><?= $row['tahun'] ?></td>
                            <td style="text-align:center;"><?= $row['sks'] ?></td>
                            <td style="text-align:center;">
                                <?php if ($row['status'] == 'Y'): ?>
                                    <span class="status-sangat-baik">Disetujui</span>
                                <?php else: ?>
                                    <span class="status-default">Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">
                            Belum ada data kurikulum yang diapprove.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Data Asesmen per Mata Kuliah -->
    <?php if (!empty($asesmenData)): ?>
        <?php foreach ($asesmenData as $kode_matkul => $data_asesmen): ?>
            <div class="card">
                <h4 style="font-size:14px;"><?= strtoupper($data_asesmen['nama_matkul']) ?></h4>
                <table>
                    <thead>
                        <tr>
                            <th style="width:42px;">No</th>
                            <th>Capaian Pembelajaran</th>
                            <th style="width:100px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data_asesmen['asesmen'])): ?>
                            <?php $no = 1;
                            foreach ($data_asesmen['asesmen'] as $asesmen): ?>
                                <tr>
                                    <td style="text-align:center;"><?= $no++ ?></td>
                                    <td><?= $asesmen['deskripsi'] ?></td>
                                    <td style="text-align:center;">
                                        <?php
                                        switch ($asesmen['status']) {
                                            case 'Sangat Baik':
                                                echo '<span class=" status-sangat-baik">Sangat Baik</span>';
                                                break;
                                            case 'Baik':
                                                echo '<span class=" status-baik">Baik</span>';
                                                break;
                                            case 'Cukup':
                                                echo '<span class=" status-cukup">Cukup</span>';
                                                break;
                                            default:
                                                echo '<span class=" status-default">Belum Dinilai</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" style="text-align:center; color:#6c757d;">
                                    Tidak ada data asesmen untuk mata kuliah ini.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>