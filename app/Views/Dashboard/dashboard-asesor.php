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
							Selamat Datang, <?= ucwords($user['name']) ?>
						</span>
					</div>
					<!--end::Title-->

					<!--begin::Action-->
					<div class="mb-3">
						<a href='<?= base_url('/editprofile') ?>' class="btn btn-danger fw-semibold me-2" data-bs-toggle=""
							data-bs-target="#kt_modal_upgrade_plan">
							Lengkapi Biodata Asesor
						</a>
					</div>
					<!--begin::Action-->
				</div>
				<!--begin::Wrapper-->

				<!--begin::Illustration-->
				<img src="<?= base_url('assets/img/17-dark.png') ?>"
					class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
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
						<!-- <div class="card-toolbar">
							<a href="#" class="btn btn-sm btn-light">Semua Prodi</a>
						</div> -->
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->

					<!--begin::Body-->
					<div class="card-body">
						<?php foreach ($prodi as $p): ?>
							<!--begin::PRODI MI-->
							<div class="d-flex flex-stack">
								<!--begin::Wrapper-->
								<div class="d-flex align-items-center me-3">
									<!--begin::Logo-->
									<img src="<?= base_url($p['pict']) ?>" class="me-4 w-30px" alt="" />
									<!--end::Logo-->

									<!--begin::Section-->
									<div class="flex-grow-1">
										<!--begin::Text-->
										<a href=""
											class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0"><?= $p['kategori'] ?></a>
										<!--end::Text-->

										<!--begin::Description-->
										<span class="text-gray-500 fw-semibold d-block fs-8"><?= $p['nama_prodi'] ?></span>
										<!--end::Description--->
								</div>
								<!--end::Section-->

								</div>
								<!--end::Wrapper-->

								<!--begin::Value-->
								<div class="text-gray-500 fw-semibold">
									<?= $p['jenjang_pendidikan'] ?>
								</div>
								<!--end::Value-->
							</div>
							<!--end::PRODI MI-->

						<?php endforeach ?>
						<!--begin::Separator-->
						<div class="separator separator-dashed my-3"></div>
						<!--end::Separator-->
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
							<span class="card-label fw-bold text-gray-800">Data Pendaftaran RPL</span>

							<span class="text-gray-500 mt-1 fw-semibold fs-6">7 hari terakhir</span>
						</h3>
						<!--end::Title-->

						<!--begin::Toolbar-->
						<!-- <div class="card-toolbar">
							<a href="/asesor/data-pendaftaran" class="btn btn-sm btn-light">Detail</a>
						</div> -->
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
										<th class="p-0 pb-3 min-w-175px text-center">Nama Lengkap</th>
										<th class="p-0 pb-3 min-w-100px text-center">Program Studi</th>
										<th class="p-0 pb-3 min-w-175px text-center">Status</th>
									</tr>
								</thead>
								<!--end::Table head-->

								<!--begin::Table body-->
								<tbody>
									<?php if (!empty($pendaftaran)): ?>
										<?php $no = 1; ?>
										<?php foreach ($pendaftaran as $row): ?>
											<tr>
												<td class="text-center">
													<?= $row['nama_lengkap'] ?>
												</td>
												<td class="text-center">
													<?= $row['nama_prodi'] ?>
												</td>
												<td class="text-center">
													<?php if ($row['status_pendaftaran'] == 'rejected'): ?>
														<span class="badge bg-danger text-white">Ditolak</span>
													<?php elseif ($row['status_pendaftaran'] == 'approved'): ?>
														<span class="badge bg-success text-white">Disetujui</span>
													<?php else: ?>
														<span class="badge bg-warning text-white">Disubmit</span>
													<?php endif; ?>
												</td>

											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
									<?php endif; ?>
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