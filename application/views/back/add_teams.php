                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- Basic Form Wizard -->


                        <!-- Vertical Steps Example -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Tambah Anggota</h4>
                                    <p>
                                        Isilah formulir berikut
                                    </p>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
                                    <form method="POST" id="wizard-vertical" role="form" class="parsley-examples">
                                        <h3>Personal</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label for="inputNama" class="col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input type="text" name="nama" required class="form-control" id="inputNama" placeholder="Nama Lengkap">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="alamat" class="col-form-label">Alamat<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <textarea required name="alamat"  class="form-control" id="alamat"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="inputTelp" class="  col-form-label">Telphone<span class="text-danger">*</span></label>
                                                <input type="number" required name="no_hp" class="form-control" id="inputTelp" placeholder="Telephone">
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="inputIg" class="  col-form-label">Instagram</label>
                                                <div class=" ">
                                                    <input type="text" name="instagram" class="form-control" id="inputIg" placeholder="Instagram">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="inputWa" class="  col-form-label">Whatsapp</label>
                                                <div class=" ">
                                                    <input type="text" parsley-type="number" name="whatsapp" class="form-control" id="inputWa" placeholder="Number Whatsapp">
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Campus</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label for="inputNim" class="  col-form-label">NIM<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input type="number" name="nim" required class="form-control" id="inputNim" placeholder="NIM">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="  col-form-label">Divisi<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <select class="form-control" name="divisi" required>
                                                        <?php foreach ($divisis as $divisi) { ?>
                                                            <option value="<?=$divisi->id_divisi?>"><?=$divisi->nama?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="  col-form-label">Program Studi<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <select class="form-control" name="program_studi" required>
                                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="inputAng" class="  col-form-label">Angkatan<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input type="number" name="angkatan" maxlength="4" required parsley-type="number" class="form-control" id="inputAng" placeholder="Tahun Angkatan">
                                                </div>
                                            </div>

                                        </section>
                                        <h3>Akun</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label for="username" class="  col-form-label">Username<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input id="username" name="username" type="text" placeholder="Username" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="password" class="  col-form-label">Password<span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input id="password" name="password" type="password" placeholder="Password" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="confirm" class="  col-form-label">Confirm Password
                                                    <span class="text-danger">*</span></label>
                                                <div class=" ">
                                                    <input data-parsley-equalto="#password" name="confirm" type="password" required placeholder="Konfirmasi Password" class="form-control"
                                                        id="confirm">
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                                    <!-- End #wizard-vertical -->
                                </div>
                            </div>
                        </div><!-- End row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->