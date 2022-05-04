<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$url = explode('.', $url[2]);
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark ">
    <div class="container-fluid">
        <!-- nav logo -->
        <a class="navbar-brand me-0 logo-absoulte text-white " href="index.php">SM FOOTBALL CLUB</a>

        <!-- navbar button mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="
        #navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navbar menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == '' || $url[0] == 'index' ? 'active-menu-custom' : '' ?> " aria-current="page" href="index.php">หน้าหลัก</a>
                </li>
                <!-- <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'product' ? 'active-menu-custom' : '' ?> " href="members/?page=soccer_fields">จองสนาม</a>
                </li> -->
                <!-- <li class="nav-item dropdown menu-dropdown mx-2 text-white">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        การจอง
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?= $url[0] == 'soccer_fields' ? 'active-menu-custom' : '' ?>" href="members/?page=soccer_fields">จองสนาม</a></li>
                        <li><a class="dropdown-item <?= $url[0] == 'products' ? 'active-menu-custom' : '' ?>" href="members/?page=products">จองอุปกรณ์กีฬา</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?= $url[0] == 'summary' ? 'active-menu-custom' : '' ?>" href="members/?page=summary">สรุปราคา</a></li>
                        <li><a class="dropdown-item <?= $url[0] == 'cancel' ? 'active-menu-custom' : '' ?>" href="members/?page=cancel">ยกเลิกการจอง</a></li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white<?= $url[0] == 'history' ? 'active-menu-custom' : '' ?>" href="members/?page=history">ประวัติการจอง</a>
                </li> -->
                <!-- <li class="nav-item menu-custom mx-2">
                    <div class="bg-white h-100" style="width:1px"></div> -->
                <!-- </li>-->
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'login' ? 'active-menu-custom' : '' ?> " href="members">เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'register' ? 'active-menu-custom' : '' ?> " href="register.php">สมัครสมาชิก</a>
                </li> 
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'contect' ? 'active-menu-custom' : '' ?> " href="contect.php">ติดต่อ</a>
                </li>
        </div>
    </div>
</nav>
