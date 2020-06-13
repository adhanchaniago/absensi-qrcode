<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/kelas-aktif/';
$sql=$DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,mahasiswa.no_telp,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,mengajar.jadwal,dosen.nama_dosen,absensi.id_absensi,absensi.qrcode FROM `absensi` LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa) LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE absensi.qrcode='$_GET[id]' AND absensi.visible='1'");
$sql->execute();
$hasil=$sql->fetch(PDO::FETCH_ASSOC);
$jadwal=explode("-",$hasil['jadwal']);
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="<?php echo $linkglobal; ?>assets/img/user-medium.png" class="img-circle" alt="Avatar" style="margin: 0 0 30px 0;">
                                    <!--<h3 class="name" style="color: green;">Samuel Gold</h3>
                                    <span class="online-status status-available">Available</span>-->
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                            Nama <span><?php echo $hasil['nama_mahasiswa']; ?></span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            Nim <span><?php echo $hasil['nim_mahasiswa']; ?></span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            Telp <span><?php echo $hasil['no_telp']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Mata Kuliah</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Kode Matakuliah <span><?php echo $hasil['kode_matakuliah']; ?></span></li>
                                        <li>Nama Matakuliah <span><?php echo $hasil['nama_matakuliah']; ?></span></li>
                                        <li>Hari <span><?php echo $jadwal[0]; ?></span></li>
                                        <li>Jam <span><?php echo $jadwal[1]; ?></span></li>
                                        <li>Dosen <span><?php echo $hasil['nama_dosen']; ?></span></li>
                                    </ul>
                                </div>
                                <div class="profile-info text-center no-padding">
                                   <img src="<?php echo $linkglobal; ?>qrcode/<?php echo $hasil['qrcode']; ?>" width="150px" height="150px">
                                </div>
                            </div>
                            <!-- END PROFILE DETAIL -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <?php include "../../footer.php"; ?>