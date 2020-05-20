
                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                         <!-- SECTION FILTER
                        ================================================== -->
                    
                        <div class="row justify-content-md-center">
                            <a href="<?=base_url()?>blogs/add" class="btn btn-info waves-light waves-effect" style="height: 37px;margin-bottom: 10px;margin-left: 12px;"><i class="far fa-newspaper"></i> Tambah</a>
                            <div class="col-md-auto">
                                <div class="filter-menu">
                                        <form method="GET" class="app-search">
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <input  name="keyword" type="text" class="form-control" placeholder="Search..." value="<?=isset($keyword) ? $keyword : null?>">
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
                                <div class="text-center filter-menu">
                                <?php 
                                $all = 'active';
                                if(!empty($_GET['kategori'])){
                                $all = null;
                                } 
                                if (!empty($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }else{
                                    $pages = null;
                                }
                                ?>
                                
                                    <a href="<?=isset($_GET['keyword']) ? 'blogs?keyword='.$_GET["keyword"].'&kategori='.'&pages='.$pages :  null; ?>" data-rel="all" class="filter-menu-item <?=$all?>">All</a>
                                    <?php foreach ($categorys as $kategori) { 
                                    $filter = null;
                                    if (!empty($_GET['kategori'])) {
                                        if ($_GET['kategori'] == $kategori->nama) {
                                            $filter = 'active';
                                        }
                                    }
                                    if (!empty($_GET['keyword'])) {
                                        $keyword = $_GET['keyword'];
                                    }else{
                                        $keyword = null;
                                    }    
                                        ?>
                                        <a href="blogs?keyword=<?=$keyword?>&kategori=<?=$kategori->nama?>&pages="  data-rel="<?=$kategori->nama?>" data-rel="<?=$kategori->nama?>" class="filter-menu-item <?=$filter?>"><?=$kategori->nama?> </a>
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
                            </div>
                        </div>

                        <?php if (!$lists) { ?>
                                <div class="col-lg-12 mt-50 justify-content-center">
                                    <h3 class="text-center text-muted">
                                        Belum ada data
                                    </h3>
                                </div>
                        <?php } ?>
                        <div class="port filterable-content ">
                                <div class="card-columns">
                                    <?php foreach ($lists as $list) { ?>
                                            <div class="card filter-item all <?=$list->penulis?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="<?=base_url()?>blog/<?=$list->slug?>" target="_blank"><?=$list->judul?></a></h5>
                                                    <h6 class="card-subtitle text-muted"><?=$list->penulis?></h6>
                                                    <?php if ($list->id_user == $this->session->userdata('id_user') || $this->session->userdata('status') == 'ketua') { ?>
                                                        <h6 class="card-subtitle text-muted text-right">
                                                            <a href="<?=base_url()?>blogs/edit/<?=$list->id_artikel?>" class="fa fa-pencil-alt text-muted" data-toggle="tooltip" title="Edit"></a> 
                                                            &nbsp;&nbsp;
                                                            <form action="" method="post"
                                                            	name="form<?=$list->id_artikel?>"
                                                            	style="display: inline-block">
                                                            <input type="hidden" name="deleteBlogs">
                                                                <input type="hidden" name="id_artikel" value="<?=$list->id_artikel?>">
                                                                <button
                                                                	onclick="confirmDelete(<?=$list->id_artikel?>, event)"
                                                                	type="submit" style="all: unset;"><i
                                                                		class="fa fa-trash-alt text-muted"
                                                                		style="cursor: pointer;" data-toggle="tooltip"
                                                                		title="Hapus"></i> </button>
                                                            </form>
                                                        </h6>
                                                    <?php } ?>
                                                </div>
                                                <img class="img-fluid" src="<?=base_url()?>assets/data/artikel/<?=$list->thumbnail?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <div class="card-text artikel-ellipsis"><?=$list->isi?></div>
                                                    <p class="card-text">
                                                        <small
                                                        	class="text-muted"><?=longdate_indo(date('Y-m-d', strtotime($list->created_at)))?></small>
                                                    </p>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>

                                <?=$pagination;?>

                                             
                        </div> <!-- End row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->