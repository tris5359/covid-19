<?php include 'includes/header.php' ?>

   <body>
       <?php include 'includes/navbar.php' ?>
    <main>


         <div class="single-slider  d-flex align-items-center p-t-10" style="margin-top: 80px;padding-top: 10px;font-family: andalus;">
                <div class="container">
                    <div class="row">
                      <?php 
                        $data = requestApi("https://data.covid19.go.id/public/api/update.json");
                        $data = json_decode($data, TRUE);
                        $total = $data['update']['total'];
                        ?>
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box-3 bg-grey hover-expand-effect" style="height:130px;box-shadow:10px 10px 20px 0px #111">
                              <div class="icon">
                                  <i class="fa fa-certificate "></i>
                              </div>
                              <div class="content">
                                  <div class="number" id="vpositif" style="font-size:30px;margin-top:5px;text-transform: uppercase;">
                                   <?php  echo number_format($total['jumlah_positif'],  0, '.', '.'); ?>
                                   
                                    <?php
                                    // echo "Laki-laki".number_format($tampil3[0]['doc_count'],  0, '.', '.'); 
                                    // echo "Perempuan".number_format($tampil3[1]['doc_count'],  0, '.', '.'); 
                                    ?>
                                  </div>
                                  <div class="text" style="font-size:16px">TERKONFIRMASI</div>
                                  <?php
                                  // $retVal = ($tampil3['positif']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['positif']." Kasus" ;
                                  // echo $retVal;
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
                                    <div class="number" id="vdirawat" style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($total['jumlah_dirawat'],  0, '.', '.'); ?>
                                  </div>
                                  <div class="text" style="font-size:16px">DIRAWAT</div>
                                  <?php
                                  // $retVal = ($tampil3['positif']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['positif']." Dirawat" ;
                                  // echo $retVal;
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
                                   <div class="number" id="vsembuh"  style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($total['jumlah_sembuh'],  0, '.', '.'); ?>
                                  </div>
                                  <div class="text" style="font-size:16px">SEMBUH</div>
                                  <?php
                                  // $retVal = ($tampil3['sembuh']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['sembuh']." Kasus Sembuh" ;
                                  // echo $retVal;
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
                                 <div class="number" id="vmeninggal" style="font-size:30px;margin-top:5px;text-transform: uppercase;"><?php echo number_format($total['jumlah_meninggal'],  0, '.', '.'); ?>
                                      
                                  </div>
                                  <div class="text"  style="font-size:16px">MENGINGGAL</div>
                                  <?php
                                  // $retVal = ($tampil3['meninggal']==0) ? "Tidak Ada Pertambahan" : "+".$tampil3['meninggal']." Kasus Meninggal" ;
                                  // echo $retVal;
                                  ?>
                              </div>
                          </div>
                      </div>
                          <?php
                         ?>
                        
                    </div>
                </div>
            </div>

        <!-- slider Area Start-->               
                    <div class="row" style="position: absolute;z-index: 1;width: 100%;background-color: #fff;padding-left: 50px" >
                        <div class="col-xl-12">
                            <div class="hero-cap " style="justify-content: center;height: 140px;">
                                <p style="color: #333">Sumber data berasal dari Gugus Tugas Percepatan Penanganan COVID-19 
                                    <a style="color: #666" href="https://covid19.go.id/">https://covid19.go.id/</a>
                                </p>
                            </div>
                        </div>
                    </div>
        <!-- slider Area End-->
                
        <!-- Services Details End -->
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