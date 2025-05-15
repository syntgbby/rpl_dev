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
                    <h1>Program Studi Management</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddProdi"><i
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
                                <th class="min-w-25px">Name</th>
                                <th class="min-w-85px">Desc</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php if ($prodi): ?>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($prodi as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_prodi'] ?>
                                    </td>
                                    <td>
                                        <?= $row['deskripsi_singkat'] ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-primary" onClick="btnEditProdi(<?= $row['id'] ?>)"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="btnDeleteProdi(<?= $row['id'] ?>)"><i
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
        $('#btnAddProdi').click(function() {
            $('#modaltitle').html('Tambah Program Studi');
            $('#modalbody').load("<?= base_url('admin/prodi/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnEditProdi(id) {
        $('#modaltitle').html('Edit Program Studi');
        $('#modalbody').load("<?= base_url('admin/prodi/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteProdi(id) {
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
                window.location.href = '<?= base_url('admin/prodi/delete/') ?>' + id;
            }
        });
    }
</script>

<!--end::Content wrapper-->
<?= $this->endSection() ?>