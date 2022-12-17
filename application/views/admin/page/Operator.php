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
          <li><a style="color:#444" href="<?php echo base_url()?>staf"><i class="material-icons">home</i> Beranda</a></li>
           <li><a style="color:#999;font-weight: 350">  Operator</a></li>
      </ol>
    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;text-transform: capitalize;">
                                Data Operator
                            </h2>
                        </div>
                        <div class="body" >
                             <?php  
                                $stm = $conn->prepare("SELECT *,count(*) as jumlah from tb_user ");
                                 $stm->execute();
                                $jum = $stm->fetch();
                              if ($jum['jumlah']==0) {
                                 echo '
                                 <div style="  text-align: center;margin-top:40px;margin-bottom:90px"> 
                                  <i class="material-icons" align="center" style="font-size:200px;color:#bbb">assignment_turned_in</i>
                                  <p style="font-size:25px;font-family:andalus;"> belum ada akun Operator <p>
                                   </div> ' ;}
                               else{ ?>
                                <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahoperator" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" data-toggle="tooltip" data-placement="right" title="Tambah Operator"><b><i class="material-icons"  >add</i>TAMBAH</b></a>

                                  <div class="container-table100" >
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 " >
                                      <div class="table100-body" >
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important" >
                                    <thead>
                                        <tr class="row100 head" style="background-color:#001E42">
                                            <th style="width:1%">No</th>
                                            <th style="width:10%">ID Pengguna</th>
                                            <th style="width:10%">Kata Sandi</th>
                                            <th style="width:15%">Nama</th>
                                            <th style="width:15%">No Telepon</th>
                                            <th style="width:13%">Status</th>
                                            <th style="width:20%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from  tb_user ORDER BY tb_user.kdUser DESC");
                                   $stmt->execute();
                                   foreach ($stmt as $data) {
                                     $status = ($data['status']>=1) ? '<span class="label label-success" style="padding:8px 8px;">Aktivasi</span>' : '<span class="label label-danger" style="padding:8px 8px;margin-top:5px">Belum Aktivasi</span>';
                                     $active = ($data['status']==0) ? '<span class="pull-right"><a href="#aktivasi'.$data['kdUser'].'" class="status" data-toggle="modal" data-id="'.$data['kdUser'].'"><i class="material-icons" style="font-size:18px">settings</i></a></span>' : '';
                                     ?>
                                        <tr class="row100 body">
                                            <td style="width:1%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:10%;font-size:15px"><?php echo (!empty($data['username'])) ? $data['username'] : '<p> username belum ada </p>' ?></td>
                                            <td style="width:10%;font-size:15px"><?php echo (!empty($data['password'])) ?  '<div class="form-group"><input name="viewPass" class="form-control" type="password" value="'.$data['password'] .'" readonly><button style=";float: right; padding-right: 10px; padding-top: 5px;height:35px;margin-top:-32px;margin-right:-15px;background: none;box-shadow: 0px 0px 0px 0px;" type="button" id="" class="btn" name="dynamic"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></div>' : '<p style="color:red;"><i> password belum ada </i></p>' ?></td>
                                            <td style="width:15%;font-size:15px"><?php echo (!empty($data['nama'])) ?  $data['nama'] : '<p style="color:red;"><i> Nama belum ada </i></p>' ?></td>
                                            <td style="width:15%;font-size:15px"><?php echo (!empty($data['noTlp'])) ?  $data['noTlp'] : '<p style="color:red;"><i> No telpon tidak ada </i></p>' ?></td>
                                            
                                            <td style="width:13%;"><?php echo '<div style="margin-top:5px">'.$status.''.$active.'</div>' ?></b></td>
                                            <td style="width:15%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="<?php echo base_url() ?>covid19/dataOperator?id=<?php echo base64_encode($data['kdUser']) ?>" class="btn bg-blue waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdUser'] ?>" data-toggle="modal" ><i class="material-icons" >assignment</i> </a>
                                            <a style="margin:0px;padding:3px 10px" href="#ubah<?php echo $data['kdUser'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-toggle="modal" ><i  class="material-icons" >edit</i> </a>
                                            <button style="margin:0px;padding:3px 10px" data class="btn bg-red waves-effect m-b-15" type="button" data-toggle="modal"  data-target="#hapus<?php echo $data['kdUser'] ?>" ><i class="material-icons" >delete</i> </button>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah -->
                                        <div class="modal fade" id="ubah<?php echo $data['kdUser'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">UBAH DATA <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                  <div class="format-input">
                                                      <form id="" method="POST"  action="<?php echo base_url()?>covid19/updateOperator" enctype="multipart/form-data">
                                                        <input type="hidden" name="kdUser" value="<?php echo $data['kdUser'] ?>"> 
                                                              <div class="row" style="margin-top:30px;margin-left:-5px">
                                                                  <div class="col-md-12">
                                                                  <p style="font-size: 25px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:16px;text-transform: capitalize;margin-left:-10px;margin-bottom:10px">
                                                                      Data Akun
                                                                  </p>

                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">ID Pengguna<span class="text-danger">*</span></label>
                                                                      <div class="form-line">
                                                                      <input  id="useroperatorubah" name="username" type="text" class="form-control" placeholder="ID Pengguna" <?php echo (!empty($data['username'])) ? 'value="'.$data['username'].'"' : 'placeholder="ID Pengguna"'; ?>  required>
                                                                      </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="tmplahir" class="text-black">Kata Sandi<span class="text-danger">*</span></label>
                                                                  <div class="form-line">
                                                                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Kata Sandi" <?php echo (!empty($data['password'])) ? 'value="'.$data['password'].'"' : 'placeholder="Kata Sandi"'; ?> required>
                                                                  </div>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <p style="font-size: 25px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:16px;text-transform: capitalize;margin-left:-10px;margin-bottom:10px">
                                                                      Data Operator
                                                                  </p>
                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">Nama <span class="text-danger"> </span></label>
                                                                      <div class="form-line">
                                                                      <input onkeypress="return hanyahuruf(event)" id="nama" name="nama" type="text" class="form-control" placeholder="Nama" <?php echo (!empty($data['nama'])) ? 'value="'.$data['nama'].'"' : 'placeholder="Nama"'; ?>   >
                                                                      </div>
                                                                        <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="tmplahir" class="text-black">instansi<span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control" id="instansioperatorubah" name="instansi" placeholder="instansi" <?php echo (!empty($data['instansi'])) ? 'value="'.$data['instansi'].'"' : 'placeholder="instansi"'; ?>  >
                                                                  </div>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <div class="row">
                                                              <div class="col-md-12">
                                                                <div class=" form-group ">
                                                                  <label for="tmplahir" class="text-black">Alamat Instansi<span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control" id="tmplahir" name="Daerah" placeholder="Alamat Instansi" <?php echo (!empty($data['alamatInstansi'])) ? 'value="'.$data['alamatInstansi'].'"' : 'placeholder="Alamat Instansi"'; ?> >
                                                                  </div>
                                                                </div>
                                                                </div>         
                                                              </div>
                                                              
                                                              <div class="row">
                                                              <div class="col-md-6">
                                                                <div class=" form-group ">
                                                                  <label for="email" class="text-black">Email <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com"  <?php echo (!empty($data['email'])) ? 'value="'.$data['email'].'"' : 'placeholder="Ex: example@example.com"'; ?>   >
                                                                      </div>
                                                                </div></div>
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label for="no_tlp" class="text-black">No Telepon <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                          <input onkeypress="return hanyaAngka(event)" type="text" class="form-control mobile-phone-number"  id="no_tlp" name="no_tlp" placeholder="Ex: +00 (000) 0000-0000"  <?php echo (!empty($data['noTlp'])) ? 'value="'.$data['noTlp'].'"' : 'placeholder="Ex: +00 (000) 0000-0000"'; ?>  >
                                                                      </div >
                                                                      <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                </div>
                                                              </div></div>
                                                                <div class="form-group row" style="width:100%; margin-left:2px; margin-bottom:100px"  >
                                                                    <label for="alamat" class="text-black">Alamat<span class="text-danger"> </span></label>
                                                                    <div class="form-line">
                                                                    <textarea style="border:1px solid #ccc" name="alamat" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Alamat"  ><?php echo (!empty($data['alamat'])) ? $data['alamat'] : ''; ?></textarea>
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
                                          </div>
                                      </div>
                                      </div>
                                      <!--end modal Ubah -->
                                        <!-- modal hapus -->
                                        <div class="modal fade" id="hapus<?php echo $data['kdUser'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS DATA!</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus data</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['nama'])) ? $data['nama'] : $data['instansi']?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/hapusOperator?kdUser=".$data['kdUser']."&instansi=".$data['instansi']."&nama=".$data['nama'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus -->
                                        <!-- modal aktivasi -->
                                        <div class="modal fade" id="aktivasi<?php echo $data['kdUser'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">AKTIVASI AKUN!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">lock_open</i>
                                                        <p>Apa anda ingin mengaktivasi Akun</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['nama'])) ? $data['nama'] : $data['instansi']?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/aktivasiOperator?kdUser=".$data['kdUser']."&instansi=".$data['instansi']."&nama=".$data['nama'])?> " type="submit" style="float:right" class="btn btn-success waves-effect m-t-15 m-r-20" name="aktivasi">AKTIVASI</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal aktivasi -->

                                    
                                  
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }} ?>

                              <!-- modal tambah akun Operator -->
                                        <div class="modal fade" id="tambahoperator" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">TAMBAH PENGGUNA<p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                  <div class="format-input">
                                                      <form id="" method="POST"  action="<?php echo base_url()?>covid19/tambahOperator" enctype="multipart/form-data">
                                                              <div class="row" style="margin-top:30px;margin-left:-5px">
                                                                  <div class="col-md-12">
                                                                  <p style="font-size: 25px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:16px;text-transform: capitalize;margin-left:-10px;margin-bottom:10px">
                                                                      Data Akun
                                                                  </p>

                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">ID Pengguna<span class="text-danger">*</span></label>
                                                                      <div class="form-line">
                                                                      <input onkeypress="return hanyahuruf2(event)" id="useroperator" name="username" type="text" class="form-control" placeholder="ID Pengguna"   required>
                                                                      </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="tmplahir" class="text-black">Kata Sandi<span class="text-danger">*</span></label>
                                                                  <div class="form-line">
                                                                  <input type="password" class="form-control" id="password" name="pass" placeholder="Kata Sandi" required>
                                                                  <span type="submit" onclick="cek()" style=";float: right; padding-right: 10px; padding-top: 5px;height:35px;margin-top:-32px;z-index" id="btnn"><i class="fa fa-eye"></i></span>
                                                                  </div>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <p style="font-size: 25px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:16px;text-transform: capitalize;margin-left:-10px;margin-bottom:10px">
                                                                      Data Operator <b id="lihatdata"><a class="btn btn-primary waves-effect right" role="button" data-toggle="collapse" href="#collapseExample" onclick="see()" id="btn2" aria-expanded="false" aria-controls="collapseExample">TAMPILKAN FORM</a></b>
                                                                  </p>
                                                                  <div class="collapse" id="collapseExample">
                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">Nama <span class="text-danger"> </span></label>
                                                                      <div class="form-line">
                                                                      <input onkeypress="return hanyahuruf1(event)" id="nama" name="nama" type="text" class="form-control" placeholder="Nama" >
                                                                      </div>
                                                                        <span id="pesan_text1" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="tmplahir" class="text-black">Instansi<span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control"  name="instansi" placeholder="instansi"   >
                                                                  </div>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <div class="row">
                                                              <div class="col-md-12">
                                                                <div class=" form-group ">
                                                                  <label for="tmplahir" class="text-black">Alamat Instansi<span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" class="form-control" id="tmplahir" name="Daerah" placeholder="Alamat Instansi" >
                                                                  </div>
                                                                </div>
                                                                </div>         
                                                              </div>
                                                              <div class="row">
                                                              <div class="col-md-6">
                                                                <div class=" form-group ">
                                                                  <label for="email" class="text-black">Email <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com">
                                                                      </div>
                                                                </div>
                                                              </div>
                                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label for="no_tlp" class="text-black">No Telepon <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                          <input onkeypress="return hanyaAngka1(event)" type="text" class="form-control mobile-phone-number"  id="no_tlp" name="no_tlp" placeholder="Ex: +00 (000) 0000-0000" >
                                                                      </div >
                                                                      <span id="pesan_no1" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                </div>
                                                              </div>
                                                            </div>
                                                                <div class="form-group row" style="width:100%; margin-left:2px; margin-bottom:100px"  >
                                                                    <label for="alamat" class="text-black">Alamat Rumah<span class="text-danger"> </span></label>
                                                                    <div class="form-line">
                                                                    <textarea style="border:1px solid #ccc" name="alamat" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Alamat"  ></textarea>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                      
                                                  <div class="row">
                                                    <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                                                      <button type="button" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                  </div>
                                                  </form>
                                                  </div>
                                                          
                                              </div>
                                          </div>
                                      </div>
                       </div>
                            </div>
                            </div>
                            </div>           
                      </div>
                </div>
            </div>
            </tbody>
          </table>
                                      <!--end modal tambah akun Operator -->
    </section>


      
    

