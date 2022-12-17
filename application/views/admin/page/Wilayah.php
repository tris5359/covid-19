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
          <li><a style="color:#444" href="<?php echo base_url()?>covid19/beranda"><i class="material-icons">home</i> Beranda</a></li>
           <li><a style="color:#999;font-weight: 350">  Kabupaten/Kota</a></li>
      </ol>
    <section class="content" style="font-family:andalus;margin-bottom:25px">
        <div class="container-fluid" >
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px;position:relative;background-color:#fff">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;">
                                Kabupaten/Kota Provinsi Bengkulu
                            </h2>
                        </div>
                        <div class="body" style="margin-top:0px;font-size:16px">
                           <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahwilayah" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons"  >add</i>TAMBAH</b></a>

                                  <div class="container-table100">
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important">
                                    <thead>
                                        <tr class="row100 head " style="background-color:#001E42" >
                                            <th style="width:2%">No</th>
                                            <th style="width:10%">Kabupaten/Kota</th>
                                            <th style="width:40%">Provinsi</th>
                                            
                                            <th style="width:10%">Kecamatan</th>
                                            <th style="width:13%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from  tb_kabkot");
                                   $stmt->execute();
                                   foreach ($stmt as $data) {                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:2%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>
                                            <td style="width:30%;font-size:15px"><?php echo (!empty($data['namaDaerah'])) ?  $data['namaDaerah'] : '<p >-</p>' ?></td>
                                            <td style="width:25%;font-size:15px"><?php echo (!empty($data['provinsi'])) ? $data['provinsi'] : '<p> - </p>' ?></td>
                                            
                                            <td style="width:15%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="<?php echo base_url() ?>covid19/Kecamatan?auth=<?php echo base64_encode($data['kdDaerah']) ?>&Modul=<?php echo base64_encode($data['namaDaerah']) ?>" class="btn bg-blue waves-effect m-b-15" ><i class="material-icons" >assignment</i> DETAIL</a>
                                            </td>
                                            <td style="width:25%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubahwilayah<?php echo $data['kdDaerah'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdDaerah'] ?>" data-toggle="modal" ><i class="material-icons" >edit</i>EDIT</a>
                                            <a style="margin:0px;padding:3px 10px"  href="#hapusWilayah<?php echo $data['kdDaerah'] ?>" class="btn bg-red waves-effect m-b-15" type="button" data-id="<?php echo $data['kdDaerah'] ?>" data-toggle="modal" ><i class="material-icons" >delete</i>HAPUS</a>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah data wilayah-->
                                        <div class="modal fade" id="ubahwilayah<?php echo $data['kdDaerah'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">UBAH WILAYAH KABUPATEN / KOTA <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form method="post"  action="<?php echo base_url()?>covid19/ubahWilayah" enctype="multipart/form-data" class="m-l-20" >
                                                    <input type="hidden" name="kdDaerah" value="<?php echo $data['kdDaerah']?>">
                                                      <div class="row">
                                                                    <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">Nama Kabupaten / Kota <span class="text-danger"> </span></label>
                                                                      <div class="form-line">
                                                                      <input  name="kabkot" type="text" class="form-control" placeholder="Nama Kabupaten / Kota" <?php echo (!empty($data['namaDaerah'])) ? 'value="'.$data['namaDaerah'].'"' : 'placeholder="Nama Kabupaten / Kota"'; ?>  required >
                                                                      </div>
                                                                        <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                      <label for="location_one" class="text-black"><span>Provinsi<span class="text-danger">*</span></span></label>
                                                                      <div class="form-line">
                                                                      <select class="form-control show-tick" data-live-search="true" data-show-subtext="true"  name="provinsi" disabled>
                                                                        <?php 
                                                                          $a1 = ($data['provinsi'] == '') ? 'selected' : ''; 
                                                                          $a2 = ($data['provinsi'] == 'Bengkulu') ? 'selected' : ''; 
                                                                         ?>
                                                                         <?php echo $a1 ?>
                                                                      <option style='margin-left:40px' value="" <?php echo $a1 ?> required>Pilih Provinsi</option>
                                                                      <option style='margin-left:40px' value="Bengkulu" <?php echo $a2 ?> required>Bengkulu</option>
                                                                      </select>
                                                                        </div>
                                                                      </div>
                                                                  </div>
                                                                  </div>
                                                                
                                                   <div class="row" style="background-color: #f5f5f5;height: 60px; ">
                                                    <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="ubah">UBAH</button>
                                                      <button type="button"  class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button></div>
                                                  </div>
                                                 
                                                  </div>
                                                          </form>
                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                      <!--end modal Ubah data wilayah -->
                                        <!-- modal hapus data wilayah -->
                                        <div class="modal fade" id="hapusWilayah<?php echo $data['kdDaerah'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS WILAYAH KABUPATEN / KOTA !</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus wliayah</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['namaDaerah'])) ? $data['namaDaerah'] : $i?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/hapusWilayah?kd=".$data['kdDaerah']."&namaDaerah=".$data['namaDaerah'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus data wilayah-->                                 
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                             
                             ?>
                             </tbody>
                            </table>
                            <!-- modal tambah akun wilayah -->
                                        <div class="modal fade" id="tambahwilayah" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">TAMBAH WILAYAH KABUPATEN / KOTA <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form id="validationadd" method="POST"  action="<?php echo base_url()?>covid19/tambahwilayah" enctype="multipart/form-data" class="m-l-20" >
                                                      <div class="row m-t-40" >
                                                    <div class="col-md-6" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Nama Kabupaten / Kota<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="kabkot" placeholder="Nama Kabupaten / Kota" required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                         <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="location_one" class="text-black"><span>Provinsi<span class="text-danger">*</span></span></label>
                                                            <div class="form-line">
                                                            <select class="form-control show-tick" data-live-search="true" data-show-subtext="true"  name="provinsi" required>
                                                            <option style='margin-left:40px' value="" >Pilih Provinsi</option>
                                                            <option style='margin-left:40px' value="Bengkulu" >Bengkulu</option>
                                                            </select>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div>
                                                            </div>
                                                  </div>
                                                  <div class="m-t-30"></div>
                                                  <div class="row" style="background-color: #f5f5f5;height: 60px; ">
                                                    <button type="submit" style="position:relative;float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                                                      <button type="button" style="position:relative" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                  </div>
                                                  </form>
                                                  </div>
                                                          
                                              </div>
                                          </div>
                                      </div>
                                      <!--end modal tambah akun wilayah -->

                                                                 
                               </div>      
                         </div>
                    </div>
                </div>
    </section>  
    
    <?php include 'includes/footer.php' ?>
</body>
    
    
     <?php include 'includes/scripts.php' ?>
    
</html>

<script type="text/javascript">
  $(function () {
    $('#form_validation').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'gender': {
                required: true
            }
        },
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

</script>

