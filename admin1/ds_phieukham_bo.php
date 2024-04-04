<?php
    include("./configs/connect.php");
    include("./includes/header.php");

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
                                            <th>Mã phiếu</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Email Bác sĩ</th>
                                            <th>Email Bệnh nhân</th>
                                            <th>Ngày đặt</th>
                                            <th>Giờ đặt</th>
                                            <th>Mô tả </th>
                                            <th>Phiếu thu</th>
                                            <th>Phiếu xét nghiệm</th>
                                            <th>Cài đặt</th>
                                        </tr>
                                        <?php
                     
                                        $sql = "SELECT p.STT_PHIEUKHAM, p.EMAILNV, p.EMAILBN, p.NGAYKHAM, p.GIOKHAM, p.MOTA, d.MADICHVU, d.TENDICHVU, d.GIADV, d.MOTADV
                                        FROM phieukhambenh p
                                        INNER JOIN pkbdv pK ON p.STT_PHIEUKHAM = pk.STT_PHIEUKHAM
                                        INNER JOIN dichvu d ON pk.MADICHVU = d.MADICHVU";
                                        
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["STT_PHIEUKHAM"] . "</td>";
                                                echo "<td>" . $row["TENDICHVU"] . "</td>";
                                                echo "<td>" . $row["EMAILNV"] . "</td>";
                                                echo "<td>" . $row["EMAILBN"] . "</td>";
                                                echo "<td>" . $row["NGAYKHAM"] . "</td>";
                                                echo "<td>" . $row["GIOKHAM"] . "</td>";
                                               
                                                echo "<td>" . $row["MOTA"] . "</td>";
                                                echo "<td>
                                                        <button class='pd-setting-ed' onclick=\'createInvoice('" . $row['STT_PHIEUKHAM'] . "')\'>
                                                            <i class='fa fa-file-invoice' aria-hidden='true'></i>
                                                        </button>
                                                    </td>";
                                                echo "<td>
                                                        <button class='pd-setting-ed' onclick=\'createTestForm('" . $row['STT_PHIEUKHAM'] . "')\'>
                                                            <i class='fa fa-flask' aria-hidden='true'></i>
                                                        </button>
                                                    </td>";
                               
                                                                                                
                                                echo "<td>
                                                <button class='pd-setting-ed' onclick=\"editBN('" . $row['STT_PHIEUKHAM'] . "', '" . $row['TENDICHVU'] . "', '" . $row['EMAILNV'] . "', '" . $row['EMAILBN'] . "', '" . $row['NGAYKHAM'] . "', '" . $row['GIOKHAM'] . "' )\">
                                                    <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                </button>
                                                <button class='pd-setting-ed' onclick=\"deleteBN('" . $row['STT_PHIEUKHAM'] . "')\">
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </td>";
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
            <!-- End Danh sách phiếu khám bệnh -->

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
                                    <label for="editedHoten">Tên dịch vụ</label>
                                    <input type="text" id="editedHoten" name="editedHoten" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="editedSdt">Email NV</label>
                                    <input type="text" id="editedSdt" name="editedSdt" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="editedGT">Email BN</label>
                                    <input type="text" id="editedGT" name="editedGT" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="editedNS">Ngày khám</label>
                                    <input type="date" id="editedNS" name="editedNS" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="editedDC">Giờ khám</label>
                                    <input type="time" id="editedDC" name="editedDC" class="form-control">
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

           


    
    </div>


    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->
   
 <!-- XỬ LÝ CHỨC NĂNG XÓA -->
 <script>
    function deleteBN(stt_phieukham) {
        if (confirm("Bạn có chắc chắn muốn xóa bệnh nhân này?")) {
            // Sử dụng Ajax để gửi yêu cầu xóa đến server
            $.ajax({
                type: "POST",
                url: "./configs/xoa_phieukham.php",
                data: { stt_phieukham: stt_phieukham },
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

   // Chinh sua dich vu
// Chinh sua dich vu
function editBN(stt_phieukham, tendichvu, emailnv, emailbn, ngaykham, giokham) {
    // Điền thông tin bệnh nhân vào form chỉnh sửa
    document.getElementById('editedEmail').value = stt_phieukham;
    document.getElementById('editedHoten').value = tendichvu;
    document.getElementById('editedSdt').value = emailnv;
    document.getElementById('editedGT').value =  emailbn;
    document.getElementById('editedNS').value = ngaykham;
    document.getElementById('editedDC').value = giokham;
  
    // Hiển thị modal chỉnh sửa
    $('#editBNModal').modal('show');
}

function saveEditedService() {
    // Lấy thông tin từ form chỉnh sửa
    var editedEmail = document.getElementById('editedEmail').value;
    var editedHoten = document.getElementById('editedHoten').value;
    var editedSdt = document.getElementById('editedSdt').value;
    var editedGT = document.getElementById('editedGT').value;
    var editedNS = document.getElementById('editedNS').value;
    var editedDC = document.getElementById('editedDC').value;

    // Gửi yêu cầu cập nhật thông tin bệnh nhân qua AJAX
    $.ajax({
        type: "POST",
        url: "./configs/chinhsua_phieukham.php",
        data: {
            stt_phieukham: editedEmail,
            tendichvu: editedHoten,
            emailnv: editedSdt,
            emailbn: editedGT,
            ngaykham: editedNS,
            giokham: editedDC
        },
        success: function(response) {
            // Hiển thị thông báo và làm mới trang
            alert(response);
            $('#editBNModal').modal('hide');
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
