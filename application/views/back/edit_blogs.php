                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">EDIT ARTIKEL</h4>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
                                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" name="judul" value="<?=$artikel->judul;?>" class="form-control" value="Some text value...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Kategori</label>
                                            <div class="col-md-10">
                                                <select name="id_kategori" class="form-control" id="">
                                                    <?php foreach ($categorys as $kategori) {
                                                        $selected = '';
                                                        if ($kategori->id_kategori == $artikel->id_kategori) {
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option value="'.$kategori->id_kategori.'"'.$selected.'>'.$kategori->nama.'</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Thumbnail</label>
                                            <div class="col-md-3">
                                            <input type="file" id="input-file-to-destroy" name="thumbnail" data-show-remove="false" data-default-file="<?=base_url()?>assets/data/artikel/<?=$artikel->thumbnail?>" class="dropify" data-allowed-formats="landscape"
                                                data-max-file-size="2M" data-max-height="2000" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Isi</label>
                                            <div class="col-md-10">
                                                <textarea name="isi" class="summernote"><?=$artikel->isi?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput"></label>
                                            <div class="col-md-10">
                                                <button name="editBlogs" class="btn btn-info">Simpan</button>
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