<!--begin::Wrapper-->
<div class="pb-15 pt-18 landing-dark-bg">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Heading-->
        <div class="text-center mt-15 mb-18" id="flow" data-kt-scroll-offset="{default: 100, lg: 150}">
            <!--begin::Title-->
            <h3 class="fs-2hx text-white fw-bold mb-5">Alur RPL</h3>
            <!--end::Title-->
        </div>
        <!--end::Heading-->

        <!--begin::Flow-->
        <div class="d-flex flex-center justify-content-center">
            <div class="d-flex flex-wrap justify-content-center gap-6 bg-white p-8 rounded-4 shadow-sm" style="max-width: 1200px;">
                <?php
                $steps = [
                    'Pendaftaran RPL',
                    'Upload Portofolio',
                    'Pembayaran Assessment',
                    'Assessment, Konversi',
                    'Pembayaran Kuliah',
                    'Penerbitan NIM',
                    'Unduh Dokumen RPL',
                    'Penerbitan SK Penyetaraan',
                    'Pendaftaran Ke Sierra',
                    'Pembuatan Akun LMS',
                    'Proses KRS',
                    'Proses Kuliah',
                    'Pembayaran Tugas Akhir',
                    'Bimbingan',
                    'Sidang',
                    'Yudisium',
                    'Pembayaran Wisuda',
                    'Wisuda'
                ];

                $colors = [
                    1 => 'success',
                    2 => 'primary',
                    3 => 'danger',
                    4 => 'info',
                    5 => 'danger',
                    6 => 'primary',
                    7 => 'warning',
                    8 => 'success',
                    9 => 'info',
                    10 => 'info',
                    11 => 'success',
                    12 => 'warning',
                    13 => 'danger',
                    14 => 'info',
                    15 => 'primary',
                    16 => 'success',
                    17 => 'warning',
                    18 => 'dark'
                ];
                ?>

                <?php foreach ($steps as $index => $label): ?>
                    <div class="d-flex flex-column align-items-center text-center" style="width: 200px;">
                        <div class="symbol symbol-150px symbol-circle bg-<?= $colors[$index + 1] ?? 'light' ?> text-white fw-bold d-flex align-items-center justify-content-center mb-3">
                            <?= $index + 1 ?>
                        </div>
                        <div class="fw-semibold text-gray-800 fs-6"><?= $label ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--end::Flow-->
    </div>
    <!--end::Container-->
</div>
<!--end::Wrapper-->
