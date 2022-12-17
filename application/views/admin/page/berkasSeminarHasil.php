<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/ifonts/font-awesome-4.7.0/css/font-awesome.min.css">



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
          <li><a style="color:#444" href="#"> Berkas</a></li>
           <li><a style="color:#999;font-weight: 350">  Seminar Proposal</a></li>
      </ol>
    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;">
                                Pendaftar Seminar Proposal 
                            </h2>
                        </div>
                        <div class="body" >
                        <?php  
                                $stm = $conn->prepare("SELECT *,count(*) as jumlah from tb_berkasseminar");
                                 $stm->execute();
                                $jum = $stm->fetch();
                              if ($jum['jumlah']==0) {
                                 echo '
                                 <div style="  text-align: center;margin-top:40px;margin-bottom:110px"> 
                                  <i class="material-icons" align="center" style="font-size:200px;color:#bbb">assignment_turned_in</i>
                                  <p style="font-size:25px;font-family:andalus;"> belum ada akun mahasiswa yang melakukan pendaftaran proposal<p>
                                   </div> ' ;}
                              else{
                               ?>
                                  <div class="container-table100" style="margin-top:-30px">
                                    <div class="wrap-table100">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important" >
                                    <thead>
                                        <tr class="row100 head" style="background-color:#001E42">
                                            <th style="width:1%">No</th>
                                            <th style="width:10%">NPM</th>
                                            <th style="width:15%">Nama</th>
                                            <th style="width:15%">Jenis Kelamin</th>
                                            <th style="width:15%">Berkas Online</th>
                                            <th style="width:16%">Berkas Fisik</th>
                                            <th style="width:13%">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php

                                $i=1;
                                
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from tb_berkasseminar inner join tb_mahasiswa on tb_berkasseminar.NPM=tb_mahasiswa.NPM inner join tb_user on tb_user.kdUser=tb_mahasiswa.kdUser where tb_berkasseminar.jenisBerkas='Seminar Proposal' and tb_berkasseminar.kdTahunAkademik=:tahun ORDER BY tb_berkasseminar.kdBerkas DESC");
                                   $stmt->execute(['tahun'=>$thn['kdTahunAkademik']]);
                                   foreach ($stmt as $data) {
                                     $status = ($data['statusBerkas']=="proses") ? '<a href="#lihatberkas'.$data['kdBerkas'].'"  data-toggle="modal" data-id="'.$data['kdBerkas'].'" style="margin:0px;padding:5px 8px;width:170px" class="open-homeEvents btn btn-warning waves-effect"><i class="material-icons" style="font-size:18px">error</i>BELUM DIVERIFIKASI</a>' : '<a href="#lihat2'.$data['kdBerkas'].'"  data-toggle="modal" data-id="'.$data['kdBerkas'].'" style="margin:0px;padding:5px 8px;width:170px" class="open-homeEvents btn btn-success waves-effect"><i class="material-icons" style="font-size:18px">check_box</i>TELAH DIVERIFIKASI</a>';
                                     $status2 = ($data['statusBerkasFisik']==0) ? '<a href="#berkas'.$data['kdBerkas'].'"  data-toggle="modal" data-id="'.$data['kdBerkas'].'" style="margin:0px;padding:5px 8px;width:140px" class="open-homeEvents btn btn-warning waves-effect"><i class="material-icons" style="font-size:18px">error</i>BELUM LENGKAP</a>' : '<a href="#"  data-toggle="modal" data-id="'.$data['kdBerkas'].'" style="margin:0px;padding:5px 8px;width:140px" class="open-homeEvents btn btn-success waves-effect  "><i class="material-icons" style="font-size:18px">check_box</i>TELAH LENGKAP</a>';
                                     $jk = (($data['jenisKelamin']=="Laki-Laki")) ?'<span><i class="fa fa-male" style="font-size:25px;"></i> Laki - laki</span>' : '';
                                     $jk2 = (($data['jenisKelamin']=="Perempuan")) ?'<span><i class="fa fa-female" style="font-size:25px;"></i> Perempuan</span>' : '';
                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:1%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </td>

                                            <td style="width:10%;font-size:15px"><?php echo (!empty($data['NPM'])) ? $data['NPM'] : '<p style="color:red;"><i> NPM belum ada </i></p>' ?></td>
                                            <td style="width:15%;font-size:15px"><?php echo (!empty($data['nama'])) ?  $data['nama'] : '<p style="color:red;"><i> Nama belum ada </i></p>' ?></td>
                                            <td style="width:15%;text-align:center;font-size:15px">
                                           <?php echo (!empty($data['jenisKelamin'])) ? $jk.''.$jk2 : ' <p style="color:red;"><i> Data belum di update </i></p>';                                                
                                             ?></td>
                                             <td style="width:19%;font-size:15px;">
                                              <?php echo $status ?>
                                            </td>
                                            <td style="width:16%;text-align:center;font-size:15px">
                                              <?php echo $status2 ?> 
                                            </td>
                                            <td style="width:12%;text-align:center;font-size:15px">
                                              <?php if ($data['statusBerkas']=="setuju" && $data['statusBerkasFisik']==1) {
                                                echo '<b style="color:green">DISETUJUI</b>';
                                              }else {
                                                echo '<b style="color:#FF5722">DIVERIFIKASI</b>';;
                                              }?>
                                            </td>
                                        </tr>
                                        <!-- modal verifikasi berkas online -->
                                        <div class="modal fade" id="lihatberkas<?php echo $data['kdBerkas'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">Memverifikasi Berkas Pendaftaran Seminar Proposal!</h4>
                                                    </div>
                                                    <div class="modal-body" style="color:#000;font-family:andalus;font-size:15px">
                                                      <b>Note :</b><br><p style="color:red">Verifikasi Berkas Pendaftaran Proposal! Jika Semua Berkas Telah menemnuihi persyaratan silakan klik button verifikasi</p>
                                                      <div class="row">
                                                        
                                                      </div>
                                                  <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                                    <div class="col-md-10">
                                                    <div></div>
                                                        Surat keterangan rekomendasi dari ketua KSTIf<a href="<?php echo (!empty($data['KSTIF'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['KSTIF'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Surat keterangan rekomendasi dari ketua KSTIf" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['KSTIF'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['KSTIF'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        Transkrip Nilai<a href="<?php echo (!empty($data['transkrip'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['transkrip'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Transkrip Nilai" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['transkrip'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['transkrip'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        KRS Yang di setujui pembimbing akademik<a href="<?php echo (!empty($data['krs'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['krs'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="KRS Yang di setujui pembimbing akademik" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['krs'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['krs'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        KTM Yang Berlaku<a href="<?php echo (!empty($data['ktm'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['ktm'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="KTM Yang Berlaku" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['ktm'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['ktm'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Lembar Pengesahan Laporan Kerja Praktik<a href="<?php echo (!empty($data['pengesahanKP'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['pengesahanKP'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Lembar Pengesahan Laporan Kerja Praktik" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['pengesahanKP'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['pengesahanKP'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Daftar Hadir Seminar (Minimal Menghadiri 5 Seminar)<a href="<?php echo (!empty($data['hadirSeminar'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['hadirSeminar'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Daftar Hadir Seminar (Minimal Menghadiri 5 Seminar)" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['hadirSeminar'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['hadirSeminar'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Pembayaran Sumbangan Pembinaan Pendidikan<a href="<?php echo (!empty($data['sumbangan'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['sumbangan'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Pembayaran Sumbangan Pembinaan Pendidikan" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['sumbangan'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['sumbangan'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="pr_berkasonlinesetuju.php?NPM=<?php echo $data['NPM'] ?>" type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">VERIFIKASI</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal verifikasi berkas online -->
                                        <!-- modal verifikasi berkas online -->
                                        <div class="modal fade" id="lihat2<?php echo $data['kdBerkas'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">Lihat Berkas Pendaftaran Seminar Proposal!</h4>
                                                    </div>
                                                    <div class="modal-body" style="color:#000;font-family:andalus;font-size:15px">
                                                      
                                                      <div class="row">
                                                        
                                                      </div>
                                                  <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                                    <div class="col-md-10">
                                                    <div></div>
                                                        Surat keterangan rekomendasi dari ketua KSTIf<a href="<?php echo (!empty($data['KSTIF'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['KSTIF'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Surat keterangan rekomendasi dari ketua KSTIf" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['KSTIF'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['KSTIF'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        Transkrip Nilai<a href="<?php echo (!empty($data['transkrip'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['transkrip'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Transkrip Nilai" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['transkrip'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['transkrip'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        KRS Yang di setujui pembimbing akademik<a href="<?php echo (!empty($data['krs'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['krs'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="KRS Yang di setujui pembimbing akademik" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['krs'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['krs'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        KTM Yang Berlaku<a href="<?php echo (!empty($data['ktm'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['ktm'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="KTM Yang Berlaku" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['ktm'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['ktm'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Lembar Pengesahan Laporan Kerja Praktik<a href="<?php echo (!empty($data['pengesahanKP'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['pengesahanKP'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Lembar Pengesahan Laporan Kerja Praktik" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['pengesahanKP'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['pengesahanKP'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Daftar Hadir Seminar (Minimal Menghadiri 5 Seminar)<a href="<?php echo (!empty($data['hadirSeminar'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['hadirSeminar'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Daftar Hadir Seminar (Minimal Menghadiri 5 Seminar)" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['hadirSeminar'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['hadirSeminar'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="col-md-10">
                                                        Pembayaran Sumbangan Pembinaan Pendidikan<a href="<?php echo (!empty($data['sumbangan'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['sumbangan'] : base_url().'assets/images/noimage.jpg'; ?>" data-sub-html="Pembayaran Sumbangan Pembinaan Pendidikan" class="btn btn-info" style="float:right"> LIHAT
                                                        <img class="img-responsive thumbnail" src="<?php echo (!empty($data['sumbangan'])) ? base_url().'assets/images/mahasiswa/berkas/'.$data['sumbangan'] : base_url().'assets/images/noimage.jpg'; ?>" style="z-index:-999;width:0px;position:absolute">
                                                        </a>
                                                        
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="float:right" class="btn btn-primary waves-effect  m-t-15 m-l-20" data-dismiss="modal">OKE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal verifikasi berkas online -->
                                        <!-- modal berkas fisik -->
                                        <div class="modal fade" id="berkas<?php echo $data['kdBerkas'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">Pengumpulan  Berkas!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">move_to_inbox</i>
                                                        <p>Memverivikasi Berkas yang Dikumpulkan Mahasiswa! </p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['nama'])) ? $data['nama'] : $data['NPM']?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="pr_berkasfisiksetuju.php?NPM=<?php echo $data['NPM'] ?>" type="submit" style="float:right" class="btn btn-success waves-effect m-t-15 m-r-20" name="aktivasi">SETUJU</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal berkas fisik -->
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }} ?>
                             </tbody>
                             </table>
                             
                                        
                                                  
                          
                      </div>
                </div>
            </div>

    </section>


    

</body>
<?php include 'includes/footer.php' ?>
<!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="<?php echo base_url() ?>/assets/plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>/assets/js/pages/medias/image-gallery.js"></script>

     <?php include 'includes/scripts.php' ?>
    
</html>

<script type="text/javascript">
  
</script>