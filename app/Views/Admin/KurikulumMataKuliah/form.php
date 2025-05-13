<form
    action="<?= isset($kurikulum_prodi) && isset($kurikulum_prodi['id']) ? base_url('admin/kurikulum-prodi/update/' . $kurikulum_prodi['id']) : base_url('admin/kurikulum-prodi/store') ?>"
    id="frmprodi" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Prodi</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" id="prodi_id" name="prodi_id">
                            <option value="" disabled selected>Select Prodi</option>
                            <?php foreach ($prodi as $row): ?>
                                <option value="<?= $row['id'] ?>" <?= (isset($kurikulum_prodi) && $kurikulum_prodi['prodi_id'] === $row['id']) ? 'selected' : '' ?>><?= $row['nama_prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Tahun Ajar</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" id="tahun_ajar_id" name="tahun_ajar_id">
                        <option value="" disabled selected>Select Academic Year</option>
                            <?php foreach ($tahun_ajar as $trow): ?>
                                <option value="<?= $trow['id'] ?>" <?= (isset($kurikulum_prodi) && $kurikulum_prodi['tahun_ajar_id'] === $trow['id']) ? 'selected' : '' ?>><?= $trow['tahun'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
                                <?= (isset($kurikulum_prodi) && $kurikulum_prodi['status'] === 'Y') ? 'checked' : '' ?> defaultChecked>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N"
                                value="N" <?= (isset($kurikulum_prodi) && $kurikulum_prodi['status'] === 'N') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_user_N">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-1 px-1 mt-1">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Save Changes
            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status"
                aria-hidden="true" style="display: none;"></span>
            <span class="visually-hidden">Loading...</span>
        </button>
    </div>
    <!--end::Actions-->
</form>