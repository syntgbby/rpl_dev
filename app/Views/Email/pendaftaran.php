<?php
/**
 * Template Email Pendaftaran
 */

$title = 'Selamat Datang di RPL LP3I';
$subject = 'Konfirmasi Pendaftaran RPL LP3I';

$content = '
<p>Halo <strong>' . ($nama ?? 'Calon Mahasiswa') . '</strong>,</p>

<p>Terima kasih telah mendaftar di Program RPL LP3I. Berikut adalah detail pendaftaran Anda:</p>

<ul>
    <li>Nama: ' . ($nama ?? '-') . '</li>
    <li>Tanggal Pendaftaran: ' . ($tanggal ?? date('d/m/Y')) . '</li>
</ul>

<p>Langkah selanjutnya yang perlu Anda lakukan:</p>
<ol>
    <li>Upload portofolio Anda melalui dashboard pendaftaran</li>
    <li>Lakukan pembayaran assessment sesuai dengan instruksi yang diberikan</li>
    <li>Tunggu jadwal assessment yang akan diinformasikan melalui email</li>
</ol>

<p>Jika Anda memiliki pertanyaan, silakan hubungi kami melalui:</p>
<ul>
    <li>Email: rpl@lp3i.ac.id</li>
    <li>WhatsApp: 0812-3456-7890</li>
</ul>

<p>Terima kasih atas kepercayaan Anda memilih RPL LP3I.</p>

<p>Salam,<br>
Tim RPL LP3I</p>
';

$footer = '© ' . date('Y') . ' RPL LP3I. Email ini dikirim secara otomatis, mohon tidak membalas email ini.';

// Load template utama
return view('Email/template', [
    'title' => $title,
    'subject' => $subject,
    'content' => $content,
    'footer' => $footer
]); 