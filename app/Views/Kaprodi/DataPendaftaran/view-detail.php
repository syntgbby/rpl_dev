<!-- Header -->
<!-- <div class="d-flex justify-content-between align-items-center mb-4"> -->
<!-- <h4 class="text-primary mb-0">Detail Pendaftaran</h4> -->
<!-- </div>
    <hr class="mt-2 mb-4"> -->

<!-- Kolom Kiri - Informasi Pribadi -->
<div class="bg-light p-3 rounded mb-4">
    <h5 class="text-dark mb-3 border-bottom pb-2">Biodata Pribadi</h5>
    <div class="row g-3">
        <div class="col-md-6">
            <label class="text-muted d-block small">NIK</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['nik'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">Nama Lengkap</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['nama_lengkap'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">Email</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['email'] ?? '-' ?></span>
        </div>
        <div class="col-md-6">
            <label class="text-muted d-block small">No. Telepon</label>
            <span class="fw-bold d-block"><?= $dtpendaftaran['no_hp'] ?? '-' ?></span>
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
    </div>
</div>

<!-- Kolom Kanan - Informasi Pendaftaran & File -->

<!-- Informasi Pelatihan -->
<div class="bg-light p-3 rounded mb-4">
    <h5 class="text-dark mb-3 border-bottom pb-2">Informasi Pelatihan</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px">No</th>
                    <th>Nama Pelatihan</th>
                    <th>Penyelenggara</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Bukti</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtpelatihan): ?>
                    <?php $no = 1;
                    foreach ($dtpelatihan as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_pelatihan'] ?></td>
                            <td><?= $row['penyelenggara'] ?></td>
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
                        <td colspan="5" class="text-center">Tidak ada data pelatihan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Informasi Pelatihan -->
<div class="bg-light p-3 rounded mb-4">
    <h5 class="text-dark mb-3 border-bottom pb-2">Informasi Riwayat Kerja</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px">No</th>
                    <th>Nama Perusahaan</th>
                    <th>Deskripsi Pekerjaan</th>
                    <th class="text-center">Posisi</th>
                    <th class="text-center">Bukti</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtpekerjaan): ?>
                    <?php $no = 1;
                    foreach ($dtpekerjaan as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_perusahaan'] ?></td>
                            <td><?= $row['deskripsi_pekerjaan'] ?></td>
                            <td class="text-center"><?= $row['posisi'] ?></td>
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
                        <td colspan="5" class="text-center">Aplikan tidak mengisi riwayat kerja</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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
                    <a href="<?= $dtpendaftaran['file_ktp'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat KTP
                    </a>
                <?php else: ?>
                    <span class="text-muted small">File tidak tersedia</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Kartu Keluarga -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">Kartu Keluarga</label>
                <?php if (!empty($dtpendaftaran['file_kk'])): ?>
                    <a href="<?= $dtpendaftaran['file_kk'] ?>" class="btn btn-sm btn-outline-primary w-100" target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Kartu Keluarga
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
        <!-- Foto -->
        <div class="col-md-6">
            <div class="border rounded p-2">
                <label class="text-muted d-block small mb-2">Pas Foto</label>
                <?php if (!empty($dtpendaftaran['file_foto'])): ?>
                    <a href="<?= $dtpendaftaran['file_foto'] ?>" class="btn btn-sm btn-outline-primary w-100"
                        target="_blank">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Pas Foto
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
    <form action="<?= base_url('kaprodi/data-pendaftaran/assign-asesor') ?>" method="post">
        <div class="row g-3 align-items-center">
            <input type="hidden" name="pendaftaran_id" value="<?= $dtpendaftaran['pendaftaran_id'] ?>">
            <div class="col-md-8">
                <select class="form-select form-control h-100" data-control="select2" name="asesor_id" id="asesor_id"
                    data-placeholder="Pilih Asesor">
                    <option value="" disabled selected></option>
                    <?php if ($asesor): ?>
                        <?php foreach ($asesor as $a): ?>
                            <option value="<?= $a['id'] ?>"><?= $a['nama_lengkap'] ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled selected class="text-center">No data found</option>
                    <?php endif; ?>
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
<script>
    $(document).ready(function () {
        $('#asesor_id').select2();
    });
</script>
</div>