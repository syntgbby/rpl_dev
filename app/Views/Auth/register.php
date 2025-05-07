<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>" />
    <title>RPL - Admin by RPL</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css">
</head>

<body>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-md-row flex-column-fluid">
            <div class="d-flex flex-column flex-md-row-fluid w-md-50">
                <div class="d-flex flex-center flex-column flex-md-row-fluid">
                    <div class="w-md-500px">

                        <?php if (session()->getFlashdata('alert')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('alert') ?>
                            </div>
                        <?php endif; ?>

                        <form action="/register" method="POST" class="form w-100" id="kt_sign_up_form">
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mt-28">Sign Up</h1>
                            </div>
                            <?= csrf_field() ?>

                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Name" name="username" id="username"
                                    class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="email" placeholder="Email" name="email" id="email"
                                    class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-10">
                                <input type="password" placeholder="Confirm Password" name="confirm_password"
                                    id="confirm_password" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-5">
                                <select name="pertanyaan_id" id="pertanyaan_id"
                                    class="form-select form-control bg-transparent" required>
                                    <option value="" disabled selected>Select Question</option>
                                    <?php foreach ($pertanyaan as $p): ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['pertanyaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Answer" name="jawaban" id="jawaban"
                                    class="form-control bg-transparent" required />
                            </div>
                            <div class="d-grid mb-2">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign Up</span>
                                    <span class="indicator-progress">Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-center fw-semibold fs-6">
                                Already have an account? <a href="<?= base_url('/login') ?>" class="link-primary">Sign
                                    in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('#kt_sign_up_form').on('submit', function (e) {
            const password = $('#password').val();
            const confirmPassword = $('#confirm_password').val();
            const $submitBtn = $('#kt_sign_up_submit');

            if (password !== confirmPassword) {
                e.preventDefault(); // Stop form submission

                // Reset tombol
                $submitBtn.removeClass('loading');
                $submitBtn.find('.indicator-label').show();
                $submitBtn.find('.indicator-progress').hide();

                // Tampilkan alert
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'Password dan konfirmasi password tidak sama!',
                    confirmButtonColor: '#3085d6'
                });

                return false;
            }

            // Jika valid, aktifkan tombol loading
            $submitBtn.addClass('loading');
            $submitBtn.find('.indicator-label').hide();
            $submitBtn.find('.indicator-progress').show();
        });
    </script>

</body>

</html>