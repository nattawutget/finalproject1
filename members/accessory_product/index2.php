<?php
$user = $_SESSION['user_login'];
$sql1 = "SELECT * FROM tb_admin WHERE email = '$user'";
$query = mysqli_query($connection, $sql1);

$sql = "SELECT id,title FROM tb_accessory_type";
$table = mysqli_query($connection, $sql);

if (isset($_POST) && !empty($_POST)) {
    //print_r($_POST);
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $type_accessory_id = $_POST['typeid'];
    $accessoryid = $_POST['aid'];
    $sizeid = $_POST['sid'];
    $qtyaccessory = $_POST['qtyaccessory'];
    if (isset($qtyaccessory) && !empty($qtyaccessory)) {
        $sql_check = "SELECT * FROM tb_accessory_stock WHERE qty = '$qtyaccessory' ";
        $query_check = mysqli_query($connection, $sql_check);
        if ($query_check > $qtyaccessory) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("อุปกรณ์ชิ้นนี้มีจำนวนไม่พอสำหรับการจองโปรดเเก้ไขจำนวน");';
            $alert .= 'window.location.href = "javascript:history.back()";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            $sql = "INSERT INTO tb_admin (firstname, lastname, email,phone,user,pass,image)
            VALUES ('$firstname', '$lastname', '$email','$phone','$user','$pass','$filename')";
            if (mysqli_query($connection, $sql)) {
                // echo "เพิ่มข้อมูลสำเร็จ";
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("เปลี่ยนเเปลงรหัสผ่านสำเร็จ");';
                $alert .= 'window.location.href = "?page=profile";';
                $alert .= '</script>';
                echo $alert;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
        }
    }
}



?>
<script>
    function getdata(str) {
        if (str.length == 0) {
            document.getElementById("accessory").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("accessory").innerHTML = xmlhttp.responseText;

                }
            }
            xmlhttp.open("GET", "getdataaccessory.php?typeid=" + str, true);
            xmlhttp.send();
        }
    }

    function getdata1(str) {
        if (str.length == 0) {
            document.getElementById("size").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("size").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getdatasize.php?aid=" + str, true);
            xmlhttp.send();
        }
    }

    function clearlist() {
        for (i = document.getElementById("sid").length - 1; i >= 0; i--) {
            document.getElementById("sid").remove("i");
        }
    }
</script>

<hr class="mb-4">
<div class="row gy-4">
    <div class="col-12 col-lg-6">
        <form action="" method="post" enctype=multipart/form-data>
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <form method="post" enctype=multipart/form-data>
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                            </div>
                            <!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">เช่าอุปกรณ์กีฬา</h4>
                            </div>
                            <!--//col-->
                        </div>
                        <!--//row-->
                </div>
                <!--//app-card-header-->

                <div class="app-card-body px-4 w-100">
                    <form action="" method="post" enctype=multipart/form-data>
                        <div class="item  py-1">
                            <div class="row  align-items-center">
                                <div class="mb-1 col-lg-8">
                                    <label class="form-label">ประเภทอุปกรณ์กีฬา</label>
                                    <select name="typeid" id="typeid" class="form-control" style="height: unset !important;" onchange="getdata(document.getElementById('typeid').value);">
                                        <option value="" selected disabled>=== เลือก ===</option>
                                        <?php foreach ($table as $data) : ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="item  py-1">
                            <div class="row  align-items-center">
                                <div class="mb-2 col-lg-8">
                                    <div id="accessory">
                                        <label class="form-label">เลือกอุปกรณ์กีฬา</label>
                                        <select name="aid" class="form-control" style="height: unset !important;" required>
                                            <option value="" selected disabled>=== เลือก ===</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item  py-1">
                            <div class="row  align-items-center">
                                <div class="mb-2 col-lg-8">
                                    <div id="size">
                                        <label class="form-label">เลือกไซต์</label>
                                        <select name="sid" class="form-control" style="height: unset !important;" required>
                                            <option value="" selected disabled>=== เลือก ===</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item  py-1">
                            <div class="row  align-items-center">
                                <div id="size">
                                    <div class="item-label mb-2"><strong>จำนวนที่จอง</strong></div>
                                    <div class="item-data"><input type="text" class="form-control" name="qtyaccessory" value=""></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--//item-->
                </div>
                <!--//app-card-body-->
                <div class="app-card-footer p-4 mt-auto ">
                    <input type="submit" class="btn app-btn-secondary" value="จอง" />
                </div>
        </form>
        <!--//app-card-footer-->
    </div>
    <!--//app-card-->
    </form>
</div>
<!--//col-->

</div>