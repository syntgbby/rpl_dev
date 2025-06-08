<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content">
        <!-- Start Informasi Biodata -->
        <div class="card mb-5">
            <!--begin::Details content-->
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
                    <div class="text-gray-600"><?= $dtpendaftaran['tempat_lahir'] ?? '-' ?>,
                        <?= $dtpendaftaran['tanggal_lahir'] ?? '-' ?>
                    </div>

                    <div class="fw-bold mt-5">No Hp</div>
                    <div class="text-gray-600"><?= $dtpendaftaran['no_hp'] ?? '-' ?></div>

                    <div class="fw-bold mt-5">Alamat</div>
                    <div class="text-gray-600"><?= $dtpendaftaran['alamat'] ?? '-' ?></div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Biodata -->
        <!-- Start Informasi Pelatihan -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Pelatihan</h3>
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
                                                    <a href="<?= $row['file_bukti'] ?>" target="_blank"
                                                        class="btn btn-sm btn-primary">
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
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Pelatihan -->
        <!-- Start Informasi Pengalaman Kerja -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Pengalaman Kerja</h3>
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
                                                    <a href="<?= $row['file_bukti'] ?>" target="_blank"
                                                        class="btn btn-sm btn-primary">
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
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Pengalaman Kerja -->
        <!-- Start Informasi Data Pendukung -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <h3 class="text-dark mb-3 border-bottom pb-2">File Pendukung</h3>

                    <div class="row">
                        <!-- Foto KTP -->
                        <div class="col-md-3 mb-5">
                            <div class="card card-custom h-100">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="fw-bold fs-6 m-0">Foto KTP</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['file_ktp'])): ?>
                                        <a href="<?= $dtpendaftaran['file_ktp'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat KTP
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">File tidak tersedia</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Bukti Kerja -->
                        <div class="col-md-3 mb-5">
                            <div class="card card-custom h-100">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="fw-bold fs-6 m-0">Bukti Kerja</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['bukti_kerja'])): ?>
                                        <a href="<?= $dtpendaftaran['bukti_kerja'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Kerja
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">File tidak tersedia</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Ijazah -->
                        <div class="col-md-3 mb-5">
                            <div class="card card-custom h-100">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="fw-bold fs-6 m-0">Ijazah</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['file_ijazah'])): ?>
                                        <a href="<?= $dtpendaftaran['file_ijazah'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat Ijazah
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">File tidak tersedia</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Bukti Pelatihan -->
                        <div class="col-md-3 mb-5">
                            <div class="card card-custom h-100">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="fw-bold fs-6 m-0">Bukti Pelatihan</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['bukti_pelatihan'])): ?>
                                        <a href="<?= $dtpendaftaran['bukti_pelatihan'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Pelatihan
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">File tidak tersedia</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Data Pendukung -->
        <!-- Start Informasi Hasil Aproval -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Hasil Approval</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 50px">No</th>
                                    <th style="width: 180px">Kode Mata Kuliah</th>
                                    <th class="text-center">Mata Kuliah</th>
                                    <th class="text-center" style="width: 150px">Tahun Ajaran</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Asasmen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($approvalWithKurikulum): ?>
                                    <?php $no = 1;
                                    foreach ($approvalWithKurikulum as $row): ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row['kode_matkul'] ?></td>
                                            <td><?= $row['nama_matkul'] ?></td>
                                            <td><?= $row['tahun'] ?></td>
                                            <td><?= $row['sks'] ?></td>
                                            <td class="text-center">
                                                <?php if ($row['status'] == 'Y'): ?>
                                                    <span class="badge bg-success text-white">Disetujui</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger text-white">Ditolak</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="lihatAsesmen('<?= $row['kode_matkul'] ?>')">Lihat Asesmen</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Aplikan belum proses approve</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Hasil Aproval -->
    </div>
</div>

<script>
    function lihatAsesmen(kode_matkul) {
        $('#modaltitle').html('Detail Hasil Asesmen');
        $('#modalbody').load("<?= base_url('asesor/get-asesmen/') ?>" + kode_matkul);
        $('#modal').modal('show');
    }
</script>
<?= $this->endSection() ?>