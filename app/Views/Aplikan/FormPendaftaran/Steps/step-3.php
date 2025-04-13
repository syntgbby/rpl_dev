<!--begin::Step 3 - Pengalaman Kerja-->
<div class="stepper-content" data-kt-stepper-element="content">
    <div class="card-body pt-5" style="overflow-x: auto;">
        <h2 class="mb-5">Step 3: Pengalaman Kerja</h2>

        <div class="fv-row mb-7">
            <label class="fs-6 fw-semibold form-label mt-3">Nama Perusahaan / lembaga : </label>
            <input type="text" class="form-control form-control-solid" name="nama_perusahaan" />
        </div>

        <div class="fv-row mb-7">
            <label class="fs-6 fw-semibold form-label mt-3">Alamat</label>
            <textarea class="form-control form-control-solid" name="alamat"></textarea>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Provinsi</label>
                <input type="text" class="form-control form-control-solid" name="provinsi" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Kota</label>
                <input type="text" class="form-control form-control-solid" name="kota" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Negara </label>
                <input type="text" class="form-control form-control-solid" name="negara" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Kode Pos</label>
                <input type="text" class="form-control form-control-solid" name="kode_pos" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Phone Hp</label>
                <input type="text" class="form-control form-control-solid" name="hp" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Lama kerja</label>
                <input type="text" class="form-control form-control-solid" name="provinsi" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Sejak</label>
                <input type="date" class="form-control form-control-solid" name="kota" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Sampai</label>
                <input type="date" class="form-control form-control-solid" name="negara" />
            </div>
        </div>

        <hr>
        <div class="row mb-3 mt-5">
            <h5 class="mb-5">Pihak perusahaan yang dapat dihubungi untuk dimintai rekomendasi</h5>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Nama</label>
                <input type="text" class="form-control form-control-solid" name="nama" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">No. HP</label>
                <input type="text" class="form-control form-control-solid" name="hp" />
            </div>
        </div>

        <hr>
        <div class="row mb-3 mt-5">
            <h5 class="mb-5">Posisi Jabatan (Posisi terakhir diperusahaan)</h5>
        </div>

        <div class="row mb-7 align-items-center">
            <!-- Nomor -->
            <div class="col-1 text-center mt-5">
                <span class="fs-4 fw-semibold">1.</span>
            </div>

            <!-- Posisi -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Posisi</label>
                    <input type="text" class="form-control form-control-solid" name="posisi[]" />
                </div>
            </div>

            <!-- Lama Waktu -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Lama Waktu (Bulan)</label>
                    <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
                </div>
            </div>
        </div>

        <div class="row mb-7 align-items-center">
            <!-- Nomor -->
            <div class="col-1 text-center mt-5">
                <span class="fs-4 fw-semibold">2.</span>
            </div>

            <!-- Posisi -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Posisi</label>
                    <input type="text" class="form-control form-control-solid" name="posisi[]" />
                </div>
            </div>

            <!-- Lama Waktu -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Lama Waktu (Bulan)</label>
                    <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
                </div>
            </div>
        </div>
        
        <div class="row mb-7 align-items-center">
            <!-- Nomor -->
            <div class="col-1 text-center mt-5">
                <span class="fs-4 fw-semibold">3.</span>
            </div>

            <!-- Posisi -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Posisi</label>
                    <input type="text" class="form-control form-control-solid" name="posisi[]" />
                </div>
            </div>

            <!-- Lama Waktu -->
            <div class="col-5">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-semibold form-label">Lama Waktu (Bulan)</label>
                    <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
                </div>
            </div>
        </div> 

        <hr>
        <div class="row mb-3 mt-3">
            <h5 class="mb-5">Pengalaman Lain yang Relevan</h5>
        </div>

        <div class="row mb-7">
            <div class="col-5">
                <button type="button" class="btn btn-primary" id="addPK"><i class="fa-solid fa-user-plus"></i></button>
            </div>
        </div>

        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_pk">
            <thead>
                <tr class="text-center text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-15px">No</th>
                    <th class="min-w-75px">Uraian Pengalaman</th>
                    <th class="min-w-100px">Tipe Bukti</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold" id="table-body">
            </tbody>
        </table>


        <div class="d-flex justify-content-between mt-5">
            <button type="button" class="btn btn-light" data-kt-stepper-action="previous">Back</button>
            <button type="submit" class="btn btn-success" name="savefrm" id="savefrm">Submit</button>
        </div>
    </div>
</div>
<!--end::Step 3-->

<script>
document.getElementById('simpanPengalaman').addEventListener('click', function () {
    const uraian = document.getElementById('uraianPengalaman').value.trim();
    const fileInput = document.getElementById('buktiPengalaman');
    const file = fileInput.files[0];

    if (!uraian || !file) {
        alert("Harap isi uraian dan pilih file PDF!");
        return;
    }

    if (file.type !== "application/pdf") {
        alert("Hanya file PDF yang diperbolehkan!");
        return;
    }

    const tbody = document.getElementById("table-body");
    const rowCount = tbody.rows.length + 1;

    const newRow = `
        <tr>
            <td class="text-center">${rowCount}</td>
            <td>${uraian}</td>
            <td>${file.name}</td>
        </tr>
    `;

    tbody.insertAdjacentHTML('beforeend', newRow);

    // Reset modal input
    document.getElementById('uraianPengalaman').value = '';
    fileInput.value = '';

    // Tutup modal
    const modalElement = document.getElementById('modalPengalaman');
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.hide();
});
</script>