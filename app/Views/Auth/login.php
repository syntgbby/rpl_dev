<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>" />
    <link rel="icon" href="<?= base_url('assets/media/logos/logoLP3I.png') ?>" type="image/png" />
    <title>PLJ - KRAMAT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="PLJ - KRAMAT" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
</head>

<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-md-row flex-column-fluid">
            <div class="d-flex flex-column flex-md-row-fluid w-md-50">
                <div class="d-flex flex-center flex-column flex-md-row-fluid">
                    <div class="w-md-500px">
                        <?php if (session()->getFlashdata('success')): ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: '<?= session()->getFlashdata('success') ?>',
                                    confirmButtonColor: '#3085d6',
                                });
                            </script>
                        <?php elseif (session()->getFlashdata('error')): ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '<?= session()->getFlashdata('error') ?>',
                                    confirmButtonColor: '#d33',
                                });
                            </script>
                        <?php elseif (session()->getFlashdata('info')): ?>
                            <script>
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Informasi',
                                    text: '<?= session()->getFlashdata('info') ?>',
                                    confirmButtonColor: '#3085d6',
                                });
                            </script>
                        <?php endif; ?>

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="/login"
                            method="post">
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Halaman Login</h1>
                            </div>
                            <?= csrf_field() ?>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Enter your email" name="email" id="email"
                                    autocomplete="on" class="form-control bg-transparent" required />
                            </div>

                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Enter your password" name="password" id="password"
                                    autocomplete="off" class="form-control bg-transparent" required />
                            </div>

                            <!-- <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="<?= base_url('forgot-password') ?>" class="link-primary">Lupa Password?</a>
                            </div> -->

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary" name="login">
                                    <span class="indicator-label">Masuk</span>
                                    <span class="indicator-progress">Mohon tunggu...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                            <div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun?
                                <a href="<?= base_url('register') ?>" class="link-primary">Daftar Sekarang</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(<?= base_url('assets/media/misc/auth-bg.png') ?>)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-5 mb-lg-10"
                        src="<?= base_url('assets/media/misc/auth-screens.png') ?>" alt="" />
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center">
                        Cepat, Efisien dan Produktif
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#kt_sign_in_form').on('submit', function (e) {
            const email = $('#email').val().trim();
            const password = $('#password').val().trim();
            const $submitBtn = $('#kt_sign_in_submit');

            if (!email || !password) {
                e.preventDefault();

                // Reset loading state
                $submitBtn.removeClass('loading');
                $submitBtn.find('.indicator-label').show();
                $submitBtn.find('.indicator-progress').hide();
                $submitBtn.prop('disabled', false); // Pastikan tombol aktif kembali

                Swal.fire({
                    icon: 'error',
                    title: 'Missing Fields',
                    text: 'Please fill in both email and password!',
                    confirmButtonColor: '#3085d6'
                });

                return false;
            }

            // Tampilkan loading indicator
            $submitBtn.addClass('loading');
            $submitBtn.find('.indicator-label').hide();
            $submitBtn.find('.indicator-progress').show();
            $submitBtn.prop('disabled', true); // ✅ Disable tombol di sini$submitBtn.prop('disabled', true); // ✅ Disable tombol di sini
        });
    </script>
</body>

</html>