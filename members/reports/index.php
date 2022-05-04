<?php
#echo $_SESSION['user_id']; die();
$user_id = $_SESSION['user_id'];
$sql = "SELECT *, tb_booked_stadium_header.status as header_status FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id where tb_booked_stadium_header.user_id = $user_id";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">ประวัติการจองสนาม</h1>
    </div>
    <div class="col-auto">
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive-md">
                    <table class="table  table-hover " id="tableall" border=1>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">สนาม</th>
                                <th scope="col">เวลา</th>
                                <th scope="col">สถานะ</th>

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
                                        <?= $data['booked_date'] ?>
                                    </td>
                                    <td class="align-middle"><?= $data['title'] ?></td>
                                    <td class="align-middle"><?= $data['time_slot'] + 5 ?>:00 - <?= $data['time_slot'] + 6 ?>:00</td>
                                    <td class="align-middle"><?php if ($data['header_status'] == 0) {
                                                                    echo "จอง";
                                                                } elseif ($data['header_status'] == 1) {
                                                                    echo "ยกเลิก";
                                                                } elseif ($data['header_status'] == 2) {
                                                                    echo "เข้าใช้งานเเล้ว";
                                                                } else {
                                                                    echo "ขัดข้อง";
                                                                } ?></td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                </form>
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