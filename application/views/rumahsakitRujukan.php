<?php include 'includes/header.php' ?>

   <body>
       <?php include 'includes/load.php' ?>
       <?php include 'includes/navbar.php' ?>

    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?php echo base_url()?>assets/img/hero/gallery_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Case Study</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Completed Cases Start -->
        <div class="completed-cases section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_1.png" alt="">
                            <!-- img hover caption -->
                           <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_2.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_3.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>   
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_4.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>   
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_5.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>   
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-cases-img  size mb-30">
                            <img src="<?php echo base_url()?>assets/img/service/completed_case_6.png" alt="">
                            <!-- img hover caption -->
                            <div class="single-cases-cap single-cases-cap2">
                               <h4><a href="case_details.html">Marketing Strategy</a></h4>
                                <p>Completely impact synergistic  mindshare</p>
                           </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <!-- Completed Cases end -->


        <!-- Request Back Start -->
        <div class="request-back-area section-padding30">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="request-content">
                            <h3>Request for  Call Back</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore,</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <!-- Contact form Start -->
                        <div class="form-wrapper">
                            <form id="contact-form" action="#" method="POST">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-box  mb-30">
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-box mb-30">
                                            <input type="text" name="email" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 mb-30">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">Services</option>
                                                <option value="">Services-1</option>
                                                <option value="">Services-2</option>
                                                <option value="">Services-3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <button type="submit" class="send-btn">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>     <!-- Contact form End -->
                </div>
            </div>
        </div>
        <!-- Request Back End -->

    </main>
  <?php include 'includes/footer.php' ?>
    <?php include 'includes/scripts.php' ?>