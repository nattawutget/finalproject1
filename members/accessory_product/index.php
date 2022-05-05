<?php
#echo $_SESSION['user_id']; die();
//รองเท้า
$sql = "SELECT *,a.id,a.title,ac.title AS title_type_product FROM tb_accessory_shose a LEFT JOIN tb_accessory_type ac ON a.type_product_id = ac.id  ";
$query = mysqli_query($connection, $sql);
$sql1 = "SELECT DISTINCT id,size FROM `tb_accessory_stock` WHERE accessory_id = 1 and qty >= 1";
$result1 = mysqli_query($connection, $sql1);
//ถุงมือ
$sql2 = "SELECT *,g.id,g.title,ac.title AS title_type_product FROM tb_accessory_glove g LEFT JOIN tb_accessory_type ac ON g.type_product_id = ac.id  ";
$query1 = mysqli_query($connection, $sql2);
$sql3 = "SELECT DISTINCT id,size FROM `tb_accessory_stock` WHERE accessory_id = 2 and qty >= 1";
$result2 = mysqli_query($connection, $sql3);
#die($sql);


?>
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
                <ul class="nav justify-content-center my-3 ">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">รองเท้าสตัด</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ถุงมือผู้รักษาประตู</button>
                        </li>
                    </ul>
                </ul>

                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row ">
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT DISTINCT booked_date FROM `tb_booked_stadium_header` WHERE user_id = $user_id and status = 0";

                            #die($sql);
                            $result = mysqli_query($connection, $sql);

                            ?>
                            <form action="accessory_product/index_db.php">
                                ระบุวันที่จองสนาม:
                                <select id="select_date" name="select_date">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value=<?= $row['booked_date'] ?>><?= $row['booked_date'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                </p>
                                <table class="table  table-hover" id="tableall" border=1>
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">ชื่ออุปกรณ์</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">ไซต์</th>
                                            <th scope="col">จำนวน</th>
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
                                                <td class="align-middle"><?= $data['title'] ?></td>
                                                <td class="align-middle"><?= number_format($data['price'])  ?></td>
                                                <td class="align-middle">
                                                    <select id="select_size" name="select_size">
                                                        <option value="" selected disabled>=== เลือก ===</option>
                                                        <?php
                                                        while ($row = mysqli_fetch_array($result1)) {
                                                        ?>
                                                            <option value=<?= $row['size'] ?>><?= $row['size'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td class="align-middle"><input class="text-end" type=text id=amount[<?= $i ?>] name=amount[<?= $i ?>] value=0></td>
                                            </tr>

                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="align-middle" align=right colspan=6><button type=submit>จอง</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row ">
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT DISTINCT booked_date FROM `tb_booked_stadium_header` WHERE user_id = $user_id and status = 0";

                            #die($sql);
                            $result = mysqli_query($connection, $sql);

                            ?>
                            <form action="accessory_product/index2_db.php">
                                ระบุวันที่จองสนาม:
                                <select id="select_date" name="select_date">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value=<?= $row['booked_date'] ?>><?= $row['booked_date'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                </p>
                                <table class="table  table-hover" id="tableall" border=1>
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">ชื่ออุปกรณ์</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">ไซต์</th>
                                            <th scope="col">จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $i = 0;
                                        foreach ($query1 as $data) :
                                        ?>
                                            <tr>
                                                <td class="align-middle"><?= ++$i ?></td>
                                                <td class="align-middle">
                                                    <img src="upload/product/<?= $data['image'] ?>" class="rounded" width="60" height="60">
                                                </td>
                                                <td class="align-middle"><?= $data['title'] ?></td>
                                                <td class="align-middle"><?= number_format($data['price'])  ?></td>
                                                <td class="align-middle">
                                                    <select id="select_size" name="select_size">
                                                        <option value="" selected disabled>=== เลือก ===</option>
                                                        <?php
                                                        while ($row2 = mysqli_fetch_array($result2)) {
                                                        ?>
                                                            <option value=<?= $row2['size'] ?>><?= $row2['size'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td class="align-middle"><input class="text-end" type=text id=amount[<?= $i ?>] name=amount[<?= $i ?>] value=0></td>
                                            </tr>

                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="align-middle" align=right colspan=6><button type=submit>จอง</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
<!--//row//-->
<script>
    var num = 1;

    function add_more_income() {
        num++;
        var income_row_num = "income_row_" + num;
        var more_income = '<tr id=' + income_row_num + '>'
        <?php
        $sql = "SELECT *,a.id,a.title,tp.title AS title_type_product FROM tb_accessory a LEFT JOIN tb_type_product tp ON a.type_product_id = tp.id";
        $query = mysqli_query($connection, $sql);
        $data = mysqli_fetch_array($query);
        ?>
            +
            '	<td align=center class="align-middle">' +
            '		' + num +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<img src="upload/product/<?= $data['image'] ?>" class="rounded" width="60" height="60">' +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<input type=text id=amount[' + num + '] name=amount[' + num + '] value=0>' +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<?= $data['title'] ?>' +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<?= number_format($data["price"]) ?>' +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<?= ($data["status"] == 0 ? "<span>เปิดใช้งาน</span>" : "<span>ปิดใช้งาน</span>") ?>' +
            '	</td>' +
            '	<td class="align-middle">' +
            '		<select id="select_prod_size[' + num + ']" name="select_prod_size[' + num + ']" class="form-control col-md-2 col-xs-2">' +
            '			<option>โปรดเลือก size รองเท้า</option>' +
            '			<option value=35><?php echo "35"; ?></option>' +
            '		</select>' +
            '	</td>' +
            '</tr>';
        var newRow = $(more_income);
        $("#test").before(newRow);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableall').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "ยังไม่มีข้อมูล",
                "info": "เเสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "เเสดง 0 - 0 จาก 0 รายการ",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "เเสดง _MENU_ รายการ",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "ค้นหา:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
<?php
mysqli_close($connection);
?>