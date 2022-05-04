<?php
$sql = "SELECT *,a.id,a.title,tp.title AS title_type_product FROM tb_accessory_shose a LEFT JOIN tb_type_product tp ON a.type_product_id = tp.id";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">จัดการข้อมูลอุปกรณ์เพิ่มเติม</h1>
    </div>
    <div class="col-auto">
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-primary text-white mb-4 float-right">เพิ่มอุปกรณ์เพิ่มเติม</a>
                </div> -->

                <table class="table  table-hover" id="tableall">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $i = 1;
                        foreach ($query as $data) :
                        ?>
                            <tr>
                                <td class="align-middle"><?= $i++ ?></td>
                                <td class="align-middle">
                                    <img src="upload/product/<?= $data['image'] ?>" class="rounded" width="60" height="60">
                                </td>
                                <td class="align-middle"><?= $data['title'] ?></td>
                                <td class="align-middle"><?= number_format($data['price'])  ?></td>
                                <td class="align-middle"><?= ($data['status'] == 0 ? '<span class = "text-success">เปิดใช้งาน</span>' :
                                                                '<span class = "text-danger">ปิดใช้งาน</span>') ?></td>
                                <td class="align-middle">
                                    <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['id'] ?>" class="btn btn-sm btn-warning">เเก้ไข</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['id'] ?>" onclick="return confirm('คุญต้องการลบชื่อสินค้า : <?= $data['title'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a>
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