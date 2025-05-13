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
								Status Pendaftaran Aplikan
							</h4>
							<!--end::Title-->
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body d-flex flex-column ps-4 pe-4 pb-4">
						<canvas id="aplikanChart" style="width: 50%; height: 50%;"></canvas>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Card Widget-->
			</div>
			<!--end::Col-->

			<!--begin::Col-->
			<div class="col-md-6 mb-5 mb-lg-6">
				<!--begin::Card Widget-->
				<div class="card card-flush h-xl-400">
					<!--begin::Header-->
					<div class="card-header">
						<div class="d-flex justify-content-center align-items-center">
							<!--begin::Title-->
							<h4 class="card-title text-center">
								Jumlah Asesor Aktif
							</h4>
							<!--end::Title-->
						</div>
					</div>
					<!--end::Header-->

					<!--begin::Body-->
					<div class="card-body d-flex flex-column ps-4 pe-4 pb-4">
						<div class="d-flex justify-content-center align-items-center h-100">
							<div class="text-center">
								<h1 class="display-4 fw-bold text-primary mb-3"><?= $asesor ?></h1>
								<p class="fs-3 text-gray-600">Asesor Aktif</p>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Data untuk diagram pie
	const aplikanData = <?= json_encode($sdhMendaftar) ?>;
	const totalAplikan = <?= $totalAplikan ?>;
	
	// Hitung jumlah aplikan berdasarkan status
	const statusCount = {
		'Sudah Mendaftar': aplikanData.length,
		'Belum Mendaftar': totalAplikan - aplikanData.length
	};

	// Siapkan data untuk Chart.js
	const labels = Object.keys(statusCount);
	const data = Object.values(statusCount);
	const backgroundColors = [
		'#FF6384', // Merah untuk belum mendaftar
		'#36A2EB'  // Biru untuk sudah mendaftar
	];

	// Buat diagram pie
	const ctx = document.getElementById('aplikanChart').getContext('2d');
	new Chart(ctx, {
		type: 'pie',
		data: {
			labels: labels,
			datasets: [{
				data: data,
				backgroundColor: backgroundColors,
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			plugins: {
				legend: {
					position: 'bottom'
				},
				tooltip: {
					callbacks: {
						label: function(context) {
							const label = context.label || '';
							const value = context.raw || 0;
							const percentage = Math.round((value / totalAplikan) * 100);
							return `${label}: ${value} (${percentage}%)`;
						}
					}
				}
			}
		}
	});
});
</script>

<?= $this->endSection() ?>