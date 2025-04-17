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
    let dataPengalaman = [];
    let editIndex = -1;

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
                    <input type="text" class="form-control form-control-solid" id="nama_pelatihan" placeholder="Nama Pelatihan">
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="penyelenggara" placeholder="Penyelenggara">
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="peran_serta" placeholder="Peran Serta">
                </td>
                <td>
                    <input type="number" class="form-control form-control-solid" id="durasi" placeholder="Durasi (hari)">
                </td>
                <td>
                    <input type="text" class="form-control form-control-solid" id="no_sertifikat" placeholder="No. Sertifikat">
                </td>
                <td>
                    <input type="number" class="form-control form-control-solid" id="tahun" placeholder="Tahun">
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

    // Function untuk menampilkan data ke tabel
    function renderTablePengalaman() {
        let html = '';
        // Tampilkan data yang sudah ada
        dataPengalaman.forEach((item, index) => {
            // Tampilkan data normal
            html += `
                <tr>
                    <td>${item.uraian}</td>
                    <td>${item.bukti}</td>
                    <td class="text-end">
                        <button type="button" class="btn btn-icon btn-light-danger btn-sm" onclick="deletePengalaman(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        
        // Tambahkan baris input untuk data baru
        html += `
            <tr id="inputRowPengalaman">
                <td>
                    <input type="text" class="form-control form-control-solid" id="uraian" placeholder="Uraian Pengalaman">
                </td>
                <td>
                    <input type="file" class="form-control form-control-solid" id="bukti" placeholder="Bukti">
                </td>
                <td class="text-end">
                    <button type="button" class="btn btn-icon btn-light-success btn-sm" onclick="savePengalaman()">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-icon btn-light-danger btn-sm" onclick="clearInputsPengalaman()">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
        
        document.getElementById('tbodyPengalaman').innerHTML = html;
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

    // Function untuk menyimpan data
    function savePengalaman() {
        const uraian = document.getElementById('uraian').value;
        const bukti = document.getElementById('bukti').value;

        // Validasi
        if (!uraian || !bukti) {
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
        dataPengalaman.push({
            uraian: uraian,
            bukti: bukti
        });

        // Clear inputs dan render ulang tabel
        clearInputsPengalaman();
        renderTablePengalaman();
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

    // Function untuk membersihkan input
    function clearInputsPengalaman() {
        document.getElementById('uraian').value = '';
        document.getElementById('bukti').value = '';
        renderTablePengalaman(); // Render ulang untuk reset tombol save
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

    // Function untuk menghapus data
    function deletePengalaman(index) {
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
                dataPengalaman.splice(index, 1);
                renderTablePengalaman();
            }
        });
    }

    // Fungsi untuk mengecek apakah semua field sudah diisi
    function checkAllFieldsStep1() {
        const name = $('#name').val();
        const email = $('#email').val();
        const tanggal_lahir = $('#tanggal_lahir').val();
        const jenis_kelamin = $('input[name="jenis_kelamin"]:checked').length;
        const alamat = $('#alamat').val();
        const provinsi = $('#provinsi').val();
        const kota = $('#kota').val();
        const riwayat_pendidikan = $('#riwayat_pendidikan').val();
        const tempat_pendidikan = $('#tempat_pendidikan').val();

        // Cek semua field
        if (!name || !email || !tanggal_lahir || !jenis_kelamin || !alamat || !provinsi || !kota || !riwayat_pendidikan || !tempat_pendidikan) {
            Swal.fire({
                title: 'Oops...',
                text: 'Mohon lengkapi semua field yang diperlukan',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
            return false;
        }
        return true;
    }

    // Event handler untuk tombol next
    $('#next-step-1').click(function(e) {
        e.preventDefault();
        
        if (!checkAllFieldsStep1()) {
            return false;
        } 
    });

    renderTablePelatihan();
    renderTablePengalaman();
    
     $('#frmPendaftaran').on('submit', function(e) {
            e.preventDefault();
            
            if (!checkAllFieldsStep1()) {
                return false;
            }

            // Menyembunyikan indikator dan menampilkan spinner
            $('.indicator-label').hide();
            $('.indicator-progress').show();

            // Menonaktifkan tombol Save untuk mencegah klik ganda
            $('#savefrmPendaftaran').prop('disabled', true);

            // Ambil data form
            const formData = new FormData(this);
            formData.append('pelatihan', JSON.stringify(dataPelatihan));
            formData.append('pengalaman', JSON.stringify(dataPengalaman));

            console.log(formData);

            // Kirim request AJAX
            // $.ajax({
            //     url: $(this).attr('action'),
            //     type: 'POST',
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     success: function(response) {
            //         if (response.status === 'success') {
            //             Swal.fire({
            //                 title: 'Sukses',
            //                 text: response.message,
            //                 icon: 'success',
            //                 confirmButtonText: 'Ok'
            //             }).then((result) => {
            //                 if (result.isConfirmed) {
            //                     window.location.href = '<?= base_url('Aplikan/FormPendaftaran/step-2') ?>';
            //                 }
            //             });
            //         } else {
            //             Swal.fire({
            //                 title: 'Error',
            //                 text: response.message,
            //                 icon: 'error',
            //                 confirmButtonText: 'Ok'
            //             });
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         Swal.fire({
            //             title: 'Error',
            //             text: 'Terjadi kesalahan saat mengirim data',
            //             icon: 'error',
            //             confirmButtonText: 'Ok'
            //         });
            //     },
            //     complete: function() {
            //         // Mengembalikan status tombol setelah selesai
            //         $('#savefrmPendaftaran').prop('disabled', false);
            //         $('.indicator-label').show();
            //         $('.indicator-progress').hide();
            //     }
            // });
        });

    document.addEventListener("DOMContentLoaded", function() {
        var stepper = new KTStepper(document.querySelector("#kt_stepper"));

        document.querySelectorAll("[data-kt-stepper-action='next']").forEach(button => {
            button.addEventListener("click", function(e) {
                // Cek jika tombol yang diklik adalah tombol next di step 1
                if (this.id === 'next-step-1') {
                    e.preventDefault();
                    if (!checkAllFieldsStep1()) {
                        return false;
                    }
                }
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