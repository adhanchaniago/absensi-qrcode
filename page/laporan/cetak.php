<?php
session_start();
ob_start();
include "../../config.php";
include "../../fungsi.php";
if (isset($_GET['act'])) {
    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];
    if ($_GET['matakuliah'] !== "") {
        $filtermatakuliah = "AND mengajar.kode_matakuliah='$_GET[matakuliah]'";
        $dbmatakuliah=$_GET['matakuliah'];
    } else {
        $filtermatakuliah = "";
        $dbmatakuliah="";
    }

    if ($_GET['dosen'] !== "") {
        $filterdosen = "AND mengajar.id_dosen='$_GET[dosen]'";
        $dbdosen=$_GET['dosen'];
    } else {
        $filterdosen = "";
        $dbdosen="";
    }
} else {
    $tgl1 = date('Y-m-d');;
    $tgl2 = date('Y-m-d');;
    $filterdosen = "";
    $filtermatakuliah = "";
    $dbdosen="";
    $dbmatakuliah="";
}
?>
<html>

<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            text-align: center;
            margin: 0px;
            padding: 0 10px;
        }

        #container {
            width: 100%;
            margin: auto;
        }

        #table {
            width: 100%;
            margin: 0px;
            padding: 0px;
            border-collapse: collapse;
            border: 1px solid #CCCCCC;
        }

        #table tr th {
            width: auto;
            margin: 0px;
            padding: 5px;
            font: bold 12px Arial, Helvetica, sans-serif;
            border: 1px solid #CCCCCC;
        }

        #table tr td {
            width: auto;
            margin: 0px;
            text-align: left;
            padding: 5px;
            font: bold 12px Arial, Helvetica, sans-serif;
            border: 1px solid #CCCCCC;
        }

        h4 {
            font: bold 16px Arial, Helvetica, sans-serif;
            margin: 0px;
            padding: 3px 0;
        }
    </style>
    <script>
        window.print()
    </script>
</head>

<body>
    <div id="container">
        <div class="panel panel-headline">
            <div class="panel-heading text-center">
                <h4 class="panel-title">Laporan Absensi</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Mahasiswa</th>
                                <th>Tgl Absensi</th>
                                <th>Kode Matakuliah</th>
                                <th>Matakuliah</th>
                                <th>Dosen</th>
                                <th>Hari</th>
                                <th>Validasi qrcode</th>
                                <th>Validasi Materi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $DB_CON->prepare("SELECT DISTINCT absensi.id_kelas
                                FROM absensi
                                LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
                                LEFT OUTER JOIN mengajar ON(kelas_mhs.id_mengajar=mengajar.id_mengajar)
                                WHERE
                                absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2' AND absensi.visible='1' $filtermatakuliah $filterdosen");
                            $sql->execute();
                            if ($sql->rowCount() > 0) {
                                $no = 1;
                                while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                    $sqldetail = $DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,absensi.tgl_absensi,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah
                                        ,dosen.nama_dosen,mengajar.jadwal,absensi.validasi,absensi.val_materi
                                        FROM absensi
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas)
                                        LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa)
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar)
                                        LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah)
                                        LEFT OUTER JOIN dosen ON(dosen.id_dosen=mengajar.id_dosen)
                                        WHERE
                                        absensi.id_kelas='$hasil[id_kelas]' AND absensi.visible='1'");
                                    $sqldetail->execute();
                                    $hasildetail = $sqldetail->fetch(PDO::FETCH_ASSOC);
                                    $jadwal = explode("-", $hasildetail['jadwal']);
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $hasildetail['nim_mahasiswa']; ?></td>
                                        <td><?php echo $hasildetail['nama_mahasiswa']; ?></td>
                                        <td><?php echo $hasildetail['tgl_absensi']; ?></td>
                                        <td><?php echo $hasildetail['kode_matakuliah']; ?></td>
                                        <td><?php echo $hasildetail['nama_matakuliah']; ?></td>
                                        <td><?php echo $hasildetail['nama_dosen']; ?></td>
                                        <td><?php echo $jadwal[0]; ?></td>
                                        <td><?php echo GetValidasi($hasildetail['validasi']); ?></td>
                                        <td><?php echo GetValidasi($hasildetail['val_materi']); ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="10" align="center"><b>Data Kosong</b></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>