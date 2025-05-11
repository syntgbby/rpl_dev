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
    <!-- Informasi Pendaftaran -->
    <div class="bg-light p-3 rounded mb-4">
        <h5 class="text-dark mb-3 border-bottom pb-2">Informasi Pendaftaran</h5>
        <div class="row g-3">
            <div class="col-12">
                <label class="text-muted d-block small">Skema Sertifikasi</label>
                <span class="fw-bold d-block"><?= $dtpendaftaran['skema_sertifikasi'] ?? '-' ?></span>
            </div>
            <div class="col-12">
                <label class="text-muted d-block small">TUK</label>
                <span class="fw-bold d-block"><?= $dtpendaftaran['tuk'] ?? '-' ?></span>
            </div>
            <div class="col-12">
                <label class="text-muted d-block small">Tanggal Pendaftaran</label>
                <span class="fw-bold d-block"><?= $dtpendaftaran['tanggal_pendaftaran'] ?? '-' ?></span>
            </div>
            <div class="col-12">
                <label class="text-muted d-block small">Status</label>
                <?php if (isset($dtpendaftaran['status_pendaftaran'])): ?>
                    <?php if ($dtpendaftaran['status_pendaftaran'] == 'pending'): ?>
                        <span class="badge bg-warning">Pending</span>
                    <?php elseif ($dtpendaftaran['status_pendaftaran'] == 'approved'): ?>
                        <span class="badge bg-success">Disetujui</span>
                    <?php elseif ($dtpendaftaran['status_pendaftaran'] == 'rejected'): ?>
                        <span class="badge bg-danger">Ditolak</span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="text-muted">-</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- File Bukti -->
    <div class="bg-light p-3 rounded">
        <h5 class="text-dark mb-3 border-bottom pb-2">File Bukti</h5>
        <div class="row g-3">
            <!-- KTP -->
            <div class="col-md-6">
                <div class="border rounded p-2">
                    <label class="text-muted d-block small mb-2">KTP</label>
                    <?php if (!empty($dtpendaftaran['file_ktp'])): ?>
                        <a href="<?= base_url('uploads/' . $dtpendaftaran['file_ktp']) ?>"
                            class="btn btn-sm btn-outline-primary w-100"
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
                        <a href="<?= $dtpendaftaran['bukti_kerja'] ?>"
                            class="btn btn-sm btn-outline-primary w-100"
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
                        <a href="<?= base_url('uploads/' . $dtpendaftaran['file_ijazah']) ?>"
                            class="btn btn-sm btn-outline-primary w-100"
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
                    <label class="text-muted d-block small mb-2">Sertifikat</label>
                    <?php if (!empty($dtpendaftaran['file_sertifikat'])): ?>
                        <a href="<?= base_url('uploads/' . $dtpendaftaran['file_sertifikat']) ?>"
                            class="btn btn-sm btn-outline-primary w-100"
                            target="_blank">
                            <i class="fas fa-file-pdf me-1"></i> Lihat Sertifikat
                        </a>
                    <?php else: ?>
                        <span class="text-muted small">File tidak tersedia</span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- CV -->
            <div class="col-md-6">
                <div class="border rounded p-2">
                    <label class="text-muted d-block small mb-2">CV</label>
                    <?php if (!empty($dtpendaftaran['file_cv'])): ?>
                        <a href="<?= base_url('uploads/' . $dtpendaftaran['file_cv']) ?>"
                            class="btn btn-sm btn-outline-primary w-100"
                            target="_blank">
                            <i class="fas fa-file-pdf me-1"></i> Lihat CV
                        </a>
                    <?php else: ?>
                        <span class="text-muted small">File tidak tersedia</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 mt-3 justify-content-end">
        <?php // if (($dtpendaftaran['status'] ?? '') == 'submitted'): ?>
            <a href="<?= base_url('asesor/approve-pendaftaran/' . ($dtpendaftaran['pendaftaran_id'] ?? '')) ?>"
                class="btn btn-success btn-sm">
                <i class="fas fa-check"></i> Approve
            </a>
        <?php // endif; ?>
        <a href="<?= base_url('asesor/pendaftaran') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-times"></i> Close
        </a>
    </div>
