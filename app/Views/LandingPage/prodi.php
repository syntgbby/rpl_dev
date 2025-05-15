<!--begin::Container-->
<div class="container">
    <!--begin::Card-->
    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
        <!--begin::Card body-->
        <div class="card-body p-lg-20">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-10">
                <!--begin::Title-->
                <h3 class="fs-2hx text-gray-900 mb-5" id="prodi" data-kt-scroll-offset="{default: 100, lg: 250}">Daftar
                    Prodi</h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Tabs content-->
            <div class="tab-content">
                <!--begin::Row-->
                <div class="row g-10">
                    <?php if ($prodi): ?>
                        <?php foreach ($prodi as $p): ?>
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <?php if ($p['pict'] != null): ?>
                                                <img src="<?= $p['pict'] ?>" alt="<?= $p['nama_prodi'] ?>"
                                                    class="img-fluid mb-5">
                                            <?php endif; ?>
                                            <!--begin::Title-->
                                            <h1 class="text-gray-900 mb-5 fw-boldest text-white">
                                                <?= $p['nama_prodi'] ?>
                                            </h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-500 fw-semibold mb-5">
                                                <?= $p['deskripsi_singkat'] ?>
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Select-->
                                        <div class="text-center">
                                            <button href="#" class="btn btn-primary" id="detailProdi">
                                                Baca Selengkapnya</button>
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
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

<div class="modal fade" id="detailProdiModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailProdiTitle">Detail <?= $p['nama_prodi'] ?></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($p['pict'] != null): ?>
                                    <img src="<?= $p['pict'] ?>" alt="<?= $p['nama_prodi'] ?>"
                                        class="img-fluid rounded-3"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="modal-title"><?= $p['nama_prodi'] ?></h5>
                            </div>
                            <div class="col-md-12">
                                <p class="modal-description"><?= $p['deskripsi_singkat'] ?></p>
                            </div>
                            <div class="col-md-12">
                                <p class="modal-description"><?= $p['deskripsi_lengkap'] ?></p>
                                <p class="modal-description"><?= $p['jenjang_karir'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="minatProdi">
                    Minat
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#detailProdi').click(function() {
            $('#detailProdiModal').modal('show');
        });

        $('#minatProdi').click(function() {
            Swal.fire({
                title: 'Minat',
                text: 'Apakah anda yakin ingin menjadi mahasiswa <?= $p['nama_prodi'] ?>?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('login') ?>';
                }
            });
        });
    });
</script>
