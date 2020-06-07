<?php
include "../../header.php";
include "../../sidebar.php";
include "../../fungsi.php";
include "../../fungsi_flash.php";
$link = $linkglobal . 'page/bukakelas/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <?php
                flash('msg');
            ?>
            <?php
            $hari = HariIndo(date('l'));
            $sqlmengajar = $DB_CON->prepare("SELECT matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,mengajar.jadwal,mengajar.id_mengajar FROM `mengajar` LEFT OUTER JOIN dosen ON(mengajar.id_dosen=dosen.id_dosen) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE mengajar.id_dosen='$_SESSION[qrid]' AND mengajar.jadwal LIKE'%$hari%' AND mengajar.buka_kelas='0'");
            $sqlmengajar->execute();
            if ($sqlmengajar->rowCount() == 0) {
            ?>
                <div class="row">
                    <!-- PANEL NO PADDING -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jadwal Mengajar</h3>
                        </div>
                        <div class="panel-body text-center">
                            <div class="col-lg-8">
                                <h1>Anda tidak ada jadwal mengajar hari ini</h1>
                            </div>
                            <div class="col-lg-4"><img src="<?php echo $linkglobal; ?>assets/img/icon-not-found.png" width="150px" height="150px"></div>
                        </div>
                    </div>
                    <!-- END PANEL NO PADDING -->
                </div>
            <?php
            } else {
            ?>
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jadwal Mengajar</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                while ($hasilmengajar = $sqlmengajar->fetch(PDO::FETCH_ASSOC)) {
                                    $jadwal = explode("-", $hasilmengajar['jadwal']);
                                    $sqlcountmhs = $DB_CON->prepare("SELECT * FROM kelas_mhs WHERE id_mengajar='$hasilmengajar[id_mengajar]' AND visible='1'");
                                    $sqlcountmhs->execute();
                                    $jmlmhs = $sqlcountmhs->rowcount();
                                ?>
                                    <div class="col-lg-3">
                                        <div class="panel">
                                            <div class="panel-heading bg-success">
                                                <h3 class="panel-title" style="color: #fff;;"><?php echo $hasilmengajar['nama_matakuliah']; ?></h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <table class="table table-condensed text-left no-padding">
                                                        <tr>
                                                            <td>Kode</td>
                                                            <td><?php echo $hasilmengajar['kode_matakuliah']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hari</td>
                                                            <td><?php echo $jadwal[0]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jam</td>
                                                            <td><?php echo $jadwal[1]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mahasiswa</td>
                                                            <td><?php echo $jmlmhs; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end panel body-->
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <a href="<?php echo $link; ?>index.php?buka=<?php echo $hasilmengajar['id_mengajar']; ?>" class="btn btn-primary">Buka Kelas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END cols lg-3-->
                                <?php
                                }
                                ?>
                            </div>
                            <!---END Row--->
                        <?php
                    }
                        ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if(isset($_GET['buka'])){
    $sqlbuka=$DB_CON->prepare("UPDATE mengajar SET buka_kelas='1' WHERE id_mengajar='$_GET[buka]'");
    $sqlbuka->execute();
    if($sqlbuka){
        flash("msg","Kelas Berhasil dibuka");
        header("location:index.php");
    }
}
?>