</body>
    
    
    
<?php include 'includes/footer.php' ?>

    <?php include 'includes/scripts.php' ?>


    
</html>


<script type="text/javascript">
   var form2 = $('#valea').show();
    form2.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
    /*var form3 = $('#validation3').show();
    form3.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });  */
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
       function hanyahuruf1(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
                $("#pesan_text1").html("Pada nama tidak diperbolekan menggunakan angka").show().delay(2000).fadeOut("slow");
                return false;}};
                function hanyaAngka1(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no1").html("Hanya diperbolekan angka pada nomor telepon").show().delay(2000).fadeOut("slow");
                return false;}}
                

  function hide(evt) {

    $('#lihatdata').html('<a class="btn btn-primary waves-effect right" role="button" data-toggle="collapse" href="#collapseExample" id="btn2" onclick="see()" aria-expanded="false" aria-controls="collapseExample">TAMPILKAN FORM</a>');
  }
  function see(evt) {

    $('#lihatdata').html('<a class="btn btn-primary waves-effect right" role="button" data-toggle="collapse" href="#collapseExample" id="btn1" onclick="hide()" aria-expanded="false" aria-controls="collapseExample">SEMBUNYIKAN FORM</a>');
  }

  document.getElementById("useroperator").oninput = () => {
  const input = document.getElementById('useroperator');
  const output = document.getElementById('instansioperator');

  output.value = input.value;
};



