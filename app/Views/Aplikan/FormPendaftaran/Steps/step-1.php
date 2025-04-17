<!--begin::Step 1 - Identitas Diri-->
<div class="stepper-content current p-5" data-kt-stepper-element="content">
    <div class="card-body pt-5">
        <h2 class="mb-5">Step 1: Identitas Diri</h2>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Lengkap</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan nama lengkap Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="name"  id="name" required/>
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Email</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan email Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="email" id="email" required/>
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan tanggal lahir Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="date" class="form-control form-control-solid" name="tanggal_lahir" id="tanggal_lahir" required/>
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Kelamin</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan jenis kelamin Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex gap-3 mt-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" id="jenis_kelamin_laki" required/>
                        <label class="form-check-label text-black" for="jenis_kelamin_laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" id="jenis_kelamin_perempuan" required/>
                        <label class="form-check-label text-black" for="jenis_kelamin_perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="fv-row mb-7 mt-3">
            <label class="fs-6 fw-semibold form-label mt-3">
                <span class="required">Alamat</span>
                <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan alamat Anda.">
                    <i class="ki-outline ki-information fs-7"></i>
                </span>
            </label>
            <textarea class="form-control form-control-solid" name="alamat" id="alamat" required></textarea>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Provinsi</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan provinsi Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="provinsi" id="provinsi" required/>
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kota</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan kota Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="kota" id="kota" required/>
            </div>
        </div>

        <div class="row mb-7">
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pendidikan Terakhir</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan pendidikan terakhir Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <select required class="form-select form-select-md form-select-solid text-sm h-40px" data-control="select2" name="riwayat_pendidikan" id="riwayat_pendidikan" data-placeholder="Pilih Pend. Terakhir">
                    <option></option>
                    <option value="SMA">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>
            <div class="col">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tempat Pendidikan</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan tempat pendidikan Anda.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <input type="text" class="form-control form-control-solid" name="tempat_pendidikan" id="tempat_pendidikan" required />
            </div>
        </div>
        <div class="d-flex justify-content-end mt-7">
            <button type="button" class="btn btn-primary" data-kt-stepper-action="next" id="next-step-1">Next</button>
        </div>
    </div>
</div>
<!--end::Step 1-->