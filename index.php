<?php
include('connection/connection.php');

// query type product
$sql = "SELECT * FROM tb_type_product_show";
$query_type_product = mysqli_query($connection, $sql);

// query product
$sql = "SELECT *,tb_stadium_show.id,tb_stadium_show.title,tb_type_product_show.title AS type_title FROM tb_stadium_show LEFT JOIN tb_type_product_show ON tb_stadium_show.type_product_id = tb_type_product_show.id";
$query_stadium = mysqli_query($connection, $sql);
$sql = "SELECT *,tb_accessory_show.id,tb_accessory_show.title,tb_type_product_show.title AS type_title FROM tb_accessory_show LEFT JOIN tb_type_product_show ON tb_accessory_show.type_product_id = tb_type_product_show.id";
$query_accessory = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>

<body class="wid">
  <!-- navbar -->
  <?php include('includes/navbartest.php'); ?>

  <!-- slide  banner-->
  <?php include('includes/banner.php'); ?>
  <!-- content -->
  <div class="container my-5 text-center">
    <div class="mb-4">
      <div class="alert alert-success " role="alert">
        คุณต้องการเเอดไลน์โปรดคลิ๊กปุ่มด้านล่าง
        <div class="mt-2">
          <a href="https://lin.ee/xnWV9sB"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" height="36" border="0"></a>
        </div>
      </div>
    </div>
    <h1>รายการสินค้า</h1>
    <ul class="nav justify-content-center my-3 ">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">สนาม</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">อุปกรณ์กีฬา</button>
        </li>
      </ul>
    </ul>
    <div class="row ">
      <div class="tab-content " id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row ">
            <?php foreach ($query_stadium as $data) : ?>
              <div class="col-12 col-lg-4 p-4">
                <div class="card p-5 ">
                  <img src="upload/stadium/<?= $data['image'] ?>" class="card-img-top" alt="<?= $data['image'] ?>" width="190" height="190">
                  <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <h5 class="card-title">เรทราคาการจอง </h5>
                    <h5 class="card-title"><?= $data['detail'] ?></h5>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="row">
            <?php foreach ($query_accessory as $data) : ?>
              <div class="col-12 col-lg-4 p-4">
                <div class="card p-5 ">
                  <img src="upload/accessory/<?= $data['image'] ?>" class="card-img-top" alt="<?= $data['image'] ?>" width="190" height="190">
                  <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <h5 class="card-title">เรทราคาการจอง </h5>
                    <h5 class="card-title"><?= $data['detail'] ?></h5>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
      <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">ติดตามข่าวสารข้อมูลได้ในline official ของเรา</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="alert alert-success " role="alert">
              คุณต้องการเเอดไลน์โปรดคลิ๊กปุ่มด้านล่าง
              <div class="mt-2">
                <a href="https://lin.ee/xnWV9sB"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" height="36" border="0"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <button type="button" class="btn btn-primary me-md-2" style="position: sticky; bottom: 10px; left: 800px;">Primary</button> -->


</body>

</html>
<script>
  $(document).ready(function() {
    $('#memberModal').modal('show');
  });
</script>
<style>
  .wid {
    width: 100%;
  }
</style>