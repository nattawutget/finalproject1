<?php 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_accessory WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบข้อมูลสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>