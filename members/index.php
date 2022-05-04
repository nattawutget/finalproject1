<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php') ?>
<?php include('include/script.php') ?>
<?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login']) ) : ?>

	<body class="app">
		<?php include('include/header.php') ?>
		<div class="app-wrapper">
			<div class="app-content pt-3 p-md-3 p-lg-4">
				<div class="container-xl">
					<?php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					} else {
						$page = "";
					}
					switch ($page) {
						case '':
							include('dashboard/index.php');
							break;
						case 'logout':
							include('logout/index.php');
							break;
						case 'products':
							include('accessory_product/index.php');
							break;
						case 'products_insert':
							include('accessory_product/index2.php');
							break;
						case 'soccer_fields':
							include('animated-calendar-event-gc/modal.php');
							break;
						case 'booking_soccer_fields':
							include('animated-calendar-event-gc/index.php');
							break;
						case 'booking_soccer_fields2':
							include('animated-calendar-event-gc/index2.php');
							break;
						case 'cancel':
							include('cancel.php');
							break;
						case 'confirmcancel':
							include('cancel_db.php');
							break;
						case 'summary':
							include('reports/index2.php');
							break;
						case 'summarydate':
							include('reports/index3.php');
							break;
						case 'history':
							include('reports/index.php');
							break;
						case 'register':
							include('register/index.php');
							break;
						case 'profile':
							include('profile/index.php');
							break;
						default:
							echo "error";
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
<?php include('include/script2.php') ?>

</html>