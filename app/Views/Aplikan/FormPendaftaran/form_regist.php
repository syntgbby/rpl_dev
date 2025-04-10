<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills d-flex flex-column" id="kt_stepper" style="overflow-x: auto;">
            <!--begin::Nav-->
            <div class="stepper-nav justify-content-center py-5">
                <!--begin::Step 1-->
                <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">1</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 1
                            </h3>

                            <div class="stepper-desc">
                                Identitas Diri
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">2</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 2
                            </h3>

                            <div class="stepper-desc">
                                Pelatihan Kerja
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">3</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 3
                            </h3>

                            <div class="stepper-desc">
                                Pengalaman Kerja
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 3-->
            </div>
            <!--end::Nav-->

            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" action="#" method="POST">
                <!--begin::Step 1 - Identitas Diri-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-1') ?>
                <!--end::Step 1-->

                <!--begin::Step 2 - Pelatihan Kerja-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-2') ?>
                <!--end::Step 2-->

                <!--begin::Step 3 - Pengalaman Kerja-->
                <?= $this->include('Aplikan/FormPendaftaran/Steps/step-3') ?>
                <!--end::Step 3-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Stepper-->
    </div>
</div>

<!--begin::Custom JS-->
<script>
    $(document).ready(function() {
        $('#kt_table_pk').DataTable();

        $('#addPK').click(function() {
            $('#modaltitle').html('Pengalaman Kerja');
            $('#modalbody').load("<?= base_url('view-add-pk') ?>");
            $('#modal').modal('show');
        });

        $('#savefrm').on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var tanggal_lahir = $('#tanggal_lahir').val();
            var jenis_kelamin = $('#jenis_kelamin').val();
            var alamat = $('#alamat').val();
            var provinsi = $('#provinsi').val();
            var kota = $('kota').val();
            var kota = $('riwayat_pendidikan').val();
            var kota = $('tempat_pendidikan').val();

            // Cek apakah semua field sudah diisi
            if (name == "" || email == "" || tanggal_lahir == "" || jenis_kelamin == "" || alamat == "" || provinsi == "" || kota == "" || riwayat_pendidikan == "" || tempat_pendidikan == "") {
                toastr.error('All fields must be filled!');
                return; // Jangan lanjutkan eksekusi
            }

            // Menyembunyikan indikator dan menampilkan spinner
            $('.indicator-label').hide();
            $('.indicator-progress').show();

            // Menonaktifkan tombol Save untuk mencegah klik ganda
            $('#savefrm').prop('disabled', true);

            var formData = {
                menu_cd: menu_cd,
                title: title,
                url: url,
                parent_menucd: parent_menucd,
                icon: icon,
                order_seq: order_seq,
                status: status
            };

            var actionUrl = '<?= base_url('add-master-menu') ?>'; // Ganti dengan URL yang sesuai

            // Kirim request AJAX
            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        location.reload(); // Reload halaman setelah berhasil
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while sending the request.');
                },
                complete: function() {
                    // Mengembalikan status tombol setelah selesai
                    $('#savefrm').prop('disabled', false);
                    $('.indicator-label').show();
                    $('.indicator-progress').hide();
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var stepper = new KTStepper(document.querySelector("#kt_stepper"));

        document.querySelectorAll("[data-kt-stepper-action='next']").forEach(button => {
            button.addEventListener("click", function() {
                stepper.goNext();
            });
        });

        document.querySelectorAll("[data-kt-stepper-action='previous']").forEach(button => {
            button.addEventListener("click", function() {
                stepper.goPrevious();
            });
        });
    });
</script>
<!--end::Custom JS-->

<?= $this->endSection() ?>