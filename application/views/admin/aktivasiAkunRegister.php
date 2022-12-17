<?php include 'mahasiswa/includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['k'])){
		$output .= '
			<div class="alert alert-danger">
                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
                <p style="font-size:25px;color:#000">Kode aktivasi akun tidak ditemukan! silakan cek email saat anda mendaftarkan akun
            </div>
	            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="registerAlumni" class="btn-default">REGISTER</a></p>
            
		'; 
	}
	else{
		$conn = $pdo->open();
		$kdUser = base64_decode($_GET['k']);

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tb_user inner join tb_mahasiswa on tb_user.kdUser=tb_mahasiswa.kdUser WHERE tb_user.kdAktivasiAkun=:code AND tb_user.kdUser=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$kdUser]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['statusAkun']!=3){
				$output .= '
					<div class="alert alert-danger">
		                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
		                <p style="font-size:25px;color:#000">Akun sudah diaktivasi
		            </div>
		            <p style="font-size:20px;color:#222">Anda Sudah Dapat <a href="'.base_url().'login" class="btn-default">LOGIN</a> Menggunakan Akun Anda</p>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE tb_user SET statusAkun=:status WHERE kdUser=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['kdUser']]);
					$output .= '
						<div class="alert alert-success">
			                <h3><i class="icon fa fa-check" style="font-size:200px"></i><br> Success!</h3>
			                <p style="font-size:25px;color:#000">Akun sudah diaktivasi </b>
			            </div>
		            <p style="font-size:20px;color:#222">Anda Sudah Dapat <a href="'.base_url().'login" class="btn-default">LOGIN</a> Menggunakan Akun Anda</p>
			            
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
			                <p style="font-size:25px;color:#000">'.$e->getMessage().'
			            </div>
			            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="registerAlumni" class="btn-default">REGISTER</a></p>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h3><i class="icon fa fa-warning" style="font-size:200px"></i><br> Error!</h3>
	                <p style="font-size:25px;color:#000">Tidak dapat mengaktivasi akun, Code akun Salah! silakan Periksa kembali email anda.
	            </div>
	            <p style="font-size:20px;color:#222">Anda Dapat Melakukan <a href="registerAlumni" class="btn-default">REGISTER</a></p>
			';
		}

		$pdo->close();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <script language="JavaScript">
      var txt=" Login - SI-ARSIP"
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
<!--=!--===============================================================================================-->  
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

    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
<!--===============================================================================================-->
</head>
<!--<body style=" background-image: url(assets/images/bg4.jpg);background-size: cover;background-attachment: fixed;">-->

<body >
  <div class="batas " style="margin-top:00px">
     <a href="<?php echo base_url() ?>register" class="navbar-brand logo" ><p  ><i><img src="<?php echo base_url() ?>/assets/images/logo/logos.png" class="img-circle" width="40" style="margin-top: -10px" > </i></p>
        </a>
        <a href="<?php echo base_url() ?>register" class="navbar-brand" style="font-family: sail; font-size: 30px; margin-left: -20px;  margin-top:-5px;transition: 1s;color: #ccc">
                <i><b>Si-Tugas Akhir</b></i>
        </a>
  </div>
<div class="batas"></div>
<div style="width: 96%;margin-left: 2%;box-shadow: 0px 10px 10px 1px #333">
        <div class="row" style="margin-top: 50px; margin-bottom: 40px">
          <div class="col-md-12 text-center">
            <span style="font-size: 100px; " class="icon-check_circle display-3 text-success"></span>
            <section class="content">
	        <div class="row">
	        	<div class="col-sm-12 m-t-65 m-b-80" style="font-family: andalus;">
	        		<?php echo $output; ?>
	        	</div>
	        </div>
	      </section>
          </div>
    </div><br>
</div>
<div></div>
<div class="bbawah p-t-8" style="position: absolute;bottom:0;width: 100%" ><p>Copyright&copy; 2020 - <?php echo date("Y");?> by <a href="#">SI-TUGAS AKHIR</a> - <a href="http://informatika.ft.unib.ac.id/">Informatika Universitas Bengkulu.</a></p></div>
  </div>

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