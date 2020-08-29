<?php
session_start();
ob_start();
include "config.php";
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box" style="height: 500px;">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="assets/img/LOGO-UNDHIRA-fix.png" alt="Undhira Logo"></div>
                                <p class="lead">Login untuk Memulai</p>
                            </div>
                            <form class="form-auth-small" action="" method="POST">
                                <div class="form-group">
                                    <label for="signin-username" class="control-label sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" id="signin-username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Level</label>
                                    <select class="form-control" name="level">
                                        <?php
                                        if (empty($_GET['validasi'])) {
                                        ?>
                                            <option value="admin">Administrator</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="dosen">Dosen</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Help</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Sistem Informasi Absensi dengan QR-CODE</h1>
                            <p>Universitas Dhyana Pura</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab2default" data-toggle="tab">Dosen</a></li>
                        <li><a href="#tab1default" data-toggle="tab">Admin</a></li>
                        <li><a href="#tab3default" data-toggle="tab">Mahasiswa</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab1default">
                            <!-- END OVERVIEW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Dosen</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data Dosen</b></h4>
                                                <ol>
                                                    <li>Klik menu Data Dosen kemudian Dosen</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Edit Data Dosen</b></h4>
                                                <ol>
                                                    <li>Klik menu Data Dosen kemudian Dosen</li>
                                                    <li>Klik icon pensil</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data Dosen</b></h4>
                                                <ol>
                                                    <li>Klik menu Data Dosen kemudian Dosen</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline in">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Mengajar</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data Mengajar</b></h4>
                                                <ol>
                                                    <li>Klik menu Data Dosen kemudian mengajar</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data mengajar</b></h4>
                                                <ol>
                                                    <li>Klik menu Data Dosen kemudian mengajar</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Mahasiswa</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data mahasiswa</b></h4>
                                                <ol>
                                                    <li>Klik menu Data mahasiswa kemudian mahasiswa</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>Masukan jumlah data yang ingin di input</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Edit Data mahasiwa</b></h4>
                                                <ol>
                                                    <li>Klik menu Data mahasiswa kemudian mahaiswa</li>
                                                    <li>Klik icon pensil</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data mahasiswa</b></h4>
                                                <ol>
                                                    <li>Klik menu Data mahasiswa kemudian mahasiswa</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">kelas</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data kelas</b></h4>
                                                <ol>
                                                    <li>Klik menu Data mahasiswa kemudian kelas</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data kelas</b></h4>
                                                <ol>
                                                    <li>Klik menu Data mahasiswa kemudian kelas</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Matakuliah</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data matakuliah</b></h4>
                                                <ol>
                                                    <li>Klik menu master data kemudian matakuliah</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Edit Data matakuliah</b></h4>
                                                <ol>
                                                    <li>Klik menu master data kemudian matakuliah</li>
                                                    <li>Klik icon pensil</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data matakuliah</b></h4>
                                                <ol>
                                                    <li>Klik menu master data kemudian matakuliah</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">admin</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data admin</b></h4>
                                                <ol>
                                                    <li>Klik menu master data kemudian admin</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Laporan Absensi</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <ol>
                                                    <li>Klik menu laporan kemudian laporan absensi</li>
                                                    <li>isi form filter yang tersedia (jika diperlukan)</li>
                                                    <li>tekan tampilkan untuk menampilkan laporan</li>
                                                    <li>tekan cetak untuk mencetak laporan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">laporan kehadiran</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <ol>
                                                    <li>Klik menu laporan kemudian laporan kehadiran</li>
                                                    <li>isi form filter yang tersedia (jika diperlukan)</li>
                                                    <li>tekan tampilkan untuk menampilkan laporan</li>
                                                    <li>tekan cetak untuk mencetak laporan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="tab-pane fade in active" id="tab2default">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Buka Kelas</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <ol>
                                                    <li>Klik menu buka kelas</li>
                                                    <li>pilih kelas sesuai jadwal</li>
                                                    <li>klik tombol buka kelas</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">materi pengajaran</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title"><b>Tambah Data materi pengajaran</b></h4>
                                                <ol>
                                                    <li>Klik menu Data materi pengajaran</li>
                                                    <li>Klik Tambah Data di pojok kanan atas</li>
                                                    <li>isi form yang tersedia</li>
                                                    <li>klik simpan untuk menyimpan data</li>
                                                    <li>klik batal untuk kembali ke halaman list data</li>
                                                </ol>
                                            </div>
                                            <div class="row">
                                                <h4 class="panel-title"><b>Hapus Data materi pengajaran</b></h4>
                                                <ol>
                                                    <li>Klik menu materi pengajaran</li>
                                                    <li>Klik icon trash</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Kelas Aktif</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <ol>
                                                    <li>Klik menu kelas aktif</li>
                                                    <li>pilih kelas yang tersedia</li>
                                                    <li>lalu scan qrcode</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                                <div class="col-lg-12">
                                    <!-- OVERVIEW -->
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">persetujuan materi</h3>
                                            <div class="right">
                                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <ol>
                                                    <li>Klik menu persetujuan materi</li>
                                                    <li>pilih materi yang tersedia</li>
                                                    <li>lalu tekan tombol persetujuan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OVERVIEW -->
                                </div>
                                <!---end col-6-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo $linkglobal; ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $linkglobal; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $linkglobal; ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $linkglobal; ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo $linkglobal; ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo $linkglobal; ?>assets/scripts/klorofil-common.js"></script>

</html>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    if ($level == "admin") {
        $table = "admin";
        $level = "admin";
        $qrid = "id_admin";
    } else if ($level == "dosen") {
        $table = "dosen";
        $level = "dosen";
        $qrid = "id_dosen";
    } else if ($level == "mahasiswa") {
        $table = "mahasiswa";
        $level = "mahasiswa";
        $qrid = "nim_mahasiswa";
    }

    $sql = $DB_CON->prepare("SELECT * FROM $table WHERE username='$username' AND password='$password' AND visible='1'");
    $sql->execute();
    if ($sql->rowCount() == 0) {
        echo "<script>alert('Username atau Password salah!!');</script>";
    } else {
        $hasil = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['qrlog'] = true;
        $_SESSION['qrlevel'] = $level;
        $_SESSION['qrid'] = $hasil[$qrid];
        if (empty($_GET['validasi'])) {
            $link = $linkglobal . 'home.php';
        } else {
            $link = $linkglobal . 'page/validasi/index.php?id=' . $_GET['validasi'];
        }
        header("location:$link");
    }
}
?>