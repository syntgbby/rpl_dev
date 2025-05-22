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
                <h3 class="fw-bold m-0">Detail Profile</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
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
            <!--begin::Form-->
            <form id="frmProfile" class="form" action="<?= base_url('edit-profile') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_lengkap" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Full Name" value="<?= $get['nama_lengkap'] ? $get['nama_lengkap'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Tempat Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" name="tempat_lahir" required
                                class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir"
                                value="<?= $get['tempat_lahir'] ? $get['tempat_lahir'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tempat Lahir-->
                    <!--begin::Input group for Tanggal Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="date" name="tanggal_lahir" required
                                class="form-control form-control-lg form-control-solid" placeholder="Tanggal Lahir"
                                value="<?= $get['tanggal_lahir'] ? $get['tanggal_lahir'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tanggal Lahir-->
                    <!--begin::Input group for No Telepon-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">No Telepon</label>
                        <div class="col-lg-8">
                            <input type="tel" name="telepon" required
                                class="form-control form-control-lg form-control-solid" placeholder="Phone Number"
                                value="<?= $get['telepon'] ? $get['telepon'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for No Telepon-->
                    <!--begin::Input group for Jenis Kelamin-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                        <div class="col-lg-8">
                            <div class="d-flex">
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" required value="L"
                                        <?= ($get['jenis_kelamin'] == 'L') ? 'checked' : '' ?> id="laki-laki" />
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P"
                                        <?= ($get['jenis_kelamin'] == 'P') ? 'checked' : '' ?> id="perempuan" />
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group for Jenis Kelamin-->
                    <!--begin::Input group for Agama-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Agama</label>
                        <div class="col-lg-8">
                            <select name="agama" required
                                class="form-select form-select-md form-select-solid text-sm h-40px"
                                data-control="select2" data-placeholder="Pilih Agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" <?= ($get['agama'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= ($get['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen
                                </option>
                                <option value="Katolik" <?= ($get['agama'] == 'Katolik') ? 'selected' : '' ?>>Katolik
                                </option>
                                <option value="Hindu" <?= ($get['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= ($get['agama'] == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= ($get['agama'] == 'Konghucu') ? 'selected' : '' ?>>Konghucu
                                </option>
                            </select>
                        </div>
                    </div>
                    <!--end::Input group for Agama-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Simpan Perubahan
                        <span class="spinner-border spinner-border-sm align-middle ms-2" role="status"
                            aria-hidden="true" style="display: none;"></span>
                        <span class="visually-hidden">Memuat...</span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
</div>
<!--end::Content-->

<?= $this->endSection() ?>