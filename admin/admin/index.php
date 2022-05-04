 <?php
    $admin_login = $_SESSION['admin_login'];
    $sql = "SELECT * FROM tb_admin WHERE user != '$admin_login' ";
    $query = mysqli_query($connection, $sql);
    ?>
 <div class="row justify-content-between">
     <div class="col-auto">
         <h1 class="app-page-title mb-0">ตารางข้อมูลผู้ดูเเลระบบ</h1>
     </div>
     <div class="col-auto">
     </div>
 </div>
 <hr class="mb-4">
 <div class="row g-4 settings-section">
     <div class="col-12 col-md-12">
         <div class="app-card app-card-settings shadow-sm p-4">
             <div class="app-card-body">
                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-primary text-white mb-4 float-right">เพิ่มข้อมูลผู้ดูเเลลระบบ</a>
                 </div>

                 <table class="table  table-hover" id="tableall">
                     <thead class="text-center">
                         <tr>
                             <th scope="col">รูปภาพ</th>
                             <th scope="col">ชื่อผู้ใช้</th>
                             <th scope="col">ชื่อ-นามสกุล</th>
                             <th scope="col">อีเมล์</th>
                             <th scope="col">เบอร์ติดต่อ</th>
                             <th scope="col">สถานะ</th>
                             <th scope="col">เมนู</th>
                         </tr>
                     </thead>
                     <tbody class="text-center">
                         <?php foreach ($query as $data) : ?>
                             <tr>
                                 <td class="align-middle">
                                     <img src="upload/admin/<?= $data['image'] ?>" class="rounded" width="60" height="60">
                                 </td>
                                 <td class="align-middle"><?= $data['user'] ?></td>
                                 <td class="align-middle"><?= $data['firstname'] . ' ' . $data['lastname'] ?></td>
                                 <td class="align-middle"><?= $data['email'] ?></td>
                                 <td class="align-middle"><?= $data['phone'] ?></td>
                                 <td class="align-middle"><?= ($data['status'] == 0 ? '<span class = "text-success">เปิดใช้งาน</span>' :
                                                                '<span class = "text-danger">ปิดใช้งาน</span>') ?></td>
                                 <td class="align-middle">
                                     <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['id'] ?>" class="btn btn-sm btn-warning">เเก้ไข</a>
                                     <a href="?page=<?= $_GET['page'] ?>&function=resetpassword&id=<?= $data['id'] ?>" class="btn btn-sm btn-secondary">รีเซ็ทรหัสผ่าน</a>
                                     <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['id'] ?>" onclick="return confirm('คุญต้องการลบชื่อผู้ใช้ : <?= $data['user'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a>
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