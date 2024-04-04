<?php
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
                                        <li><span class="bread-blod">Danh sách lịch làm</span>
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
                                <h4>Lịch làm bác sĩ</h4>
                                <div class="add-product">
                                    <a href="them_lichlam.php">Thêm lịch làm cho bác sĩ</a>
                                </div>
                                <div class="asset-inner">
                                    <table>
                                        <tr>
                                            
                                            <th>Email </th>
                                            <th>Tên nhân viên </th>
                                            <th>Ma ca </th>
                                            <th>Ngày làm</th>
                                            <th>Giờ bắt đầu </th>
                                            <th>Giờ kết thúc </th>
                                            <th>Cài đặt</th>
                                        </tr>
                                        <?php
                                        // Lấy danh sách bác sĩ và thông tin lịch làm việc của họ
                                            $sql = "SELECT nhanvien.EMAILNV, nhanvien.HOTENNV, 
                                            calamviec.MACLV, DATE(calamviec.THOIGIANBATDAU) AS NgayLamViec, 
                                            TIME(calamviec.THOIGIANBATDAU) AS GioBatDau, 
                                            TIME(calamviec.THOIGIANKETTHUC) AS GioKetThuc 
                                            FROM nhanvien 
                                            INNER JOIN lichlamviec ON nhanvien.EMAILNV = lichlamviec.EMAILNV 
                                            INNER JOIN calamviec ON lichlamviec.MACLV = calamviec.MACLV 
                                            WHERE nhanvien.MAQUYEN = 2";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                           
                                            echo "<td>" . $row["EMAILNV"] . "</td>";
                                            echo "<td>" . $row["HOTENNV"] . "</td>";
                                            echo "<td>" . $row["MACLV"] . "</td>";
                                            echo "<td>" . $row["NgayLamViec"] ."</td>";
                                            echo "<td>" . $row["GioBatDau"] ."</td>";
                                            echo "<td>" . $row["GioKetThuc"] ."</td>";
                                            echo "<td>
                                            <button class='pd-setting-ed' onclick=\"editService('" . $row['EMAILNV'] . "')\">
                                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                            </button>
                                            <button class='pd-setting-ed' onclick=\"deleteService('" . $row['EMAILNV'] . "')\">
                                                <i class='fa fa-trash-o' aria-hidden='true'></i>
                                            </button>
                                            </td>";
                                         
                                            echo "</tr>";

                                            

                                            echo "</tr>";

                                            }
                                            } else {
                                            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
                                            }

                                            $conn->close();
                                            ?>

                                    </table>
                                </div>
                                <!-- ... (Phần phân trang) ... -->
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



    <!-- XỬ LÝ CHỨC NĂNG XÓA -->
    <script>
    function deleteService(EMAILNV) {
        if (confirm("Bạn có chắc chắn muốn xóa dịch vụ này?")) {
            // Sử dụng Ajax để gửi yêu cầu xóa đến server
            $.ajax({
                type: "POST",
                url: "./configs/xoa_dichvu.php",
                data: { EMAILNV: EMAILNV },
                success: function(response) {
                    alert(response);
                    // Refresh trang hoặc làm mới danh sách dịch vụ sau khi xóa
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }

    function editService(EMAILNV) {
        // Chuyển hướng đến trang chỉnh sửa dịch vụ với mã dịch vụ cần chỉnh sửa
        window.location.href = "chinhsua_dichvu.php?EMAILNV=" + EMAILNV;
    }
</script>



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
