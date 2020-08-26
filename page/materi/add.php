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
                    <h3 class="panel-title">Materi Pengajaran</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Matakuliah</label>
                                <div class="col-sm-7">
                                    <select name="matakuliah" class="form-control" required>
                                        <option value="">Pilih Matakuliah</option>
                                        <?php
                                        $hari = HariIndo(date('l'));
                                        $sqlmatakuliah = $DB_CON->prepare("SELECT matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,mengajar.id_mengajar 
                                            FROM mengajar 
                                            LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah)
                                            WHERE mengajar.buka_kelas='1' AND mengajar.id_dosen='$_SESSION[qrid]' AND mengajar.jadwal LIKE'%$hari%' AND mengajar.visible='1'");
                                        $sqlmatakuliah->execute();
                                        if($sqlmatakuliah->rowcount()==0){
                                        ?>
                                        <option value="">Tidak Ada Matakuliah Aktif</option>
                                        <?php
                                        }else{
                                            while($hasilmatakuliah=$sqlmatakuliah->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <option value="<?php echo $hasilmatakuliah['id_mengajar']; ?>"><?php echo $hasilmatakuliah['nama_matakuliah']; ?></option>
                                        <?php 
                                            }   
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Judul Materi</label>
                                <div class="col-sm-7">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul Materi" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Deskripsi Materi</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="des" rows="5px" placeholder="Deskripsi Materi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Visible</label>
                                <div class="col-sm-7">
                                    <input type="text" name="visible" class="form-control" placeholder="visible" value="1" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-7">
                                    <button type="submit" name="ok" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo $link; ?>';">Batal</button>
                                </div>
                            </div>
                        </form>
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
    $mengajar = $_POST['matakuliah'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['des'];
    $tglsekarang=date('Y-m-d');

    $sqlcek=$DB_CON->prepare("SELECT absensi.* 
    FROM absensi
    LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
    WHERE kelas_mhs.id_mengajar='$mengajar' AND absensi.validasi='1' AND absensi.tgl_absensi='$tglsekarang' AND absensi.visible='1'");
    $sqlcek->execute();
    if($sqlcek->rowcount() > 0){
        //insert Materi
        $sqlmateri=$DB_CON->prepare("INSERT INTO materi SET id_mengajar='$mengajar',tgl_materi='$tglsekarang',judul_materi='$judul',des_materi='$deskripsi',visible='1'");
        $sqlmateri->execute();
        if($sqlmateri){
            $sqltutupkelas=$DB_CON->prepare("UPDATE mengajar SET buka_kelas='0' WHERE id_mengajar='$mengajar'");
            $sqltutupkelas->execute();
            if($sqltutupkelas){
                header("location:index.php");
            }else{
                echo "<script>alert('Error Gagal Tutup Kelas!!!');</script>";
            }
        }else{
            echo "<script>alert('Error Gagal Insert Materi!!!');</script>";
        }
    }else{
        echo "<script>alert('Belum ada Mahasiswa yang Melakukan Absensi');</script>";
    }

    /*$sql = $DB_CON->prepare("INSERT INTO dosen SET nama_dosen='$nama',username='$username',password='$password',no_telp='$telp',alamat='$alamat',gelar='$gelar',visible='1',id_admin='$_SESSION[qrid]'");
    $sql->execute();
    if ($sql) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Insert Data !!!');</script>";
    }*/
}
?>