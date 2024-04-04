<?php
session_start();
include("./configs/connect.php");
include("./includes/header.php");

$SoNamKinhNghiem = ""; // Giá trị mặc định cho số năm kinh nghiệm

// Xử lý nếu có dữ liệu được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ngày vào làm việc có được gửi từ form hay không
    if (isset($_POST["ngayvao"])) {
        // Lấy giá trị ngày vào làm việc từ form
        $ngayVaoLam = $_POST["ngayvao"];
        
        // Kiểm tra ngày vào làm việc có hợp lệ hay không
        if (strtotime($ngayVaoLam) !== false) {
            // Tính số năm kinh nghiệm
            $ngayBatDau = new DateTime($ngayVaoLam);
            $ngayHienTai = new DateTime();
            $SoNamKinhNghiem = $ngayBatDau->diff($ngayHienTai)->y;
        } else {
            // Ngày không hợp lệ, thông báo lỗi
            echo "Ngày vào làm việc không hợp lệ!";
        }
    }
}

// Xử lý dữ liệu từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailnv = $_POST["emailnv"];
    $sdt = $_POST["sdt"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $namsinh = $_POST["namsinh"];
    $diachi = $_POST["diachi"];
    $psw = md5($_POST["psw"]); // Mã hóa mật khẩu bằng MD5
    $ngaybatdau = $_POST["ngaybatdau"];
    $chungchi = $_POST["chungchi"];
    $bangcap = $_POST["bangcap"];
    $csdaotao = $_POST["csdaotao"];
    $kinhnghiem = $_POST["kinhnghiem"];

    // Mã quyền mặc định
    $maquyen = 2;

     // Kiểm tra xem giá trị emailnv đã tồn tại trong bảng nhanvien hay chưa
     $sql_check_emailnv = "SELECT * FROM nhanvien WHERE emailnv = '$emailnv'";
     $result_check_emailnv = $conn->query($sql_check_emailnv);
 
     if ($result_check_emailnv->num_rows > 0) {
         // Nếu giá trị emailnv đã tồn tại, hiển thị thông báo lỗi và ngăn việc thêm bản ghi mới
         echo '<script language="javascript">alert("Email bác sĩ đã tồn tại.");</script>';
     } else {
         // Nếu giá trị emailnv chưa tồn tại, thực hiện thêm bản ghi mới vào bảng nhanvien
         $sql_nhanvien = "INSERT INTO nhanvien (emailnv, MAQUYEN, SDTNV, HOTENNV, GIOITINHNV, NAMSINHNV, DIACHINV, PASSWORDNV, NGAYVAOLAMVIEC, CHUNGCHIHANHNGHE, BANGCAPCHUYENMON, COSODAOTAO, SONAMKINHNGHIEM) VALUES ('$emailnv', '$maquyen', '$sdt', '$hoten', '$gioitinh', '$namsinh', '$diachi', '$psw', '$ngaybatdau', '$chungchi', '$bangcap', '$csdaotao', '$kinhnghiem')";

 
         if ($conn->query($sql_nhanvien) === TRUE) {
             echo '<script language="javascript">alert("Bác sĩ đã được thêm thành công.");</script>';
         } else {
            //  echo '<script language="javascript">alert("Lỗi: ' . $sql_nhanvien . '\n' . $conn->error . '");</script>';
         }
     }
}

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm bác sĩ</title>
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
                                        <li><span class="bread-blod">Thêm bác sĩ</span>
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
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#thembs">Thêm bác sĩ</a></li>
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="thembs">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    

                                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="hoten">Họ Tên</label>
                                                                    <input name="hoten" type="text" class="form-control" placeholder="Họ và tên">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input name="emailnv" type="text" class="form-control" placeholder="Email">
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                    <label for="Số điện thoại">Số điện thoại</label>
                                                                    <input name="sdt" type="number" class="form-control" placeholder="Số điện thoại">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="">Năm sinh</label>
                                                                    <input name="namsinh" id="finish" type="date" class="form-control" placeholder="Ngày sinh">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Mật khẩu</label>
                                                                    <input name="psw" id="postcode" type="text" class="form-control" placeholder="Mật khẩu">
                                                                </div>
                                                                 
                                                                <div class="form-group">
                                                                    <label for="">Giới tính</label>
                                                                    <select name="gioitinh" class="form-control">
																		<option value="none" selected="" disabled="">Chọn giới tính</option>
																		<option value="Nam">Nam</option>
																		<option value="Nữ">Nữ</option>
																	</select>
                                                                </div>

                                                                
                            
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
                                                                    <label for="">Địa chỉ</label>
                                                                    <input name="diachi" type="text" class="form-control" placeholder="Địa chỉ">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Chứng chỉ hành nghề</label>
                                                                    
                                                             
                                                                    <select name="chungchi" class="form-control">
																		<option value="none" selected="" disabled=""></option>
																		<option value="Có chứng chỉ hành nghề">Có</option>
																		<option value="Chưa có chứng chỉ hành nghề">Chưa có</option>
                                                                      
																	</select>
                                                               
                                                                    <!-- <input name="chungchi" id="text" type="text" class="form-control" placeholder="Chứng chỉ hành nghề"> -->
                                                                </div>

                                
                                                                <div class="form-group">
                                                                    <label for="bangcap">Bằng cấp chuyên môn</label>
                                                                    <select name="bangcap" class="form-control">
                                                                        <option value="none" selected disabled>Chọn</option>
                                                                        <option value="Bằng cử nhân">Bằng cử nhân</option>
                                                                        <option value="Bằng thạc sĩ">Bằng thạc sĩ</option>
                                                                        <option value="Bằng tiến sĩ">Bằng tiến sĩ</option>
                                                                        <option value="Khác">Khác</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="csdaotao">Cơ sở đào tạo</label>
                                                                    <select name="csdaotao" class="form-control">
                                                                        <option value="none" selected disabled>Chọn</option>
                                                                        <option value="Trường Đại học Y Dược TP. HCM">Trường Đại học Y Dược TP. HCM</option>
                                                                        <option value="Trường Đại học Y Dược TP. Cần Thơ">Trường Đại học Y Dược TP. Cần Thơ</option>
                                                                        <option value="Trường Đại học Y Dược Huế">Trường Đại học Y Dược Huế</option>
                                                                        <option value="Trường Cao đẳng Y tế Đồng Nai">Trường Cao đẳng Y tế Đồng Nai</option>
                                                                        <option value="Khác">Khác</option>
                                                                    </select>
                                                                </div>
                     
                                                                  <!-- Hiển thị số năm kinh nghiệm -->
                                                                  <div class="form-group">
    <label for="ngaybatdau">Ngày bắt đầu làm việc</label>
    <input name="ngaybatdau" id="ngaybatdau" type="text" class="form-control" placeholder="Nhập ngày bắt đầu làm việc (DD-MM-YYYY)" onblur="tinhNamKinhNghiem()">
