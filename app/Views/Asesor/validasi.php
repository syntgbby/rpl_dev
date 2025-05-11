<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content">
                    <div class="card">
                        <div class="card-body">
                            <!-- Data Mahasiswa Readonly -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <div><?= esc($dtpendaftaran['nama_lengkap']) ?></div>
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

<?= $this->endSection(); ?>