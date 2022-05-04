<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT *,tb_booked_stadium_header.id,tb_booked_stadium_header.status as header_status FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id ";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}

if (isset($_POST) && !empty($_POST)) {
    //print_r($_POST);
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $status = $_POST['statusnew'];
    
    $sql = "UPDATE tb_booked_stadium_header SET status = '$status' where id = '$id' ";


    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เเก้ไขข้อมูลสนามสำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}

?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">เเก้ไขสถานะ</h1>
    </div>
    <div class="col-auto">
        <a href="?page=<?= $_GET['page'] ?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>

<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="" method="post" enctype=multipart/form-data>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="user_id" placeholder="ชื่อสนาม" value="<?= $result['user'] ?>" autocomplete="off" disabled>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">วันที่</label>
                        <input type="text" class="form-control" name="booked_date" placeholder="ชื่อสนาม" value="<?= $result['booked_date'] ?>" autocomplete="off" disabled>
                    </div><div class="mb-3 col-lg-6">
                        <label class="form-label">สนาม</label>
                        <input type="text" class="form-control" name="filed_id" placeholder="ชื่อสนาม" value="<?= $result['title'] ?>" autocomplete="off" disabled>
                    </div><div class="mb-3 col-lg-6">
                        <label class="form-label">เวลา</label>
                        <input type="text" class="form-control" name="time_slot" placeholder="ชื่อสนาม" value="<?= $result['time_slot']+ 5 ?>:00 - <?= $result['time_slot'] + 6 ?>" autocomplete="off" disabled>
                    </div><div class="mb-3 col-lg-6">
                        <label class="form-label">สถานะ</label>
                        <input type="text" class="form-control" name="status" placeholder="ชื่อสนาม" value="<?= $result['status'] ?>" autocomplete="off" disabled>
                        <label >เป็น</label>
                        <label >*****เลข 1 คือ ยกเลิก เลข 2 คือ เข้าใช้งานเเล้ว*****</label>
                        <input type="text" class="form-control" name="statusnew" placeholder="" pattern="[1-2]" min="1" autocomplete="off" >
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>
