<div class="container py-10">
    <h3 class="text-center fw-bold fs-2 mb-10 text-primary">RPL FLOW Politeknik LP3i Jakarta</h3>

    <div class="d-flex flex-wrap justify-content-center position-relative px-5">
        <style>
            .timeline-step {
                width: 120px;
                text-align: center;
                position: relative;
                z-index: 1;
            }

            .timeline-circle {
                width: 40px;
                height: 40px;
                line-height: 40px;
                border-radius: 50%;
                font-weight: bold;
                color: white;
                margin: 0 auto 10px;
            }

            .timeline-line {
                position: absolute;
                top: 20px;
                left: 50%;
                width: 100%;
                height: 2px;
                background-color: #ccc;
                z-index: 0;
            }

            .timeline-wrapper {
                position: relative;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                max-width: 1200px;
                margin: 0 auto;
            }

            .timeline-wrapper::before {
                content: '';
                position: absolute;
                top: 20px;
                left: 0;
                right: 0;
                height: 2px;
                background: #ccc;
                z-index: 0;
            }

            .timeline-icon {
                font-size: 24px;
                margin-top: -4px;
            }
        </style>

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
            1 => 'bg-success',
            2 => 'bg-info',
            3 => 'bg-danger',
            4 => 'bg-primary',
            5 => 'bg-danger',
            6 => 'bg-success',
            7 => 'bg-warning',
            8 => 'bg-success',
            9 => 'bg-info',
            10 => 'bg-dark',
            11 => 'bg-success',
            12 => 'bg-warning',
            13 => 'bg-danger',
            14 => 'bg-primary',
            15 => 'bg-dark',
            16 => 'bg-success',
            17 => 'bg-warning',
            18 => 'bg-secondary'
        ];
        ?>

        <div class="overflow-auto">
            <div class="d-flex flex-nowrap gap-4"></div>
            <div class="timeline-wrapper mb-5">
                <?php foreach ($steps as $index => $label): ?>
                    <div class="timeline-step">
                        <div class="timeline-circle <?= $colors[$index + 1] ?>">
                            <?= $index + 1 ?>
                        </div>
                        <?php if (in_array($label, ['Upload Portofolio', 'Assessment, Konversi'])): ?>
                            <a href="#" class="text-primary text-decoration-underline small"><?= $label ?></a>
                        <?php elseif ($label == 'Wisuda'): ?>
                            <div class="small">
                                <i class="bi bi-mortarboard timeline-icon"></i><br>Wisuda
                            </div>
                        <?php else: ?>
                            <div class="small"><?= $label ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>