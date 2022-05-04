<?php
#echo $_SESSION['user_id']; die();
$sql = "SELECT *,tb_booked_stadium_header.id,tb_booked_stadium_header.status as header_status FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id ";
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

                <table class="table  table-hover" id="tableall">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">สนาม</th>
                            <th scope="col">เวลา</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $i = 0;
                        foreach ($query as $data) : ?>
                            <tr>
                                <td class="align-middle"><?= ++$i ?></td>
                                <td class="align-middle"><?= $data['user'] ?></td>
                                <td class="align-middle"><?= $data['booked_date'] ?></td>
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
                                <td>
                                    <?php if ($data['header_status'] == 0) { ?>
                                        <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['id'] ?>" class="btn btn-sm btn-warning">เเก้ไขสถานะ</a>
                                    <?php } ?>
                                </td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
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
<?php
mysqli_close($connection);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
