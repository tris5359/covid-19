 <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar" style="font-family:andalus;color:#333;">
            <ul class="nav nav-tabs tab-nav-right" role="tablist" style="padding:5px">
                
            </ul>
            <div class="tab-content" style="font-size:19px">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="demo-settings">
                        <ul class="setting-list">
                        <?php
              $image = (!empty($user['foto'])) ? base_url().'assets/images/'.$user['foto'] : base_url().'assets/images/img2.jpg' ;
              $nama = (!empty($user['nama'])) ? $user['nama'] : $user['instansi'];
              $nama2 = (!empty($user['nama'])) ? '<h3 style="font-size:18px">'.$user['nama'].'</h3>
                        <p style="color:#666;font-weight: 100;font-size:17px;">'.$user['instansi'].'</p>' : '<p style="color:#666;font-weight: 100;font-size:17px;margin-bottom:45px">'.$user['instansi'].'</p>';
              echo '
               <div class="card profile-card">
                        <div class="profile-header" style="background-color:#001E42;box-shadow:0px 5px 10px 1px #777">&nbsp;</div>
                        <div class="profile-body" >
                            <div class="image-area" >
                                <img src="'.$image.'" class="user-image" alt="User Image" style="height:150px;width:150px;border:2px #001E42 solid;">
                            </div>
                            <div class="content-area">
                                <b >'.$nama2.'</b>
                            </div>
                        </div>
                        <div class="menu">
                            <ul class="list"></ul>
                        </div>
                        
              '; ?>
                              <div class="profile-footer" style="position: absolute;background-color:#001E42;box-shadow:5px 0px 10px 1px #555;margin-top:-340px">
                              <a href="<?php echo base_url() ?>covid19/profil" class="btn bg-blue btn-lg waves-effect btn-block" style="margin-top:0px">PROFIL</a>
                            <a href="<?php echo base_url() ?>covid19/kataSandi" class="btn bg-light-blue btn-lg waves-effect btn-block">UBAH KATA SANDI</a>
                            <a style="margin-top:20px" href="<?php echo base_url() ?>covid19/logout" class="btn bg-red btn-lg waves-effect btn-block">KELUAR</a>
                          
            </ul>
          </div>
        </div>
      </div>
    </aside>
        <!-- #END# Right Sidebar -->