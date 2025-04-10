<!--begin::Wrapper-->
<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
    <!--begin::Header-->
    <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center justify-content-between">
                <!--begin::Logo-->
                <div class="d-flex align-items-center flex-equal">
                    <!--begin::Mobile menu toggle-->
                    <!-- <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2hx"></i>
                    </button> -->
                    <!--end::Mobile menu toggle-->
                    <!--begin::Logo image-->
                    <span href="landing.html">
                        <img alt="Logo" src="<?= base_url('assets/media/logos/logo.svg') ?>" class="logo-default h-35px h-lg-40px" />
                        <img alt="Logo" src="<?= base_url('assets/media/logos/logo-dark.svg') ?>" class="logo-sticky h-35px h-lg-40px" />
                    </span>
                    <!--end::Logo image-->
                </div>
                <!--end::Logo-->
                <!--begin::Toolbar-->
                <div class="flex-equal text-end ms-1">
                    <button class="btn btn-success" onclick="window.location.href='<?= base_url('login') ?>'">Sign In</button>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            <!--begin::Title-->
            <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">ALUR PENDAFTARAN RPL
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->
</div>
<!--end::Wrapper-->