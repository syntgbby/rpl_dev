<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!-- Untuk Aplikan -->
		<div class="card-header">
			<h4 class="card-title text-center">Data Aplikan</h4>
		</div>
		<!--begin::Row-->
		<div class="row g-10">
			<!--begin::Col-->
			<?php foreach ($prodi as $item): ?>
				<div class="col-md-3 mb-5 mb-lg-6">
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
									<img src="<?= base_url('uploads/prodi/' . $item['pict']) ?>"
										alt="<?= $item['prodi_name'] ?>" class="w-50 h-50 rounded">
								<?php endif; ?>
							</div>

							<div class="d-flex justify-content-center align-items-center">
								<p class="mb-4">
									<?= $item['deskripsi_singkat'] ?>
								</p>
							</div>
							<!--end::Content-->

							<div class="d-flex justify-content-center align-items-center">
								<a href="/aplikan/form-pendaftaran"
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