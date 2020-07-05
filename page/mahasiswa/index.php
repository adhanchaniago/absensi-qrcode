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
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Mahasiswa</h3>
                    <div class="right">
                        <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>
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
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $DB_CON->prepare("SELECT * FROM mahasiswa WHERE visible='1'");
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    $no = 1;
                                    while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hasil['nim_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                            <td><?php echo $hasil['no_telp']; ?></td>
                                            <td><?php echo str_replace("-", " ", $hasil['alamat']); ?></td>
                                            <td>
                                                <a href="<?php echo $link; ?>edit.php?id=<?php echo $hasil['nim_mahasiswa']; ?>" class="btn btn-warning btn-sm"><i class="lnr lnr-pencil"></i></a>
                                                <a onclick="return Tanya()" href="<?php echo $link; ?>index.php?hapus=<?php echo $hasil['nim_mahasiswa']; ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
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
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Jumlah Data</label>
                    <div class="col-sm-7">
                        <input type="text" name="count" id="count" value="1" class="form-control" placeholder="Jumlah Data Yang di input" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="GoToMhs()">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['hapus'])) {
    $sqlhapus = $DB_CON->prepare("UPDATE mahasiswa SET visible='0' WHERE nim_mahasiswa='$_GET[hapus]'");
    $sqlhapus->execute();
    if ($sqlhapus) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Hapus Data !!!');</script>";
    }
}
?>