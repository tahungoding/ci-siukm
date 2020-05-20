                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Profile Web</h4>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
                                    <form method="POST" class="form-horizontal parsley-examples" role="form" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Nama Website<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" value="<?=$profiles->webname?>" required maxlength="20" name="webname" id="placement" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Favicon<span class="text-danger">*</span></label>
                                            <div class="col-md-2">
                                                <input type="file" name="favicon" data-default-file="<?=base_url()?>assets/data/profiles/<?=$profiles->favicon?>" data-show-remove="false"  id="input-file-to-destroy" class="dropify" 
                                                    data-max-file-size="2M" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Logo<span class="text-danger">*</span></label>
                                            <div class="col-md-2">
                                                <input type="file" name="logo" data-default-file="<?=base_url()?>assets/data/profiles/<?=$profiles->logo?>" data-show-remove="false"  id="input-file-to-destroy" class="dropify" 
                                                    data-max-file-size="2M" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Gambar Utama<span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <input type="file" name="gambar" data-max-width="2000" data-default-file="<?=base_url()?>assets/data/profiles/<?=$profiles->gambar?>" data-show-remove="false" id="input-file-to-destroy" class="dropify" 
                                                    data-max-file-size="2M" data-max-height="2000" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Text Welcoming<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea maxlength="225" name="pembuka" required rows="3"
                                                	placeholder="This textarea has a limit of 225 chars."
                                                	class="form-control"><?=$profiles->pembuka?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Visi<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea   name="visi"  required rows="3" placeholder="This textarea has a limit of 225 chars." class="form-control summernote"><?=$profiles->visi?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Misi<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea   name="misi"  required rows="3" placeholder="This textarea has a limit of 225 chars." class="form-control summernote"><?=$profiles->misi?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Bio<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea   name="bio" required  rows="3" placeholder="This textarea has a limit of 225 chars." class="form-control summernote"><?=$profiles->bio?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Ketua<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                            <select name="ketua" class="form-control select2" required>
                                                <option>-- Pilih --</option>
                                                <?php foreach ($teams as $key => $value) { ?>
                                                    <option value="<?=$teams[$key]->id_user?>"
                                                    	<?php echo ($teams[$key]->id_user == $profiles->ketua) ? "selected" : null ?>><?=$teams[$key]->nama?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Wakil Ketua<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                            <select name="wakil_ketua" class="form-control select2" required>
                                                <option>-- Pilih --</option>
                                                <?php foreach ($teams as $key => $value) { ?>
                                                    <option value="<?=$teams[$key]->id_user?>" <?php echo ($teams[$key]->id_user == $profiles->wakil_ketua) ? "selected" : null ?>><?=$teams[$key]->nama?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Sekretaris<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                            <select name="sekretaris" class="form-control select2" required>
                                                <option>-- Pilih --</option>
                                                <?php foreach ($teams as $key => $value) { ?>
                                                    <option value="<?=$teams[$key]->id_user?>" <?php echo ($teams[$key]->id_user == $profiles->sekretaris) ? "selected" : null ?>><?=$teams[$key]->nama?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <input type="email" name="email" value="<?=$profiles->email?>" required class="form-control"/>
                                                <span class="font-10 text-muted">(ex: ukm@gmail.com)</span>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Telp<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <input type="number" name="telp" value="<?=$profiles->telp?>" required class="form-control"  maxlength="16" value="62" name="placement" id="placement" />
                                                <span class="font-10 text-muted">0 diganti dengan 62 (ex: 6285665664663)</span>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Alamat<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea id="textarea" name="alamat"  required class="form-control" maxlength="225" rows="3"><?=$profiles->alamat?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Facebook</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="<?=$profiles->facebook?>" maxlength="16" name="facebook" id="placement" />
                                                <span class="font-10 text-muted">Username facebook</span>
                                            </div>
                                            <label class="col-md-2 col-form-label" for="simpleinput">Twitter</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="<?=$profiles->twitter?>" maxlength="16" name="twitter" id="placement" />
                                                <span class="font-10 text-muted">Tanpa '@'</span>
                                            </div>
                                            <label class="col-md-2 col-form-label" for="simpleinput">Instagram</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="<?=$profiles->instagram?>" maxlength="16" name="instagram" id="placement" />
                                                <span class="font-10 text-muted">Tanpa '@'</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput"></label>
                                            <div class="col-md-10">
                                                <button name="profilesSubmit" type="submit" class="btn btn-info" style="width:200px;"><i class="fa fa-save"></i>  Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- End row -->
                        <!-- End row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->