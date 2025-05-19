<style>
    /* Navbar */
    .landing-header {
        background-color: #001f3f !important;
        /* biru tua */
        position: sticky;
        top: 0;
        z-index: 999;
    }

    /* Background Image Container */
    .landing-hero {
        background-image: url('assets/media/logos/politeknik.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        padding: 100px 0;
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Overlay layer if needed */
    .landing-hero .overlay-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(128, 128, 128, 0.8);
        /* warna abu-abu dengan opacity 70% */
        z-index: 2;
    }

    .landing-hero .button-container {
        position: relative;
        z-index: 3;
        padding: 30px 0;
        text-align: center;
    }
</style>
<!--begin::Wrapper-->
<div class="landing">
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
                        <img alt="Logo" src="<?= base_url('assets/media/logos/logo.svg') ?>" class="logo-sticky h-35px h-lg-40px" />
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
    <div class="landing-hero">
        <div class="overlay-layer"></div>
        <div class="container text-center text-white position-relative mb-5" style="z-index: 3;">
            <h3 class="fs-2hx text-white mb-5">Program RPL (Rekognisi Pembelajaran Lampau)</h3>
            <div class="fs-5 fw-semibold">
                LP3I Hadir Sebagai Lembaga Pendidikan yang akan menjadi #temansetia
                <br />untukmu dalam mempersiapkan karir profesional impian masa depan!
            </div>
        </div>
        <!--begin::Description-->
        <div class="container text-center text-white position-relative mb-5" style="z-index: 3;">
            <!--begin::Text-->
            <div class="fs-5 fw-semibold mb-8">Politeknik LP3I Jakarta merupakan pendidikan tinggi vokasi khusus bidang Bisnis & Teknologi yang menggunakan konsep Link & Match dengan dunia usaha dan dunia industri berfokus pada penyiapan kompetensi dan Penempatan Kerja.
                <a href="https://www.lp3i.ac.id/" class="link-primary pe-1">LP3I</a>
            </div>
            <!--end::Text-->
            <!--begin::Text-->
            <div class="fs-5 fw-semibold">Rekognisi Pembelajaran Lampau merupakan satu proses pengakuan terhadap capaian pembelajaran seseorang yang diperoleh melalui pendidikan nonformal,informal, maupun pengalaman kerja. Konsep ini memberikan kesempatan kepada individu yang memiliki keahlian tertentu, namun tidak menempuh pendidikan
                formal di perguruan tinggi untuk tetap mendapatkan pengakuan atas kompentesinya dalam bentuk sertifat keahlian.</div>
            <!--end::Text-->
        </div>
        <div class="button-container">
            <a href="<?= base_url('statuspendaftaran') ?>" class="btn btn-light-primary btn-lg px-8">Daftar Sekarang</a>
        </div>
        <!--end::Description-->
    </div>
    <!--end::Landing hero-->
</div>
<!--end::Wrapper-->