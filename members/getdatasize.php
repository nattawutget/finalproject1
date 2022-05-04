<?php include('../connection/connection.php') ?>
<?php
$accessoryid = $_GET["aid"];
$sql = "SELECT id,size,qty FROM tb_accessory_stock WHERE accessory_id = $accessoryid";
$table1 = mysqli_query($connection, $sql);
?>
<div class="item  py-1">
    <div class="row  align-items-center">
        <div class="mb-1 col-lg-12">
            <div id="size">
                <label class="form-label">เลือกไซต์</label>
                <select name="sid" class="form-control" style="height: unset !important;" required>
                    <option value="" selected disabled>=== เลือก ===</option>
                    <?php
                    foreach ($table1 as $size) {
                    ?>
                        <option value="<?php echo $size["id"]; ?>">ไชต์: <?php echo $size["size"]; ?> จำนวนคงเหลือ:<?php echo $size["qty"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
