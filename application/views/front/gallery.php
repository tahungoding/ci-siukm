    <!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/gallery.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>galeri</h2>
                            <p><a href="<?=base_url()?>" style="color:white;">Home</a><span>//</span>galeri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <?php if (!$galeri) { ?>
                <br>
                <div class="col-lg-12 mt-50">
                    <h3 class=" text-muted">
                        Belum ada data
                    </h3>
                </div>
                <?php } ?>
            <?php if ($this->session->flashdata('sukses')) { ?>
                <div class="alert alert-success">
                    <?=$this->session->flashdata('sukses')?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('gagal')) { ?>
                <div class="alert alert-danger">
                    <?=$this->session->flashdata('gagal')?>
                </div>
            <?php } ?>
            <?php foreach ($galeri as $galeris) { ?>
                <div class="col-md-4">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href="<?=base_url()?>gallery/<?=$galeris->slug?>" target="_blank">
                                    <img class="card-img rounded-0" height="300px;" style="object-fit: cover;" src="<?=base_url()?>assets/data/album/<?=$galeris->thumbnail?>" alt="">
                                </a>
                            </div>
                            <div class="blog_details text-center">
                                <a class="d-inline-block" href="<?=base_url()?>gallery/<?=$galeris->slug?>" target="_blank">
                                    <h4 class="text-center"><?=$galeris->judul?> </h4>
                                </a>
                            </div>
                        </article>
                </div>
            <?php } ?>
                <div class="container">
                    <?=$pagination?>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->