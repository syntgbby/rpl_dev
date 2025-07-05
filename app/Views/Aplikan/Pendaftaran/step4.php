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
                <h3 class="fw-bold m-0">Data Bukti Pendukung</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="<?= base_url('aplikan/pendaftaran/saveStep4') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <!--begin::Input group for Bukti KTP-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti KTP (Kartu Tanda
                            Penduduk)</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_ktp" accept=".pdf" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                            <span class="text-danger">*Format file: .pdf</span>
                        </div>
                    </div>
                    <!--end::Input group for Bukti KTP-->
                    <!--begin::Input group for Bukti KK-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti KK (Kartu
                            Keluarga)</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_kk" accept=".pdf" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                            <span class="text-danger">*Format file: .pdf</span>
                        </div>
                    </div>
                    <!--end::Input group for Bukti KK-->
                    <!--begin::Input group for Bukti Ijazah-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti Ijazah (Surat
                            Keterangan Lulus)</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_ijazah" accept=".pdf" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                            <span class="text-danger">*Format file: .pdf</span>
                        </div>
                    </div>
                    <!--end::Input group for Bukti Ijazah-->
                    <!--begin::Input group for Foto Diri-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Foto Diri</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_foto" accept=".jpg, .jpeg, .png" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                            <span class="text-danger">*Format file: .jpg, .jpeg, .png</span>
                        </div>
                    </div>
                    <!--end::Input group for Foto Diri-->
                    <!--begin::Input group for Foto TTD-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Tanda Tangan</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_ttd" accept=".jpg, .jpeg, .png" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" />
                            <span class="text-danger">*Format file: .jpg, .jpeg, .png</span>
                        </div>
                    </div>
                    <!--end::Input group for Foto TTD-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Lanjut Asesmen Mandiri
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

</div>
<!--end::Basic info-->
</div>
<!--end::Content-->

<?= $this->endSection() ?>