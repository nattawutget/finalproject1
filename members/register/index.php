<?php include('include/head.php') ?>
<?php include('include/script.php') ?>
<?php
include('connection/connection.php');
if (isset($_POST) && !empty($_POST)) {
	// print_r($_POST);
	// exit();
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	if (!empty($_POST['email'])) {
		$sql_check = "SELECT * FROM tb_user where email = '$email'";
		$query_check = mysqli_query($connection, $sql_check);
		$row_check = mysqli_num_rows($query_check);
		if ($row_check > 0) {
			$alert = '<script type="text/javascript">';
			$alert .= 'alert("ชื่อผู้ใช้ซ้ำกรุณากรอกใหม่");';
			$alert .= 'window.location.href = "javascript:history.back()";';
			$alert .= '</script>';
			echo $alert;
		} else {
			if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
				$password = sha1(md5($_POST['password']));
				$confirm_password = sha1(md5($_POST['confirm_password']));
				if ($password != $confirm_password) {
					echo '<script>';
					echo 'alert("รหัสผ่านที่กรอก 2 ช่องไม่ตรงกัน");';
					echo  'window.location.href = "javascript:history.back()";';
					echo '</script>';
					exit();
				}
			} else {
			}


			$sql = "INSERT INTO tb_user (firstname, lastname, email,phone,password)
                                            VALUES ('$firstname', '$lastname', '$email','$phone','$password')";
			// echo $sql;
			// exit();
			if (mysqli_query($connection, $sql)) {
				$alert = '<script type="text/javascript">';
				$alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
				$alert .= 'window.location.href = "..";';
				$alert .= '</script>';
				echo $alert;
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}
			mysqli_close($connection);
		}
	}
}
?>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<!-- <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div> -->
					<h2 class="auth-heading text-center mb-1 pagin-head">สมัครสมาชิกระบบการจัดการข้อมูลการจองสนามและอุปกรณ์กีฬาฟุตบอล <br>SM FOOTBALL CLUB</h2>
					<div class="auth-form-container text-start">
						<form action="" method="post" class="auth-form register-form">
							<div class="email mb-1">
								<label class="form-label  ">อีเมล</label> <label class="error">*</label>
								<input name="email" type="email" class="form-control signin-email" placeholder="example@address.com" required="required">
							</div>
							<div class="name mb-1">
								<label class="form-label">ชื่อ</label> <label class="error">*</label>
								<input name="firstname" type="text" class="form-control signin-email" placeholder="กรุณากรอกชื่อ" title="กรุณากรอกชื่อ" required="required">
							</div>
							<!-- pattern="^[a-zA-Z\s]+$" -->
							<div class="surname mb-1">
								<label class="form-label">นามสกุล</label> <label class="error">*</label>
								<input name="lastname" type="text" class="form-control signin-email" placeholder="กรุณากรอกนามสกุล" title="กรุณากรอกนามสกุล" required="required">
							</div>
							<div class="phone mb-1">
								<label class="form-label">หมายเลขโทรศัพท์</label> <label class="error">*</label>
								<input name="phone" type="text" class="form-control signin-email" placeholder="เพิ่มหมายเลขโทรศัพท์" pattern="^[0-9\s]+$" title="กรุณากรอกชื่อเป็นตัวเลขอย่างเดียวเท่านั้น" minlength="10" maxlength="10" required="required">
							</div>
							<div class="password mb-1">
								<label class="form-label">รหัสผ่าน</label> <label class="error">*</label>
								<input name="password" type="password" class="form-control signin-email" placeholder="รหัสผ่าน" pattern=".{8,}" title="จะต้องมีอย่างน้อย8ตัวขึ้นไป" required="required">
							</div>
							<div class="con-password mb-1">
								<label class="form-label">ยืนยันรหัสผ่าน <label class="error">*</label> </label>
								<input name="confirm_password" type="password" class="form-control signin-email" placeholder="ยืนยันรหัสผ่าน" pattern=".{8,}" title="จะต้องมีอย่างน้อย8ตัวขึ้นไป" required="required">
							</div>
							<div class="text-center">
								<button type="submit" class="btn-color w-100 theme-btn mx-auto mb-3">สมัครสมาชิก</button>
							</div>
							<div class="text-end">
								<a href=".." class=" w-100 theme-btn mx-auto btn-back">กลับหน้าเข้าสู่ระบบ</a>
							</div>
						</form>
					</div>
					<!--//auth-form-container-->

				</div>
				<!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-2">
						<small class="copyright">ระบบจองคิวสนามบอลSM FOOTBALL CLUB หน้าบ้าน <i class="fas fa-heart" style="color: #fb866a;"></i> พัฒนาโดย <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">SWE NBU</a> </small>
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
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->
	</div>
	<!--//row-->
</body>

</html>
<style>
	.btn-color {
		margin-top: 25px;
		background-color: #0275d8;
		color: white;
		border-radius: 10px;
	}

	.pagin-head {
		margin-bottom: 30px !important;
	}

	.form-control {
		border-color: blue;
		border-radius: 10px;
		color: black !important;
	}

	.btn-back {
		color: black !important;
		text-decoration: revert;
	}

	.error {
		color: red !important;
		font-size: 16px;
	}

	.mb-1 {
		margin-bottom: 20px !important;
	}

	* {
		font-family: 'Kanit', sans-serif;
	}

	.display-center {
		display: flex;
		justify-content: center;
		align-items: center;
	}

</style>