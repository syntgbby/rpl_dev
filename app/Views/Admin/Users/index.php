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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-55px">Email</th>
                                <th class="min-w-55px">Peran</th>
                                <th class="min-w-55px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php if ($users): ?>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php $no = 1; ?>
                                <?php foreach ($users as $row): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['role'] == 'admin'): ?>
                                                <span class="badge bg-info text-white">Admin</span>
                                            <?php elseif ($row['role'] == 'aplikan'): ?>
                                                <span class="badge bg-primary text-white">Aplikan</span>
                                            <?php elseif ($row['role'] == 'kaprodi'): ?>
                                                <span class="badge bg-warning text-white">Kaprodi</span>
                                            <?php elseif ($row['role'] == 'asesor'): ?>
                                                <span class="badge bg-dark text-white">Asesor</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= ($row['status'] == 'Y') ? '<span class="badge bg-success text-white">Aktif</span>' : '<span class="badge bg-danger text-white">Tidak Aktif</span>' ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-2">

                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                    onclick="confirmDelete('<?= base_url('admin/users/delete/') . $row['id'] ?>')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
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
<!--end::Content wrapper-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(deleteUrl) {
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
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function (response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data berhasil dihapus',
                            icon: 'success'
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data gagal dihapus',
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