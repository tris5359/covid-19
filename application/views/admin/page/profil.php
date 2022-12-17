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
          <li><a style="color:#444" href="#"> Profil</a></li>
           <li><a style="color:#999;font-weight: 350">  <?php echo $user['nama']; ?></a></li>
      </ol>
    <section class="content" style="font-family:andalus;margin-bottom:30px">
    
        <div class="container-fluid">
             <div class="card  " >
                    <div class="profile-card " >
                        <div class="profile-header" style="background-color:#001E42;height:0px"></div>
                    <div class="row" style="width:100%;margin-left:0px;background-color:#001E42;height:50px;box-shadow:0px 10px 8px 1px #999;" >
                        <div class="profile-body col-md-4" >
                            <div class="image-area"  >
                            <a href="<?php echo (!empty($user['foto'])) ? base_url().'assets/images/'.$user['foto'] : base_url().'assets/images/img2.jpg' ; ?>">
                              
                                <img src="<?php echo (!empty($user['foto'])) ? base_url().'assets/images/'.$user['foto'] :  base_url().'assets/images/img2.jpg' ; ?> " align="left" class="user-image" alt="User Image" style="height:250px;width:250px;border:2px #001E42 solid;margin-top:-10px;margin-left:30px">
                                </a>
                            </div>
                        </div>
                        <div class=" col-md-7" >
                            <p style="margin-top: -20px; font-size:28px;margin-left:-80px;font-family:andalus;color:#fff"><?php echo (!empty($user['nama'])) ? $user['nama'] : ' Nama belum di update'; ?>
                            </p>
                            <p style="margin-top: -10px; font-size:18px;margin-left:-70px;font-family:andalus;color:#999"><?php echo (!empty($user['instansi'])) ? $user['instansi'] : ' Instansi belum di update'; ?>
                            </p>
                      </div>

                            
                    </div>
                 </div>
                 <div class="body  " style="font-size:16px;color:#111;margin-bottom:0px;" >
                           <div class="table100 ver4 m-b-20">
                                <div class="table100-body js-pscroll" style="margin-top:-10px;" >
                                    <table >
                                      <tr  > 
                                        <td style="width:25%;padding-top:5px;padding-bottom:5px;">Nama </td>
                                        <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                        <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['nama'])) ? $user['nama'] : '<i style="color:#ff6e6e"> Nama belum di update </i>'; ?></td>
                                      </tr>
                                      <tr>
                                        <td style="width:25%;padding-top:5px;padding-bottom:5px">NIP. </td>
                                        <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                        <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['instansi'])) ? $user['instansi'] : '<i style="color:#ff6e6e"> instansi belum di update</i>'; ?></td>
                                      </tr>
                                      <tr  >
                                        <td style="width:25%;padding-top:5px;padding-bottom:5px">email </td>
                                        <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                        <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['email'])) ? $user['email'] : '<i style="color:#ff6e6e"> email belum di update</i>'; ?></td>
                                      </tr>                                    
                                 <tr>
                                    <td style="width:25%;padding-top:5px;padding-bottom:5px">Nomor Telepon </td>
                                    <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                    <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['noTlp'])) ? $user['noTlp'] : '<i style="color:#ff6e6e"> Nomor Telepon belum di update</i>'; ?></td>
                                </tr>
                                  <tr  >
                                    <td style="width:25%;padding-top:5px;padding-bottom:5px">Alamat </td>
                                    <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                    <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['alamat'])) ? $user['alamat'] : '<i style="color:#ff6e6e"> Alamat belum di update</i>'; ?></td>
                                  </tr>
                                  <tr  >
                                    <td style="width:25%;padding-top:5px;padding-bottom:5px">Alamat Instansi</td>
                                    <td style="width:2%;padding-top:5px;padding-bottom:5px"> : </td>
                                    <td style="width:68%;padding-top:5px;padding-bottom:5px"> <?php echo (!empty($user['alamatInstansi'])) ? $user['alamatInstansi'] : '<i style="color:#ff6e6e"> Alamat Instansi belum di update</i>'; ?></td>
                                  </tr>
                               </table>
                               </div>
                               </div>
                               

                               <button  type="button" class="btn btn-primary  waves-effect left m-t-10" data-toggle="modal" data-target="#smallModal">
                                EDIT FOTO
                            </button>
                            <a herf="#" type="button" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" style="width:30px;height:30px;margin-top:10px;font-size:5px;margin-right:10px;margin-left:30px">
                                  <i style="margin-top:-5px;font-size:17px !important;" class="fa fa-facebook" ></i>
                                </a>
                                <a herf="#" type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" style="width:30px;height:30px;margin-top:10px;font-size:5px;margin-right:10px">
                                  <i style="margin-top:-5px;font-size:17px !important; margin-left:-3px" class="fa fa-google" ></i>
                                </a>
                                <a herf="#" type="button" class="btn bg-blue btn-circle-lg waves-effect waves-circle waves-float" style="width:30px;height:30px;margin-top:10px;font-size:5px;margin-right:20px">
                                  <i style="margin-top:-5px;font-size:17px !important; margin-left:-3px" class="fa fa-twitter" ></i>
                                </a>
                               <button  type="button" class="btn btn-primary right waves-effect m-t-10" data-toggle="modal" data-target="#largeModal">
                                EDIT PROFIL
                            </button>
                      </div>
                   </div>
            </div>
            <!-- Model edit foto -->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Edit Foto</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                                $image = (!empty($user['foto'])) ? base_url().'assets/images/'.$user['foto'] : base_url().'assets/images/img2.jpg' ;
                                echo '
                                <div style="width:200px;height:240px;margin-left:10%;margin-bottom:20px;">
                                    <a href="'.$image.'" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" style="width:100%;height:100%" id="blah" src="'.$image.'">
                                    </a>
                                </div>'; ?>
                        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>covid19/editFoto" enctype="multipart/form-data">
                          <input name="kdUser" type="text" class="hidden"  value="<?php echo $user['kdUser']; ?>"  >
                          <input name="fotolama" type="text" class="hidden"  value="<?php echo $user['foto']; ?>"  >
                          

                          <div class="form-group">
                              <div class="col-sm-9 upload-btn-wrapper">
                                <button class="btn bg-light-blue waves-effect" style="width:150px;">UPLOAD FOTO</button>
                                <input  type="file" id="foto" name="foto" onchange="readURL(this);" >
                              </div>

                          </div>
                        </div>
                        <p style="font-size:13px;color:red;margin-left:10px">+ Klik UPLOAD FOTO untuk mengganti foto
                              <br>+ Type foto yang support yaitu PNG, JPG,JPEG
                              <br>+ Size foto kurang dari 1Megabytes</p>
                        <div class="modal-footer">
                            <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                            <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end edit foto -->
            <!-- Model edit profil -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="color:#222">
                            <h4 style="margin-bottom:15px" class="modal-title" id="largeModalLabel">Edit Profile <?php echo (!empty($user['nama'])) ? $user['nama'] : '  '; ?></h4>
                        </div>
                        <div class="modal-body" style="margin-bottom:-30px;font-family: arial">
                        <div class="format-input">
                          <form id="validation" method="POST"  action="<?php echo base_url()?>covid19/updateProfil" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" id="pass" name="pass" placeholder="Kata Sandi" <?php echo (!empty($user['password'])) ? 'value="'.$user['password'].'"' : 'placeholder="Kata Sandi"'; ?> required>
                                                        <input   name="username" type="hidden" class="form-control" placeholder="ID Pengguna" <?php echo (!empty($user['username'])) ? 'value="'.$user['username'].'"' : 'placeholder="ID Pengguna"'; ?>  required>


                                                        <input type="hidden" name="kdUser" value="<?php echo $user['kdUser'] ?>"> 
                                                              <div class="row" style="margin-top:30px;margin-left:-5px">
                                                                  <div class="col-md-12">
                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">Nama <span class="text-danger">* </span></label>
                                                                      <div class="form-line">
                                                                      <input onkeypress="return hanyahuruf(event)" id="nama" name="nama" type="text" class="form-control" placeholder="Nama" <?php echo (!empty($user['nama'])) ? 'value="'.$user['nama'].'"' : 'placeholder="Nama"'; ?>   required>
                                                                      </div>
                                                                        <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="tmplahir" class="text-black">instansi<span class="text-danger"> *</span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control" id="instansioperatorubah" name="instansi" placeholder="instansi" <?php echo (!empty($user['instansi'])) ? 'value="'.$user['instansi'].'"' : 'placeholder="instansi"'; ?>  required>
                                                                  </div>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <div class="row">
                                                              <div class="col-md-12">
                                                                <div class=" form-group ">
                                                                  <label for="tmplahir" class="text-black">Alamat Instansi<span class="text-danger"> *</span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control" id="tmplahir" name="Daerah" placeholder="Alamat Instansi" <?php echo (!empty($user['alamatInstansi'])) ? 'value="'.$user['alamatInstansi'].'"' : 'placeholder="Alamat Instansi"'; ?> required >
                                                                  </div>
                                                                </div>
                                                                </div>         
                                                              </div>
                                                              
                                                              <div class="row">
                                                              <div class="col-md-6">
                                                                <div class=" form-group ">
                                                                  <label for="email" class="text-black">Email <span class="text-danger">* </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com"  <?php echo (!empty($user['email'])) ? 'value="'.$user['email'].'"' : 'placeholder="Ex: example@example.com"'; ?>   required>
                                                                      </div>
                                                                </div></div>
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label for="no_tlp" class="text-black">No Telepon <span class="text-danger">* </span></label>
                                                                  <div class="form-line">
                                                                          <input onkeypress="return hanyaAngka(event)" type="text" class="form-control mobile-phone-number"  id="no_tlp" name="no_tlp" placeholder="Ex: +00 (000) 0000-0000"  <?php echo (!empty($user['noTlp'])) ? 'value="'.$user['noTlp'].'"' : 'placeholder="Ex: +00 (000) 0000-0000"'; ?>  required>
                                                                      </div >
                                                                      <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                </div>
                                                              </div></div>
                                                                <div class="form-group row" style="width:100%; margin-left:2px; margin-bottom:100px"  >
                                                                    <label for="alamat" class="text-black">Alamat<span class="text-danger">* </span></label>
                                                                    <div class="form-line">
                                                                    <textarea style="border:1px solid #ccc" name="alamat" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Alamat"  required><?php echo (!empty($user['alamat'])) ? $user['alamat'] : ''; ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                </div>                                      
                                                              </div>
                                                          </div>
                                                  </div>
                                                  <div class="modal-footer" style="position:relative">
                                                      <button  style="position:relative" ></button>
                                                      <button  style="position:relative" ></button>
                                                  </div>
                                                  <div style="background-color: #ddd;height: 60px; margin-top:-50px;position:relative">
                                                    <button type="submit" style="position:relative;float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="ubah">UBAH</button>
                                                      <button type="button" style="position:relative" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                  </div>
                                                  </form>
                            
                    </div>
                </div>
            <!-- end edit profil -->
            </div>
          </div>
        </div>
    </section>
    

    <?php include 'includes/footer.php' ?>
      
    

</body>
    
    
     <?php include 'includes/scripts.php' ?>
    
</html>

<script type="text/javascript">
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        function hanyahuruf(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
                $("#pesan_text").html("Pada nama tidak diperbolekan menggunakan angka").show().delay(2000).fadeOut("slow");
                return false;}};
                function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no").html("Hanya diperbolekan angka pada nomor telepon").show().delay(2000).fadeOut("slow");
                return false;}};

</script>

<style type="text/css">
  .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  margin-left: 50px;
}


.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  width: 100%;

}
</style>