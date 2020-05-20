                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                                    <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_anggota" value="<?=$user->id_anggota?>">
                                        <input type="file" id="input_file" name="foto" onchange="this.form.submit()" style="display: none;">
                                    </form>
                        <div class="row">

                            <div class="col-xl-4 col-md-12 col-sm-12">
                                <!-- meta -->
                                <div class="profile-user-box card-box bg-primary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="float-center">
                                                      <?php if ($this->session->flashdata('successFoto')) { ?>
                                                        <div class="alert alert-success">
                                                            <?=$this->session->flashdata('successFoto')?>
                                                        </div>
                                                     <?php }elseif ($this->session->flashdata('errorFoto')){ ?>
                                                            <div class="alert alert-danger">
                                                                <?=$this->session->flashdata('errorFoto')?>
                                                            </div>  
                                                     <?php } ?>
                                                      <?php if ($this->session->flashdata('successLevelUser')) { ?>
                                                        <div class="alert alert-success">
                                                            <?=$this->session->flashdata('successLevelUser')?>
                                                        </div>
                                                     <?php }elseif ($this->session->flashdata('errorLevelUser')){ ?>
                                                            <div class="alert alert-danger">
                                                                <?=$this->session->flashdata('errorLevelUser')?>
                                                            </div>  
                                                     <?php } ?>
                                                <img src="<?=base_url()?>assets/data/users/<?=isset($user->gambar) ? $user->gambar : 'default.jpg' ?>" style="display: block;object-fit: cover;" alt=""
                                                    class="mr-auto ml-auto avatar-xl rounded-circle">
                                                <label class="text-center mr-auto ml-auto" style="display: block;" data-toggle="tooltip" data-placement="top"
                                                    title="Change Picture" for="input_file"><i class="fe-settings mb-5" style="color:white"></i> </label>
                                            </span>
                                            <div class="media-body text-center">
                                                <h5 class="mt-2 mb-1 text-white font-10">Muhamad Iqbal Rivaldi</h5>
                                                <?php if ($this->session->userdata('status') == 'ketua' && $user->level_user == 1) { ?>
                                                <form method="post">
                                                <input type="hidden" name="id" value="<?=$user->id_user?>">
                                                <select class="selectpicker show-tick mt-3" name="levelUser" onchange="this.form.submit()" data-style="btn-danger btn-sm">
                                                    <option value="0">Anggota</option>
                                                    <option value="1" selected>Ketua</option>
                                                    <option value="2">Wakil Ketua</option>
                                                    <option value="3">Sekretaris</option>
                                                </select>
                                                </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($this->session->userdata('status') != 'anggota') { ?>
                                <div class="card-box tilebox-one">
                                    <i class="icon-clock float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Menunggu Konfirmasi</h6>
                                    <h2 class="" data-plugin="counterup"><?=$pendaftar?></h2>
                                    <span class="badge badge-primary"> +<?=$pendaftarBulanIni?> </span> <span class="text-muted">Pada bulan ini</span>
                                </div>
                                <?php } ?>
                                <!--/ meta -->
                            </div>
     
                            <div class="col-xl-8">
                                <div class="card-box">
                                    <div class="tabs-vertical-env">
                                        <div class="row">
                            
                                            <div class="col-sm-9">
                                                <div class="tab-content pt-0">
                                                    <div class="tab-pane fade show active" id="v2-home" role="tabpanel"
                                                        aria-labelledby="v2-home-tab">
                                                        <p class="sub-header">
                                                            Username : <?=$user->username;?>
                                                        </p>
                                                        <hr>
                                                        <dl class="row mb-0">
                                                            <dt class="col-sm-3">NIM</dt>
                                                            <dd class="col-sm-9"><?=$user->nim;?></dd>
                                                        
                                                            <dt class="col-sm-3">Nama Lengkap</dt>
                                                            <dd class="col-sm-9">
                                                                <?=$user->nama;?>
                                                            </dd>
                                                        
                                                            <dt class="col-sm-3">Alamat</dt>
                                                            <dd class="col-sm-9"><?=$user->alamat;?></dd>
                                                        
                                                            <dt class="col-sm-3 text-truncate">Telephone</dt>
                                                            <dd class="col-sm-9"><?=$user->no_hp;?></dd>
                                                        
                                                            <dt class="col-sm-3 text-truncate">Program Studi</dt>
                                                            <dd class="col-sm-9"><?=$user->program_studi;?></dd>
                                                        
                                                            <dt class="col-sm-3 text-truncate">Angkatan</dt>
                                                            <dd class="col-sm-9"><?=$user->angkatan;?></dd>
                                                        
                                                            <dt class="col-sm-3 text-truncate">Divisi</dt>
                                                            <dd class="col-sm-9"><?=$user->divisi;?></dd>
                                                        
                                                            <dt class="col-sm-3 text-truncate">Sosial Media</dt>
                                                            <dd class="col-sm-9">
                                                                <ul class="social-links list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                                                            href="https://instagram.com/<?=$user->instagram;?>" target="_blank"
                                                                            data-original-title="<?=$user->instagram;?>"><i class="fab fa-instagram"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                                                            href="https://wa.me/<?=$user->whatsapp;?>" target="_blank" data-original-title="<?=$user->whatsapp;?>"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </dd>
                                                        
                                                        </dl>
                                                    </div>
                                                    <div class="tab-pane fade" id="v2-profile" role="tabpanel" aria-labelledby="v2-profile-tab">
                                                     <?php if ($this->session->flashdata('success')) { ?>
                                                        <div class="alert alert-success">
                                                            <?=$this->session->flashdata('success')?>
                                                        </div>
                                                     <?php }elseif ($this->session->flashdata('error')){ ?>
                                                            <div class="alert alert-danger">
                                                                <?=$this->session->flashdata('error')?>
                                                            </div>  
                                                     <?php } ?>
                                                        <form method="POST" role="form" class="parsley-examples">
                                                        <input type="hidden" value="<?=$user->id_anggota?>" name="id">
                                                            <div class="form-group row">
                                                                <label for="inputNama" class="col-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input type="text" required value="<?=$user->nama?>" name="nama" class="form-control" id="inputNama"
                                                                        placeholder="Nama Lengkap">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label">Alamat<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <textarea required  name="alamat"  class="form-control"><?=$user->alamat?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputTelp" class="col-4 col-form-label">Telphone<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input type="text" value="<?=$user->no_hp?>" name="no_hp" required parsley-type="number" class="form-control" id="inputTelp" placeholder="Telephone">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputIg" class="col-4 col-form-label">Instagram</label>
                                                                <div class="col-7">
                                                                    <input type="text" value="<?=$user->instagram?>" name="instagram" class="form-control" id="inputIg" placeholder="Instagram">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputWa" class="col-4 col-form-label">Whatsapp</label>
                                                                <div class="col-7">
                                                                    <input type="text" value="<?=$user->whatsapp?>" name="whatsapp" parsley-type="number" class="form-control" id="inputWa" placeholder="Number Whatsapp">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-8 offset-4">
                                                                    <button name="updatePersonal" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v2-campus" role="tabpanel" aria-labelledby="v2-campus-tab">
                                                        <?php if ($this->session->flashdata('successCampus')) { ?>
                                                            <div class="alert alert-success">
                                                                <?=$this->session->flashdata('successCampus')?>
                                                            </div>
                                                        <?php }elseif ($this->session->flashdata('errorCampus')){ ?>
                                                                <div class="alert alert-danger">
                                                                    <?=$this->session->flashdata('errorCampus')?>
                                                                </div>  
                                                        <?php } ?>
                                                        <form method="POST" role="form" class="parsley-examples">
                                                        <input type="hidden" value="<?=$user->id_anggota?>" name="id">
                                                            <div class="form-group row">
                                                                <label for="inputNama" class="col-4 col-form-label">NIM<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input type="text" value="<?=$user->nim?>" name="nim" required class="form-control" id="inputNama" placeholder="Nama Lengkap">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label">Divisi<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <select class="form-control" name="divisi">
                                                                        <?php foreach ($divisis as $divisi) { ?>
                                                                            <option value="<?=$divisi->nama?>"><?=$divisi->nama?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label">Program Studi<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <select class="form-control" name="program_studi">
                                                                        <option value="Teknik Informatika" <?php if($user->program_studi == 'Teknik Informatika'){ echo 'selected'; }?>>Teknik Informatika</option>
                                                                        <option value="Sistem Informasi" <?php if($user->program_studi == 'Sistem Informasi'){ echo 'selected'; }?>>Sistem Informasi</option>
                                                                        <option value="Manajemen Informatika <?php if($user->program_studi == 'Manajemen Informatika'){ echo 'selected'; }?>">Manajemen Informatika</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputTelp" class="col-4 col-form-label">Angkatan<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input type="number" value="<?=$user->angkatan?>" name="angkatan" maxlength="4" required parsley-type="number" class="form-control" id="inputTelp"
                                                                        placeholder="Tahun Angkatan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-8 offset-4">
                                                                    <button name="updateCampus" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="v2-settings" role="tabpanel" aria-labelledby="v2-settings-tab">
                                                         <?php if ($this->session->flashdata('successUsername')) { ?>
                                                            <div class="alert alert-success">
                                                                <?=$this->session->flashdata('successUsername')?>
                                                            </div>
                                                        <?php }elseif ($this->session->flashdata('errorUsername')){ ?>
                                                                <div class="alert alert-danger">
                                                                    <?=$this->session->flashdata('errorUsername')?>
                                                                </div>  
                                                        <?php } ?>
                                                        <form method="POST" role="form" class="parsley-examples">
                                                        <input type="hidden" name="id" value="<?=$user->id_user?>">
                                                            <div class="form-group row">
                                                                <label for="hori-username" class="col-4 col-form-label">Username<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input id="hori-username" name="username" value="<?=$user->username?>" type="text" placeholder="Username" required class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-8 offset-4">
                                                                    <button name="updateUsername" type="submit" class="btn btn-primary btn-sm waves-effect waves-light mr-1">
                                                                        Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <br>
                                                        <hr>
                                                         <?php if ($this->session->flashdata('successPassword')) { ?>
                                                            <div class="alert alert-success">
                                                                <?=$this->session->flashdata('successPassword')?>
                                                            </div>
                                                        <?php }elseif ($this->session->flashdata('errorPassword')){ ?>
                                                                <div class="alert alert-danger">
                                                                    <?=$this->session->flashdata('errorPassword')?>
                                                                </div>  
                                                        <?php } ?>
                                                        <form method="POST" role="form" class="parsley-examples">
                                                            <input type="hidden" name="id" value="<?=$user->id_user?>" id="">
                                                            <div class="form-group row">
                                                                <label for="hori-old_password" class="col-4 col-form-label">Password Lama<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input id="hori-old_password" type="password" name="old_password" placeholder="Password Lama" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="hori-pass1" class="col-4 col-form-label">Password Baru<span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input id="hori-pass1" type="password" name="new_password" placeholder="Password Baru" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="hori-pass2" class="col-4 col-form-label">Confirm Password
                                                                    <span class="text-danger">*</span></label>
                                                                <div class="col-7">
                                                                    <input data-parsley-equalto="#hori-pass1" type="password" required placeholder="Konfirmasi Password"
                                                                        class="form-control" id="hori-pass2">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-8 offset-4">
                                                                    <button name="updatePassword" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <br>
                                                            <?php if ($this->session->flashdata('successUser')) { ?>
                                                                <div class="alert alert-success">
                                                                    <?=$this->session->flashdata('successUser')?>
                                                                </div>
                                                            <?php }elseif ($this->session->flashdata('errorUser')){ ?>
                                                                    <div class="alert alert-danger">
                                                                        <?=$this->session->flashdata('errorUser')?>
                                                                    </div>  
                                                            <?php } ?>
                                                            <form method="POST">
                                                                <input type="hidden" name="updateUser">
                                                                <input type="hidden" name="deleteUser" value="<?=$user->id_user?>">
                                                                <button id="sa-hapus" style="all: unset"data-toggle="tooltip" title="Hapus akun ?"><i class="fa fa-trash-alt text-muted " style="cursor: pointer;"></i> </button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="nav flex-column nav-pills tabs-vertical" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" id="v2-home-tab" data-toggle="pill" href="#v2-home" role="tab"
                                                        aria-controls="v2-home" aria-selected="true">
                                                        <i class="fe-monitor"></i><span class="d-inline-block ml-2">Home</span>
                                                    </a>
                                                    <a class="nav-link" id="v2-profile-tab" data-toggle="pill" href="#v2-profile" role="tab"
                                                        aria-controls="v2-profile" aria-selected="false">
                                                        <i class="fe-user"></i> <span class="d-inline-block ml-2">Personal</span>
                                                    </a>
                                                    <a class="nav-link" id="v2-campus-tab" data-toggle="pill" href="#v2-campus" role="tab"
                                                        aria-controls="v2-campus" aria-selected="false">
                                                        <i class="fe-briefcase"></i> <span class="d-inline-block ml-2">Campus</span>
                                                    </a>
                                                    <a class="nav-link" id="v2-settings-tab" data-toggle="pill" href="#v2-settings" role="tab"
                                                        aria-controls="v2-settings" aria-selected="false">
                                                        <i class="fe-settings"></i> <span class="d-inline-block ml-2">Akun</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
                        <?php if ($this->session->userdata('status') != 'anggota') { ?>
                        <div class="row">
                        <div class="col-xl-12">
                        
                            <div class="row">
                        
                                <div class="col-sm-6">
                                    <div class="card-box tilebox-one">
                                        <i class="icon-feed float-right text-muted"></i>
                                        <h6 class="text-muted text-uppercase mt-0">Artikel</h6>
                                        <h2 class="" data-plugin="counterup"><?=$artikel?></h2>
                                        <span class="badge badge-primary"> +<?=$artikelBulanIni?> </span> <span class="text-muted">Pada bulan ini</span>
                                    </div>
                                </div><!-- end col -->
                        
                                <div class="col-sm-6">
                                    <div class="card-box tilebox-one">
                                        <i class="icon-people float-right text-muted"></i>
                                        <h6 class="text-muted text-uppercase mt-0">Anggota</h6>
                                        <h2 class=""><span data-plugin="counterup"><?=$anggota?></span></h2>
                                        <span class="badge badge-primary"> +<?=$anggotaBulanIni?> </span> <span class="text-muted">Pada bulan ini</span>
                                    </div>
                                </div><!-- end col -->
                        
                        
                            </div>
                            <!-- end row -->
                        
                        </div>
                        <!-- end col -->
                        </div>
                        <?php } ?>
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->