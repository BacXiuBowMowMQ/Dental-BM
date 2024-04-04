<!-- Header Start -->
<?php
    include("./includes/header.php"); 
    include("./configs/connect.php");
?>


   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thông tin cá nhân</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

  
    <!-- Favicon -->
    <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
   


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">THÔNG TIN CÁ NHÂN</h1>
                <a href="" class="h4 text-white">Trang cá nhân</a>
                <i class="fa-solid fa-slash text-white px-2"></i>
                <a href="" class="h4 text-white">Thông tin cá nhân</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- user -->
    <div class="container-fluid mb-5" style="padding-bottom: 50px">
        <div class="row px-xl-5 pt-3">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0"><img src="img/avt.jpg" alt="user" class="rounded-circle" width="40"> Xin chào <?php echo $_SESSION["name"] ?>  </h6>
                    <i class="fa-solid fa-chevron-down" style="color: #fcfcfc;"></i>
                </a>

                <?php
                    include("./includes/nav.php"); 
                  
                ?>

                
            </div>
            <div class="col-lg-9">
                <!-- hien thi thong tin nguoi dung-->
                <div class="container">
                    <form action="./configs/update_user.php" method="POST" class="formuser">
                        <div class="section-title">
                            <!-- <h3><span>Thông tin tài khoản</span></h3> -->
                        </div>  
                        <div class="row">
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
                                    <label for="exampleFormControlInput1" class="form-label">Địa Chỉ</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        value="<?php echo $_SESSION["diachi"] ?>" name="diachi">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput4"
                                        value="<?php echo $_SESSION["ngaysinh"]?>" name="ngaysinh">
                                </div>

                            </div>

                            
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                        <br>
                                        <?php echo $_SESSION["email"]?>
                                    </label>

                                </div>
                               
                                    <label for="exampleFormControlInput1" class="form-label">Giới tính</label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh"
                                            id="flexRadioDefault1" value="nam">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh"
                                            id="flexRadioDefault2" checked value="nu">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                             <!----->
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" name="sb">
                                Gửi
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ket thuc hien thi thong tin nguoi dung-->

             
            </div>
        </div>
    </div>
    <!--  -->

   
    <!-- Footer Start -->
    <?php include("./includes/footer.php"); ?>

    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>