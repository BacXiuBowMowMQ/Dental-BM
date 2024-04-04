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


// Xử lý khi nút "Thay đổi trạng thái" được nhấn
if(isset($_POST['change_status'])){
    $mapt = $_POST['change_status']; // Mã phiếu thu
    $newStatus = $_POST['new_status']; // Trạng thái mới

    // Cập nhật trạng thái trong cơ sở dữ liệu
    $update_sql = "UPDATE phieuthu SET TRANGTHAI = '$newStatus' WHERE MAPT = '$mapt'";

    if ($conn->query($update_sql) === TRUE) {
      
       
        echo '<script>alert("Cập nhật trạng thái thành công.");</script>';
    } else {
        echo "Lỗi: " . $conn->error;
    }
}


// Xử lý khi nút submit được nhấn
if(isset($_POST['submit'])){
    $stt_phieukham = $_POST['stt_phieukham'];

    // Kiểm tra xem STT_PHIEUKHAM đã tồn tại trong bảng phieuthu chưa
    $check_sql = "SELECT COUNT(*) AS count FROM phieuthu WHERE STT_PHIEUKHAM = '$stt_phieukham'";
    $check_result = $conn->query($check_sql);
    $check_row = $check_result->fetch_assoc();
    $count = $check_row['count'];

    if($count > 0) {
        echo '<script>alert("STT Phiếu Khám này đã được tạo phiếu thu.");</script>';
       
    } else {
        $ngaylappt = date("Y-m-d H:i:s");
        $tonggia = 0;
        $lydo = "Thanh toán chi phí khám bệnh";

        // Lấy danh sách các dịch vụ từ bảng pkbdv
        $sql_dichvu = "SELECT * FROM pkbdv WHERE STT_PHIEUKHAM = '$stt_phieukham'";
        $result_dichvu = $conn->query($sql_dichvu);

        if ($result_dichvu->num_rows > 0) {
            // Duyệt qua mỗi dịch vụ để tính tổng giá trị
            while($row_dichvu = $result_dichvu->fetch_assoc()) {
                $madichvu = $row_dichvu['MADICHVU'];
                // Truy vấn để lấy giá của dịch vụ từ bảng dichvu
                $sql_gia = "SELECT GIADV FROM dichvu WHERE MADICHVU = '$madichvu'";
                $result_gia = $conn->query($sql_gia);

                if ($result_gia->num_rows > 0) {
                    $row_gia = $result_gia->fetch_assoc();
                    $gia = $row_gia['GIADV'];
                    $tonggia += $gia;
                }
            }
        }

        // Tạo mã phiếu thu mới
        $mapt = generateRandomString(10);

        // Thêm thông tin vào bảng phieuthu
        $sql_insert = "INSERT INTO phieuthu (MAPT, STT_PHIEUKHAM, NGAYLAPPT, TONGGIA, LYDO, TRANGTHAI) 
                    VALUES ('$mapt', '$stt_phieukham', '$ngaylappt', '$tonggia', '$lydo', 0)";

        if ($conn->query($sql_insert) === TRUE) {
            echo '<script>alert("Phiếu thu đã được tạo thành công.");</script>';
         
        } else {
            echo "<p>Lỗi: " . $sql_insert . "<br>" . $conn->error . "</p>";
        }
    }
}
// Hàm tạo chuỗi ngẫu nhiên (cần được định nghĩa)
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$sql = "SELECT pt.MAPT, pt.TONGGIA, pk.EMAILBN, dv.TENDICHVU, dv.GIADV, bs.EMAILNV, pt.NGAYLAPPT, pt.TRANGTHAI, pk.STT_PHIEUKHAM
FROM phieuthu pt
JOIN phieukhambenh pk ON pt.STT_PHIEUKHAM = pk.STT_PHIEUKHAM
JOIN pkbdv p ON pt.STT_PHIEUKHAM = p.STT_PHIEUKHAM
JOIN dichvu dv ON p.MADICHVU = dv.MADICHVU
JOIN nhanvien bs ON pk.EMAILNV = bs.EMAILNV";

