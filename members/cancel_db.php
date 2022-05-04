<!-- <?php
session_start();
include "../connection/connection.php";

$user_id = $_SESSION['user_id'];
$id = $_REQUEST['select_id'];

$sql = "update tb_booked_stadium_header set status = 1 where id = $id";
#die($sql);
$result = mysqli_query($connection, $sql);

if ($result) {
	echo "<script>alert('Success'); history.go(-1);</script>";
} else { echo "<script>alert('Error');</script>";
}
?> -->
<?php 
include "../connection/connection.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
	$sql = "UPDATE  tb_booked_stadium_header SET status = 1 WHERE id ='$id' ";
    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ยกเลิกการจองสนามสำเร็จ");';
        $alert .= 'window.location = "../members/?page=cancel";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
		