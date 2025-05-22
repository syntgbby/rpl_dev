<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Row-->
		<div class="row g-10">
			<!--begin::Col-->
			<div class="col-md-6 mb-5 mb-lg-6">
				<!--begin::Card Widget-->
				<div class="card card-flush h-xl-400">
					<!--begin::Header-->
					<div class="card-header">
						<div class="d-flex justify-content-center align-items-center">
							<!--begin::Title-->
							<h4 class="card-title text-center">
								Jumlah Prodi
							</h4>
							<!--end::Title-->
						</div>
					</div>
					<!--end::Header-->

					<!--begin::Body-->
					<div class="card-body d-flex flex-column ps-4 pe-4 pb-4">
						<div class="d-flex justify-content-center align-items-center h-100">
							<div class="text-center">
								<h1 class="display-4 fw-bold text-primary mb-3"><?= $prodi ?></h1>
								<p class="fs-3 text-gray-600">Prodi Aktif</p>
							</div>
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Card Widget-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?= $this->endSection() ?>