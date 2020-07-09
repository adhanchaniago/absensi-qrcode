<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/kelas/';
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
                            <!--<div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Mahasiswa</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="mahasiswa" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        <?php
                                        $sqlmahasiswa = $DB_CON->prepare("SELECT * FROM mahasiswa WHERE visible='1' ORDER BY nama_mahasiswa");
                                        $sqlmahasiswa->execute();
                                        while ($hasilmahasiswa = $sqlmahasiswa->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $hasilmahasiswa['nim_mahasiswa'] ?>"><?php echo $hasilmahasiswa['nama_mahasiswa']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>-->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-7">
                                    <button type="submit" name="ok" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo $link; ?>';">Batal</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Kelas</h3>
                    <div class="right">
                        <select class="form-control" name="angkatan" id="angkatan" onchange="GoToSerachMhs()">
                            <option value="">Pilih Angkatan</option>
                            <?php
                            $sqlangkatan = $DB_CON->prepare("SELECT DISTINCT angkatan FROM mahasiswa WHERE visible='1' ORDER BY angkatan ASC");
                            $sqlangkatan->execute();
                            while ($hasilangkatan = $sqlangkatan->fetch(PDO::FETCH_ASSOC)) {
                                if(empty($_GET['cari']) or $_GET['q']==""){
                                    $selectAngkatan="";
                                }else{
                                    $selectAngkatan=$_GET['q'];
                                }

                                if($selectAngkatan==$hasilangkatan['angkatan']){
                                    $sAngkatan="selected";
                                }else{
                                    $sAngkatan="";
                                }
                            ?>
                                <option value="<?php echo $hasilangkatan['angkatan']; ?>" <?php echo $sAngkatan; ?>><?php echo $hasilangkatan['angkatan']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(empty($_GET['cari']) or $_GET['q']==""){
                                    $filterAngkatan="";
                                }else{
                                    $filterAngkatan="AND angkatan='$_GET[q]'";
                                }
                                $sql = $DB_CON->prepare("SELECT * FROM mahasiswa WHERE visible='1' $filterAngkatan ORDER BY nama_mahasiswa");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasil['nim_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                            <td>
                                                <input type="checkbox" name="mhs[]" value="<?php echo $hasil['nim_mahasiswa'] ?>" />
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
            </form>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if (isset($_POST['ok'])) {
    $mhs = $_POST['mhs'];
    $countmhs = count($mhs);
    $matakuliah = $_POST['matakuliah'];
    $sukses = 0;
    $gagal = 0;
    if ($countmhs <= 0) {
        echo "<script>alert('Mahasiswa Belum dipilih');</script>";
    } else {
        for ($i = 0; $i < $countmhs; $i++) {
            $sql = $DB_CON->prepare("INSERT INTO kelas_mhs SET nim_mahasiswa='$mhs[$i]',id_mengajar='$matakuliah',visible='1'");
            $sql->execute();
            if ($sql) {
                $sukses++;
            } else {
                $gagal++;
            }
        }
    }

    if ($sukses > 0) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Insert Data !!!');</script>";
    }
}
?>