








<?php
include("./includes/header.php");
include("./configs/connect.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thống kê</title>
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
    <scrip src="js/vendor/modernizr-2.8.3.min.js"></script>

     <!-- Link đến thư viện Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .chart-container {
            margin-top: 20px;
        }
   
        .section-title {
    text-align: center;
    padding-bottom: 20px;
  }
  
  .section-title h2 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    padding-bottom: 20px;
    position: relative;
    color: #2c4964;
  }
  
  .section-title h2::before {
    content: "";
    position: absolute;
    display: block;
    width: 120px;
    height: 1px;
    background: #ddd;
    bottom: 1px;
    left: calc(50% - 60px);
  }
  
  .section-title h2::after {
    content: "";
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #1977cc;
    bottom: 0;
    left: calc(50% - 20px);
  }
  .search{
    text-align: center;
    padding-bottom: 20px;
  }
    </style>
</head>


<body>

    <!-- Header Start -->
    <?php include("./includes/sidebar.php"); ?>

    <!-- Header End -->

    <!-- THỐNG KÊ -->
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
                                        <li><span class="bread-blod">Thống kê</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        
                <div class="container">
                  <div class="section-title">
                  <h2>Biểu đồ thống kê doanh thu</h2>
                </div>
          <div class="search">
              <label for="startDate">Ngày bắt đầu:</label>
              <input type="date" id="startDate" name="startDate">
              <label for="endDate">Ngày kết thúc:</label>
              <input type="date" id="endDate" name="endDate">
              <button id="searchButton">Tìm kiếm</button>
          </div>
          <canvas id="revenueChart" width="800" height="400"></canvas>
      </div>
      </div>

 <!-- Header Start -->
 <?php include("./includes/footer.php"); ?>
 <script>
 document.addEventListener("DOMContentLoaded", function() {
    var revenueChart; // Biến để lưu trữ biểu đồ

    // Hàm tìm kiếm
    function search() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;

        // Gửi yêu cầu tìm kiếm dữ liệu
        fetch(`get_revenue_data.php?startDate=${startDate}&endDate=${endDate}`)
            .then(response => response.json())
            .then(data => {
                // Hiển thị biểu đồ với dữ liệu mới
                drawChart(data);
            })
            .catch(error => console.error('Lỗi khi tải dữ liệu:', error));
    }

    // Hàm vẽ biểu đồ
    function drawChart(data) {
        // Kiểm tra nếu đã có biểu đồ, hủy bỏ nó trước khi tạo biểu đồ mới
        if (revenueChart) {
            revenueChart.destroy();
        }

        var ctx = document.getElementById('revenueChart').getContext('2d');
        revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Đã thanh toán',
                    data: Object.values(data).map(item => item.paid),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Chưa thanh toán',
                    data: Object.values(data).map(item => item.unpaid),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    // Gán sự kiện onchange cho cả hai ô input ngày để khi người dùng thay đổi ngày, hàm search sẽ được gọi tự động.
    document.getElementById('startDate').onchange = search;
    document.getElementById('endDate').onchange = search;

    // Khi trang được tải lần đầu, thực hiện tìm kiếm lần đầu.
    search();
});
</script>
        <!-- Charts End-->
   
   


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
