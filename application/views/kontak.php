<?php include 'includes/header.php' ?>
<?php include 'includes/session.php'; ?>

   <body>
       <?php include 'includes/load.php' ?>
       <?php include 'includes/navbar.php' ?>

    <main >

     <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?php echo base_url()?>assets/images/test.jpg" >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center" style="margin-bottom: 50px">
                                <img src="<?php echo base_url()?>assets/img/logo/bkl.png" style="height: 120px;width: 100px;margin-top: 70px">
                                <h2>Kontak</h2>
                                <p style="color: #999">Beranda > Kontak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Request Back End -->
        <!-- slider Area End-->
        <!-- Completed Cases Start -->
        <div class="completed-cases section-padding">
            <div class="container" style="font-family: andalus;font-size:17px">
                <div class="row" >
                    <!-- slider Heading -->
                    <div class="col-xl-7 col-lg-7 col-md-7 wow bounceInUp rounded">
                        <div class="single mb-30" >
                            <h3>Posko Tim Tanggap COVID-19</h3>
                            <div style="height: 100px">

                                <table>
                                    <tr>
                                        <td colspan="3">Dinas Kesehatan Provinsi Bengkulu</td>
                                    </tr>
                                <tr>
                                    <td style="width: 5%"><i class="fas fa-map-marker-alt m-r-10"></i></td>
                                    <td colspan="2"><span> Jl. Indragiri No. 2, Padang Harapan, Bengkulu 38225</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 5%"><i class="fa fa-phone m-r-10"></i></td>
                                    <td colspan="2"><span> (0736) 25236, 23276, 21920 atau 085283798600 </span></td>
                                    <td></td>
                                </tr>                                
                            </table>
                            </div>
                            <tr>
                                    <td style="width: 5%"></td>
                                    <td><a href="tel:085283798600" style="border-radius: 100px;padding: 10px;;box-shadow:1px 1px 10px 0px #1f1885;margin-right: 30px;margin-bottom: 10px" class="btn border-btn mt-2"><i class="fa fa-phone" style="margin-right: 5px"></i>085283798600</a></td>
                                    <td><a href="tel:073652004" style="border-radius: 100px;padding: 10px;;box-shadow:1px 1px 10px 0px #1f1885;margin-right: 30px;margin-bottom: 10px" class="btn border-btn mt-2"><i class="fas fa-map-marker-alt" style="margin-right: 5px"></i>View Map</a></td>
                                </tr>
                                
                        </div>
                    </div>
                    <!-- OwL -->
                    <div class="col-xl-5 col-lg-5 col-md-5 wow bounceInUp rounded" >
                                <img src="<?php echo base_url()?>assets/images/dinkes.jpg" style="box-shadow: 10px 10px 30px 1px #666;width: 100%;margin-right: " alt="">
                             
                      
                       
                    </div>
                </div>
                <hr style="padding-bottom:50px;">
                <div class="row mt-5">
                    <div class="col-md-12 wow bounceInUp rounded" >
                    <h3 >Daftar Rumah Sakit Rujukan</h3>
                    <p style="font-family: andalus;font-size:17px">Berikut ini adalah rumah sakit yang menjadi rujukan untuk pasien dengan status Pasien dalam Pengawasan. Anda harus mengunjungi fasilitas kesehatan terdekat terlebih dahulu (misalnya klinik/rumah sakit umum) sebelum akhirnya dapat dirujuk ke rumah sakit khusus di bawah ini.</p>
                    </div>
                </div>
                <div class="row mb-5">
                     <?php
                        $i=1;
                            try{                                  
                                $stmt = $conn->prepare("SELECT * from  tb_rumahsakit ORDER BY `tb_rumahsakit`.`kdRS` ASC");
                                $stmt->execute();
                                foreach ($stmt as $data) {
                                    
                     ?>
                    <div class="col-md-6 mb-4 wow bounceInUp rounded">
                        <div class="mt-4"> 
                            <h5><?php echo $data['namaRS'] ?></h5>
                            <div style="height: 120px">
                                <table>
                                    <tr>
                                        <td style="width: 5%"><i class="fas fa-map-marker-alt m-r-10"></i></td>
                                        <td colspan="2"><span> <?php echo $data['alamaRS'] ?></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%"><i class="fa fa-phone m-r-10"></i></td>
                                        <td colspan="2"><span> <?php echo $data['noTlp'] ?></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%"><i class="fa fa-envelope m-r-10"></i></td>
                                        <td colspan="2"><span> <?php echo $data['email'] ?></span></td>
                                        <td></td>
                                    </tr>                                
                                </table>
                            </div>
                            <tr>
                                    <td style="width: 5%"></td>
                                    <td><a href="tel:<?php echo $data['noTlp'] ?>" style="border-radius: 100px;padding: 10px;;box-shadow:1px 1px 10px 0px #1f1885;margin-right: 30px;margin-bottom: 10px" class="btn border-btn mt-2"><i class="fa fa-phone" style="margin-right: 5px"></i><?php echo $data['noTlp'] ?></a></td>
                                    <td><a href="<?php echo $data['petaKoordinat'] ?>" style="border-radius: 100px;padding: 10px;;box-shadow:1px 1px 10px 0px #1f1885;margin-right: 30px;margin-bottom: 10px" class="btn border-btn mt-2"><i class="fas fa-map-marker-alt" style="margin-right: 5px"></i>View Map</a></td>
                                </tr>
                        </div>
                    </div>
                    <?php
                            $i++;
                        }}
                        catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                     } ?>
                </div>
            </div>
        </div>
        <!-- Completed Cases end -->

       </div>
    </main>
   <?php include 'includes/footer.php' ?>
    <?php include 'includes/scripts.php' ?>