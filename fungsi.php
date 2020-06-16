<?php
include"config.php";

function HariIndo($hari){
    if($hari=="Monday"){
        $namahari="Senin";
    }else if($hari=="Tuesday"){
        $namahari="Selasa";
    }else if($hari=="Wednesday"){
        $namahari="Rabu";
    }else if($hari=="Thursday"){
        $namahari="Kamis";
    }else if($hari=="Friday"){
        $namahari="Jumat";
    }else if($hari=="Saturday"){
        $namahari="Sabtu";
    }else if($hari=="Sunday"){
        $namahari="Minggu";
    }
    return $namahari;
}

function GetValidasi($val)
{
    if($val=="1"){
        $validasi="YA";
    }else{
        $validasi="TIDAK";
    }
    return $validasi;
}
?>