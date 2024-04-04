

    

<?php
    session_start();
?>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-dark m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-secondary m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <small class="py-2"><i class="bi bi-geo-alt text-primary me-2"></i>Địa chỉ: Ninh Kiều, Cần Thơ, Việt Nam</small>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-end">
            <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                <div class="me-3 pe-3 border-end py-2">
                    <p class="m-0"><i class="fa fa-envelope-open me-2"></i>nhakhoabm@gmail.com</p>
                </div>
                <div class="py-2">
                    <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                </div>     
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="index.html" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>Nha Khoa BM</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
            <a href="about.php" class="nav-item nav-link">Giới thiệu</a>
            <a href="price.php" class="nav-item nav-link">Bảng giá</a>
            <div class="nav-item dropdown">
                <a href="service.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dịch vụ</a>
                <div class="dropdown-menu m-0">
                    <a href="boc-rang-su.php" class="dropdown-item">Bọc răng sứ</a>
                    <a href="service.php" class="dropdown-item">Nhổ răng khôn</a>
                    <a href="service.php" class="dropdown-item">Cấy ghép implant</a>
                    <a href="service.php" class="dropdown-item">Niềng răng thẩm mỹ</a>
                    <a href="service.php" class="dropdown-item">Điều trị tủy</a>
                    <a href="service.php" class="dropdown-item">Tẩy trắng răng</a>
                    <a href="service.php" class="dropdown-item">Hàm trám răng</a>
                    <a href="service.php" class="dropdown-item">Bệnh nha chu</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
           
        </div>
        <?php
            if (isset($_SESSION["email"])) {
                echo  '
                <li class="nav-item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="user.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i> Trang cá nhân
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="user.php" class="dropdown-item">Thông tin cá nhân</a>
                        <a href="doimk.php" class="dropdown-item">Đổi mật khẩu</a>
                        <a href="./configs/dangxuat.php" class="dropdown-item">Đăng xuất</a>
                       
                    </div>
                </li>';
            } else {
                echo'
                    <a href="login.php" class="btn btn-primary py-2 px-4 ms-3" >ĐĂNG KÝ / ĐĂNG NHẬP</a>
                ';
            }
            ?>
    </div>
</nav>
<!-- Navbar End -->