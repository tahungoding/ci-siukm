   <!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/artikel.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>artikel</h2>
                            <p> <a href="<?=base_url()?>" style="color:white;">Home</a> <span>//</span>artikel</p>
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
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php if (!$artikel) { ?>
                        <br>
                    <div class="col-lg-12 mt-50">
                        <h3 class=" text-muted">
                            Belum ada data
                        </h3>
                    </div>
                    <?php } ?>
                    <?php foreach ($artikel as $artikels) { ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" height="300px" style="object-fit: cover" src="<?=base_url()?>assets/data/artikel/<?=$artikels->thumbnail?>" alt="">
                                <a href="<?=base_url()?>blog/<?=$artikels->nama_kategori?>/<?=$artikels->slug?>" class="blog_item_date">
                                    <h3><?=date('d', strtotime($artikels->created_at))?></h3>
                                    <p><?=medium_bulan(date('m', strtotime($artikels->created_at)))?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?=base_url()?>blog/<?=$artikels->slug?>">
                                    <h2><?=$artikels->judul?></h2>
                                </a>
                                <br>
                                <?php 
                                $artikels->isi = strip_tags($artikels->isi);
                                if (strlen($artikels->isi) > 300) {

                                // truncate string
                                $artikels->isiCut = substr($artikels->isi, 0, 300);
                                $endPoint = strrpos($artikels->isiCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $artikels->isi = $endPoint? substr($artikels->isiCut, 0, $endPoint) : substr($artikels->isiCut, 0);
                                $artikels->isi .= '...';
                                }
                                echo $artikels->isi;
                                ?>
                                <br><br>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i><?=$artikels->penulis?></a></li>
                                    <li><a href="<?=base_url()?>blog?kategori=<?=$artikels->nama_kategori?>"><i
                                    			class="fas fa-braille"></i><?=$artikels->nama_kategori?></a></li>
                                </ul>
                            </div>
                        </article>
                    <?php } ?>
                        <?=$pagination?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="GET" action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="keyword" type="text" class="form-control"
                                        	value="<?=$this->input->get('keyword')?>"
                                        	placeholder='Cari berdasarkan judul'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Cari berdasarkan judul'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button  class="button rounded-0 primary-bg text-white w-100 btn_4"
                                    type="submit">Search</button>
                            </form>
                        </aside>

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
                        		<img width="120" height="80" style="object-fit: cover;"
                        			src="<?=base_url()?>assets/data/artikel/<?=$pengunjungs->thumbnail;?>" alt="post">
                        		<div class="media-body">
                        			<a href="<?=base_url()?>blog/<?=$pengunjungs->slug?>">
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
    <!--================Blog Area =================-->