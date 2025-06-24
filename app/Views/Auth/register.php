<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>" />
    <link rel="icon" href="<?= base_url('assets/media/logos/logoLP3I.png') ?>" type="image/png" />
    <title>RPL - Admin by RPL</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>
</head>

<style>
    /* Navbar */
    .landing-header {
        background-color: #001f3f !important;
        /* biru tua */
        position: sticky;
        top: 0;
        z-index: 999;
    }
</style>

<body>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-md-row flex-column-fluid">
            <div class="d-flex flex-column flex-md-row-fluid w-md-50">
                <div class="landing">
                    <!--begin::Header-->
                    <div class="landing-header bg-dark" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
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
                                        <img alt="Logo" src="<?= base_url('assets/media/logos/logo.svg') ?>"
                                            class="logo-default h-35px h-lg-40px" />
                                        <img alt="Logo" src="<?= base_url('assets/media/logos/logo.svg') ?>"
                                            class="logo-sticky h-35px h-lg-40px" />
                                    </span>
                                    <!--end::Logo image-->
                                </div>
                                <!--end::Logo-->
                                <!--begin::Toolbar-->
                                <div class="flex-equal text-end ms-1">
                                    <button class="btn btn-success"
                                        onclick="window.location.href='<?= base_url('login') ?>'">LOGIN</button>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-md-row-fluid pt-10">
                        <div class="w-md-700px">
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

                            <form action="/register" method="POST" class="form w-100" id="kt_sign_up_form">
                                <div class="text-center mb-15">
                                    <h1 class="text-gray-900 fw-bolder mt-28">Pendaftaran Akun Baru</h1>
                                </div>
                                <?= csrf_field() ?>

                                <div class="fv-row mb-5">
                                    <div class="input-group input-group-lg">
                                        <input type="text" placeholder="Nama Lengkap" name="nama_lengkap"
                                            id="nama_lengkap" class="form-control" required />
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="input-group input-group-lg">
                                        <input type="email" placeholder="Email" name="email" id="email"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-lg mb-2">
                                                <span class="input-group-text">+62</span>
                                                <input type="number" name="telepon" id="telepon" class="form-control"
                                                    placeholder="Nomor Telepon" required />
                                            </div>
                                            <small class="form-text text-muted mt-1 p-2">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Nomor tanpa angka 0 di depan, contoh: 8123456789
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Tempat Lahir" required />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control" placeholder="Tanggal Lahir" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <select name="prodi_id" id="prodi_id" data-control="select2"
                                        class="form-control form-control-lg" data-placeholder="Pilih Program Studi"
                                        required>
                                        <option value="" disabled selected>Pilih Program Studi</option>
                                        <?php foreach ($prodi as $p): ?>
                                            <option value="<?= $p['id'] ?>"><?= $p['nama_prodi'] ?> -
                                                <?= $p['jenjang_pendidikan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="fv-row mb-5">
                                    <textarea placeholder="Alamat Domisili" name="alamat" id="alamat"
                                        class="form-control form-control-lg" placeholder="Alamat" required></textarea>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <input type="number" name="tahun_lulus" id="tahun_lulus" min="1900"
                                                max="<?= date('Y') ?>" class="form-control"
                                                placeholder="Tahun Kelulusan" required />
                                        </div>
                                        <div class="col-md-6">
                                            <select name="jenis_kelamin" id="jenis_kelamin" data-control="select2"
                                                class="form-control form-control-lg"
                                                data-placeholder="Pilih Jenis Kelamin" required>
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-3">
                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group input-group-lg mb-2">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="Password" required />
                                                <button class="btn btn-icon btn-light-primary" type="button"
                                                    id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <small class="form-text text-muted mt-1 p-2">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Password harus memiliki minimal 8 karakter
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-lg">
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    class="form-control" placeholder="Konfirmasi Password" required />
                                                <button class="btn btn-icon btn-light-primary" type="button"
                                                    id="toggleConfirmPassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                data-control="select2" class="form-control form-control-lg"
                                                data-placeholder="Pilih Pendidikan Terakhir" required>
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                                <option value="SMA">SMA</option>
                                                <option value="SMK">SMK</option>
                                                <option value="D3">D3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="nama_asal_sekolah" id="nama_asal_sekolah"
                                                class="form-control" placeholder="Nama Institusi/Sekolah Terakhir"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <select name="pertanyaan_id" id="pertanyaan_id"
                                                class="form-control form-control-lg" data-control="select2"
                                                data-placeholder="Pilih Pertanyaan Keamanan" required>
                                                <option value="" disabled selected>Pilih Pertanyaan Keamanan</option>
                                                <?php foreach ($pertanyaan as $p): ?>
                                                    <option value="<?= $p['id'] ?>"><?= $p['pertanyaan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Answer" name="jawaban" id="jawaban"
                                                class="form-control form-control-lg" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="fv-row mb-5">
                                    <select name="asal_informasi" id="asal_informasi"
                                        class="form-control form-control-lg mb-5" data-control="select2"
                                        data-placeholder="Dari mana anda mengetahui tentang RPL LP3I?" required>
                                        <option value="" disabled selected>Dari mana anda mengetahui tentang RPL LP3I?
                                        </option>
                                        <option value="Alumni">Mengetahui dari Alumni</option>
                                        <option value="Keluarga/Teman">Mengetahui dari Keluarga/Teman</option>
                                        <option value="Website">Mengetahui dari Website</option>
                                        <option value="Kunjungan_Sekolah">Mengetahui dari Kunjungan Sekolah</option>
                                        <option value="Iklan_Medsos">Mengetahui dari Iklan Media Sosial</option>
                                        <option value="Event">Mengetahui dari Event-Event LP3I</option>
                                        <option value="Lainnya" id="lainnya">Lainnya</option>
                                    </select>
                                    <input type="text" name="asal_informasi_lainnya" id="asal_informasi_lainnya"
                                        class="form-control form-control-lg"
                                        placeholder="Sebutkan dari mana anda mengetahui tentang RPL LP3I"
                                        style="display: none;" />
                                </div>
                                <div class="d-grid mb-5">
                                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                        <span class="indicator-label">Daftar Sekarang</span>
                                        <span class="indicator-progress">Mohon tunggu... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer Section-->
                    <div class="mb-0">
                        <!--begin::Curve top-->
                        <div class="landing-curve landing-dark-color">
                            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--end::Curve top-->
                        <!--begin::Wrapper-->
                        <div class="landing-dark-bg pt-20">
                            <!--begin::Container-->
                            <div class="container">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                                    <!--begin::Copyright-->
                                    <div class="d-flex align-items-center order-2 order-md-1">
                                        <!--begin::Logo-->
                                        <span href="landing.html">
                                            <img alt="Logo" src="<?= base_url('assets/media/logos/logo.svg') ?>"
                                                class="h-35px h-md-40px" />
                                        </span>
                                        <!--end::Logo image-->
                                        <!--begin::Logo image-->
                                        <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1">&copy; <?= date('Y') ?>
                                            PLJ - KRAMAT</span>
                                        <!--end::Logo image-->
                                    </div>
                                    <!--end::Copyright-->
                                    <!--begin::Menu-->
                                    <ul
                                        class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                                        <li class="menu-item">
                                            <a href="https://www.lp3ijkt.ac.id" target="_blank"
                                                class="menu-link px-2">Tentang LP3I</a>
                                        </li>
                                    </ul>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Footer Section-->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Validasi nomor telepon
        document.getElementById('telepon').addEventListener('input', function (e) {
            const telepon = this.value;
            if (telepon.startsWith('0')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format Nomor Telepon Salah!',
                    text: 'Nomor telepon tidak boleh dimulai dengan angka 0!',
                    confirmButtonColor: '#3085d6'
                });
                this.value = telepon.substring(1); // Hapus angka 0 di awal
            }
        });

        $('#kt_sign_up_form').on('submit', function (e) {
            const password = $('#password').val();
            const confirmPassword = $('#confirm_password').val();
            const $submitBtn = $('#kt_sign_up_submit');

            if (password.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Password Tidak Memenuhi Syarat!',
                    text: 'Password harus memiliki minimal 8 karakter!',
                    confirmButtonColor: '#3085d6'
                });
                return false;
            }

            if (password !== confirmPassword) {
                e.preventDefault(); // Stop form submission

                // Reset tombol
                $submitBtn.removeClass('loading');
                $submitBtn.find('.indicator-label').show();
                $submitBtn.find('.indicator-progress').hide();
                $submitBtn.prop('disabled', false); // Pastikan tombol aktif kembali

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
            $submitBtn.prop('disabled', true); // ✅ Disable tombol di sini$submitBtn.prop('disabled', true); // ✅ Disable tombol di sini
        });

        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            const confirmPasswordInput = document.getElementById('confirm_password');
            const icon = this.querySelector('i');

            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('asal_informasi').addEventListener('change', function () {
            const asalInformasi = this.value;
            const lainnyaInput = document.getElementById('asal_informasi_lainnya');

            if (asalInformasi === 'Lainnya') {
                lainnyaInput.style.display = 'block';
            } else {
                lainnyaInput.style.display = 'none';
            }
        });

        $('.select2').select2({
            dropdownParent: $('.select2').parent()
        });

        $(document).ready(function () {
            $('#asal_informasi').on('change', function () {
                if ($(this).val() === 'Lainnya') {
                    $('#asal_informasi_lainnya').show().attr('required', true);
                } else {
                    $('#asal_informasi_lainnya').hide().removeAttr('required').val('');
                }
            });
        });
    </script>
</body>

</html>