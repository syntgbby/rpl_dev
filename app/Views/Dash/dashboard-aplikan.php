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
						<a href="/editprofile" class="btn btn-sm btn-warning">Lengkapi Biodata</a>
					</button>
					<!--end::Close-->
				</div>
				<!--end::Alert-->
				<!--end::Col-->
			</div>
		<?php endif; ?>

		<?php if ($pendaftaran) : ?>
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
											<?php foreach ($timeline as $item): ?>
											<!--begin::Timeline item-->
											<div class="timeline-item">
												<div class="timeline-line"></div>
												<div class="timeline-icon">
													<i class="<?= $item['icon'] ?>"></i>
												</div>
												<div class="timeline-content">
													<span class="fw-bold text-gray-800"><?= $item['status'] ?></span>
													<p class="text-gray-600"><?= $item['keterangan'] ?></p>
												</div>
											</div>
											<?php endforeach; ?>
										</div>
										<!--end::Timeline-->

										<div class="d-flex justify-content-end align-items-center">
											<button type="button" class="btn btn-sm btn-light-warning mt-2" data-bs-toggle="modal" data-bs-target="#detailPendaftaranModal">
												Lihat Detail
											</button>
										</div>

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
					</div>
					<!--end::Chart widget 28-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->
		<?php else : ?>
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
		<?php endif; ?>
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>