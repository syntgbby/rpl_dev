<!--begin::Step 2-->
<div class="stepper-content" data-kt-stepper-element="content">
    <div class="card-body pt-5" style="overflow-x: auto;">
        <h2 class="mb-7">Step 2: Pelatihan</h2>

        <!--begin::Table-->
        <div class="table-responsive" style="overflow-x: auto;">
            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 table-striped" id="tablePelatihan">
                <thead>
                    <tr class="fw-bold text-semibold">
                        <th class="min-w-150px">Nama Pelatihan</th>
                        <th class="min-w-150px">Penyelenggara</th>
                        <th class="min-w-150px">Peran Serta</th>
                        <th class="min-w-100px">Durasi (hari)</th>
                        <th class="min-w-100px">No. Sertifikat</th>
                        <th class="min-w-100px">Tahun</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbodyPelatihan">
                    <!-- Data akan ditampilkan disini -->
                </tbody>
            </table>
        </div>
        <!--end::Table-->

        <div class="d-flex justify-content-between mt-5">
            <button type="button" class="btn btn-light" data-kt-stepper-action="previous">Back</button>
            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">Next</button>
        </div>
    </div>
</div>
<!--end::Step 2-->

<script type="text/javascript">
    // Array untuk menyimpan data pelatihan
    let dataPelatihan = [];
    let editIndex = -1; // Tambahkan variable untuk tracking index yang sedang diedit

    // Function untuk menampilkan data ke tabel
    function renderTable() {
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
                    <input type="text" class="form-control form-control-solid" id="nama_pelatihan" placeholder="Nama pelatihan" required>
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
            console.log(nama_pelatihan, penyelenggara, peran_serta, durasi, no_sertifikat, tahun);

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
            renderTable();
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
        renderTable(); // Render ulang untuk reset tombol save
    }

    function editPelatihan(index) {
        editIndex = index;
        renderTable();
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
        renderTable();
    }

    function cancelEdit() {
        editIndex = -1;
        renderTable();
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
                renderTable();
            }
        });
    }

    // Inisialisasi tabel saat halaman dimuat
    $(document).ready(function() {
        renderTable();
    });
</script>