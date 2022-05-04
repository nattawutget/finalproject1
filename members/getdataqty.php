<?php include('../connection/connection.php') ?>
<?php
$sizeid = $_GET["aid"];
$sql = "SELECT qty FROM tb_accessory WHERE accessory_id = $aid";
$table1 = mysqli_query($connection, $sql);
?>
<div class="item  py-1">
    <div class="row  align-items-center">
        <div class="mb-1 col-lg-12">
            <div id="qty">
            <div class="item-label mb-2"><strong>จำนวนที่จอง</strong></div>
                <div class="item-data"><input type="text" class="form-control" name="qtyaccessory" value=""></div>
            </div>
        </div>
    </div>
</div>