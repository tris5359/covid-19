<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/ifonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <?php
  $conn = $pdo->open();

?>


<body class="theme-red">
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
           <li><a style="color:#999;font-weight: 350">  Data Terkonfirmasi Meninggal</a></li>
      </ol>

    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;text-transform: capitalize;">
                                Data Terkonfirmasi Meninggal
                            </h2>
                        </div>
                        <div class="body" >

                                <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahMeninggal" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons"  >add</i>TAMBAH</b></a>


                                  <div class="container-table100">
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                        <div class="row clearfix">
                                        <!-- Line Chart -->
                                        <div class=" col-md-12 ">
                                            <div class="card">
                                                <div class="body">
                                                    <canvas id="line-chart" style="height: 100px !important"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# Line Chart -->
                                    </div>
                                <table class="table  dataTable js-exportable" >
                                    <thead>
                                        <tr class="row100 head " style="background-color:#001E42" >
                                            <th style="width:2%">No</th>
                                            <th style="width:25%">Tanggal</th>
                                            <th style="width:40%">Meninggal</th>
                                            <th style="width:10%">Detail</th>
                                            <th style="width:13%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                $tgl = date('Y-m-d');
                                try{       
                                   $stmt = $conn->prepare("SELECT tgl,meninggal,kdKasus FROM `tb_kasus` where tgl <= :tgl  ORDER BY `tb_kasus`.`tgl` DESC");
                                   $stmt->execute(['tgl'=>$tgl]);

                                   foreach ($stmt as $data) {                       
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:2%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:30%;font-size:15px"><?php echo (!empty($data['tgl'])) ? $data['tgl'] : '-' ?></td>
                                            <td style="width:30%;font-size:15px"><?php echo (!empty($data['meninggal'])) ?  '<b>'.$data['meninggal'].'</p>' : '<p style="color:red">0</p>' ?></td>
                                            <td style="width:15%;font-size:15px;text-align: center;"> 
                                              <a style="margin:0px;padding:3px 10px" href="#ubahMeninggal<?php echo $data['kdKasus'] ?>" class="btn bg-blue waves-effect m-b-15" ><i class="material-icons" >list</i>DETAIL</a>
                                            </td>
                                            

                                            <td style="width:20%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubahMeninggal<?php echo $data['kdKasus'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdKasus'] ?>" data-toggle="modal" ><i class="material-icons" >edit</i>EDIT</a>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah data Meninggal-->
                                        <div class="modal fade" id="ubahMeninggal<?php echo $data['kdKasus'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">Ubah Data Konfirmasi Meninggal Tanggal <?php echo date('d-m-Y') ?> <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                  <form id="" method="POST"  action="<?php echo base_url()?>covid19/ubahMeninggal" enctype="multipart/form-data" class="m-l-20" >
                                                    <input type="hidden" name="kdKasus" value="<?php echo $data['kdKasus'] ?>">
                                                    <input class="hidden" type="hidden" name="tanggal" value="<?php echo $data['tgl'] ?>" >

                                                      <div class="row m-t-40" >
                                                        <div class="col-md-6" >
                                                          <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                            <label for="alamat" class="text-black">Tanggal<span class="text-danger">*</span></label> 
                                                            <div class="form-line" >
                                                              <input class="form-control" type="text" name="tanggal" value="<?php echo $data['tgl'] ?>" disabled>
                                                            </div>

                                                          </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                        <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                            <label for="alamat" class="text-black">Konfirmasi Meninggal<span class="text-danger">*</span></label> 
                                                            <div class="form-line">
                                                              <input onkeypress="return hanyaAngka(event)" class="form-control" type="number" name="Meninggal" placeholder="Konfirmasi Meninggal" <?php echo 'value="'.$data['meninggal'].'"'  ?> required>

                                                            </div>
                                                            <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>

                                                          </div>
                                                        </div>
                                                        </div>
                                                        <div class="m-t-30">
                                                          <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                                                      <button type="button" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                           
                                                      </div>
                                                   
                                                  </form>
                                                  </div>
                                                          
                                              </div>
                                          </div>
                                      </div>
                                      <!--end modal Ubah data Meninggal -->
                                        <!-- modal hapus data Meninggal 
                                        <div class="modal fade" id="hapusMeninggal<?php echo $data['kdKasus'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS PENGUMUMAN!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus pemumuman</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['tgl'])) ? $data['tgl'] : 'Nomor'.$i?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("Meninggal/hapusPengumuman?kd=".$data['kdKasus'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus data Meninggal-->                                 
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                             try {
                               $tgl = date('Y-m-d');

                             $data_tanggal = array();
                                  $data_total = array();
                                   $stmt = $conn->prepare("SELECT tgl,meninggal,kdKasus FROM `tb_kasus` where tgl <= :tgl ");
                                   $stmt->execute(['tgl'=>$tgl]);

                                   foreach ($stmt as $data) {    
                                   $data_tanggal[] = date('d-m-Y', strtotime($data['tgl'])); // Memasukan tanggal ke dalam array
                                   $data_total[] = $data['meninggal']; // Memasukan total ke dalam array    
                                 }
                             } catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                                
                             
                             ?>
                             </tbody>
                                </table>
                                 <!-- modal tambah akun Meninggal -->
                                        <div class="modal fade" id="tambahMeninggal" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel" style="text-transform: capitalize;">Tambah Data Konfirmasi Meinggal Tanggal <?php echo date('d-m-Y') ?><p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form id="validation" method="POST"  action="<?php echo base_url()?>covid19/tambahMeninggal" enctype="multipart/form-data" class="m-l-20" >
                                                      <div class="row m-t-40" >
                                                        <div class="col-md-6" >
                                                          <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                            <label for="alamat" class="text-black">Tanggal<span class="text-danger">*</span></label> 
                                                            <div class="form-line">
                                                              <input class="form-control" type="text" name="tanggal" value="<?php echo date('d-m-Y') ?>" disabled>
                                                            </div>

                                                          </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                        <div class="form-group " style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                            <label for="alamat" class="text-black">Konfirmasi Meninggal<span class="text-danger">*</span></label> 
                                                            <div class="form-line">
                                                              <input onkeypress="return hanyaAngka1(event)" class="form-control" type="number" name="Meninggal" placeholder="Konfirmasi Meninggal" required>
                                                             
                                                            </div>
                                                             <span id="pesan_no1" style="text-transform: capitalize;color: red;font-size:12px"></span>

                                                          </div>
                                                        </div>
                                                        </div>
                                                        <div class="m-t-30">
                                                          <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                                                      <button type="button" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                           
                                                      </div>
                                                   
                                                  </form>
                                                  </div>
                                                          
                                              </div>
                                          </div>
                                      </div>
                                      <!--end modal tambah akun Meninggal -->
                            </div>
                            </div>
                            </div>
                            </div>           
                      </div>
                </div>
            </div>

    </section>


      
    

</body>
    
    
    
<?php include 'includes/footer.php' ?>
    <?php include 'includes/scripts.php' ?>



    
</html>


    <script src="<?php echo base_url() ?>/assets/Chart.bundle.min.js"></script>

<script type="text/javascript">
      function hanyaAngka1(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no1").html("Hanya diperbolekan angka pada bagian ini").show().delay(2000).fadeOut("slow");
                return false;}}
                 function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no").html("Hanya diperbolekan angka pada bagian ini").show().delay(2000).fadeOut("slow");
                return false;}};
        var linechart = document.getElementById('line-chart');
        var chart = new Chart(linechart, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($data_tanggal) ?>, // Merubah data tanggal menjadi format JSON
            datasets: [{
              label: 'Terkonfirmasi Meninggal',
              data: <?php echo json_encode($data_total) ?>,
              borderColor: 'rgba(255, 148, 48, 0.75)',
                        backgroundColor: 'rgba(255, 148, 48, 0.3)',
                        pointBorderColor: 'rgba(255, 148, 48, 0)',
                        pointBackgroundColor: 'rgba(255, 148, 48, 0.9)',
              borderWidth: 2

            }]
          }
        });
                               
</script>