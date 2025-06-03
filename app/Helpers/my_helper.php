<?php

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $pecah = explode('-', $tanggal); // Format: Y-m-d
        if (count($pecah) !== 3) {
            return $tanggal; // return original if format is invalid
        }

        return $pecah[2] . ' ' . $bulan[(int) $pecah[1]] . ' ' . $pecah[0];
    }
}

if (!function_exists('format_tanggal')) {
    function format_tanggal($datetime)
    {
        $bulanIndo = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        if (!$datetime) return '-';

        $timestamp = strtotime($datetime);
        $day = date('j', $timestamp); // tanpa leading zero
        $month = $bulanIndo[date('m', $timestamp)];
        $year = date('Y', $timestamp);
        $time = date('H:i', $timestamp);

        return "$day $month $year, $time";
    }
}