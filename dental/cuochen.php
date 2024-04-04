
    
<?php

    include("./configs/connect.php");
    include("./includes/header.php"); 
    $email_bn_dang_nhap =  $_SESSION['email'];



    $sql = "SELECT p.IDPHIEU, p.EMAILNV, p.EMAILBN, b.SDTBN, p.NGAYDAT, p.GIODAT, p.TRANGTHAIPDL, p.XULY, n.HOTENNV,
        GROUP_CONCAT(d.TENDICHVU SEPARATOR '<br>') AS TEN_DICH_VU
        FROM phieudatlich p
        INNER JOIN pdldv pd ON p.IDPHIEU = pd.IDPHIEU
        INNER JOIN dichvu d ON pd.MADICHVU = d.MADICHVU
        INNER JOIN benhnhan b ON p.EMAILBN = b.EMAILBN
        INNER JOIN nhanvien n ON p.EMAILNV = n.EMAILNV
        WHERE p.EMAILBN = '$email_bn_dang_nhap'
        GROUP BY p.IDPHIEU";

         
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cuộc hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">


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
    <style>
        table td,
        table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        }

        thead th {
        color: #fff;
        }

        .card {
        border-radius: .5rem;
        }

        .table-scroll {
        border-radius: .5rem;
        }

        .table-scroll table thead th {
        font-size: 1rem;
        }
        thead {
        top: 0;
        position: sticky;
        }
    </style>
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
                <h1 class="display-3 text-white animated zoomIn">Theo dõi cuộc hẹn</h1>
                <a href="" class="h4 text-white">Trang cá nhân</a>
                <i class="fa-solid fa-slash text-white px-2"></i>
                <a href="" class="h4 text-white">Cuộc hẹn</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
 

    <!-- Navbar Start -->
    <!-- Navbar Start -->
    <div class="container-fluid mb-5" style="padding-bottom: 50px">
        <div class="row px-xl-5 pt-3">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0"><img src="./img/avt.jpg" alt="user" class="rounded-circle" width="40"> Xin chào <?php echo $_SESSION["name"] ?>  </h6>
                    <i class="fa-solid fa-chevron-down" style="color: #fcfcfc;"></i>
                </a>
                <?php
                    include("./includes/nav.php");   
                ?>
            </div>
            
            <div class="col-lg-9">
                <!-- hien thi thong tin -->
         
                <div class="section-title">
                    <h3><span>Danh sách các cuộc hẹn</span></h2>
                </div>  
                    <section class="intro" style='height: 100%;'>
                       
        
                        <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                                <table class="table table-striped mb-0">
                                
                                    <thead style="background-color: #002d72;">
                                    <tr>
                                        <th scope="col">Mã phiếu</th>
                                        <th scope="col">Ngày hẹn</th>
                                        <th scope="col">Giờ hẹn</th>
                                        <th scope="col">Tên Bác sĩ</th>
                                        <th scope="col">Tên dịch vụ</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Cuộc hẹn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["IDPHIEU"] . "</td>";
                                                echo "<td>" . $row["NGAYDAT"] . "</td>";
                                                echo "<td>" . $row["GIODAT"] . "</td>";
                                              
                                                echo "<td>" . $row["HOTENNV"] . "</td>";
                                                echo "<td>" . $row["TEN_DICH_VU"] . "</td>";
                                               
                                               
                                                echo "<td>
                              
                                                <div class='btn " . ($row["TRANGTHAIPDL"] == 0 ? "btn-danger" : "btn-success") . "' name='change_status' value='" . $row["IDPHIEU"] . "'>
                                                " . ($row["TRANGTHAIPDL"] == 0 ? "Chưa xác nhận" : "Đã xác nhận") . "
                                                </div>
                                                
                                                </td>";

                                                echo "<td>
                                                <div>";
                                        // Kiểm tra giá trị của cột XULY và hiển thị hình ảnh tương ứng
                                        if ($row["XULY"] == 0) {
                                            echo '<img src="img/waiting.png" alt="Chưa hoàn thành" style="width:40%;"/>';
                                        } else {
                                            echo '<img src="img/check.png" alt="Hoàn thành" style="width:40%;"/>';
                                        }
                                        echo "</div>
                                            </td>";
                                        
                                    
                                            }
                                        }
                                    ?>
                                    
                                   
                                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </section>
                </div>

                <!-- ket thuc hien thi thong tin -->
            </div>
        </div>
  
    <!-- Navbar End -->

   
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