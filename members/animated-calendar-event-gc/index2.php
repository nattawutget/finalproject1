<?php
include('../connection/connection.php');
$date = $_REQUEST['date'];
#die($date);
$user_id =  $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking for a soccer field.</title>
</head>
<style>
	table,
	th,
	td {
		border: 1px solid;
		text-align: center;
		padding: 10px;
	}
</style>

<body>
	<h1><?= $_REQUEST['datejs'] ?></h1>
	<table border=1>
		<th>slot ที่</th>
		<th>ช่วงเวลาที่</th>
		<th>สนามที่</th>
		<th>Status</th>
		<th>Action</th>
		<tbody>
			<?php
			for ($i = 0; $i <= 18; $i++) {
			?>
				<tr>
					<td><?= $i ?>
					</td>
					<td><?= $i + 5 ?>:00 ถึง <?= $i + 6 ?>:00
					</td>
					<td><select id=select_field<?= $i ?> onchange=" query_stadium_status('<?= $date ?>',<?= $i ?>);">
							<option>เลือกสนาม
							</option>
							<?php
							$sql = "select * from tb_stadium_type";
							$result = mysqli_query($connection, $sql);
							while ($row = mysqli_fetch_array($result)) {
							?>
								<option value=<?= $row['id'] ?>>
									<?= $row['title'] ?>
								</option>
							<?php } ?>
						</select>
					</td>
					<td><button id=status_field<?= $i ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</td>
					<td><button id=myBtn<?= $i ?> onclick="booking_fields(<?= $i ?>);" disabled>จอง</button>
					</td>
				</tr>
			<?php }
			?>
		</tbody>
	</table>
</body>
<script>
	function booking_fields(i) {
		var select = document.getElementById('select_field' + i);
		var value = select.options[select.selectedIndex].value;
		//alert(value);
		window.location = 'index2_db.php?date=<?= $date ?>&user_id=<?= $user_id ?>&i=' + i + '&field_id=' + value;
	}

	function query_stadium_status(date1, i) {
		// alert(date1.toString());
		// alert(i);

		var select = document.getElementById('select_field' + i);
		var value = select.options[select.selectedIndex].value;

		// alert(value);

		$.ajax({
			url: "query_fields.php?date=" + date1 + "&i=" + i + "&field_id=" + value,
			success: function(result) {
				if (result == 0) {
					document.getElementById("status_field" + i).innerText = "ว่าง";
					document.getElementById("status_field" + i).style.background = '#00FF00';
					document.getElementById("status_field" + i).style.color = '#FFFFFF';
					document.getElementById("myBtn" + i).disabled = false;
				}
				if (result == 1) {
					document.getElementById("status_field" + i).innerText = "ไม่ว่าง";
					document.getElementById("status_field" + i).style.background = '#FF0000';
					document.getElementById("status_field" + i).style.color = '#FFFFFF';
					document.getElementById("myBtn" + i).disabled = true;
				}
			}
		});
	}
</script>
<div class="row justify-content">
    <div class="col-auto">
        <h3>สรุปการจอง</h3>
		<a href="?page=summarydate" class="btn app-btn-secondary ">ดู</a>
    </div>
</div>


</html>