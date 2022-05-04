<?php
$sql = "SELECT id,title FROM tb_accessory_type";
$table = mysqli_query($connection, $sql);
?>
<script>
    function getdata(str) {
        if (str.length == 0) {
            document.getElementById("accessory").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("accessory").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getdata.php?typeid=" + str, true);
            xmlhttp.send();
        }
    }

    function getdata1(str) {
        if (str.length == 0) {
            document.getElementById("qty").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("qty").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getdata1.php?aid=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">จองอุปกรณ์กีฬา</h1>
    </div>
    <div class="col-auto">
    </div>
</div>

<hr class="mb-4">

<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">

                <form action="accessory_product/index_db.php">

                    <table class="table  table-hover" id="tableall" border=1>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">รูปภาพ</th>
                                <th scope="col">ชนิดอุปกรณ์กีฬา</th>
                                <th scope="col">ไซต์</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 0;
                            foreach ($query as $data) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?= ++$i ?></td>
                                    <td class="align-middle">
                                        <img src="upload/product/<?= $data['image'] ?>" class="rounded" width="60" height="60">
                                    </td>
                                    <td class="align-middle"><input type=text id=amount[<?= $i ?>] name=amount[<?= $i ?>] value=0></td>
                                    <td class="align-middle"><?= $data['title'] ?></td>
                                    <td class="align-middle"><?= number_format($data['price'])  ?></td>
                                    <td class="align-middle"><?= ($data['status'] == 0 ? '<span class = "text-success">เปิดใช้งาน</span>' :
                                                                    '<span class = "text-danger">ปิดใช้งาน</span>') ?></td>
                                    <td class="align-middle">
                                        <select id="select_prod_size[<?= $i ?>]" name="select_prod_size[<?= $i ?>]" class="form-control col-md-2 col-xs-2">'
                                            <option>โปรดเลือก size ถุงมือ</option>
                                            <option value=S><?php echo "S"; ?></option>
                                            <option value=M><?php echo "M"; ?></option>
                                            <option value=L><?php echo "L"; ?></option>
                                        </select>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            <tr id=test name=test>
                                <td class="align-middle" align=right colspan=7><button type=button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">เพิ่ม</button></td>
                            </tr>
                            <!-- <tr>
                                <td class="align-middle" align=right colspan=7><button type=submit>Save to Database</button></td>
                            </tr> -->
                        </tbody>
                    </table>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">เช่าอุปกรณ์กีฬา</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    เลือกประเภท:
                                    <select id="typeid" onchange="getdata(document.getElementById('typeid').value)">
                                        <option>=== เลือก ===</option>
                                        <?php
                                        foreach ($table as $data) {
                                        ?>
                                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["title"]; ?>
                                            <?php
                                        }
                                            ?>
                                    </select>

                                    <div id="accessory">
                                        เลือกอุปกรณ์:
                                        <select id="aid">
                                            <option>=== เลือก ===</option>
                                        </select>
                                    </div>

                                    <div id="qty">
                                        เลือกไซต์:
                                        <select id="sid">
                                            <option>=== เลือก ===</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//app-card-body//-->
        </div>
        <!--//app-card//-->
    </div>
</div>