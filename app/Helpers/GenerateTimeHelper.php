<?php

function generateDueDate($startDate): string
{
     // Membuat objek DateTime dari tanggal awal
     $date = new DateTime($startDate);

     // Mendapatkan bulan saat ini
     $currentMonth = new DateTime();

     // Mengubah bulan pada objek DateTime ke bulan saat ini ditambah satu
     $currentMonth->modify('+1 month');
     $year = $currentMonth->format('Y');
     $month = $currentMonth->format('m');

     // Mengatur tanggal ke 1 pada bulan baru untuk mendapatkan hari terakhir bulan tersebut
     $date->setDate($year, $month, 1);
     $lastDayOfMonth = $date->format('t');

     // Jika tanggal awal lebih besar dari hari terakhir bulan baru, gunakan hari terakhir bulan baru
     $day = min((new DateTime($startDate))->format('d'), $lastDayOfMonth);

     // Atur kembali tanggal dengan tahun, bulan, dan hari yang telah disesuaikan
     $date->setDate($year, $month, $day);

     // Format tanggal hasil sesuai kebutuhan (misalnya Y-m-d)
     $newDate = $date->format('Y-m-d');

     return $newDate;
}

function dateNow(): string
{
     $month = date('n');
     $year = date('Y');
     
     $months = [
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
         12 => 'Desember',
     ];
     
     return $months[$month] . ' ' . $year;
}
