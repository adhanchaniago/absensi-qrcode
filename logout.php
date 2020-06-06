<?php
session_start();
ob_start();
session_destroy();
/*if(isset($_SESSION['pelpetugasdaftar'])){
	unset($_SESSION['pelpetugasdaftar']);
	unset($_SESSION['isloginpetugasdaftar']);
}else if(isset($_SESSION['peldokter'])){
	unset($_SESSION['peldokter']);
	unset($_SESSION['islogindokter']);
}else if(isset($_SESSION['pelpihakluar'])){
	unset($_SESSION['pelpihakluar']);
	unset($_SESSION['isloginpihakluar']);
}else if(isset($_SESSION['pelpetugaspi'])){
	unset($_SESSION['pelpetugaspi']);
	unset($_SESSION['isloginpetugaspi']);
}else if (isset($_SESSION['peladmin'])) {
	unset($_SESSION['peladmin']);
	unset($_SESSION['isloginadmin']);
}else if(isset($_SESSION['pelkepalarm'])){
	unset($_SESSION['pelkepalarm']);
	unset($_SESSION['isloginkepalarm']);
}*/
header("location:login.php");
?>