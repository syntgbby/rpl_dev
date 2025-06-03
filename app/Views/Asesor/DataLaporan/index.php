<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                   <form action="<?= base_url('asesor/filter') ?>" method="GET">
                        <div class="row">
                            <div class="col mt-6">
                                <input type="date" name="start_date" 
                                    class="form-control form-control-lg form-control-solid"
                                    value="<?= isset($start_date) ? substr($start_date, 0, 10) : '' ?>" />
                            </div>
                            <div class="col mt-6">
                                <input type="date" name="end_date" 
                                    class="form-control form-control-lg form-control-solid"
                                    value="<?= isset($end_date) ? substr($end_date, 0, 10) : '' ?>" />
                            </div>
                            <div class="col mt-6">
                                <button type="submit" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table id="kt_datatable_fixed_header" class="table table-striped table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-85px">Tanggal</th>
                                <th class="min-w-25px">Nama</th>
                                <th class="min-w-85px">Program Study</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php if ($dtpendaftaran): ?>
                                <?php foreach ($dtpendaftaran as $row): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['updated_at'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['nama_lengkap'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['program_study'] ?>
                                        </td>
                                <?php foreach ($dtpendaftaran as $row): ?>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <a href="<?= base_url('asesor/laporan-hasil-approve/' . ($row['pendaftaran_id'] ?? '')) ?>"
                                                class="btn btn-primary btn-sm btn-active-light-primary">
                                                <i class="fa-solid fa-eye"></i>View
                                            </a>
                                            <a href="<?= base_url('asesor/generate-pdf/' . ($row['pendaftaran_id'] ?? '')) ?>"
                                                class="btn btn-danger btn-sm btn-active-light-danger" target="_blank">
                                                <i class="fa-solid fa-file-export"></i>Pdf
                                            </a>
                                        </div>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</div>
<script>
</script>
<?= $this->endSection() ?>