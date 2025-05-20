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
                    <h1>Tahun Ajaran Management</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddTahunAjar"><i
                                class="fa-solid fa-plus"></i>
                            Add</button>
                    </div>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Tahun</th>
                                <th class="min-w-85px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php if ($tahun_ajar): ?>
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
                                        <td class="text-center">
                                            <?php if ($row['status'] == 'Y'): ?>
                                                <span class="badge bg-success text-white">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger text-white">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-primary"
                                                    onClick="btnEditTahunAjar(<?= $row['id'] ?>)"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                    onClick="btnDeleteTahunAjar(<?= $row['id'] ?>)"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
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
    $(document).ready(function() {
        $('#btnAddTahunAjar').click(function() {
            $('#modaltitle').html('Tambah Tahun Ajar');
            $('#modalbody').load("<?= base_url('admin/tahun-ajar/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnEditTahunAjar(id) {
        $('#modaltitle').html('Edit Tahun Ajar');
        $('#modalbody').load("<?= base_url('admin/tahun-ajar/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteTahunAjar(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/tahun-ajar/delete/') ?>' + id;
            }
        });
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>