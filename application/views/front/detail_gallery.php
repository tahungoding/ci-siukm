   <!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/gallery.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Detail Galeri</h2>
                            <p><a href="<?=base_url()?>"
                            		style="color:white;">Home</a><span>//</span><a href="<?=base_url('gallery')?>"
                            			style="color:white;">gallery</a><span>//</span>detail gallery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
        aria-hidden="true" style="display: none;">
            <div class="modal-dialog" >
                <div class="modal-content" style="margin: 0 auto;width:inherit;height:inherit;">
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="nama">Judul Album</label>
                                    <input class="form-control" name="judul" type="text" value="<?=$detail->judul?>" id="nama"
                                    	required placeholder="...">
                                </div>
                            </div>
        
                            <div class="form-group account-btn text-center mt-2">
                                <div class="col-12">
                                    <button class="btn width-lg btn-info waves-effect waves-light" type="submit">Simpan</button>
                                </div>
                            </div>
        
                        </form>
        
                    </div>
                </div>
            </div>
    </div>
   <section class="blog_area section_padding">
      <div class="container" >
      <h3 class="text-center"><?=$detail->judul?> <a href="" class="text-center text-muted" data-toggle="modal" title="Ubah judul" data-target="#edit-modal" style="font-size: 13px;display: inline;">
      <?php if ($this->session->userdata('masuk')) { ?>
      <i class="fa fa-edit"></i></a> 
      <?php } ?>
      </h3>
      <?php if ($this->session->userdata('masuk')) { ?>
      <a href="<?=base_url()?>gallerys/menej/<?=$detail->slug?>" target="_blank" class="text-right text-muted" data-toggle="tooltip"
      	title="Menej gallery"><i class="fa fa-images"></i> </a>
      <?php } ?>
      <div class="row mt-30">
      <div id="aniimated-thumbnials">
      
      <?php
      if (!$galeri) {
          echo "Belum ada gambar dialbum ini";
      }
      foreach ($galeri as $galeris) { ?>
         <a class="grid-item" href="<?=base_url()?>assets/data/album/gallerys/<?=$galeris->path?>">
         <img src="<?=base_url()?>assets/data/album/gallerys/<?=$galeris->path?>" />
         </a>
      <?php } ?>
      </div>
   </div>
   </div>
   </section>
   <!--================Blog Area end =================-->