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
           <li><a style="color:#999;font-weight: 350">  Forum Tanya Jawab</a></li>
      </ol>
    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;text-transform: capitalize;">
                                Forum Tanya Jawab
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

                                  <div class="container-table100" >
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 " >
                                      <div class="table100-body" >
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important" >
                                    <thead>
                                        <tr class="row100 head" style="background-color:#001E42">
                                            <th style="width:1%">No</th>
                                            <th style="width:15%">Penanya</th>
                                            <th style="width:30%">Pertanyaan</th>
                                            <th style="width:5%">Tanggal</th>
                                            <th style="width:5%">waktu</th>
                                            <th style="width:10%">Tanggapan</th>
                                            <th style="width:20%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from  tb_tanyakami ORDER BY `tb_tanyakami`.`kdtanya` DESC");
                                   $stmt->execute();
                                   foreach ($stmt as $data) {
                                     $status = ($data['tanggapan']!='') ? '<span class="label label-success" style="padding:8px 8px;">ada</span>' : '<span class="label label-danger" style="padding:8px 8px;margin-top:5px">Belum ada</span>';
                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:1%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:15%;font-size:15px"><?php echo (!empty($data['namaLengkap'])) ? $data['namaLengkap'] : '<p> - </p>' ?></td>
                                            <td style="width:30%;font-size:15px"><?php echo (!empty($data['isi'])) ?  $data['isi'] : '<p style="color:red;"><i> Nama belum ada </i></p>' ?></td>
                                            <td style="width:5%;font-size:15px"><?php echo (!empty($data['tgl'])) ?  $data['tgl'] : '<p style="color:red;"><i> No telpon tidak ada </i></p>' ?></td>
                                            <td style="width:5%;font-size:15px"><?php echo (!empty($data['waktu'])) ?  $data['waktu'] : '<p style="color:red;"><i> No telpon tidak ada </i></p>' ?></td>
                                            
                                            <td style="width:10%;"><?php echo '<div style="margin-top:5px">'.$status.'</div>' ?></b></td>
                                            <td style="width:15%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubah<?php echo $data['kdtanya'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-toggle="modal" ><i  class="material-icons" >forum</i> </a>
                                            <button style="margin:0px;padding:3px 10px" data class="btn bg-red waves-effect m-b-15" type="button" data-toggle="modal"  data-target="#hapus<?php echo $data['kdtanya'] ?>" ><i class="material-icons" >delete</i> </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="ubah<?php echo $data['kdtanya'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <form  method="POST"  action="<?php echo base_url()?>covid19/Tanggapi" enctype="multipart/form-data">
                                                      <input type="hidden" name="kdtanya" value="<?php echo $data['kdtanya']?>">
                                                      <input type="hidden" name="nama" value="<?php echo $data['namaLengkap']?>">
                                                      <input type="hidden" name="email" value="<?php echo $data['email']?>">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Menanggapi Pertanyaan Forum</h4>
                                                        
                                                    </div>
                                                    
                                                    <div class="modal-body">  
                                                      <span id="idHolder"></span>
                                                       <pre style="margin-bottom:-5px"><strong>Tanggapan yang diberikan akan ditampilkan dalam forum dan dikirim ke dalam email pengaju pertanyaan</strong></pre>
                                                        <textarea  name="komentar" placeholder="Isi Tanggapan Pertanyaan yang diajukan forum"><?php echo (!empty($data['tanggapan'])) ? $data['tanggapan'] : ''?></textarea>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="revisi">SIMPAN</button>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal hapus -->
                                        <div class="modal fade" id="hapus<?php echo $data['kdtanya'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS DATA!</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus Pertanyaan</p>
                                                        <p style="font-size:16px;font-family: andlaus;color:#000;">"<?php echo (!empty($data['isi'])) ? $data['isi'] : ''?>"</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("covid19/hapusTanya?kdtanya=".$data['kdtanya'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus -->                                     
                                  
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

