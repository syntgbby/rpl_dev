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
                    <h1>Data Capaian Nilai Akhir (Asesmen)</h1>
                </div>
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <button type="button" class="btn btn-primary" id="btnAddCapaian"><i
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-5px">No</th>
                                <th class="min-w-25px">Program Studi</th>
                                <th class="min-w-25px">Kode Mata Kuliah</th>
                                <th class="min-w-25px">Mata Kuliah</th>
                                <th class="min-w-55px">Asesmen</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <?php if ($capaian): ?>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php $no = 1; ?>
                                <?php foreach ($capaian as $row): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['nama_prodi'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['kode_matkul'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['nama_matkul'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['deskripsi'] ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-primary"
                                                    onClick="btnEditCapaian(<?= $row['id'] ?>)"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                <button type="button"
                                                    class="btn btn-light btn-sm btn-icon btn-active-light-danger"
                                                    onClick="btnDeleteCapaian(<?= $row['id'] ?>)"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak Ada Data</td>
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
    $(document).ready(function () {
        $('#btnAddCapaian').click(function () {
            $('#modaltitle').html('Tambah Capaian');
            $('#modalbody').load("<?= base_url('admin/capaian-rpl/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnEditCapaian(id) {
        $('#modaltitle').html('Edit Capaian');
        $('#modalbody').load("<?= base_url('admin/capaian-rpl/edit/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }

    function btnDeleteCapaian(id) {
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
                window.location.href = '<?= base_url('admin/capaian-rpl/delete/') ?>' + id;
            }
        });
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>