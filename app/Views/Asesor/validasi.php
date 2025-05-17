<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content">
        <div class="card">
            <div class="card-body">
                <!-- Data Mahasiswa Readonly -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama</label>
                    <div>
                        <?= esc($dtpendaftaran['nama_lengkap']) ?>
                    </div>
                </div>
                <!-- END Data Mahasiswa Readonly -->
                <!-- Select Tahun Kurikulum -->
                <h5 class="card-title mt-5">Data Kurikulum</h5>
                <div class="row g-3 align-items-center mb-5">
                    <div class="col-md-6">
                        <select class="form-select" id="tahunSelect">
                            <option value="" selected disabled>Pilih Tahun Kurikulum</option>
                            <?php foreach ($dtkurikulum as $row): ?>
                                <option value="<?= $row['id'] ?>"><?= $row['tahun'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" id="cariBtn">Cari</button>
                    </div>
                </div>

                <!-- Tabel RPL -->
                <div class="table-responsive" id="matkulContainer" style="display:none;">
                    <table class="table table-bordered text-center" id="matkulTable">
                        <thead style="background-color: #b3e0ff; text-align: center; vertical-align: middle;">
                            <tr>
                                <th rowspan="2" style="width: 10%;">No</th>
                                <th rowspan="2" style="width: 20%;">Kode Mata Kuliah</th>
                                <th rowspan="2" style="width: 40%;">Nama Mata Kuliah</th>
                                <th colspan="2" style="width: 30%;">Mengajukan RPL</th>
                            </tr>
                            <tr>
                                <th style="width: 15%;">
                                    <label class="form-check form-check-custom form-check-solid"
                                        style="display: inline-flex; align-items: center; gap: 5px;">
                                        <input class="form-check-input" id="yesALL" type="checkbox" value="1" />
                                        Ya
                                    </label>
                                </th>
                                <th style="width: 15%;">
                                    <label class="form-check form-check-custom form-check-solid"
                                        style="display: inline-flex; align-items: center; gap: 5px;">
                                        <input class="form-check-input" id="noALL" type="checkbox" value="0" />
                                        Tidak
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabelRplBody">
                            <!-- Data dari AJAX -->
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="text-end my-3">
                            <button class="btn btn-danger" id="submitBtn">Approve</button>
                            <button class="btn btn-secondary" id="kembaliBtn">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#cariBtn').click(function () {
        var tahun = $('#tahunSelect').val();
        if (tahun) {
            $.ajax({
                url: '<?= base_url('asesor/get-matkul') ?>/' + tahun,
                type: 'GET',
                data: { tahun: tahun },
                dataType: 'json',
                success: function (response) {
                    var tbody = $('#tabelRplBody');
                    tbody.empty();

                    if (response.status === 'success' && response.data.length > 0) {
                        $.each(response.data, function (index, matkul) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + matkul.kode_matkul + '</td>' +
                                '<td>' + matkul.nama_matkul + '</td>' +
                                '<td><input type="checkbox" class="yes-check" name="rpl[' + matkul.id + ']" value="1" checked></td>' +
                                '<td><input type="checkbox" class="no-check" name="rpl[' + matkul.id + ']" value="0"></td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                        $('#matkulContainer').show();
                    } else {
                        tbody.html('<tr><td colspan="5">Tidak ada data mata kuliah.</td></tr>');
                        $('#matkulContainer').show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data.');
                    $('#matkulContainer').hide();
                }
            });
        } else {
            alert('Silakan pilih tahun kurikulum terlebih dahulu.');
            $('#matkulContainer').hide();
        }

    }
    );

</script>


<?= $this->endSection(); ?>