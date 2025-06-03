<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper -->
<div class="d-flex flex-column flex-column-fluid">
<!-- Content -->
<div id="kt_app_content" class="app-content">
<!-- Row utama -->
<div class="row gx-5">
    <!-- Kolom kiri: Foto + info user -->
    <div class="col-md-3 mb-5">
        <div class="card card-flush h-100 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-10">
                <div class="symbol symbol-100px symbol-circle mb-5">
                    <img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" />
                </div>
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">Selamat Datang</a>
                <div class="badge badge-lg badge-light-primary d-inline">User Aplikan</div>
            </div>
        </div>
    </div>

    <!-- Kolom kanan: hanya Detail Pendaftaran -->
    <div class="col-md-9">
        <div class="row gx-5">
            <!-- Detail Pendaftaran -->
            <div class="col-md-12 mb-5">
                <div class="card card-flush h-100">
                    <div class="card-header py-5">
                        <h3 class="card-title">Detail Pendaftaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-user fs-2 text-primary"></i>
                                </div>
                                <div class="timeline-content">
                                    <span class="fw-bold text-gray-800">Pendaftaran</span>
                                    <p class="text-gray-600">Data calon mahasiswa telah berhasil didaftarkan.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-people fs-2 text-info"></i>
                                </div>
                                <div class="timeline-content">
                                    <span class="fw-bold text-gray-800">Assign Asesor</span>
                                    <p class="text-gray-600">Asesor telah ditugaskan untuk melakukan verifikasi dan validasi.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-check-circle fs-2 text-success"></i>
                                </div>
                                <div class="timeline-content">
                                    <span class="fw-bold text-gray-800">Approve RPL</span>
                                    <p class="text-gray-600">Pengakuan pembelajaran lampau (RPL) telah disetujui oleh asesor.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-certificate fs-2 text-success"></i>
                                </div>
                                <div class="timeline-content">
                                    <span class="fw-bold text-gray-800">Penerimaan Mahasiswa</span>
                                    <span class="badge badge-light-success ms-2">Diterima</span>
                                    <p class="text-gray-600">Calon mahasiswa resmi diterima sebagai mahasiswa aktif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end Detail Pendaftaran -->
        </div> <!-- end row -->
    </div> <!-- end col-md-9 -->
</div> <!-- end main row -->

</div> <!-- end content -->
</div> <!-- end content wrapper -->

<?= $this->endSection() ?>
