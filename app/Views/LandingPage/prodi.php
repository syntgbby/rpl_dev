<!--begin::Container-->
<div class="container">
    <!--begin::Card-->
    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
        <!--begin::Card body-->
        <div class="card-body p-lg-20">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-10">
                <h3 class="fs-2hx text-gray-900 mb-5" id="prodi">Daftar Prodi</h3>
            </div>
            <!--end::Heading-->

            <!--begin::Tabs content-->
            <div class="tab-content">
                <!--begin::Row-->
                <div class="row g-4">
                    <?php if ($prodi): ?>
                        <?php foreach ($prodi as $p): ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="d-flex flex-column h-100 justify-content-between rounded-3 bg-body p-5 shadow-sm">
                                    <!-- Gambar -->
                                    <?php if ($p['pict'] != null): ?>
                                        <img src="<?= base_url($p['pict']) ?>" alt="<?= $p['nama_prodi'] ?>"
                                            class="img-fluid mb-4 rounded mx-auto d-block"
                                            style="max-height: 150px; object-fit: contain;">
                                    <?php endif; ?>

                                    <!-- Nama Prodi -->
                                    <h5 class="text-gray-900 text-center fw-bold mb-2"><?= $p['nama_prodi'] ?></h5>
                                    <!-- Tombol -->
                                    <div class="text-center mt-auto">
                                        <button class="btn btn-primary w-100 detailProdiBtn" data-nama="<?= $p['nama_prodi'] ?>"
                                            data-singkat="<?= $p['deskripsi_singkat'] ?>"
                                            data-lengkap="<?= $p['deskripsi_lengkap'] ?>"
                                            data-karir="<?= $p['jenjang_karir'] ?>" data-pict="<?= base_url($p['pict']) ?>">
                                            Baca Selengkapnya
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Tabs content-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Container-->

<!-- Modal -->
<div class="modal fade" id="detailProdiModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailProdiTitle">Detail Prodi</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <img id="modalPict" src="" alt="Logo" class="img-fluid"
                            style="max-height: 180px; object-fit: contain;">
                    </div>
                    <div class="col-md-8">
                        <h5 id="modalNamaProdi" class="fw-bold mb-3"></h5>
                        <p id="modalSingkat" class="mb-2"></p>
                        <p id="modalLengkap" class="mb-2"></p>
                        <p id="modalKarir" class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event saat klik tombol detail prodi
    $(document).ready(function () {
        $('.detailProdiBtn').on('click', function () {
            const nama = $(this).data('nama');
            const singkat = $(this).data('singkat');
            const lengkap = $(this).data('lengkap');
            const karir = $(this).data('karir');
            const pict = $(this).data('pict');

            $('#modalNamaProdi').text(nama);
            $('#modalSingkat').text(singkat);
            $('#modalLengkap').text(lengkap);
            $('#modalKarir').text(karir);
            $('#modalPict').attr('src', pict);

            $('#detailProdiModal').modal('show');
        });
    });
</script>