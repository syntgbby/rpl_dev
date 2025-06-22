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
                    <h1>Data Pengguna</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='<?= base_url('admin/users/create') ?>'"><i
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="tblUsers">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-55px">Nama</th>
                                <th class="min-w-55px">Email</th>
                                <th class="min-w-55px">Peran</th>
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
        $('#tblUsers').DataTable({
            serverSide: true,
            processing: true,
            ajax: "<?= base_url('admin/users/table') ?>",
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
                    data: 'role',
                    className: 'text-center',
                    render: function (role) {
                        let badgeClass = 'badge-secondary';
                        if (role === 'admin') badgeClass = 'badge-primary';
                        else if (role === 'kaprodi') badgeClass = 'badge-success';
                        else if (role === 'asesor') badgeClass = 'badge-info'; // purple nggak default, kita atur manual

                        return `<span class="badge ${badgeClass} text-capitalize">${role}</span>`;
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
                    <button onclick="confirmDelete(${data})" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                `;
                    }
                }
            ]
        });


        document.querySelector('[data-kt-filter="search"]').addEventListener('keyup', function () {
            $('#tblUsers').DataTable().search(this.value).draw();
        });
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Menghapus data ini sekaligus menghapus semua data yang bersangkutan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/users/delete/') ?>' + id;
            }
        });
    }

    function confirmDeactivate(deactivateUrl) {
        Swal.fire({
            title: 'Nonaktifkan Akun?',
            text: "Akun ini tidak akan dihapus, hanya dinonaktifkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f59e0b',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, nonaktifkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deactivateUrl,
                    type: 'GET',
                    success: function (response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Akun berhasil dinonaktifkan',
                            icon: 'success'
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Akun gagal dinonaktifkan',
                            icon: 'error'
                        });
                    },
                    complete: function () {
                        window.location.href = '/admin/users';
                    }
                });
            }
        });
    }
</script>


<?= $this->endSection() ?>