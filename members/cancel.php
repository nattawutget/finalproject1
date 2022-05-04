<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT *,tb_booked_stadium_header.id FROM `tb_booked_stadium_header` inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id WHERE user_id = $user_id and status = 0";

#die($sql);
$result = mysqli_query($connection, $sql);

?>
<!-- <form action="cancel_db.php">
				<input type=hidden id=user_id name=user_id value=<?= $user_id ?>>
				ระบุวันที่จองสนาม: 
				<select id="select_id" name="select_id">
<?php
while ($row = mysqli_fetch_array($result)) {
?>
					<option value=<?= $row['id'] ?>><?= $row['booked_date'] ?>:<?= $row['title'] ?> ช่วงเวลาที่<?= $row['time_slot'] + 5 ?>:00 - <?= $row['time_slot'] + 6 ?>:00
					</option>
<?php } ?>
				</select>
                </p>   
				<button>ทำการยกเลิก</button>
</form>				 -->

<div class="row justify-content-between">
	<div class="col-auto">
		<h1 class="app-page-title mb-0">ยกเลิการจอง</h1>
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
					<table class="table  table-hover" id="tableall" >
					<thead class="text-center">
						<tr>
							<th scope="col">ลำดับ</th>
							<th scope="col">วันที่</th>
							<th scope="col">ชื่สนาม</th>
							<th scope="col">เวลา</th>
							<th scope="col">สถานะ</th>
							<th scope="col">เมนู</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
						$i = 1;
						foreach ($result as $data) : ?>
							<tr>
								<td class="align-middle"><?= $i++ ?></td>
								<td class="align-middle"><?= $data['booked_date'] ?></td>
								<td class="align-middle"><?= $data['title'] ?></td>
								<td class="align-middle"><?= $data['time_slot'] + 5 ?>:00 - <?= $data['time_slot'] + 6 ?>:00</td>
								<td class="align-middle"><?php if ($data['status'] == 0) {
                                                                echo "<font color=\"orange\">จอง</font>";
                                                            }elseif($data['status'] == 1){
                                                                echo "<font color=\"red\">ยกเลิก</font>";
                                                            } 
                                                            elseif ($data['status'] == 2) {
                                                                echo "<font color=\"green\">เข้าใช้งานเเล้ว</font>";
                                                            }else{
                                                                echo "<font color=\"red\">ขัดข้อง</font>";
                                                            } ?></td>
								<td class="align-middle">
									<!-- <a href="?page=confirmcancel <?= $data['id'] ?> "  onclick="return confirm('คุญต้องการยกเลิกการจอง : วันที่ <?= $data['booked_date'] ?> <?= $data['title'] ?> เวลา <?= $data['time_slot'] + 5 ?>:00 - <?= $data['time_slot'] + 6 ?>:00 หรือไม่')" class="btn btn-sm btn-danger">ยกเลิการจอง</a> -->
									<button class="btn btn-danger" onclick="if(confirm('คุณต้องการยกเลิกใช่หรือไม่')) window.location='cancel_db.php?id=<?php echo $data['id'];?>'">ยกเลิกการจอง</button>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
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
<?php
mysqli_close($connection);
?>