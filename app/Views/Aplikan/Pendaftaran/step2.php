<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content-->
<div id="kt_app_content" class="app-content">
    <!--PELATIHAN-->
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Pelatihan</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?php if ($konfirmasi_step['step2'] === null): ?>
                <!--begin::Alert-->
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"><span class="path1"></span><span
                            class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Apakah anda ingin mengisi data pelatihan?</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/step2/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/step2/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Alert-->
            <?php endif; ?>
        </div>
        <!--end::Content-->

        <div class="card-body border-top p-9">
            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            <?php elseif (session()->getFlashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('error') ?>',
                        confirmButtonColor: '#d33',
                    });
                </script>
            <?php endif; ?>
            <!--begin::Table-->
            <div class="table-responsive">
                <div class="mb-5 text-end">
                    <?php if ($konfirmasi_step['step2'] === "Y"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalPelatihan">
                            <i class="fa fa-plus"></i> Tambah Data Pelatihan
                        </button>
                    <?php endif; ?>
                </div>
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-25px">Nama Pelatihan</th>
                            <th class="min-w-85px">Penyelenggara</th>
                            <th class="min-w-85px">Tahun Pelatihan</th>
                            <th class="min-w-85px">Bukti</th>
                            <th class="min-w-75px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php $no = 1; ?>
                        <?php if ($pelatihan): ?>
                            <?php foreach ($pelatihan as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_pelatihan'] ?>
                                    </td>
                                    <td>
                                        <?= $row['penyelenggara'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['file_bukti']): ?>
                                            <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i>
                                                Lihat Bukti</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="window.location.href='<?= base_url('aplikan/pendaftaran/deletePelatihan/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Basic info-->

    <!--PENGHARGAAN-->
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Penghargaan/Piagam</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?php if ($konfirmasi_step['stepPiagam'] === null): ?>
                <!--begin::Alert-->
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"><span class="path1"></span><span
                            class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Apakah anda ingin mengisi data piagam?</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/stepPiagam/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/stepPiagam/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Alert-->
            <?php endif; ?>
        </div>
        <!--end::Content-->

        <div class="card-body border-top p-9">
            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            <?php elseif (session()->getFlashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('error') ?>',
                        confirmButtonColor: '#d33',
                    });
                </script>
            <?php endif; ?>
            <!--begin::Table-->
            <div class="table-responsive">
                <div class="mb-5 text-end">
                    <?php if ($konfirmasi_step['stepPiagam'] === "Y"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPiagam">
                            <i class="fa fa-plus"></i> Tambah Data Penghargaan/Piagam
                        </button>
                    <?php endif; ?>
                </div>
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-25px">Bentuk Penghargaan</th>
                            <th class="min-w-85px">Tahun</th>
                            <th class="min-w-85px">Pemberi</th>
                            <th class="min-w-85px">Bukti</th>
                            <th class="min-w-75px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php $no = 1; ?>
                        <?php if ($piagam): ?>
                            <?php foreach ($piagam as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['bentuk_penghargaan'] ?>
                                    </td>
                                    <td>
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td>
                                        <?= $row['pemberi'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['file_bukti']): ?>
                                            <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i>
                                                Lihat Bukti</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="window.location.href='<?= base_url('aplikan/pendaftaran/deletePiagam/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Basic info-->

    <!--Seminar-->
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Seminar</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?php if ($konfirmasi_step['stepSeminar'] === null): ?>
                <!--begin::Alert-->
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"><span class="path1"></span><span
                            class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Apakah anda ingin mengisi data seminar?</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/stepSeminar/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/stepSeminar/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Alert-->
            <?php endif; ?>
        </div>
        <!--end::Content-->

        <div class="card-body border-top p-9">
            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            <?php elseif (session()->getFlashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('error') ?>',
                        confirmButtonColor: '#d33',
                    });
                </script>
            <?php endif; ?>
            <!--begin::Table-->
            <div class="table-responsive">
                <div class="mb-5 text-end">
                    <?php if ($konfirmasi_step['stepSeminar'] === "Y"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSeminar">
                            <i class="fa fa-plus"></i> Tambah Data Seminar
                        </button>
                    <?php endif; ?>
                </div>
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-25px">Judul Kegiatan</th>
                            <th class="min-w-85px">Tahun</th>
                            <th class="min-w-85px">Penyelenggara</th>
                            <th class="min-w-85px">Peran</th>
                            <th class="min-w-85px">Bukti</th>
                            <th class="min-w-75px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php $no = 1; ?>
                        <?php if ($seminar): ?>
                            <?php foreach ($seminar as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['judul_kegiatan'] ?>
                                    </td>
                                    <td>
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td>
                                        <?= $row['penyelenggara'] ?>
                                    </td>
                                    <td>
                                        <?= $row['peran'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['file_bukti']): ?>
                                            <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i>
                                                Lihat Bukti</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="window.location.href='<?= base_url('aplikan/pendaftaran/deleteSeminar/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Basic info-->

    <!--Organisasi-->
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Organisasi</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?php if ($konfirmasi_step['stepOrganisasi'] === null): ?>
                <!--begin::Alert-->
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"><span class="path1"></span><span
                            class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Apakah anda ingin mengisi data organisasi?</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/stepOrganisasi/Y"
                            class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/stepOrganisasi/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Alert-->
            <?php endif; ?>
        </div>
        <!--end::Content-->

        <div class="card-body border-top p-9">
            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            <?php elseif (session()->getFlashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('error') ?>',
                        confirmButtonColor: '#d33',
                    });
                </script>
            <?php endif; ?>
            <!--begin::Table-->
            <div class="table-responsive">
                <div class="mb-5 text-end">
                    <?php if ($konfirmasi_step['stepOrganisasi'] === "Y"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalOrganisasi">
                            <i class="fa fa-plus"></i> Tambah Data Organisasi
                        </button>
                    <?php endif; ?>
                </div>
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-85px">Tahun</th>
                            <th class="min-w-25px">Jenis/Nama Organisasi</th>
                            <th class="min-w-85px">Jabatan/Jenjang Anggota</th>
                            <th class="min-w-85px">Bukti</th>
                            <th class="min-w-75px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php $no = 1; ?>
                        <?php if ($organisasi): ?>
                            <?php foreach ($organisasi as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_organisasi'] ?>
                                    </td>
                                    <td>
                                        <?= $row['jabatan_anggota'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['file_bukti']): ?>
                                            <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i>
                                                Lihat Bukti</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="window.location.href='<?= base_url('aplikan/pendaftaran/deleteOrganisasi/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Basic info-->

    <!-- Button Next -->
    <?php
    $bolehLanjut = $konfirmasi_step['step2'] != null ||
        $konfirmasi_step['stepPiagam'] != null ||
        $konfirmasi_step['stepSeminar'] != null ||
        $konfirmasi_step['stepOrganisasi'] != null;
    ?>

    <?php if ($bolehLanjut): ?>
        <a href="<?= base_url('aplikan/pendaftaran/step3') ?>" class="btn btn-primary text-white">Lanjutkan ke Step 3</a>
    <?php else: ?>
        <button type="button" class="btn btn-secondary" id="btn-disabled-next">Lanjutkan ke Step 3</button>
    <?php endif; ?>

</div>
</div>
<!--end::Basic info-->
</div>
<!--end::Content-->

<!--begin::Modal Tambah Pelatihan-->
<div class="modal fade" id="modalPelatihan" tabindex="-1" aria-labelledby="modalPelatihanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('aplikan/pendaftaran/saveStep2') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header mr-2">
                    <h5 class="modal-title" id="modalPelatihanLabel">Tambah Data Pelatihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Nama Pelatihan</label>
                        <input type="text" name="nama_pelatihan" required class="form-control"
                            placeholder="Nama Pelatihan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Tahun Pelatihan</label>
                        <input type="text" name="tahun" required class="form-control" placeholder="Tahun Pelatihan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Penyelenggara</label>
                        <input type="text" name="penyelenggara" required class="form-control"
                            placeholder="Penyelenggara">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Upload Bukti</label>
                        <input type="file" name="file_bukti" accept=".pdf,.jpg,.png" required class="form-control">
                        <small class="text-danger d-block mt-1">*Format file: .pdf, .jpg, .png</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Tambah Pelatihan-->

<!--begin::Modal Tambah Piagam-->
<div class="modal fade" id="modalPiagam" tabindex="-1" aria-labelledby="modalPiagamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('aplikan/pendaftaran/saveStepPiagam') ?>" method="post"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header mr-2">
                    <h5 class="modal-title" id="modalPiagamLabel">Tambah Data Penghargaan/Piagam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Bentuk Penghargaan</label>
                        <input type="text" name="bentuk_penghargaan" required class="form-control"
                            placeholder="Bentuk Penghargaan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Tahun</label>
                        <input type="text" name="tahun" required class="form-control" placeholder="Tahun">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Pemberi</label>
                        <input type="text" name="pemberi" required class="form-control" placeholder="Pemberi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Upload Bukti</label>
                        <input type="file" name="file_bukti" accept=".pdf,.jpg,.png" required class="form-control">
                        <small class="text-danger d-block mt-1">*Format file: .pdf, .jpg, .png</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Tambah Piagam-->

<!--begin::Modal Tambah Seminar-->
<div class="modal fade" id="modalSeminar" tabindex="-1" aria-labelledby="modalSeminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('aplikan/pendaftaran/saveStepSeminar') ?>" method="post"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header mr-2">
                    <h5 class="modal-title" id="modalSeminarLabel">Tambah Data Seminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Judul Kegiatan</label>
                        <input type="text" name="judul_kegiatan" required class="form-control"
                            placeholder="Judul Kegiatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Tahun</label>
                        <input type="text" name="tahun" required class="form-control" placeholder="Tahun">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Penyelenggara</label>
                        <input type="text" name="penyelenggara" required class="form-control"
                            placeholder="Penyelenggara">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required">Peran</label>
                            <select name="peran" id="peran" data-control="select2" class="form-control form-control-lg"
                                data-placeholder="Pilih Peran anda dalam seminar" required>
                                <option value="" disabled selected>Pilih Peran anda dalam seminar</option>
                                <option value="panitia">Panitia
                                </option>
                                <option value="peserta">Peserta
                                </option>
                                <option value="pembicara">Pembicara
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required">Upload Bukti</label>
                            <input type="file" name="file_bukti" accept=".pdf,.jpg,.png" required class="form-control">
                            <small class="text-danger d-block mt-1">*Format file: .pdf, .jpg, .png</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Tambah Seminar-->

<!--begin::Modal Tambah Organisasi-->
<div class="modal fade" id="modalOrganisasi" tabindex="-1" aria-labelledby="modalOrganisasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('aplikan/pendaftaran/saveStepOrganisasi') ?>" method="post"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header mr-2">
                    <h5 class="modal-title" id="modalSeminarLabel">Tambah Data Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Jenis/Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" required class="form-control"
                            placeholder="Jenis/Nama Organisasi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Tahun</label>
                        <input type="text" name="tahun" required class="form-control" placeholder="Tahun">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required">Jabatan/Jenjang Anggota</label>
                            <input type="text" name="jabatan_anggota" required class="form-control"
                                placeholder="Jabatan/Jenjang Anggota">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required">Upload Bukti</label>
                            <input type="file" name="file_bukti" accept=".pdf,.jpg,.png" required class="form-control">
                            <small class="text-danger d-block mt-1">*Format file: .pdf, .jpg, .png</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Tambah Organisasi-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnDisabled = document.getElementById('btn-disabled-next');
        if (btnDisabled) {
            btnDisabled.addEventListener('click', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Anda belum melengkapi konfirmasi pengisian.',
                    confirmButtonColor: '#f1416c'
                });
            });
        }
    });
</script>

<?= $this->endSection() ?>