<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content-->
<div id="kt_app_content" class="app-content">
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
            <?php if ($konfirmasi_step['status'] == null): ?>
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
                    <?php if ($konfirmasi_step['status'] == 'Y'): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalPelatihan">
                            <i class="fa fa-plus"></i> Tambah Pelatihan
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
            <?php if ($pelatihan): ?>
                <button type="submit" class="btn btn-primary text-white"><a
                        href="<?= base_url('aplikan/pendaftaran/step3') ?>" class="text-white">Lanjutkan ke Step
                        3</a></button>
            <?php endif; ?>
        </div>
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

<?= $this->endSection() ?>