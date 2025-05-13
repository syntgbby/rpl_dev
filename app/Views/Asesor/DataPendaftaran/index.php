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
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
                        <thead>
                            <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-15px">No</th>
                                <th class="min-w-25px">Nama</th>
                                <th class="min-w-85px">Program Study</th>
                                <th class="min-w-85px">Status</th>
                                <th class="min-w-100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            <?php $no = 1; ?>
                            <?php foreach ($dtpendaftaran as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['nama_lengkap'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['program_study'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['status'] == 'Draft'): ?>
                                            <span class="badge bg-warning text-white">Draft</span>
                                        <?php else: ?>
                                            <span class="badge bg-success text-white">Submitted</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <button type="button"
                                                class="btn btn-light btn-sm btn-icon btn-active-light-primary"
                                                onClick="btnViewDetail('<?= $row['pendaftaran_id'] ?>')"><i
                                                    class="fa-solid fa-eye"></i></button>
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
        $('#btnAddTahunAjar').click(function() {
            $('#modaltitle').html('Tambah Tahun Ajar');
            $('#modalbody').load("<?= base_url('admin/tahun-ajar/create') ?>");
            $('#modal').data('rowid', 0);
            $('#modal').modal('show');
        });
    });

    function btnViewDetail(id) {
        $('#modaltitle').html('View Detail');
        $('#modalbody').load("<?= base_url('asesor/view-detail-pendaftaran/') ?>" + id);
        $('#modal').data('rowid', 0);
        $('#modal').modal('show');
    }
</script>
<!--end::Content wrapper-->
<?= $this->endSection() ?>