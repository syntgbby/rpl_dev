<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content">
        <div class="card">
            <div class="card-body">
                <!-- Start Informasi Biodata -->
                <div class="card mb-5">
                    <!--begin::Details content-->
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Biodata</h3>
                            <div class="fw-bold mt-5">Nama Lengkap</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['nama_lengkap'] ?? '-' ?></div>

                            <div class="fw-bold mt-5">Email</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['email'] ?? '-' ?></div>

                            <div class="fw-bold mt-5">N I K</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['nik'] ?? '-' ?></div>

                            <div class="fw-bold mt-5">Tempat dan Tanggal lahir</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['tempat_lahir'] ?? '-' ?>, <?= $dtpendaftaran['tanggal_lahir'] ?? '-' ?></div>

                            <div class="fw-bold mt-5">No Hp</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['no_hp'] ?? '-' ?></div>

                            <div class="fw-bold mt-5">Alamat</div>
                            <div class="text-gray-600"><?= $dtpendaftaran['alamat'] ?? '-' ?></div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!-- End Informasi Biodata -->
                <!-- Start Informasi Pelatihan -->
                <div class="card mb-5">
                    <!--begin::Details content-->
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Pelatihan</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px">No</th>
                                            <th>Nama Pelatihan</th>
                                            <th>Penyelenggara</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">Bukti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($dtpelatihan): ?>
                                            <?php $no = 1;
                                            foreach ($dtpelatihan as $row): ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td><?= $row['nama_pelatihan'] ?></td>
                                                    <td><?= $row['penyelenggara'] ?></td>
                                                    <td class="text-center"><?= $row['tahun'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row['file_bukti']): ?>
                                                            <a href="<?= $row['file_bukti'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-file-pdf me-1"></i> Lihat Bukti
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data pelatihan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!-- End Informasi Pelatihan -->
                <!-- Start Informasi Pengalaman Kerja -->
                <div class="card mb-5">
                    <!--begin::Details content-->
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <h3 class="text-dark mb-3 border-bottom pb-2">Informasi Pengalaman Kerja</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px">No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Deskripsi Pekerjaan</th>
                                            <th class="text-center">Posisi</th>
                                            <th class="text-center">Bukti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($dtpekerjaan): ?>
                                            <?php $no = 1;
                                            foreach ($dtpekerjaan as $row): ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td><?= $row['nama_perusahaan'] ?></td>
                                                    <td><?= $row['deskripsi_pekerjaan'] ?></td>
                                                    <td class="text-center"><?= $row['posisi'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row['file_bukti']): ?>
                                                            <a href="<?= $row['file_bukti'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-file-pdf me-1"></i> Lihat Bukti
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Aplikan tidak mengisi riwayat kerja</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!-- End Informasi Pengalaman Kerja -->
                <!-- Start Informasi Data Pendukung -->
                <div class="card mb-5">
                    <!--begin::Details content-->
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <h3 class="text-dark mb-3 border-bottom pb-2">File Pendukung</h3>
                            
                            <div class="row">
                                <!-- Foto KTP -->
                                <div class="col-md-3 mb-5">
                                    <div class="card card-custom h-100">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="fw-bold fs-6 m-0">Foto KTP</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($dtpendaftaran['file_ktp'])): ?>
                                                <a href="<?= $dtpendaftaran['file_ktp'] ?>"
                                                    class="btn btn-danger btn-sm btn-active-light-danger w-100"
                                                    target="_blank">
                                                    <i class="fas fa-file-pdf me-1"></i> Lihat KTP
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted small">File tidak tersedia</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bukti Kerja -->
                                <div class="col-md-3 mb-5">
                                    <div class="card card-custom h-100">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="fw-bold fs-6 m-0">Bukti Kerja</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($dtpendaftaran['bukti_kerja'])): ?>
                                                <a href="<?= $dtpendaftaran['bukti_kerja'] ?>"
                                                    class="btn btn-danger btn-sm btn-active-light-danger w-100"
                                                    target="_blank">
                                                    <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Kerja
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted small">File tidak tersedia</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ijazah -->
                                <div class="col-md-3 mb-5">
                                    <div class="card card-custom h-100">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="fw-bold fs-6 m-0">Ijazah</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($dtpendaftaran['file_ijazah'])): ?>
                                                <a href="<?= $dtpendaftaran['file_ijazah'] ?>"
                                                    class="btn btn-danger btn-sm btn-active-light-danger w-100"
                                                    target="_blank">
                                                    <i class="fas fa-file-pdf me-1"></i> Lihat Ijazah
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted small">File tidak tersedia</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bukti Pelatihan -->
                                <div class="col-md-3 mb-5">
                                    <div class="card card-custom h-100">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="fw-bold fs-6 m-0">Bukti Pelatihan</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($dtpendaftaran['bukti_pelatihan'])): ?>
                                                <a href="<?= $dtpendaftaran['bukti_pelatihan'] ?>"
                                                    class="btn btn-danger btn-sm btn-active-light-danger w-100"
                                                    target="_blank">
                                                    <i class="fas fa-file-pdf me-1"></i> Lihat Bukti Pelatihan
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted small">File tidak tersedia</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!-- End Informasi Data Pendukung -->

                <!-- Select Tahun Kurikulum -->
                <h5 class="card-title mt-5">Data Kurikulum</h5>
                <div class="row g-3 align-items-center mb-5">
                    <div class="col-md-6">
                        <select class="form-select form-select-lg h-100" data-control="select2"
                            data-placeholder="Pilih Tahun Kurikulum" id="tahunSelect">
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
                <form id="approveRplForm" method="post" action="<?= base_url('asesor/approve-rpl') ?>">
                    <input type="hidden" name="pendaftaran_id" id="pendaftaran_id"
                        value="<?= esc($dtpendaftaran['pendaftaran_id']) ?>">
                    <input type="hidden" name="tahunSelectApprove" id="tahunApprove">
                    <div class="table-responsive" id="matkulContainer" style="display:none;">
                        <table class="table table-bordered text-center" id="matkulTable">
                            <thead style="background-color: #b3e0ff; text-align: center; vertical-align: middle;">
                                <tr>
                                    <th rowspan="2" style="width: 5%;">No</th>
                                    <th rowspan="2" style="width: 10%;">Kode Mata Kuliah</th>
                                    <th rowspan="2" style="width: 25%;">Nama Mata Kuliah</th>
                                    <th colspan="2" style="width: 5%;">Mengajukan RPL</th>
                                    <th rowspan="2" style="width: 30%;">Asesmen</th>
                                </tr>
                                <tr>
                                    <th style="width: 15%;">Ya</th>
                                    <th style="width: 15%;">Tidak</th>
                                </tr>
                            </thead>
                            <tbody id="tabelRplBody">
                                <!-- Data dari AJAX -->
                            </tbody>
                        </table>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status Approval</label>
                                <select class="form-select form-select-lg h-100" id="status" data-control="select2"
                                    data-placeholder="Pilih Status Approval" name="status">
                                    <option value="" selected disabled>Pilih Status Approval</option>
                                    <option value="approved" id="approved">Approved</option>
                                    <option value="rejected" id="rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="display: none;" id="tipeRplContainer">
                                <label class="form-label fw-bold">Tipe RPL</label>
                                <select class="form-select form-select-lg h-100" data-control="select2"
                                    data-placeholder="Pilih Tipe RPL" name="type">
                                    <option value="" selected disabled>Pilih Tipe RPL</option>
                                    <option value="A">Type A</option>
                                    <option value="B">Type B</option>
                                    <option value="C">Type C</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="display: none;" id="alasanContainer">
                                <label class="form-label fw-bold">Alasan Penolakan</label>
                                <textarea class="form-control" name="alasan" id="alasan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-end justify-content-end mt-5">
                        <button type="submit" class="btn btn-success" id="submitBtn">Approve</button>
                        <button type="button" class="btn btn-secondary ms-3"
                            onclick="window.history.back()">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Load data mata kuliah
    $('#cariBtn').click(function() {
        var tahun = $('#tahunSelect').val();
        var id = $('#pendaftaran_id').val();
        if (tahun) {
            $.ajax({
                url: '<?= base_url('asesor/get-matkul') ?>',
                type: 'GET',
                data: {
                    tahun: tahun,
                    pendaftaran_id: id
                },
                dataType: 'json',
                success: function(response) {
                    var tbody = $('#tabelRplBody');
                    $('#tahunApprove').val(tahun); //simpan data pilihan tahun kurikulum
                    tbody.empty();

                    if (response.status === 'success' && response.data.length > 0) {
                        $.each(response.data, function(index, matkul) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + matkul.kode_matkul + '</td>' +
                                '<td>' + matkul.nama_matkul + '</td>' +
                                '<td><input type="checkbox" class="yes-check" name="rpl[' + matkul.id + ']" value="Y" checked></td>' +
                                '<td><input type="checkbox" class="no-check" name="rpl[' + matkul.id + ']" value="N"></td>' +
                                '<td><select class="form-select form-select-lg h-100 w-100" data-control="select2" data-placeholder="Pilih Nilai Asesmen" name="asesmen[' + matkul.id + ']"><option value="" selected disabled>Pilih Nilai Asesmen</option><option value="Baik">Baik</option><option value="Cukup">Cukup</option><option value="Sangat Baik">Sangat Baik</option></select></td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                        $('#matkulContainer').show();
                    } else {
                        tbody.html('<tr><td colspan="5">Tidak ada data mata kuliah.</td></tr>');
                        $('#matkulContainer').show();
                    }

                    // Tambahkan logika checkbox saling eksklusif
                    $('.yes-check').on('change', function() {
                        var tr = $(this).closest('tr');
                        var noCheck = tr.find('.no-check');
                        var asesmenSelect = tr.find('select');

                        if ($(this).is(':checked')) {
                            noCheck.prop('checked', false);
                            asesmenSelect.prop('disabled', false);
                        }
                    });

                    $('.no-check').on('change', function() {
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

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data.');
                    $('#matkulContainer').hide();
                }
            });
        } else {
            alert('Silakan pilih tahun kurikulum terlebih dahulu.');
            $('#matkulContainer').hide();
        }
    });

    $(document).ready(function() {
        $('#status').change(function() {
            const status = $(this).val();
            if (status === 'approved') {
                $('#tipeRplContainer').show();
                $('#alasanContainer').hide();
            } else if (status === 'rejected') {
                $('#alasanContainer').show();
                $('#tipeRplContainer').hide();
            } else {
                $('#tipeRplContainer').hide();
                $('#alasanContainer').hide();
            }
        });

        $('#tipeRplContainer').hide();
        $('#alasanContainer').hide();
    });

    $('#approveRplForm').submit(function(e) {
        e.preventDefault(); // Stop form dari auto-submit

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data pendaftaran ini akan di-approved dan dicetak!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754', // warna btn-success
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // submit form jika user yakin
            }
        });
    });
</script>

<?= $this->endSection(); ?>