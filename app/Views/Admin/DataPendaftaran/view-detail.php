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
    <div class="bg-light p-3 rounded mb-4">
        <h5 class="text-dark mb-3 border-bottom pb-2">File Bukti</h5>
        <div class="row g-3">
            <!-- KTP -->
            <div class="col-md-6">
                <div class="border rounded p-2">
                    <label class="text-muted d-block small mb-2">KTP</label>
                    <?php if (!empty($dtpendaftaran['file_ktp'])): ?>
                        <a href="<?= $dtpendaftaran['file_ktp'] ?>"
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
                        <a href="<?= $dtpendaftaran['file_ijazah'] ?>"
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
                    <label class="text-muted d-block small mb-2">Bukti Pelatihan</label>
                    <?php if (!empty($dtpendaftaran['bukti_pelatihan'])): ?>
                        <a href="<?= $dtpendaftaran['bukti_pelatihan'] ?>"
                            class="btn btn-sm btn-outline-primary w-100"
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

    <!-- Assign Asesor -->
    <div class="bg-light p-3 rounded">
        <h5 class="text-dark mb-3 border-bottom pb-2">Assign Asesor</h5>
        <form action="<?= base_url('admin/data-pendaftaran/assign-asesor') ?>" method="post">
            <div class="row g-3 align-items-center">
            <input type="hidden" name="pendaftaran_id" value="<?= $dtpendaftaran['pendaftaran_id'] ?>">                <div class="col-md-8">
                    <select class="form-select form-control" data-control="select2" name="asesor_id" id="asesor_id" placeholder="Pilih Asesor" >
                        <option value="" disabled selected>Pilih Asesor</option>
                        <?php foreach ($asesor as $a): ?>
                            <option value="<?= $a['id'] ?>"><?= $a['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100" id="btnAssign">
                        <i class="fas fa-check me-2"></i> Assign
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-flex gap-2 mt-3 justify-content-end">
        <a href="<?= base_url('admin/data-pendaftaran') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-times"></i> Close
        </a>
    </div>

    <script>
        $(document).ready(function() {
            $('#asesor_id').select2();

            $('#btnAssign').click(function() {
                var asesorId = $('#asesor_id').val();
                var pendaftaranId = $('#pendaftaran_id').val();
                if (asesorId == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Pilih Asesor terlebih dahulu',
                        confirmButtonColor: '#3085d6'
                    });
                    return false;
                }

                $.ajax({
                    url: '<?= base_url('admin/data-pendaftaran/assign-asesor') ?>',
                    type: 'POST',
                    data: {
                        asesor_id: asesorId,
                        pendaftaran_id: pendaftaranId
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Asesor berhasil diassign',
                            confirmButtonColor: '#3085d6'
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal Asign Asesor',
                            confirmButtonColor: '#3085d6'
                        });
                    }
                });
            });
        });
    </script>
    </div>