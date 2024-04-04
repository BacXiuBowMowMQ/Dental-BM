<?php
session_start();
include("configs/connect.php");
include("includes/header.php");

// Xử lý dữ liệu biểu mẫu nếu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $madichvu = $_POST['madichvu']; // Lấy mã dịch vụ từ biểu mẫu
    $email = $_POST['email'];
    $emailnv = $_POST['emailnv']; // Lấy email từ biểu mẫu
    $ngayhen = $_POST['ngayhen']; // Lấy ngày hẹn từ biểu mẫu
    $giohen = $_POST['giohen']; // Lấy giờ hẹn từ biểu mẫu
    $mo_ta_benh = $_POST['mo_ta_benh'];
    // Tạo ID phiếu dựa trên thời gian hiện tại
    $stt_phieukhambenh = "STT" . (rand());

    // Chèn dữ liệu vào bảng `phieukhambenh`
    $sql_phieukhambenh = "INSERT INTO phieukhambenh (STT_PHIEUKHAM, EMAILNV, EMAILBN, NGAYKHAM, GIOKHAM, MOTA)
            VALUES ('$stt_phieukhambenh',  '$emailnv', '$email', '$ngayhen', '$giohen', '$mo_ta_benh')";

if ($conn->query($sql_phieukhambenh) === TRUE) {
    // Chèn dữ liệu vào bảng `pdldv`
    $sql_pdldv = "INSERT INTO pkbdv (STT_PHIEUKHAM, MADICHVU)
            VALUES ('$stt_phieukhambenh', '$madichvu')";
    
    if ($conn->query($sql_pdldv) === TRUE) {
       // Thông báo sử dụng JavaScript
       echo '<script>alert("Dữ liệu đã được thêm thành công!");</script>';
       
    } else {
        echo "Đã xảy ra lỗi khi đặt dịch vụ: " . $conn->error;
    }
} else {
    echo "Đã xảy ra lỗi khi đặt lịch hẹn: " . $conn->error;
}
}

// Đóng kết nối
$conn->close();

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tạo phiếu khám</title>
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
                                        <li><span class="bread-blod">Tạo phiếu khám</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Danh sách bác sĩ -->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#thembs">Tạo phiếu khám</a></li>
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="thembs">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    

                                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="hoten">Họ Tên</label>
                                                                    <input name="hoten" type="text" class="form-control" placeholder="Họ và tên">
                                                                </div>
                                                               
                                                            
                                                                <div class="form-group">
                                                                    <label for="dichvu">Chọn dịch vụ</label>
                                                    
                                                                    <div name="madichvu">
                                                                            <?php
                                                                                include('./configs/mucchon_dichvu.php');
                                                                            ?>
                                                                        </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="ngaydat">Ngày khám</label>
                                                                        <input type="date" name='ngayhen'
                                                                            class="form-control bg-light border-0 datetimepicker-input"
                                                                            placeholder="Ngày hẹn" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                                                    
                                                                </div>

    

                                                                
                            
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input name="email" type="text" class="form-control" placeholder="Email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Chọn Bác sĩ</label>
                                                                    <div name="emailnv">
                                                                        <?php
                                                                            include('./configs/mucchon_bacsi.php');
                                                                        ?>
                                                                    </div>
                                                                   
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Giờ khám</label>
                                                                    <div class="time" id="time1" data-target-input="nearest">
                                                                        <input type="text"  name='giohen'
                                                                            class="form-control bg-light border-0 datetimepicker-input"
                                                                            placeholder="Giờ hẹn" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                        
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="mo_ta_benh">Mô tả bệnh án:</label>
                                                                <textarea id="mo_ta_benh" name="mo_ta_benh"></textarea>
                
                                                            </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Tạo phiếu khám</button>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
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
            
        <!-- End Danh sách bác sĩ -->
    
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
