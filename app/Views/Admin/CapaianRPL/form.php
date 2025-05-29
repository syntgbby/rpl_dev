<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<form
    action="<?= isset($dtasesmen) && isset($dtasesmen['id']) ? base_url('admin/capaian-rpl/update/' . $dtasesmen['id']) : base_url('admin/capaian-rpl/store') ?>"
    id="frmCapaian" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Mata Kuliah</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control form-control-solid form-control-lg" data-control="select2"
                            id="kurikulum_id" name="kurikulum_id" placeholder="Pilih Mata Kuliah" required>
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            <?php foreach ($mata_kuliah as $mrow): ?>
                                <option value="<?= $mrow['id'] ?>" <?= (isset($dtasesmen) && $dtasesmen['kurikulum_id'] == $mrow['id']) ? 'selected' : '' ?>>
                                    (<?= $mrow['nama_prodi'] ?>) <?= $mrow['kode_matkul'] ?> - <?= $mrow['nama_matkul'] ?>
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
                        <label for="email" class="form-label">Deskripsi</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            placeholder="Masukkan Deskripsi" value="<?= $dtasesmen['deskripsi'] ?? '' ?>">
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