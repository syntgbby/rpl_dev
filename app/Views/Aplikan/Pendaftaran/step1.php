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
                <h3 class="fw-bold m-0">Data Biodata Diri</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="<?= base_url('aplikan/pendaftaran/saveStep1') ?>" method="post">
                <div class="card-body border-top p-9">
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_lengkap" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Nama Lengkap" value="<?= $data['nama_lengkap'] ?>" readonly />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">NIK</label>
                        <div class="col-lg-8">
                            <input type="text" name="nik" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="NIK" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat Rumah</label>
                        <div class="col-lg-8">
                            <textarea name="alamat" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Alamat Rumah"
                                value="<?= $data['alamat'] ?>"><?= $data['alamat'] ?></textarea>
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">No HP</label>
                        <div class="col-lg-8">
                            <input type="text" name="no_hp" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="No HP"
                                value="<?= $data['telepon'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Tempat Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" name="tempat_lahir" required
                                class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir"
                                value="<?= $data['tempat_lahir'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tempat Lahir-->
                    <!--begin::Input group for Tanggal Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="date" name="tanggal_lahir" required
                                class="form-control form-control-lg form-control-solid" placeholder="Tanggal Lahir"
                                value="<?= $data['tanggal_lahir'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tanggal Lahir-->
                    <!--begin::Input group for Tanggal Lahir-->
                    <!-- Hidden input that holds the selected program_studi value -->
                    <input type="hidden" name="program_studi" value="<?= $data['prodi_id'] ?>">
                    <!--end::Input group for Tanggal Lahir-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="cancel" class="btn btn-light btn-active-light-primary me-2"
                        onclick="window.location.href='<?= base_url('dashboard') ?>'">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Simpan Biodata Diri
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