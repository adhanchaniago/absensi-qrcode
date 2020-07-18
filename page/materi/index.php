<?php
include "../../header.php";
include "../../sidebar.php";
include "../../fungsi.php";
$link = $linkglobal . 'page/materi/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <?php
                        $tglsekarang=date('Y-m-d');
                        $mingguSekarang = date('W', strtotime($tglsekarang));
                    ?>
                    <h3 class="panel-title">Materi Pengajaran</h3>
                    <div class="right">
                        <a href="<?php echo $link; ?>add.php" class="btn btn-success">Tambah Data</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Matakuliah</th>
                                    <th>Tgl Materi</th>
                                    <th>Judul Materi</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $DB_CON->prepare("SELECT matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,materi.id_materi,materi.tgl_materi,materi.judul_materi FROM materi LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=materi.id_mengajar) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen) WHERE mengajar.id_dosen='$_SESSION[qrid]' AND materi.visible='1'");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasil['kode_matakuliah']; ?></td>
                                            <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                            <td><?php echo $hasil['tgl_materi']; ?></td>
                                            <td><?php echo $hasil['judul_materi']; ?></td>
                                            <td>
                                                <a onclick="return Tanya()" href="<?php echo $link; ?>index.php?hapus=<?php echo $hasil['id_materi']; ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center"><b>Data Kosong</b></td>
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

            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Log Absensi Minggu ini</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Matakuliah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $DB_CON->prepare("SELECT absensi.tgl_absensi,mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,matakuliah.nama_matakuliah 
                                FROM `absensi` 
                                LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
                                LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa)
                                LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar)
                                LEFT OUTER JOIN matakuliah ON(mengajar.kode_matakuliah=matakuliah.kode_matakuliah)
                                WHERE absensi.validasi='1' and mengajar.id_dosen='$_SESSION[qrid]'");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    $i= 0 ;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                        $minggutgl = date('W', strtotime($hasil['tgl_absensi']));
                                        if($minggutgl==$mingguSekarang){
                                            $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasil['tgl_absensi']; ?></td>
                                            <td><?php echo $hasil['nim_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                        }
                                    }
                                if($i==0){
                                ?>
                                     <tr>
                                        <td colspan="6" align="center"><b>Data Kosong</b></td>
                                    </tr>
                                <?php
                                }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center"><b>Data Kosong</b></td>
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
if (isset($_GET['hapus'])) {
    $sqlhapus = $DB_CON->prepare("UPDATE materi SET visible='0' WHERE id_materi='$_GET[hapus]'");
    $sqlhapus->execute();
    if ($sqlhapus) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Hapus Data !!!');</script>";
    }
}
?>