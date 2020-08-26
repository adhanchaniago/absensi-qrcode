<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/mahasiswa/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <form action="" method="post">
                <?php
                for ($i = 1; $i <= $_GET['jml']; $i++) {
                ?>
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mahasiswa ke <?php echo $i; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Nim Mahasiswa</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nim<?php echo $i; ?>" class="form-control" placeholder="Nim Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Id admin</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="idadmin" class="form-control" placeholder="ID Admin" value="<?php echo $hasil['id_admin']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Nama Mahasiswa</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nama<?php echo $i; ?>" class="form-control" placeholder="Nama Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Username</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="username<?php echo $i; ?>" class="form-control" placeholder="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" name="password<?php echo $i; ?>" class="form-control" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">No Telp / Hp</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="telp<?php echo $i; ?>" class="form-control" placeholder="Nomor Telp / HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Nama Jalan</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="namajalan<?php echo $i; ?>" class="form-control" placeholder="Nama Jalan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Kecamatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="kecamatan<?php echo $i; ?>" class="form-control" placeholder="Kecamatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Kode Pos</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="kodepos<?php echo $i; ?>" class="form-control" placeholder="Kode Pos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Visible</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="visible" class="form-control" placeholder="visible" value="1" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Angkatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="angkatan<?php echo $i; ?>" class="form-control" placeholder="Angkatan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-body">
                        <div class="row">
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
            </form>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if (isset($_POST['ok'])) {
    $sukses = 0;
    $gagal = 0;
    $duplikat = 0;
    for ($i = 1; $i <= $_GET['jml']; $i++) {
        $nama = $_POST['nama' . $i];
        $username = $_POST['username' . $i];
        $password = md5($_POST['password' . $i]);
        $telp = $_POST['telp' . $i];
        $alamat = $_POST['namajalan' . $i] . '-' . $_POST['kecamatan' . $i] . '-' . $_POST['kodepos' . $i];
        $nim = $_POST['nim' . $i];
        $angkatan = $_POST['angkatan' . $i];

        $sqlcek = $DB_CON->prepare("SELECT * FROM mahasiswa WHERE nim_mahasiswa='$nim'");
        $sqlcek->execute();
        if ($sqlcek->rowCount() == 0) {
            $sql = $DB_CON->prepare("INSERT INTO mahasiswa SET nama_mahasiswa='$nama',username='$username',password='$password',no_telp='$telp',alamat='$alamat',nim_mahasiswa='$nim',visible='1',id_admin='$_SESSION[qrid]',angkatan='$angkatan'");
            $sql->execute();
            if ($sql) {
                $sukses++;
            } else {
                $gagal++;
            }
        } else {
            $duplikat++;
        }
    }

    if ($sukses > 0) {
        echo "<script>
                alert('Data Sukses: $sukses Data Gagal: $gagal Duplikasi Nim: $duplikat'); 
                document.location='index.php';
              </script>";
    }
}
?>