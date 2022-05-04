 <?php
    $sql = "SELECT * FROM tb_stadium_type`";
    $query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">จัดการข้อมูลประเภทสนาม</h1>
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
                             <th scope="col">ประเภทสนาม</th>
                             <th scope="col">เมนู</th>
                         </tr>
                     </thead>
                     <tbody class="text-center">
                         <?php 
                            $i = 1;
                            foreach ($query as $data) : 
                         ?>
                             <tr>
                                <td class="align-middle"><?=$i++?></td>
                                <td class="align-middle"><?= $data['title'] ?></td>
                                <td>
                                     <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['id']?>" class="btn btn-sm btn-warning">เเก้ไข</a>
                                     <!-- <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=$data['id']?>" onclick="return confirm('คุญต้องการลบประเภทสินค้า : <?= $data['title'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a> -->
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
         language : {
    "decimal":        "",
    "emptyTable":     "ยังไม่มีข้อมูล",
    "info":           "เเสดง _START_ - _END_ จาก _TOTAL_ รายการ",
    "infoEmpty":      "เเสดง 0 - 0 จาก 0 รายการ",
    "infoFiltered":   "(filtered from _MAX_ total entries)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "เเสดง _MENU_ รายการ",
    "loadingRecords": "Loading...",
    "processing":     "Processing...",
    "search":         "ค้นหา:",
    "zeroRecords":    "No matching records found",
    "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "ถัดไป",
        "previous":   "ก่อนหน้า"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
}
     });
     });
 </script>
 <?php
    mysqli_close($connection);
    ?>