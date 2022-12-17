<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
  $conn = $pdo->open();

  $id = base64_decode($_GET['id']);

  try{
        
      $stmt = $conn->prepare("SELECT * from tb_mahasiswa inner join tb_user on tb_user.kdUser=tb_mahasiswa.kdUser where tb_user.kdUser = :id");
      $stmt->execute(['id' => $id]);
      $mhs = $stmt->fetch();

  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }

?>

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
          <li><a style="color:#444" href="<?php echo base_url() ?>staf"><i class="material-icons">home</i> Beranda</a></li>
          <li><a style="color:#444" href="<?php echo base_url() ?>staf/akunMahasiswa"> Pengguna</a></li>
           <li><a style="color:#999;font-weight: 350">   <?php echo (!empty($mhs['nama']))?$mhs['nama'] : 'Data Belum di update'; ?></a></li>
      </ol>
    
    <section class="content" style="font-family:andalus;margin-bottom:30px">
    
        <div class="container-fluid">
             <div class="card  " >
                    <div class="profile-card ">
                        <div class="profile-header" style="background-color:#001E42;height:0px"></div>
                    <div class="row" style="width:100%;margin-left:0px;background-color:#001E42;height:50px;box-shadow:0px 10px 8px 1px #999;" >
                        <div class="profile-body col-md-4" >
                            <div class="image-area"  >
                            <a href="<?php echo (!empty($mhs['foto'])) ? base_url().'assets/images/mahasiswa/'.$mhs['foto'] : ((!empty($mhs['jenisKelamin']))? (($mhs['jenisKelamin']=='Laki-Laki')? base_url().'assets/images/profile_male1.jpg' : base_url().'assets/images/profile_female.jpg')  : base_url().'assets/images/profile2.jpg' ); ?>">

                                <img src="<?php echo (!empty($mhs['foto'])) ? base_url().'assets/images/mahasiswa/'.$mhs['foto'] : ((!empty($mhs['jenisKelamin']))? (($mhs['jenisKelamin']=='Laki-Laki')? base_url().'assets/images/profile_male1.jpg' : base_url().'assets/images/profile_female.jpg')  : base_url().'assets/images/profile2.jpg' ); ?> " align="left" class="user-image" alt="User Image" style="height:250px;width:250px;border:2px #001E42 solid;margin-top:-10px;margin-left:30px">
                                </a>
                            </div>
                        </div>
                        <div class=" col-md-7" >
                            <p style="margin-top: -20px; font-size:28px;margin-left:-80px;font-family:andalus;color:#fff"><?php echo $mhs['nama']; ?>
                            </p>
                            <p style="margin-top: -10px; font-size:18px;margin-left:-70px;font-family:andalus;color:#999"><?php echo  $mhs['NPM']; ?>
                            </p>
                      </div>

                            
                    </div>
                 </div>
                 <div class="body" style="margin-top: -50px; ">

                           <div class="table100 ver4 m-b-110" style="font-size:19px;color:#111;margin-left:40px;width:90%;">
                           <div class="row">
                           <div class="col-md-6">
                            <p style="font-size: 25px;margin-top: -30px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;font-family:andalus;">Data Personal
                            </p>
                                <div class="table100-body"  >
                                    <table class="m-l-10">

                                      <tr class="row100 body"> 
                                        <td style="width:35%">Nama </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['nama'] ?></td>
                                      </tr>
                                      <tr>
                                        <td style="width:35%">NPM </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['NPM'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Tempat/Taggal Lahir </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['tempatLahir'].' / '.$mhs['tglLahir']  ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Jenis Kelamin </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['jenisKelamin'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Agama </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['Agama'] ?></td>
                                      </tr>
                                      <tr>
                                        <td style="width:35%">Nomor Telepon </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['noTlp'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Email </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['email'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Status </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> Aktif</td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Alamat </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['alamat'] ?></td>
                                      </tr>
                               </table>
                               </div>
                               </div>
                               <div class="col-md-6">
                               <p style="font-size: 25px;margin-top: -30px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;font-family:andalus;">Data Orang Tua
                            </p>
                            
                                <div class="table100-body"  >
                                    <table class="m-l-10">

                                      <tr class="row100 body"> 
                                        <td style="width:35%">Nama Ayah</td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['namaAyah'] ?></td>
                                      </tr>
                                      <tr>
                                        <td style="width:35%">Pekerjaan Ayah </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['pekerjaanAyah'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">No Telepon Ayah</td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['noTlpAyah']  ?></td>
                                      </tr>
                                      <tr class="row100 body"> 
                                        <td style="width:35%">Nama Ibu</td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['namaIbu'] ?></td>
                                      </tr>
                                      <tr>
                                        <td style="width:35%">Pekerjaan Ibu </td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['pekerjaanIbu'] ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">No Telepon Ibu</td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['noTlpIbu']  ?></td>
                                      </tr>
                                      <tr class="row100 body">
                                        <td style="width:35%">Alamat Orang Tua</td>
                                        <td style="width:2%"> : </td>
                                        <td style="width:58%"> <?php echo $mhs['alamatOrtu'] ?></td>
                                      </tr>
                               </table>
                               </div>
                               </div>
                               </div>
                               </div>
                               <a href="#" onclick=" window.history.back();" style="width:150px" type="button" class="btn btn-primary  waves-effect left m-t-10" ><i class="material-icons">reply</i>
                                KEMBALI</a>
                      </div>
                   </div>
            </div>
    </section>
    
    <?php include 'includes/footer.php' ?>
      
    

</body>
    
    
     <?php include 'includes/scripts.php' ?>
    
</html>

<style type="text/css">
.js-pscroll {
  position: relative;
  overflow: hidden;
}

.table100 .ps__rail-y {
  width: 9px;
  background-color: transparent;
  opacity: 1 !important;
  right: 5px;
}

.table100 .ps__rail-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #ebebeb;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}

.table100 .ps__rail-y .ps__thumb-y {
  width: 100%;
  right: 0;
  background-color: transparent;
  opacity: 1 !important;
}

.table100 .ps__rail-y .ps__thumb-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #cccccc;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}


/*//////////////////////////////////////////////////////////////////
[ Table ]*/

.limiter {
  width: 1366px;
  margin: 0 auto;
}

.container-table100 {
  width: 100%;
  min-height: 100vh;
  background: #fff;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}

.wrap-table100 {
  width: 1170px;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th, td {
  font-weight: unset;
  padding-right: 10px;
}

.column1 {
  width: 33%;
  padding-left: 40px;
}

.column2 {
  width: 13%;
}

.column3 {
  width: 22%;
}

.column4 {
  width: 19%;
}

.column5 {
  width: 13%;
}

.table100-head th {
  padding-top: 18px;
  padding-bottom: 18px;
}

.table100-body td {
  padding-top: 8px;
  padding-bottom: 8px;
}

/*==================================================================
[ Fix header ]*/
.table100 {
  position: relative;
  padding-top: 60px;
}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
  max-height: 585px;
  overflow: auto;
}


/*==================================================================
[ Ver4 ]*/
.table100.ver4 {
  margin-right: -20px;
}

.table100.ver4 .table100-head {
  padding-right: 20px;
}

.table100.ver4 th {
  font-size: 18px;
  color: #000;
  line-height: 1.4;
  border-bottom: 2px solid #f2f2f2;
}

.table100.ver4 .column1 {
  padding-left: 7px;
}

.table100.ver4 td {
  font-size: 16px;
  color: #333;
  line-height: 1.4;
}

.table100.ver4 .table100-body tr {
  border-bottom: 1px solid #f2f2f2;
}

/*---------------------------------------------*/

.table100.ver4 {
  overflow: hidden;
}

.table100.ver4 .table100-body{
  padding-right: 20px;
}

.table100.ver4 .ps__rail-y {
  right: 0px;
}

.table100.ver4 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver4 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}

</style>