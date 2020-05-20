                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                         <!-- SECTION FILTER
                        ================================================== -->
                        <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="nama">Judul Album</label>
                                                    <input class="form-control" name="judul" type="text" id="nama" required placeholder="...">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="nama">Thumbnail</label>
                                                    <input type="file" name="thumbnail" required id="input-file-to-destroy" class="dropify"
                                                        data-max-file-size="2M" data-max-height="2000" />
                                                </div>
                                            </div>
                        
                                            <div class="form-group account-btn text-center mt-2">
                                                <div class="col-12">
                                                    <button name="addAlbum" class="btn width-lg btn-info waves-effect waves-light" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <a href="" class="btn btn-info waves-light waves-effect"
                                style="height: 37px;margin-bottom: 10px;margin-left: 12px;" data-toggle="modal" data-target="#add-modal"><i class="fe-image"></i> Tambah</a>
                            <div class="col-md-auto">
                                <div class="filter-menu">
                                    <form method="GET" class="app-search">
                                        <div class="app-search-box">
                                            <div class="input-group">
                                                <input name="keyword" type="text" class="form-control" placeholder="Search...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fe-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <?php if (!$lists) { ?>
                            <div class="col-lg-12 mt-50 justify-content-center">
                            	<h3 class="text-center text-muted">
                            		Belum ada data
                            	</h3>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?=$this->session->flashdata('success')?>
                        </div>
                        <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger">
                                <?=$this->session->flashdata('error')?>
                            </div>  
                        <?php } ?>

                        <div class="port filterable-content ">
                                <div class="card-columns">
                                <?php foreach ($lists as $list) { ?>
                                        <div id="editAlbum<?=$list->id_album?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        <input type="hidden" name="id_album" value="<?=$list->id_album?>">
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="nama">Judul Album</label>
                                                                <input class="form-control" name="judul" value="<?=$list->judul?>" type="text" id="nama" required placeholder="...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="nama">Thumbnail</label>
                                                                <input type="file" name="thumbnail" data-default-file="<?=base_url()?>/assets/data/album/<?=$list->thumbnail?>" data-show-remove="false" required id="input-file-to-destroy" class="dropify"
                                                                    data-max-file-size="2M" data-max-height="2000" />
                                                            </div>
                                                        </div>
                                    
                                                        <div class="form-group account-btn text-center mt-2">
                                                            <div class="col-12">
                                                                <button name="editAlbum" class="btn width-lg btn-info waves-effect waves-light" type="submit">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                            <a href="<?=base_url()?>gallerys/menej/<?=$list->slug?>" target="_blank">
                                                <div class="portfolio-masonry-box">
                                                    <div class="portfolio-masonry-img">
                                                        <img src="<?=base_url()?>assets/data/album/<?=$list->thumbnail?>" class="thumb-img img-fluid" alt="work-thumbnail">
                                                    </div>
                                                    <div class="portfolio-masonry-detail">
                                                        <h4 class="font-18 mb-2"><?=$list->judul?></h4>
                                                        <?php if ($list->id_user == $this->session->userdata('id_user') || $this->session->userdata('status') == 'ketua') { ?>
                                                        <a href="<?=base_url()?>gallerys/menej/<?=$list->slug?>"> <i class="fa fa-images text-muted" data-toggle="tooltip" title="Menej Album" data-placement="left"></i> </a>&nbsp;&nbsp;
                                                        <span data-toggle="modal" data-target="#editAlbum<?=$list->id_album?>">
                                                         <i class="fa fa-pencil-alt text-muted" style="cursor:pointer;"  data-toggle="tooltip" title="Edit Album"></i> &nbsp;&nbsp;
                                                        </span>
                                                        <form method="post" name="form<?=$list->id_album?>"
                                                        	style="display: inline-block">
                                                            <input type="hidden" name="deleteAlbum">
                                                            <input type="hidden" name="id_album" value="<?=$list->id_album?>">
                                                        <button id="sa-hapus" type="submit" style="all: unset;"
                                                        	onclick="confirmDelete(<?=$list->id_album?>, event)"><i
                                                        		class="fa fa-trash-alt text-muted"
                                                        		style="cursor:pointer;" data-toggle="tooltip"
                                                        		title="Hapus Album" data-placement="right"></i>
                                                        </button>
                                                        </form>
                                                        <?php } ?>
                                                        <p class="clearfix"></p>
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                <?php } ?>

                                </div>

                                <?=$pagination;?>
                                        
                        </div> <!-- End row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->