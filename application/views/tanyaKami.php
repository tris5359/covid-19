<?php include 'includes/header.php' ?>
<?php include 'includes/session.php' ?>

   <body>
       <?php include 'includes/load.php' ?>
       <?php include 'includes/navbar.php' ?>

    <!-- slider Area Start-->
    <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?php echo base_url()?>assets/images/test.jpg" >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center" style="margin-bottom: 50px">
                                <img src="<?php echo base_url()?>assets/img/logo/bkl.png" style="height: 120px;width: 100px;margin-top: 70px">
                                <h2>Tanya Kami</h2>
                                <p style="color: #999">Beranda > Tanya Kami
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Request Back End -->
        <!-- slider Area End-->
        <!-- Completed Cases Start -->
    <div class="container " >
        <div class="text-center">
            <h2 style="padding:43px;"></h2>
        </div>
        <div style="border: 2px solid #ccc;border-radius: 10px;margin-bottom: 90px" class="fonttexts">
<ul class=" nav nav-pills overflow-auto  p-0 py-3"  style="border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom:  2px solid #ccc;background-color: #f3f3f3">
  <li class="ml-30" ><a class="active nav-link  nav-faq m-1 "  data-toggle="tab" href="#FAQ">FAQ</a></li>
  <li ><a class="nav-link  nav-faq m-1" data-toggle="tab" href="#forum">Forum Tanya Jawab</a></li>
</ul>

<div class="tab-content " >
  <div id="FAQ" class="tab-pane fade show active">
    <div class="pl-20 mb-50 pt-3 pb-3" style="border-bottom:  2px solid #ccc;;color: #fff;" data-background="<?php echo base_url()?>assets/images/test.jpg" >
        Pertanyaan yang sering ditanyakan mengenai COVID-19.
    </div>
    <div class="row " style="width: 100%;margin-left: 0px">
                <div class="col-md-3 card nav nav-pills overflow-auto mb-4 p-0 py-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="border:none">
                     <?php
                        $i=1;
                            try{                                  
                                $stmt = $conn->prepare("SELECT * from  tb_headerfaq ORDER BY `tb_headerfaq`.`kdHeader` ASC");
                                $stmt->execute();
                                foreach ($stmt as $data) {
                                    
                     ?>
                    <a class="nav-link <?php echo ($i==1) ? 'active' : '' ; ?> nav-faq m-1" data-toggle="tab" data-toggle="tab" href="#v-<?php echo $data['kdHeader'] ?>"><?php echo $data['judul'] ?></a>
                     <?php
                            $i++;
                        }}
                        catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                     } ?>
                </div>
                <div class="col-md-9 tab-content" >
                    <?php
                        $i=1;
                            try{                                  
                                $stmt = $conn->prepare("SELECT * from  tb_headerfaq ORDER BY `tb_headerfaq`.`kdHeader` ASC");
                                $stmt->execute();
                                foreach ($stmt as $data) {
                                  $cek =  ($i==1) ? 'show active' : '';
                                echo '<div class="tab-pane fade '.$cek.' " id="v-'.$data['kdHeader'].'">
                                    <h3 style="padding-bottom:24px;">'.$data['judul'].'</h3>';
                                
                     ?>
                        <?php
                        $j=1;
                            try{                                  
                                $stmt = $conn->prepare("SELECT * from   tb_isifaq where kdHeader=:kdHeader ORDER BY `tb_isifaq`.`kdIsi` ASC");
                                $stmt->execute(['kdHeader'=>$data['kdHeader']]);
                                foreach ($stmt as $data2) {
                                    
                     ?>
                                                <div class="card">
                            <div class="card-header" style="padding: 0px" id="heading-<?php echo $i.''.$j ?>">
                                <button class="btn-faq collapsed faq-responsive card-header " style="width: 100%;padding:25px 25px" data-toggle="collapse" data-target="#collapse-<?php echo $i.''.$j ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i.''.$j ?>">
                                <?php echo $data2['judulisi'] ?>
                                </button>
                            </div>
                            <div style="text-align: justify;" id="collapse-<?php echo $i.''.$j ?>" class="collapse"  aria-labelledby="heading-<?php echo $i.''.$j ?>">
                                <div class="card-body"><?php echo $data2['isi'] ?></div>
                            </div>
                        </div>
                     <?php
                            $j++;
                                }}
                        catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                     } ?>
                     <?php
                     echo '</div>';
                            $i++;

                        }}
                        catch(PDOException $e){
                             echo "There is some problem in connection: " . $e->getMessage();
                     } ?>
                        
            </div>
        </div>
                        
  </div>
  <div id="forum" class="tab-pane fade">
     <section class="contact-section" style="margin-top: -7%;">
            <div class="container">
                    <div class="col-12 mb-5">
                        <h2 class="contact-title text-center m-b-10"><b >Forum Tanya Jawab</b></h2>
                    </div>
                        <form class="form-contact contact_form" action="<?php echo base_url() ?>page/insertTanya" method="post"  >
                            <div class="row" style="margin-left: 5%;margin-right: 5%;font-size: 20px">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" placeholder="Alamat Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" Masukkan Pertanyaan Anda " required></textarea>
                                    </div>
                                </div>
                                <div class="form-group mt-3 ml-3">
                                <button type="submit" class="button button-contactForm boxed-btn" name="kirim">Kirim Pertanyaan</button>
                            </div>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-12">
                                    <h2 class="contact-title text-center mt-5 mb-2"><b >Respon Tanya Jawab</b></h2>
                                    <p class="mb-5">Respon Tanya Jawab, akan dikirimkan ke email yang anda berikan ketika mengajukan pertanyaan. dan pertanyaan yang telah di tanggapi oleh Moderator akan di tampilkan pada forum tanya jawab
                                    </div>  
                                    <?php 
                                    try{

                                        $stmt = $conn->prepare("SELECT * FROM  tb_tanyakami where tanggapan <> '' ORDER BY `tb_tanyakami`.`kdtanya` DESC");
                                        $stmt->execute();
                                         foreach ($stmt as $row) {
                                    ?>

                                    <div class="col-md-12 mb-2" id="list_respon_tanya_jawab">
                                        <div id="postsList">
                                            <div class="list_komentar" data-background="<?php echo base_url()?>assets/images/test.jpg">
                                                <div class="nama_komentar">Anonim_<?php echo $row['kdtanya'] ?></div>
                                                <div class="tgl_komentar"><?php echo $row['tgl'] ?> <?php echo $row['waktu'] ?></div>
                                                <div class="isi_komentar"><?php echo $row['isi'] ?></div>
                                                <div class="jawab"><div style="background-color: #ccc;width: 100%;border-bottom: 2px solid #ccc;padding: 5px 0px 5px  10px">Tanggapan </div><div style="padding: 10px"><?php echo $row['tanggapan'] ?></div></div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php } 
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    } ?>
                                   
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
        </section>
  </div>
</div>
</div>
        
    </div>
    <!-- ================ contact section end ================= -->

    
  <?php include 'includes/footer.php' ?>
    <?php include 'includes/scripts.php' ?>
        
    <style type="text/css">
        
        .fonttexts div,h3{
            font-family: andalus;
        }
    </style>