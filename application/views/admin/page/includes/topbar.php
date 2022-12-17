<!-- Top Bar -->
    <nav class="navbar" style="background-color:#001E42">

    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
               
        <a href="<?php echo base_url() ?>"class="navbar-brand"  style="font-family: sail;font-size: 30px;color: #fff !important;"><i style="color: #fff !important;"><b style="color: #fff">Corona</b></i><i style="color: #FFFF00">Virus</i></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown" >
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">1</span>
                        </a>
                        <ul class="dropdown-menu" style="margin-top:15px !important;">
                            <li class="header" >NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    
                    <?php
              $image = (!empty($user['foto'])) ? base_url().'assets/images/'.$user['foto'] : base_url().'assets/images/img2.jpg';
              $nama = (!empty($user['nama'])) ? $user['nama'] : $user['NIP'];
              $nama2 = (!empty($user['nama'])) ? '<b>'.$user['nama'].'</b>
                        <small>'.$user['instansi'].'</small>' : $user['instansi'];
              echo '
                <li  style="font-family : andalus; margin-right:-20px;margin-left:20px">
                  <a href="#" class="js-right-sidebar" data-toggle="dropdown" style="transition: 0.5s;">
                    <img src="'.$image.'"  style="height:30px;width:30px;border-radius:30px" class="user-image" alt="User Image">
                    <p style="text-transform: capitalize;float:right;padding-left:5px;padding-top:5px">'.$nama.'</p>
                  </a>
                  <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons" style="padding-top:3px">more_vert</i></a></li>
                  </li>
              ';
          ?>
        
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->