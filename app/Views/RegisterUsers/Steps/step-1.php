<!--begin::Step 1 (KEPT AS IT IS)-->
<div class="stepper-content current p-5" data-kt-stepper-element="content">
    <div class="card-body pt-5">
        <h2 class="mb-5">Step 1: Identitas Diri</h2>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Lengkap</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Enter the your full name.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="name"  id="name" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Email</label>
                <input type="email" class="form-control form-control-solid" name="email" id="email" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Tanggal Lahir</label>
                <input type="date" class="form-control form-control-solid" name="tanggal_lahir" id="tanggal_lahir" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Kelamin</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex gap-3 mt-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" id="jenis_kelamin_laki">
                        <label class="form-check-label text-black" for="jenis_kelamin_laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" id="jenis_kelamin_perempuan">
                        <label class="form-check-label text-black" for="jenis_kelamin_perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fv-row mb-7 mt-3">
            <label class="fs-6 fw-semibold form-label mt-3">Alamat</label>
            <textarea class="form-control form-control-solid" name="alamat" id="alamat"></textarea>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Provinsi</label>
                <input type="text" class="form-control form-control-solid" name="provinsi" id="provinsi" />
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Kota</label>
                <input type="text" class="form-control form-control-solid" name="kota" id="kota" />
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Pendidikan Terakhir</label>
                <select required class="form-select form-select-md form-select-solid text-sm h-40px" data-control="select2" name="riwayat_pendidikan" id="riwayat_pendidikan" data-placeholder="Pilih Pend. Terakhir">
                    <option></option>
                    <option value="SMA">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">Tempat Pendidikan</label>
                <input type="text" class="form-control form-control-solid" name="tempat_pendidikan" id="tempat_pendidikan" />
            </div>
        </div>
        <div class="d-flex justify-content-end mt-7">
            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">Next</button>
        </div>
    </div>
</div>
<!--end::Step 1-->