<!--begin::Container-->
<div class="container">
    <!--begin::Card-->
    <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
        <!--begin::Card body-->
        <div class="card-body p-lg-20">

            <div class="container py-10">
                <h3 class="text-center fw-bold fs-2 mb-10 text-primary">RPL FLOW Politeknik LP3I Jakarta</h3>

                <div class="d-flex flex-wrap justify-content-center position-relative px-5">
                    <style>
                        .timeline-wrapper {
                            position: relative;
                            display: flex;
                            flex-wrap: nowrap;
                            justify-content: flex-start;
                            padding-bottom: 40px;
                        }

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
                            top: 30px;
                            /* tengah lingkaran */
                            left: 0;
                            height: 2px;
                            background-color: #ccc;
                            z-index: 0;
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

                    $totalSteps = count($steps);
                    $stepWidth = 120; // sesuai .timeline-step width
                    $gap = 16; // dari me-4 (margin end)
                    // $totalWidth = ($stepWidth + $gap) * ($totalSteps - 1);
                    ?>

                    <div class="overflow-auto">
                        <div class="d-flex flex-nowrap gap-4"></div>
                        <div class="timeline-scroll-container">
                            <div class="timeline-wrapper mb-5 position-relative">
                                <div class="timeline-line" style="width: <?= $gap ?>px;"></div>
                                <?php foreach ($steps as $index => $label): ?>
                                    <div class="timeline-step p-2 me-4">
                                        <div class="timeline-circle <?= $colors[$index + 1] ?>">
                                            <?= $index + 1 ?>
                                        </div>
                                        <div class="small"><?= $label ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>