<?php
include('../connection/connection.php');

$date = $_REQUEST['date'];
$i = $_REQUEST['i'];
$field_id = $_REQUEST['field_id'];

if ($field_id == 1) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i";
}
if ($field_id == 3) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i OR 
			(SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and (field_id = 7 or field_id = 8) and time_slot = $i) > 0";
}
if ($field_id == 4) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i OR 
			(SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and (field_id = 9 or field_id = 10) and time_slot = $i) > 0";
}
if ($field_id == 7) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where (booked_date = '$date' and field_id = $field_id and time_slot = $i) OR 
			((SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = 3 and time_slot = $i) > 0)";
}
if ($field_id == 8) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i OR 
			(SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = 3 and time_slot = $i) > 0";
}
if ($field_id == 9) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i OR 
			(SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = 4 and time_slot = $i) > 0";
}
if ($field_id == 10) {
	$sql = "SELECT * FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = $field_id and time_slot = $i OR 
			(SELECT count(*) FROM `tb_booked_stadium_header` where booked_date = '$date' and field_id = 4 and time_slot = $i) > 0";
}
#die($sql);
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
	echo 1;
} else echo 0;
?>