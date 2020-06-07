<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/mengajar/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Mengajar</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nama Dosen</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="dosen" required>
                                        <option value="">Pilih Dosen</option>
                                        <?php
                                        $sqldosen = $DB_CON->prepare("SELECT * FROM dosen WHERE visible='1' ORDER BY nama_dosen ASC");
                                        $sqldosen->execute();
                                        while ($hasildosen = $sqldosen->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $hasildosen['id_dosen']; ?>"><?php echo $hasildosen['nama_dosen']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Mata Kuliah</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="matakuliah" required>
                                        <option value="">Pilih Matakuliah</option>
                                        <?php
                                        $sqlmatakuliah = $DB_CON->prepare("SELECT * FROM matakuliah WHERE visible='1' ORDER BY nama_matakuliah ASC");
                                        $sqlmatakuliah->execute();
                                        while ($hasilmatakuliah = $sqlmatakuliah->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $hasilmatakuliah['kode_matakuliah']; ?>"><?php echo $hasilmatakuliah['nama_matakuliah']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Hari</label>
                                <div class="col-sm-7">
                                    <input type="text" name="hari" class="form-control" placeholder="Hari">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Jam</label>
                                <div class="col-sm-7">
                                    <input type="text" name="jam" class="form-control" placeholder="Jam">
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
    $dosen = $_POST['dosen'];
    $jadwal = $_POST['hari'] . '-' . $_POST['jam'];
    $matakuliah = $_POST['matakuliah'];

    $sql = $DB_CON->prepare("INSERT INTO mengajar SET id_dosen='$dosen',kode_matakuliah='$matakuliah',visible='1',buka_kelas='0',jadwal='$jadwal'");
    $sql->execute();
    if ($sql) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Insert Data !!!');</script>";
    }
}
?>