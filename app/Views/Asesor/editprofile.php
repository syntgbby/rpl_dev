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
                    <!--begin::Input group for NIP-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">NIP / NIDN</label>
                        <div class="col-lg-8">
                            <input type="text" name="nip_nidn" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="NIP / NIDN" value="<?= $get['nip_nidn'] ? $get['nip_nidn'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for NIP-->

                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_lengkap" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Nama Lengkap" value="<?= $get['nama_lengkap'] ? $get['nama_lengkap'] : '' ?>" />
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

                    <!--begin::Input group for Golongan-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Golongan</label>
                        <div class="col-lg-8">
                            <input type="text" name="pangkat_golongan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Golongan" value="<?= $get['pangkat_golongan'] ? $get['pangkat_golongan'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Golongan-->

                    <!--begin::Input group for Jabatan-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jabatan</label>
                        <div class="col-lg-8">
                            <input type="text" name="jabatan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Jabatan" value="<?= $get['jabatan'] ? $get['jabatan'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Jabatan-->

                    <!--begin::Input group for Bidang Keahlian-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang Keahlian</label>
                        <div class="col-lg-8">
                            <input type="text" name="bidang_ilmu_keahlian" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Bidang Keahlian" value="<?= $get['bidang_ilmu_keahlian'] ? $get['bidang_ilmu_keahlian'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Bidang Keahlian-->

                    <!--begin::Input group for Pendidikan Terakhir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pendidikan Terakhir</label>
                        <div class="col-lg-8">
                            <input type="text" name="pendidikan_terakhir" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Pendidikan Terakhir" value="<?= $get['pendidikan_terakhir'] ? $get['pendidikan_terakhir'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Pendidikan Terakhir-->

                    <!--begin::Input group for No Telepon-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">No Telepon</label>
                        <div class="col-lg-8">
                            <input type="text" name="telepon" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="No HP" value="<?= $get['telepon'] ? $get['telepon'] : '' ?>" />
                        </div>
                    </div>
                    <!--end::Input group for No Telepon-->

                    <!--begin::Input group for Alamat-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
                        <div class="col-lg-8">
                            <textarea name="alamat" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Alamat" value="<?= $get['alamat'] ? $get['alamat'] : '' ?>"></textarea>
                        </div>
                    </div>
                    <!--end::Input group for Pendidikan Terakhir-->

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