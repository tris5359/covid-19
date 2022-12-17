<!DOCTYPE html>
<html lang="en">
<head>
  <script language="JavaScript">
      var txt=" Register - COVID19"
      var kecepatan=500;var segarkan=null;function bergerak() { document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
    </script>
<!--===============================================================================================-->  
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
<!--=============================================================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/logo/bkl.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugin/bootstrapLogin/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fonts/fontawesome/css/font-awesome.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugin/animate-css/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugin/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugin/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugin/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/csslogin2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/csslogin.css">
<!-- css notif -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/cssNotifikasi.css">
<!--===============================================================================================-->
    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
<!--===============================================================================================-->
</head>
<!--<body style=" background-image: url(assets/images/bg4.jpg);background-size: cover;background-attachment: fixed;">-->
<body >
  <img src="<?php echo base_url() ?>/assets/images/bek2.jpg" class="bck" >
  <div class="trans">
  <div class="batas" style="position: fixed !important;top: 0;width: 100%;">
        <a href="<?php echo base_url() ?>" style="font-family: sail;font-size: 30px;color: #fff !important;margin-left: 3%"><i style="color: #fff !important;"><b style="color: #fff"><img src="<?php echo base_url()?>assets/img/logo/bkl.png" style="height: 40px;width: 40px">Corona</b></i><i style="color: #FFFF00">Virus</i></a>
  </div>
      <?php
      if(isset($_SESSION['error'])){
        echo '
          <div 
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus;color:#fff">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div 
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus;color:#fff">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <style type="text/css">
       .regis{
    width:800px;box-shadow:1px 5px 10px 1px #333;
  }
  .mt-40{
    margin-top:-60px;
  }

    </style>
  <div class="limiter mt-50" >
    <div class="container-login100"   >
      <div class="wrap-login100 transbox regis"  >
         <form class="login100-form validate-form mt-40" action="<?php echo base_url()?>register/registerAlumni" method="POST" style="" >
          <span class="login100-form-title">
            R E G I S T E R
          </span>
          <div class="p-b-10"></div>
          <div class="row">
            <div class="col-md-6">
            <div class="wrap-input100 validate-input" data-validate = "Masukan Nama Anda">
            <input class="input100 w90" type="text" name="nama" id="nama" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="Nama Pengguna" ></span>
            <span class="focus-input100 w10" >
            <i class="fa fa-user iconlogin" ></i></span>
          </div></div>
            <div class="col-md-6">
              <div class="wrap-input100 validate-input" data-validate = "Masukan NPM Anda">
            <input class="input100 w90" type="text" name="npm" id="npm" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="NPM" ></span>
            <span class="focus-input100 w10" >
            <i class="fa fa-id-badge iconlogin" ></i></span>
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            <div class="m-t-20">
            <input type="radio" name="jk" id="male" value="Laki-Laki" class="with-gap radio-col-indigo">
            <label for="male" style="color:#fff;font-family:andalus;margin-right:50px">Laki - Laki</label>
            <input value="Perempuan" type="radio" name="jk" id="female" class="with-gap radio-col-indigo" style="padding-left:-20px">
            <label for="female"  style="color:#fff;font-family:andalus;">Perempuan</label>
          </div>
          </div>
            <div class="col-md-6">
              <div class="wrap-input100 validate-input" data-validate = "Masukan Email Anda">
            <input class="input100 w90" type="text" name="email" id="email" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="Email" ></span>
            <span class="focus-input100 w10" >
            <i class="fa fa-envelope iconlogin"></i></span>
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            <div class="wrap-input100 validate-input" data-validate="Masukan Kata Sandi">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>           
            <input class="input100 w90" type="password" name="pass" id="pass" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="Kata Sandi" ></span>
            <span class="focus-input100 w10"  >
            <i class="fa fa-key iconlogin"></i></span>
          </div>
          </div>
            <div class="col-md-6">
             <div class="wrap-input100 validate-input" data-validate="Masukan Konfirmasi Kata Sandi">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>           
            <input class="input100 w90" type="password" name="konpass" id="konpass" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="Konfirmasi Kata Sandi" ></span>
            <span class="focus-input100 w10"  >
            <i class="fa fa-key iconlogin"></i></span>
          </div>
            </div>
          </div>
          <div class="row" style="padding: 0px; margin: 0px" >
            <div class="col-md-3"></div>
            <div class="col-md-3">

              <?php
            if(!isset($_SESSION['captcha'])){
              echo '
                <div class="form-group" style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6LfHzagZAAAAABDzsesAo4NI5RfYEcMYQzGu_aFI"></div>
                </div>
              ';
            }
          ?></div>
                    </div>
          
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn login__form">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn  "  name="register">
               R E G I S T E R
              </button>
            </div>
          </div>
            </div>

          </div>
           
          <div style="margin-top:20px;margin-bottom:-30px"> 
          <hr class="hrrr" >
          <div class="m-t-7 m-b-7">
          <a href="<?php echo base_url() ?>covid19"  class="aaa " style="font-family:andalus; ">Sudah Memiliki Akun</a>
          </div>
          </div>
        </form>

      </div>

    </div>
    <div class="bbawah p-t-8" style="position: fixed !important;bottom: 0;width: 100%;" ><p>Copyright &copy; 2020 - <script>document.write(new Date().getFullYear());</script> by KKN Universitas Bengkulu | All rights reserved </p></div>
    </div>

  <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/bootstrapLogin/js/popper.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugin/bootstrapLogin/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugin/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugin/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/ijs/main.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/hovereffects.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/modernizr.custom.js"></script>
    <script  src="<?php echo base_url() ?>/assets/ijs/jsnotif.js"></script>
  
  </div>
</body>
</html>


