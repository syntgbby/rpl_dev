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
                    <h1>Data Mata Kuliah</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddMataKuliah"><i
                                class="fa-solid fa-plus"></i>
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tblMatkul">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-85px">Kode Mata Kuliah</th>
                                <th class="min-w-85px">Nama Mata Kuliah</th>
                                <th class="min-w-85px">SKS</th>
                                <th class="min-w-85px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
    $(document).ready(function () {
        $('#btnAddMataKuliah').click(function () {
            $('#modaltitle').html('Tambah Mata Kuliah');
            $('#modalbody').load("<?= base_url('admin/mata-kuliah/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });

        $('#tblMatkul').DataTable({
            serverSide: true,
            processing: true,
            ajax: "<?= base_url('admin/mata-kuliah/table') ?>",
            columns: [
                {
                    data: null,
                    className: 'text-center',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'kode_matkul', className: 'text-center' },
                { data: 'nama_matkul', className: 'text-center' },
                { data: 'sks', className: 'text-center' },
                {
                    data: 'status',
                    className: 'text-center',
                    render: function (data) {
                        if (data === 'Y') {
                            return `<span class="badge badge-success">Aktif</span>`;
                        } else {
                            return `<span class="badge badge-danger">Tidak Aktif</span>`;
                        }
                    }
                },
                {
                    data: 'id',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: function (data) {
                        return `
                    <button onclick="btnEditMataKuliah(${data})" 
                       class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                    <button onclick="btnDeleteMataKuliah(${data})" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                `;
                    }
                }
            ]
        });


        document.querySelector('[data-kt-filter="search"]').addEventListener('keyup', function () {
            $('#tblMatkul').DataTable().search(this.value).draw();
        });
    });

    function btnEditMataKuliah(id) {
        $('#modaltitle').html('Edit Mata Kuliah');
        $('#modalbody').load("<?= base_url('admin/mata-kuliah/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteMataKuliah(id) {
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
                window.location.href = '<?= base_url('admin/mata-kuliah/delete/') ?>' + id;
            }
        });
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>