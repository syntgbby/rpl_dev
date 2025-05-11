<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Row-->
		<div class="row gx-5 gx-xl-12">
			<!--begin::Col-->
			<div class="col-xxl-12 mb-5 mb-xl-12">
				<!--begin::Chart widget 28-->
				<div class="card card-flush h-xl-200">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Statistics-->
						<div class="m-0">

<!--begin::Timeline Widget-->
<div class="card card-flush">
    <!--begin::Header-->
    <div class="card-header">
        <h3 class="card-title">Status Pendaftaran</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Timeline-->
        <div class="timeline">
            <!--begin::Timeline item-->
            <div class="timeline-item">
                <div class="timeline-line"></div>
                <div class="timeline-icon">
 <i class="ki-outline ki-user fs-2 text-primary"></i>                </div>
                <div class="timeline-content">
                    <span class="fw-bold text-gray-800">Pendaftaran Id</span>
                    <p class="text-gray-600">Status Pendaftaran</p>
                </div>
            </div>
            <!--end::Timeline item-->
 			<!--begin::Timeline item-->
            <div class="timeline-item">
                <div class="timeline-line"></div>
                <div class="timeline-icon">
                    <i class="ki-outline ki-calendar fs-2 text-primary"></i>
                </div>
                <div class="timeline-content">
                    <span class="fw-bold text-gray-800">Status</span>
                    <p class="text-gray-600">Status Pendaftaran</p>
                </div>
            </div>
            <!--end::Timeline item-->
            <!--begin::Timeline item-->
            <div class="timeline-item">
                <div class="timeline-line"></div>
                <div class="timeline-icon">
                    <i class="ki-outline ki-document fs-2 text-success"></i>
                </div>
                <div class="timeline-content">
                    <span class="fw-bold text-gray-800">Keterangan</span>
                    <p class="text-gray-600">Status Pendaftaran</p>
                </div>
            </div>
            <!--end::Timeline item-->
<!--begin::Timeline item-->
<div class="timeline-item">
    <div class="timeline-line"></div>
    <div class="timeline-icon">
        <i class="ki-outline ki-check-circle fs-2 text-warning"></i>
    </div>
    <div class="timeline-content">
        <span class="fw-bold text-gray-800">Waktu</span>
        <p class="text-gray-600">Pengumuman hasil seleksi gelombang pertama.</p>
        <button type="button" class="btn btn-sm btn-light-warning mt-2" data-bs-toggle="modal" data-bs-target="#detailPendaftaranModal">
            Lihat Detail
        </button>
    </div>
</div>
<!--end::Timeline item-->


        </div>
        <!--end::Timeline-->
		
    </div>
    <!--end::Body-->
</div>
<!--end::Timeline Widget-->

		<!--end::Row-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->
<!--begin::Modal-->
<div class="modal fade" id="detailPendaftaranModal" tabindex="-1" aria-labelledby="detailPendaftaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <!--begin::Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="detailPendaftaranLabel">Detail Status Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="modal-body">
                <p><strong>Informasi:</strong> Hasil seleksi gelombang pertama telah diumumkan. Mahasiswa yang lolos seleksi dapat melanjutkan ke proses daftar ulang.</p>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Cek hasil seleksi melalui portal resmi.</li>
                    <li class="list-group-item">Gunakan ID pendaftaran dan tanggal lahir untuk login.</li>
                    <li class="list-group-item">Daftar ulang dibuka mulai 22 Juni 2025.</li>
                </ul>
                <a href="/myprofile" class="btn btn-sm btn-warning">Cek Hasil Sekarang</a>
            </div>
            <!--end::Body-->

            <!--begin::Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
            <!--end::Footer-->
        </div>
    </div>
</div>
<!--end::Modal-->

<?= $this->endSection() ?>