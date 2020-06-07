<?php
include "../../header.php";
include "../../sidebar.php";
$link= $linkglobal.'page/kelas/';
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
                                    <th>Nama Mahasiswa</th>
                                    <th>Dosen</th>
                                    <th>Mata Kuliah</th>
                                    <th>Jadwal</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql=$DB_CON->prepare("SELECT mahasiswa.*,dosen.*,matakuliah.*,kelas_mhs.*,mengajar.* FROM kelas_mhs LEFT OUTER JOIN mengajar ON(kelas_mhs.id_mengajar=mengajar.id_mengajar) LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa) LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE kelas_mhs.visible='1'");
                                    $sql->execute();
                                    if($sql->rowCount() > 0){
                                        $no=1;
                                        while($hasil=$sql->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                    <td><?php echo $hasil['nama_dosen']; ?></td>
                                    <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                    <td><?php echo str_replace("-"," ",$hasil['jadwal']); ?></td>
                                    <td>
                                        <a onclick="return Tanya()" href="<?php echo $link; ?>index.php?hapus=<?php echo $hasil['id_kelas_mhs']; ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
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
    $sqlhapus=$DB_CON->prepare("UPDATE kelas_mhs SET visible='0' WHERE id_kelas_mhs='$_GET[hapus]'");
    $sqlhapus->execute();
    if($sqlhapus){
        header("location:index.php");
    }else{
        echo "<script>alert('Erorr Gagal Hapus Data !!!');</script>";
    }
}
?>