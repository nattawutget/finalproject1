<?php
include('connection/connection.php');
if (isset($_POST) && !empty($_POST)) {
  // print_r($_POST);
  // exit();
  if (isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['confirm_phone']) && !empty($_POST['confirm_phone'])) {
    $phone = $_POST['phone'];
    $confirm_phone = $_POST['confirm_phone'];
    if ($phone != $confirm_phone) {
      echo '<script>';
      echo 'alert("เบอร์ที่กรอก 2 ช่องไม่ตรงกัน");';
      echo  'window.location.href = "register.php";';
      echo '</script>';
      exit();
    }
  } else {
      echo '<script>';
      echo 'alert("กรุณกรอกข้อมูลใหม่");';
      echo  'window.location.href = "register.php";';
      echo '</script>';
    exit();
  }
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $user = $_POST['user'];

  $sql = sprintf(
    "INSERT INTO tb_user (firstname,lastname,email,user,phone) VALUES ('%s','%s','%s','%s','%s')",
    $firstname,
    $lastname,
    $email,
    $user,
    $phone
  );
  // echo $sql;
  // exit();
  $query = mysqli_query($connection, $sql);
  if ($query) {
      echo '<script>';
      echo 'alert("สมัครสมาชิกสำเร็จ");';
      echo  'window.location.href = "register.php";';
      echo '</script>';
      exit();
  } else {
      echo '<script>';
      echo 'alert("สมัครสมาชิกไม่สำเร็จ");';
      echo  'window.location.href = "register.php";';
      echo '</script>';
      exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>

<body>
  <!-- navbar -->
  <?php include('includes/navbar.php'); ?>

  <!-- slide  banner-->
  <!-- <?php include('includes/banner.php'); ?> -->
  <!-- content -->
  <h1 class="my-5 py-4 pb-4 text-center bg-secondary bg-gradient text-white wid">สมัครสมาชิก</h1>
  <div class="container mb-5">
    <div class="row">
      <div class="col-6 offset-3">

        <form method="POST">

          <div class=" form-group mb-3">
            <div class="row">
              <div class="col-12 col-md-6">
                <label class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="firstname">
                <div class="form-text">กรุณากรอกชื่อ</div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname">
                <div class="form-text">กรุณากรอกนามสกุล</div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">อีเมล</label>
                <input type="email" class="form-control" name="email">
                <div class="form-text">กรุณากรอกอีเมล</div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="user">
                <div class="form-text">กรุณากรอกชื่อผู้ใช้</div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">เบอร์เบอร์ติดต่อ</label>
                <input type="phone" class="form-control" placeholder="*กรอกได้เฉพาะตัวเลข*" name="phone">
                <div class="form-text">กรุณากรอกเบอร์ติดต่อ</div>
              </div>
              <div class="col-12 col-md-6 ">
                <label class="form-label">ยืนยันเบอร์เบอร์ติดต่อ</label>
                <input type="text" class="form-control" placeholder="*กรอกได้เฉพาะตัวเลข*" name="confirm_phone">
                <div class="form-text">กรุณากรอกยืนยันเบอร์ติดต่อ</div>
              </div>
              <label class="form-label text-center text-danger">เบอร์ติดต่อจะใช้เป็นรหัสผ่าน</label>
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>

      </form>
    </div>
  </div>
  </div>
  <!-- footer -->
  <?php include('includes/footer.php'); ?>
</body>
<style>
  .wid{
    width: 100%;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>