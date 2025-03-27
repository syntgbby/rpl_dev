<!--begin::Step 2-->
<div class="stepper-content" data-kt-stepper-element="content">
    <div class="card-body pt-5">
        <h2 class="mb-7">Step 2: Pelatihan</h2>

        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                <thead>
                    <tr class="fw-bold text-semibold">
                        <th class="min-w-150px">Nama Perusahaan</th>
                        <th class="min-w-100px">Tahun Mulai</th>
                        <th class="min-w-100px">Tahun Selesai</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody id="tablePelatihan">
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
                                value="${item.nama_perusahaan}" placeholder="Nama Perusahaan" required>
                        </td>
                        <td>
                            <input type="number" min="2000" max="2025" class="form-control form-control-solid" id="edit_tahun_mulai_${index}" 
                                value="${item.tahun_mulai}" 
                                onchange="this.value = new Date(this.value).getFullYear()"
                                placeholder="Tahun Mulai" required>
                        </td>
                        <td>
                            <input type="number" min="2000" max="2025" class="form-control form-control-solid" id="edit_tahun_selesai_${index}" 
                                value="${item.tahun_selesai}" 
                                onchange="this.value = new Date(this.value).getFullYear()"
                                placeholder="Tahun Selesai" required>
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
                        <td>${item.nama_perusahaan}</td>
                        <td>${item.tahun_mulai}</td>
                        <td>${item.tahun_selesai}</td>
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
                    <input type="text" class="form-control form-control-solid" id="nama_perusahaan" placeholder="Nama Perusahaan" required>
                </td>
                <td>
                    <input type="number" min="2000" max="2025" class="form-control form-control-solid" id="tahun_mulai" placeholder="Tahun Mulai" required>
               </td>
                <td>
                    <input type="number" min="2000" max="2025" class="form-control form-control-solid" id="tahun_selesai" placeholder="Tahun Selesai" required>
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
        
        document.getElementById('tablePelatihan').innerHTML = html;
    }

    // Function untuk menyimpan data
    function savePelatihan() {
        if (editIndex >= 0) {
            updatePelatihan();
        } else {
            const nama_perusahaan = document.getElementById('nama_perusahaan').value;
            const tahun_mulai = document.getElementById('tahun_mulai').value;
            const tahun_selesai = document.getElementById('tahun_selesai').value;

            // Validasi
            if (!nama_perusahaan || !tahun_mulai || !tahun_selesai) {
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

            // Validasi tahun
            if (parseInt(tahun_selesai) < parseInt(tahun_mulai)) {
                Swal.fire({
                    text: "Tahun selesai tidak boleh lebih kecil dari tahun mulai",
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
                nama_perusahaan: nama_perusahaan,
                tahun_mulai: tahun_mulai,
                tahun_selesai: tahun_selesai
            });

            // Clear inputs dan render ulang tabel
            clearInputs();
            renderTable();
        }
    }

    // Function untuk membersihkan input
    function clearInputs() {
        document.getElementById('nama_perusahaan').value = '';
        document.getElementById('tahun_mulai').value = '';
        document.getElementById('tahun_selesai').value = '';
        editIndex = -1;
        renderTable(); // Render ulang untuk reset tombol save
    }

    function editPelatihan(index) {
        editIndex = index;
        renderTable();
    }

    function updatePelatihan(index) {
        const nama_perusahaan = document.getElementById(`edit_nama_${index}`).value;
        const tahun_mulai = document.getElementById(`edit_tahun_mulai_${index}`).value;
        const tahun_selesai = document.getElementById(`edit_tahun_selesai_${index}`).value;

        // Validasi
        if (!nama_perusahaan || !tahun_mulai || !tahun_selesai) {
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

        // Validasi tahun
        if (parseInt(tahun_selesai) < parseInt(tahun_mulai)) {
            Swal.fire({
                text: "Tahun selesai tidak boleh lebih kecil dari tahun mulai",
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
            nama_perusahaan: nama_perusahaan,
            tahun_mulai: tahun_mulai,
            tahun_selesai: tahun_selesai
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