<?php
session_start();
include('../../connection/connection.php');

// echo $_REQUEST['select_date'];
// print_r($_REQUEST['amount']);
// echo $_REQUEST['select_size'];

for($i=1; $i<=count($_REQUEST['amount']); $i++) {
	$date = $_REQUEST['select_date'];
	$user_id = $_SESSION['user_id'];
	$amount = $_REQUEST['amount'][$i];
	$select_prod_size = $_REQUEST['select_size'];
}
	$sql1 ="SELECT * FROM tb_accessory_stock  where ( size LIKE '$select_prod_size%' )";
	$data = mysqli_query($connection, $sql1);
	$arr_querry=mysqli_fetch_array($data);
	$num1=$arr_querry['qty'];

	if($num1<$amount){
		$alert = '<script type="text/javascript">';
                $alert .= 'alert("อุปกรณ์คงเหลือมีจำนวนไม่เพียงพอกรุณากรอกใหม่");';
                $alert .= 'window.location.href = "javascript:history.back()";';
                $alert .= '</script>';
                echo $alert;
                exit();
	}else{
		$qtytotal = $num1 - $amount;
	$sql2 = "UPDATE tb_accessory_stock SET qty ='$qtytotal' WHERE ( size LIKE '$select_prod_size%' )";
		$result1 = mysqli_query($connection, $sql2);
	$sql = "insert into tb_booked_glove (user_id, booked_date, amount, size) values($user_id,'$date',$amount, '$select_prod_size')";
	#echo $sql."</br>";
	$result = mysqli_query($connection, $sql);
	}
	


if ($result) {
	echo "<script>alert('บันทึกสำเร็จ');history.go(-1);</script>";
} else echo "<script>alert('Error');</script>";
