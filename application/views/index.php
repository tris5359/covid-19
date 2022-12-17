<?php include 'includes/header.php' ?>
<?php include 'includes/session.php' ?>

   <body>
       <?php include 'includes/navbar.php' ?>

    <main>

        <div class="slider-area " >
            <!-- Mobile Menu -->
            <div style="height: 370px;" class="single-slider slider-height2 d-flex align-items-center" data-background="<?php echo base_url()?>assets/img/logo/bek.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12"  >
                            <div class="hero-cap text-center" >
                                <h2 style="font-size: 30px;">BENGKULU TANGGAP COVID-19</h2>
                                <p style="color: #fff;padding-top: 30px; font-family: andalus;">Hubungi Dinkes Provinsi/Call Center Provinsi Bengkulu</p>
                                <div class="row ">
                                  <div class="col-md-3"></div>
                                  <div class="col-md-3 mb-3">
                                  <a href="tel:085283798600" style="border-radius: 100px;padding: 10px;;box-shadow:10px 10px 20px 0px #111;" class="btn border-btn "><i class="fa fa-phone" style="margin-right: 5px"></i>085283798600</a>
                                </div>
                                <div class="col-md-3">
                                <a href="page/kontak" style="border-radius: 100px;padding: 10px;;box-shadow:10px 10px 20px 0px #111" class="btn border-btn "><i class="fa fa-phone" style="margin-right: 5px"></i>Call Center</a>
                                </div>
                                  <div class="col-md-3"></div>

                              </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <marquee direction="left" scrollamount="7" style="background-color: #151B54; height: 30px; overflow: none; font-size: 15px; color: #fff; padding-top: 5px; text-transform: capitalize; font-family: andalus;" ></marquee>

        
            <!-- Mobile Menu -->
            <div class="single-slider  d-flex align-items-center p-t-10" style="background-color: #151B54;margin-top: -10px;padding-top: 10px;font-family: andalus;box-shadow:0px 20px 50px 0px #1f1885">
                <div class="container">
                    <div class="row">
                      <?php 
                        $data = requestApi("https://data.covid19.go.id/public/api/prov.json");
                        $data = json_decode($data, TRUE);

                        $jumlah = count($data['list_data']);
                        $no=1;
                        for ($i=0; $i < $jumlah; $i++) { 
                          $tampil2 = $data['list_data'][$i];
                          if ($tampil2['key']=='BENGKULU') {
                            $tampil3 = $tampil2['jenis_kelamin'];
                          // print_r($tampil3[0]['doc_count']);die();
                             $tampil3 = $tampil2['penambahan'];




                          ?>
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-grey hover-expand-effect" style="height:130px;box-shadow:10px 10px 20px 0px #111">
                              <div class="icon">
                                  <i class="fa fa-certificate "></i>
                              </div>
                              <div class="content">
                                  <div class="number" id="vpositif" style="font-size:30px;margin-top:5px;text-transform: uppercase;">
                                   <?php  echo number_format($tampil2['jumlah_kasus'],  0, '.', '.'); ?>
                                   
                                    <?php
                                    // echo "Laki-laki".number_format($tampil3[0]['doc_count'],  0, '.', '.'); 
                                    // echo "Perempuan".number_format($tampil3[1]['doc_count'],  0, '.', '.'); 
                                    ?>
                                  </div>
                                  <div class="text" style="font-size:16px">TERKONFIRMASI</div>
                                  <?php
                                  $retVal = ($tampil3['positif']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['positif']." Kasus" ;
                                  echo $retVal;
                                  ?>
                                   
                                  
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-blue hover-expand-effect" style="height:130px;box-shadow:10px 10px 20px 0px #111">
                              <div class="icon">
                                  <i class="fa fa-bed  "></i>
                                  
                              </div>
                              <div class="content">
                                    <div class="number" id="vdirawat" style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($tampil2['jumlah_dirawat'],  0, '.', '.'); ?>
                                  </div>
                                  <div class="text" style="font-size:16px">DIRAWAT</div>
                                  <?php
                                  $retVal = ($tampil3['positif']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['positif']." Dirawat" ;
                                  echo $retVal;
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-cyan hover-expand-effect" style="height:130px;box-shadow:10px 10px 20px 0px #111">
                              <div class="icon">
                                  <i class="fa fa-heartbeat"></i>
                                  
                              </div>
                              <div class="content">
                                   <div class="number" id="vsembuh"  style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($tampil2['jumlah_sembuh'],  0, '.', '.'); ?>
                                  </div>
                                  <div class="text" style="font-size:16px">SEMBUH</div>
                                  <?php
                                  $retVal = ($tampil3['sembuh']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['sembuh']." Kasus Sembuh" ;
                                  echo $retVal;
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-red hover-expand-effect" style="height:130px;box-shadow:10px 10px 20px 0px #111">
                              <div class="icon">
                                  <i class="fa fa-heart"></i>
                                  
                              </div>
                              <div class="content">
                                 <div class="number" id="vmeninggal" style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($tampil2['jumlah_meninggal'],  0, '.', '.'); ?>
                                      
                                  </div>
                                  <div class="text"  style="font-size:16px">MENGINGGAL</div>
                                  <?php
                                  $retVal = ($tampil3['meninggal']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['meninggal']." Kasus Meninggal" ;
                                  echo $retVal;
                                  ?>
                              </div>
                          </div>
                      </div>
                          <?php
                        }}
                         ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
       
        

        <!-- We Trusted Start-->
        <div class="we-trusted-area trusted-padding">
            <div class="container">
                <div class="row d-flex align-items-end" >
                    <div class="col-xl-7 col-lg-7">
                        <div class="trusted-img">
                            <img src="<?php echo base_url()?>assets/images/covid.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="trusted-caption">
                           <h2 style="font-family: andalus;font-weight: 200;color: #000" >Apa Itu COVID-19</h2>
                           <p style="font-family: sans-serif;color: #000;font-size: 16px;text-align: justify;">Coronavirus Disease 2019 atau COVID-19 adalah penyakit baru yang dapat menyebabkan gangguan pernapasan dan radang paru. Penyakit ini disebabkan oleh infeksi Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat (pneumonia atau sepsis).</p>
                           <h2 style="font-family: andalus;font-weight: 200;color: #000" >Bagaimana COVID-19 Menular</h2>
                           <p style="font-family: sans-serif;color: #000;font-size: 16px;text-align: justify;">Cara penularan SARS-CoV-2 penyebab COVID-19 ialah melalui kontak dengan droplet saluran napas penderita. Droplet merupakan partikel kecil dari mulut penderita yang mengandung kuman penyakit, yang dihasilkan pada saat batuk, bersin, atau berbicara. Droplet dapat melewati sampai jarak tertentu (biasanya 1 meter).</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- We Trusted End-->
        
            
         <div class="container " style="margin-top:150px;margin-bottom: 100px">

         <!--  <div class="container-table100">
            <div class="wrap-table100" style="width: 100%">
              <div class="table100 ver5 m-b-110">
                <div class="table100-body">
                  <table class="table  dataTable js-basic-example" style="margin-top:-20px !important">
                    <thead>
                      <tr class="row100 head " style="background-color:#001E42" >
                        <th style="width:2%">No</th>
                        <th style="width:25%">Provinsi</th>
                        <th style="width:10%">Kasus Positif</th>
                        <th style="width:10%">Kasus Dirawat</th>
                        <th style="width:10%">Kasus Sembuh</th>
                        <th style="width:13%">Kasus Meniggal</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php 
                        $data = requestApi("https://api.kawalcorona.com/indonesia/provinsi/");
                        $data = json_decode($data, TRUE);

                        $jumlah = count($data);

                        $no=1;
                        for ($i=0; $i < $jumlah; $i++) { 
                          $tampil = $data[$i]['attributes'];
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tampil['Provinsi']; ?></td>
                            <td><?php echo number_format($tampil['Kasus_Posi'],  0, '.', '.'); ?></td>
                            <td><?php echo number_format($tampil['Kasus_Posi']-($tampil['Kasus_Semb']+$tampil['Kasus_Meni']), 0, '.', '.'); ?></td>
                            <td><?php echo number_format($tampil['Kasus_Semb'],  0, '.', '.'); ?></td>
                            <td><?php echo number_format($tampil['Kasus_Meni'],  0, '.', '.'); ?></td>
                          </tr>
                          <?php
                        }
                         ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> -->
           <div class='tableauPlaceholder' id='viz1594151235784' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Be&#47;Bengkulu-COVIDAnalysis&#47;Dashboard1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Bengkulu-COVIDAnalysis&#47;Dashboard1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Be&#47;Bengkulu-COVIDAnalysis&#47;Dashboard1&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1594151235784');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.minWidth='640px';vizElement.style.maxWidth='1060px';vizElement.style.width='100%';vizElement.style.minHeight='747px';vizElement.style.maxHeight='1360px';vizElement.style.height='1360px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.minWidth='640px';vizElement.style.maxWidth='1060px';vizElement.style.width='100%';vizElement.style.minHeight='747px';vizElement.style.maxHeight='1360px';vizElement.style.height='1360px';} else { vizElement.style.width='100%';vizElement.style.height='1077px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
    </div>



        

    </main>
    <?php include 'includes/footer.php' ?>
    <?php include 'includes/scripts.php' ?>
    
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
<!-- <script type="text/javascript">
  $(document).ready(function(){
    dataBengkulu();

  function dataBengkulu(){
    $.ajax({
      url : 'https://api.kawalcorona.com/indonesia/provinsi',
      success : function(data){
        try{
          var json = data;
          var html =[];
          if(json.length > 0 ){
            var i;
            for(i=0; i json.length;i++;){
              var dataProvinsi = json[i];
              var namaProvinsi = dataProvinsi.Provinsi;
              if (namaProvinsi === 'Bengkulu') {
                var kasus = dataProvinsi.Kasus_Posi;
                var sembu = dataProvinsi.Kasus_Semb;
                var mati = dataProvinsi.Kasus_Meni;
                $('#vpositif').html(kasus);
                $('#vsembuh').html(kasus);
                $('#vmeninggal').html(kasus);
              }
            }
          }
        }catch{
          alert('error');
        }
      }
    })
  }
   });
</script> -->