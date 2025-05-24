<!--begin::Wrapper-->
<div class="pb-15 pt-18 landing-dark-bg">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Heading-->
        <div class="text-center mt-15 mb-18" id="flow" data-kt-scroll-offset="{default: 100, lg: 150}">
            <!--begin::Title-->
            <h3 class="fs-2hx text-white fw-bold mb-5">Gelombang Pendaftaran</h3>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
        <!--begin::Statistics-->
        <?php if ($gelombang): ?>
            <div class="d-flex flex-wrap justify-content-center mb-15 mx-auto w-100" style="max-width: 900px;">
                <?php foreach ($gelombang as $g): ?>
                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain p-5 text-center"
                        style="background-image: url('assets/media/svg/misc/octagon.svg'); background-size: cover;">
                        <span class="text-white fw-semibold fs-5 mb-5">
                            <?= $g['nama_gelombang']; ?>
                        </span>
                        <!--begin::Info-->
                        <div class="mt-3 text-gray-400 fw-semibold text-center mb-3">
                            <?= tanggal_indo($g['tanggal_mulai']); ?> <br> - <br>
                            <?= tanggal_indo($g['tanggal_selesai']); ?>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                <?php endforeach ?>
            </div>
        <?php endif ?>

    </div>
    <!--end::Container-->
</div>
<!--end::Wrapper-->