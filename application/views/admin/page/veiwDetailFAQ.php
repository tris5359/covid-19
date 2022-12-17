<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php 
$kdHeader = base64_decode($_GET['auth']); 
$jenisFAQ = base64_decode($_GET['Modul']); 


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
          <li><a style="color:#444" href="#"> Kelompok Pertanyaan (FAQ) ></li>
           <li><a style="color:#999;font-weight: 350"> Daftar Pertanyaan </a></li>
      </ol>
    <section class="content" style="font-family:andalus;margin-bottom:25px">
        <div class="container-fluid" >
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px;position:relative;background-color:#fff">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;">
                                Daftar Pertanyaan (FAQ) "<?php echo $jenisFAQ ?>"
                            </h2>
                        </div>
                        <div class="body" style="margin-top:0px;font-size:16px">
                          
                                <?php
                                $stm = $conn->prepare("SELECT *,count(*) as jumlah from tb_isifaq inner join tb_headerfaq on tb_isifaq.kdHeader=tb_headerfaq.kdHeader where tb_isifaq.kdHeader=:id");
                                   $stm->execute(['id'=>$kdHeader]);
                                $jum = $stm->fetch();
                              if ($jum['jumlah']==0) {
                                 echo '
                                <a style="margin-bottom:-50px;margin-left: 30px;width:250px" href="#tambahFAQ" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons" >add</i>TAMBAH PERTANYAAN (FAQ) </b></a>

                                <div style="  text-align: center;margin-top:0px;"> 
                                   <i class="material-icons m-b-30" align="center" style="font-size:230px;color:#bbb">info_outline</i>
                                  <p style="font-size: 25px; color: #333; font-size:25px;font-family:andalus;text-align:center;">Belum ada data Daftar Pertanyaan FAQ "'.$jenisFAQ.'" </p>
                                  <p style="font-size: 25px;margin-top: 8px; color: #555; padding-left: 5px;font-size:16px;font-family:andalus;text-align:center;margin-bottom:40px">Silakan Tekan "TAMBAH PERTANYAAN (FAQ)" untuk menambah Daftar Pertanyaan FAQ "'.$jenisFAQ.'" </p>
                                   </div> ' ;}  
                               else{ ?>
                                 <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahFAQ" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons"  >add</i>TAMBAH</b></a>

                                  <div class="container-table100">
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important">
                                    <thead>
                                        <tr class="row100 head " style="background-color:#001E42" >
                                            <th style="width:2%">No</th>
                                            <th style="width:40%">Pertanyaan</th>
                                            <th style="width:10%">Penjelasan/Tanggapan</th>
                                            <th style="width:13%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                              <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from  tb_isifaq inner join tb_headerfaq on tb_isifaq.kdHeader=tb_headerfaq.kdHeader where tb_isifaq.kdHeader=:id");
                                   $stmt->execute(['id'=>$kdHeader]);
                                   foreach ($stmt as $data) {                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:2%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:25%;font-size:15px"><?php echo (!empty($data['judulisi'])) ? $data['judulisi'] : '<p> - </p>' ?></td>
                                            <td style="width:30%;font-size:15px"><?php echo (!empty($data['isi'])) ?  $data['isi'] : '<p >-</p>' ?></td>
                                            <td style="width:25%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubahFAQ<?php echo $data['kdIsi'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdHeader'] ?>" data-toggle="modal" ><i class="material-icons" >edit</i>EDIT</a>
                                            <a style="margin:0px;padding:3px 10px"  href="#hapusFAQ<?php echo $data['kdIsi'] ?>" class="btn bg-red waves-effect m-b-15" type="button" data-id="<?php echo $data['kdHeader'] ?>" data-toggle="modal" ><i class="material-icons" >delete</i>HAPUS</a>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah data FAQ-->
                                        <div class="modal fade" id="ubahFAQ<?php echo $data['kdIsi'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel" style="text-transform: uppercase;">UBAH Pertanyaan (FAQ) "<?php echo $jenisFAQ ?>" <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form method="post"  action="<?php echo base_url()?>covid19/ubahPertanyaanFAQ" enctype="multipart/form-data" class="m-l-20" >
                                                    <input type="hidden" name="kdIsi" value="<?php echo $data['kdIsi']?>">
                                                    <input class="hidden" type="hidden" name="kdHeader" value="<?php echo $kdHeader ?>" required>
                                                    <input class="hidden" type="hidden" name="jenisFAQ" value="<?php echo $jenisFAQ ?>" required>
                                                      <div class="row">
                                                                    <div class="col-md-12">
                                                                  <div class="form-group">
                                                                      <label for="nama_depan" class="text-black">Pertanyaan<span class="text-danger"> </span></label>
                                                                      <div class="form-line">
                                                                      <input  name="Pertanyaan" type="text" class="form-control" placeholder="Pertanyaan" <?php echo (!empty($data['judulisi'])) ? 'value="'.$data['judulisi'].'"' : 'placeholder="Pertanyaan"'; ?>  required >
                                                                      </div>
                                                                        <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <label for="location_one" class="text-black"><span>Penjelasan/Tanggapan<span class="text-danger">*</span></span></label>
                                                                      <div class="form-line">
                                                                      <textarea style="border:1px solid #ccc" name="Penjelasan" id="Penjelasan" cols="15" rows="2" class="form-control" placeholder=" Penjelasan/Tanggapan" required><?php echo (!empty($data['isi'])) ? $data['isi'] : ''; ?></textarea>
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
                                      <!--end modal Ubah data FAQ -->
                                        <!-- modal hapus data FAQ -->
                                        <div class="modal fade" id="hapusFAQ<?php echo $data['kdIsi'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel" style="text-transform: uppercase;">HAPUS Pertanyaan (FAQ) "<?php echo $jenisFAQ ?>"!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus Pertanyaan (FAQ)</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['judulisi'])) ? $data['judulisi'] : $i?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/hapusPertanyaanFAQ?kd=".$data['kdIsi']."&judulisi=".$data['judulisi']."&jenisFAQ=".$jenisFAQ."&kdHeader=".$data['kdHeader'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus data FAQ-->                                 
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                             
                             ?>
                             </tbody>
                            </table>
                          <?php } ?>
                            <!-- modal tambah akun FAQ -->
                                        <div class="modal fade" id="tambahFAQ" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel" style="text-transform: uppercase;">TAMBAH Pertanyaan (FAQ) "<?php echo $jenisFAQ ?>"<p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form id="validationadd" method="post"  action="<?php echo base_url()?>covid19/tambahPertanyaanFAQ" enctype="multipart/form-data" class="m-l-20" >
                                                      <div class="row m-t-40" >
                                                    <div class="col-md-12" >
                                                    <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Pertanyaan<span class="text-danger">*</span></label> 
                                                          <div class="form-line">
                                                            <input class="form-control" type="text" name="Pertanyaan" placeholder="Pertanyaan" required>
                                                             <input class="hidden" type="hidden" name="kdHeader" value="<?php echo $kdHeader ?>" required>
                                                            <input class="hidden" type="hidden" name="jenisFAQ" value="<?php echo $jenisFAQ ?>" required>
                                                        </div>

                                                          </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                         <div class="form-group">
                                                            <label for="location_one" class="text-black"><span>Penjelasan/Tanggapan<span class="text-danger">*</span></span></label>
                                                            <div class="">
                                                            <textarea style="border:1px solid #ccc" name="Penjelasan" id="Penjelasan" cols="15" rows="2" class="form-control" placeholder=" Penjelasan/Tanggapan"  required></textarea>
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
                                      <!--end modal tambah akun FAQ -->

                                    
                                                                 
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

