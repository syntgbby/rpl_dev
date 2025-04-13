<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills d-flex flex-column" id="kt_stepper" style="overflow-x: auto;">
            <!--begin::Nav-->
            <div class="stepper-nav justify-content-center py-5">
                <!--begin::Step 1-->
                <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">1</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 1
                            </h3>

                            <div class="stepper-desc">
                                Identitas Diri
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">2</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 2
                            </h3>

                            <div class="stepper-desc">
                                Pelatihan Kerja
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">3</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 3
                            </h3>

                            <div class="stepper-desc">
                                Pengalaman Kerja
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 3-->
            </div>
            <!--end::Nav-->

            <!--begin::Form-->
            <form id="frmPendaftaran" class="form" action="#" method="POST">
                <!--begin::Step 1 - Identitas Diri-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-1') ?>
                <!--end::Step 1-->

                <!--begin::Step 2 - Pelatihan Kerja-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-2') ?>
                <!--end::Step 2-->

                <!--begin::Step 3 - Pengalaman Kerja-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-3') ?>
                <!--end::Step 3-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Stepper-->
    </div>
</div>

<!--begin::Custom JS-->
<script>
    // Array untuk menyimpan data pelatihan
    let dataPelatihan = [];
    let editIndex = -1; // Tambahkan variable untuk tracking index yang sedang diedit

    // Function untuk menampilkan data ke tabel
    function renderTablePelatihan() {
        let html = '';
        // Tampilkan data yang sudah ada
        dataPelatihan.forEach((item, index) => {
            if (editIndex === index) {
                // Tampilkan form edit
                html += `
                    <tr>
                        <td>
                            <input type="text" class="form-control form-control-solid" id="edit_nama_${index}" 
                                value="${item.nama_pelatihan}" placeholder="Nama Pelatihan" required>
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-solid" id="edit_penyelenggara_${index}" 
                                value="${item.penyelenggara}" placeholder="Penyelenggara" required>
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-solid" id="edit_peran_serta_${index}" 
                                value="${item.peran_serta}" placeholder="Peran Serta" required>
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-solid" id="edit_durasi_${index}" 
                                value="${item.durasi}" placeholder="Durasi (hari)" required>
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-solid" id="edit_no_sertifikat_${index}" 
                                value="${item.no_sertifikat}" placeholder="No. Sertifikat" required>
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-solid" id="edit_tahun_${index}" 
                                value="${item.tahun}" placeholder="Tahun" required>
                        </td>
                        <td class="text-end">
                            <button type="button" class="btn btn-icon btn-light-success btn-sm" onclick="updatePelatihan(${index})">
                                <i class="fas fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-light-danger btn-sm" onclick="cancelEdit()">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `;
            } else {
                // Tampilkan data normal
                html += `
                    <tr>
                        <td>${item.nama_pelatihan}</td>
                        <td>${item.penyelenggara}</td>
                        <td>${item.peran_serta}</td>
                        <td>${item.durasi}</td>
                        <td>${item.no_sertifikat}</td>
                        <td>${item.tahun}</td>
                        <td class="text-end">
                            <button type="button" class="btn btn-icon btn-light-success btn-sm" onclick="editPelatihan(${index})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-light-danger btn-sm" onclick="deletePelatihan(${index})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            }
        });
        
        // Tambahkan baris input untuk data baru
        html += `
            <tr id="inputRow">
                <td>
                    <input type="text" class="form-control form-control-solid" id="nama_pelatihan" placeholder="Nama Pelatihan" required>
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="penyelenggara" placeholder="Penyelenggara" required>
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="peran_serta" placeholder="Peran Serta" required>
                </td>
                <td>
                    <input type="number" class="form-control form-control-solid" id="durasi" placeholder="Durasi (hari)" required>
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="no_sertifikat" placeholder="No. Sertifikat" required>
                </td>
                <td>
                    <input type="number" class="form-control form-control-solid" id="tahun" placeholder="Tahun" required>
                </td>
                <td class="text-end">
                    <button type="button" class="btn btn-icon btn-light-success btn-sm" onclick="savePelatihan()">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-icon btn-light-danger btn-sm" onclick="clearInputs()">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
        
        document.getElementById('tbodyPelatihan').innerHTML = html;
    }

    // Function untuk menyimpan data
    function savePelatihan() {
        if (editIndex >= 0) {
            updatePelatihan();
        } else {
            const nama_pelatihan = document.getElementById('nama_pelatihan').value;
            const penyelenggara = document.getElementById('penyelenggara').value;
            const peran_serta = document.getElementById('peran_serta').value;
            const durasi = document.getElementById('durasi').value;
            const no_sertifikat = document.getElementById('no_sertifikat').value;
            const tahun = document.getElementById('tahun').value;

            // Validasi
            if (!nama_pelatihan || !penyelenggara || !peran_serta || !durasi || !no_sertifikat || !tahun) {
                Swal.fire({
                    text: "Mohon lengkapi semua field",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                return;
            }

            // Tambahkan data baru ke array
            dataPelatihan.push({
                nama_pelatihan: nama_pelatihan,
                penyelenggara: penyelenggara,
                peran_serta: peran_serta,
                durasi: durasi,
                no_sertifikat: no_sertifikat,
                tahun: tahun
            });

            // Clear inputs dan render ulang tabel
            clearInputs();
            renderTablePelatihan();
        }
    }

    // Function untuk membersihkan input
    function clearInputs() {
        document.getElementById('nama_pelatihan').value = '';
        document.getElementById('penyelenggara').value = '';
        document.getElementById('peran_serta').value = '';
        document.getElementById('durasi').value = '';
        document.getElementById('no_sertifikat').value = '';
        document.getElementById('tahun').value = '';
        editIndex = -1;
        renderTablePelatihan(); // Render ulang untuk reset tombol save
    }

    function editPelatihan(index) {
        editIndex = index;
        renderTablePelatihan();
    }

    function updatePelatihan(index) {
        const nama_pelatihan = document.getElementById(`edit_nama_${index}`).value;
        const penyelenggara = document.getElementById(`edit_penyelenggara_${index}`).value;
        const peran_serta = document.getElementById(`edit_peran_serta_${index}`).value;
        const durasi = document.getElementById(`edit_durasi_${index}`).value;
        const no_sertifikat = document.getElementById(`edit_no_sertifikat_${index}`).value;
        const tahun = document.getElementById(`edit_tahun_${index}`).value;

        // Validasi
        if (!nama_pelatihan || !penyelenggara || !peran_serta || !durasi || !no_sertifikat || !tahun) {
            Swal.fire({
                text: "Mohon lengkapi semua field",
                icon: "warning",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return;
        }

        // Update data
        dataPelatihan[index] = {
            nama_pelatihan: nama_pelatihan,
            penyelenggara: penyelenggara,
            peran_serta: peran_serta,
            durasi: durasi,
            no_sertifikat: no_sertifikat,
            tahun: tahun
        };

        // Reset edit mode dan render ulang
        editIndex = -1;
        renderTablePelatihan();
    }

    function cancelEdit() {
        editIndex = -1;
        renderTablePelatihan();
    }

    // Function untuk menghapus data
    function deletePelatihan(index) {
        Swal.fire({
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-light"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                dataPelatihan.splice(index, 1);
                renderTablePelatihan();
            }
        });
    }

    $(document).ready(function() {
        $('#kt_table_pk').DataTable();

        renderTablePelatihan();

        $('#addPK').click(function() {
            $('#modaltitle').html('Pengalaman lain yang relevan');
            $('#modalbody').load("<?= base_url('aplikan/view-add-pk') ?>");
            $('#modal').data('rowid', 0);
            $('#modal #savefrm').remove();
            $('#modal').modal('show');
        });

        $('#savefrm').on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var tanggal_lahir = $('#tanggal_lahir').val();
            var jenis_kelamin = $('#jenis_kelamin').val();
            var alamat = $('#alamat').val();
            var provinsi = $('#provinsi').val();
            var kota = $('kota').val();
            var kota = $('riwayat_pendidikan').val();
            var kota = $('tempat_pendidikan').val();

            // Cek apakah semua field sudah diisi
            if (name == "" || email == "" || tanggal_lahir == "" || jenis_kelamin == "" || alamat == "" || provinsi == "" || kota == "" || riwayat_pendidikan == "" || tempat_pendidikan == "") {
                toastr.error('All fields must be filled!');
                return; // Jangan lanjutkan eksekusi
            }

            // Menyembunyikan indikator dan menampilkan spinner
            $('.indicator-label').hide();
            $('.indicator-progress').show();

            // Menonaktifkan tombol Save untuk mencegah klik ganda
            $('#savefrm').prop('disabled', true);

            var formData = {
                menu_cd: menu_cd,
                title: title,
                url: url,
                parent_menucd: parent_menucd,
                icon: icon,
                order_seq: order_seq,
                status: status
            };

            var actionUrl = '<?= base_url('add-master-menu') ?>'; // Ganti dengan URL yang sesuai

            // Kirim request AJAX
            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        location.reload(); // Reload halaman setelah berhasil
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while sending the request.');
                },
                complete: function() {
                    // Mengembalikan status tombol setelah selesai
                    $('#savefrm').prop('disabled', false);
                    $('.indicator-label').show();
                    $('.indicator-progress').hide();
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var stepper = new KTStepper(document.querySelector("#kt_stepper"));

        document.querySelectorAll("[data-kt-stepper-action='next']").forEach(button => {
            button.addEventListener("click", function() {
                stepper.goNext();
            });
        });

        document.querySelectorAll("[data-kt-stepper-action='previous']").forEach(button => {
            button.addEventListener("click", function() {
                stepper.goPrevious();
            });
        });
    });
</script>
<!--end::Custom JS-->

<?= $this->endSection() ?>