</div>
<div class="form-group">
    <label for="kinhnghiem">Số năm kinh nghiệm</label>
    <input name="kinhnghiem" id="kinhnghiem" type="text" class="form-control" value="<?php echo $SoNamKinhNghiem; ?>" readonly>
</div>


                              </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- End Danh sách bác sĩ -->
    
    </div>



    <script>
    function tinhNamKinhNghiem() {
        var ngayBatDau = document.getElementById('ngaybatdau').value;
        var ngayHienTai = new Date();
        var ngayBatDauFormat = new Date(ngayBatDau);

        if (isNaN(ngayBatDauFormat.getTime())) {
            alert('Vui lòng nhập ngày bắt đầu làm việc hợp lệ (YYYY-MM-DD).');
            return;
        }

        var namKinhNghiem = ngayHienTai.getFullYear() - ngayBatDauFormat.getFullYear();
        var thangHienTai = ngayHienTai.getMonth() + 1;
        var thangBatDau = ngayBatDauFormat.getMonth() + 1;

        if (thangHienTai < thangBatDau || (thangHienTai == thangBatDau && ngayHienTai.getDate() < ngayBatDauFormat.getDate())) {
            namKinhNghiem--;
        }

        document.getElementById('kinhnghiem').value = namKinhNghiem + " năm";
    }
</script>


    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->


    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></scrip>
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
