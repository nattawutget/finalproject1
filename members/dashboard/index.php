<body class="app">
<h1 class="app-page-title">หน้าหลัก</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="">ยินดีต้อนรับ <?=$_SESSION['user_name']?></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//inner-->
        </div>
        <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">สนามที่กำลังรอเข้าใช้</h4>
							    <div class="stats-figure">23</div>
							    <div class="stats-meta">
								    Open</div>
						    </div><!--//app-card-body-->
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">สนามที่ใช้สำเร็จ</h4>
							    <div class="stats-figure">6</div>
							    <div class="stats-meta">New</div>
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
</body>