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
                    <?= (!empty($dtasesmen) && isset($dtasesmen['id'])) ? 'Edit Capaian Asesmen' : 'Tambah Capaian Asesmen' ?>
                </h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body py-4">
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
                                        <select class="form-control form-control-solid form-control-lg"
                                            data-control="select2" id="kurikulum_id" name="kurikulum_id"
                                            placeholder="Pilih Mata Kuliah" required>
                                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                                            <?php foreach ($mata_kuliah as $mrow): ?>
                                                <option value="<?= $mrow['id'] ?>" <?= (isset($dtasesmen) && $dtasesmen['kurikulum_id'] == $mrow['id']) ? 'selected' : '' ?>>
                                                    (<?= $mrow['nama_prodi'] ?>) <?= $mrow['kode_matkul'] ?> -
                                                    <?= $mrow['nama_matkul'] ?>
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
                                            placeholder="Masukkan Deskripsi"
                                            value="<?= $dtasesmen['deskripsi'] ?? '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-light" onclick="window.history.back()">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSave">Simpan
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
<?= $this->endSection() ?>