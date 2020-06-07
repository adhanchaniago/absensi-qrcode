<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar" style="margin: 8px 0 0 0;">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="<?php echo $linkglobal; ?>home.php" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <?php
                    if($_SESSION['qrlevel']=="admin"){
                ?>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Data Dosen</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="<?php echo $linkglobal; ?>page/dosen/" class="">Dosen</a></li>
                            <li><a href="<?php echo $linkglobal; ?>page/mengajar/" class="">Mengajar</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#subMhs" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Data Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subMhs" class="collapse ">
                        <ul class="nav">
                            <li><a href="<?php echo $linkglobal; ?>page/mahasiswa/" class="">Mahasiswa</a></li>
                            <li><a href="<?php echo $linkglobal; ?>page/kelas/" class="">Kelas</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#subPagesUser" data-toggle="collapse" class="collapsed"><i class="lnr lnr-inbox"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPagesUser" class="collapse ">
                        <ul class="nav">
                            <li><a href="page-profile.html" class="">Admin</a></li>
                            <li><a href="<?php echo $linkglobal; ?>page/matakuliah/" class="">Master Matakuliah</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="icons.html" class=""><i class="lnr lnr-file-empty"></i> <span>Laporan</span></a></li>
                <?php
                    }else if($_SESSION['qrlevel']=="dosen"){
                ?>
                <li><a href="<?php echo $linkglobal; ?>page/bukakelas" class=""><i class="lnr lnr-lock"></i> <span>Buka Kelas</span></a></li>
                <?php
                    }else if($_SESSION['qrlevel']=="mahasiswa"){
                ?>
                <li><a href="<?php echo $linkglobal; ?>page/kelas-aktif" class=""><i class="lnr lnr-checkmark-circle"></i> <span>Kelas Aktif</span></a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->