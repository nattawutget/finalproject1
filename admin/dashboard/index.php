<?php 
//จำนวนสนามที่รอเข้าใช้
$sql_reserve = "SELECT SUM(status = 0) AS all_reserve from tb_booked_stadium_header" ;
$query_reserve = mysqli_query($connection,$sql_reserve);
$result_reserve = mysqli_fetch_assoc($query_reserve);
//จำนวนสนามที่เข้าใช้เเล้ว
$sql_use = "SELECT SUM(status = 2) AS all_use from tb_booked_stadium_header" ;
$query_use = mysqli_query($connection,$sql_use);
$result_use = mysqli_fetch_assoc($query_use);
//จำนวนสนามที่เข้าใช้เเล้ว
$sql_cancle = "SELECT SUM(status = 1) AS all_cancle from tb_booked_stadium_header" ;
$query_cancle = mysqli_query($connection,$sql_cancle);
$result_cancle = mysqli_fetch_assoc($query_cancle);
?>
<h1 class="app-page-title">หน้าหลัก</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="">ยินดีต้อนรับ <?=$_SESSION['admin_login']?></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//inner-->
        </div>
        <div class="row g-4 mb-4">
				    <div class="col-4 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">สนามที่กำลังรอเข้าใช้</h4>
							    <div class="stats-figure"><?=$result_reserve['all_reserve'] ?></div>
							    <div class="stats-meta">
								    สนาม</div>
						    </div><!--//app-card-body-->
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-4 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">สนามที่ใช้สำเร็จ</h4>
							    <div class="stats-figure"><?=$result_use['all_use'] ?></div>
							    <div class="stats-meta">สนาม</div>
						    </div><!--//app-card-body-->
					    </div><!--//app-card-->
				    </div><!--//col-->
					<div class="col-4 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">สนามที่ยกเลิก</h4>
							    <div class="stats-figure"><?=$result_cancle['all_cancle'] ?></div>
							    <div class="stats-meta">สนาม</div>
						    </div><!--//app-card-body-->
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">

                <!--//app-card-->
            </div>
        </div>
    </div>
</div>