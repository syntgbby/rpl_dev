<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content">
        <div class="card">
            <div
                class="card-header border-0 pt-6 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h1 class="card-title">Data Kurikulum</h1>
                <form method="get" class="d-flex flex-wrap gap-4">
                    <div class="d-flex flex-column ">
                        <label for="prodi" class="form-label mb-1">Program Studi</label>
                        <select class="form-select form-control-lg" data-control="select2" name="prodi" id="prodi"
                            data-placeholder="Pilih Prodi">
                            <option value="" disabled <?= empty($_GET['prodi']) ? 'selected' : '' ?>></option>
                            <?php foreach ($prodi as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= ($p['id'] == ($_GET['prodi'] ?? '')) ? 'selected' : '' ?>>
                                    <?= $p['nama_prodi'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-flex flex-column ">
                        <label for="tahun" class="form-label mb-1">Tahun Ajaran</label>
                        <select name="tahun" id="tahun" class="form-select form-control-lg" data-control="select2"
                            data-placeholder="Pilih Tahun Ajaran">
                            <option value="" disabled <?= empty($_GET['tahun']) ? 'selected' : '' ?>></option>
                            <?php foreach ($listTahun as $t): ?>
                                <option value="<?= $t['tahun'] ?>" <?= ($t['tahun'] == ($_GET['tahun'] ?? '')) ? 'selected' : '' ?>>
                                    <?= $t['tahun'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>


            </div>

            <div class="card-body py-4">
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

                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-10px">No</th>
                                <th class="min-w-55px">Kode Mata Kuliah</th>
                                <th class="min-w-55px">Program Studi</th>
                                <th class="min-w-55px">Tahun Ajaran</th>
                                <th class="min-w-55px">Mata Kuliah</th>
                                <th class="min-w-55px">SKS</th>
                                <th class="min-w-55px">Status</th>
                            </tr>
                        </thead>
                        <?php if ($kurikulum): ?>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php $no = 1; ?>
                                <?php foreach ($kurikulum as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $row['kode_matkul'] ?></td>
                                        <td class="text-center"><?= $row['nama_prodi'] ?></td>
                                        <td class="text-center"><?= $row['tahun'] ?></td>
                                        <td class="text-center"><?= $row['nama_matkul'] ?></td>
                                        <td class="text-center"><?= $row['sks'] ?></td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 'Y'): ?>
                                                <span class="badge bg-success text-white">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger text-white">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Ada Data</td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>