<!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-md-6">
                    <div class="banner_text">
                        <div class="banner_text_iner text-center">
                            <div class="row">
                                <div class="text-center"
                                	style="font-size:50px;text-shadow: 2px 2px #e5e5cc;font-weight:bold">
                                	<?=$profiles->pembuka;?></div>
                            </div>
                            <a href="#abouts" class="btn_1">Tentang kami <i class="ti-angle-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="banner_bg">
                        <img src="<?=base_url()?>assets/data/profiles/<?=$profiles->gambar;?>" alt="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="<?=base_url()?>assets/front/img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-5 custom-animation2"><img src="<?=base_url()?>assets/front/img/animate_icon/icon_3.png" alt=""></div>
        <div class="hero-app-7 custom-animation3"><img src="<?=base_url()?>assets/front/img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-8 custom-animation"><img src="<?=base_url()?>assets/front/img/animate_icon/icon_4.png" alt=""></div>
    </section>
    <!-- banner part start-->

    <!-- cta part start-->
    <section class="cta_part" id="abouts">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="cta_part_iner">
                        <div class="cta_part_text">
                            <p>Sekilas tentang kami</p>
                        </div>
                        <?=$profiles->bio?>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta part end-->

    <!--::review_part start::-->
    <section class="review_part padding_tops padding_bottoms section_bg_2">
        <div class="container">
            <div class="row ">
                
                    <div class="col-md-6">
                        <div class="row">
                            <img src="<?=base_url()?>assets/front/img/visi.png" alt="slideimg"
                                class="image" height="90" style="margin: auto;margin-bottom: 30px;">
                        </div>
                        <div class="text-white">
                            <?=$profiles->visi?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <img src="<?=base_url()?>assets/front/img/misi.png" alt="slideimg"
                                class="image" height="90" style="margin: auto;margin-bottom: 30px;">
                        </div>
                        <div class="text-white">
                            <?=$profiles->misi?>
                        </div>
                    </div>
                
            </div>        
        </div>
    </section>
    <!--::blog_part end::-->

        <!--::blog_part start::-->
        <section class="blog_part section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <p>Berita Terbaru</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (!$blogs) { ?>
                        <i>Belum ada data</i>
                    <?php } ?>
                    <?php foreach ($blogs as $blog) { ?>
                    <div class="col-sm-6 col-lg-4 col-xl-4">
                        <div class="single-home-blog">
                            <div class="card">
                                <img width="300" height="350" style="object-fit: cover;" src="<?=base_url()?>assets/data/artikel/<?=$blog->thumbnail?>" class="card-img-top" alt="blog">
                                <div class="card-body">
                                    <a href="blog.html"><?=$blog->nama_kategori?></a> | <span> <?=longdate_indo(date('Y-m-d', strtotime($blog->created_at)))?></span>
                                    <br>
                                    <a href="<?=base_url()?>blog/<?=$blog->nama_kategori?>/<?=$blog->slug?>">
                                        <h5 class="card-title"><?=$blog->judul?></h5>
                                    </a>
                                    <ul>
                                        <li> <i class="ti-user"></i><?=$blog->penulis?></li>
                                        <li> <i class="ti-eye"></i><?=$blog->pengunjung?>x dilihat</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--::blog_part end::-->
            <!-- team_member part start-->
            <section class="team_member_section section_padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="section_tittle text-center">
                                <p stlye="color:white;">Pengurus Inti</p>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-auto">
                        <?php if (!$ketua && !$wakil_ketua && !$sekretaris) {
                            echo "<i class='text-center text-white'>Belum di settings</i>";
                        } ?>
                        <?php if (!empty($ketua)) { ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_team_member">
                                    <img src="<?=base_url()?>assets/data/users/<?=$ketua->gambar?>" alt="">
                                    <div class="single_team_text">
                                        <h3><b style="color:white;"><?=$ketua->nama?></b></h3>
                                        <p>KETUA</p>
                                        <div class="team_member_social_icon">
                                            <a href="https://instagram.com/<?=$ketua->instagram?>"> <i class="fab fa-instagram"></i> instagram</a>
                                            <a href="https://wa.me/<?=$ketua->whatsapp?>"> <i class="fab fa-whatsapp"></i> whatsapp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($wakil_ketua)) {  ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_team_member">
                                    <img src="<?=base_url()?>assets/data/users/<?=$wakil_ketua->gambar?>" alt="">
                                    <div class="single_team_text">
                                        <h3><b style="color:white;"><?=$wakil_ketua->nama?></b></h3>
                                        <p>WAKIL KETUA</p>
                                        <div class="team_member_social_icon">
                                            <a href="https://instagram.com/<?=$wakil_ketua->instagram?>"> <i class="fab fa-instagram"></i> instagram</a>
                                            <a href="https://wa.me/<?=$wakil_ketua->whatsapp?>"> <i class="fab fa-whatsapp"></i> whatsapp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($sekretaris)) { ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_team_member">
                                    <img src="<?=base_url()?>assets/data/users/<?=$sekretaris->gambar?>" alt="">
                                    <div class="single_team_text">
                                        <h3><b style="color:white;"><?=$sekretaris->nama?></b></h3>
                                        <p>SEKRETARIS</p>
                                        <div class="team_member_social_icon">
                                            <a href="https://instagram.com/<?=$sekretaris->instagram?>"> <i class="fab fa-instagram"></i> instagram</a>
                                            <a href="https://wa.me/<?=$sekretaris->whatsapp?>"> <i class="fab fa-whatsapp"></i> whatsapp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- team_member part end-->
        <section class="section_padding">
            <div class="container ">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Maps</p>
                    </div>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.455405873313!2d107.9216124153837!3d-6.835874968771323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e644e46a6435%3A0xc2adbda35a1a1a52!2sSTMIK%20Sumedang!5e0!3m2!1sid!2sid!4v1579273830882!5m2!1sid!2sid"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </section>