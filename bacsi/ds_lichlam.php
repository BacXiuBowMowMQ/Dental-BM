<?php

session_start();

    include("./configs/connect.php");
    include("./includes/header.php");

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lịch làm bác sĩ</title>
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
                                        <li><span class="bread-blod">Lịch trình làm việc</span>
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
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Lịch trình làm việc</h4>
                    
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>Mã ca</th>
                                <th>Ngày làm</th>
                                <th>Giờ bắt đầu</th>
                                <th>Giờ kết thúc</th>
                            </tr>
                            <?php
                            // Kiểm tra xem người dùng đã đăng nhập chưa
                            if(isset($_SESSION['emailnv'])) {
                                $emailnv = $_SESSION['emailnv'];

                                // Lấy thông tin của người dùng đăng nhập
                                $sql = "SELECT * FROM nhanvien WHERE EMAILNV = '$emailnv' AND MAQUYEN = 2"; 

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        
                                        
                                        // Lấy các ca làm việc của người dùng đăng nhập
                                        $sql_calamviec = "SELECT calamviec.*, lichlamviec.EMAILNV,
                                                          DATE(calamviec.THOIGIANBATDAU) AS Ngay,
                                                          TIME(calamviec.THOIGIANBATDAU) AS GioBatDau,
                                                          TIME(calamviec.THOIGIANKETTHUC) AS GioKetThuc
                                                          FROM calamviec
                                                          INNER JOIN lichlamviec ON calamviec.MACLV = lichlamviec.MACLV
                                                          WHERE lichlamviec.EMAILNV = '$emailnv'
                                                           ORDER BY Ngay ASC";
                                        $result_calamviec = $conn->query($sql_calamviec);

                                        // Hiển thị các ca làm việc của người dùng đăng nhập
                                        if ($result_calamviec->num_rows > 0) {
                                            while($row_calamviec = $result_calamviec->fetch_assoc()) {
                                                echo "<td>" . $row_calamviec["MACLV"] . "</td>";
                                                echo "<td>" . $row_calamviec["Ngay"] . "</td>";
                                                echo "<td>" . $row_calamviec["GioBatDau"] . "</td>";
                                                echo "<td>" . $row_calamviec["GioKetThuc"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<td colspan='5'>Bạn không có lịch làm làm việc.</td>";
                                            echo "</tr>";
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
                                }

                                $conn->close();
                            } else {
                                // Nếu người dùng không đăng nhập, chuyển hướng hoặc hiển thị thông báo
                                echo "<tr><td colspan='5'>Bạn chưa đăng nhập.</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <!-- ... (Phần phân trang) ... -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Danh sách  -->

    
    </div>


    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->



   


    <!-- END -->


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
