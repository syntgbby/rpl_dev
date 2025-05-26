<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                        <select class="form-control form-control-solid" data-control="select2" id="prodi_id"
                            name="prodi_id" placeholder="Pilih Program Studi" required>
                            <option value="" disabled selected>Pilih Program Studi</option>
                            <?php foreach ($prodi as $prow): ?>
                                <option value="<?= $prow['id'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['prodi_id'] == $prow['id']) ? 'selected' : '' ?>><?= $prow['nama_prodi'] ?>
                                </option>
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
                        <select class="form-control form-control-solid" data-control="select2" id="tahun_ajar_id"
                            name="tahun_ajar_id" placeholder="Pilih Tahun Ajar" required>
                            <option value="" disabled selected>Pilih Tahun Ajar</option>
                            <?php foreach ($tahun_ajar as $trow): ?>
                                <option value="<?= $trow['id'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['tahun_ajar_id'] == $trow['id']) ? 'selected' : '' ?>><?= $trow['tahun'] ?>
                                </option>
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
                        <label for="email" class="form-label">Mata Kuliah</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control form-control-solid" data-control="select2" id="kode_matkul"
                            name="kode_matkul" placeholder="Pilih Mata Kuliah" required>
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            <?php foreach ($mata_kuliah as $mrow): ?>
                                <option value="<?= $mrow['kode_matkul'] ?>" <?= (isset($dtkurikulum) && $dtkurikulum['kode_matkul'] == $mrow['kode_matkul']) ? 'selected' : '' ?>>
                                    <?= $mrow['kode_matkul'] ?> - <?= $mrow['nama_matkul'] ?>
                                </option>
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
                            <label class="form-check-label" for="status">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N" value="N"
                                <?= (isset($dtkurikulum) && $dtkurikulum['status'] === 'N') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_user_N">Tidak Aktif</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Simpan
            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true"
                style="display: none;"></span>
            <span class="visually-hidden">Loading...</span>
        </button>
    </div>
    <!--end::Actions-->
</form>