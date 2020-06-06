<?php
session_start();
ob_start();
include"config.php";
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="assets/img/LOGO-UNDHIRA-fix.png" alt="Undhira Logo"></div>
                                <p class="lead">Login untuk Memulai</p>
                            </div>
                            <form class="form-auth-small" action="" method="POST">
                                <div class="form-group">
                                    <label for="signin-username" class="control-label sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" id="signin-username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Level</label>
                                    <select class="form-control" name="level">
                                        <option value="admin">Administrator</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Sistem Informasi Absensi dengan QR-CODE</h1>
                            <p>Universitas Dhyana Pura</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
<?php
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $level=$_POST['level'];

    if($level=="admin"){
        $table="admin";
        $level="admin";
        $qrid="id_admin";
    }else if($level=="dosen"){
        $table="dosen";
        $level="dosen";
        $qrid="id_dosen";
    }else if($level=="mahasiswa"){
        $table="mahasiswa";
        $level="mahasiswa";
        $qrid="nim_mahasiswa";
    }

    $sql=$DB_CON->prepare("SELECT * FROM $table WHERE username='$username' AND password='$password' AND visible='1'");
    $sql->execute();
    if($sql->rowCount()==0){
        echo"<script>alert('Username atau Password salah!!');</script>";
    }else{
        $hasil=$sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['qrlog']=true;
        $_SESSION['qrlevel']=$level;
        $_SESSION['qrid']=$hasil[$qrid];
        header("location:home.php");
    }
}
?>