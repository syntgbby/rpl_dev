<!--begin::Step 3 - Pengalaman Kerja-->
<div class="stepper-content" data-kt-stepper-element="content">
    <div class="card-body pt-5">
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
        <div class="row mb-3 mt-3">
            <h5 class="mb-5">Pihak perusahaan yang dapat dihubungi untuk dimintai rekomendasi</h5>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Nama </label>
                <input type="text" class="form-control form-control-solid" name="nama" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Hp</label>
                <input type="text" class="form-control form-control-solid" name="hp" />
            </div>
        </div>

        <hr>
        <div class="row mb-3 mt-3">
            <h5 class="mb-5">Posisi Jabatan (Posisi terakhir diperusahaan)</h5>
        </div>

        <div class="row mb-7">
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3"><span>1.</span> Posisi</label>
                <input type="text" class="form-control form-control-solid" name="posisi[]" />
            </div>
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3">Lama Waktu (Bulan)</label>
                <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col-1">
                <span>2.</span>
            </div>
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3">Posisi</label>
                <input type="text" class="form-control form-control-solid" name="posisi[]" />
            </div>
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3">Lama Waktu (Bulan)</label>
                <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3"><span>3.</span> Posisi</label>
                <input type="text" class="form-control form-control-solid" name="posisi[]" />
            </div>
            <div class="col-5">
                <label class="fs-6 fw-semibold form-label mt-3">Lama Waktu (Bulan)</label>
                <input type="number" class="form-control form-control-solid" name="lamawaktu[]" />
            </div>
        </div>

        <hr>
        <div class="row mb-3 mt-3">
            <h5 class="mb-5">Pengalaman Lain yang Relevan</h5>
        </div>

        <div class="row mb-7">
            <div class="col-5">
                <h4 class="mb-5">Pengalaman Lain yang Relevan</h4>
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal" id="addPK"><i class="fa-solid fa-user-plus"></i></button>
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