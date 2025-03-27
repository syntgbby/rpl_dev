<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Row-->
		<div class="row g-10">
			<?php foreach ($data as $item) : ?>
			<!--begin::Col-->
			<div class="col-md-3 mb-5 mb-lg-6">
				<!--begin::Card Widget-->
				<div class="card card-flush h-xl-200">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Title-->
						<h3 class="card-title"><?= $item['prodi_name'] ?></h3>
						<!--end::Title-->
					</div>
					<!--end::Header-->
					
					<!--begin::Body-->
					<div class="card-body d-flex flex-column align-items-start ps-4 pe-4 pb-4">
						<!--begin::Content-->
						<?php if ($item['prodi_pict'] != null) : ?>
							<img src="<?= base_url('uploads/prodi/' . $item['prodi_pict']) ?>" alt="<?= $item['prodi_name'] ?>" class="w-50 h-50 justify-content-center align-items-center">
						<?php endif; ?>
						
						<p class="mb-4"><?= $item['prodi_descs'] ?></p>
						<!--end::Content-->
						
						<!--begin::Button-->
						<a href="/form-pendaftaran" class="btn btn-primary justify-content-end text-end">Daftar Sekarang</a>
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
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>