<?php
    include("./configs/connect.php");
    include("./includes/header.php");

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách dịch vụ</title>
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
                                        <li><span class="bread-blod">Dach sách dịch vụ</span>
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
        <div class="product-status mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap">
                                <h4>Danh sách dịch vụ</h4>
                                <div class="add-product">
                                    <a href="them_dichvu.php">Thêm dịch vụ</a>
                                </div>
                                <div class="asset-inner">
                                    <table>
                                        <tr>
                                            <th>Mã </th>
                                            <th>Tên </th>
                                            <th>Giá </th>
                                            <th>Thời gian áp dụng</th>
                                            <th>Cài đặt</th>
                                        </tr>
                                        <?php
                                        $sql = "SELECT dichvu.MADICHVU, dichvu.TENDICHVU
                                                FROM dichvu
                                                INNER JOIN chitietdichvu ON chitietdichvu.MADICHVU = dichvu.MADICHVU";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["MADICHVU"] . "</td>";
                                                echo "<td>" . $row["TENDICHVU"] . "</td>";
                                                echo "<td>" . $row["NGAYDV"] . "</td>";
                                                echo "<td>" . $row["GIADV"] . "</td>";
                                                echo "<td>
                                               <button class='pd-setting-ed' onclick=\"editService('" . $row['MADICHVU'] . "', '" . $row['TENDICHVU'] . "', '" . $row['GIADV'] . "', '" . $row['NGAP_DV'] . "')\">
                                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                            </button>
                                                <button class='pd-setting-ed' onclick=\"deleteService('" . $row['MADICHVU'] . "')\">
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
            <!-- End Danh sách dịch vụ -->

           <!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editServiceModalLabel">Chỉnh sửa dịch vụ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields for editing the service here -->
                <form id="editServiceForm">
                    <div class="form-group">
                        <label for="editedServiceName">Tên dịch vụ:</label>
                        <input type="text" id="editedServiceName" name="editedServiceName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editedServicePrice">Giá:</label>
                        <input type="text" id="editedServicePrice" name="editedServicePrice" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editedServiceTime">Thời gian áp dụng:</label>
                        <input type="text" id="editedServiceTime" name="editedServiceTime" class="form-control">
                    </div>

                    <input type="hidden" id="editedServiceId" name="editedServiceId">
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
    function deleteService(madichvu) {
        if (confirm("Bạn có chắc chắn muốn xóa dịch vụ này?")) {
            // Sử dụng Ajax để gửi yêu cầu xóa đến server
            $.ajax({
                type: "POST",
                url: "./configs/xoa_dichvu.php",
                data: { madichvu: madichvu },
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

    // function editService(madichvu) {
    //     // Chuyển hướng đến trang chỉnh sửa dịch vụ với mã dịch vụ cần chỉnh sửa
    //     window.location.href = "chinhsua_dichvu.php?madichvu=" + madichvu;
    // }
</script>
<script>
    function editService(madichvu, tendichvu, giadv, tgapdv) {
        // Set values in the modal fields
        document.getElementById('editedServiceId').value = madichvu;
        document.getElementById('editedServiceName').value = tendichvu;
        document.getElementById('editedServicePrice').value = giadv;
        document.getElementById('editedServiceTime').value = tgapdv;

        // Show the modal
        $('#editServiceModal').modal('show');
    }

    function saveEditedService() {
        // Get values from the modal fields
        var madichvu = document.getElementById('editedServiceId').value;
        var tendichvu = document.getElementById('editedServiceName').value;
        var giadv = document.getElementById('editedServicePrice').value;
        var tgapdv = document.getElementById('editedServiceTime').value;

        // Perform AJAX request to save changes
        $.ajax({
            type: "POST",
            url: "./configs/chinhsua_dichvu.php",
            data: {
                madichvu: madichvu,
                tendichvu: tendichvu,
                giadv: giadv,
                tgapdv: tgapdv
                // Add more fields as needed
            },
            success: function(response) {
                alert(response);
                // Close the modal
                $('#editServiceModal').modal('hide');
                // Refresh the page or update the service list
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
