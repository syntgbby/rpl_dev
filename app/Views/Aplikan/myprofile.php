<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content">
		<!--begin::Navbar-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="assets/media/avatars/300-1.jpg" alt="image" />
							<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max Smith</a>
									<a href="#">
										<i class="ki-outline ki-verify fs-1 text-primary"></i>
									</a>
								</div>
								<!--end::Name-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
									<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
									<i class="ki-outline ki-profile-circle fs-4 me-1"></i>Developer</a>
									<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
									<i class="ki-outline ki-geolocation fs-4 me-1"></i>SF, Bay Area</a>
									<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
									<i class="ki-outline ki-sms fs-4"></i>max@kt.com</a>
								</div>
								<!--end::Info-->
							</div>
							<!--end::User-->
						</div>
						<!--end::Title-->
					
					</div>
					<!--end::Info-->
				</div>
				<!--end::Details-->
			
			</div>
		</div>
		<!--end::Navbar-->
		<!--begin::details View-->
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<!--begin::Card header-->
			<div class="card-header cursor-pointer">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Profile Details</h3>
				</div>
				<!--end::Card title-->
				<!--begin::Action-->
				<a href="<?=base_url('editprofile')?>" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
				<!--end::Action-->
			</div>
			<!--begin::Card header-->
			<!--begin::Card body-->
			<div class="card-body p-9">
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800"><?= $get['name'] ?></span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Tempat Tanggal Lahir </label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
					<span class="fw-bold fs-6 text-gray-800 me-2"><?=$get['tempat_lahir']?></span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted"> Tanggal Lahir </label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
					<span class="fw-bold fs-6 text-gray-800 me-6"><?=$get['tanggal_lahir']?></span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Jenis Kelamin
					<span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
						<i class="ki-outline ki-information fs-7"></i>
					</span></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 d-flex align-items-center">
						<span class="fw-bold fs-6 text-gray-800 me-2"><?=$get['jenis_kelamin']?></span>
						<!-- <span class="badge badge-success">Verified</span> -->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">No Telepon</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary"><?=$get['telepon'];?></a>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Agama
					<span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
						<i class="ki-outline ki-information fs-7"></i>
					</span></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800"><?=$get['agama'];?></span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Email</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800"><?=$get['email'];?></span>
					</div>
					<!--end::Col-->
				</div>
			
			
			</div>
			<!--end::Card body-->
		</div>
		<!--end::details View-->
	
	
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->

<?= $this->endSection() ?>