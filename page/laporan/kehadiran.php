<?php
include "../../header.php";
include "../../sidebar.php";
include "../../fungsi.php";
$link = $linkglobal . 'page/laporan/';
if (isset($_GET['act'])) {
    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];
    if ($_GET['matakuliah'] !== "") {
        $filtermatakuliah = "AND mengajar.kode_matakuliah='$_GET[matakuliah]'";
        $dbmatakuliah = $_GET['matakuliah'];
    } else {
        $filtermatakuliah = "";
        $dbmatakuliah = "";
    }
} else {
    $tgl1 = date('Y-m-d');;
    $tgl2 = date('Y-m-d');;
    $filtermatakuliah = "";
    $dbmatakuliah = "";
}
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Fillter</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Periode</label>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="date" class="form-control" name="tgl1" value="<?php echo $tgl1; ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" class="form-control" name="tgl2" value="<?php echo $tgl2; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Matakuliah</label>
                                <div class="col-sm-5">
                                    <select name="matakuliah" class="form-control">
                                        <option value="">Semua Matakuliah</option>
                                        <?php
                                        $sqlmatakuliah = $DB_CON->prepare("SELECT * FROM matakuliah WHERE visible='1'");
                                        $sqlmatakuliah->execute();
                                        while ($hasilmatakuliah = $sqlmatakuliah->fetch(PDO::FETCH_ASSOC)) {
                                            if ($hasilmatakuliah['kode_matakuliah'] == $dbmatakuliah) {
                                                $selectmatakuliah = "selected";
                                            } else {
                                                $selectmatakuliah = "";
                                            }
                                        ?>
                                            <option value="<?php echo $hasilmatakuliah['kode_matakuliah'] ?>" <?php echo $selectmatakuliah ?>><?php echo $hasilmatakuliah['nama_matakuliah']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-7">
                                    <button type="submit" name="ok" class="btn btn-success">Tampilkan</button>
                                    <a href="cetak-kehadiran.php?act=1&tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&matakuliah=<?php echo $dbmatakuliah; ?>" class="btn btn-primary" target="_blank">Cetak</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-headline">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Laporan Kehadiran</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Mahasiswa</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Matakuliah</th>
                                    <th>Jumlah Pertemuan</th>
                                    <th>Kehadiran</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,matakuliah.nama_matakuliah,matakuliah.kode_matakuliah,mengajar.id_mengajar FROM `kelas_mhs` LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE kelas_mhs.visible='1' $filtermatakuliah ORDER BY mahasiswa.nim_mahasiswa ASC");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                        $sqlpertemuan = $DB_CON->prepare("SELECT DISTINCT absensi.tgl_absensi FROM `absensi` 
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) 
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) WHERE absensi.visible='1' AND kelas_mhs.id_mengajar='$hasil[id_mengajar]' AND absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2'");
                                        $sqlpertemuan->execute();
                                        $hasilpertemuan = $sqlpertemuan->rowCount();

                                        $sqlkehadiran = $DB_CON->prepare("SELECT DISTINCT absensi.tgl_absensi FROM `absensi` 
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) 
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) WHERE absensi.visible='1' AND kelas_mhs.id_mengajar='$hasil[id_mengajar]' AND kelas_mhs.nim_mahasiswa='$hasil[nim_mahasiswa]' AND absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2'");
                                        $sqlkehadiran->execute();
                                        $hasilkehadiran = $sqlkehadiran->rowCount();

                                        if ($hasilpertemuan == 0 and $hasilkehadiran == 0) {
                                            $persen = 0;
                                        } else {
                                            $persen = ceil($hasilkehadiran / $hasilpertemuan * 100);
                                        }
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasil['nim_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['kode_matakuliah']; ?></td>
                                            <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                            <td><?php echo $hasilpertemuan; ?></td>
                                            <td><?php echo $hasilkehadiran; ?></td>
                                            <td><?php echo $persen; ?>%</td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10" align="center"><b>Data Kosong</b></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if (isset($_POST['ok'])) {
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];
    $matakuliah = $_POST['matakuliah'];

    $link = $_SERVER['PHP_SELF'] . '?act=1&tgl1=' . $tgl1 . '&tgl2=' . $tgl2 . '&matakuliah=' . $matakuliah;
    header("location:$link");
}
?>