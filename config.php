<?php
//Variabel Server Untuk Koneksi Antara PDO Dan MYSQL
$DB_HOST="localhost";
$DB_NAME="absensiqr";
$DB_USER="root";
$DB_PASS="";

//Start Koneksi PDO DAN MYSQL
try{
	$DB_CON=new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
	$DB_CON->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e){
	echo $e->getMessage();
}
//END Koneksi PDO DAN MYSQL
$urlselect=1;
?>
