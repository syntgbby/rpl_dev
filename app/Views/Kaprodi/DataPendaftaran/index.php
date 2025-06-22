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
                    <h1>Data Pendaftaran</h1>
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tblDataPendaftaran">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Nama Lengkap</th>
                                <th class="min-w-85px">Program Studi</th>
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
        $('#tblDataPendaftaran').DataTable({
            serverSide: true,
            processing: true,
            ajax: "<?= base_url('kaprodi/data-pendaftaran/table') ?>",
            columns: [
                {
                    data: null,
                    className: 'text-center',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'nama_lengkap', className: 'text-center' },
                { data: 'program_study', className: 'text-center' },
                {
                    data: 'status',
                    className: 'text-center',
                    render: function (data) {
                        if (data === 'Draft') {
                            return `<span class="badge badge-warning">Draft</span>`;
                        } else {
                            return `<span class="badge badge-success">Submitted</span>`;
                        }
                    }
                },
                {
                    data: 'pendaftaran_id',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: function (data) {
                        return `
                        <button onclick="btnAssignAsesor('${data}')"
                       class="btn btn-sm btn-primary"><i class="fa-solid fa-user-pen"></i></button>
                `;
                    }
                }
            ]
        });


        document.querySelector('[data-kt-filter="search"]').addEventListener('keyup', function () {
            $('#tblDataPendaftaran').DataTable().search(this.value).draw();
        });
    });

    function btnAssignAsesor(id) {
        $('#modaltitle').html('Assign Asesor ' + '(' + id + ')');
        $('#modalbody').load("<?= base_url('kaprodi/data-pendaftaran/detail/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>