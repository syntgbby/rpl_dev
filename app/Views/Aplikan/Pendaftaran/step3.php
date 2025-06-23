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
                <h3 class="fw-bold m-0">Data Riwayat Kerja</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?php if ($konfirmasi_step['status'] == null): ?>
                <!--begin::Alert-->
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-question fs-2hx text-warning me-4"><span class="path1"></span><span
                            class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-warning">Konfirmasi Pendataan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Apakah anda ingin mengisi data riwayat kerja?</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <div class="ms-4">
                        <a href="/aplikan/update-konfirmasi-step/step3/Y" class="btn btn-sm btn-primary me-2">Ya</a>
                        <a href="/aplikan/update-konfirmasi-step/step3/N" class="btn btn-sm btn-light">Tidak</a>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Alert-->
            <?php endif; ?>
            <!--begin::Form-->
            <form action="<?= base_url('aplikan/pendaftaran/saveStep3') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <?php if ($konfirmasi_step['status'] == 'N'): ?>
                        <div class="alert alert-info d-flex align-items-center p-5 mb-10">
                            <i class="ki-duotone ki-information fs-2hx text-info me-4"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-info">Informasi</h4>
                                <span>Anda memilih untuk tidak mengisi data riwayat kerja. Jika ingin mengisi, silahkan
                                    hubungi admin untuk mengubah konfirmasi.</span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Perusahaan</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama_perusahaan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Nama Perusahaan" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?> />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi Pekerjaan</label>
                        <div class="col-lg-8">
                            <input type="text" name="deskripsi_pekerjaan" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Deskripsi Pekerjaan" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?> />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jabatan / Posisi</label>
                        <div class="col-lg-8">
                            <input type="text" name="posisi" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Jabatan / Posisi" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?> />
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->

                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Bukti</label>
                        <div class="col-lg-8">
                            <input type="file" name="file_bukti" accept=".pdf" required
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Upload Bukti" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?> />
                            <span class="text-danger">*Format file: .pdf</span>
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                    <!--begin::Input group for Full Name-->
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Mulai</label>
                            <div class="col-lg-8">
                                <select name="tahun_mulai" required class="form-select form-select-lg form-select-solid"
                                    data-control="select2" data-placeholder="Pilih Tahun Mulai"
                                    style="width: 100%; height: 48px;" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?>>
                                    <option></option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($i = $currentYear; $i >= 1990; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Selesai</label>
                            <div class="col-lg-8">
                                <select name="tahun_selesai" class="form-select form-select-lg form-select-solid"
                                    data-control="select2" data-placeholder="Pilih Tahun Selesai"
                                    style="width: 100%; height: 48px;" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?>>
                                    <option></option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($i = $currentYear; $i >= 1990; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group for Full Name-->
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <!-- <button type="cancel" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.href='<?= base_url('dashboard') ?>'">Batal</button> -->
                    <button type="submit" class="btn btn-primary" <?= ($konfirmasi_step['status'] != 'Y') ? 'disabled' : '' ?>>
                        Simpan
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

</div>
<!--end::Basic info-->
</div>
<!--end::Content-->

<!-- Tambahkan script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function () {
        // Inisialisasi Select2 untuk semua select
        $('[data-control="select2"]').select2({
            minimumResultsForSearch: -1,
            width: '100%',
            dropdownParent: $('body'),
            templateResult: formatState,
            templateSelection: formatState
        });

        // Fungsi untuk memformat tampilan select2
        function formatState(opt) {
            if (!opt.id) {
                return opt.text;
            }
            return $('<span style="font-size: 14px; line-height: 1.5;">' + opt.text + '</span>');
        }
    });
</script>

<?= $this->endSection() ?>