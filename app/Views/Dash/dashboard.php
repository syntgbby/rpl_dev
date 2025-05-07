<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!-- Untuk Aplikan -->
		<!--begin::Row-->
		<div class="row g-10">
			<?php if ($data_form['upload_status'] == '0') : ?>
				<?php foreach ($data as $item) : ?>
				<!--begin::Col-->
				<div class="col-md-3 mb-5 mb-lg-6">
					<!--begin::Card Widget-->
					<div class="card card-flush h-xl-200">
						<!--begin::Header-->
						<div class="card-header">
							<div class="d-flex justify-content-center align-items-center">
								<!--begin::Title-->
								<h4 class="card-title text-center"><?= $item['prodi_name'] ?></h4>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Header-->
						
						<!--begin::Body-->
						<div class="card-body d-flex flex-column ps-4 pe-4 pb-4">
							<!--begin::Content-->
							<div class="d-flex justify-content-center align-items-center">
								<?php if ($item['prodi_pict'] != null) : ?>
									<img src="<?= base_url('uploads/prodi/' . $item['prodi_pict']) ?>" alt="<?= $item['prodi_name'] ?>" class="w-50 h-50 rounded">
								<?php endif; ?>
							</div>
							
							<div class="d-flex justify-content-center align-items-center">
								<p class="mb-4"><?= $item['prodi_descs'] ?></p>
							</div>
							<!--end::Content-->
							
							<div class="d-flex justify-content-center align-items-center">
								<a href="/aplikan/form-pendaftaran" class="btn btn-primary justify-content-end text-end">Daftar Sekarang</a>
							</div>
							<!--end::Button-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card Widget-->
				</div>
				<?php endforeach; ?>
				<!--end::Col-->
			<?php endif; ?>
		</div>
		<!--end::Row-->
		<!-- End Untuk Aplikan -->

		<!-- Untuk Admin -->
		<div class="row g-10">
			<?php if ($data_form['upload_status'] == '1') : ?>
			<div class="col-md-12">
				<div class="card card-flush h-xl-200">
					<div class="card-header">
						<h4 class="card-title text-center">Data Aplikan</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<p>Nama: <?= $data_form[0]['nama'] ?></p>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="/aplikan/form-pendaftaran" class="btn btn-primary justify-content-end text-end">Upload Bukti</a>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<!-- End Untuk Admin -->
		
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>