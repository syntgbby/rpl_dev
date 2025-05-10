<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Row-->
		<?php if ($dataUser['tempat_lahir'] == null || $dataUser['tanggal_lahir'] == null) : ?>
			<div class="row g-10">
				<!--begin::Col-->
				<!--begin::Alert-->
				<div class="alert alert-warning d-flex align-items-center p-5 mb-10">
					<!--begin::Icon-->
					<i class="ki-duotone ki-information-5 fs-2hx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
					<!--end::Icon-->

					<!--begin::Wrapper-->
					<div class="d-flex flex-column">
						<!--begin::Title-->
						<h4 class="mb-1 text-warning">Biodata Belum Lengkap</h4>
						<!--end::Title-->
						<!--begin::Content-->
						<span>Silahkan lengkapi biodata Anda terlebih dahulu sebelum melakukan pendaftaran.</span>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->

					<!--begin::Close-->
					<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
						<i class="ki-duotone ki-cross fs-2x text-warning"><span class="path1"></span><span class="path2"></span></i>
					</button>
					<!--end::Close-->
				</div>
				<!--end::Alert-->
				<!--end::Col-->
			</div>
		<?php endif; ?>
		<div class="row g-10">
			<div class="card-header">
				<h4 class="card-title text-center">Program Studi</h4>
			</div>
			<!--begin::Col-->
			<?php foreach ($prodi as $item): ?>
				<div class="col-md-3 mb-5 mb-lg-6 p-10">
					<!--begin::Card Widget-->
					<div class="card card-flush h-xl-200">
						<!--begin::Header-->
						<div class="card-header">
							<div class="d-flex justify-content-center align-items-center">
								<!--begin::Title-->
								<h4 class="card-title text-center">
									<?= $item['nama_prodi'] ?>
								</h4>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Header-->

						<!--begin::Body-->
						<div class="card-body d-flex flex-column ps-4 pe-4 pb-4">
							<!--begin::Content-->
							<div class="d-flex justify-content-center align-items-center">
								<?php if ($item['pict'] != null): ?>
									<img src="<?= $item['pict'] ?>"
										alt="<?= $item['nama_prodi'] ?>" class="w-50 h-50 rounded">
								<?php endif; ?>
							</div>

							<div class="d-flex justify-content-center align-items-center">
								<p class="mb-4">
									<?= $item['deskripsi_singkat'] ?>
								</p>
							</div>
							<!--end::Content-->

							<div class="d-flex justify-content-center align-items-center">
								<!-- <a href="/detail-prodi/<?= $item['id'] ?>"
									class="btn btn-primary justify-content-end text-end">Detail</a> -->
								<a href="/aplikan/pendaftaran/step1"
									class="btn btn-primary justify-content-end text-end">Daftar Sekarang</a>
							</div>
							<!--end::Button-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card Widget-->
				</div>
			<?php endforeach; ?>
			<!--end::Col-->
		</div>
		<!--end::Row-->
		<!-- End Untuk Aplikan -->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>