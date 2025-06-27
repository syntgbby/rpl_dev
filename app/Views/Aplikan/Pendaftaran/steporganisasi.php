<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<?php 
// Aman dari null
$form_disabled = (isset($konfirmasi_step['status']) && $konfirmasi_step['status'] === null) ? 'disabled' : '';
?>

<div id="kt_app_content" class="app-content">
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#organisasi_form" aria-expanded="true" aria-controls="organisasi_form">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Organisasi</h3>
            </div>
        </div>

        <div id="organisasi_form" class="collapse show">
            <?php if (isset($konfirmasi_step['status']) && $konfirmasi_step['status'] === null): ?>
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <span>Apakah anda ingin mengisi data organisasi?</span>
                    </div>
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/steporganisasi/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/steporganisasi/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('aplikan/pendaftaran/saveStepOrganisasi') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Organisasi</label>
                        <div class="col-lg-8">
                            <input type="text" name="jenis_organisasi" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Jenis Organisasi" <?= $form_disabled ?> />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Organisasi</label>
                        <div class="col-lg-8">
                            <input type="text" name="tahun" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Tahun Organisasi" <?= $form_disabled ?> />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenjang Anggota</label>
                        <div class="col-lg-8">
                            <input type="text" name="jenjang_anggota" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Jenjang Anggota" <?= $form_disabled ?> />
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            onclick="window.location.href='<?= base_url('dashboard') ?>'">Close</button>
                        <button type="submit" class="btn btn-primary" <?= $form_disabled ?>>
                            <i class="fa-solid fa-save text-white text-center"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tabel Data Organisasi -->
            <div class="card-body border-top p-9">
                <?php if (!empty($organisasi)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jenis Organisasi</th>
                                <th>Tahun</th>
                                <th>Jenjang Anggota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
<?php $no = 1; foreach ($organisasi as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($row['jenis_organisasi'] ?? $row['jenis_organisasi'] ?? '-') ?></td>
        <td class="text-center"><?= esc($row['tahun'] ?? '-') ?></td>
        <td><?= esc($row['jenjang_anggota'] ?? $row['jengjang_anggota'] ?? '-') ?></td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-sm" 
                onclick="if(confirm('Yakin ingin hapus data?')) window.location.href='<?= base_url('aplikan/pendaftaran/deleteOrganisasi/'.$row['id']) ?>'">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
                    </table>
                    <div class="mt-3">
                        <a href="<?= base_url('aplikan/pendaftaran/step3') ?>" class="btn btn-primary">
                            Lanjut ke Step 3
                        </a>
                    </div>
                <?php else: ?>
                    <p class="text-center">Belum ada data organisasi.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
