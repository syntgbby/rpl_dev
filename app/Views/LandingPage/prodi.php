<!--begin::Container-->
<div class="container">
    <!--begin::Card-->
    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
        <!--begin::Card body-->
        <div class="card-body p-lg-20">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-10">
                <!--begin::Title-->
                <h3 class="fs-2hx text-gray-900 mb-5" id="prodi" data-kt-scroll-offset="{default: 100, lg: 250}">Daftar Prodi</h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Tabs content-->
            <div class="tab-content">
                <!--begin::Row-->
                <div class="row g-10">
                    <?php foreach ($prodi as $p) : ?>
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <div class="d-flex h-100 align-items-center">
                            <!--begin::Option-->
                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                <!--begin::Heading-->
                                <div class="mb-7 text-center">
                                    <?php if ($p['prodi_pict'] != null) : ?>
                                        <img src="<?= base_url('uploads/prodi/' . $p['prodi_pict']) ?>" alt="<?= $p['prodi_name'] ?>" class="img-fluid mb-5">
                                    <?php endif; ?>
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 mb-5 fw-boldest text-white"><?= $p['prodi_name'] ?></h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-gray-500 fw-semibold mb-5"><?= $p['prodi_descs'] ?></div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Select-->
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                                </div>
                                <!--end::Select-->
                            </div>
                            <!--end::Option-->
                        </div>
                    </div>
                    <!--end::Col-->
                    <?php endforeach; ?>
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