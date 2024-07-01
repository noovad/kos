<?php

function generateDueDate($startDate): string
{
    $date = new DateTime($startDate);
    $currentMonth = new DateTime();
    $currentMonth->modify('+1 month');
    $year = $currentMonth->format('Y');
    $month = $currentMonth->format('m');
    $date->setDate($year, $month, 1);
    $lastDayOfMonth = $date->format('t');
    $day = min((new DateTime($startDate))->format('d'), $lastDayOfMonth);
    $date->setDate($year, $month, $day);
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

    return $months[$month].' '.$year;
}

function compareDate(?string $dateString): bool
{
    if ($dateString === null) {
        return false;
    }

    // $dateString = "2024-06-14";
    // Mendapatkan bulan dan tanggal dari string
    $date = DateTime::createFromFormat('Y-m-d', $dateString);
    // $month = $date->format('n');
    $day = $date->format('j');

    // Mendapatkan bulan dan tanggal saat ini
    // $currentMonth = date('n');
    $currentDay = date('j');

    // Membandingkan bulan dan tanggal
    return $day == $currentDay;
}
