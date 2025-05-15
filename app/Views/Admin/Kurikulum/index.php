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
                    <h1>Kurikulum Management</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddKurikulum"><i
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
                                <th class="min-w-10px">No</th>
                                <th class="min-w-55px">Kode Mata Kuliah</th>
                                <th class="min-w-55px">Program Studi</th>
                                <th class="min-w-55px">Tahun Ajaran</th>
                                <th class="min-w-55px">Mata Kuliah</th>
                                <th class="min-w-55px">SKS</th>
                                <th class="min-w-55px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php if ($kurikulum): ?>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($kurikulum as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['kode_matkul'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['nama_prodi'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['tahun'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['nama_matkul'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['sks'] ?>
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
                                                onClick="btnEditKurikulum(<?= $row['id'] ?>)"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="btnDeleteKurikulum(<?= $row['id'] ?>)"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php else: ?>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">No data found</td>
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
        $('#btnAddKurikulum').click(function() {
            $('#modaltitle').html('Tambah Kurikulum');
            $('#modalbody').load("<?= base_url('admin/kurikulum/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnEditKurikulum(id) {
        $('#modaltitle').html('Edit Kurikulum');
        $('#modalbody').load("<?= base_url('admin/kurikulum/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteKurikulum(id) {
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
                window.location.href = '<?= base_url('admin/kurikulum/delete/') ?>' + id;
            }
        });
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>