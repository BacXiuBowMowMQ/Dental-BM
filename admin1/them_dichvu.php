<?php
session_start();
include("./configs/connect.php");
include("./includes/header.php");

// Xử lý dữ liệu từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_dich_vu = $_POST["ma_dich_vu"];
    $ten_dich_vu = $_POST["ten_dich_vu"];
    $gia_dv = $_POST["gia_dv"];
    $mo_ta_dich_vu = $_POST["mo_ta_dich_vu"];

     // Kiểm tra xem giá trị MADICHVU đã tồn tại trong bảng dichvu hay chưa
     $sql_check_madichvu = "SELECT * FROM dichvu WHERE MADICHVU = '$ma_dich_vu'";
     $result_check_madichvu = $conn->query($sql_check_madichvu);
 
     if ($result_check_madichvu->num_rows > 0) {
         // Nếu giá trị MADICHVU đã tồn tại, hiển thị thông báo lỗi và ngăn việc thêm bản ghi mới
         echo '<script language="javascript">alert("Mã dịch vụ đã tồn tại.");</script>';
     } else {
         // Nếu giá trị MADICHVU chưa tồn tại, thực hiện thêm bản ghi mới vào bảng dichvu
         $sql_dichvu = "INSERT INTO dichvu (MADICHVU, TENDICHVU, GIADV, MOTADV) VALUES ('$ma_dich_vu', '$ten_dich_vu',  '$gia_dv', '$mo_ta_dich_vu')";
 
         if ($conn->query($sql_dichvu) === TRUE) {
             echo '<script language="javascript">alert("Dữ liệu đã được thêm thành công.");</script>';
         } else {
            //  echo '<script language="javascript">alert("Lỗi: ' . $sql_dichvu . '\n' . $conn->error . '");</script>';
         }
     }
}

  

$conn->close();


?>




<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm dịch vụ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/style1.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!-- Header Start -->
    <?php include("./includes/sidebar.php"); ?>

    <!-- Header End -->


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

  
    
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <form role="search" class="sr-input-func">
                                            <input type="text" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Trang chủ</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Thêm dịch vụ</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Start Danh sách dịch vụ -->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#themdv">Thêm dịch vụ</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="themdv">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <div class="form-group">
                                                    <label for="ma_dich_vu">Mã dịch vụ:</label>
                                                    <input type="text" class="form-control" id="ma_dich_vu" name="ma_dich_vu" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ten_dich_vu">Tên dịch vụ:</label>
                                                    <input type="text" class="form-control" id="ten_dich_vu" name="ten_dich_vu" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gia_dv">Đơn giá:</label>
                                                    <input type="text" class="form-control" id="gia_dv" name="gia_dv" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mo_ta_dich_vu">Mô tả dịch vụ:</label>
                                                    <textarea id="mo_ta_dich_vu" name="mo_ta_dich_vu"></textarea>
                                                    <!-- <input type="text" class="form-control" id="mo_ta_dich_vu" name="mo_ta_dich_vu" required> -->
                                                </div>
                                                <button type="submit" class="btn btn-primary">Thêm dịch vụ</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Danh sách dịch vụ -->
    
    </div>








    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->


    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>
