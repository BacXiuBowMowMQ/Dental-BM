<?php
    include("./configs/connect.php");
    include("./includes/header.php");

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách ca làm việc</title>
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
                                        <li><span class="bread-blod">Dach sách ca làm</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Danh sách ca làm việc -->
             <div class="product-status mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap">
                                <h4>Danh sách ca làm</h4>
                                <div class="add-product">
                                    <a href="them_calam.php">Thêm ca làm việc</a>
                                </div>
                                <div class="asset-inner">
                                    <table>
                                        <tr>
                                            <th>Mã ca</th>
                                            <th>Ngày làm</th>
                                            <th>Thời gian bắt đầu</th>
                                            <th>Thời gian kết thúc</th>
                                            <th>Trạng thái</th>
                                         
                                          
                                            <th>Cài đặt</th>
                                        </tr>
                                        <?php
                                       
                                       $sql = "SELECT MACLV, 
                                            DATE(THOIGIANBATDAU) AS NgayBatDau, 
                                            TIME(THOIGIANBATDAU) AS GioBatDau, 
                                            TIME(THOIGIANKETTHUC) AS GioKetThuc, 
                                            XACNHAN 
                                        FROM calamviec";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["MACLV"] . "</td>";
                                                echo "<td>" . $row["NgayBatDau"] . "</td>";
                                                echo "<td>" . $row["GioBatDau"] . "</td>";
                                                echo "<td>" . $row["GioKetThuc"] . "</td>";
                                                
                                                // // Thay đổi hiển thị dựa trên giá trị của cột XACNHAN
                                                echo "<td>";
                                               
                                                if ($row["XACNHAN"] == 0) {
                                                    echo '<button onclick="showCalamInfo(\'' . $row['MACLV'] . '\')" style="background-color: red;
                                                                                                                       color: white;
                                                                                                                       border: none;
                                                                                                                       padding: 5px 10px;
                                                                                                                       border-radius: 5px;
                                                                                                                       cursor: pointer;">Chưa có bác sĩ</button>';
                                                } elseif ($row["XACNHAN"] == 1) {
                                                    echo '<button onclick="showCalamInfo(\'' . $row['MACLV'] . '\')" style="background-color: green;
                                                                                                                       color: white;
                                                                                                                       border: none;
                                                                                                                       padding: 5px 10px;
                                                                                                                       border-radius: 5px;
                                                                                                                       cursor: pointer;">Đã có bác sĩ</button>';
                                                }
                                                echo "</td>";
                                                
                                             

                                               
                                                // echo "<td>
                                                // <button class='pd-setting-ed' onclick=\"showCalamInfo('" . $row['MACLV'] . "')\">
                                                //     <i class='fa fa-info-circle'  aria-hidden='true'></i>
                                                //     </button>
                                                // </td>";

                                                
                                                echo "<td>
                                                      <button class='pd-setting-ed' onclick=\"editCLV('" . $row['MACLV'] . "', '" . $row['NgayBatDau'] . "', '" . $row['GioBatDau'] . "', '" . $row['GioKetThuc'] . "')\">
                                                          <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                      </button>
                                                      <button class='pd-setting-ed' onclick=\"deleteCLV('" . $row['MACLV'] . "')\">
                                                          <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                      </button>
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
            <!-- End Danh sách ca làm việc -->

             <!-- Edit Service Modal -->
            <div class="modal fade" id="editCLVModal" tabindex="-1" role="dialog" aria-labelledby="editCLVModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editCLVModalLabel">Chỉnh sửa ca làm việc</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form chỉnh sửa ca làm việc -->
                        
                            <form id="editCLVForm">
                                <div class="form-group">
                                    <label for="editedNgay">Ngày làm</label>
                                    <input type="text" id="editedNgay" name="editedNgay" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="editedTGBD">Thời gian bắt đầu</label>
                                    <input type="text" id="editedTGBD" name="editedTGBD" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="editedTGKT">Thời gian kết thúc</label>
                                    <input type="text" id="editedTGKT" name="editedTGKT" class="form-control">
                                </div>

                              

                                <input type="hidden" id="editedMa" name="">

                               
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" onclick="saveEditedCLV()">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Xem tên bs -->

            <!-- Thêm modal để hiển thị thông tin nhân viên -->
            <div class="modal fade" id="employeeInfoModal" tabindex="-1" role="dialog" aria-labelledby="employeeInfoModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="employeeInfoModalLabel">Thông tin nhân viên</h4>
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

<!-- Sử dụng AJAX để lấy thông tin của nhân viên -->

<script>
function showCalamInfo(macLV) {
    $.ajax({
        type: "GET",
        url: "./configs/thongtin_bs.php",
        data: { macLV: macLV },
        success: function(response) {
            $('#employeeInfoContent').html(response);
            $('#employeeInfoModal').modal('show');
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
    
    </div>


    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->



    <!-- XỬ LÝ CHỨC NĂNG XÓA -->
    <script>
    function deleteCLV(maclv) {
        if (confirm("Bạn có chắc chắn muốn xóa ca làm việc này?")) {
            // Sử dụng Ajax để gửi yêu cầu xóa đến server
            $.ajax({
                type: "POST",
                url: "./configs/xoa_calam.php",
                data: { maclv: maclv },
                success: function(response) {
                    alert(response);
                    // Refresh trang hoặc làm mới danh sách ca làm việc sau khi xóa
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }

   // Chinh sua dich vu
// Chinh sua dich vu
function editCLV(maclv, ngaybatdau, giobatdau, gioketthuc) {
    // Điền thông tin ca làm việc vào form chỉnh sửa
    document.getElementById('editedMa').value = maclv;
    document.getElementById('editedNgay').value = ngaybatdau;
    document.getElementById('editedTGBD').value = giobatdau;
    document.getElementById('editedTGKT').value = gioketthuc;
    
 
  
    // Hiển thị modal chỉnh sửa
    $('#editCLVModal').modal('show');
}

function saveEditedCLV() {
    // Lấy thông tin từ form chỉnh sửa
    var editedMa = document.getElementById('editedMa').value;
    var editedNgay = document.getElementById('editedNgay').value;
    var editedTGBD = document.getElementById('editedTGBD').value;
    var editedTGKT = document.getElementById('editedTGKT').value;
   
   
    // Gửi yêu cầu cập nhật thông tin ca làm việc qua AJAX
    $.ajax({
        type: "POST",
        url: "./configs/chinhsua_calam.php",
        data: {
            maclv: editedMa,
            ngaybatdau: editedNgay,
            giobatdau: editedTGBD,
            gioketthuc: editedTGKT,
          
            
        },
        success: function(response) {
            // Hiển thị thông báo và làm mới trang
            alert(response);
            $('#editCLVModal').modal('hide');
            location.reload();
        },
        error: function(error) {
            console.log(error);
        }
    });
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
