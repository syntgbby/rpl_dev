<form
    action="<?= isset($dttahun_ajar) && isset($dttahun_ajar['id']) ? base_url('admin/tahun-ajar/update/' . $dttahun_ajar['id']) : base_url('admin/tahun-ajar/store') ?>"
    id="frmtahun_ajar" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Tahun</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="tahun" name="tahun"
                            placeholder="Enter Tahun" value="<?= $dttahun_ajar['tahun'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Keterangan</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="keterangan"
                            name="keterangan" placeholder="Enter Keterangan"
                            value="<?= $dttahun_ajar['keterangan'] ?? '' ?>">
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
                                <?= (isset($dttahun_ajar) && $dttahun_ajar['status'] === 'Y') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N"
                                value="N" <?= (isset($dttahun_ajar) && $dttahun_ajar['status'] === 'N') ? 'checked' : '' ?>>
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