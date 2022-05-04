<?php
include "../connection/connection.php";
if (isset($_GET['date']) && isset($_GET['i']) && isset($_GET['field_id']) && isset($_GET['user_id'])) {
    $date = $_GET['date'];
    $i = $_GET['i'];
    $field_id = $_GET['field_id'];
    $user_id = $_GET['user_id'];
    $status = 0;
    $sql = "INSERT INTO  tb_booked_stadium_header (user_id, booked_date, field_id, time_slot,status) VALUE ('$user_id', '$date',$field_id,$i,$status)";

    
    
    ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

date_default_timezone_set("Asia/Bangkok");


// เอา token จากที่เรา gen ขึ้นมา
$sql1 = "SELECT * FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id";
$result = mysqli_query($connection, $sql1);


$sToken = "ueqBYqXFQ4kjLIo4laPpODJqSKaTIgHKay0OKunroup";
          

foreach( $result as $query ) {
$bookingdate = $_GET['date'];
$bookingtime =  (int)$_GET['i'];
$filedtitle =  $query['title'];
$firstname =  $query['firstname'];
$lastname =  $query['lastname'];
$phone =  $query['phone'];
$time1 = $bookingtime+5;
$time2 = $bookingtime+6;
}

$msg ="\nมีการจองเข้ามา";
$msg .="\nวันที่: "."$bookingdate";
$msg .="\nประเภท: "."$filedtitle";
$msg .="\nคุณ: "."{$firstname}"."  "."{$lastname}";
$msg .="\nเบอร์ติดต่อ: "."$phone";
$msg .="\nเวลา: "."{$time1}".":00". "ถึง" ."{$time2}".":00";

$chOne = curl_init(); 

curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");

curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 

curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 

curl_setopt( $chOne, CURLOPT_POST, 1); 

curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$msg); 

$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );

curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 

curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec( $chOne ); 


//Result error 

if(curl_error($chOne)) 

{ 

 echo 'error:' . curl_error($chOne);

} 

else { 

 $result_ = json_decode($result, true); 

 echo "status : ".$result_['status']; echo "message : ". $result_['message'];

} 

curl_close( $chOne );
    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
        $alert .= 'window.location = "../members/?page=booking_soccer_fields";';
        $alert .= '</script>';
        echo $alert;
        
        exit();
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>