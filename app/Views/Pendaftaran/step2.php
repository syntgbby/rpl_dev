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
                <h3 class="fw-bold m-0">Step 2: Pelatihan</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="<?= base_url('aplikan/pendaftaran/saveStep2') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Pelatihan</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_pelatihan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Nama Pelatihan" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Pelatihan</label>
                        <div class="col-lg-8">
                            <input type="text" name="tahun" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Tahun Pelatihan" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Penyelenggara</label>
                        <div class="col-lg-8">
                            <input type="text" name="penyelenggara" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Penyelenggara" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_bukti" accept=".pdf, .jpg, .png" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                                <span class="text-danger">*Format file: .pdf, .jpg, .png</span>
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="cancel" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.href='<?= base_url('dashboard') ?>'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->

        <div class="card-body border-top p-9">
            <!--begin::Table-->
            <div class="table-responsive">
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
                                            <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i> Lihat Bukti</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-danger"
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
                <button type="submit" class="btn btn-primary text-white"><a href="<?= base_url('aplikan/pendaftaran/step3') ?>" class="text-white">Lanjutkan ke Step 3</a></button>
            </div>
        </div>
        
    </div>
    <!--end::Basic info-->
</div>
<!--end::Content-->

<?= $this->endSection() ?>