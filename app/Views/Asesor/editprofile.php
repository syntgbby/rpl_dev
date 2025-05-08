<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div id="kt_app_toolbar" class="app-toolbar py-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
            <div class="d-flex flex-column flex-row-fluid">
                <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                    <div class="page-title d-flex align-items-center me-3">
                        <img alt="Logo" src="<?= base_url('assets/media/svg/misc/layer.svg') ?>" class="h-60px me-5" />
                        <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Validasi - Assessment
                            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Calon Mahasiswa RPL</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content">
                    <div class="card">
                        <div class="card-body">
                            <!-- Data Mahasiswa Readonly -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <div><?= esc($data['name']) ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Posisi</label>
                                <div><?= esc($data['position']) ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kantor</label>
                                <div><?= esc($data['office']) ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Umur</label>
                                <div><?= esc($data['age']) ?> tahun</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Masuk</label>
                                <div><?= esc($data['start_date']) ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Gaji</label>
                                <div>$<?= esc($data['salary']) ?></div>
                            </div>
                            <!-- END Data Mahasiswa Readonly -->

                            <!-- Select Tahun Kurikulum -->
                            <h5 class="card-title mt-5">Data Kurikulum</h5>
                            <div class="row g-3 align-items-center mb-5">
                                <div class="col-md-6">
                                    <select class="form-select" id="tahunSelect">
                                        <option value="" selected disabled>Pilih Tahun Kurikulum</option>
                                        <option value="2020">Tahun 2020-2021</option>
                                        <option value="2021">Tahun 2021-2022</option>
                                        <option value="2022">Tahun 2022-2023</option>
                                        <option value="2023">Tahun 2023-2024</option>
                                        <option value="2024">Tahun 2024-2025</option>
                                        <option value="2025">Tahun 2025-2026</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="cariBtn">Cari</button>
                                </div>
                            </div>
                            <!-- Tabel RPL (disembunyikan dulu) -->
                            <div class="table-responsive mt-4" id="tabelRplContainer" style="display: none;">
                                <table class="table table-bordered text-center">
                                    <thead style="background-color: #b3e0ff; text-align: center; vertical-align: middle;">
                                        <tr>
                                            <th rowspan="2" style="width: 10%;">No</th>
                                            <th rowspan="2" style="width: 20%;">Kode Mata Kuliah</th>
                                            <th rowspan="2" style="width: 40%;">Nama Mata Kuliah</th>
                                            <th colspan="2" style="width: 30%;">Mengajukan RPL</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 15%;">Ya</th>
                                            <th style="width: 15%;">Tidak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>02BBMIK01</td>
                                            <td>Bahasa Inggris I</td>
                                            <td><input type="checkbox" class="rpl-ya" data-id="1"></td>
                                            <td><input type="checkbox" class="rpl-tidak" data-id="1"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>04KBMIK01</td>
                                            <td>Desain Web</td>
                                            <td><input type="checkbox" class="rpl-ya" data-id="2"></td>
                                            <td><input type="checkbox" class="rpl-tidak" data-id="2"></td>
                                        </tr>
                                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                                    </tbody>
                                </table>
                                <div class="text-end mt-3">
                                    <button class="btn btn-success" id="simpanBtn">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>