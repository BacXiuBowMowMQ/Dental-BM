

<?php
session_start();
include("./includes/header.php");
include("./configs/connect.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang cá nhân</title>
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

    <!-- End Left menu area -->
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
                                        <li><span class="bread-blod">Thông tin cá nhân</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

       

        <div class="single-pro-review-area mt-t-30 mg-b-15">

       
    </div>



       <!-- Single pro tab review Start-->
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="img/logo/avt.jpg" alt="" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Tên</b><br /><?php echo $_SESSION["name"] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Ngày sinh</b><br /><?php echo $_SESSION["ngaysinh"]?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email ID</b><br />  <?php echo $_SESSION["emailnv"]?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Số điện thoại</b><br /> <?php echo $_SESSION["sdt"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Địa chỉ</b><br /> <?php echo $_SESSION["diachi"] ?></p>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Thông tin cá nhân</a></li>
                                <li><a href="#doimatkhau"> Đổi mật khẩu</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <!-- Thông tin cá nhân -->
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row" style="padding: 30px;">
                                        <form action="./configs/update_thongtin.php" method="POST" >
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Tên</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput2"
                                                            value="<?php echo $_SESSION["name"] ?>" name="ten">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Số điện thoại </label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput3"
                                                            value="<?php echo $_SESSION["sdt"] ?>" name="sdt">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                                            value="<?php echo $_SESSION["diachi"] ?>" name="diachi">
                                                    </div>

                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Email
                                                        </label> <br>

                                                        <?php echo $_SESSION["emailnv"]?>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Ngày sinh</label>
                                                        <input type="date" class="form-control" id="exampleFormControlInput4"
                                                            value="<?php echo $_SESSION["ngaysinh"]?>" name="ngaysinh">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Giới tính</label>

                                                        <div class="form-check" name="gioitinh">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault1" value="nam">
                                                            <label class="form-check-label" for="flexRadioDefault1">Nam</label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault2" checked value="nu">
                                                            <label class="form-check-label" for="flexRadioDefault2">Nữ</label>
                                                        </div>
                                                    </div>

                                                </div>
                                        
                                            <hr>
                                            <button type="submit" name="sb" class="btn btn-primary">Cập nhập</button>
                                        </form>
                                    </div>
                                </div>

                                 <!-- Đổi mật khẩu -->
                                <div class="product-tab-list tab-pane fade" id="doimatkhau">
                                    <div class="row" style="padding: 30px;">       
                                        <div class="container-fluid" style="  margin: 10px 50px 20px 50px;">
                                            <form action="./configs/update_thongtin.php" method="POST"  name="sbf">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Mật Khẩu cũ</label>
                                                            <input type="password" class="form-control" id="exampleFormControlInput2" name="psw2">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Mật Khẩu mới</label>
                                                            <input type="password" class="form-control" id="exampleFormControlInput2" name="psw">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Mật Khẩu nhập lại</label>
                                                            <input type="password" class="form-control" id="exampleFormControlInput2" name="psw1">
                                                        </div>
                                                    
                                                    </div>


                                                </div>
                                                <hr>
                                                <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                        <button type="submit" name="sbpsw" class="btn btn-primary">Cập Nhật</button>
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

    
    <!-- Header Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Header End -->


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
