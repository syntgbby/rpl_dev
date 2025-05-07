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