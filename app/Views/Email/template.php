<?php
/**
 * Template Email
 * 
 * Variabel yang tersedia:
 * - $title: Judul email
 * - $subject: Subject email
 * - $content: Isi pesan email
 * - $footer: Footer email (opsional)
 */

// Subject email
$subject = $subject ?? 'Notifikasi Sistem RPL LP3I';

// Template HTML email
$message = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #009ef7;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #009ef7;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>' . $title . '</h2>
        </div>
        <div class="content">
            ' . $content . '
        </div>
        <div class="footer">
            ' . ($footer ?? '© ' . date('Y') . ' RPL LP3I. All rights reserved.') . '
        </div>
    </div>
</body>
</html>
';

return [
    'subject' => $subject,
    'message' => $message
]; 