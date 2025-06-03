<!DOCTYPE html>
<html>

<head>
    <style>
        /* CSS khusus PDF */
        body {
            font-family: Arial;
            margin: 20px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .text-gray-600 {
            color: #666;
        }

        .fw-bold {
            font-weight: bold;
        }

        .border-bottom {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="pb-5 fs-6">
                <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Biodata</h3>

                <div class="fw-bold mt-5">Nama Lengkap</div>
                <div class="text-gray-600"><?= $dtpendaftaran['nama_lengkap'] ?? '-' ?></div>

                <div class="fw-bold mt-5">Email</div>
                <div class="text-gray-600"><?= $dtpendaftaran['email'] ?? '-' ?></div>

                <div class="fw-bold mt-5">N I K</div>
                <div class="text-gray-600"><?= $dtpendaftaran['nik'] ?? '-' ?></div>

                <div class="fw-bold mt-5">Tempat dan Tanggal lahir</div>
                <div class="text-gray-600">
                    <?= $dtpendaftaran['tempat_lahir'] ?? '-' ?>,
                    <?= isset($dtpendaftaran['tanggal_lahir']) ?
                        date('d F Y', strtotime($dtpendaftaran['tanggal_lahir'])) :
                        '-' ?>
                </div>

                <div class="fw-bold mt-5">No Hp</div>
                <div class="text-gray-600"><?= $dtpendaftaran['no_hp'] ?? '-' ?></div>

                <div class="fw-bold mt-5">Alamat</div>
                <div class="text-gray-600"><?= $dtpendaftaran['alamat'] ?? '-' ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pb-5 fs-6">
                <h3 class="text-dark mb-3 border-bottom pb-2">Data Pelatihan</h3>

                <!-- Informasi Pelatihan -->
                <div style="margin-top:30px;">
                    <?php if ($dtpelatihan && count($dtpelatihan) > 0): ?>
                        <?php foreach ($dtpelatihan as $row): ?>
                            <table style="width:100%; border:1px solid #000; border-collapse:collapse; margin-bottom:20px;">
                                <tr>
                                    <th style="border:1px solid #000; padding:6px; width:35%;">Nama Pelatihan</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['nama_pelatihan'] ?></td>
                                    <th style="border:1px solid #000; padding:6px; width:25%;" rowspan="3">File Bukti</th>
                                    <td style="border:1px solid #000; padding:6px;" rowspan="3" align="center" valign="middle">
                                        <?php if ($row['file_bukti']): ?>
                                            <a href="<?= $row['file_bukti'] ?>">Lihat Bukti</a>
                                        <?php else: ?>
                                            <span>-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid #000; padding:6px;">Penyelenggara</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['penyelenggara'] ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid #000; padding:6px;">Tahun</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['tahun'] ?></td>
                                </tr>
                            </table>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>Tidak ada data pelatihan.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="pb-5 fs-6">
                <h3 class="text-dark mb-3 border-bottom pb-2">Data Riwayat Pekerjaan</h3>

                <!-- Informasi Riwayat Pekerjaan -->
                <div style="margin-top:30px;">
                    <?php if ($dtpekerjaan && count($dtpekerjaan) > 0): ?>
                        <?php foreach ($dtpekerjaan as $row): ?>
                            <table style="width:100%; border:1px solid #000; border-collapse:collapse; margin-bottom:20px;">
                                <tr>
                                    <th style="border:1px solid #000; padding:6px; width:35%;">Nama Perusahaan</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['nama_perusahaan'] ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid #000; padding:6px;">Deskripsi Pekerjaan</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['deskripsi_pekerjaan'] ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid #000; padding:6px;">Posisi</th>
                                    <td style="border:1px solid #000; padding:6px;"><?= $row['posisi'] ?></td>
                                </tr>
                            </table>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>Tidak ada data pelatihan.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>