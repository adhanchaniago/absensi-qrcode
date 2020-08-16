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
        $dbmatakuliah = $_GET['matakuliah'];
    } else {
        $filtermatakuliah = "";
        $dbmatakuliah = "";
    }
} else {
    $tgl1 = date('Y-m-d');;
    $tgl2 = date('Y-m-d');;
    $filtermatakuliah = "";
    $dbmatakuliah = "";
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
        @media print
        {
            div#head{display:block}
        }
    </style>
    <script>
        window.print()
    </script>
</head>

<body>
    <div id="head" style="text-align: center; width:100%; margin: 0 0 10px 0; padding: 0px; border-bottom:3px solid #000;">
        <div style="width:100%; margin: auto; padding:0px;">
            <div style="float: left; margin: 0 10px 10px 0;">
                <img src="<?php echo $linkglobal; ?>/assets/img/LOGO-UNDHIRA-fix.png">
            </div>

            <div style="float: left; margin: 0px; padding:0px">
                <h1 style="margin: 0px; padding:5px 0">UNIVERSITAS DHYANA PURA</h1>
                <h4 style="margin: 0px; padding:5px 0">UNDHIRA - BALI</h4>
                <p style="margin: 0px; padding:5px 0">SK MENDIKNAS RI. NOMOR 142/E/O/2011</p>
                <h4 style="margin: 0px; padding:5px 0">Perguruan tinggi teladan dan unggulan</h4>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <div id="container">

        <div class="panel panel-headline">
            <div class="panel-heading text-center">
                <h3 class="panel-title">Laporan Kehadiran</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Mahasiswa</th>
                                <th>Kode Matakuliah</th>
                                <th>Matakuliah</th>
                                <th>Jumlah Pertemuan</th>
                                <th>Kehadiran</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $DB_CON->prepare("SELECT mahasiswa.nim_mahasiswa,mahasiswa.nama_mahasiswa,matakuliah.nama_matakuliah,matakuliah.kode_matakuliah,mengajar.id_mengajar FROM `kelas_mhs` LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) LEFT OUTER JOIN mahasiswa ON(mahasiswa.nim_mahasiswa=kelas_mhs.nim_mahasiswa) LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE kelas_mhs.visible='1' $filtermatakuliah ORDER BY mahasiswa.nim_mahasiswa ASC");
                            $sql->execute();
                            if ($sql->rowCount() > 0) {
                                $no = 1;
                                while ($hasil = $sql->fetch(PDO::FETCH_ASSOC)) {
                                    $sqlpertemuan = $DB_CON->prepare("SELECT DISTINCT absensi.tgl_absensi FROM `absensi` 
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) 
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) WHERE absensi.visible='1' AND kelas_mhs.id_mengajar='$hasil[id_mengajar]' AND absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2'");
                                    $sqlpertemuan->execute();
                                    $hasilpertemuan = $sqlpertemuan->rowCount();

                                    $sqlkehadiran = $DB_CON->prepare("SELECT DISTINCT absensi.tgl_absensi FROM `absensi` 
                                        LEFT OUTER JOIN kelas_mhs ON(kelas_mhs.id_kelas_mhs=absensi.id_kelas) 
                                        LEFT OUTER JOIN mengajar ON(mengajar.id_mengajar=kelas_mhs.id_mengajar) WHERE absensi.visible='1' AND kelas_mhs.id_mengajar='$hasil[id_mengajar]' AND kelas_mhs.nim_mahasiswa='$hasil[nim_mahasiswa]' AND absensi.tgl_absensi BETWEEN '$tgl1' AND '$tgl2'");
                                    $sqlkehadiran->execute();
                                    $hasilkehadiran = $sqlkehadiran->rowCount();

                                    if ($hasilpertemuan == 0 and $hasilkehadiran == 0) {
                                        $persen = 0;
                                    } else {
                                        $persen = ceil($hasilkehadiran / $hasilpertemuan * 100);
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $hasil['nim_mahasiswa']; ?></td>
                                        <td><?php echo $hasil['nama_mahasiswa']; ?></td>
                                        <td><?php echo $hasil['kode_matakuliah']; ?></td>
                                        <td><?php echo $hasil['nama_matakuliah']; ?></td>
                                        <td><?php echo $hasilpertemuan; ?></td>
                                        <td><?php echo $hasilkehadiran; ?></td>
                                        <td><?php echo $persen; ?>%</td>
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
        <!-- END OVERVIEW -->
    </div>
</body>

</html>