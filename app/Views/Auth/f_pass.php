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
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
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

                    <?php if (session()->getFlashdata('alert')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('alert') ?>
                        </div>
                    <?php endif; ?>

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Reset Password</h1>
                            </div>
                            <?= csrf_field() ?>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Enter your email" name="email" id="email" autocomplete="on" class="form-control bg-transparent" required />
                            </div>

                            <div class="fv-row mb-8">
                                <select name="question" id="question" class="form-select form-control bg-transparent" required>
                                    <option value="" disabled selected>Select Question</option>
                                    <option value="q1">What is your mother's maiden name?</option>
                                    <option value="q2">What was the name of your first pet?</option>
                                    <option value="q3">What is your favorite book?</option>
                                </select>                            
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Enter your answer" name="answer" id="answer" autocomplete="on" class="form-control bg-transparent" required />
                            </div>

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

            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(<?= base_url('assets/media/misc/auth-bg.png') ?>)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-5 mb-lg-10" src="<?= base_url('assets/media/misc/auth-screens.png') ?>" alt="" />
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center">Fast, Efficient and Productive</h1>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kt_sign_in_submit').on('click', function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();

            // Check if email or password is empty
            if (email == "" || password == "") {
                e.preventDefault(); // Prevent the form from submitting

                // Show SweetAlert2 if fields are empty
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Email and Password must be filled!'
                });
            } else {
                // Show the indicator and spinner
                $('.indicator-label').hide();
                $('.indicator-progress').show();

                // If fields are not empty, submit the form
                $('#kt_sign_in_form').submit();
                $('#kt_sign_in_submit').prop('disabled', true);

                var formData = new FormData();
                formData.append('email', email);
                formData.append('password', password);

                var actionUrl = '<?= base_url('login/authenticate') ?>'; // Ganti dengan URL yang sesuai

                // Kirim request AJAX
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('An error occurred while sending the request.');
                    }
                });
            }
        });
    });

</script>