<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<!--begin::Content-->
<div id="kt_app_content" class="app-content">
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h1 class="fw-bold m-0">
                    <?= (!empty($dtuser) && isset($dtuser['id'])) ? 'Edit User' : 'Add User' ?>
                </h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body py-4">
                <form
                    action="<?= isset($dtuser) && isset($dtuser['id']) ? base_url('admin/users/update/' . $dtuser['id']) : base_url('admin/users/store') ?>"
                    id="frmusers" class="p-3" method="post">
                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="fv-row mb-8">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            placeholder="Enter Name" value="<?= $dtuser['nama_lengkap'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="fv-row mb-8">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <?php if (isset($dtuser['email'])) {
                                        $col = 'col-md-5';
                                    } else {
                                        $col = 'col-md-7';
                                    } ?>
                                    <div class="<?= $col ?>">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" value="<?= $dtuser['email'] ?? '' ?>"
                                            <?= (!empty($dtuser['email'])) ? 'readonly' : '' ?>>
                                    </div>
                                    <?php if (isset($dtuser['email'])): ?>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" id="btnEmail">
                                                <i class="fa-solid fa-edit text-white text-center"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="fv-row mb-8">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                    <?php if (isset($dtuser['password'])) {
                                        $col = 'col-md-5';
                                    } else {
                                        $col = 'col-md-7';
                                    } ?>
                                    <div class="<?= $col ?>">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Password" value="<?= $dtuser['password'] ?? '' ?>"
                                            <?= (!empty($dtuser['password'])) ? 'readonly' : '' ?>>
                                    </div>
                                    <?php if (isset($dtuser['password'])): ?>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" id="btnPassword">
                                                <i class="fa-solid fa-edit text-white text-center"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="fv-row mb-8">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <label for="role" class="form-label">Peran</label>
                                    </div>
                                    <div class="col-md-7">
                                        <!--begin::Input-->
                                        <select name="role" id="role"
                                            class="form-select form-select-md form-select-solid text-sm h-40px"
                                            data-control="select2" <?= (isset($dtuser['role']) && $dtuser['role'] == 'aplikan') ? 'disabled' : '' ?>>
                                            <option value="admin" <?= (isset($dtuser) && $dtuser['role'] == 'admin') ? 'selected' : '' ?>>
                                                Admin
                                            </option>
                                            <option value="kaprodi" <?= (isset($dtuser) && $dtuser['role'] == 'kaprodi') ? 'selected' : '' ?>>
                                                Kaprodi
                                            </option>
                                            <option value="asesor" <?= (isset($dtuser) && $dtuser['role'] == 'asesor') ? 'selected' : '' ?>>
                                                Assessor
                                            </option>
                                            <?php if (isset($dtuser['role']) && $dtuser['role'] == 'aplikan'): ?>
                                                <option value="aplikan" <?= (isset($dtuser) && $dtuser['role'] == 'aplikan') ? 'selected' : '' ?>>
                                                    Aplikan
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="fv-row mb-8">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <label for="status" class="form-label">Status</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status"
                                                value="Y" <?= (isset($dtuser) && $dtuser['status'] === 'Y') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="status_user_N" value="N" <?= (isset($dtuser) && $dtuser['status'] === 'N') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status_user_N">Tidak Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            onclick="window.history.back()">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSave">
                            <?= (!empty($dtuser) && isset($dtuser['id'])) ? 'Update Data' : 'Simpan Data' ?>
                            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status"
                                aria-hidden="true" style="display: none;"></span>
                            <span class="visually-hidden">Loading...</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
</div>
<!--end::Content-->

<?php if (isset($dtuser['email'])): ?>
    <div class="modal fade" id="modalEmail" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEmailTitle">Change Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEmail" action="<?= base_url('admin/users/update-email/' . $dtuser['email']) ?>"
                        method="post">
                        <div class="mb-3">
                            <label for="oldEmail" class="form-label">Old Email</label>
                            <input type="email" class="form-control" id="oldEmail" name="oldEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="newEmail" class="form-label">New Email</label>
                            <input type="email" class="form-control" id="newEmail" name="newEmail" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnSaveEmail">
                                Save Changes
                                <span class="spinner-border spinner-border-sm align-middle ms-2"
                                    style="display: none;"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPassword" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPassword" action="<?= base_url('admin/users/update-password/' . $dtuser['email']) ?>"
                        method="post">
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnSavePassword">
                                Save Changes
                                <span class="spinner-border spinner-border-sm align-middle ms-2"
                                    style="display: none;"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function () {
        // Konfigurasi SweetAlert2
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true
        });

        // Fungsi untuk menampilkan modal dengan animasi
        function showModal(modalId) {
            const modal = new bootstrap.Modal(document.getElementById(modalId), {
                backdrop: 'static',
                keyboard: false
            });
            modal.show();
        }

        // Event handler untuk tombol email
        $('#btnEmail').click(function () {
            Swal.fire({
                title: 'Change Email',
                text: 'Are you sure you want to change email?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it',
                cancelButtonText: 'No, cancel',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    showModal('modalEmail');
                }
            });
        });

        // Event handler untuk tombol password
        $('#btnPassword').click(function () {
            Swal.fire({
                title: 'Change Password',
                text: 'Are you sure you want to change password?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it',
                cancelButtonText: 'No, cancel',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    showModal('modalPassword');
                }
            });
        });

        // Handle form submission untuk email
        $('#formEmail').on('submit', function (e) {
            e.preventDefault();
            const btn = $('#btnSaveEmail');
            const spinner = btn.find('.spinner-border');

            btn.prop('disabled', true);
            spinner.show();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#modalEmail').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Email updated successfully'
                    });
                },
                error: function (xhr) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Failed to update email'
                    });
                },
                complete: function () {
                    btn.prop('disabled', false);
                    spinner.hide();
                }
            });
        });

        // Handle form submission untuk password
        $('#formPassword').on('submit', function (e) {
            e.preventDefault();
            const btn = $('#btnSavePassword');
            const spinner = btn.find('.spinner-border');

            btn.prop('disabled', true);
            spinner.show();

            const newPassword = $('#newPassword').val();
            const confirmPassword = $('#confirmPassword').val();

            if (newPassword !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'New password and confirm password do not match',
                    text: 'Please check your password again',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
                btn.prop('disabled', false);
                spinner.hide();
                return;
            }

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#modalPassword').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Password updated successfully'
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.message || 'Failed to update password'
                        });
                    }
                },
                error: function (xhr) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Server error'
                    });
                },
                complete: function () {
                    btn.prop('disabled', false);
                    spinner.hide();
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>