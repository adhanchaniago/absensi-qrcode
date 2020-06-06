<?php
include"../config.php";
$dosen=$_POST['dosen'];
$sqlmatakuliah=$DB_CON->prepare("SELECT matakuliah.*,mengajar.* FROM mengajar LEFT OUTER JOIN matakuliah ON(matakuliah.kode_matakuliah=mengajar.kode_matakuliah) WHERE mengajar.id_dosen='$dosen' AND mengajar.visible='1'");
$sqlmatakuliah->execute();
while($hasilmatakuliah=$sqlmatakuliah->fetch(PDO::FETCH_ASSOC)){
    echo"<option value='$hasilmatakuliah[id_mengajar]'>$hasilmatakuliah[nama_matakuliah]</option>";
}

?>
