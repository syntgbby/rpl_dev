<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<div id="kt_app_content" class="app-content">
		<div class="card border-transparent my-10" data-bs-theme="light" style="background-color:rgb(28, 49, 94);">
			<!--begin::Body-->
			<div class="card-body d-flex ps-xl-15">
				<!--begin::Wrapper-->
				<div class="m-0">
					<!--begin::Title-->
					<div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
						<span class="me-2">
							Selamat Datang Asesor
							<span class="position-relative d-inline-block text-danger">
								<a href="" class="text-danger opacity-75-hover">"....."</a>
							</span>
						</span>
					</div>
					<!--end::Title-->

					<!--begin::Action-->
					<div class="mb-3">
						<a href='#' class="btn btn-danger fw-semibold me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
							Lengkapi Biodata
						</a>
					</div>
					<!--begin::Action-->
				</div>
				<!--begin::Wrapper-->

				<!--begin::Illustration-->
				<img src="<?= base_url('assets/img/17-dark.png') ?>" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
				<!--end::Illustration-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Engage widget 4-->
		<!--begin::Row-->
		<div class="row g-5 g-xl-10">

			<!--begin::Col PRODI-->
			<div class="col-xl-4">

				<!--begin::List widget 21-->
				<div class="card card-flush h-xl-100">
					<!--begin::Header-->
					<div class="card-header border-0 pt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bold text-gray-900">Program Studi</span>

							<span class="text-muted mt-1 fw-semibold fs-7">D3 & Sarjana Terapan</span>
						</h3>

						<!--begin::Toolbar-->
						<div class="card-toolbar">
							<a href="#" class="btn btn-sm btn-light">All Lessons</a>
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->

					<!--begin::Body-->
					<div class="card-body pt-5">
						<!--begin::PRODI MI-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/technology.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Technology</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Manajemen Informatika</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::PRODI MI-->

						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->

						<!--begin::PRODI KA-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/finance.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Finance</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Komputerisasi Akuntansi</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::PRODI KA-->

						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->


						<!--begin::PRODI AB-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/business.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Business</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Administrasi Bisnis Internasional</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::Item-->

						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->

						<!--begin::PRODI ABI-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/business.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Business</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Administrasi Bisnis</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::Item-->

						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->

						<!--begin::PRODI BD-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/business.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Business</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Bisnis Digital</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::Item-->

						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->

						<!--begin::PRODI HM-->
						<div class="d-flex flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Logo-->
								<img src="<?= base_url('assets/img/communication.png') ?>" class="me-4 w-30px" alt="" />
								<!--end::Logo-->

								<!--begin::Section-->
								<div class="flex-grow-1">
									<!--begin::Text-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Communication</a>
									<!--end::Text-->

									<!--begin::Description-->
									<span class="text-gray-500 fw-semibold d-block fs-8">Hubungan Masyarakat</span>
									<!--end::Description--->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Wrapper-->

							<!--begin::Value-->
							<div class="text-gray-500 fw-semibold">
								10
							</div>
							<!--end::Value-->
						</div>
						<!--end::Item-->

					</div>
					<!--end::Body-->
				</div>
				<!--end::List widget 21-->
			</div>
			<!--end::Col PRODI-->

			<!--begin::Col-->
			<div class="col-xl-8">

				<!--begin::Table widget 14-->
				<div class="card card-flush h-md-100">
					<!--begin::Header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bold text-gray-800">Projects Stats</span>

							<span class="text-gray-500 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>
						</h3>
						<!--end::Title-->

						<!--begin::Toolbar-->
						<div class="card-toolbar">
							<a href="/metronic8/demo30/apps/ecommerce/catalog/add-product.html" class="btn btn-sm btn-light">History</a>
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->

					<!--begin::Body-->
					<div class="card-body pt-6">
						<!--begin::Table container-->
						<div class="table-responsive">
							<!--begin::Table-->
							<table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
								<!--begin::Table head-->
								<thead>
									<tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
										<th class="p-0 pb-3 min-w-175px text-start">NAMA LENGKAP</th>
										<th class="p-0 pb-3 min-w-175px text-start">EMAIL</th>
										<th class="p-0 pb-3 min-w-100px text-end">TANGGAL LAHIR</th>
										<th class="p-0 pb-3 min-w-175px text-end pe-20">NO TELP</th> 
										<th class="p-0 pb-3 w-50px text-end">VIEW</th>
									</tr>
								</thead>
								<!--end::Table head-->

								<!--begin::Table body-->
								<tbody>

									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="symbol symbol-50px me-3">
													<img src="/metronic8/demo30/assets/media/stock/600x600/img-49.jpg" class="" alt="" />
												</div>

												<div class="d-flex justify-content-start flex-column">
													<a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Mivy App</a>
													<span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
												</div>
											</div>
										</td>
										<td class="">
											<span class="text-gray-600 fw-bold fs-6">email@gmail.com</span>
										</td>
										<td>
											<span class="text-gray-600 fw-bold fs-6">01 Januari 2000</span>
										</td>
										<td class="text-end pe-12">
											<span class="text-gray-600 fw-bold fs-6">081234545685</span>
										</td>
										<td class="text-end">
											<a href="<?= base_url('asesor/data-pendaftaran')?>" class="btn btn-sm btn-icon btn-bg-primary btn-active-color-primary w-30px h-30px">
												<i class="ki-outline ki-black-right fs-2 text-white"></i> </a>
										</td>
									</tr>

									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="symbol symbol-50px me-3">
													<img src="/metronic8/demo30/assets/media/stock/600x600/img-49.jpg" class="" alt="" />
												</div>

												<div class="d-flex justify-content-start flex-column">
													<a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Mivy App</a>
													<span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
												</div>
											</div>
										</td>

										<td class="">
											<span class="text-gray-600 fw-bold fs-6">email@gmail.com</span>
										</td>
										<td>
											<span class="text-gray-600 fw-bold fs-6">01 Januari 2000</span>
										</td>
										<td class="text-end pe-12">
											<span class="text-gray-600 fw-bold fs-6">081234545685</span>
										</td>
										<td class="text-end">
											<a href="<?= base_url('asesor/data-pendaftaran')?>" class="btn btn-sm btn-icon btn-bg-primary btn-active-color-primary w-30px h-30px">
												<i class="ki-outline ki-black-right fs-2 text-white"></i> </a>
										</td>
									</tr>

									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="symbol symbol-50px me-3">
													<img src="/metronic8/demo30/assets/media/stock/600x600/img-49.jpg" class="" alt="" />
												</div>

												<div class="d-flex justify-content-start flex-column">
													<a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Mivy App</a>
													<span class="text-gray-500 fw-semibold d-block fs-7">Jane Cooper</span>
												</div>
											</div>
										</td>

										<td class="">
											<span class="text-gray-600 fw-bold fs-6">email@gmail.com</span>
										</td>
										<td>
											<span class="text-gray-600 fw-bold fs-6">01 Januari 2000</span>
										</td>
										<td class="text-end pe-12">
											<span class="text-gray-600 fw-bold fs-6">081234545685</span>
										</td>
										<td class="text-end">
											<a href="<?= base_url('asesor/data-pendaftaran')?>" class="btn btn-sm btn-icon btn-bg-primary btn-active-color-primary w-30px h-30px">
												<i class="ki-outline ki-black-right fs-2 text-white"></i> </a>
										</td>
									</tr>
								</tbody>
								<!--end::Table body-->
							</table>
						</div>
						<!--end::Table-->
					</div>
					<!--end: Card Body-->
				</div>
				<!--end::Table widget 14-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->

		<h3 class="card-title"></h3>
	</div>
	<!--end::Content wrapper-->
</div>

<?= $this->endSection() ?>