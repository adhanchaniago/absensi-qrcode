<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/validasi/materi.php';
$tglsekarang=date('Y-m-d');
$sql = $DB_CON->prepare("SELECT absensi.id_absensi,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,materi.judul_materi,
materi.des_materi,dosen.nama_dosen
FROM absensi
LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar)
LEFT OUTER JOIN materi ON(materi.id_mengajar=mengajar.id_mengajar)
LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah)
LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen)
WHERE kelas_mhs.nim_mahasiswa='$_SESSION[qrid]' AND absensi.tgl_absensi='$tglsekarang' AND absensi.val_materi='0'
AND materi.tgl_materi='$tglsekarang'");
$sql->execute();
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <?php
                if($sql->rowcount()==0){
            ?>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Persetujuan Materi</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <h1>Tidak Ada Materi</h1>
                    </div>
                </div>
            </div>
            <?php
                }else{
                    while($hasil=$sql->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Persetujuan Materi</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Kode Matakuliah</label>
                                <div class="col-sm-7">
                                    <?php echo $hasil['kode_matakuliah']; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Matakuliah</label>
                                <div class="col-sm-7">
                                    <?php echo $hasil['nama_matakuliah']; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Judul Materi</label>
                                <div class="col-sm-7">
                                    <?php echo $hasil['judul_materi']; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Deskripsi Materi</label>
                                <div class="col-sm-7">
                                    <?php echo nl2br($hasil['des_materi']); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nama Dosen</label>
                                <div class="col-sm-7">
                                    <?php echo $hasil['nama_dosen']; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-7">
                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?materi=<?php echo $hasil['id_absensi']; ?>" class="btn btn-success">Setujui</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if (isset($_GET['materi'])) {
    $sql=$DB_CON->prepare("UPDATE absensi SET val_materi='1' WHERE id_absensi='$_GET[materi]'");
    $sql->execute();
    if($sql){
        $link=$_SERVER['PHP_SELF'];
        header("location:$link");
    }
}
?>