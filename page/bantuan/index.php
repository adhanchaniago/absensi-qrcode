<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/bantuan/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Bantuan</h3>
                </div>
            </div>
            <?php
            if ($_SESSION['qrlevel'] == "admin") {
            ?>
                <!-- END OVERVIEW -->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dosen</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data Dosen</b></h4>
                                    <ol>
                                        <li>Klik menu Data Dosen kemudian Dosen</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Edit Data Dosen</b></h4>
                                    <ol>
                                        <li>Klik menu Data Dosen kemudian Dosen</li>
                                        <li>Klik icon pensil</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data Dosen</b></h4>
                                    <ol>
                                        <li>Klik menu Data Dosen kemudian Dosen</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mengajar</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data Mengajar</b></h4>
                                    <ol>
                                        <li>Klik menu Data Dosen kemudian mengajar</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data mengajar</b></h4>
                                    <ol>
                                        <li>Klik menu Data Dosen kemudian mengajar</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mahasiswa</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data mahasiswa</b></h4>
                                    <ol>
                                        <li>Klik menu Data mahasiswa kemudian mahasiswa</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>Masukan jumlah data yang ingin di input</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Edit Data mahasiwa</b></h4>
                                    <ol>
                                        <li>Klik menu Data mahasiswa kemudian mahaiswa</li>
                                        <li>Klik icon pensil</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data mahasiswa</b></h4>
                                    <ol>
                                        <li>Klik menu Data mahasiswa kemudian mahasiswa</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">kelas</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data kelas</b></h4>
                                    <ol>
                                        <li>Klik menu Data mahasiswa kemudian kelas</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data kelas</b></h4>
                                    <ol>
                                        <li>Klik menu Data mahasiswa kemudian kelas</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Matakuliah</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data matakuliah</b></h4>
                                    <ol>
                                        <li>Klik menu master data kemudian matakuliah</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Edit Data matakuliah</b></h4>
                                    <ol>
                                        <li>Klik menu master data kemudian matakuliah</li>
                                        <li>Klik icon pensil</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data matakuliah</b></h4>
                                    <ol>
                                        <li>Klik menu master data kemudian matakuliah</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">admin</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data admin</b></h4>
                                    <ol>
                                        <li>Klik menu master data kemudian admin</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Laporan Absensi</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <ol>
                                        <li>Klik menu laporan kemudian laporan absensi</li>
                                        <li>isi form filter yang tersedia (jika diperlukan)</li>
                                        <li>tekan tampilkan untuk menampilkan laporan</li>
                                        <li>tekan cetak untuk mencetak laporan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">laporan kehadiran</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <ol>
                                        <li>Klik menu laporan kemudian laporan kehadiran</li>
                                        <li>isi form filter yang tersedia (jika diperlukan)</li>
                                        <li>tekan tampilkan untuk menampilkan laporan</li>
                                        <li>tekan cetak untuk mencetak laporan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
            <?php
            } else if ($_SESSION['qrlevel'] == "dosen") {
            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Buka Kelas</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <ol>
                                        <li>Klik menu buka kelas</li>
                                        <li>pilih kelas sesuai jadwal</li>
                                        <li>klik tombol buka kelas</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">materi pengajaran</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h4 class="panel-title"><b>Tambah Data materi pengajaran</b></h4>
                                    <ol>
                                        <li>Klik menu Data materi pengajaran</li>
                                        <li>Klik Tambah Data di pojok kanan atas</li>
                                        <li>isi form yang tersedia</li>
                                        <li>klik simpan untuk menyimpan data</li>
                                        <li>klik batal untuk kembali ke halaman list data</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <h4 class="panel-title"><b>Hapus Data materi pengajaran</b></h4>
                                    <ol>
                                        <li>Klik menu materi pengajaran</li>
                                        <li>Klik icon trash</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
            <?php
            } else if ($_SESSION['qrlevel'] == "mahasiswa") {
            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Kelas Aktif</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <ol>
                                        <li>Klik menu kelas aktif</li>
                                        <li>pilih kelas yang tersedia</li>
                                        <li>lalu scan qrcode</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                    <div class="col-lg-6">
                        <!-- OVERVIEW -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">persetujuan materi</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <ol>
                                        <li>Klik menu persetujuan materi</li>
                                        <li>pilih materi yang tersedia</li>
                                        <li>lalu tekan tombol persetujuan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW -->
                    </div>
                    <!---end col-6-->
                </div>
                <!--end row-->
            <?php
            }
            ?>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php include "../../footer.php"; ?>
<?php
if (isset($_GET['hapus'])) {
    $sqlhapus = $DB_CON->prepare("UPDATE dosen SET visible='0' WHERE id_dosen='$_GET[hapus]'");
    $sqlhapus->execute();
    if ($sqlhapus) {
        header("location:index.php");
    } else {
        echo "<script>alert('Erorr Gagal Hapus Data !!!');</script>";
    }
}
?>