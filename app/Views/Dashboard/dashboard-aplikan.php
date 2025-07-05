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
			<!-- Kolom Selamat Datang -->
			<div class="col-md-6 mb-xl-3 mb-5">
				<div class="card card-flush h-100">
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
				<!-- Kolom Status Pendaftaran -->
				<div class="col-md-6 mb-5 mb-xl-3">
					<div class="card card-flush h-100">
						<div class="card-header">
							<h3 class="card-title">Status Pendaftaran</h3>
						</div>
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
								<div class="d-flex justify-content-end align-items-center mt-5">
									<a href="/aplikan/cek-step" class="btn btn-primary">Lanjutkan Pendaftaran</a>
								</div>
							<?php endif; ?>
							<!--end::Button-->
						</div>
					</div>
				</div>
			<?php else: ?>
				<!-- Kolom Kosong jika belum ada pendaftaran -->
				<div class="col-md-6 mb-5 mb-xl-3">
					<div class="card card-flush h-100">
						<div class="card-body d-flex flex-column align-items-center justify-content-center">
							<div class="fs-3 text-gray-800 fw-bold mb-1">Belum Ada Pendaftaran</div>
							<p class="text-gray-600">Silahkan pilih program studi untuk memulai pendaftaran</p>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<!-- Program Studi Section -->
		<?php if (!$pendaftaran): ?>
			<div class="alert alert-info d-flex flex-column flex-sm-row p-5 mb-10">
				<i class="ki-duotone ki-information fs-2hx text-info me-4 mb-5 mb-sm-0"></i>
				<div class="d-flex flex-column">
					<h4 class="mb-1 text-info">Pendaftaran Belum Dimulai</h4>
					<span>Anda telah memilih program studi saat registrasi. Silakan klik tombol di bawah ini untuk
						melanjutkan proses pendaftaran Anda.</span>
				</div>
				<div class="ms-sm-auto">
					<a href="/aplikan/pendaftaran/step1" class="btn btn-primary mt-3 mt-sm-0">Mulai Pendaftaran</a>
				</div>
			</div>
		<?php endif; ?>

	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>