<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="../assets/ifonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/ifonts/iconic/css/material-design-iconic-font.min.css">

<body class="theme-red">

    <?php include 'includes/loading.php'; ?>
    <?php include 'includes/rightbar.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="margin-top:70px;z-index:998"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="margin-top:70px;z-index:998"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>

    <!-- #END# Search Bar -->
    <?php include 'includes/topbar.php'; ?>
    <ol class="breadcrumb breadcrumb-bg-teal align-right" style="margin-top:70px;margin-bottom:-90px;background-color:#f1f1f1 !important">
          <li><a style="color:#444" href="<?php echo base_url() ?>covid19/Beranda"><i class="material-icons">home</i> Beranda</a></li>
           <li><a style="color:#999;font-weight: 350">  Ubah Kata Sandi</a></li>
      </ol>
    <section class="content" style="margin-bottom:25px">
        <div class="container-fluid">
            
                    <div class="card" >
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;">
                                Ubah Kata Sandi
                            </h2>
                        </div>
                        
                        <div class="body " style="margin-top:70px">
                        <form style="margin-bottom:60px" method="post" id="validation"  action="<?php echo base_url() ?>covid19/ubahPassword" enctype="multipart/form-data">
                                <input class="hidden" id="passlama" name="passlama" value="<?php echo $user['password']; ?>">
                                <input class="hidden" id="kdUser" name="kdUser" value="<?php echo $user['kdUser']; ?>">
                                 <div class="row" style="margin-top:10px">
                                       <div class="col-md-1"></div>
                                        <div class="col-md-11 mb-5 mb-md-0">
                                    <div class=" row">
                              <div class="col-md-3">
                              <p style="padding-top:10px;text-align:right" align="right" ><b>Kata Sandi Lama</b></p>
                             </div>
                              <div class="col-md-6">
                              <div class="form-group" style="margin-bottom:-30px">
                              <div class="form-line">
                                <input style="width:92%;" type="password" class="form-control" id="psw" name="password"  placeholder="Kata Sandi Lama" required>
                                <span type="submit" style=";float: right; padding-right: 10px; padding-top: 5px;height:35px;margin-top:-32px" id="btn"><i class="fa fa-eye"></i></span>
                                </div>
                                <span id='pesan'></span>
                                
                              </div>
                            </div></div>
                            <div class=" row" ">
                              <div class="col-md-3">
                              <p style="padding-top:10px;text-align:right" align="right" ><b>Kata Sandi Baru</b> </p>
                             </div>
                              <div class="col-md-6">
                              <div class="form-group" style="margin-bottom:-30px">
                              <div class="form-line" >
                                <input  style="width:92%;" type="password" class="form-control" id="pswbaru" name="passwordbaru"  placeholder="Kata Sandi Baru" minlength="5" onkeyup='check();' required>
                                <span type="submit" style=";float: right; padding-right: 10px; padding-top: 5px;height:35px;margin-top:-32px; " id="btn1"><i class="fa fa-eye"></i></span>
                                </div><span id='pesan2'></span>
                              </div>
                            </div></div>
                            <div class=" row">
                              <div class="col-md-3">
                              <p style="margin-top:10px;text-align:right"  align="right"><b>Konfirmasi Kata Sandi Baru</b> </p>
                             </div>
                              <div class="col-md-6">
                              <div class="form-group" style="margin-bottom:-30px">
                              <div class="form-line">
                                <input style="width:92%;" onkeyup="check2();" type="password" class="form-control" id="konpsw" name="konpassword"  placeholder="Konfirmasi Kata Sandi Baru" required>
                                <span type="submit" style=";float: right; padding-right: 10px; padding-top: 5px;height:35px;margin-top:-32px" id="btn2"><i class="fa fa-eye"></i></span>
                                </div><span id='pesan3'></span>
                                
                              </div>

                            </div>
                            </div>
                            
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-xs-1"></div>
                                        <div>
                                        <button type="submit" style="width:20%;height:40px;border-radius:20px;margin-top:20px;margin:bottom:60px"  class="btn bg-teal waves-effect" name="simpan" ><p style="text-align:center">SIMPAN</p></button></div>
                                    </div>
                                    
                    </div>
                    </form>
                            
                    </div>
                </div>
            </div>
    </section>
    
    <?php include 'includes/footer.php' ?>
      
    

</body>
    
    
     <?php include 'includes/scripts.php' ?>
    
</html>

<script type="text/javascript">

  //lihat password
  const btn = document.querySelector('#btn');
  const pass = document.querySelector('#psw');
 
  btn.addEventListener('click', function(){
    if(pass.type == 'text') {
        pass.type = 'password';
        btn.innerHTML = '<i class="fa fa-eye"></i>';
    } else {
        pass.type = 'text';
        btn.innerHTML = '<i class="fa fa-eye-slash"></i>';
    }
});
   const btn1 = document.querySelector('#btn1');
  const pass1 = document.querySelector('#pswbaru');
 
  btn1.addEventListener('click', function(){
    if(pass1.type == 'text') {
        pass1.type = 'password';
        btn1.innerHTML = '<i class="fa fa-eye"></i>';
    } else {
        pass1.type = 'text';
        btn1.innerHTML = '<i class="fa fa-eye-slash"></i>';
    }
});
  const btn2 = document.querySelector('#btn2');
  const pass2 = document.querySelector('#konpsw');
 
  btn2.addEventListener('click', function(){
    if(pass2.type == 'text') {
        pass2.type = 'password';
        btn2.innerHTML = '<i class="fa fa-eye"></i>';
    } else {
        pass2.type = 'text';
        btn2.innerHTML = '<i class="fa fa-eye-slash"></i>';
    }
});
  // end - lihat password
$('#passlama, #psw').on('keyup', function () {
  if ($('#passlama').val() == $('#psw').val()) {
    $('#pesan').html('').css('color', 'green');
  } else 
    $('#pesan').html('<i class="material-icons" style="font-size:25px;float:left">close</i><p style="float:left;padding-top:4px">Kata sandi lama tidak cocok</p>').css('color', 'red');
});
var check = function() {
  if (document.getElementById('psw').value !=
    document.getElementById('pswbaru').value) {

    $('#pesan2').html('').css('color', 'green');
  } else {
    $('#pesan2').html('<i class="material-icons" style="font-size:25px;float:left">close</i><p style="float:left;padding-top:4px">Kata Sandi Baru tidak boleh sama dengan kata sandi lama!</p>').css('color', 'red');
  }
}
$('#pswbaru, #konpsw').on('keyup', function (check2) {
  if ($('#pswbaru').val() == $('#konpsw').val()) {
    $('#pesan3').html('').css('color', 'green');
  } else 
    $('#pesan3').html('<i class="material-icons" style="font-size:25px;float:left">close</i><p style="float:left;padding-top:4px">Konfirmasi Kata sandi tidak cocok</p>').css('color', 'red');
});
    //end -alert password
</script>