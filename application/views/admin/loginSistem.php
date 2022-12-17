<!DOCTYPE html>
<html lang="en">
<head>
    <script language="JavaScript">
      var txt=" Login - COVID19"
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
</head>
<body >
  <img src="<?php echo base_url() ?>/assets/images/bek2.jpg" class="bck" >
  <div class="trans">
  <div class="batas " style="position: fixed !important;top: 0;width: 100%;">
    <a href="<?php echo base_url() ?>" style="font-family: sail;font-size: 30px;color: #fff !important;margin-left: 3%;"><i style="color: #fff !important;"><b style="color: #fff"><img src="<?php echo base_url()?>assets/img/logo/bkl.png" style="height: 40px;width: 40px">Corona</b></i><i style="color: #FFFF00">Virus</i></a>
  </div>
      <?php
      $info=$this->session->flashdata('info');
      if(isset($_SESSION['error'])){
        echo "
          <div  class='callout callout-danger text-center' style='margin-top: 50px; text-align: center; font-size: 20px; background-color: red;width:29.5%;position: absolute; margin-left:35.1%;padding:5px;border-radius: 10px; box-shadow: 0px 0px 15px 0px red'>
            <p style='color:white;font-family: andalus'>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center' style='margin-top: 50px; text-align: center; font-size: 20px; background-color: green;width:29.5%; position: absolute;margin-left:35.1%;padding:5px;border-radius: 10px; box-shadow: 0px 0px 15px 0px green'>
            <p style='color:white;font-family: andalus'>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
      if(isset($_SESSION['errorps'])){
        echo '
          <div 
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus;color:#fff">'.$_SESSION["errorps"].'</p> 
          </div>
        ';
        unset($_SESSION['errorps']);
      }
      if(isset($_SESSION['successps'])){
        echo '
          <div 
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus;color:#fff">'.$_SESSION["successps"].'</p> 
          </div>
        ';
        unset($_SESSION['successps']);
      }
    ?>
  <div class="limiter mt-50"  >
    <div class="container-login100"   >
      <div class="wrap-login100 transbox"  >
         <form class="login100-form validate-form boxlogin" action="<?php echo base_url();?>covid19/cek_login" onsubmit="return cekform();" method="POST" >
          <span class="login100-form-title">
                <img src="<?php echo base_url()?>assets/img/logo/bkl.png" width="70" height="80">
          </span>
          <div class="p-b-20"></div>
          <div class="wrap-input100 validate-input" data-validate = "Masukan ID Pengguna">

            <input class="input100 w90" type="text" name="username" id="idpengguna" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="ID Pengguna" ></span>
            <span class="focus-input100 w10" >
            <i class="fa fa-user iconlogin" ></i></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukan Kata Sandi">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>           
            <input class="input100 w90" type="password" name="pass" id="pswd" >
            <span class="focus-input100 w90" style="width: 100%;margin-left: 0px" data-placeholder="Kata Sandi" ></span>
            <span class="focus-input100 w10"  >
            <i class="fa fa-key iconlogin" ></i></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn login__form">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn  "  name="login">
                M A S U K
              </button>
            </div>
          </div> 
          <div  class="m-t-40 mb-30" > 
          <hr class="hrrr" >
          <a href="<?php echo base_url() ?>covid19/Register"   class="aaa ffandalus " >Register Akun Intansi</a>
          </div>
        </form>

      </div>

    </div>
    <div class="bbawah p-t-8" style="position: fixed !important;bottom: 0;width: 100%;"><p>Copyright &copy; 2020 - <script>document.write(new Date().getFullYear());</script> by KKN Universitas Bengkulu | All rights reserved </p></div>
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
