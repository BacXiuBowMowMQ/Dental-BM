
    
<?php

include("./configs/connect.php");
include("./includes/header.php"); 
$email_bn_dang_nhap =  $_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Lịch sử điều trị</title>
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
            <h1 class="display-3 text-white animated zoomIn">Lịch sử điều trị</h1>
            <a href="" class="h4 text-white">Trang cá nhân</a>
            <i class="fa-solid fa-slash text-white px-2"></i>
            <a href="" class="h4 text-white">Lịch sử điều trị</a>
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
       
                
            <!-- Service Start -->
            <section id="departments" class="departments">
                <div class="container">
                    <div class="section-title">
                        <h2>Lịch sử điều trị</h2>
                    </div>

                    <?php


// Lấy email của người dùng đang đăng nhập
$email_bn = $_SESSION['email'];

// Hàm để lấy lịch sử điều trị cho một bệnh nhân cụ thể
function getTreatmentHistory($email_bn)
{
    global $conn;
    $sql = "SELECT p.STT_PHIEUKHAM, p.EMAILBN, p.EMAILNV, bs.HOTENNV, p.NGAYKHAM, p.GIOKHAM, p.MOTA, GROUP_CONCAT(d.TENDICHVU SEPARATOR '; ') AS TEN_DICH_VU
        FROM phieukhambenh p
        INNER JOIN pkbdv pd ON p.STT_PHIEUKHAM = pd.STT_PHIEUKHAM
        INNER JOIN dichvu d ON pd.MADICHVU = d.MADICHVU
        INNER JOIN nhanvien bs ON p.EMAILNV = bs.EMAILNV
        WHERE p.EMAILBN = '$email_bn'
        GROUP BY p.STT_PHIEUKHAM";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card" style=' margin-bottom: 10px;'>
                <div class="card-header" style=" background-color: #2c4964;
            color: #fff;
            cursor: pointer;
            padding: 10px;" onclick="toggleVisibility('phieuthu<?php echo $row["STT_PHIEUKHAM"]; ?>', 'toathuoc<?php echo $row["STT_PHIEUKHAM"]; ?>')">
                   
                <strong>Mã phiếu khám:</strong> <?php echo $row["STT_PHIEUKHAM"]; ?> 
                <strong>   - Ngày khám:</strong> <?php echo $row["NGAYKHAM"]; ?>
                </div>
                <div class="card-body">
                <p><strong>Bác sĩ: </strong><?php echo $row["HOTENNV"]; ?></p>
                    <p><strong>Kế hoạch điều trị: </strong><?php echo $row["MOTA"]; ?></p>
                   

                    <?php
                    $css = "
                        <style>
                            /* CSS cho bảng */
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 15px;
                            }

                            th, td {
                                padding: 8px;
                                text-align: left;
                                border-bottom: 1px solid #ddd;
                            }

                            tr:hover {
                                background-color: #f5f5f;
                            }

                            th {
                                background-color: #4CAF50;
                                color: white;
                            }
                        </style>";

                    // Echo CSS vào trong file HTML
                    echo $css;
                    
                    // Lấy thông tin đơn thuốc
                    $stt_phieukham = $row["STT_PHIEUKHAM"];
                    // Lấy thông tin chuẩn đoán bệnh và ngày tài khám
                $sql_phieukham = "SELECT CHUANDOAN, NGAYKEDON FROM toa_thuoc WHERE STT_PHIEUKHAM = '$stt_phieukham'";
                $result_phieukham = $conn->query($sql_phieukham);
                if ($result_phieukham->num_rows > 0) {
                    $row_phieukham = $result_phieukham->fetch_assoc();
                    $ten_benh = $row_phieukham["CHUANDOAN"];
                    $ngay_tai_kham = $row_phieukham["NGAYKEDON"];

                    // Hiển thị thông tin chuẩn đoán bệnh và ngày tài khám
                    echo "<p><strong>Chuẩn đoán bệnh:</strong> $ten_benh</p>";
                    echo "<p><strong>Ngày kê đơn:</strong> $ngay_tai_kham</p>";
                }
                    $sql_thuoc = "SELECT tt.MATOA, tt.SOLUONG, tt.DONVITINH, tt.LIEUDUNG, t.TENTHUOC 
                                    FROM chitiettoathuoc tt 
                                    INNER JOIN thuoc t ON tt.MATHUOC = t.MATHUOC 
                                    WHERE tt.MATOA IN (SELECT MATOA FROM toa_thuoc WHERE STT_PHIEUKHAM = '$stt_phieukham')";

                    $result_thuoc = $conn->query($sql_thuoc);

                    if ($result_thuoc->num_rows > 0) {
                        echo "<div id='toathuoc" . $row["STT_PHIEUKHAM"] . "' class='hidden'>";
                        echo "<p><strong><i class='fa-solid fa-capsules'></i> Đơn thuốc:</strong></p>";
                       
                        echo "<table border='1'>";
                        echo "<tr><th>Tên thuốc</th><th>Số lượng</th><th>Đơn vị</th><th>Liều dùng</th></tr>";
                        while ($row_thuoc = $result_thuoc->fetch_assoc()) {
                            
                            echo "<tr>";
                           
                            echo "<td>" . $row_thuoc["TENTHUOC"] . "</td>";
                            echo "<td>" . $row_thuoc["SOLUONG"] . "</td>";
                            echo "<td>" . $row_thuoc["DONVITINH"] . "</td>";
                            echo "<td>" . $row_thuoc["LIEUDUNG"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>"; // Kết thúc toathuoc
                    }
                    

                   
                   // Lấy thông tin phiếu thu
$sql_phieuthu = "SELECT * FROM phieuthu WHERE STT_PHIEUKHAM = '$stt_phieukham'";
$result_phieuthu = $conn->query($sql_phieuthu);
if ($result_phieuthu->num_rows > 0) {
    echo "<div id='phieuthu" . $row["STT_PHIEUKHAM"] . "' class='hidden'>";
    echo "<p><strong>  <i class='fa-solid fa-file-invoice-dollar'></i> Phiếu thu:</strong></p>";
    echo "<table>";
    while ($row_phieuthu = $result_phieuthu->fetch_assoc()) {
        echo "<tr><td><strong>Ngày lập phiếu thu:</strong></td><td>" . $row_phieuthu["NGAYLAPPT"] . "</td></tr>";
        echo "<tr><td><strong>Lý do:</strong></td><td>" . $row_phieuthu["LYDO"] . "</td></tr>";
        echo "<tr><td><strong>Tổng giá:</strong></td><td>" . number_format($row_phieuthu["TONGGIA"]) . ".000đ</td></tr>";
        if ($row_phieuthu["TRANGTHAI"] == 1) {
            echo "<tr><td><strong>Trạng thái:</strong></td><td><span style='color: green;'>Đã thanh toán</span></td></tr>";
        } else {
            echo "<tr><td><strong>Trạng thái:</strong></td><td><span style='color: red;'>Chưa thanh toán</span></td></tr>";
        }
    }
    echo "</table>";
    echo "</div>"; // Kết thúc phieuthu
}

                    ?>
                </div>
            </div>
        <?php
        }
    } else {
        echo "<p>Không có thông tin lịch sử điều trị</p>";
    }
}

// Sử dụng hàm để lấy lịch sử điều trị cho một bệnh nhân cụ thể
$email_bn = $_SESSION['email'];
getTreatmentHistory($email_bn);

$conn->close();
?>
 
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

<script>
    function toggleVisibility(id1, id2) {
        var element1 = document.getElementById(id1);
        var element2 = document.getElementById(id2);
        if (element1.style.display === "none") {
            element1.style.display = "block";
        } else {
            element1.style.display = "none";
        }
        if (element2.style.display === "none") {
            element2.style.display = "block";
        } else {
            element2.style.display = "none";
        }
    }
</script>
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