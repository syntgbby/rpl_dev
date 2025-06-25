<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Notifikasi Pendaftaran Akun</title>
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

        <div class="title">Pendaftaran Akun RPL Berhasil ✅</div>

        <p>Halo <strong><?= esc($nama) ?></strong>,</p>

        <p>Selamat! Akun Anda telah berhasil terdaftar.
        </p>

        <p>Bukti pembayaran Anda sedang kami cek terlebih dahulu ya.<br>
            Setelah validasi selesai, Anda bisa login ke sistem RPL seperti biasa 😊</p>

        <p>Jika ada pertanyaan lebih lanjut, silakan hubungi admin kampus kami.</p>

        <div class="footer">
            Terima kasih telah menggunakan sistem RPL kami.<br>
            &copy; <?= date('Y') ?> LP3I - Sistem RPL
        </div>
    </div>
</body>

</html>