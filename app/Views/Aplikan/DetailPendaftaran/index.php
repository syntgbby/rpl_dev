<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content">
        <div class="mb-4 d-flex justify-content-end" id="exportPDF">
            <?php if ($approvalWithKurikulum && count($approvalWithKurikulum) > 0): ?>
                <a href="<?= base_url('aplikan/generate-pdf') ?>" class="btn btn-danger" target="_blank">
                    <i class="fas fa-file-pdf me-2"></i> Export to PDF
                </a>
            <?php else: ?>
                <button class="btn btn-secondary" id="btnExportDisabled">
                    <i class="fas fa-file-pdf me-2"></i> Export to PDF
                </button>
            <?php endif; ?>
        </div>

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
                                        <td colspan="5" class="text-center">Aplikan tidak mengisi pelatihan</td>
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
        <!-- Start Informasi Piagam -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Piagam/Penghargaan</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 50px">No</th>
                                    <th>Bentuk Penghargaan</th>
                                    <th>Pemberi</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Bukti</th>
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
                                        <td colspan="5" class="text-center">Aplikan tidak mengisi piagam/penghargaan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Piagam -->
        <!-- Start Informasi Seminar -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Seminar</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 50px">No</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Penyelenggara</th>
                                    <th>Peran</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Bukti</th>
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
                                        <td colspan="5" class="text-center">Aplikan tidak mengisi seminar</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Seminar -->
        <!-- Start Informasi Organisasi -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Organisasi</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
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
                                        <td colspan="5" class="text-center">Aplikan tidak mengisi organisasi</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Organisasi -->

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
                                        <h3 class="fw-bold fs-6 m-0">File KK (Kartu Keluarga)</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['file_kk'])): ?>
                                        <a href="<?= $dtpendaftaran['file_kk'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat KK (Kartu Keluarga)
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
                                        <h3 class="fw-bold fs-6 m-0">Pas Foto</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($dtpendaftaran['file_foto'])): ?>
                                        <a href="<?= $dtpendaftaran['file_foto'] ?>"
                                            class="btn btn-primary btn-sm btn-active-light-primary w-100" target="_blank">
                                            <i class="fas fa-file-pdf me-1"></i> Lihat Pas Foto
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
        <!-- Start Informasi Asesmen Mandiri -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Hasil Asesmen Mandiri</h3>
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
                                    <!-- <th class="text-center">Asasmen</th> -->
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
                                            <!-- <td class="text-center">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="lihatAsesmen('<?= $row['kode_matkul'] ?>')">Lihat Asesmen</button>
                                            </td> -->
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
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Asesmen Mandiri -->
        <!-- Start Informasi Hasil Approval Asesor -->
        <div class="card mb-5">
            <!--begin::Details content-->
            <div class="card-body">
                <div class="pb-5 fs-6">
                    <!--begin::Details item-->
                    <h3 class="text-dark mb-3 border-bottom pb-2">Hasil Approval Asesmen</h3>
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
                                    <th class="text-center">Asesmen</th>
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
                                                    <span class="badge bg-warning text-white">DIsetujui</span>
                                                <?php else: ?>
                                                    <span class="badge bg-info text-white">Ditolak</span>
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
                                        <td colspan="7" class="text-center">Menunggu validasi asesor</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!-- End Informasi Hasil Approval Asesor -->
    </div>
</div>

<script>
    function lihatAsesmen(kode_matkul) {
        $('#modaltitle').html('Detail Hasil Asesmen');
        $('#modalbody').load("<?= base_url('aplikan/get-asesmen/') ?>" + kode_matkul);
        $('#modal').modal('show');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('btnExportDisabled');
        if (btn) {
            btn.addEventListener('click', function () {
                Swal.fire({
                    icon: 'info',
                    title: 'Data belum bisa di export!',
                    text: 'Data anda belum ada approval asesor, mohon tunggu approval terlebih dahulu.',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
</script>
<?= $this->endSection() ?>