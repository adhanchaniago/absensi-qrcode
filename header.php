<?php
session_start();
ob_start();
include "config.php";
if(isset($_SESSION['qrlog'])){

    if($_SESSION['qrlevel']=="admin"){
        $table="admin";
        $fieldnama="nama_admin";
        $fieldID="id_admin";
    }else if($_SESSION['qrlevel']=="dosen"){
        $table="dosen";
        $fieldnama="nama_dosen";
        $fieldID="id_dosen";
    }else if($_SESSION['qrlevel']=="mahasiswa"){
        $table="mahasiswa";
        $fieldnama="nama_mahasiswa";
        $fieldID="nim_mahasiswa";
    }

    $sqluser=$DB_CON->prepare("SELECT * FROM $table WHERE $fieldID='$_SESSION[qrid]' AND visible='1'");
    $sqluser->execute();
    if($sqluser->rowCount()==0){
        header("location:login.php");
    }else{
        $hasil=$sqluser->fetch(PDO::FETCH_ASSOC);
        $namauser=$hasil[$fieldnama];
    }
}else{
    $linkback=$linkglobal.'login.php';
    header("location:$linkback");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>QR-CODE | Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo $linkglobal; ?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="<?php echo $linkglobal;  ?>assets/img/Logo_web_Undhira.png" alt="Undhira Logo" width="139px" height="21px" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $linkglobal; ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $namauser; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Ganti Password</span></a></li>
                                <li><a href="<?php echo $linkglobal; ?>logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->