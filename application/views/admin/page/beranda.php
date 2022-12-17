<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


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
          <li><a style="color:#444" href="<?php echo base_url() ?>staf"><i class="material-icons">home</i> Beranda</a></li></ol>
     <section class="content">
        <div class="container-fluid">
                    <div style="background-color:#fff;padding:50px 30px;box-shadow:5px 5px 10px 2px #ccc;font-family:andalus;">

            <div class="row">
                  <?php 
                        $data = requestApi("https://api.kawalcorona.com/indonesia/provinsi/");
                        $data = json_decode($data, TRUE);

                        $jumlah = count($data);
                        $no=1;
                        for ($i=0; $i < $jumlah; $i++) { 
                          $tampil2 = $data[$i]['attributes'];
                          if ($tampil2['Provinsi']=='Bengkulu') {
                          ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-grey hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #BBB">
                              <div class="icon">
                                  <i class="fa fa-certificate "></i>
                              </div>
                              <div class="content">
                                  <div class="text" style="font-size:16px">TERKONFIRMASI</div>
                                  <div class="number" id="vpositif" style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px"><?php echo number_format($tampil2['Kasus_Posi'],  0, '.', '.'); ?>
                                  </div>
                                   
                                  
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-blue hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #BBB">
                              <div class="icon">
                                  <i class="fa fa-bed  "></i>
                                  
                              </div>
                              <div class="content">
                                  <div class="text" style="font-size:16px">DIRAWAT</div>
                                    <div class="number" id="vdirawat" style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px"><?php echo number_format($tampil2['Kasus_Posi']-($tampil2['Kasus_Semb']+$tampil2['Kasus_Meni']), 0, '.', '.'); ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-cyan hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #BBB">
                              <div class="icon">
                                  <i class="fa fa-heartbeat"></i>
                                  
                              </div>
                              <div class="content">
                                  <div class="text" style="font-size:16px">SEMBUH</div>
                                   <div class="number" id="vsembuh"  style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px"><?php echo number_format($tampil2['Kasus_Semb'],  0, '.', '.'); ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-red hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #BBB">
                              <div class="icon">
                                  <i class="fa fa-heart"></i>
                                  
                              </div>
                              <div class="content">
                                  <div class="text"  style="font-size:16px">MENGINGGAL</div>
                                 <div class="number" id="vmeninggal" style="font-size:25px;margin-top:5px;text-transform: uppercase;padding-top:20px"><?php echo number_format($tampil2['Kasus_Meni'],  0, '.', '.'); ?>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                          <?php
                        }}
                         ?>
                         <?php 
function requestApi($url){

  $ch = curl_init();

  //set url
  curl_setopt($ch, CURLOPT_URL, $url);


  //aktifkan fungsi transfer nilai yang berupa string
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


  //fungsi setting agar dapat dijalankan pada localhost
  //mematikan ssl verify (https)

  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

  //tampung hasil kedalam varfiabel $output
  $output = curl_exec($ch);

  //tutup curl
  curl_close($ch);

  return $output;
} ?>
                    </div>
            <!-- #END# Hover Expand Effect -->
            <div class="container " style="width: 100%">
           <div class='tableauPlaceholder' id='viz1594151235784' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Be&#47;Bengkulu-COVIDAnalysis&#47;Dashboard1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Bengkulu-COVIDAnalysis&#47;Dashboard1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Be&#47;Bengkulu-COVIDAnalysis&#47;Dashboard1&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1594151235784');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.minWidth='640px';vizElement.style.maxWidth='1060px';vizElement.style.width='100%';vizElement.style.minHeight='747px';vizElement.style.maxHeight='1360px';vizElement.style.height='1360px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.minWidth='640px';vizElement.style.maxWidth='1060px';vizElement.style.width='100%';vizElement.style.minHeight='747px';vizElement.style.maxHeight='1360px';vizElement.style.height='1360px';} else { vizElement.style.width='100%';vizElement.style.height='1077px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
    </div>
        </div>

    </section>

<?php include 'includes/footer.php' ?>

    

</body>

     <?php include 'includes/scripts.php' ?>
     <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url() ?>/assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url() ?>/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/pages/widgets/infobox/infobox-4.js"></script>
    
</html>

