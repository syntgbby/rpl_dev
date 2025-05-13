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
                    <h1>Kurikulum Prodi Management</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddKurikulumProdi"><i
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
                                <th class="min-w-25px">Prodi</th>
                                <th class="min-w-85px">Tahun Ajar</th>
                                <th class="min-w-85px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php
                        function getProdiName($id, $prodiList)
                        {
                            foreach ($prodiList as $p) {
                                if ($p['id'] == $id) {
                                    return $p['nama_prodi'];
                                }
                            }
                            return 'Tidak Ada Prodi';
                        }

                        function getTahunAjar($id, $tahunAjarList)
                        {
                            foreach ($tahunAjarList as $t) {
                                if ($t['id'] == $id) {
                                    return $t['tahun'];
                                }
                            }
                            return 'Tidak Ada Tahun Ajar';
                        }
                        ?>

                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($kurikulum_prodi as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td><?= getProdiName($row['prodi_id'], $prodi) ?></td>
                                    <td><?= getTahunAjar($row['tahun_ajar_id'], $tahun_ajar) ?></td>
                                    <td>
                                        <?= $row['status'] = $row['status'] == 'Y' ? '<span class="badge bg-success text-white">Active</span>' : '<span class="badge bg-danger text-white">Inactive</span>' ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-primary" onClick="btnEditKurikulumProdi(<?= $row['id'] ?>)"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                onClick="btnDeleteKurikulumProdi(<?= $row['id'] ?>)"><i
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

<script>
    $(document).ready(function() {
        $('#btnAddKurikulumProdi').click(function() {
            $('#modaltitle').html('Tambah Kurikulum Prodi');
            $('#modalbody').load("<?= base_url('admin/kurikulum-prodi/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnEditKurikulumProdi(id) {
        $('#modaltitle').html('Edit Kurikulum Prodi');
        $('#modalbody').load("<?= base_url('admin/kurikulum-prodi/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteKurikulumProdi(id) {
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
                window.location.href = '<?= base_url('admin/kurikulum-prodi/delete/') ?>' + id;
            }
        });
    }
</script>

<!--end::Content wrapper-->
<?= $this->endSection() ?>