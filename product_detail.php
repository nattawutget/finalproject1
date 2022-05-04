<?php
include('connection/connection.php');
$url = explode('?', $_SERVER['REQUEST_URI'], 2);
// print_r($url);
// exit();
// query type product
$sql = "SELECT * FROM tb_type_product";
$query_type_product = mysqli_query($connection, $sql);

// query product
$sql = "SELECT *,tb_stadium.id,tb_stadium.title,tb_type_product.title AS type_title FROM tb_stadium LEFT JOIN tb_type_product ON tb_stadium.type_product_id = tb_type_product.id";
if(isset($_GET['type_product_id']) && !empty($_GET['type_product_id'])){
  $sql .=" WHERE type_product_id = '".$_GET['type_product_id']."'";
}
$query_stadium = mysqli_query($connection, $sql);

$sql = "SELECT *,tb_accessory.id,tb_accessory.title,tb_type_product.title AS type_title FROM tb_accessory LEFT JOIN tb_type_product ON tb_accessory.type_product_id = tb_type_product.id";
if(isset($_GET['type_product_id']) && !empty($_GET['type_product_id'])){
  $sql .=" WHERE type_product_id = '".$_GET['type_product_id']."'";
}
$query_accessory = mysqli_query($connection, $sql);
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
  <h1 class="my-5 py-4 pb-4 text-center bg-secondary bg-gradient text-white">รายการสินค้า</h1>
  <div class="container ">
    <div class="row">
      <div class="col-3">
        <ul class="list-group mt-4">
        <li class="list-group-item bg-dark text-white p-3">ประเภทสินค้า</li>
        <a href="product.php" class="list-group-item text-dark list-menu-custom  <?=!isset($_GET['type_product_id']) ? 'active-list-menu-custom' : '' ?> ">ทั้งหมด</a>
        <?php foreach ($query_type_product as $data) : ?>
          <a href="?type_product_id=<?=$data['id']?>" class="list-group-item text-dark list-menu-custom <?=isset($_GET['type_product_id']) && $_GET['type_product_id'] == $data['id'] ? 'active-list-menu-custom' : ''  ?>"> <?= $data['title'] ?></a>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-9">
        <div class="row">
          <?php foreach ($query_stadium as $data) : ?>
            <div class="col-12 col-lg-4 p-4">
              <div class="card p-4">
                <img src="upload/fake.png" class="card-img-top" alt="fake.png">
                <div class="card-body text-center">
                  <h5 class="card-title"><?= $data['title'] ?></h5>
                  <p class="card-text mb-3">ประเภท : <?=$data['type_title']?></p>
                  <a href="product-detail.php?id=<?=$data['id']?>" class="btn btn-primary px-auto">จอง</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php foreach ($query_accessory as $data) : ?>
            <div class="col-12 col-lg-4 p-4">
              <div class="card p-4">
                <img src="upload/fake.png" class="card-img-top" alt="fake.png">
                <div class="card-body text-center">
                  <h5 class="card-title"><?= $data['title'] ?></h5>
                  <p class="card-text mb-3">ประเภท : <?=$data['type_title']?></p>
                  <a href="product-detail.php?id=<?=$data['id']?>" class="btn btn-primary">จอง</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php include('includes/footer.php'); ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>