$result = $conn->query($sql);


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách phiếu thu</title>
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
                                        <li><span class="bread-blod">Danh sách phiếu thu</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Start Danh sách phiếu thu -->
         <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                             
                            <h4 style="float: left;">Danh sách phiếu thu</h4>
                            <div style="float: right;">
                            <form action="" method="post">
                                <label for="stt_phieukham">STT Phiếu Khám:</label>
                                <?php include("./configs/mucchon_phieukham.php"); ?> <!-- Thêm mục chọn từ file PHP -->
                                <br><br>
                                <input type="submit" name="submit" value="Tạo Phiếu Thu">
                            </form>
                            </div>
                            <div class="asset-inner">
                                <table>
                                     <tr>
                                        <th>Mã Phiếu thu</th>
                                        <th>STT_Phiếu khám</th>
                                        <th>Ngày lập</th>
                                        <th>Tên bệnh nhân</th>
                                        <th>Tên bác sĩ</th>
                                       
                                        <th>Lý do</th>
                                        <th>Tổng giá</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                     <!-- ... (Phần phân trang) ... -->
                            <?php
                                
        
                                $sql = "SELECT pt.MAPT, pt.TONGGIA, pk.EMAILBN,
                                bs.EMAILNV, pt.NGAYLAPPT, pt.TRANGTHAI, pk.STT_PHIEUKHAM, pt.LYDO
                                FROM phieuthu pt
                                JOIN phieukhambenh pk ON pt.STT_PHIEUKHAM = pk.STT_PHIEUKHAM
                            
                                JOIN nhanvien bs ON pk.EMAILNV = bs.EMAILNV";
    
                        $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                            // Duyệt qua mỗi phiếu thu và hiển thị trong bảng
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["MAPT"]."</td>";
                                echo "<td>".$row["STT_PHIEUKHAM"]."</td>";
                                echo "<td>".$row["NGAYLAPPT"]."</td>";
                                echo "<td>".$row["EMAILBN"]."</td>";
                                echo "<td>".$row["EMAILNV"]."</td>";
                                echo "<td>".$row["LYDO"]."</td>";
                                echo "<td>" . $row["TONGGIA"] . ".000đ</td>";

                                echo "<td>
                                        <form method='post' action=''>
                                            <input type='hidden' name='change_status' value='" . $row["MAPT"] . "'>
                                            <input type='hidden' name='new_status' value='" . ($row["TRANGTHAI"] == 0 ? 1 : 0) . "'>
                                            <button type='submit' class='btn " . ($row["TRANGTHAI"] == 0 ? "btn-danger" : "btn-success") . "' name='change_status' value='" . $row["MAPT"] . "'>
                                                " . ($row["TRANGTHAI"] == 0 ? "Chưa thanh toán" : "Đã thanh toán") . "
                                            </button>
                                        </form>
                            </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Không có phiếu thu nào được tìm thấy.</td></tr>";
                        }
    
                        $conn->close();
                                                    ?>
                                    
                                </table>
                            </div>
                           
        

                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Danh sách phiếu thu -->

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
    function editCH(idphieu, giodat) {
        // Điền thông tin lịch hẹn vào form chỉnh sửa
        document.getElementById('editedScheduleId').value = idphieu;
        document.getElementById('editedSchedule').value = giodat;

        // Hiển thị modal chỉnh sửa
        $('#editCHModal').modal('show');
    }

    function saveEditedSchedule() {
        // Lấy thông tin từ form chỉnh sửa
        var idphieu = document.getElementById('editedScheduleId').value;
        var giodat = document.getElementById('editedSchedule').value;

        // Gửi yêu cầu cập nhật lịch hẹn qua AJAX
        $.ajax({
            type: "POST",
            url: "chinhsua_cuochen.php",
            data: {
                idphieu: idphieu,
                giodat: giodat
            },
            success: function(response) {
                // Hiển thị thông báo và làm mới trang
                alert(response);
                $('#editCHModal').modal('hide');
                location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

     // Hàm để tạo mã ngẫu nhiên
     function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
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
