<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<form
    action="<?= isset($dtprodi) && isset($dtprodi['id']) ? base_url('admin/prodi/update/' . $dtprodi['id']) : base_url('admin/prodi/store') ?>"
    id="frmprodi" class="p-3" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Nama Prodi</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                            placeholder="Masukkan Nama Prodi" value="<?= $dtprodi['nama_prodi'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Jenjang Pendidikan</label>
                    </div>
                    <div class="col-md-7">
                        <select name="jenjang_pendidikan" id="jenjang_pendidikan" data-control="select2"
                            class="form-control form-control-lg" data-placeholder="Pilih Jenjang Pendidikan" required>
                            <option value="" disabled <?= !isset($dtprodi['jenjang_pendidikan']) ? 'selected' : '' ?>>
                                Pilih Jenjang Pendidikan</option>
                            <option value="D3" <?= (isset($dtprodi['jenjang_pendidikan']) && $dtprodi['jenjang_pendidikan'] == 'D3') ? 'selected' : '' ?>>D3</option>
                            <option value="S1 Terapan" <?= (isset($dtprodi['jenjang_pendidikan']) && $dtprodi['jenjang_pendidikan'] == 'S1 Terapan') ? 'selected' : '' ?>>S1 Terapan
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Kategori</label>
                    </div>
                    <div class="col-md-7">
                        <select name="kategori" id="kategori" data-control="select2"
                            class="form-control form-control-lg" data-placeholder="Pilih Kategori" required>
                            <option value="" disabled <?= !isset($dtprodi['kategori']) ? 'selected' : '' ?>>Pilih
                                Kategori</option>
                            <option value="Business" <?= (isset($dtprodi['kategori']) && $dtprodi['kategori'] == 'Business') ? 'selected' : '' ?>>Business</option>
                            <option value="Communication" <?= (isset($dtprodi['kategori']) && $dtprodi['kategori'] == 'Communication') ? 'selected' : '' ?>>Communication</option>
                            <option value="Finance" <?= (isset($dtprodi['kategori']) && $dtprodi['kategori'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
                            <option value="Technology" <?= (isset($dtprodi['kategori']) && $dtprodi['kategori'] == 'Technology') ? 'selected' : '' ?>>Technology</option>
                        </select>
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
                        <input type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat"
                            placeholder="Masukkan Deskripsi Singkat" value="<?= $dtprodi['deskripsi_singkat'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Deskripsi Lengkap</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="deskripsi_lengkap" name="deskripsi_lengkap"
                            placeholder="Masukkan Deskripsi Lengkap" value="<?= $dtprodi['deskripsi_lengkap'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-1 px-1 mt-1">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Simpan
            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true"
                style="display: none;"></span>
            <span class="visually-hidden">Loading...</span>
        </button>
    </div>
    <!--end::Actions-->
</form>

<script>
    $(document).ready(function () {
        $('[data-control="select2"]').select2();
    });
</script>