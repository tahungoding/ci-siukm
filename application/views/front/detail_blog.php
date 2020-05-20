   <!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/artikel1.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Detail Artikel</h2>
                            <p><a href="<?=base_url()?>"
                            		style="color:white;">Home</a><span>//</span><a href="<?=base_url('blog')?>"
                            			style="color:white;">artikel</a><span>//</span>detail artikel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?=base_url()?>assets/data/artikel/<?=$artikel->thumbnail?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?=$artikel->judul?>
                     </h2>
                              <ul class="blog-info-link">
                                 <li><a href="#"><i class="far fa-user"></i> <?=$artikel->penulis?></a></li>
                                 <li><a href="<?=base_url()?>blog?kategori=<?=$artikel->kategori?>"><i class="fas fa-braille"></i>
                                 		<?=$artikel->kategori?></a></li>
                                 <?php if ($this->session->userdata('status') == 'ketua' || $artikel->id_user = $this->session->userdata('id_user')) {
                                    echo '<li><a href="'.base_url().'blogs/edit/'.$artikel->id_artikel.'" class="text-right" style="display: inline-block;"><i class="fa fa-edit"></i> Settings </a> </li>';
                                 } ?>
                                
                              </ul>
                              <br>
                              <?=$artikel->isi?>
                              <br>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="whatsapp://send?text=URL Artikel"><i class="fab fa-whatsapp"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                        <?php if (!empty($prev)) { ?>
                           <div class="thumb">
                              <a href="<?=base_url('blog/'.$prev->slug)?>">
                                 <img class="img-fluid" style="object-fit: cover" width="100px;" src="<?=base_url()?>assets/data/artikel/<?=$prev->thumbnail?>" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="<?=base_url('blog/'.$prev->slug)?>">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="<?=base_url('blog/'.$prev->slug)?>">
                                 <h4><?=$prev->judul?></h4>
                              </a>
                           </div>
                        <?php } ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <?php if (!empty($next)) { ?>
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="<?=base_url('blog/'.$next->slug)?>">
                                 <h4><?=$next->judul?></h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="<?=base_url('blog/'.$next->slug)?>">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="<?=base_url('blog/'.$next->slug)?>">
                                 <img class="img-fluid" style="object-fit: cover" width="100px;" src="<?=base_url()?>assets/data/artikel/<?=$next->thumbnail?>" alt="">
                              </a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="<?=base_url()?>assets/data/users/<?=$artikel->gambar?>" style="object-fit: cover;" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4><?=$artikel->penulis?></h4>
                        </a>
                        <p>Penulis</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategori</h4>
                            <ul class="list cat-list">
                            <?php foreach ($kategori as $kategoris) { ?>
                                <li>
                                    <a href="<?=base_url()?>blog?kategori=<?=$kategoris->nama?>" class="d-flex">
                                        <p><?=$kategoris->nama?></p>
                                        <?php 
                                        $CI =& get_instance();
                                        $CI->load->model('Blogs_model', 'bm');
                                        $jumlah = $CI->bm->getArtikelByCategoryNumRows($kategoris->id_kategori);
                                        ?>
                                        <p>(<?=$jumlah?>)</p>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                           <h3 class="widget_title">Terbanyak dilihat</h3>
                           <?php foreach ($pengunjung as $pengunjungs) { ?>
                              <div class="media post_item">
                              <img width="120" height="80" style="object-fit: cover;" src="<?=base_url()?>assets/data/artikel/<?=$pengunjungs->thumbnail;?>" alt="post">
                              <div class="media-body">
                                 <a href="single-blog.html">
                                    <h3><?=$pengunjungs->judul;?><h3>
                                 </a>
                                 <p><i class="far fa-eye"></i> <?=$pengunjungs->pengunjung?>x dilihat</p>
                              </div>
                           </div>
                           <?php } ?>

                        </aside>
               </div>
            </div>
         </div>
      </div>
   </section>