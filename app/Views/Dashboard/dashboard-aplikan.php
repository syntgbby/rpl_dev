<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Row-->
		<?php if (session()->has('success')): ?>
			<div class="alert alert-success">
				<?= session()->getFlashdata('success') ?>
			</div>
		<?php endif; ?>
		<?php if (session()->has('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<!-- Kolom kiri: Foto + info user -->
		<div class="row">
			<div class="col-md-12 mb-xl-3 mb-5">
				<div class="card card-flush h-20 w-20 text-center">
					<!--end::Header-->
					<div class="card-body d-flex flex-column align-items-center justify-content-center">
						<div class="symbol symbol-100px symbol-circle mb-5">
							<img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" />
						</div>
						<div class="fs-3 text-gray-800 fw-bold mb-1">Selamat Datang</div>
						<div class="badge badge-lg badge-light-primary d-inline"><?= $user['name'] ?></div>
					</div>
				</div>
			</div>

			<?php if ($pendaftaran): ?>
				<!--begin::Col-->
				<div class="col-md-12 mb-5 mb-xl-6">
					<!--begin::Header-->
					<div class="card-header">
						<!--begin::Statistics-->
						<div class="m-0">
							<!--begin::Timeline Widget-->
							<div class="card card-flush h-100">
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
													<p class="text-gray-600">
														<?= $item['keterangan'] ?><br><?= date('d F Y H:i', strtotime($item['waktu'])) ?>
													</p>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
									<!--end::Timeline-->
									
									<!--start::Button-->
									<?php if ($pendaftaran['status'] == 'draft'): ?>
										<div class="d-flex justify-content-end align-items-center">
											<a href="/aplikan/cek-step"
												class="btn btn-primary justify-content-end text-end">Lanjutkan Pendaftaran</a>
										</div>
									<?php endif; ?>
									<!--end::Button-->
								</div>
								<!--end::Body-->

							</div>
							<!--end::Timeline Widget-->

							<!--end::Row-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Content wrapper-->
				</div>
				<!--end::Col-->
			<?php else: ?>
				<div class="col-md-12 mb-xl-3">
					<div class="card card-flush h-20 w-20 text-center">
						<div class="card-header text-center justify-content-center">
							<h3 class="card-title text-bold">Program Studi</h3>
						</div>
						<!--begin::Col-->
						<div class="row">
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
											<div class="d-flex justify-content-center align-items-center mb-4">
												<?php if ($item['pict'] != null): ?>
													<img src="<?= $item['pict'] ?>" alt="<?= $item['nama_prodi'] ?>"
														class="w-50 h-50 rounded">
												<?php endif; ?>
											</div>

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
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>