function cekradio1() {
  document.getElementById("ks").checked = true;
  document.getElementById("ks2").checked = false;
  document.getElementById("ks3").checked = false;
  $('#collapseTwo').collapse('hide');
  $('#collapseThree').collapse('hide');
}
function cekradio2() {
  document.getElementById("ks").checked = false;
  document.getElementById("ks2").checked = true;
  document.getElementById("ks3").checked = false;
  $('#collapseOne').collapse('hide');
  $('#collapseThree').collapse('hide');
}
function cekradio3() {
  document.getElementById("ks").checked = false;
  document.getElementById("ks2").checked = false;
  document.getElementById("ks3").checked = true;
  $('#collapseTwo').collapse('hide');
  $('#collapseOne').collapse('hide');
}
  
      
 var myButton = document.getElementsByName('dynamic');
var myInput = document.getElementsByName('viewPass');
myButton.forEach(function(element, index){
  element.onclick = function(){
     'use strict';

      if (myInput[index].type == 'password') {
          myInput[index].setAttribute('type', 'text');
          element.firstChild.textContent = '';
            element.firstChild.className = "glyphicon glyphicon-eye-close";

      } else {
           myInput[index].setAttribute('type', 'password');
           element.firstChild.textContent = '';
            element.firstChild.className = "glyphicon glyphicon-eye-open";
      }
  }
})
                          
                               
</script>