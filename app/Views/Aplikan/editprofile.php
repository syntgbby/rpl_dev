<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<!--begin::Content-->
<div id="kt_app_content" class="app-content">
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="frmProfile" class="form">
                <div class="card-body border-top p-9">
                    <!--begin::Input group for pict-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Picture</label>
                        <div class="col-lg-8">
                            <?php
                                if ($get[0]['pict'] != null) {
                                    $pictPath = $get[0]['pict'];
                                } else {
                                    $pictPath = base_url('assets/media/svg/picts/blank.svg');
                                }
                            ?>
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?= $pictPath ?>')">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?= $pictPath ?>')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change pict">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <input type="file" name="pict" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="pict_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel pict">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    </div>
                    <!--end::Input group for pict-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" required class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full Name" value="<?= $get[0]['name'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Tempat Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat Lahir</label>
                        <div class="col-lg-8">
                            <input type="text" name="tempat_lahir" required class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir" value="<?= $get[0]['tempat_lahir'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tempat Lahir-->
                    <!--begin::Input group for Tanggal Lahir-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <input type="date" name="tanggal_lahir" required class="form-control form-control-lg form-control-solid" placeholder="Tanggal Lahir" value="<?= $get[0]['tanggal_lahir'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for Tanggal Lahir-->
                    <!--begin::Input group for No Telepon-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">No Telepon</label>
                        <div class="col-lg-8">
                            <input type="tel" name="telepon" required class="form-control form-control-lg form-control-solid" placeholder="Phone Number" value="<?= $get[0]['telepon'] ?>" />
                        </div>
                    </div>
                    <!--end::Input group for No Telepon-->
                    <!--begin::Input group for Jenis Kelamin-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                        <div class="col-lg-8">
                            <div class="d-flex">
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" required value="L" <?= ($get[0]['jenis_kelamin'] == 'L') ? 'checked' : '' ?> id="laki-laki" />
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?= ($get[0]['jenis_kelamin'] == 'P') ? 'checked' : '' ?> id="perempuan" />
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
                            <select name="agama" required class="form-select form-select-md form-select-solid text-sm h-40px" data-control="select2" data-placeholder="Pilih Agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" <?= ($get[0]['agama'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= ($get[0]['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik" <?= ($get[0]['agama'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= ($get[0]['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= ($get[0]['agama'] == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= ($get[0]['agama'] == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <!--end::Input group for Agama-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save Changes
                        <span class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true" style="display: none;"></span>
                        <span class="visually-hidden">Loading...</span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
    
    <?php /*
    <!-- begin::Sign-in Method-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Sign-in Method</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_signin_method" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Email Address-->
                <div class="d-flex flex-wrap align-items-center">
                    <!--begin::Label-->
                    <div id="formEmail">
                        <div class="fs-6 fw-bold mb-1">Email Address</div>
                        <div class="fw-semibold text-gray-600"><?= $get[0]['email'] ?></div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="formEmail_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <form id="frmEmail" class="form" novalidate="novalidate">
                            <div class="row mb-6">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="fv-row mb-0">
                                        <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">New Email Address</label>
                                        <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Enter New Email Address" name="emailaddress" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fv-row mb-0">
                                        <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button id="btnSaveEmail" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
                                <button id="btnCancelEmail" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="btnFrmEmail" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Change Email</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Email Address-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Password-->
                <div class="d-flex flex-wrap align-items-center mb-10">
                    <!--begin::Label-->
                    <div id="kt_signin_password">
                        <div class="fs-6 fw-bold mb-1">Password</div>
                        <div class="fw-semibold text-gray-600">************</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                            <div class="d-flex">
                                <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Password-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Sign-in Method -->
    */ ?>
</div>
<!--end::Content-->

<script>
$(document).ready(function() {
    // Handle tombol Change Email
    $("#btnFrmEmail button").on("click", function() {
        // Sembunyikan bagian tampilan email dan tombol change
        $("#formEmail").addClass("d-none");
        $("#btnFrmEmail").addClass("d-none");
        
        // Tampilkan form edit
        $("#formEmail_edit").removeClass("d-none");
    });

    // Handle tombol Cancel Email
    $("#btnCancelEmail").on("click", function() {
        // Tampilkan kembali bagian tampilan email dan tombol change
        $("#formEmail").removeClass("d-none");
        $("#btnFrmEmail").removeClass("d-none");
        
        // Sembunyikan form edit
        $("#formEmail_edit").addClass("d-none");
        
        // Reset form
        $("#frmEmail")[0].reset();
    });

    // Toggle Password Visibility untuk semua input password
    $(".position-relative .btn").on("click", function() {
        // Toggle icon
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        
        // Toggle input type pada input password yang berada dalam parent yang sama
        var input = $(this).siblings('input');
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    // Handle Update Email
    $("#btnSaveEmail").on("click", function() {
        // Tambahkan validasi disini sebelum submit
        var newEmail = $("#emailaddress").val();
        var password = $("#confirmemailpassword").val();
        
        if (!newEmail || !password) {
            alert("Please fill all required fields");
            return;
        }
        
        // Lakukan proses update email disini
        // ...
    });
    
    // Handle form submit untuk profile
    $('#btnSave').click(function(e) {
        e.preventDefault();
        const submitBtn = $(this);
        const spinner = submitBtn.find('.spinner-border');

        spinner.show();
        submitBtn.prop('disabled', true);

        if (e.handled !== true) {
            e.handled = true;

            // Validasi form sebelum dikirim
                var formData = new FormData($('#frmProfile')[0]); // Ambil FormData dari form yang benar
                var fileInput = document.querySelector('input[name="pict"]');
                
                // Ajax request
                $.ajax({
                    url: '<?= base_url('edit-profile') ?>', // Sesuaikan dengan route yang benar
                    type: 'POST',
                    data: formData,
                    processData: false, // Penting untuk handling file
                    contentType: false, // Penting untuk handling file
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: "Information",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(function() {
                                window.location.href = '<?= base_url('dashboard') ?>';
                            });
                        } else {
                            // Tampilkan pesan error
                            Swal.fire({
                                title: "Information",
                                text: response.message || "Terjadi kesalahan!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                            }).then(function() {
                                window.location.href = '<?= base_url('dashboard') ?>';
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Information",
                            text: "Terjadi kesalahan pada server",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function() {
                            window.location.href = '<?= base_url('dashboard') ?>';
                        });
                    },
                    complete: function() {
                        // Reset tombol setelah proses selesai
                        submitBtn.prop('disabled', false);
                        spinner.hide();
                    }
                });
        }

        // Handle preview gambar
        var imageInput = document.querySelector('.image-input'); // Pastikan imageInput didefinisikan
        imageInput.querySelector('input[type="file"]').addEventListener("change", function(e) {
            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = imageInput.querySelector(".image-input-wrapper");
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Handle remove gambar
        imageInput.querySelector('[data-kt-image-input-action="remove"]').addEventListener("click", function(e) {
            var input = imageInput.querySelector('input[type="file"]');
            var preview = imageInput.querySelector(".image-input-wrapper");

            input.value = "";
            preview.style.backgroundImage = 'url("<?= base_url('assets/media/svg/picts/blank.svg') ?>")';

            // Set hidden input untuk menandai bahwa gambar dihapus
            imageInput.querySelector('input[name="pict_remove"]').value = "1";
        });
    });

});
</script>

<?= $this->endSection() ?>