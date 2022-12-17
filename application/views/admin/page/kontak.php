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
          <li><a style="color:#444" href="<?php echo base_url()?>covid19"><i class="material-icons">home</i> Beranda</a></li>
           <li><a style="color:#999;font-weight: 350">  Kontak Rumah Sakit Rujukan</a></li>
      </ol>
    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;text-transform: capitalize;">
                                Kontak Rumah Sakit Rujukan
                            </h2>
                        </div>
                        <div class="body" >
                                <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahcovid19" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons"  >add</i>TAMBAH</b></a>

                                  <div class="container-table100">
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important">
                                    <thead>
                                        <tr class="row100 head " style="background-color:#001E42" >
                                            <th style="width:2%">No</th>
                                            <th style="width:25%">Nama Rumah Sakit</th>
                                            <th style="width:40%">Alamat Rumah Sakit</th>
                                            <th style="width:10%">Nomor Telpon</th>
                                            <th style="width:10%">lokasi</th>
                                            <th style="width:13%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from tb_rumahsakit ORDER BY kdRS DESC");
                                   $stmt->execute();
                                   foreach ($stmt as $data) {                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:2%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:25%;font-size:15px"><?php echo (!empty($data['namaRS'])) ? $data['namaRS'] : '<p> - </p>' ?></td>
                                            <td style="width:35%;font-size:15px"><?php echo (!empty($data['alamaRS'])) ?  $data['alamaRS'] : '<p style="color:red;"><i> - </i></p>' ?></td>
                                            <td style="width:15%;font-size:15px"><?php echo (!empty($data['noTlp']))?  $data['noTlp'] : '<p style="color:red;"><i> - </i></p>' ?></td>
                                            <td style="width:8%;font-size:15px"><a style="margin:0px;padding:3px 10px" href="<?php echo (!empty($data['petaKoordinat'])) ?  $data['petaKoordinat'] : '-' ?>" class="btn bg-blue waves-effect m-b-15" target="_blank" ><i class="material-icons" >map</i></a>
                                            </td>
                                            

                                            <td style="width:13%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubahcovid19<?php echo $data['kdRS'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdRS'] ?>" data-toggle="modal" ><i class="material-icons" >edit</i></a>
                                            <a style="margin:0px;padding:3px 10px"  href="#hapuscovid19<?php echo $data['kdRS'] ?>" class="btn bg-red waves-effect m-b-15" type="button" data-id="<?php echo $data['kdRS'] ?>" data-toggle="modal" ><i class="material-icons" >delete</i></a>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah data covid19-->
                                        <div class="modal fade" id="ubahcovid19<?php echo $data['kdRS'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">UBAH KONTAK RUMAH SAKIT RUJUKAN <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                  <div class="row m-t-40" ></div>
                                                   <form id="" method="POST"  action="<?php echo base_url()?>covid19/editKontak" enctype="multipart/form-data" class="m-l-20" >
                                                    <input type="hidden" name="kdRS" value="<?php echo $data['kdRS']?>">
                                                    <div class="row"  >
                                                          <div class="col-md-12" >
                                                    <div class="form-group " >
                                                          <label for="alamat" class="text-black">Nama Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="namaRS" placeholder="Nama Rumah Sakit" <?php echo (!empty($data['namaRS'])) ? 'value="'.$data['namaRS'].'"' : 'placeholder="Nama Rumah Sakit"'; ?>  required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    <div class="row"  >
                                                              <div class="col-md-6">
                                                                <div class="format-input">
                                                                <div class=" form-group ">
                                                                  <label for="email" class="text-black">Email <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com" <?php echo (!empty($data['email'])) ? 'value="'.$data['email'].'"' : 'placeholder="Ex: example@example.com"'; ?>  required>
                                                                      </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                                <div class="col-md-6">
                                                                  <div class="format-input">
                                                                <div class="form-group">
                                                                  <label for="no_tlp" class="text-black">No Telepon <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                          <input onkeypress="return hanyaAngka1(event)" type="text" class="form-control"  id="no_tlp" name="no_tlp" placeholder="No Telepon" <?php echo (!empty($data['noTlp'])) ? 'value="'.$data['noTlp'].'"' : 'placeholder="No Telepon"'; ?>  required>
                                                                      </div >
                                                                      <span id="pesan_no1" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        <div class="col-md-12" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Alamat Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="alamat" placeholder="Alamat Rumah Sakit" <?php echo (!empty($data['alamaRS'])) ? 'value="'.$data['alamaRS'].'"' : 'placeholder="Alamat Rumah Sakit"'; ?>  required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    <div class="row"  >
                                                        <div class="col-md-12" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Peta Koordinat Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                             <textarea style="border:1px solid #ccc" name="peta" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Peta Koordinat Rumah Sakit"  ><?php echo (!empty($data['petaKoordinat'])) ? $data['petaKoordinat'] : NULL; ?></textarea>
                                                        </div>

                                                          </div>
                                                        </div>

                                                          </div>
                                                          
                                                          <div>
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
                                      </div>
                                      <!--end modal Ubah data covid19 -->
                                        <!-- modal hapus data covid19 -->
                                        <div class="modal fade" id="hapuscovid19<?php echo $data['kdRS'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS KONTAK RUMAH SAKIT RUJUKAN!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus pemumuman</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['namaRS'])) ? $data['namaRS'] : 'Nomor'.$i?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/hapusKontak?kd=".$data['kdRS'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus data covid19-->                                 
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                             
                             ?>
                             </tbody>
                                </table>
                                 <!-- modal tambah akun covid19 -->
                                        <div class="modal fade" id="tambahcovid19" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">TAMBAH KONTAK RUMAH SAKIT RUJUKAN<p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form id="validationadd" method="POST"  action="<?php echo base_url()?>covid19/tambahKontak" enctype="multipart/form-data" class="m-l-20" >

                                                      <div class="row m-t-40" ></div>
                                                    

                                                    <div class="row"  >
                                                          <div class="col-md-12" >
                                                    <div class="form-group " >
                                                          <label for="alamat" class="text-black">Nama Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="namaRS" placeholder="Nama Rumah Sakit" required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    <div class="row"  >
                                                              <div class="col-md-6">
                                                                <div class="format-input">
                                                                <div class=" form-group ">
                                                                  <label for="email" class="text-black">Email <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                  <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com" required>
                                                                      </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                                <div class="col-md-6">
                                                                  <div class="format-input">
                                                                <div class="form-group">
                                                                  <label for="no_tlp" class="text-black">No Telepon <span class="text-danger"> </span></label>
                                                                  <div class="form-line">
                                                                          <input onkeypress="return hanyaAngka1(event)" type="text" class="form-control"  id="no_tlp" name="no_tlp" placeholder="No Telepon" required>
                                                                      </div >
                                                                      <span id="pesan_no1" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        <div class="col-md-12" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Alamat Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="alamat" placeholder="Alamat Rumah Sakit" required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    <div class="row"  >
                                                        <div class="col-md-12" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Peta Koordinat Rumah Sakit<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                             <textarea style="border:1px solid #ccc" name="peta" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Peta Koordinat Rumah Sakit"  ></textarea>
                                                        </div>

                                                          </div>
                                                        </div>

                                                          </div>
                                                          
                                                          <div>

                                                                

                                                             

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
                                      <!--end modal tambah akun covid19 -->
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

