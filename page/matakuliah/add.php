<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/matakuliah/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dosen</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Kode Matakuliah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="kode" class="form-control" placeholder="Kode Matakuliah" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Id admin</label>
                                <div class="col-sm-7">
                                    <input type="text" name="idadmin" class="form-control" placeholder="ID Admin" value="<?php echo $hasil['id_admin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Matakuliah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Matakuliah" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Sks</label>
                                <div class="col-sm-7">
                                    <input type="number" name="sks" class="form-control" placeholder="SKS" required>
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
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $kode = $_POST['kode'];

    $sqlcek = $DB_CON->prepare("SELECT * FROM matakuliah WHERE kode_matakuliah='$kode'");
    $sqlcek->execute();
    if ($sqlcek->rowCount() == 0) {
        $sql = $DB_CON->prepare("INSERT INTO matakuliah SET nama_matakuliah='$nama',sks='$sks',kode_matakuliah='$kode',visible='1',id_admin='$_SESSION[qrid]'");
        $sql->execute();
        if ($sql) {
            header("location:index.php");
        } else {
            echo "<script>alert('Erorr Gagal Insert Data !!!');</script>";
        }
    } else {
        echo "<script>alert('Kode Matakuliah Sudah Ada');</script>";
    }
}
?>