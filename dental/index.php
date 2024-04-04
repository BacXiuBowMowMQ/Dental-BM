 <!-- Header Start -->

 <?php


include("./includes/header.php");
include("./configs/connect.php");

// Xử lý dữ liệu biểu mẫu nếu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $madichvu = $_POST['madichvu']; // Lấy mã dịch vụ từ biểu mẫu
    $email = $_POST['email'];
    $emailnv = $_POST['emailnv']; // Lấy email từ biểu mẫu
    $ngayhen = $_POST['ngayhen']; // Lấy ngày hẹn từ biểu mẫu
    $giohen = $_POST['giohen']; // Lấy giờ hẹn từ biểu mẫu

    // Tạo ID phiếu dựa trên thời gian hiện tại
    $idphieu = "ID" . (rand());

    // Chèn dữ liệu vào bảng `phieudatlich`
    $sql_phieudatlich = "INSERT INTO phieudatlich (IDPHIEU, EMAILNV, EMAILBN, NGAYDAT, GIODAT, TRANGTHAIPDL)
            VALUES ('$idphieu',  '$emailnv', '$email', '$ngayhen', '$giohen', 0)";

if ($conn->query($sql_phieudatlich) === TRUE) {
    // Chèn dữ liệu vào bảng `pdldv`
    $sql_pdldv = "INSERT INTO pdldv (IDPHIEU, MADICHVU)
            VALUES ('$idphieu', '$madichvu')";
    
    if ($conn->query($sql_pdldv) === TRUE) {
        echo '<script language="javascript">alert("Cuộc hẹn đã được đặt thành công!");</script>';
        
    } else {
        echo "Đã xảy ra lỗi khi đặt dịch vụ: " . $conn->error;
    }
} else {
    echo "Đã xảy ra lỗi khi đặt lịch hẹn: " . $conn->error;
}
}

// Đóng kết nối
$conn->close();


?>

