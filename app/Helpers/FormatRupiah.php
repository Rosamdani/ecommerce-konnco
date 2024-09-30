<?php

namespace App\Helpers;

class FormatRupiah
{
    public static function format($angka)
    {
        $hasil = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil;
    }
}