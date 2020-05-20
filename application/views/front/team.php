    <!-- breadcrumb start-->
     <section class="breadcrumb " style="background-image : url(<?=base_url()?>assets/front/img/add/anggota.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Team anggota</h2>
                            <p><a href="<?=base_url()?>" style="color:white;">Home</a> <span>//</span>team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- happy_client counter start -->
    
    <section class="team_member_section section_padding white_bg teams-search">
        <div class="container">
        <div class="row justify-content-center ">
                <form method="get" class="forms-search">
                	<div class="search">
                		<input type="text" name="keyword" class="searchTerm" value="<?=$this->input->get('keyword')?>" placeholder="Cari berdasarkan nama">
                		<button type="submit" class="searchButton">
                			<i class="fa fa-search"></i>
                		</button>
                	</div>
                </form>
        </div>
        <br><br>

            <div class="row">
            <?php
            if(!$teams){
                echo "<i>Belum ada data</i>";
            }
            foreach ($teams as $team) { ?>
                <div class="col-lg-4 col-sm-6 mt-4">
                    <div class="single_team_member">
                        <img src="<?=base_url()?>assets/data/users/<?=$team->gambar?>" alt="">
                        <div class="single_team_text">
                            <h3><a href="" style="color: black;cursor: unset;"> <?=$team->nama;?></a></h3>
                            <p><?=$team->nama_divisi?></p>
                            <div class="team_member_social_icon">
                            <a href="https://instagram/<?=$team->instagram?>"> <i class="fab fa-instagram"></i> instagram</a>
                            <a href="https://wa.me/<?=$team->whatsapp?>"> <i class="fab fa-whatsapp"></i> whatsapp</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="text-center mt-5">
            <?=$pagination?>
            </div>
        </div>
    </section>
    <!-- happy_client counter end -->