<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">SM Football club</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link  <?= $url[0] == '' || $url[0] == 'index' ? 'active-menu-custom' : '' ?> " aria-current="page" href="index.php">หน้าหลัก</a>
                </li>

                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link  <?= $url[0] == 'contect' ? 'active-menu-custom' : '' ?> " href="contect.php">ติดต่อ</a>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item menu-custom mx-2">
                        <a class="nav-link  <?= $url[0] == 'login' ? 'active-menu-custom' : '' ?> " href="members">เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                        <a class="nav-link  <?= $url[0] == 'register' ? 'active-menu-custom' : '' ?> " href="./members/register/index.php">สมัครสมาชิก</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>