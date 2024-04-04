<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng Nhập</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
   
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
  
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="./img/logo/logo_bs.jpg"
          class="img-fluid" alt="Phone image">
      </div>

      <div class="login col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h2 class="mt-3 text-center">Đăng nhập hệ thống Bác Sĩ</h2> <hr>
        <form class="mt-4" action='./configs/login_bs.php' method='POST'>
            <!-- Email input -->
            <div class="col-lg-7">
                <div class="form-group">
                    <label class="text-dark" for="uname">Email:</label>
                    <input class="form-control" style="width: 400px;" id="uname" type="text"
                        placeholder="Nhập địa chỉ email" name='emailnv'>
                </div>
            </div>

            <!-- Password input -->
            <div class="col-lg-7">
                <div class="form-group">
                    <label class="text-dark" for="pwd">Mật khẩu:</label>
                    <input class="form-control"  style="width: 400px;" id="pwd" type="password"
                        placeholder="Nhập mật khẩu" name='psw'>
                </div>
            </div>

          <!-- Submit button -->
          <button type="submit" name='sb'class="btn btn-primary btn-lg btn-block">Đăng Nhập</button>

        </form>
      </div>
    </div>
  </div>
</section>

</body>
</html>
