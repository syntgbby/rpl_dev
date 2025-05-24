<!-- Header -->
<!-- <div class="d-flex justify-content-between align-items-center mb-4"> -->
<!-- <h4 class="text-primary mb-0">Detail Pendaftaran</h4> -->
<!-- </div>
    <hr class="mt-2 mb-4"> -->

<!-- Kolom Kiri - Informasi Pribadi -->
<div class="bg-light p-3 rounded mb-4">
    <h5 class="text-dark mb-3 border-bottom pb-2">Biodata Pribadi</h5>
    <div class="row g-3">
        <div class="col-12">
            <label class="text-muted d-block small">Nama Lengkap</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['nama_lengkap'] ?? '-' ?></span>
        </div>
        <div class="col-12">
            <label class="text-muted d-block small">NIK</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['nik'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">Tempat Lahir</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['tempat_lahir'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">Tanggal Lahir</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['tanggal_lahir'] ?? '-' ?></span>
        </div>
        <div class="col-12">
            <label class="text-muted d-block small">Alamat</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['alamat'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">No. Telepon</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['no_telepon'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">Email</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['email'] ?? '-' ?></span>
        </div>
    </div>
</div>

<!-- Kolom Kanan - Informasi Pendaftaran & File -->
<!-- File Bukti -->
<div class="bg-light p-3 rounded">
    <h5 class="text-dark mb-3 border-bottom pb-2">File Bukti</h5>
    <div class="row g-3">
        <!-- KTP -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">KTP</label>
                <?php if (!empty($dtpendaftaran['file_ktp'])): ?>
                    <a href="<?= $dtpendaftaran['file_ktp'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat KTP
                    </a>
                <?php else: ?>
                    <span class="text-muted small">File tidak tersedia</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Bukti Kerja -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">Bukti Kerja</label>
                <?php if (!empty($dtpendaftaran['bukti_kerja'])): ?>
                    <a href="<?= $dtpendaftaran['bukti_kerja'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Kerja
                    </a>
                <?php else: ?>
                    <span class="text-muted small">File tidak tersedia</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ijazah -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">Ijazah</label>
                <?php if (!empty($dtpendaftaran['file_ijazah'])): ?>
                    <a href="<?= $dtpendaftaran['file_ijazah'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Ijazah
                    </a>
                <?php else: ?>
                    <span class="text-muted small">File tidak tersedia</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sertifikat -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">Bukti Pelatihan</label>
                <?php if (!empty($dtpendaftaran['bukti_pelatihan'])): ?>
                    <a href="<?= $dtpendaftaran['bukti_pelatihan'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Pelatihan
                    </a>
                <?php else: ?>
                    <span class="text-muted small">File tidak tersedia</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if ($dtpendaftaran['status'] == 'rejected'): ?>
    <div class="bg-light p-3 rounded">
        <h5 class="text-dark mb-3 border-bottom pb-2">Alasan Penolakan</h5>

        <div class="col-12">
            <span class="fw-bold d-block text-danger"><?= $dtpendaftaran['alasan_penolakan'] ?></span>
        </div>
    </div>
<?php endif; ?>