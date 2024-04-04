<?php
// Bước 1: Kết nối đến cơ sở dữ liệu
include("./configs/connect.php");

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách toa thuốc</title>
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
    <?php 
        include("./includes/header.php");
        include("./includes/sidebar.php");
    ?>

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
                                        <li><span class="bread-blod">Danh sách toa thuốc</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Start Danh sách toa thuốc -->
         <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                             
                            <h4 style="float: left;">Danh sách toa thuốc</h4>
                            <div class="add-product">
                                    <a href="them_toathuoc.php">Thêm toa thuốc</a>
                            </div>
                           
                            <div class="asset-inner">
                            <table>
    <tr>
        <th>Mã Toa</th>
        <th>STT Phiếu Khám</th>
        <th>Chuẩn đoán</th>
        <th>Ngày kê đơn</th>
        <th>Hành động</th> <!-- Thêm cột cho các chức năng -->
    </tr>
    <?php
    // Truy vấn SQL để lấy danh sách các toa thuốc
    $sql = "SELECT MATOA, STT_PHIEUKHAM, CHUANDOAN, NGAYKEDON FROM toa_thuoc";
    $result = $conn->query($sql);

    // Kiểm tra xem có kết quả trả về hay không
    if ($result->num_rows > 0) {
        // Duyệt qua từng hàng kết quả và hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MATOA"] . "</td>";
            echo "<td>" . $row["STT_PHIEUKHAM"] . "</td>";
            echo "<td>" . $row["CHUANDOAN"] . "</td>";
            echo "<td>" . $row["NGAYKEDON"] . "</td>";
         
            // Thêm nút hoặc liên kết cho các chức năng
            echo "<td>
            <button class='pd-setting-ed' onclick=\"editBN('" . $row['MATOA'] . "', '" . $row['STT_PHIEUKHAM'] . "', '" . $row['CHUANDOAN'] . "', '" . $row['NGAYKEDON'] . "' )\">
                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
            </button>
            <button class='pd-setting-ed' onclick=\"deleteBN('" . $row['MATOA'] . "')\">
                <i class='fa fa-trash-o' aria-hidden='true'></i>
            </button>
        </td>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    ?>
</table>

                            </div>
                           
        

                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Danh sách toa thuốc -->

       <!-- Modal chỉnh sửa lịch hẹn -->
<div class="modal fade" id="editCHModal" tabindex="-1" role="dialog" aria-labelledby="editCHModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editCHModalLabel">Thay đổi lịch hẹn</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form chỉnh sửa lịch hẹn -->
                <form id="editCHForm">
                    <div class="form-group">
                        <label for="editedSchedule">Giờ hẹn:</label>
                        <input type="text" id="editedSchedule" class="form-control">
                    </div>
                    <input type="hidden" id="editedScheduleId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="saveEditedSchedule()">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>



    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->
   



<!-- Script JavaScript -->
<script>
       
    function deleteBN(matoa) {
        if (confirm("Bạn có chắc chắn muốn xóa bệnh nhân này?")) {
            // Sử dụng Ajax để gửi yêu cầu xóa đến server
            $.ajax({
                type: "POST",
                url: "./configs/xoa_toathuoc.php",
                data: { matoa: matoa },
                success: function(response) {
                    alert(response);
                    // Refresh trang hoặc làm mới danh sách bệnh nhân sau khi xóa
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>


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
