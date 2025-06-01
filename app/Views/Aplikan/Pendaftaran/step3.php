<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<?php 
$form_disabled = ($konfirmasi_step['status'] == null) ? 'disabled' : '';
?>

<div id="kt_app_content" class="app-content">
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#riwayat_kerja_form" aria-expanded="true" aria-controls="riwayat_kerja_form">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Riwayat Kerja</h3>
            </div>
        </div>

        <div id="riwayat_kerja_form" class="collapse show">
            <?php if ($konfirmasi_step['status'] == null): ?>
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <span>Apakah anda ingin mengisi data riwayat kerja?</span>
                    </div>
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/step3/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/step3/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('aplikan/pendaftaran/saveStep3') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Perusahaan</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_perusahaan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Nama Perusahaan" <?= $form_disabled ?> />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Posisi</label>
                        <div class="col-lg-8">
                            <input type="text" name="posisi" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Posisi" <?= $form_disabled ?> />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Masuk</label>
                        <div class="col-lg-8">
                            <input type="text" name="tahun_masuk" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Tahun Masuk" <?= $form_disabled ?> />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Keluar</label>
                        <div class="col-lg-8">
                            <input type="text" name="tahun_keluar"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Tahun Keluar" <?= $form_disabled ?> />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_bukti_kerja" accept=".pdf, .jpg, .png" <?= $form_disabled ?>
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                            <span class="text-danger">*Format file: .pdf, .jpg, .png</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                        onclick="window.location.href='<?= base_url('dashboard') ?>'">Close</button>
                    <button type="submit" class="btn btn-primary" <?= $form_disabled ?>>
                        <i class="fa-solid fa-save text-white text-center"></i> Simpan
                    </button>
                </div>
            </form>

            <!-- Tabel Data Riwayat Kerja -->
            <div class="card-body border-top p-9">
                <?php if ($riwayat_kerja && count($riwayat_kerja) > 0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Posisi</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Keluar</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($riwayat_kerja as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($row['nama_perusahaan']) ?></td>
                                    <td><?= esc($row['posisi']) ?></td>
                                    <td class="text-center"><?= esc($row['tahun_masuk']) ?></td>
                                    <td class="text-center"><?= esc($row['tahun_keluar']) ?></td>
                                    <td class="text-center">
                                        <?php if ($row['file_bukti_kerja']): ?>
                                            <a href="<?= base_url('uploads/bukti_kerja/' . $row['file_bukti_kerja']) ?>" target="_blank">
                                                <i class="fa-solid fa-eye"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm" 
                                            onclick="if(confirm('Yakin ingin hapus data?')) window.location.href='<?= base_url('aplikan/pendaftaran/deleteRiwayatKerja/'.$row['id']) ?>'">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Belum ada data riwayat kerja.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
