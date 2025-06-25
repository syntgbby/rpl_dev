<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Notifikasi Validasi Pendaftaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6fa;
            padding: 30px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: auto;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .header img {
            max-height: 60px;
            display: block;
            margin: 0 auto 20px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            color: #181C32;
            margin-bottom: 20px;
        }

        p {
            font-size: 15px;
            line-height: 1.6;
            color: #3F4254;
            margin: 10px 0;
        }

        .button {
            display: inline-block;
            background-color: #009ef7;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #A1A5B7;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="<?= base_url('assets/media/logos/logoLP3I.png') ?>" alt="Logo LP3I">
        </div>

        <div class="title">Notifikasi Validasi Pendaftaran RPL</div>

        <p>Halo Admin,</p>

        <p>Telah terjadi pendaftaran akun baru dalam sistem RPL dengan nama:</p>
        <p><strong><?= esc($nama) ?></strong> (Email: <strong><?= esc($email) ?></strong>)</p>

        <p>Mohon segera melakukan validasi terhadap bukti pembayaran yang telah diunggah oleh pengguna tersebut.</p>

        <p>Untuk melakukan validasi, silakan masuk ke panel admin pada sistem RPL.</p>

        <div class="footer">
            Terima kasih atas kerja sama dan dedikasinya.<br>
            &copy; <?= date('Y') ?> LP3I - Sistem RPL
        </div>
    </div>
</body>

</html>