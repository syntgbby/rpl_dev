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

		<?php if ($pendaftaran) : ?>
			<!--begin::Row-->
			<div class="row gx-5 gx-xl-12">
				<!--begin::Col-->
				<div class="col-md-6 mb-5 mb-xl-6">
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
													<p class="text-gray-600"><?= $item['keterangan'] ?><br><?= date('d F Y H:i', strtotime($item['waktu'])) ?></p>
												</div>
											</div>
										<?php endforeach; ?>
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
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-6 mb-5 mb-xl-6">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Statistics-->
						<div class="m-0">
							<!--begin::Timeline Widget-->
							<div class="card card-flush">
								<!--begin::Header-->
								<div class="card-header">
									<h3 class="card-title">Detail Pendaftaran</h3>
								</div>
								<!--end::Header-->

								<!--begin::Body-->
								<div class="card-body">
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
			</div>
			<!--end::Row-->
		<?php else : ?>
			<div class="row g-10">
				<div class="card-header">
					<h4 class="card-title text-center">Langkah - Langkah Pendaftaran</h4>
				</div>
				<div class="card-body">
					<p>Langkah - Langkah Pendaftaran</p>
				</div>
			</div>
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