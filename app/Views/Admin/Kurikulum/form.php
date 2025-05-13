<form
    action="<?= isset($dtkurikulum) && isset($dtkurikulum['id']) ? base_url('admin/kurikulum/update/' . $dtkurikulum['id']) : base_url('admin/kurikulum/store') ?>"
    id="frmkurikulum" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Program Studi</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control form-control-solid" data-control="select2" id="prodi_id" name="prodi_id" placeholder="Select Study Programme" required>
                            <option value="" disabled selected>Select Study Programme</option>
                            <?php foreach ($prodi as $prow): ?>
                                <option value="<?= $prow['id'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['prodi_id'] == $prow['id']) ? 'selected' : '' ?>><?= $prow['nama_prodi'] ?></option>
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
                        <label for="name" class="form-label">Tahun Ajaran</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control form-control-solid" data-control="select2" id="tahun_ajar_id" name="tahun_ajar_id" placeholder="Select Academic Year" required>
                            <option value="" disabled selected>Select Academic Year</option>
                            <?php foreach ($tahun_ajar as $trow): ?>
                                <option value="<?= $trow['id'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['tahun_ajar_id'] == $trow['id']) ? 'selected' : '' ?>><?= $trow['tahun'] ?></option>
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
                        <label for="email" class="form-label">Subjects</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control form-control-solid" data-control="select2" id="matkul_id" name="matkul_id" placeholder="Select Subjects" required>
                            <option value="" disabled selected>Select Subjects</option>
                            <?php foreach ($mata_kuliah as $mrow): ?>
                                <option value="<?= $mrow['id'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['matkul_id'] == $mrow['id']) ? 'selected' : '' ?>><?= $mrow['nama_matkul'] ?></option>
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
                        <label for="email" class="form-label">Status</label>
                    </div>
                    <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="Y"
                                <?= (isset($dtkurikulum) && $dtkurikulum['status'] === 'Y') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N"
                                value="N" <?= (isset($dtkurikulum) && $dtkurikulum['status'] === 'N') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_user_N">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Save Changes
            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status"
                aria-hidden="true" style="display: none;"></span>
            <span class="visually-hidden">Loading...</span>
        </button>
    </div>
    <!--end::Actions-->
</form>