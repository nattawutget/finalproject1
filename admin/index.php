<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php') ?>
<?php include('include/script.php') ?>
<?php if (isset($_SESSION['admin_login']) && !empty($_SESSION['admin_login'])) : ?>

    <body class="app">
        <?php include('include/header.php') ?>
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <?php
                    if (!isset($_GET['page']) && empty($_GET['page'])) {
                        include('dashboard/index.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'admin') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('admin/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('admin/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'resetpassword') {
                            include('admin/resetpassword.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('admin/delete.php');
                        } else {
                            include('admin/index.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'customer') {
                        include('customer/index.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'product_type') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('product_type/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('product_type/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('product_type/delete.php');
                        } else {
                            include('product_type/index.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'accessory_product') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('accessory_product/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('accessory_product/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('accessory_product/delete.php');
                        } else {
                        include('accessory_product/index.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'stadium_product') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('stadium_product/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('stadium_product/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('stadium_product/delete.php');
                        } else {
                            include('stadium_product/index.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'qty_accessory') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('qty_accessory/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('stadium_product/edit.php');
                        } else {
                            include('qty_accessory/index.php');
                        }
                    }elseif (isset($_GET['page']) && $_GET['page'] == 'history') {
                        if (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('history/edit.php');
                        }else{
                          include('history/index.php');  
                        }
                        
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
                        include('profile/index.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
                        include('logout/index.php');
                    }

                    ?>
                </div>
            </div>
            <?php include('include/footer.php') ?>
        </div>



    </body>
<?php else : ?>
    <?php include('login/index.php') ?>
<?php endif; ?>

</html>