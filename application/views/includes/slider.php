<!-- slider Area Start-->
  <?php
  $conn = $pdo->open();

  try{        
      $stmx = $conn->prepare("SELECT SUM(terkonfirmasi) as vpositif,SUM(dirawat) as vdirawat, SUM(meninggal) as vmeninggal, SUM(sembuh) as vsembuh FROM `tb_kasus`");
      $stmx->execute();
      $data = $stmx->fetch();
    
  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }
?>
        <div class="slider-area " >
            <!-- Mobile Menu -->
            <div style="height: 400px;" class="single-slider slider-height2 d-flex align-items-center" data-background="<?php echo base_url()?>assets/img/logo/bek.jpg">
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
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-grey hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #111">
                        <div class="icon">
                            <i class="fa fa-certificate "></i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:16px">TERKONFIRMASI</div>
                            <div class="number" style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px">
                                <?php echo $data['vpositif'] ?>
                            </div>
                             
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-blue hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #111">
                        <div class="icon">
                            <i class="fa fa-bed  "></i>
                            
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:16px">DIRAWAT</div>
                              <div class="number" style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px">
                                <?php echo $data['vpositif']-($data['vsembuh']+$data['vmeninggal'])  ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-cyan hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #111">
                        <div class="icon">
                            <i class="fa fa-heartbeat"></i>
                            
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:16px">SEMBUH</div>
                             <div class="number"  style="font-size:30px;margin-top:5px;text-transform: uppercase;padding-top:10px">
                                <?php echo $data['vsembuh'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-expand-effect" style="height:110px;box-shadow:10px 10px 20px 0px #111">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                            
                        </div>
                        <div class="content">
                            <div class="text"  style="font-size:16px">MENGINGGAL</div>
                           <div class="number" style="font-size:25px;margin-top:5px;text-transform: uppercase;padding-top:20px">
                                <?php echo $data['vmeninggal'] ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
       
        <style type="text/css">
            .bg-red {
  background-color: #F44336 !important;
  color: #fff; }
  .bg-red .content .text,
  .bg-red .content .number {
    color: #fff !important; }
    .bg-grey {
  background-color: #9E9E9E !important;
  color: #fff !important;  }
  .bg-grey .content .text,
  .bg-grey .content .number {
    color: #fff !important; }


.bg-blue {
  background-color: #FFC107 !important;
  color: #fff; }
  .bg-blue .content .text,
  .bg-blue .content .number {
    color: #fff !important; }
.bg-cyan {
  background-color: #00BCD4 !important;
  color: #fff; }
  .bg-cyan .content .text,
  .bg-cyan .content .number {
    color: #fff !important; }

 .info-box-3 {
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  height: 80px;
  display: flex;
  cursor: default;
  background-color: #fff;
  position: relative;
  overflow: hidden;
  margin-bottom: 30px; }
  .info-box-3 .icon {
    position: absolute;
    right: 10px;
    bottom: 2px;
    text-align: center; }
    .info-box-3 .icon i {
      color: rgba(0, 0, 0, 0.15);
      font-size: 60px; }
  .info-box-3 .chart {
    margin-right: 5px; }
  .info-box-3 .chart.chart-bar {
    height: 100%;
    line-height: 50px; }
    .info-box-3 .chart.chart-bar canvas {
      vertical-align: baseline !important; }
  .info-box-3 .chart.chart-pie {
    height: 100%;
    line-height: 34px; }
    .info-box-3 .chart.chart-pie canvas {
      vertical-align: baseline !important; }
  .info-box-3 .chart.chart-line {
    height: 100%;
    line-height: 40px; }
    .info-box-3 .chart.chart-line canvas {
      vertical-align: baseline !important; }
  .info-box-3 .content {
    display: inline-block;
    padding: 7px 16px; }
    .info-box-3 .content .text {
      font-size: 13px;
      margin-top: 11px;
      color: #555; }
    .info-box-3 .content .number {
      font-weight: normal;
      font-size: 26px;
      margin-top: -4px;
      color: #555; }

.info-box-3.hover-zoom-effect .icon i {
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease; }

.info-box-3.hover-zoom-effect:hover .icon i {
  opacity: 0.4;
  -moz-transform: rotate(-32deg) scale(1.4);
  -ms-transform: rotate(-32deg) scale(1.4);
  -o-transform: rotate(-32deg) scale(1.4);
  -webkit-transform: rotate(-32deg) scale(1.4);
  transform: rotate(-32deg) scale(1.4); }

.info-box-3.hover-expand-effect:after {
  background-color: rgba(0, 0, 0, 0.05);
  content: ".";
  position: absolute;
  left: 0;
  top: 0;
  width: 0;
  height: 100%;
  color: transparent;
  -moz-transition: all 0.95s;
  -o-transition: all 0.95s;
  -webkit-transition: all 0.95s;
  transition: all 0.95s; }

.info-box-3.hover-expand-effect:hover:after {
  width: 100%; }
        </style>