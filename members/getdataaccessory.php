<?php include('../connection/connection.php') ?>
<?php
$typeid = $_GET["typeid"];
$sql = "SELECT id,title,image FROM tb_accessory WHERE type_accessory_id = $typeid";
$table1 = mysqli_query($connection, $sql);
?>
<div class="item  py-1">
    <div class="row  align-items-center">
        <div class="mb-1 col-lg-12">
            <div id="accessory">
                <label class="form-label">เลือกอุปกรณ์กีฬา</label>
                <select name="aid" id="aid" class="form-control" style="height: unset !important;" onchange="getdata1(document.getElementById('aid').value); " required>
                    <option value selected disabled>=== เลือก ===</option>
                    <?php
                    foreach ($table1 as $accessory) {
                    ?>
                        <option value="<?php echo $accessory["id"]; ?>"><?php echo $accessory["title"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>