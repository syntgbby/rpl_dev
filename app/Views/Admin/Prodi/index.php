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
                    <h1>Data Program Studi</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddProdi"><i class="fa-solid fa-plus"></i>
                            Tambah</button>
                    </div>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <div class="mb-5">
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px"
                        placeholder="Search..." />
                </div>
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tblProdi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Nama Program Studi</th>
                                <th class="min-w-25px">Jenjang Pendidikan</th>
                                <th class="min-w-25px">Kategori</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
    $(document).ready(function () {
        $('#btnAddProdi').click(function () {
            $('#modaltitle').html('Tambah Program Studi');
            $('#modalbody').load("<?= base_url('admin/prodi/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });

        $('#tblProdi').DataTable({
            serverSide: true,
            processing: true,
            ajax: "<?= base_url('admin/prodi/table') ?>",
            columns: [
                {
                    data: null,
                    className: 'text-center',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'nama_prodi', className: 'text-center' },
                { data: 'jenjang_pendidikan', className: 'text-center' },
                { data: 'kategori', className: 'text-center' },
                {
                    data: 'id',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: function (data) {
                        return `
                    <button onclick="btnEditProdi(${data})" 
                       class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                    <button onclick="btnDeleteProdi(${data})" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                `;
                    }
                }
            ]
        });


        document.querySelector('[data-kt-filter="search"]').addEventListener('keyup', function () {
            $('#tblProdi').DataTable().search(this.value).draw();
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
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan bisa membatalkan ini setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/prodi/delete/') ?>' + id;
            }
        });
    }
</script>

<!--end::Content wrapper-->
<?= $this->endSection() ?>