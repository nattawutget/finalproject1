<?php
session_start();
include('../../connection/connection.php');

echo $_REQUEST['select_date'];
print_r($_REQUEST['amount']);
print_r($_REQUEST['select_prod_size']);

for($i=1; $i<=count($_REQUEST['amount']); $i++) {
	$date = $_REQUEST['select_date'];
	$user_id = $_SESSION['user_id'];
	$amount = $_REQUEST['amount'][$i];
	$select_prod_size = $_REQUEST['select_prod_size'][$i];

	$sql = "insert into tb_booked_shoes(user_id, booked_date, amount, size) values($user_id,'$date',$amount, $select_prod_size)";

	#echo $sql."</br>";
	$result = mysqli_query($connection, $sql);
}

if ($result) {
	echo "<script>alert('Save success');history.go(-1);</script>";
} else echo "<script>alert('Error');</script>";
?>