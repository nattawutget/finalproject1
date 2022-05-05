<?php
if (isset($_POST) && !empty($_POST)) {
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	$email = $_POST['email'];
	$pass = sha1(md5($_POST['password']));
	$sql = "SELECT * FROM tb_user WHERE email = '$email' AND password = '$pass'";
	$query = mysqli_query($connection, $sql);
	$row = mysqli_num_rows($query);
	if ($row > 0) {
		$result = mysqli_fetch_assoc($query);
		$_SESSION['user_login'] = $result['email'];
		$_SESSION['user_id'] = $result['id'];
		$_SESSION['user_name'] = $result['firstname'];
		#die($_SESSION['user_id']);
		$alert = '<script type="text/javascript">';
		$alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
		$alert .= 'window.location.href = "";';
		$alert .= '</script>';
		echo $alert;
		exit();
	} else {
		$alert = '<script type="text/javascript">';
		$alert .= 'alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");';
		$alert .= 'window.location.href = "";';
		$alert .= '</script>';
		echo $alert;
		exit();
	}
}

?>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<!-- <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div> -->
					<h2 class="auth-heading text-center mb-1">เข้าสู่ระบบการจัดการข้อมูลการจองสนามและอุปกรณ์กีฬาฟุตบอล <br> SM FOOTBALL CLUB</h2>
					<div class="auth-form-container text-start">
						<form action="" method="post" class="auth-form login-form">
							<div class="email mb-3">
								<input name="email" type="email" class="form-control signin-email" placeholder="example@address.com" required="required">
							</div>
							<!--//form-group-->
							<div class="password mb-3">
								<input name="password" type="password" class="form-control signin-password" placeholder="รหัสผ่าน" required="required">
							</div>
							<!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn-color w-100 theme-btn mx-auto mb-3">เข้าสู่ระบบ</button>
							</div>
							<div class="text-center">
								<a href="./register/index.php" class="btn-color1 w-100 theme-btn mx-auto left">สมัครสมาชิก</a>
								<a href="./register/index.php" class="btn-color1 w-100 theme-btn mx-auto right">ลืมรหัสผ่าน</a>
							</div>
							<div class="text-end">
								<a href=".." class=" w-100 theme-btn mx-auto btn-back">กลับหน้าหลัก</a>
							</div>
						</form>
					</div>
					<!--//auth-form-container-->

				</div>
				<!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright">ระบบจองคิวสนามบอล SM FOOTBALL CLUB หน้าบ้าน <i class="fas fa-heart" style="color: #fb866a;"></i> พัฒนาโดย <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">SWE NBU</a> </small>

					</div>
				</footer>
				<!--//app-auth-footer-->
			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background">

			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<!-- <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div> -->
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->

	</div>
	<!--//row-->

	<!-- asdasd -->
</body>

</html>
<style>
	.btn-color {
		background-color: #0275d8;
		color: white;
		border-radius: 10px;
	}

	.btn-color1 {
		color: black;
		margin-bottom: 100px;
	}

	.form-control {
		border-color: blue;
		border-radius: 10px;
		color: black !important;
        margin: auto !important;
	}

	.btn-back {
		color: black !important;
		text-decoration: revert;
	}

	.mb-1 {
		margin-bottom: 20px !important;
	}

	.text-center {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.text-end,
	.text-start {
		text-align: center !important;
	}
</style>