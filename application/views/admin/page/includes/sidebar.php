<?php 
$actual_link = $_SERVER['PATH_INFO'];
$link2 = $actual_link;
?>

<aside id="leftsidebar" class="sidebar" >
            <!-- User Info -->
            <div class="user-info">
                    <p align="center"><a href="#"><img src="<?php echo base_url() ?>assets/img/logo/bkl.png"  width="80"></a></p>
                    <h5 align="center" class="centered" style="color:#ccc">PROVINSI BENGKULU</h5>   
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list sidebar-menu">
                    <li class="header">MENU</li>
                    <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/beranda" class="<?php echo ($link2=="/covid19/beranda") ? "active" : ''; ?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="hov">
                        <a href="javascript:void(0);" class="menu-toggle  <?php echo ($link2=="/covid19/Positif" || $link2=="/covid19/Sembuh" || $link2=="/covid19/Meninggal" || $link2=="/covid19/ODP" || $link2=="/covid19/PDP") ? 'active toggled" style="background-color: #23395d"' : '"'; ?>>
                            <i class="material-icons">content_paste</i>
                            <span>Kasus</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() ?>covid19/Positif" class="<?php echo ($link2=="/covid19/Positif") ? "active" : ''; ?>">Konfirmasi Positif</a>  
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>covid19/Sembuh" class="<?php echo ($link2=="/covid19/Sembuh" ) ? "active" : ''; ?>">Konfirmasi Sembuh</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>covid19/Meninggal" class="<?php echo ($link2=="/covid19/Meninggal" ) ? "active" : ''; ?>">Konfirmasi Meninggal</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>covid19/ODP" class="<?php echo ($link2=="/covid19/ODP" ) ? "active" : ''; ?>">ODP</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>covid19/PDP" class="<?php echo ($link2=="/covid19/PDP" ) ? "active" : ''; ?>">PDP</a>
                            </li>
                           </ul>
                    </li>
                    <!--<li class="hov">
                        <a href="javascript:void(0);" class="menu-toggle sub-menu">
                            <i class="material-icons">assignment</i>
                            <span>Pengajuan Judul</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="#">Judul</a></li>
                               <li>
                                 <a href="#">Revisi Judul</a>
                              </li>
                           </ul>
                    </li>-->
                    <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/Wilayah" class="<?php echo ($link2=="/covid19/Wilayah" || $link2=="/covid19/Kecamatan" || $link2=="/covid19/Desa") ? "active" : ''; ?>">
                            <i class="material-icons">language</i>
                            <span>Wilayah</span>
                        </a>
                    </li>
                    <?php 
                    if ($user['hakAkses']==1) {?>
                    <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/Operator" class="<?php echo ($link2=="/covid19/Operator" || $link2=="/covid19/dataOperator") ? "active" : ''; ?>">
                            <i class="material-icons">support_agent</i>
                            <span>Operator</span>
                        </a>
                    </li>

                        <?php
                     } 
                      ?>
                    
                    <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/forum" class="<?php echo ($link2=="/covid19/forum") ? "active" : ''; ?>">
                            <i class="material-icons">forum</i>
                            <span>Tanya Jawab</span>
                        </a>
                    </li> 
                    <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/FAQ" class="<?php echo ($link2=="/covid19/FAQ" || $link2=="/covid19/veiwDetailFAQ") ? "active" : ''; ?>">
                            <i class="material-icons">comment</i>
                            <span>FAQ</span>
                        </a>
                    </li>
                     <li    class="hov" >
                        <a href="<?php echo base_url() ?>covid19/kontak" class="<?php echo ($link2=="/covid19/kontak") ? "active" : ''; ?>">
                           <i class="material-icons">local_phone</i>
                            <span>kontak</span>
                        </a>
                    </li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>


        <style type="text/css">
            .disabled1{
            margin: 7px 0 7px 5px;
          color: #555;
          font-size: 13px;
          overflow: hidden;
            padding-left: 43px;
            background-color: #121d30;
            margin: 0px;
            padding-top: 7px;
          padding-bottom: 7px;
          cursor: not-allowed;
            }
        </style>