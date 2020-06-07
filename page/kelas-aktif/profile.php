<?php
include "../../header.php";
include "../../sidebar.php";
$link = $linkglobal . 'page/kelas-aktif/';
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="<?php echo $linkglobal; ?>assets/img/user-medium.png" class="img-circle" alt="Avatar" style="margin: 0 0 30px 0;">
                                    <!--<h3 class="name" style="color: green;">Samuel Gold</h3>
                                    <span class="online-status status-available">Available</span>-->
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                            Nama <span>I Gede Narsa Wijaya</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            Nim <span>15114101010</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            Telp <span>0821123456789</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Mata Kuliah</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Kode Matakuliah <span>24 Aug, 2016</span></li>
                                        <li>Nama Matakuliah <span>(124) 823409234</span></li>
                                        <li>Hari <span>samuel@mydomain.com</span></li>
                                        <li>Jam <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li>
                                        <li>Dosen <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li>
                                    </ul>
                                </div>
                                <div class="profile-info text-center no-padding">
                                   <img src="<?php echo $linkglobal; ?>assets/img/QR-code.png">
                                </div>
                            </div>
                            <!-- END PROFILE DETAIL -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <?php include "../../footer.php"; ?>