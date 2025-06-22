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
                    <?= (!empty($dtkurikulum) && isset($dtkurikulum['id'])) ? 'Edit Kurikulum' : 'Tambah Kurikulum' ?>
                </h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body py-4">
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
                                        <select class="form-control form-control-solid form-control-lg" data-control="select2"
                                            id="prodi_id" name="prodi_id" data-placeholder="Pilih Program Studi" required>
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
                                        <select class="form-control form-control-solid form-control-lg" data-control="select2"
                                            id="tahun_ajar_id" name="tahun_ajar_id" placeholder="Pilih Tahun Ajar" required>
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
                                        <select class="form-control form-control-solid form-control-lg" data-control="select2"
                                            id="kode_matkul" name="kode_matkul" placeholder="Pilih Mata Kuliah" required>
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
                        <button type="button" class="btn btn-light" onclick="window.history.back()">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSave">Simpan
                            <span class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true"
                                style="display: none;"></span>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Inisialisasi -->
<script>
    $(document).ready(function () {
        $('[data-control="select2"]').select2({
            width: '100%'
        });
    });
</script>
<?= $this->endSection() ?>