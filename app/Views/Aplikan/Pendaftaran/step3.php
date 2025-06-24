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
        </div>

        <div class="card-body border-top p-9">

            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            <?php elseif (session()->getFlashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('error') ?>',
                        confirmButtonColor: '#d33',
                    });
                </script>
            <?php endif; ?>
            <!--begin::Table-->
            <div class="table-responsive">
                <div class="mb-5 text-end">
                    <?php if ($konfirmasi_step['status'] == 'Y'): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalRiwayatKerja">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    <?php endif; ?>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Nama Perusahaan</th>
                                <th class="min-w-85px">Posisi</th>
                                <th class="min-w-85px">Deskripsi Pekerjaan</th>
                                <th class="min-w-85px">Tahun Mulai</th>
                                <th class="min-w-85px">Tahun Selesai</th>
                                <th class="min-w-85px">Bukti</th>
                                <th class="min-w-75px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php if ($riwayat_kerja): ?>
                                <?php foreach ($riwayat_kerja as $row): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_perusahaan'] ?>
                                        </td>
                                        <td>
                                            <?= $row['posisi'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['deskripsi_pekerjaan'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['tahun_mulai'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['tahun_selesai'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['file_bukti']): ?>
                                                <a href="<?= $row['file_bukti'] ?>" target="_blank"><i class="fa-solid fa-eye"></i>
                                                    Lihat Bukti</a>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                    onClick="window.location.href='<?= base_url('aplikan/pendaftaran/deleteRiwayatKerja/') . $row['id'] ?>'"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
                <?php if ($riwayat_kerja): ?>
                    <button type="submit" class="btn btn-primary text-white"><a
                            href="<?= base_url('aplikan/pendaftaran/step4') ?>" class="text-white">Lanjutkan ke Step
                            4</a></button>
                <?php endif; ?>
            </div>
            <!--end::Content-->
        </div>
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

<!--begin::Modal Tambah RiwayatKerja-->
<div class="modal fade" id="modalRiwayatKerja" tabindex="-1" aria-labelledby="modalRiwayatKerjaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('aplikan/pendaftaran/saveStep3') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRiwayatKerjaLabel">Tambah Data Riwayat Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" required class="form-control"
                            placeholder="Nama Perusahaan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Posisi/Jabatan</label>
                        <input type="text" name="posisi" required class="form-control" placeholder="Posisi/Jabatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Deskripsi Pekerjaan</label>
                        <textarea name="deskripsi_pekerjaan" required class="form-control"
                            placeholder="Deskripsi Pekerjaan"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label required">Tahun Mulai</label>
                            <select name="tahun_mulai" class="form-select form-select-lg form-select-solid"
                                data-control="select2" data-placeholder="Pilih Tahun Mulai" required>
                                <option></option>
                                <?php for ($i = date('Y'); $i >= 1990; $i--): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required">Tahun Selesai</label>
                            <select name="tahun_selesai" class="form-select form-select-lg form-select-solid"
                                data-control="select2" data-placeholder="Pilih Tahun Selesai" required>
                                <option></option>
                                <?php for ($i = date('Y'); $i >= 1990; $i--): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Upload Bukti</label>
                        <input type="file" name="file_bukti" accept=".pdf,.jpg,.png" required class="form-control">
                        <small class="text-danger d-block mt-1">*Format file: .pdf, .jpg, .png</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Tambah RiwayatKerja-->
<?= $this->endSection() ?>