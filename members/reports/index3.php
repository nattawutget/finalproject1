<?php
#echo $_SESSION['user_id']; die();
$user_id = $_SESSION['user_id'];
$sql = "SELECT *, tb_booked_stadium_header.status as header_status FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id where tb_booked_stadium_header.user_id = $user_id ";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">สรุปค่าใช้จ่ายการใช้สนาม</h1>
    </div>
    <div class="col-auto">
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section ">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4 ">
            <div class="app-card-body ">
                <div class="table-responsive-md">
                    <table class="table  table-hover " id="tableall">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">สนาม</th>
                                <th scope="col">เวลา</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 0;
                            $total = 0;
                            foreach ($query as $data) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?= ++$i ?></td>
                                    <td class="align-middle">
                                        <?= $data['booked_date'] ?>
                                    </td>
                                    <td class="align-middle"><?= $data['title'] ?></td>
                                    <td class="align-middle"><?= $data['time_slot'] + 5 ?>:00 - <?= $data['time_slot'] + 6 ?>:00</td>
                                    <td class="align-middle">
                                        <?php
                                        $cost = 0;
                                        if ($data['time_slot'] < 12) {
                                            if ($data['field_id']  == 1 and $data['header_status'] == 0) {
                                                $cost = 1300;
                                            }
                                            if (($data['field_id']  == 3 or $data['field_id']  == 4) and ($data['header_status'] == 0)) {
                                                $cost = 1000;
                                            }
                                            if (($data['field_id']  == 7 or $data['field_id']  == 8 or $data['field_id']  == 9 or $data['field_id']  == 10) and ($data['header_status'] == 0)) {
                                                $cost = 600;
                                            }
                                        }
                                        if ($data['time_slot'] >= 12) {
                                            if ($data['field_id']  == 1 and $data['header_status'] == 0) {
                                                $cost = 1500;
                                            }
                                            if (($data['field_id']  == 3 or $data['field_id']  == 4) and ($data['header_status'] == 0)) {
                                                $cost = 1250;
                                            }
                                            if (($data['field_id']  == 7 or $data['field_id']  == 8 or $data['field_id']  == 9 or $data['field_id']  == 10) and ($data['header_status'] == 0)) {
                                                $cost = 850;
                                            }
                                        }
                                        echo $cost;
                                        $total = $total + $cost;
                                        ?>
                                    </td>
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
                        <tfoot>
                            <tr>
                                <td colspan=6 align=right>รวมค่าใช้จ่าย <?= $total ?> บาทถ้วน</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
            <!--//app-card-body//-->
        </div>
        <!--//app-card//-->
    </div>
</div>
<!--//row//-->
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
<style>
    .wid {
        width: 100%;
    }
</style>
<?php
mysqli_close($connection);
?>