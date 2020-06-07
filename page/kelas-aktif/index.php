<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/kelas-aktif/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <?php
            $sqlmengajar = $DB_CON->prepare("SELECT matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,mengajar.jadwal,mengajar.id_mengajar,dosen.nama_dosen,kelas_mhs.id_kelas_mhs FROM `kelas_mhs` LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE kelas_mhs.nim_mahasiswa='$_SESSION[qrid]' AND mengajar.buka_kelas='1' AND kelas_mhs.visible='1'");
            $sqlmengajar->execute();
            if ($sqlmengajar->rowCount() == 0) {
            ?>
                <div class="row">
                    <!-- PANEL NO PADDING -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kelas Aktif</h3>
                        </div>
                        <div class="panel-body text-center">
                            <div class="col-lg-8">
                                <h1>Maaf tidak ada jadwal kelas hari ini</h1>
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
                            <h3 class="panel-title">Kelas Aktif</h3>
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
                                                            <td>Dosen</td>
                                                            <td><?php echo $hasilmengajar['nama_dosen']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end panel body-->
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <a href="<?php echo $link; ?>?absen=<?php echo $hasilmengajar['id_kelas_mhs']; ?>" class="btn btn-primary">Masuk Kelas</a>
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
if (isset($_GET['absen'])) {
    include "../../lib/phpqrcode/qrlib.php";
    $tgl = date('Y-m-d');
    $jam = date('H:i:s');

    $tempdir = "../../qrcode/"; //Nama folder tempat menyimpan file qrcode
    //isi qrcode jika di scan
    $codeContents = "http://192.168.43.195/absensi-qrcode/validasi/".$_GET['absen'] . '' . str_replace("-","",$tgl) . '' . str_replace(":","",$jam).".png";
    //nama file qrcode yang akan disimpan
    $namaFile = $_GET['absen'] . '' . str_replace("-","",$tgl) . '' . str_replace(":","",$jam).".png";
    //ECC Level
    $level = QR_ECLEVEL_H;
    //Ukuran pixel
    $UkuranPixel = 10;
    //Ukuran frame
    $UkuranFrame = 4;
    $padding = 2;

    QRCode::png($codeContents, $tempdir . $namaFile, $level, $UkuranPixel, $UkuranFrame, $padding);

    $sqlinsertabsen = $DB_CON->prepare("INSERT absensi SET id_kelas='$_GET[absen]',tgl_absensi='$tgl',jam_absensi='$jam',validasi='0',qrcode='$namaFile',visible='1'");
    $sqlinsertabsen->execute();
    if ($sqlinsertabsen) {
        $linkprofile = "profile.php?id=" . $namaFile;
        header("location:$linkprofile");
    }
}
?>