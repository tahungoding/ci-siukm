                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">BUAT ARTIKEL</h4>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
                                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
                                    <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" minlength="6" required name="judul" class="form-control" placeholder="Judul artikel...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Kategori</label>
                                            <div class="col-md-10">
                                                <select class="form-control" required name="id_kategori" id="">
                                                    <?php foreach ($categorys as $category) {
                                                        echo '<option value="'.$category->id_kategori.'">'.$category->nama.'</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Thumbnail</label>
                                            <div class="col-md-3">
                                            <input type="file" name="thumbnail" required id="input-file-to-destroy" class="dropify" data-allowed-formats="landscape"
                                                data-max-file-size="2M" data-max-height="2000" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Isi</label>
                                            <div class="col-md-10">
                                                <textarea name="isi" required class="summernote"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput"></label>
                                            <div class="col-md-10">
                                                <button name="addBlogs" class="btn btn-info">Publish</button>
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