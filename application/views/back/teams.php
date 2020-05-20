                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                         <!-- SECTION FILTER
                        ================================================== -->
                    
                        <div class="row justify-content-md-center">
                        <?php if ($this->session->userdata('status') != 'anggota') { ?>
                            <a href="<?=base_url()?>teams/add" class="btn btn-info waves-light waves-effect" style="height: 37px;margin-bottom: 10px;margin-left: 12px;"><i class="fe-user-plus"></i> Tambah</a>
                        <?php } ?>
                            <div class="col-md-auto">
                                <div class="filter-menu">
                                        <form method="GET" class="app-search">
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <input type="text" name="keyword" class="form-control" value="<?=isset($keyword) ? $keyword : null?>" placeholder="Search..." >
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="fe-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center filter-menu">
                                <?php 
                                $all = 'active';
                                if(!empty($_GET['divisi'])){
                                $all = null;
                                } 
                                if (!empty($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }else{
                                    $pages = null;
                                }
                                ?>
                                
                                    <a href="<?=isset($_GET['keyword']) ? 'teams?keyword='.$_GET["keyword"].'&divisi='.'&pages='.$pages :  null; ?>" data-rel="all" class="filter-menu-item <?=$all?>">All</a>
                                    <?php foreach ($divisis as $divisi) { 
                                    $filter = null;
                                    if (!empty($_GET['divisi'])) {
                                        if ($_GET['divisi'] == $divisi->nama) {
                                            $filter = 'active';
                                        }
                                    }
                                    if (!empty($_GET['keyword'])) {
                                        $keyword = $_GET['keyword'];
                                    }else{
                                        $keyword = null;
                                    }    
                                        ?>
                                        <a href="teams?keyword=<?=$keyword?>&divisi=<?=$divisi->nama?>&pages="  data-rel="<?=$divisi->nama?>" data-rel="<?=$divisi->nama?>" class="filter-menu-item <?=$filter?>"><?=$divisi->nama?> </a>
                                    <?php } ?>
                                
                                </div>
                            </div>
                        </div>

                        <div class="port filterable-content ">
                        <?php if (!$teams) { ?>
                            <h3 class="text-center text-muted" style="margin-top:50px;">Belum ada data</h3>
                        <?php } ?>
                        <div class="row mt-3 mb-3">
                            <?php foreach ($teams as $team) { ?>
                            <div class="col-lg-3">
                                <div class="text-center ribbon-box card filter-item all <?=$team->nama_divisi?>">
                                    <div class="ribbon-two ribbon-two-dark"><span><?=$team->nama_divisi?></span></div>
                                    <div class="member-card  text-truncate">
                                        
                                        <div class="thumb-lg member-thumb mx-auto mt-4">
                                            <a href="<?php if ($team->id_user == $this->session->userdata('id_user')) { 
                                              echo base_url('dashboard');
                                            } else{ 
                                              echo base_url().'teams/detail/'.$team->id_user;
                                             } ?> " target="_blank">
                                            <img src="<?=base_url()?>assets/data/users/<?=isset($team->gambar) ? $team->gambar : 'default.jpg' ?>"
                                                class="rounded-circle avatar-xl img-thumbnail"
                                                alt="profile-image">
                                            </a>


                                        </div>
                        
                                        <div class="">
                                            <a href="<?php if ($team->id_user == $this->session->userdata('id_user')) { 
                                              echo base_url('dashboard');
                                            } else{ 
                                              echo base_url().'teams/detail/'.$team->id_user;
                                             } ?> " target="_blank"><h4><?=$team->nama?></h4> </a>
                                            <p class="text-muted"><?=$team->username?> <span> | </span> <span> <?php if ($team->level_user == '1') {
                                                echo 'Ketua';
                                            }elseif ($team->level_user == '2') {
                                                echo 'Wakil Ketua';
                                            }elseif ($team->level_user == '3') {
                                                echo 'Sekretaris';
                                            }else {
                                                echo 'Anggota';
                                            } ?> </span></p>
                                        </div>
                        
                                        <ul class="social-links list-inline mb-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://instagram.com/<?=$team->instagram?>"
                                                    data-original-title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://wa.me/<?=$team->whatsapp?>"
                                                    data-original-title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                                            </li>
                                        </ul>
                        
                                    </div>
                        
                                </div>
                        
                            </div> <!-- end col -->
                            <?php } ?>

                        </div>
                        <!-- end row -->

                        <?=$pagination;?>

                        </div> <!-- End row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->