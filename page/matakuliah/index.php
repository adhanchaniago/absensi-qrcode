<?php
include "../../header.php";
include "../../sidebar.php";
$link="http://localhost/qr/page/matakuliah/";
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Matakuliah</h3>
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
                                    <th>SKS</th>
                                    <th>Jadwal</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql=$DB_CON->prepare("SELECT * FROM matakuliah WHERE visible='1'");
                                    $sql->execute();
                                    if($sql->rowCount() > 0){
                                        $no=1;
                                        while($hasil=$sql->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $hasil['kode_matakuliah']; ?></td>
                                    <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                    <td><?php echo $hasil['sks']; ?></td>
                                    <td><?php echo str_replace("-"," ",$hasil['jadwal']); ?></td>
                                    <td>
                                        <a href="<?php echo $link; ?>edit.php?id=<?php echo $hasil['kode_matakuliah']; ?>" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
                                        <a onclick="return Tanya()" href="<?php echo $link; ?>index.php?hapus=<?php echo $hasil['kode_matakuliah']; ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                        $no++;
                                        }
                                    }else{
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
if(isset($_GET['hapus'])){
    $sqlhapus=$DB_CON->prepare("UPDATE matakuliah SET visible='0' WHERE kode_matakuliah='$_GET[hapus]'");
    $sqlhapus->execute();
    if($sqlhapus){
        header("location:index.php");
    }else{
        echo "<script>alert('Erorr Gagal Hapus Data !!!');</script>";
    }
}
?>