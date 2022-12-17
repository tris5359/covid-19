<?php 
$actual_link = $_SERVER['REQUEST_URI'];
$link2 = str_replace('/COVID-19/', '', $actual_link);
?>
 <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block" style="background-color: #f3f3f3;height: 30px;font-family: andalus">
                   <div class="container-fluid" style="margin-top: -10px">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">   
                                        <li>Temukan kami di :</li>

                                        <li><a data-toggle="tooltip" title="instagram mediacenterbkl" href="https://www.instagram.com/mediacenterbkl/?hl=id"><i class="fab fa-instagram"></i></a></li>
                                        <li><a data-toggle="tooltip" title="twitter mediacenterBKL" href="https://twitter.com/mediacenterBKL?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fab fa-twitter"></i></a></li>
                                        <li><a data-toggle="tooltip" title="facebook mediacenterpemprovbengkulu" href="https://web.facebook.com/mediacenterpemprovbengkulu/?_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky" style="background-color: #151B54;color: #fff;">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3" >
                                <div class="logo" >
                                  <a href="<?php echo base_url() ?>" style="font-family: sail;font-size: 30px;color: #fff !important;"><i style="color: #fff !important;"><b style="color: #fff"><img src="<?php echo base_url()?>assets/img/logo/bkl.png" style="height: 40px;width: 40px">Corona</b></i><i style="color: #FFFF00">Virus</i></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9" >
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a class="<?php echo ($link2=="" ) ? "activemenu" : ''; ?>" href="<?php echo base_url() ?>" >Home</a></li>
                                            <li><a class="<?php echo ($link2=="page/LayananKesehatan") ? "activemenu" : ''; ?>" href="<?php echo base_url() ?>page/LayananKesehatan#!/checkup">Layanan Kesehatan</a></li>
                                            <li><a class="<?php echo ($link2=="peta/PesebaranDunia" || $link2=="peta/PesebaranIndonesia" || $link2=="peta/PetaRasioKerentanan" || $link2=="peta/PesebaranBengkulu") ? "activemenu" : ''; ?>" href="#">Peta Persebaran</a>
                                              <ul class="submenu">
                                                    <li><a href="<?php echo base_url() ?>peta/PesebaranDunia">Peta Persebaran Dunia</a></li>
                                                    <li><a href="<?php echo base_url() ?>peta/PesebaranIndonesia">Peta Persebaran Indonesia</a></li>
                                                    <li><a href="<?php echo base_url() ?>peta/PetaRasioKerentanan">Peta Rasio Kerentanan</a></li>
                                                    <li><a href="<?php echo base_url() ?>peta/PesebaranBengkulu">Peta Persebaran Provinsi Bengkulu</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="<?php echo ($link2=="pencegahan" || $link2=="protokolkesehatan" || $link2=="protokolkesehatan/protokol_isolasi_mandiri" || $link2=="protokolkesehatan/disinfeksi_mandiri" || $link2=="protokolkesehatan/protokol_resto" || $link2=="protokolkesehatan/protokol_umum_di_transportasi_dan_di_area_publik" || $link2=="protokolkesehatan/protokol_psbb" || $link2=="protokolkesehatan/protokol_mall"  || $link2=="berita" || $link2=="page/About") ? "activemenu" : ''; ?>" href="#">Informasi</a>
                                                <ul class="submenu">
                                                    <li><a href="<?php echo base_url() ?>protokolkesehatan">Protokol Kesehatan</a></li>
                                                    <li><a href="<?php echo base_url() ?>pencegahan">Pencegahan</a></li>
                                                    <!--<li><a href="<?php echo base_url() ?>berita">Berita</a></li>-->
                                                    <li><a href="<?php echo base_url() ?>page/About">About</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="<?php echo ($link2=="page/tanyaKami" ) ? "activemenu" : ''; ?>" href="<?php echo base_url() ?>page/tanyaKami">Tanya Kami</a>
                                            </li>
                                            <li><a class="<?php echo ($link2=="page/kontak" ) ? "activemenu" : ''; ?>" href="<?php echo base_url() ?>page/kontak">Kontak</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>      
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
       </div>
        <!-- Header End -->
    </header>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/cssNotif.css">

  <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="z-index:999"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="z-index:999;"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus;color:#fff;">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <style type="text/css">
        .activemenu{
            color: #FFFF00 !important;
            border-bottom: 2px solid #FFFF00;
        }
    </style>