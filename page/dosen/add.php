<?php
include "../../header.php";
include "../../sidebar.php";
$link= $linkglobal.'page/dosen/';
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
                                <label class="col-sm-2 col-form-label text-right">Nama Dosen</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Dosen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Id admin</label>
                                <div class="col-sm-7">
                                    <input type="text" name="idadmin" class="form-control" placeholder="ID Admin" value="<?php echo $hasil['id_admin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" name="username" class="form-control" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">No Telp / Hp</label>
                                <div class="col-sm-7">
                                    <input type="text" name="telp" class="form-control" placeholder="Nomor Telp / HP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nama Jalan</label>
                                <div class="col-sm-7">
                                    <input type="text" name="namajalan" class="form-control" placeholder="Nama Jalan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Kecamatan</label>
                                <div class="col-sm-7">
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Kode Pos</label>
                                <div class="col-sm-7">
                                    <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Gelar</label>
                                <div class="col-sm-7">
                                    <input type="text" name="gelar" class="form-control" placeholder="Gelar">
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
if(isset($_POST['ok'])){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $telp=$_POST['telp'];
    $alamat=$_POST['namajalan'].'-'.$_POST['kecamatan'].'-'.$_POST['kodepos'];
    $gelar=$_POST['gelar'];
    $visible=$_POST['visible'];

    $sql=$DB_CON->prepare("INSERT INTO dosen SET nama_dosen='$nama',username='$username',password='$password',no_telp='$telp',alamat='$alamat',gelar='$gelar',visible='$visible',id_admin='$_SESSION[qrid]'");
    $sql->execute();
    if($sql){
        header("location:index.php");
    }else{
        echo"<script>alert('Erorr Gagal Insert Data !!!');</script>";
    }
}
?>