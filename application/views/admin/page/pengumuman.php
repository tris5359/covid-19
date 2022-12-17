<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/ifonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <?php
  $conn = $pdo->open();

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
           <li><a style="color:#999;font-weight: 350">  Pengumuman</a></li>
      </ol>
    <section class="content" style="margin-bottom:23px">
        <div class="container-fluid">
            
                    <div class="card">
                        <div class="header" style="margin-bottom:-30px">
                            <h2 style="font-size: 25px;margin-top: 8px; color: black;border-left: 5px solid #1a468f; padding-left: 5px;font-size:25px;margin-left:10px;font-family:andalus;text-transform: capitalize;">
                                Pengumuman
                            </h2>
                        </div>
                        <div class="body" >
                                <a style="margin-bottom:-50px;margin-left: 30px;width:150px" href="#tambahstaf" class="btn btn-default waves-effect m-b-15" type="button" data-toggle="modal" ><b><i class="material-icons"  >add</i>TAMBAH</b></a>

                                  <div class="container-table100">
                                    <div class="wrap-table100" style="width: 100%">
                                      <div class="table100 ver5 m-b-110">
                                      <div class="table100-body">
                                <table class="table  dataTable js-basic-example" style="margin-top:-20px !important">
                                    <thead>
                                        <tr class="row100 head " style="background-color:#001E42" >
                                            <th style="width:2%">No</th>
                                            <th style="width:25%">Judul Pengumuman</th>
                                            <th style="width:40%">Isi Pengumuman</th>
                                            <th style="width:10%">Tanggal Publish</th>
                                            <th style="width:10%">Sasaran</th>
                                            <th style="width:13%">Alat</th>
                                        </tr>
                                    </thead>

                                    <tbody >
                                <?php
                                $i=1;
                                try{                                  
                                   $stmt = $conn->prepare("SELECT * from tb_pengumuman ORDER BY kdPengumuman DESC");
                                   $stmt->execute();
                                   foreach ($stmt as $data) {                                    
                                     ?>
                            
                                        <tr class="row100 body">
                                            <td style="width:2%;text-align:center;font-size:15px">
                                              <?php echo $i ?>
                                            </a>
                                            </td>

                                            <td style="width:25%;font-size:15px"><?php echo (!empty($data['judulPengumuman'])) ? $data['judulPengumuman'] : '<p> tidak ada judul </p>' ?></td>
                                            <td style="width:40%;font-size:15px"><?php echo (!empty($data['pengumuman'])) ?  $data['pengumuman'] : '<p style="color:red;"><i> tidak ada isi pengumuman </i></p>' ?></td>
                                            <td style="width:10%;font-size:15px"><?php echo (!empty($data['tglPengumuman']))?  date('d-m-Y', strtotime($data['tglPengumuman'])) : '' ?></td>
                                            <td style="width:10%;font-size:15px"><?php echo (!empty($data['tujuanInformasi'])) ?  $data['tujuanInformasi'] : '<p style="color:red;"><i> No telpon tidak ada </i></p>' ?></td>
                                            

                                            <td style="width:13%;text-align:center">
                                            <a style="margin:0px;padding:3px 10px" href="#ubahstaf<?php echo $data['kdPengumuman'] ?>" class="btn bg-orange waves-effect m-b-15" type="button"  data-id="<?php echo $data['kdPengumuman'] ?>" data-toggle="modal" ><i class="material-icons" >edit</i></a>
                                            <a style="margin:0px;padding:3px 10px"  href="#hapusstaf<?php echo $data['kdPengumuman'] ?>" class="btn bg-red waves-effect m-b-15" type="button" data-id="<?php echo $data['kdPengumuman'] ?>" data-toggle="modal" ><i class="material-icons" >delete</i></a>
                                            </td>
                                        </tr>
                                        <!-- modal Ubah data staf-->
                                        <div class="modal fade" id="ubahstaf<?php echo $data['kdPengumuman'] ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">UBAH PENGUMUMAN <p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                  <div class="row m-t-40" ></div>
                                                   <form id="validation" method="POST"  action="<?php echo base_url()?>staf/editPengumuman" enctype="multipart/form-data" class="m-l-20" >
                                                    

                                                    <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Judul Pengumuman<span class="text-danger">*</span></label> 
                                                          <input type="text" name="nama" class="hidden" value=" <?php echo (!empty($stf['nama'])) ? $stf['nama'] :  $stf['NIP']; ?>">
                                                          <input type="text" name="kdPengumuman" class="hidden" value=" <?php echo $data['kdPengumuman'] ?>">
                                                          <div class="form-line">
                                                          <textarea name="judul" id="judul"  cols="10" rows="3" style="border:1px solid #ddd; padding-left:5px" placeholder="Judul Pengumuman" class="form-control" required>  <?php echo (!empty($data['judulPengumuman'])) ? $data['judulPengumuman'] : ''; ?></textarea></div>

                                                          </div>
                                                          <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px;,"  >
                                                          <label for="alamat" class="text-black">Isi Pengumuman<span class="text-danger">*</span></label> 
                                                          
                                                          <div class="form-line">

                                                          <textarea  name="abstrak" style="border:1px solid #ddd; padding-left:5px" id="tiny"  cols="10"  class="form-control" placeholder="Isi Pengumuman" required><?php echo (!empty($data['pengumuman'])) ? $data['pengumuman'] : ''; ?></textarea>
                                                        </div>
                                                          </div>
                                                           <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px;,"  >
                                                                <div class="form-group">
                                                                  <label for="pos" class="text-black">Sasaran Pengumuman </label><br>
                                                                    <?php $agm=(!empty($data['tujuanInformasi'])) ? $data['tujuanInformasi']  : '';
                                                                 
                                                                    $a1 = $agm=='Dosen' ? "checked" : "1";
                                                                    $a2 = $agm=='Mahasiswa' ? "checked" : "1";
                                                                    $a3 = $agm=='Semua Pengguna' ? "checked" : "1";
                                                                  echo '
                                                                    <input value="Dosen" name="sasaran" type="radio" class="with-gap radio-col-indigo" id="agm'.($i+$i).'" '.$a1.' >
                                                                    <label for="agm'.($i+$i).'" class="m-r-30">Dosen</label>
                                                                    <input value="Mahasiswa" name="sasaran" type="radio" id="agm2'.$i.'" class="with-gap radio-col-indigo"  '.$a2.' >
                                                                    <label for="agm2'.$i.'" class="m-r-30">Mahasiswa</label>
                                                                    <input value="Semua Pengguna" name="sasaran" type="radio" id="agm3'.$i.'" class="with-gap radio-col-indigo"  '.$a3.'>
                                                                    <label for="agm3'.$i.'">Semua Pengguna</label>';
                                                                      ?>
                                                                </div >
                                                              </div>
                                                          
                                                          <div>

                                                                

                                                             

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
                                      <!--end modal Ubah data staf -->
                                        <!-- modal hapus data staf -->
                                        <div class="modal fade" id="hapusstaf<?php echo $data['kdPengumuman'] ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title nama" id="defaultModalLabel">HAPUS PENGUMUMAN!</h4>
                                                    </div>
                                                    <div class="modal-body clearfix" style="text-align:center;">
                                                        <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                                                        <p>Apa anda ingin menghapus pemumuman</p>
                                                        <span><b style="font-size:23px">"<?php echo (!empty($data['judulPengumuman'])) ? $data['judulPengumuman'] : 'Nomor'.$i?>"</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a href="<?php echo base_url("staf/hapusPengumuman?kd=".$data['kdPengumuman'])?> " type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                                                        <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end modal hapus data staf-->                                 
                                    <?php
                                    $i++;
                                  }}
                          catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                             }
                             
                             ?>
                             </tbody>
                                </table>
                                 <!-- modal tambah akun staf -->
                                        <div class="modal fade" id="tambahstaf" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="defaultModalLabel">TAMBAH PENGUMUMAN<p class="nama"></p></h4>
                                                  </div>
                                                  <div class="modal-body clearfix">
                                                   <form id="validation" method="POST"  action="<?php echo base_url()?>staf/tambahPengumuman" enctype="multipart/form-data" class="m-l-20" >
                                                      <div class="row m-t-40" ></div>
                                                    <input type="text" name="nama" class="hidden" value=" <?php echo (!empty($stf['nama'])) ? $stf['nama'] :  $stf['NIP']; ?>">

                                                    <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px"  >
                                                          <label for="alamat" class="text-black">Judul Pengumuman<span class="text-danger">*</span></label> 
                                                          
                                                          <div class="form-line">
                                                          <textarea name="judul" id="judul"  cols="10" rows="3" style="border:1px solid #ddd; padding-left:5px" class="form-control" placeholder="Judul Pengumuman" onKeyUp="textCounter()" required></textarea></div>

                                                          </div>
                                                          <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px;,"  >
                                                          <label for="alamat" class="text-black">Isi Pengumuman<span class="text-danger">*</span></label> 
                                                          
                                                          <div class="form-line">

                                                          <textarea  name="abstrak" style="border:1px solid #ddd; padding-left:5px" id="tiny"  cols="10"  class="form-control" placeholder="Isi Pengumuman" required></textarea>
                                                        </div>
                                                          </div>
                                                           <div class="form-group row" style="width:96%; margin-left:2px; margin-bottom:30px;,"  >
                                                                <div class="form-group">
                                                                  <label for="pos" class="text-black">Sasaran Pengumuman </label><br>
                                                                    <input value="Dosen" name="sasaran" type="radio" class="with-gap radio-col-indigo" id="1" required>
                                                                    <label for="1" class="m-r-30">Dosen</label>
                                                                    <input value="Mahasiswa" name="sasaran" type="radio" id="2" class="with-gap radio-col-indigo" required>
                                                                    <label for="2" class="m-r-30">Mahasiswa</label>
                                                                    <input value="Semua Pengguna" name="sasaran" type="radio" id="3" class="with-gap radio-col-indigo" required>
                                                                    <label for="3">Semua Pengguna</label>

                                                                </div >
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
                                      <!--end modal tambah akun staf -->
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
    <?php include 'includes/scriptslihatpass.php' ?>



    
