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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['change_status']) && isset($_POST['new_status'])) {
        $id = $_POST['change_status'];
        $newStatus = $_POST['new_status'];

        $sql = "UPDATE phieudatlich SET TRANGTHAIPDL = '$newStatus' WHERE IDPHIEU = '$id'";
        $conn->query($sql);

        // Kiểm tra nếu TRANGTHAIPDL được cập nhật thành 0, thì cập nhật cột XULY thành 0
        if ($newStatus == 0) {
            $updateXulySql = "UPDATE phieudatlich SET XULY = 0 WHERE IDPHIEU = '$id'";
            $conn->query($updateXulySql);
        }
    }

    if (isset($_POST['change_status_xl']) && isset($_POST['new_status_xl'])) {
        $id = $_POST['change_status_xl'];
        $newStatus_xl = $_POST['new_status_xl'];
    
        // Update both TRANGTHAIPDL and XULY columns
        $sql_xl = "UPDATE phieudatlich SET XULY = '$newStatus_xl' WHERE IDPHIEU = '$id'";
        $conn->query($sql_xl);
    
    }
     // Process the deletion
    if (isset($_POST['delete_order'])) {
        $idToDelete = $_POST['delete_order'];

        // Check if the order is not confirmed before deleting
        $checkSql = "SELECT TRANGTHAIPDL FROM phieudatlich WHERE IDPHIEU = '$idToDelete'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            $orderStatus = $checkResult->fetch_assoc()['TRANGTHAIPDL'];

            if ($orderStatus == 0) { 
                  // Only delete orders with status "Chưa xác nhận"
                 // Xóa các dòng từ bảng con (pdldv) trước
                $deleteSubOrdersSql = "DELETE FROM pdldv WHERE IDPHIEU = '$idToDelete'";
                $conn->query($deleteSubOrdersSql);

                // Sau đó, xóa dòng từ bảng mẹ (phieudatlich)
                $deleteMainOrderSql = "DELETE FROM phieudatlich WHERE IDPHIEU = '$idToDelete'";
                $conn->query($deleteMainOrderSql);
                echo '<script>alert("Cuộc hẹn đã bị hủy!");</script>';
  
                // $deleteSql = "DELETE FROM phieudatlich WHERE IDPHIEU = '$idToDelete'";
                // $conn->query($deleteSql);
            } else {
                echo '<script>alert("Không thể xóa đơn đã xác nhận.");</script>';
            }
        }
    }
}

$sql = "SELECT p.IDPHIEU, p.EMAILNV, p.EMAILBN, b.SDTBN, p.NGAYDAT, p.GIODAT, p.TRANGTHAIPDL, p.XULY, 
            GROUP_CONCAT(d.TENDICHVU SEPARATOR '<br>') AS TEN_DICH_VU
        FROM phieudatlich p
        INNER JOIN pdldv pd ON p.IDPHIEU = pd.IDPHIEU
        INNER JOIN dichvu d ON pd.MADICHVU = d.MADICHVU
        INNER JOIN benhnhan b ON p.EMAILBN = b.EMAILBN
        WHERE p.EMAILNV = '$email_nv' 
        GROUP BY p.IDPHIEU";

$result = $conn->query($sql);
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách phiếu đặt hẹn khám</title>
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
                                        <li><span class="bread-blod">Danh sách phiếu đặt hẹn khám</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Danh sách phiếu đặt hẹn khám -->
         <!-- Start Danh sách phiếu đặt hẹn khám -->
         <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách phiếu đặt hẹn khám</h4>
                            <div class="add-product">
                                <a href="them_cuochen.php">Tạo cuộc hẹn</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Mã phiếu</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Email Bác sĩ</th>
                                        <th>Email Bệnh nhân</th>
                                        <th>SĐT Bệnh nhân</th>
                                        <th>Ngày đặt</th>
                                        <th>Giờ đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Chọn xử lý</th>
                                        <th>Cài đặt</th>
                                    </tr>
                                    <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["IDPHIEU"] . "</td>";
                                                echo "<td>" . $row["TEN_DICH_VU"] . "</td>";
                                                echo "<td>" . $row["EMAILNV"] . "</td>";
                                                echo "<td>" . $row["EMAILBN"] . "</td>";
                                                echo "<td>" . $row["SDTBN"] . "</td>";
                                                echo "<td>" . $row["NGAYDAT"] . "</td>";
                                                echo "<td>" . $row["GIODAT"] . "</td>";
                                                echo "<td>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='change_status' value='" . $row["IDPHIEU"] . "'>
                                                            <input type='hidden' name='new_status' value='" . ($row["TRANGTHAIPDL"] == 0 ? 1 : 0) . "'>
                                                            <button type='submit' class='btn " . ($row["TRANGTHAIPDL"] == 0 ? "btn-danger" : "btn-success") . "' name='change_status' value='" . $row["IDPHIEU"] . "'>
                                                                " . ($row["TRANGTHAIPDL"] == 0 ? "Chưa xác nhận" : "Đã xác nhận") . "
                                                            </button>
                                                        </form>
                                                </td>";
                                                

                                                echo "<td>";
                                                if ($row["TRANGTHAIPDL"] == 0) {
                                                    // Nếu TRANGTHAIPDL == 0, hiển thị nút "Thay đổi"
                                                    echo "<button class='btn btn-primary' onclick=\"editCH('{$row['IDPHIEU']}', '{$row['GIODAT']}')\">Thay đổi</button>";
                                                } else {
                                                    // Nếu TRANGTHAIPDL != 0, hiển thị nút "Chưa hoàn thành" hoặc "Đã hoàn thành"
                                                    echo "<form method='post' action=''>";
                                                    echo "<input type='hidden' name='change_status_xl' value='{$row["IDPHIEU"]}'>";
                                                    echo "<input type='hidden' name='new_status_xl' value='" . ($row["XULY"] == 0 ? 1 : 0) . "'>";
                                                    echo "<button type='submit' class='btn " . ($row["XULY"] == 0 ? "btn-danger" : "btn-success") . "' name='change_status_xl' value='{$row["IDPHIEU"]}'>";
                                                    echo ($row["XULY"] == 0 ? "Chưa hoàn thành" : "Đã hoàn thành");
                                                    echo "</button>";
                                                    echo "</form>";
                                                }
                                                echo "</td>";
                                                
                                                echo "<td>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='delete_order' value='" . $row["IDPHIEU"] . "'>
                                                            <button type='submit' class='btn btn-danger' name='delete_order' value='" . $row["IDPHIEU"] . "'>
                                                                <i class='fas fa-trash-alt'></i>
                                                            </button>
                                                        </form>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
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
        <!-- End Danh sách phiếu đặt hẹn khám -->

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
