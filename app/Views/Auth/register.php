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
                        <form class="form w-100" id="kt_sign_up_form">
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mt-28">Sign Up</h1>
                            </div>
                            <?= csrf_field() ?>

                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Name" name="name" id="name" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="email" placeholder="Email" name="email" id="email" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" id="password" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-10">
                                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-5">
                                <select name="question" id="question" class="form-select form-control bg-transparent" required>
                                    <option value="" disabled selected>Select Question</option>
                                    <option value="q1">What is your mother's maiden name?</option>
                                    <option value="q2">What was the name of your first pet?</option>
                                    <option value="q3">What is your favorite book?</option>
                                </select>
                            </div>
                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Answer" name="answer" id="answer" class="form-control bg-transparent" required />
                            </div>
                            <div class="d-grid mb-2">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign Up</span>
                                    <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-center fw-semibold fs-6">
                                Already a Member? <a href="<?= base_url('/login') ?>" class="link-primary">Sign in</a>
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
        $(document).ready(function() {
            $('#kt_sign_up_form').on('submit', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let confirm_password = $('#confirm_password').val();
                let question = $('#question').val();
                let answer = $('#answer').val();

                if (!name || !email || !password || !confirm_password || !question || !answer) {
                    Swal.fire({icon: 'error', title: 'Oops...', text: 'All fields must be filled!'});
                    return;
                }
                if (password !== confirm_password) {
                    Swal.fire({icon: 'error', title: 'Oops...', text: 'Passwords do not match!'});
                    return;
                }
                $('#kt_sign_up_submit').prop('disabled', true);
                $('.indicator-label').hide();
                $('.indicator-progress').show();
                
                $.ajax({
                    url: '<?= base_url('register/register') ?>',
                    type: 'POST',
                    data: { name, email, password, question, answer },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({icon: 'success', title: 'Registration Successful', text: response.message})
                                .then(() => window.location.href = '<?= base_url('/login') ?>');
                        } else {
                            Swal.fire({icon: 'error', title: 'Error', text: response.message});
                        }
                    },
                    error: function() {
                        Swal.fire({icon: 'error', title: 'Error', text: 'An error occurred while sending the request.'});
                    },
                    complete: function() {
                        $('#kt_sign_up_submit').prop('disabled', false);
                        $('.indicator-label').show();
                        $('.indicator-progress').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>