</html>


<script type="text/javascript">
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
                function hanyahuruf11(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
                $("#pesan_text11").html("Pada nama tidak diperbolekan menggunakan angka").show().delay(2000).fadeOut("slow");
                return false;}};
                function hanyaAngka11(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no11").html("Hanya diperbolekan angka pada nomor telepon").show().delay(2000).fadeOut("slow");
                return false;}}
                function hanyahuruf22(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
                $("#pesan_text22").html("Pada nama tidak diperbolekan menggunakan angka").show().delay(2000).fadeOut("slow");
                return false;}};
                function hanyaAngka22(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no22").html("Hanya diperbolekan angka pada nomor telepon").show().delay(2000).fadeOut("slow");
                return false;}}

  function hidedsn(evt) {

    $('#lihatdataDsn').html('<a class="btn btn-primary waves-effect right" role="button" data-toggle="collapse" href="#dataStaf" id="btn22" onclick="seedsn()" aria-expanded="false" aria-controls="dataStaf">TAMPILKAN FORM</a>');
  }

  function seedsn(evt) {

    $('#lihatdataDsn').html('<a class="btn btn-primary waves-effect right" role="button" data-toggle="collapse" href="#dataStaf" id="btn11" onclick="hidedsn()" aria-expanded="false" aria-controls="dataStaf">SEMBUNYIKAN FORM</a>');
  }

document.getElementById("userstaf").oninput = () => {
  const input = document.getElementById('userstaf');
  const output = document.getElementById('NIPstaf');

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
  
           var form2 = $('#validation2').show();
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
    var form3 = $('#validation3').show();
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
    });  
document.getElementById("userstafubah").oninput = () => {
  const input2 = document.getElementById('userstafubah');
  const output2 = document.getElementById('NIPstafubah');

  output2.value = input2.value;
};                  
                               
</script>