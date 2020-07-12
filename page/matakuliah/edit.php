<?php
include "../../header.php";
include "../../sidebar.php";
$link= $linkglobal.'page/matakuliah/';
if (!empty($_GET['id'])) {
    $sqledit = $DB_CON->prepare("SELECT * FROM matakuliah WHERE kode_matakuliah='$_GET[id]'");
    $sqledit->execute();
    if ($sqledit->rowCount() > 0) {
        $hasiledit = $sqledit->fetch(PDO::FETCH_ASSOC);
        $nama = $hasiledit['nama_matakuliah'];
        $sks = $hasiledit['sks'];
        $kode = $hasiledit['kode_matakuliah'];
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
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
                    <h3 class="panel-title">Dosen</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Kode Matakuliah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="kode" class="form-control" placeholder="Kode Matakuliah" required value="<?php echo $kode; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Matakuliah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Matakuliah" required value="<?php echo $nama ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Sks</label>
                                <div class="col-sm-7">
                                    <input type="number" name="sks" class="form-control" placeholder="SKS" required value="<?php echo $sks; ?>">
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
    $output = 0;

    if ($kode == $hasiledit['kode_matakuliah']) {
        $sql = $DB_CON->prepare("UPDATE matakuliah SET nama_matakuliah='$nama',sks='$sks',kode_matakuliah='$kode' WHERE kode_matakuliah='$_GET[id]'");
        $sql->execute();
        if ($sql) {
            $output = 1;
        } else {
            $output = 0;
        }
    } else {
        $sqlcek = $DB_CON->prepare("SELECT * FROM matakuliah WHERE kode_matakuliah='$kode'");
        $sqlcek->execute();
        if ($sqlcek->rowCount() == 0) {
            $sql = $DB_CON->prepare("UPDATE matakuliah SET nama_matakuliah='$nama',sks='$sks',kode_matakuliah='$kode' WHERE kode_matakuliah='$_GET[id]'");
            $sql->execute();
            if ($sql) {
                $output = 1;
            } else {
                $output = 0;
            }
        } else {
            $output = 2;
        }
    }
    if ($output == 1) {
        header("location:index.php");
    } else if ($output == 0) {
        echo "<script>alert('Erorr Gagal Update Data !!!');</script>";
    } else if ($output == 2) {
        echo "<script>alert('Kode Matakuliah Sudah Ada !!!');</script>";
    }
}
?>