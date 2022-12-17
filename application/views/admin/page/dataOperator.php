<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="../assets/ifonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/ifonts/iconic/css/material-design-iconic-font.min.css">
<?php
  $conn = $pdo->open();

  $kdUser = base64_decode($_GET['id']);

  try{
        
      $stmt = $conn->prepare("SELECT * from tb_user WHERE kdUser = :kdUser");
      $stmt->execute(['kdUser' => $kdUser]);
      $operator = $stmt->fetch();    
  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }
?>
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
          <li><a style="color:#444" href="<?php echo base_url() ?>staf"><i class="material-icons">home</i> Beranda</a></li>
           <li><a style="color:#999;font-weight: 350">  <?php echo (!empty($operator['nama'])) ? $operator['nama'] : 'Tidak Ada Operator yang dipilih '; ?></a></li>
      </ol>
    <section class="content" style="margin-bottom:25px">

        <div class="container-fluid">
            <div class="row">
                    <div class="card">
                        <div class="body">
                           <div class="row" style="background-color:#001E42;height:10% !important;box-shadow:0px 10px 8px 1px #999;margin-top: -10px;margin-bottom: 200px" >
                              <div class="col-md-4 profile-card" style="margin-right: -5%" >
                                <div class="   profile-body"  >
                                    <div class="image-area" id="aniimated-thumbnials" style="margin-top: 25px;" >
                                      <a href="<?php echo (!empty($operator['foto'])) ? base_url().'assets/images/'.$operator['foto'] : base_url().'assets/images/img2.jpg'; ?>">
                                        <img src="<?php echo (!empty($operator['foto'])) ? base_url().'assets/images/'.$operator['foto'] : base_url().'assets/images/img2.jpg'; ?> " align="center" class="user-image" alt="User Image" style="height:270px;width:270px;border:3px #ccc solid;box-shadow:0px 2px 5px 1px #ccc ;margin-top:-10px;">
                                        </a>
                                    </div>
                                </div>  
                              </div>
                               <div class=" col-md-7" >
                                  <div > 
                                        <table style="width:94%;margin-left:10px;font-family:andalus;font-size:16px;color: #999">
                                          <tr>
                                            <td><p style="margin-top: 20px; font-size:28px;font-family:andalus;color:#fff;position: relative;"><?php echo $operator['nama']; ?>
                                            </p></td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <p style="margin-top: -10px; font-size:18px;font-family:andalus;color:#aaa;position: relative;"> <b style="color:#ccc;font-weight: 2"><?php echo $operator['instansi']; ?></b>
                                              </p>
                                            </td>
                                          </tr>
                                          
                                          <tr>
                                            <td style="width:60px"><i class="material-icons">phone_android</i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($operator['noTlp'])) ? $operator['noTlp'] : 'No Telepon belum di update'; ?></p ></td>
                                          </tr>
                                          <tr>
                                            <td style="width:60px"><i class="material-icons">email</i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($operator['email'])) ? $operator['email'] : ' Email belum di update '; ?></p ></td>
                                          </tr>
                                          <tr>
                                            <td style="width:60px"><i class="material-icons">place</i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($operator['alamat'])) ? $operator['alamat'] : 'Alamat belum di update'; ?></p ></td>
                                          </tr>
                                          <tr>
                                            <td style="width:60px"><i class="material-icons">settings</i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($operator['instansi'])) ? $operator['instansi'] : 'Data instansi belum di update'; ?></p ></td>
                                          </tr>
                                          <tr>
                                            <td style="width:60px"><i class="material-icons">settings</i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($operator['alamatInstansi'])) ? $operator['alamatInstansi'] : 'Data Kealian belum di update'; ?></p ></td>
                                          </tr>

                                        </table>
                                        <a herf="#" type="button" class="btn btn-primary btn-circle-lg waves-effect waves-circle" style="margin-left: 10px ;width:30px;height:30px;margin-top:10px;font-size:5px;">
                                          <i style="margin-top:-5px;font-size:17px !important;" class="fa fa-facebook" ></i>
                                        </a>
                                        <a herf="#" type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" style="margin-left: 10px ;width:30px;height:30px;margin-top:10px;font-size:5px;margin-right:10px">
                                          <i style="margin-top:-5px;font-size:17px !important; margin-left:-3px" class="fa fa-google" ></i>
                                        </a>
                                        <a herf="#" type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float" style="width:30px;height:30px;margin-top:10px;font-size:5px;margin-right:80px">
                                        <i style="margin-top:-5px;font-size:17px !important; margin-left:-3px" class="fa fa-twitter" ></i>
                                      </a>
                                        </div>
                              </div>    
                          </div>



                             
                        </div>
                    </div>
                </div>
              </div>
    </section>
    
    <?php include 'includes/footer.php' ?>
      
    

</body>
    
    
     <?php include 'includes/scripts.php' ?>
    
</html>
