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
                    <h3 class="panel-title">Kelas</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nama Dosen</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="dosen" required id="dosen" onchange="GetMataKuliahByDosen()">
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
                                    <select class="form-control" name="matakuliah" required id="matakuliah">
                                        <option value="">Pilih Matakuliah</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Mahasiswa</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="mahasiswa" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        <?php
                                            $sqlmahasiswa=$DB_CON->prepare("SELECT * FROM mahasiswa WHERE visible='1' ORDER BY nama_mahasiswa");
                                            $sqlmahasiswa->execute();
                                            while($hasilmahasiswa=$sqlmahasiswa->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <option value="<?php echo $hasilmahasiswa['nim_mahasiswa'] ?>"><?php echo $hasilmahasiswa['nama_mahasiswa']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
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
    $matakuliah = $_POST['matakuliah'];
    $mahasiswa = $_POST['mahasiswa'];

    $sql = $DB_CON->prepare("INSERT INTO kelas_mhs SET nim_mahasiswa='$mahasiswa',id_mengajar='$matakuliah',visible='1'");
    $sql->execute();
    if ($sql) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Insert Data !!!');</script>";
    }
}
?>