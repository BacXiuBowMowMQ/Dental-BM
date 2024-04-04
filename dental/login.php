

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
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   
</head>

<body>
  

<section class="gradient-form" style="background-color: #eee;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
            <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="./img/logo.png"
                    style="width: 185px;" alt="logo">
                  <h2 class="mt-1 mb-5 pb-1">Đăng Nhập</h2>
                </div>

                <form class="mt-4" action='./configs/login.php' method='POST'>
                    <p>Vui lòng đăng nhập vào tài khoản của bạn</p>

                     <!-- Email input -->
                    <div class="col-lg-12  pb-4">
                       
                            <label class="text-dark" for="uname">Email:</label>
                            <input class="form-control" style="width: 300px;" id="uname" type="text"
                                placeholder="Nhập địa chỉ email" name='name'>
                    
                    </div>
                    <!-- Password input -->
                    <div class="col-lg-12  pb-4">
                        
                            <label class="text-dark" for="pwd">Mật khẩu:</label>
                            <input class="form-control"  style="width: 300px;" id="pwd" type="password"
                                placeholder="Nhập mật khẩu" name='psw'>
                        
                    </div>

                    <div class="d-flex pb-3">
                        <!-- Checkbox -->
                        
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Ghi nhớ tôi </label>
                        
                    
                    </div>
                
                    <!-- Submit button -->
                    <button type="submit" name='sb'class="btn btn-primary btn-lg btn-block">Đăng Nhập</button>
                  
                </form>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Bạn chưa có tài khoảnt?</p>
                        <a href="dangky.php">
                        <button type="button" class="btn btn-outline-danger">Đăng Ký</button>
                        </a>
                       
                    </div>


            </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center bg-2">
              <img src="img/login1.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
