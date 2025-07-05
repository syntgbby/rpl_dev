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
                    <h1>Data Aplikan</h1>
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tblAplikan">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-55px">Nama</th>
                                <th class="min-w-55px">Email</th>
                                <th class="min-w-55px">Bukti Pembayaran</th>
                                <th class="min-w-55px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#tblAplikan').DataTable({
            serverSide: true,
            processing: true,
            ajax: "<?= base_url('admin/validasi-aplikan/table') ?>",
            columns: [
                {
                    data: null,
                    className: 'text-center',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'nama_lengkap', className: 'text-center' },
                { data: 'email', className: 'text-center' },
                {
                    data: 'bukti_pembayaran',
                    className: 'text-center',
                    render: function (data) {
                        if (data) {
                            return `<a href="${data}" target="_blank"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-file-pdf me-1"></i> Lihat Bukti
                                    </a>`;
                        } else {
                            return `<span class="text-muted">Belum ada bukti</span>`;
                        }
                    }

                },
                {
                    data: 'status',
                    className: 'text-center',
                    render: function (data) {
                        if (data === 'Y') {
                            return `<span class="badge badge-primary">Aktif</span>`;
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
                    <button onclick="confirmApprove(${data})" 
                            class="btn btn-sm btn-info"><i class="fa fa-user-pen"></i></button>
                `;
                    }
                }
            ]
        });


        document.querySelector('[data-kt-filter="search"]').addEventListener('keyup', function () {
            $('#tblAplikan').DataTable().search(this.value).draw();
        });
    });

    function confirmApprove(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pastikan anda sudah melihat bukti pembayaran!.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Validasi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/validasi-aplikan/approve/') ?>' + id;
            }
        });
    }

</script>


<?= $this->endSection() ?>