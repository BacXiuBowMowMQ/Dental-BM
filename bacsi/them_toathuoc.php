<?php

include("./configs/connect.php");


// Bước 2: Xử lý form nếu có dữ liệu được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tạo mã toa ngẫu nhiên
    $matoa = uniqid();

    $stt_phieukham = $_POST["stt_phieukham"];
    $chuandoan = $_POST["chuandoan"];
    $ngaykedon = $_POST["ngaykedon"];
    
    // Bước 3: Thêm thông tin toa thuốc vào bảng toa_thuoc
    $sql_toathuoc = "INSERT INTO toa_thuoc (MATOA, STT_PHIEUKHAM, CHUANDOAN, NGAYKEDON) 
                     VALUES (?, ?, ?, ?)";
    $stmt_toathuoc = $conn->prepare($sql_toathuoc);
    $stmt_toathuoc->bind_param("ssss", $matoa, $stt_phieukham, $chuandoan, $ngaykedon);
    if ($stmt_toathuoc->execute()) {
        // Thêm toa thuốc thành công
        echo '<script language="javascript">alert("Thêm toa thuốc thành công");</script>';
 
    } else {
        // Lỗi khi thêm toa thuốc
        echo "Lỗi khi thêm toa thuốc: " . $stmt_toathuoc->error . "<br>";
    }
    
    // Lặp qua các mục thuốc được chỉ định và thêm vào bảng chitiettoathuoc
    foreach ($_POST["mathuoc"] as $key => $value) {
        $mathuoc = $_POST["mathuoc"][$key];
        $soluong = $_POST["soluong"][$key];
        $donvitinh = $_POST["donvitinh"][$key];
        $lieudung = $_POST["lieudung"][$key];
        
        $sql_chitiet = "INSERT INTO chitiettoathuoc (MATOA, MATHUOC, SOLUONG, DONVITINH, LIEUDUNG) 
                        VALUES (?, ?, ?, ?, ?)";
        $stmt_chitiet = $conn->prepare($sql_chitiet);
        $stmt_chitiet->bind_param("sssss", $matoa, $mathuoc, $soluong, $donvitinh, $lieudung);
        if ($stmt_chitiet->execute()) {
            // Thêm chi tiết toa thuốc thành công
            // echo "Thêm chi tiết toa thuốc thành công<br>";
        } else {
            // Lỗi khi thêm chi tiết toa thuốc
            echo "Lỗi khi thêm chi tiết toa thuốc: " . $stmt_chitiet->error . "<br>";
        }
    }
}

// Lấy ngày hiện tại
$ngay_hien_tai = date("Y-m-d");

// Đóng kết nối
$conn->close();



?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm toa thuốc</title>
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
    <link rel="stylesheet" href="css_1/toathuoc.css">
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
                        <a href="index.html"><img class="main-logo" src="img/logo.png" alt="" /></a>
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
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Trang chủ</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Thêm toa thuốc</span>
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
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#thembs">Thêm toa thuốc</a></li>
                               
                            </ul>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-row">
            <label for="stt_phieukham">Phiếu Khám:</label>
            <?php include("./configs/mucchon_phieukham.php"); ?>
        </div>
        <div class="form-row">
            <label for="ngaykedon">Ngày kê đơn:</label>
            <input type="date" name="ngaykedon" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="form-row">
            <label for="chuandoan">Chuẩn đoán:</label>
            <input type="text" name="chuandoan">
        </div>
        <!-- Dữ liệu các thuốc -->
      
        <div id="thuoc_fields">
            <table>
                <thead>
                    <tr>
                        <th>Thuốc</th>
                        <th>Số lượng</th>
                        <th>Đơn vị</th>
                        <th>Liều dùng</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="mathuoc[]">
                                <option value="">Chọn thuốc</option>
                                <?php
                                // Truy vấn SQL để lấy danh sách các thuốc
                                $sql = "SELECT * FROM thuoc";
                                $result = $conn->query($sql);

                                // Kiểm tra xem có kết quả trả về hay không
                                if ($result->num_rows > 0) {
                                    // Duyệt qua từng hàng kết quả và tạo các tùy chọn cho trường chọn
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["MATHUOC"] . "'>" . $row["TENTHUOC"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td><input type="text" name="soluong[]" placeholder=""></td>
                        <td><input type="text" name="donvitinh[]" placeholder=""></td>
                        <td><input type="text" name="lieudung[]" placeholder=""></td>
                        <td><button onclick="add_fields(this); return false;">+</button></td>
                        <td><button onclick="remove_fields(this); return false;">-</button></td>
           
                    </tr>
                </tbody>
            </table>
        </div>
       

        <input type="submit" class="btn btn-primary waves-effect waves-light " style='margin: 10px;' value="Thêm Toa Thuốc">
    </form>

    
</div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- End Danh sách toa thuốc -->
    
    </div>








    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->

    <script>
        // Hàm thêm các trường nhập liệu cho thuốc
        function add_fields() {
            var container = document.getElementById("thuoc_fields").getElementsByTagName('tbody')[0];
            var row = container.insertRow(container.rows.length);
            row.innerHTML = `
            <td>
                <select name="mathuoc[]">
                    <option value="">Chọn thuốc</option>
                    <?php
                    // Truy vấn SQL để lấy danh sách các thuốc
                    $sql = "SELECT * FROM thuoc";
                    $result = $conn->query($sql);

                    // Kiểm tra xem có kết quả trả về hay không
                    if ($result->num_rows > 0) {
                        // Duyệt qua từng hàng kết quả và tạo các tùy chọn cho trường chọn
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["MATHUOC"] . "'>" . $row["TENTHUOC"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </td>
            <td><input type="text" name="soluong[]" placeholder=""></td>
            <td><input type="text" name="donvitinh[]" placeholder=""></td>
            <td><input type="text" name="lieudung[]" placeholder=""></td>
            <td><button onclick="add_fields(this); return false;">+</button></td>
            <td><button onclick="remove_fields(this); return false;">-</button></td>`;
        }

        // Hàm xóa các trường nhập liệu cho thuốc
        function remove_fields(button) {
            button.parentNode.parentNode.remove();
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
