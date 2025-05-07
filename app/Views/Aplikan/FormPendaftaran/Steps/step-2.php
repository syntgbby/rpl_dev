<!--begin::Step 2-->
<div class="stepper-content" data-kt-stepper-element="content">
    <div class="card-body pt-5" style="overflow-x: auto;">
        <h2 class="mb-7">Step 2: Pelatihan
            <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan pelatihan Anda.">
                <i class="ki-outline ki-information fs-7"></i>
            </span>
        </h2>

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
            <button type="submit" class="btn btn-success" name="savefrmPendaftaran" id="savefrmPendaftaran">Submit
                <span class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true" style="display: none;"></span>
                <span class="visually-hidden">Loading...</span>
            </button>
            <!-- <button type="button" class="btn btn-primary" data-kt-stepper-action="next">Next</button> -->
        </div>
    </div>
</div>
<!--end::Step 2-->