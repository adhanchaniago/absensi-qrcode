<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/validasi/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <?php
                    if($_SESSION['qrlevel']=="dosen"){
                    $sql=$DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,mahasiswa.no_telp,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,mengajar.jadwal,dosen.nama_dosen,absensi.id_absensi,absensi.qrcode FROM `absensi` LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa) LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE absensi.qrcode='$_GET[id]' AND mengajar.id_dosen='$_SESSION[qrid]' AND absensi.visible='1'");
                    $sql->execute();
                    if($sql->rowcount() > 0){
                        $sqlupdate=$DB_CON->prepare("UPDATE absensi SET validasi='1' WHERE qrcode='$_GET[id]'");
                        $sqlupdate->execute();
                        if($sqlupdate){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> Validasi Berhasil dilakukan
                </div>
                <?php
                        }else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> Validasi Gagal dilakukan
                </div>
                <?php
                        }
                    }else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> Maaf Anda Tidak Bisa Melakukan Validasi
                </div>    
                <?php
                    }
                    }else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> Akses Anda ditolak
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "../../footer.php"; ?>