<!-- Header End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
   
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


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 500px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">HOÀN THIỆN NỤ CƯỜI NÂNG TẦM BẢN THÂN</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">You Smile We Smile</h1>
                            <a href="price.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Đặt lịch hẹn</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">GIỮ RĂNG CỦA BẠN KHỎE MẠNH</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nha Khoa BM Làm Rạng Rỡ Nụ Cười</h1>
                            <a href="price.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Đặt lịch hẹn</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5 feature-item" style="height: 300px;">
                        <h3 class="text-white mb-3">Thời gian làm việc</h3>

                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Thứ hai - Thứ sáu</h6>
                            <p class="mb-0"> 7:00am - 9:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Thứ bảy</h6>
                            <p class="mb-0"> 8:00am - 7:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Chủ nhật</h6>
                            <p class="mb-0"> 8:00am - 5:00pm</p>
                        </div>
                        <a class="btn btn-light" href="">Đặt hẹn</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5 feature-item" style="height: 300px;">
                        <h3 class="text-white mb-3">Tìm Kiếm Bác Sĩ</h3>
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                placeholder="Ngày hẹn" data-target="#date" data-toggle="datetimepicker" style="height: 40px;">
                        </div>
        

                        <?php include('./configs/mucchon_bacsi.php'); ?>
                        <br>
                        
                        <a class="btn btn-light" href="">Tìm Bác Sĩ</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5 feature-item" style="height: 300px;">
                        <h3 class="text-white mb-3">Tư Vấn Miễn Phí</h3>
                        <p class="text-white">Nếu bạn cần tư vấn chuyên sâu về sức khoẻ răng miệng, xin vui lòng liên hệ số điện thoại cùng lời nhắn. Chúng tôi sẽ gọi điện hỗ trợ trong thời gian sớm nhất.</p>
                        <h2 class="text-white mb-0">+012 345 6789</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Về Chúng Tôi</h5>
                        <h1 class="display-5 mb-0">Nha khoa BM - Phòng khám nha khoa răng hàm mặt uy tín hàng đầu</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4">Mục tiêu của nha khoa với phương châm: “You Smile, We Smile”</h4>
                    <p class="mb-4">Sở hữu một nụ cười rạng ngời với hàm răng khỏe mạnh là niềm vui, hạnh phúc của tất cả mọi người.”</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Trang thiết bị thiện đại</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Nhân viên chuyên nghiệp</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Hỗ trợ khách hàng 24/7</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Giá cả hợp lý</h5>
                        </div>
                    </div>
                    <a href="about.php" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Xem Thêm</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Đặt lịch hẹn -->
    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-12 text-white mb-4">TẬN TÂM – CHÂN THẬT</h1>
                        <p class="text-white mb-0">Tận tâm: Nền tảng đạo đức của người thầy thuốc. BS Nha Khoa BM luôn chọn kế hoạch điều trị tốt nhất cho khách hàng.</p>
                        <br><p class="text-white mb-0">Chân thật: Nền tảng đạo đức của mỗi con người. Chân thật với chính mình, chân thật với khách hàng, chân thật với đối tác.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Đặt Lịch Hẹn</h1>
                          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-light border-0" placeholder="Họ và Tên" style="height: 55px;"
                                        value="<?php echo $_SESSION["name"] ?>" name="hoten">
                                  
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name='email' class="form-control bg-light border-0" placeholder="Email" style="height: 55px;"
                                     value="<?php echo $_SESSION["email"]?>" name="email">
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <div class="" >
                                        <input type="date" name='ngayhen'
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Ngày hẹn" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <?php
                                        include('./configs/mucchon_bacsi.php');
                                    ?>
                                </div>

                               

                                
                                <div class="col-12 col-sm-6">
                                   
                                    <div >
                                            <select  name='giohen'class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Giờ hẹn" style="height: 55px;" >
                                                <option value="none" selected="" disabled="">Chọn</option>
                                                <option value="08:00 - 09:00">08:00 - 09:00</option>
                                                <option value="09:00 - 10:00">09:00 - 10:00</option>
                                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                <option value="12:00 - 13:00">12:00 - 13:00</option>
                                                <option value="13:00 - 14:00">13:00 - 14:00</option>
                                                <option value="14:00 - 15:00">14:00 - 15:00</option>
                                                <option value="15:00 - 16:00">15:00 - 16:00</option>
                                                <option value="16:00 - 17:00">16:00 - 17:00</option>
                                                <option value="17:00 - 18:00">17:00 - 18:00</option>
                                            </select>
                                    </div>

                                   
                                </div>

                                <div class="col-12 col-sm-6" name="madichvu">
                                    <?php
                                        include('./configs/mucchon_dichvu.php');
                                    ?>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Đặt lịch hẹn</button>
                                </div>

                            </div>
                        </form>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="col-lg-7">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">DỊCH VỤ CỦA CHÚNG TÔI</h5>
                    <h1 class="display-5 mb-0">Chúng tôi cung cấp dịch vụ với chất lượng tốt nhất</h1>
                </div>
            </div>
            <!-- First Row -->
            <div class="row mb-5">
                <div class="col-md-3">
                    <a href="boc-rang-su.php">
                    <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/service-su.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Bọc răng sứ</h5>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/service-11.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Cấy ghép implant</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/service-5.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Điều trị nha chu</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/service-nieng.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Niềng răng</h5>
                    </div>
                </div>
            </div>

        <!-- Second Row -->
        <div class="row">
            <div class="col-md-3">
                
                <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/service-12.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Điều trị tủy</h5>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="rounded-top overflow-hidden">
                    <img class="img-fluid" src="img/service-7.jpg" alt="">
                    </div>
                    <div class="position-relative bg-light rounded-bottom text-center p-4">
                        <h5 class="m-0">Tẩy trắng răng</h5>
                </div>
            </div>
            <div class="col-md-3">
            <div class="rounded-top overflow-hidden">
                    <img class="img-fluid" src="img/service-13.jpg" alt="">
                </div>
                <div class="position-relative bg-light rounded-bottom text-center p-4">
                    <h5 class="m-0">Trám răng</h5>
                </div>
            </div>
            <div class="col-md-3">
            <div class="rounded-top overflow-hidden">
                    <img class="img-fluid" src="img/service-15.jpg" alt="">
                </div>
                <div class="position-relative bg-light rounded-bottom text-center p-4">
                    <h5 class="m-0">Nhổ răng</h5>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Service End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="offer-text text-center rounded p-5">
                        <h1 class="display-5 text-white">Tiết kiệm 30% khi khám răng định kỳ</h1>
                        <p class="text-white mb-4">Sức khỏe răng miệng là quan trọng, và chúng tôi muốn giúp bạn duy trì một nụ cười khỏe mạnh. Hãy liên hệ với chúng tôi ngay hôm nay để đặt hẹn và tận hưởng ưu đãi không thể bỏ lỡ này. </p>
                        <a href="price.php" class="btn btn-dark py-3 px-5 me-3">Đặt Lịch Khám</a>
                        <a href="price.php" class="btn btn-light py-3 px-5">Xem Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Pricing Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">BẢNG GIÁ</h5>
                        <h1 class="display-5 mb-0">Mức giá hợp lý cho việc điều trị nha khoa.</h1>
                    </div>
                    <p class="mb-4">Chất lượng dịch vụ ưu tiên hàng đầu, và chúng tôi tin rằng việc tạo điều kiện thuận lợi cho mọi người tiếp cận điều trị nha khoa không chỉ giúp cải thiện sức khỏe răng miệng mà còn hỗ trợ trong việc duy trì một cuộc sống khỏe mạnh.</p>
                    <a href="price.php"><h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Bảng giá dịch vụ làm răng</h5></a>
                    
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/price-5.jpg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-secondary m-0">1.300.000đ</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>TẨY TRẮNG RĂNG</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>Thiết bị hiện đại</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Nha Sĩ chuyên nghiệp</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>Hỗ trợ tư vấn 24/7</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="price.php" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Xem Thêm</a>
                            </div>
                        </div>
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/price-3.jpg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-secondary m-0">17.000.000đ</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>CẤY GHÉP IMPLANT</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>Thiết bị hiện đại</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Nha Sĩ chuyên nghiệp</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>Hỗ trợ tư vấn 24/7</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="price.php" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Xem Thêm</a>
                            </div>
                        </div>
                        <div class="price-item pb-4">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top" src="img/price-4.jpg" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                    <h2 class="text-secondary m-0">35.000.000đ</h2>
                                </div>
                            </div>
                            <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                <h4>NIỀNG RĂNG</h4>
                                <hr class="text-primary w-50 mx-auto mt-0">
                                <div class="d-flex justify-content-between mb-3"><span>Thiết bị hiện đại</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Nha Sĩ chuyên nghiệp</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-2"><span>Hỗ trợ tư vấn 24/7</span><i class="fa fa-check text-primary pt-1"></i></div>
                                <a href="price.php" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn bg-dark" data-wow-delay="0.6s">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-3.jpg" alt="">
                            <p class="fs-5">“I had a great experience. I am very satisfied with my smile now. I think this dentist should be known by more people’”</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-secondary mb-0">Khách hàng Thomas</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-4.jpg" alt="">
                            <p class="fs-5">“Mình thấy khá hài lòng khi làm răng sứ ở đây. Bác sĩ làm rất êm, các bạn tư vấn viên nhiệt tình, chu đáo”</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-secondary mb-0">Khách hàng Minh Tuyết</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">ĐỘI NGŨ BÁC SĨ</h5>
                        <h1 class="display-6 mb-4">“Tận tâm, trung thực, kỷ luật.”</h1>
                        <p class="mb-4">Nha khoa BM sở hữu đội ngũ bác sĩ giàu kinh nghiệm, được đào tạo bài bản, làm việc với sự tận tâm và chuyên nghiệp của một người lương y.</h1>
                        
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-6.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">ThS BS. Albert Viet Le</h4>
                            <p class="text-primary mb-0">Bác sĩ nha khoa </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-7.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Bs. Nguyen Thi Thu Thuy</h4>
                            <p class="text-primary mb-0">Bác sĩ nha khoa </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Team End -->

    

    <!-- Newsletter Start -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark px-4">ĐĂNG KÝ TƯ VẤN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


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