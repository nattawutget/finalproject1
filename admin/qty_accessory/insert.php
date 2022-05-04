<?php
//print_r($_POST);
if (isset($_POST) && !empty($_POST)) {
    //print_r($_POST);
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $title = $_POST['title'];
    if (!empty('$title')) {
        $sql_check = "SELECT * FROM tb_type_product where title = '$title'";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
        if ($row_check > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชนิดสินค้าซ้ำกรุณากรอกใหม่");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            $sql = "INSERT INTO tb_type_product (title)
                VALUES ('$title')";

            if (mysqli_query($connection, $sql)) {
                // echo "เพิ่มข้อมูลสำเร็จ";
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("เพิ่มชนิดสินค้าสำเร็จ");';
                $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }
    }
}
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">เพิ่มข้อมูลจำนวนร้องเท้าสตัด</h1>
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
                        <label class="form-label">ไซต์</label>
                        <input type="text" class="form-control" name="title" placeholder="ประเภทสินค้า"  autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                    <label class="form-label">จำนวนทั้งหมด</label>
                        <input type="text" class="form-control" name="title" placeholder="ประเภทสินค้า"  autocomplete="off" required>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
