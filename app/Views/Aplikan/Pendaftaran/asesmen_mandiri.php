<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content-->
<div id="kt_app_content" class="app-content">
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Data Asesmen Mandiri</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div class="card-body border-top p-9">
            <!--begin::Table-->

            <!-- Tabel RPL -->
            <form id="approveRplForm" method="post"
                action="<?= base_url('aplikan/pendaftaran/store-asesmen-mandiri') ?>">
                <div class="table-responsive" id="matkulContainer">
                    <table class="table table-bordered text-center" id="matkulTable">
                        <thead style="background-color: #b3e0ff; text-align: center; vertical-align: middle;">
                            <tr>
                                <th rowspan="2" style="width: 5%;">No</th>
                                <th rowspan="2" style="width: 10%;">Kode Mata Kuliah</th>
                                <th rowspan="2" style="width: 25%;">Nama Mata Kuliah</th>
                                <th colspan="2" style="width: 5%;">Mengajukan RPL</th>
                            </tr>
                            <tr>
                                <th style="width: 15%;">Ya</th>
                                <th style="width: 15%;">Tidak</th>
                            </tr>
                        </thead>
                        <tbody id="tabelRplBody">
                            <?php $no = 1; ?>
                            <?php if ($data): ?>
                                <?php foreach ($data as $row): ?>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row['kode_matkul'] ?>
                                    </td>
                                    <td>
                                        <?= $row['nama_matkul'] ?>
                                    </td>
                                    <td><input type="checkbox" class="yes-check" style="width:20px; height:20px;"
                                            name="rpl[ <?= $row['id'] ?>  ]" value="Y" checked></td>
                                    <td><input type="checkbox" class="no-check" style="width:20px; height:20px;"
                                            name="rpl[ <?= $row['id'] ?>  ]" value="N"></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data asesmen</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col d-flex align-items-end justify-content-end mt-5">
                    <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
                </div>
            </form>
            <!--end::Table-->
        </div>
        <!--end::Content-->
    </div>
</div>
<!--end::Basic info-->
</div>
<!--end::Content-->

<!-- Tambahkan script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function () {
        // Inisialisasi Select2 untuk semua select
        $('[data-control="select2"]').select2({
            minimumResultsForSearch: -1,
            width: '100%',
            dropdownParent: $('body'),
            templateResult: formatState,
            templateSelection: formatState
        });

        // Fungsi untuk memformat tampilan select2
        function formatState(opt) {
            if (!opt.id) {
                return opt.text;
            }
            return $('<span style="font-size: 14px; line-height: 1.5;">' + opt.text + '</span>');
        }
    });

    // Tambahkan logika checkbox saling eksklusif
    $('.yes-check').on('change', function () {
        var tr = $(this).closest('tr');
        var noCheck = tr.find('.no-check');
        var asesmenSelect = tr.find('select');

        if ($(this).is(':checked')) {
            noCheck.prop('checked', false);
            asesmenSelect.prop('disabled', false);
        }
    });

    $('.no-check').on('change', function () {
        var tr = $(this).closest('tr');
        var yesCheck = tr.find('.yes-check');
        var asesmenSelect = tr.find('select');

        if ($(this).is(':checked')) {
            yesCheck.prop('checked', false);
            asesmenSelect.val('').prop('disabled', true); // reset + disable
        } else {
            asesmenSelect.prop('disabled', false);
        }
    });
</script>
<!--end::Modal Tambah RiwayatKerja-->
<?= $this->endSection() ?>