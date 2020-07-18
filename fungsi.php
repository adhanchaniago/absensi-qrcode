<?php
include "config.php";

function HariIndo($hari)
{
    if ($hari == "Monday") {
        $namahari = "Senin";
    } else if ($hari == "Tuesday") {
        $namahari = "Selasa";
    }
    else if ($hari == "Wednesday") {
        $namahari = "Rabu";
    }
    else if ($hari == "Thursday") {
        $namahari = "Kamis";
    }
    else if ($hari == "Friday") {
        $namahari = "Jumat";
    }
    else if ($hari == "Saturday") {
        $namahari = "Sabtu";
    }
    else if ($hari == "Sunday") {
        $namahari = "Minggu";
    }
    return $namahari;
}

function GetValidasi($val)
{
    if ($val == "1") {
        $validasi = "YA";
    } else {
        $validasi = "TIDAK";
    }
    return $validasi;
}

//$tanggal='2011-07-18';

//$minggu_ke = weekNumberOfMonth($tanggal);

//echo ($tanggal . " adalah minggu ke=" . $minggu_ke);

function weekNumberOfMonth($date)
{

    $tgl = date_parse($date);

    $tanggal =  $tgl['day'];

    $bulan   =  $tgl['month'];

    $tahun   =  $tgl['year'];

    //tanggal 1 tiap bulan

    $tanggalAwalBulan = mktime(0, 0, 0, $bulan, 1, $tahun);

    $mingguAwalBulan = (int) date('W', $tanggalAwalBulan);

    //tanggal sekarang

    $tanggalYangDicari = mktime(0, 0, 0, $bulan, $tanggal, $tahun);

    $mingguTanggalYangDicari = (int) date('W', $tanggalYangDicari);

    $mingguKe = $mingguTanggalYangDicari - $mingguAwalBulan + 1;

    return $mingguKe;
}
