<?php
include "../../header.php";
include "../../sidebar.php";
include "../../fungsi.php";
$link = $linkglobal . 'page/matakuliah/';
if (isset($_GET['act'])) {
    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];
    if ($_GET['matakuliah'] !== "") {
        $filtermatakuliah = "AND mengajar.kode_matakuliah='$_GET[matakuliah]'";
        $dbmatakuliah=$_GET['matakuliah'];
    } else {
        $filtermatakuliah = "";
        $dbmatakuliah="";
    }

    if ($_GET['dosen'] !== "") {
        $filterdosen = "AND mengajar.id_dosen='$_GET[dosen]'";
        $dbdosen=$_GET['dosen'];
    } else {
        $filterdosen = "";
        $dbdosen="";
    }
} else {
    $tgl1 = date('Y-m-d');;
    $tgl2 = date('Y-m-d');;
    $filterdosen = "";
    $filtermatakuliah = "";
    $dbdosen="";
    $dbmatakuliah="";
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
                                            if($hasilmatakuliah['kode_matakuliah']==$dbmatakuliah){
                                                $selectmatakuliah="selected";
                                            }else{
                                                $selectmatakuliah="";
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
                                <label class="col-sm-2 col-form-label text-right">Dosen</label>
                                <div class="col-sm-5">
                                    <select name="dosen" class="form-control">
                                        <option value="">Semua Dosen</option>
                                        <?php
                                        $sqldosen = $DB_CON->prepare("SELECT * FROM dosen WHERE visible='1'");
                                        $sqldosen->execute();
                                        while ($hasildosen = $sqldosen->fetch(PDO::FETCH_ASSOC)) {
                                            if($hasildosen['id_dosen']==$dbdosen){
                                                $selectdosen="selected";
                                            }else{
                                                $selectdosen="";
                                            }
                                        ?>
                                            <option value="<?php echo $hasildosen['id_dosen'] ?>" <?php echo $selectdosen; ?>><?php echo $hasildosen['nama_dosen']; ?></option>
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
                                    <a href="cetak.php?act=1&tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>&matakuliah=<?php echo $dbmatakuliah; ?>&dosen=<?php echo $dbdosen; ?>" class="btn btn-primary" target="_blank">Cetak</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-headline">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Laporan Absensi</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Mahasiswa</th>
                                    <th>Tgl Absensi</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Matakuliah</th>
                                    <th>Dosen</th>
                                    <th>Hari</th>
                                    <th>Validasi qrcode</th>
                                    <th>Validasi Materi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $DB_CON->prepare("SELECT DISTINCT absensi.id_kelas
                                FROM absensi
                                LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
                                LEFT OUTER JOIN mengajar ON(kelas_mhs.id_mengajar=mengajar.id_mengajar)
                                WHERE
                                absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2' AND absensi.visible='1' $filtermatakuliah $filterdosen");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                        $sqldetail = $DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,absensi.tgl_absensi,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah
                                        ,dosen.nama_dosen,mengajar.jadwal,absensi.validasi,absensi.val_materi
                                        FROM absensi
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
                                        LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa)
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar)
                                        LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah)
                                        LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen)
                                        WHERE
                                        absensi.id_kelas='$hasil[id_kelas]' AND absensi.visible='1'");
                                        $sqldetail->execute();
                                        $hasildetail = $sqldetail->fetch(PDO::FETCH_ASSOC);
                                        $jadwal = explode("-", $hasildetail['jadwal']);
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasildetail['nim_mahasiswa']; ?></td>
                                            <td><?php echo $hasildetail['nama_mahasiswa']; ?></td>
                                            <td><?php echo $hasildetail['tgl_absensi']; ?></td>
                                            <td><?php echo $hasildetail['kode_matakuliah']; ?></td>
                                            <td><?php echo $hasildetail['nama_matakuliah']; ?></td>
                                            <td><?php echo $hasildetail['nama_dosen']; ?></td>
                                            <td><?php echo $jadwal[0]; ?></td>
                                            <td><?php echo GetValidasi($hasildetail['validasi']); ?></td>
                                            <td><?php echo GetValidasi($hasildetail['val_materi']); ?></td>
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
    $dosen = $_POST['dosen'];

    $link = $_SERVER['PHP_SELF'] . '?act=1&tgl1=' . $tgl1 . '&tgl2=' . $tgl2 . '&matakuliah=' . $matakuliah . '&dosen=' . $dosen;
    header("location:$link");
}
?>