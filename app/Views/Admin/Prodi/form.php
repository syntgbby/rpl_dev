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
                <h3 class="fw-bold m-0">
                    <?= (!empty($dtprodi) && isset($dtprodi['id'])) ? 'Edit' : 'Add' ?>

                </h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form
                action="<?= isset($dtprodi) && isset($dtprodi['id']) ? base_url('admin/prodi/update/' . $dtprodi['id']) : base_url('admin/prodi/store') ?>"
                id="frmprodi" class="p-3" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="name" class="form-label">Name</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                        placeholder="Enter Name" value="<?= $dtprodi['nama_prodi'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="email" class="form-label">Deskripsi Singkat</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="deskripsi_singkat"
                                        name="deskripsi_singkat" placeholder="Enter Email"
                                        value="<?= $dtprodi['deskripsi_singkat'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="email" class="form-label">Deskripsi Singkat</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="deskripsi_lengkap"
                                        name="deskripsi_lengkap" placeholder="Enter Email"
                                        value="<?= $dtprodi['deskripsi_lengkap'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Picture</label>
                                </div>
                                <div class="col-md-7">
                                    <?php
                                    if ($dtprodi['pict'] != null) {
                                        $pictPath = $dtprodi['pict'];
                                    } else {
                                        $pictPath = base_url('assets/media/svg/picts/blank.svg');
                                    }
                                    ?>
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('<?= $pictPath ?>')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('<?= $pictPath ?>')"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change pict">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="pict" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="pict_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel pict">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save Changes
                        <span class="spinner-border spinner-border-sm align-middle ms-2" role="status"
                            aria-hidden="true" style="display: none;"></span>
                        <span class="visually-hidden">Loading...</span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

</div>
<!--end::Content-->

<?= $this->endSection() ?>