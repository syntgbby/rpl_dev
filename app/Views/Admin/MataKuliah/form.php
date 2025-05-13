<form
    action="<?= isset($dtmata_kuliah) && isset($dtmata_kuliah['id']) ? base_url('admin/mata-kuliah/update/' . $dtmata_kuliah['id']) : base_url('admin/mata-kuliah/store') ?>"
    id="frmmata_kuliah" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Nama Mata Kuliah</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_matkul"
                            name="nama_matkul" placeholder="Enter Nama Mata Kuliah"
                            value="<?= $dtmata_kuliah['nama_matkul'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">SKS</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="sks"
                            name="sks" placeholder="Enter SKS"
                            value="<?= $dtmata_kuliah['sks'] ?? '' ?>">
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
                                <?= (isset($dtmata_kuliah) && $dtmata_kuliah['status'] === 'Y') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N"
                                value="N" <?= (isset($dtmata_kuliah) && $dtmata_kuliah['status'] === 'N') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status">Inactive</label>
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