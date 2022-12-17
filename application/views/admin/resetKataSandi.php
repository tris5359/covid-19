<!DOCTYPE html>
<html lang="en">
<head>
    <script language="JavaScript">
      var txt=" Login - SI-Tugas Akhir"
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
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/images/logo/logos.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugins/bootstrapLogin/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fonts/fontawesome/css/font-awesome.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugins/animate-css/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugins/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugins/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/plugins/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/csslogin1.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/csslogin.css">
<!-- css notif -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/cssNotifikasi.css">
<!--===============================================================================================-->
<body >
   <img src="<?php echo base_url() ?>/assets/images/logo/img4.jpg" class="bck" >
  <div class="trans">
  <div class="batas" ">
   <a href="<?php echo base_url() ?>register" class="navbar-brand logo" ><p  ><i><img src="<?php echo base_url() ?>/assets/images/logo/logos.png" class="img-circle" width="40" style="margin-top: -10px" > </i></p>
        </a>
        <a href="<?php echo base_url() ?>register" class="navbar-brand" style="font-family: sail; font-size: 30px; margin-left: -20px;  margin-top:-5px;transition: 1s;color: #ccc">
                <i><b>Si-Tugas Akhir</b></i>
        </a>
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
     <div class="limiter" style=" margin-top:-50px;font-family:andalus" >
    <div class="container-login100"   >
      <div class="wrap-login100 " style="background-color: #fff;border-radius:0px;width:35%" >

      <form action="<?php echo base_url()?>register/updateKataSandi?code=<?php echo $_GET['code']; ?>&k=<?php echo base64_decode($_GET['k']); ?>" method="POST">
          <p style="font-size:15px;color:#000">Masukan Kata Sandi Baru <i style="color: red">*</i></p>
<div class="wrap-input100 m-t-20" >

            <input type="password" class="input100 w90" name="password" style="border-bottom: 2px solid #ccc;color: #000;padding-left: 5px;width: 100%;margin-left: 0px" placeholder="Kata Sandi" required>
            <span class="focus-input100 w90"   style="width: 100%;margin-left: 0px"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
                    <p style="font-size:15px;color:#000">Masukan kembali kata sandi baru! <i style="color: red">*</i></p>
<div class="wrap-input100 m-t-20" >

            <input type="password" class="input100 w90" name="repassword" style="border-bottom: 2px solid #ccc;color: #000;padding-left: 5px;width: 100%;margin-left: 0px" placeholder="Konfirmasi Kata Sandi" required>
            <span class="focus-input100 w90"   style="width: 100%;margin-left: 0px"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
<div class="aa m-b-30" style="color: #444;margin-top: -25px">
              <a href="<?php echo base_url()?>login" style="color: #444;">Kembali Login</a>
            </div>

                      <div class="container-login100-form-btn" style="width:80%;margin-left:10%">
                        <div class="wrap-login100-form-btn">
                          <div class="login100-form-bgbtn"></div>
                          <button class="login100-form-btn "  name="reset">SIMPAN</button>
                        </div>
                      </div>

      </form>
    </div>
</div>
</div>

<div class="bbawah p-t-8" style="position: absolute;bottom:0;width: 100%" ><p>Copyright&copy; 2020 - <?php echo date("Y");?> by <a href="#">SI-TUGAS AKHIR</a> - <a href="http://informatika.ft.unib.ac.id/">Informatika Universitas Bengkulu.</a></p></div>
  </div>
  <div id="dropDownSelect1"></div>
  
  <div id="dropDownSelect1"></div>
 <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/bootstrapLogin/js/popper.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/bootstrapLogin/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/plugins/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() ?>/assets/ijs/main.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/hovereffects.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/modernizr.custom.js"></script>
    <script  src="<?php echo base_url() ?>/assets/ijs/jsnotif.js"></script>

  
  </div>
</body>
</html>