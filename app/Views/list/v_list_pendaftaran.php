<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
				
	<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
		<div id="kt_app_toolbar" class="app-toolbar py-6">
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
				<div class="d-flex flex-column flex-row-fluid">
					<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
						<div class="page-title d-flex align-items-center me-3">
							<img alt="Logo" src="<?= base_url('assets/img/logo.png') ?>" class="h-60px me-5" />
							<h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Daftar Mata Kuliah RPL 
							<span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4 text-truncate" style="max-width: 450px;">RPL Tipe A Program Studi Manajemen Informatika
								Direktorat: Gedung Sentra Kramat Blok A Jl. Kramat Raya No. 7-9, Jakarta, Phone: (021) 3190-5498, Fax (021) 3190-5499. Website:  www.plj.ac
							</span>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="app-container container-xxl">
			<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
				<div class="d-flex flex-column flex-column-fluid">
					<div id="kt_app_content" class="app-content">
						<!-- TABEL BARU -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="fs-2">
										<tr>
											<th class="text-center align-middle" rowspan="2" style="width: 50px;">No</th>
											<th class="text-center align-middle" rowspan="2">Kode Mata Kuliah</th>
											<th class="text-center align-middle" rowspan="2">Nama Mata Kuliah</th>
											<th class="text-center" colspan="2">Mengajukan RPL</th>
										</tr>
										<tr>
											<th class="text-center">Ya</th>
											<th class="text-center">Tidak</th>
										</tr>
									</thead>
									<tbody class="fs-5">
										<tr>
											<td class="text-center">1</td>
											<td>MK001</td>
											<td>Bahasa Inggris I</td>
											<!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="text-center">2</td>
											<td>MK002</td>
											<td>Desain Web</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td>MK003</td>
											<td>UI/UX Design</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="text-center">4</td>
											<td>MK004</td>
											<td>Database Administrator</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="d-flex justify-content-center">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
														<label class="form-check-label" for="flexCheckDefault"></label>
													</div>
												</div>
											</td>
										</tr>
										<!-- Tambahkan baris lain sesuai kebutuhan -->
									</tbody>
								</table>
							</div>


					</div>
				</div>
			</div>
			<div id="kt_app_footer" class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
				<div class="text-gray-900 order-2 order-md-1">
					<span class="text-muted fw-semibold me-1">2025&copy;</span>
					<a href="" target="_blank" class="text-gray-800 text-hover-primary">RPL</a>
				</div>
			</div>
		</div>
	</div>
	
<?= $this->endSection(); ?>