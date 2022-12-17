<div class="modal fade" id="add" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">TAMBAH DATA</h4>
                        </div>
                        <div class="modal-body">
                        <div class="demo-masked-input">
                            <form id="wizard_with_validation" method="POST"  action="pr_profiledit.php" enctype="multipart/form-data">
                                    <div class="row" style="margin-top:30px">
                                       <div class="col-md-0"></div>
                                        <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_depan" class="text-black">Nama <span class="text-danger">*</span></label>
                                            <div class="form-line">
                                            <input onkeypress="return hanyahuruf(event)" id="nama" name="nama" type="text" class="form-control" placeholder="Nama" <?php echo (!empty($dsn['nama'])) ? 'value="'.$dsn['nama'].'"' : 'placeholder="Nama"'; ?>  required>
                                            </div>
                                              <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                          </div>
                                          </div>
                                          <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="tmplahir" class="text-black">Prodi<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" <?php echo (!empty($dsn['prodi'])) ? 'value="'.$dsn['prodi'].'"' : 'placeholder="Prodi"'; ?> required>
                                        </div>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="tmplahir" class="text-black">Tempat Lahir<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" class="form-control" id="tmplahir" name="tmplahir" placeholder="Tempat Lahir"  <?php echo (!empty($dsn['tempat'])) ? 'value="'.$dsn['tempat'].'"' : 'placeholder="Tempat Lahir"'; ?> required>
                                        </div>
                                      </div>
                                      </div>                                      
                                      <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="tmplahir" class="text-black">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                         <input type="date" class="form-control" id="tgllahir"  name="tgllahir" value="<?php echo (!empty($dsn['tgl'])) ? $dsn['tgl'] : ' '; ?>" required>
                                         </div >
                                      </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="daerah" class="text-black">Jenis Kelamin <span class="text-danger">*</span>
                                        <?php $jk=(!empty($dsn['jk'])) ? 'value="'.$dsn['jk'].'"'  : 'value="0"';
                                       
                                          $lklk = $jk=='value="Laki-Laki"' ? "checked" : "1";
                                          $prm = $jk=='value="Perempuan"' ? "checked" : "1";
                                        echo '
                                        </label><br>
                                            <input type="radio" name="jk" id="male" value="2" class="with-gap radio-col-indigo" '.$lklk.' required>
                                            <label for="male" >Laki - Laki</label>

                                            <input value="3" type="radio" name="jk" id="female" class="with-gap radio-col-indigo" '.$prm.' required>
                                            <label for="female" class="m-l-20">Perempuan</label>';
                                            ?>
                                      </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com"  <?php echo (!empty($dsn['email'])) ? 'value="'.$dsn['email'].'"' : 'placeholder="Ex: example@example.com"'; ?>  required>
                                            </div>
                                      </div></div>
                                      <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="no_tlp" class="text-black">No Telepon <span class="text-danger">*</span></label>
                                        <div class="form-line">
                                                <input onkeypress="return hanyaAngka(event)" type="text" class="form-control mobile-phone-number"  id="no_tlp" name="no_tlp" placeholder="Ex: +00 (000) 0000-0000"  <?php echo (!empty($dsn['hp'])) ? 'value="'.$dsn['hp'].'"' : 'placeholder="Ex: +00 (000) 0000-0000"'; ?> required>
                                            </div >
                                            <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                      </div>
                                    </div></div>
                                      <div class="form-group row" style="width:100%; margin-left:2px; margin-bottom:100px" required>
                                          <label for="alamat" class="text-black">Alamat<span class="text-danger">*</span></label>
                                          <div class="form-line">
                                          <textarea style="border:1px solid #ccc" name="alamat" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Alamat" required><?php echo (!empty($dsn['alamat'])) ? $dsn['alamat'] : ''; ?></textarea>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer" style="position:relative">
                            <button  style="position:relative" ></button>
                            <button  style="position:relative" ></button>
                        </div>
                        <div style="background-color: #ddd;height: 60px; margin-top:-50px;position:relative">
                          <button type="submit" style="position:relative;float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                            <button type="button" style="position:relative" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                        </div></form>
                        </div>
                                
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="detail" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">DETAIL NAMA MHS!</h4>
                        </div>
                        <div class="modal-body" style="text-align:center;">
                            <i class="material-icons" style="font-size:170px;color:#F44336">block</i>
                            <p>Anda menolak judul-judul yang di ajukan oleh <b><?php echo $mhs['nama'] ?></b>?</p>
                        </div>
                        <div class="modal-footer">
                        <a href="pr_judultolak.php?idmhs=<?php echo $_GET['idmhs'] ?>&idjdl=<?php echo $_GET['idjdl'] ?>" type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">TOLAK</a>
                            <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ubah" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">UBAH DATA <p class="nama"></p></h4>
                        </div>
                        <div class="modal-body">
                        <div class="demo-masked-input">
                            <form id="wizard_with_validation" method="POST"  action="pr_profiledit.php" enctype="multipart/form-data">
                                    <div class="row" style="margin-top:30px">
                                       <div class="col-md-0"></div>
                                        <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_depan" class="text-black">Nama <span class="text-danger">*</span></label>
                                            <div class="form-line">
                                            <input onkeypress="return hanyahuruf(event)" id="nama" name="nama" type="text" class="form-control" placeholder="Nama" <?php echo (!empty($dsn['nama'])) ? 'value="'.$dsn['nama'].'"' : 'placeholder="Nama"'; ?>  required>
                                            </div>
                                              <span id="pesan_text" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                          </div>
                                          </div>
                                          <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="tmplahir" class="text-black">Prodi<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" <?php echo (!empty($dsn['prodi'])) ? 'value="'.$dsn['prodi'].'"' : 'placeholder="Prodi"'; ?> required>
                                        </div>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="tmplahir" class="text-black">Tempat Lahir<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" class="form-control" id="tmplahir" name="tmplahir" placeholder="Tempat Lahir"  <?php echo (!empty($dsn['tempat'])) ? 'value="'.$dsn['tempat'].'"' : 'placeholder="Tempat Lahir"'; ?> required>
                                        </div>
                                      </div>
                                      </div>                                      
                                      <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="tmplahir" class="text-black">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <div class="form-line">
                                         <input type="date" class="form-control" id="tgllahir"  name="tgllahir" value="<?php echo (!empty($dsn['tgl'])) ? $dsn['tgl'] : ' '; ?>" required>
                                         </div >
                                      </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="daerah" class="text-black">Jenis Kelamin <span class="text-danger">*</span>
                                        <?php $jk=(!empty($dsn['jk'])) ? 'value="'.$dsn['jk'].'"'  : 'value="0"';
                                       
                                          $lklk = $jk=='value="Laki-Laki"' ? "checked" : "1";
                                          $prm = $jk=='value="Perempuan"' ? "checked" : "1";
                                        echo '
                                        </label><br>
                                            <input type="radio" name="jk" id="male" value="2" class="with-gap radio-col-indigo" '.$lklk.' required>
                                            <label for="male" >Laki - Laki</label>

                                            <input value="3" type="radio" name="jk" id="female" class="with-gap radio-col-indigo" '.$prm.' required>
                                            <label for="female" class="m-l-20">Perempuan</label>';
                                            ?>
                                      </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class=" form-group ">
                                        <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                        <div class="form-line">
                                        <input type="text" id="email" name="email" class="form-control email" placeholder="Ex: example@example.com"  <?php echo (!empty($dsn['email'])) ? 'value="'.$dsn['email'].'"' : 'placeholder="Ex: example@example.com"'; ?>  required>
                                            </div>
                                      </div></div>
                                      <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="no_tlp" class="text-black">No Telepon <span class="text-danger">*</span></label>
                                        <div class="form-line">
                                                <input onkeypress="return hanyaAngka(event)" type="text" class="form-control mobile-phone-number"  id="no_tlp" name="no_tlp" placeholder="Ex: +00 (000) 0000-0000"  <?php echo (!empty($dsn['hp'])) ? 'value="'.$dsn['hp'].'"' : 'placeholder="Ex: +00 (000) 0000-0000"'; ?> required>
                                            </div >
                                            <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                      </div>
                                    </div></div>
                                      <div class="form-group row" style="width:100%; margin-left:2px; margin-bottom:100px" required>
                                          <label for="alamat" class="text-black">Alamat<span class="text-danger">*</span></label>
                                          <div class="form-line">
                                          <textarea style="border:1px solid #ccc" name="alamat" id="alamat" cols="15" rows="2" class="form-control" placeholder=" Alamat" required><?php echo (!empty($dsn['alamat'])) ? $dsn['alamat'] : ''; ?></textarea>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer" style="position:relative">
                            <button  style="position:relative" ></button>
                            <button  style="position:relative" ></button>
                        </div>
                        <div style="background-color: #ddd;height: 60px; margin-top:-50px;position:relative">
                          <button type="submit" style="position:relative;float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="simpan">SIMPAN</button>
                            <button type="button" style="position:relative" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                        </div></form>
                        </div>
                                
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="hapus<?php echo $data['id'] ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title nama" id="defaultModalLabel">HAPUS DATA!</h4>
                        </div>
                        <div class="modal-body" style="text-align:center;">
                            <i class="material-icons" style="font-size:170px;color:#c6c6c6">delete</i>
                            <p>Apa anda ingin menghapus data</p>
                            <span><b style="font-size:23px"><?php echo (!empty($data['nama'])) ? $data['nama'] : $data['npm']?></b></span>
                        </div>
                        <div class="modal-footer">
                        <a href="pr_akunmhs_hapus?id=<?php echo $data['id'] ?>" type="submit" style="float:right" class="btn btn-primary waves-effect m-t-15 m-r-20" name="hapus">HAPUS</a>
                            <button type="button" style="float:left" class="btn btn-danger waves-effect  m-t-15 m-l-20" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>