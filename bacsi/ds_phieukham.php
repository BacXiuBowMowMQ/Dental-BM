<?php
session_start();

include("./configs/connect.php");
include("./includes/header.php");

// Check if the user is logged in
if (!isset($_SESSION['emailnv'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit(); // Stop further execution
}

// Get the logged-in user's email
$email_nv = $_SESSION['emailnv'];

// Retrieve appointment data
$sql = "SELECT p.STT_PHIEUKHAM, p.EMAILBN, b.HOTENBN, p.EMAILNV, p.NGAYKHAM, p.GIOKHAM, p.MOTA, GROUP_CONCAT(d.TENDICHVU SEPARATOR '<br> ') AS TEN_DICH_VU
        FROM phieukhambenh p
        INNER JOIN pkbdv pd ON p.STT_PHIEUKHAM = pd.STT_PHIEUKHAM
        INNER JOIN dichvu d ON pd.MADICHVU = d.MADICHVU
        INNER JOIN benhnhan b ON b.EMAILBN = p.EMAILBN
        WHERE p.EMAILNV = '$email_nv' 
        GROUP BY p.STT_PHIEUKHAM";

$result = $conn->query($sql);

?>
 

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách phiếu khám bệnh</title>
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
                                            <li><span class="bread-blod">Danh sách phiếu khám bệnh</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Start Danh sách phiếu khám bệnh -->
            <div class="product-status mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap">
                                <h4>Danh sách phiếu khám bệnh</h4>
                                <div class="add-product">
                                    <a href="them_phieukham.php">Tạo phiếu khám</a>
                                </div>

                                <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>STT_Phiếu khám</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Email Bác sĩ</th>
                                        <th>Email Bệnh nhân</th>
                                        <th>Tên Bệnh nhân</th>
                                        <th>Ngày khám</th>
                                        <th>Giờ khám</th>
                                        <th>Kế hoạch điều trị</th>
                                        
                                        <th>Phiếu xét nghiệm</th>
                                        <th>Phiếu thu</th>
                                        <th>Cài đặt</th>
                                    </tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["STT_PHIEUKHAM"] . "</td>";
                                            echo "<td>" . $row["TEN_DICH_VU"] . "</td>";
                                            echo "<td>" . $row["EMAILNV"] . "</td>";
                                            echo "<td>" . $row["EMAILBN"] . "</td>";
                                            echo "<td>" . $row["HOTENBN"] . "</td>";
                                            echo "<td>" . $row["NGAYKHAM"] . "</td>";
                                            echo "<td>" . $row["GIOKHAM"] . "</td>";
                                            echo "<td>" . $row["MOTA"] . "</td>";
                                            // Buttons for invoice and examination
                                            echo "<td>
                                            <button class='pd-setting-ed' onclick=\"showToaThuoc('" . $row['STT_PHIEUKHAM'] . "')\">
                                            <i class='fa-solid fa-pills'></i>
                                                </button>
                                            </td>";
    

                                            echo "<td>
                                            <button class='pd-setting-ed' onclick=\"showPhieuThu('" . $row['STT_PHIEUKHAM'] . "')\">
                                                    <i class='fa-solid fa-file-invoice-dollar'></i>
                                                </button>
                                            </td>";
                                            
                                            // Setting button
                                            echo "<td>
                                           
                                                        
                                                    <button type='submit' class='btn btn-info' onclick=\"editBN('" . $row['STT_PHIEUKHAM'] . "', '" . $row['MOTA'] . "' )\">
                                                        <i class='fas fa-edit'></i>
                                                    </button>

                                                    <button type='submit' class='btn btn-danger' onclick=\"deleteBN('" . $row['STT_PHIEUKHAM'] . "')\">
                                                         <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                    </button>

                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
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
            <!-- End Danh sách phiếu khám bệnh -->

            <!-- Chỉnh sửa phieukham -->
            <div class="modal fade" id="editBNModal" tabindex="-1" role="dialog" aria-labelledby="editBNModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editBNModalLabel">Chỉnh sửa phiếu khám</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form chỉnh sửa phiếu khám -->
                         
                            <form id="editBNForm">
                                <div class="form-group">
                                    <label for="editedEmail">STT</label>
                                    <input type="text" id="editedEmail" name="editedEmail" class="form-control">
                                </div>

                
                                <div class="form-group">
                                    <label for="editedMT">Kế hoạch điều trị</label>
                                    <input type="text" id="editedMT" name="editedMT" class="form-control">
                                </div>

                               
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" onclick="saveEditedService()">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hiện thôgn tin phiếu thu -->
            
            <!-- Thêm modal để hiển thị -->
            <div class="modal fade" id="employeeInfoModal" tabindex="-1" role="dialog" aria-labelledby="employeeInfoModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="employeeInfoModalLabel">Thông tin phiếu thu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="employeeInfoContent"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
               <!-- Thêm modal để hiển thị TOA THUOC-->
               <div class="modal fade" id="employeeInfoThuocModal" tabindex="-1" role="dialog" aria-labelledby="employeeInfoThuocModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="employeeInfoThuocModalLabel">Thông tin toa thuốc</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="employeeInfoThuoc"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

    
  
    
   

    </div>
    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>


    <!-- Header End -->



<!-- Sử dụng AJAX để lấy thông tin của nhân viên -->
<script>
    function showPhieuThu(stt_phieukham) {
        $.ajax({
            type: "GET",
            url: "./configs/thongtin_phieuthu.php",
            data: { stt_phieukham: stt_phieukham },
            success: function(response) {
                $('#employeeInfoContent').html(response);
                $('#employeeInfoModal').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
        // TOA THUOC
        function showToaThuoc(stt_phieukham) {
        $.ajax({
            type: "GET",
            url: "./configs/thongtin_toathuoc.php",
            data: { stt_phieukham: stt_phieukham },
            success: function(response) {
                $('#employeeInfoThuoc').html(response);
                $('#employeeInfoThuocModal').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
   
 <!-- XỬ LÝ CHỨC NĂNG XÓA -->
 <script>

    function deleteBN(stt_phieukham) {
        alert("Bạn không có quyền xóa phiếu khám bệnh!");
    }

    // Chinh sua dich vu
  // Chinh sua dich vu
function editBN(stt_phieukham, mota) {
    // Điền thông tin bệnh nhân vào form chỉnh sửa
    document.getElementById('editedEmail').value = stt_phieukham;

    document.getElementById('editedMT').value = mota;
 
    // Hiển thị modal chỉnh sửa
    $('#editBNModal').modal('show');
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
