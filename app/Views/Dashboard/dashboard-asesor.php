<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<div id="kt_app_content" class="app-content">
		<div class="col-lg-6 col-xxl-4">
			<!--begin::Card-->
			<div class="card h-100">
				<!--begin::Card body-->
				<div class="card-body p-9">
					<div class="row">
						<div class="col-md-4 d-flex align-items-center justify-content-center">
							<i class="ki-duotone ki-profile-user text-primary fs-5x">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
							</i>
						</div>
						<div class="col-md-5">
							<!--begin::Heading-->
							<div class="fs-2hx fw-bold">237</div>
							<div class="fs-4 fw-semibold text-gray-500 mb-7">
								Calon Mahasiswa RPL
							</div>
							<!--end::Heading-->

							<!--begin::Wrapper-->
							<div class="d-flex flex-wrap">
								<!--begin::Labels-->
								<div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
									<!--begin::Label-->
									<div class="d-flex fs-6 fw-semibold align-items-center mb-3">
										<div class="bullet bg-primary me-3"></div>
										<div class="text-gray-500">Active</div>
										<div class="ms-auto fw-bold text-gray-700">30</div>
									</div>
									<!--end::Label-->

									<!--begin::Label-->
									<div class="d-flex fs-6 fw-semibold align-items-center mb-3">
										<div class="bullet bg-success me-3"></div>
										<div class="text-gray-500">Completed</div>
										<div class="ms-auto fw-bold text-gray-700">45</div>
									</div>
									<!--end::Label-->

									<!--begin::Label-->
									<div class="d-flex fs-6 fw-semibold align-items-center">
										<div class="bullet bg-gray-300 me-3"></div>
										<div class="text-gray-500">Pending</div>
										<div class="ms-auto fw-bold text-gray-700">25</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Labels-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>