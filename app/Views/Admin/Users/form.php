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
                    <?= (!empty($dtuser) && isset($dtuser['id'])) ? 'Edit' : 'Add' ?>

                </h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form
                action="<?= isset($dtuser) && isset($dtuser['id']) ? base_url('admin/users/update/' . $dtuser['id']) : base_url('admin/users/store') ?>"
                id="frmusers" class="p-3" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="name" class="form-label">Name</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter Name" value="<?= $dtuser['username'] ?? '' ?>">
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
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="<?= $dtuser['email'] ?? '' ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" id="btnEmail">
                                        Change Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="Enter Password" value="<?= $dtuser['password'] ?? '' ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" id="btnPassword">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fv-row mb-8">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <label for="role" class="form-label">Role</label>
                                </div>
                                <div class="col-md-7">
                                    <!--begin::Input-->
                                    <select name="role"
                                        class="form-select form-select-md form-select-solid text-sm h-40px"
                                        data-control="select2">
                                        <option value="Admin" <?= (isset($dtuser) && $dtuser['role'] == 'Admin') ? 'selected' : '' ?>>
                                            Admin
                                        </option>
                                        <option value="Asesor" <?= (isset($dtuser) && $dtuser['role'] == 'Asesor') ? 'selected' : '' ?>>
                                            Assessor
                                        </option>
                                        <option value="Aplikan" <?= (isset($dtuser) && $dtuser['role'] == 'Aplikan') ? 'selected' : '' ?>>
                                            Aplikan
                                        </option>
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
                                        <input class="form-check-input" type="radio" name="status" id="status" value="Y"
                                            <?= (isset($dtuser) && $dtuser['status'] === 'Y') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_user_N"
                                            value="N" <?= (isset($dtuser) && $dtuser['status'] === 'N') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status_user_N">Inactive</label>
                                    </div>
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

<script>
    $(document).ready(function() {
        $('#btnEmail').click(function() {
            Swal.fire({
                title: 'Change Email',
                text: 'Are you sure you want to change email?',
                icon: 'warning',
                confirmButtonText: 'Yes',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('edit-email') ?>';
                }
            });
        });

        $('#btnPassword').click(function() {
            Swal.fire({
                title: 'Change Password',
                text: 'Are you sure you want to change password?',
                icon: 'warning',
                confirmButtonText: 'Yes',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('edit-password') ?>';
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>