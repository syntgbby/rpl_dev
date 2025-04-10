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
                    <h1>Master Menu</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenuModal" id="addMenu"><i class="fa-solid fa-plus"></i> Add</button>
                    </div>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_menus">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Menu CD</th>
                                <th class="min-w-85px">Title</th>
                                <th class="min-w-85px">URL</th>
                                <th class="min-w-55px">Icon</th>
                                <!-- <th class="min-w-15px">Menu Parent</th> -->
                                <th class="min-w-75px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $row['menu_cd'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['url'] ?></td>
                                <td class="text-center"><i class="<?= $row['icon'] ?>"></i></td>
                                <!-- <td class="text-center"><?= $row['parent_menucd'] ?></td> -->
                                <td class="text-center"><?= ($row['status'] == 'Y') ? '<span class="badge bg-success text-white">Active</span>' : '<span class="badge bg-danger text-white">Inactive</span>' ?></td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-primary" onClick="editMasterMenu(<?= $row['rowid'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" class="btn btn-light btn-sm btn-icon btn-active-light-danger" onClick="deleteMasterMenu(<?= $row['rowid'] ?>)"><i class="fa-solid fa-trash"></i></button>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#kt_table_menus').DataTable();

        $('#addMenu').click(function() {
            $('#modaltitle').html('Menu Entry');
            $('#modalbody').load("<?= base_url('admin/view-add-master-menu') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });
    
    function editMasterMenu(rowid) {
        $('#modaltitle').html('Menu Edit');
        $('#modalbody').load("<?= base_url('admin/view-add-master-menu') ?>");
        $('#modal').data('rowid', rowid);
        $('#modal').modal('show');
    }

    function deleteMasterMenu(rowid) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = {
                    rowid: rowid
                };
                
                var actionUrl = '<?= base_url('admin/delete-master-menu') ?>'; 

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            
                            location.reload();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred while sending the request.');
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection() ?>