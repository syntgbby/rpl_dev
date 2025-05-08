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
                    <h1>Academic Year Management</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='<?= base_url('admin/tahun-ajar/create') ?>'"><i
                                class="fa-solid fa-plus"></i>
                            Add</button>
                    </div>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Tahun</th>
                                <th class="min-w-85px">Keterangan</th>
                                <th class="min-w-85px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($tahun_ajar as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td>
                                        <?= $row['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] == 'Y'): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-primary"
                                                onClick="window.location.href='<?= base_url('admin/tahun-ajar/edit/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="window.location.href='<?= base_url('admin/tahun-ajar/delete/') . $row['id'] ?>'"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
<!--end::Content wrapper-->
<?= $this->endSection() ?>