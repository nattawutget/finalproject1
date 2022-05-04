<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php') ?>
<?php include('include/script.php') ?>
<?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) : ?>

    <body class="app">
        <?php include('include/header.php') ?>
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <?php
						echo "hello";
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