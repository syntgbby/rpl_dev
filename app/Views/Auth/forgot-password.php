<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>" />
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
                        <?php endif; ?>

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="/forgot-password"
                            method="post">
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Reset Password</h1>
                            </div>
                            <?= csrf_field() ?>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Masukkan Email" name="email" id="email"
                                    autocomplete="on" class="form-control bg-transparent" required />
                            </div>

                            <!-- <div class="fv-row mb-8">
                                <select name="question" id="question" class="form-select form-control bg-transparent"
                                    data-control="select2" data-placeholder="Pilih Pertanyaan" required>
                                    <option value="" disabled selected>Pilih Pertanyaan</option>
                                    <?php foreach ($pertanyaan as $p): ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['pertanyaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Masukkan Jawaban" name="answer" id="answer"
                                    autocomplete="on" class="form-control bg-transparent" required />
                            </div> -->

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary" name="login">
                                    <span class="indicator-label">Reset Password</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
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
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center">Fast, Efficient and Productive
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reset Password -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="/reset-password" method="post">
                <?= csrf_field() ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ganti Password Baru</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Konfirmasi Email"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="new_password" class="form-control" placeholder="Password baru"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Ulangi password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

<script>
    $('#email').on('blur', function () {
        let email = $(this).val();
        if (email !== '') {
            $.ajax({
                url: '<?= base_url('cek-role-by-email') ?>',
                method: 'POST',
                data: { email: email },
                success: function (res) {
                    if (res.role === 'aplikan') {
                        $('#question').closest('.mb-8').show();
                        $('#answer').closest('.mb-8').show();
                    } else {
                        $('#question').closest('.mb-8').hide();
                        $('#answer').closest('.mb-8').hide();
                    }
                }
            });
        }
    });
</script>