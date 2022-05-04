<?php
//print_r($_POST);
if (isset($_POST) && !empty($_POST)) {
    // echo '<pre>';
    // print_r($_POST);
    // // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $type_product_id = $_POST['type_product_id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = 'upload/product/';
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            if (!file_exists($target . $filename)) {
                if (move_uploaded_file($filetmp, $target . $filename)) {
                    $filename = $filename;
                } else {
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            } else {
                $newfilename = time() . $filename;
                if (move_uploaded_file($filetmp, $target . $newfilename)) {
                    $filename = $newfilename;
                } else {
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            }
        } else {
            echo 'ประเภทไฟล์ไม่ถูกต้อง';
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    } else {
        $filename = '';
    }
    // echo $filename;
    // exit();
    $sql = "INSERT INTO tb_stadium (type_product_id, title, detail,price,image)
                                            VALUES ('$type_product_id', '$title', '$detail','$price','$filename')";

    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสนามสำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
$sql = "SELECT * FROM tb_type_product";
$query = mysqli_query($connection, $sql);
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">เพิ่มข้อมูลสนาม</h1>
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
                    <div class="mb-3">
                        <label class="form-label">รูปภาพ</label>
                        <div class="mb-3">
                            <img id="preview" class="rounded" width="250" height="250">
                        </div>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ประเภทสินค้า</label>
                        <select name="type_product_id" class="form-control" style="height: unset !important;" required>
                            <option value="" selected disabled>ประเภทสินค้า</option>
                            <?php foreach ($query as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ชื่อสนาม</label>
                        <input type="text" class="form-control" name="title" placeholder="ชื่อสนาม" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">รายละเอียดสนาม</label>
                        <textarea name="detail" class="form-control" style="height: 100px"></textarea>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">ราคา</label>
                        <input type="text" class="form-control" name="price" placeholder="ราคา" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>