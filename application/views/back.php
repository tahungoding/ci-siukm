<?php 
$CI =& get_instance();
$CI->load->model('Dashboard_model', 'dm');
$users = $CI->dm->getById($CI->session->userdata('id_user'));
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/back/assets/images/fav-siukm.png">
        <link href="<?=base_url()?>assets/back/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/back/assets/libs/spinkit/spinkit.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        	.preloader {
        		position: fixed;
        		top: 0;
        		left: 0;
        		width: 100%;
        		height: 100%;
        		z-index: 9999;
        		background-color: #fff;
        	}

        	.preloader .loading {
        		position: absolute;
        		left: 50%;
        		top: 50%;
        		transform: translate(-50%, -50%);
        		font: 14px arial;
        	}
        </style>

        <?=isset($css_page) ? $css_page : null;?>

        <!-- App css -->
        <link href="<?=base_url()?>assets/back/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/back/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="preloader">
        	<div class="loading">
        		<div class="sk-rotating-plane"></div>
        		<p>Harap Tunggu</p>
        	</div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

          

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo">
                            <span class="logo-lg">
                                <img src="<?=base_url()?>assets/back/assets/images/logo_ukm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">Highdmin</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">H</span> -->
                                <img src="<?=base_url()?>assets/back/assets/images/logo_ukm.png" alt="" height="24">
                            </span>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <img src="<?=base_url()?>assets/data/users/<?=isset($users->gambar) ? $users->gambar : 'default.jpg' ?>"
                        	alt="user-image" class="rounded-circle" style="object-fit: cover;" height="48" width="48">
                        <div class="dropdown">
                            <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"><?=$users->nama?></a>
                        </div>
                        <p class="text-muted"><?php if ($users->level_user == '1') {
                                                echo 'Ketua';
                                            }elseif ($users->level_user == '2') {
                                                echo 'Wakil Ketua';
                                            }elseif ($users->level_user == '3') {
                                                echo 'Sekretaris';
                                            }else {
                                                echo 'Anggota';
                                            } ?></p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="<?=base_url()?>dashboard">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-users"></i>
                                    <span> Teams </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?=base_url()?>teams">Team</a></li>
                                    <li><a href="<?=base_url()?>divisis">Divisi</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-rss"></i>
                                    <span> Artikels </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?=base_url()?>blogs">Artikel</a></li>
                                    <li><a href="<?=base_url()?>categorys">Kategori</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?=base_url()?>gallerys">
                                    <i class="fe-image"></i>
                                    <span> Galeri </span>
                                </a>
                            </li>

                            <?php if ($this->session->userdata('status') != 'anggota') { ?>
                            <li>
                                <a href="<?=base_url()?>profiles">
                                    <i class="fe-link"></i>
                                    <span> Profile Web </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?=base_url()?>registers">
                                    <i class="fe-user-check"></i>
                                    <span> Pendaftaran </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>contacts">
                                    <i class="fe-inbox"></i>
                                    <span> Kotak Masukan </span>
                                </a>
                            </li>
                            <?php } ?>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topnav-menu float-right mb-0">
        

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?=base_url()?>assets/data/users/<?=isset($users->gambar) ? $users->gambar : 'default.jpg' ?>" alt="user-image" class="rounded-circle" style="object-fit: cover;">
                                    <span class="pro-user-name ml-1">
                                            Hai, <?=$users->nama?>  <i class="mdi mdi-chevron-down"></i> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                            <h6 class="text-overflow m-0">See u !</h6>
                                        </div>

                                        <!-- item-->
                                        <a href="<?=base_url()?>login/logout" class="dropdown-item notify-item">
                                            <i class="fe-log-out"></i> <span>Logout</span>
                                        </a>

                                </div>
                            </li>

                        </ul>

   

                        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                            <li>
                                <button class="button-menu-mobile disable-btn">
                                    <i class="fe-menu"></i>
                                </button>
                            </li>

                            <li>
                                <h4 class="page-title-main"><?php echo ucfirst($this->uri->segment(1))?></h4>
                                <ol class="breadcrumb">
                                    <?php foreach ($this->uri->segments as $segments) {   
                                        $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segments)) . $segments;
                                        $active = $url == $this->uri->uri_string;

                                        if ($active) {
                                            echo '<li class="breadcrumb-item" active>'.ucfirst($segments).'</li>';
                                        }else{
                                            echo '<li class="breadcrumb-item"><a href="'.base_url($url).'">'.ucfirst($segments).'</a></li>';
                                        }

                                        ?>
                                    <?php } ?>
                                    
                                    
                                </ol>
                            </li>
        
                        </ul>
                    </div>
                    <!-- end Topbar -->

                    <?php $this->load->view($contents);?>

                     <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                              2020 &copy; All Right Reserved <a href="https://instagram.com/tahungoding" target="_blank">TAHUNGODING</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?=base_url()?>assets/back/assets/js/vendor.min.js"></script>
        <script src="<?=base_url()?>assets/back/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        
        <!-- Plugin js-->
        <script src="<?=base_url()?>assets/back/assets/libs/parsleyjs/parsley.min.js"></script>
        
        <!-- Validation init js-->
        <script src="<?=base_url()?>assets/back/assets/js/pages/form-validation.init.js"></script>

        <?=isset($js_page) ? $js_page : null ;?>

        <!-- App js -->
        <script src="<?=base_url()?>assets/back/assets/js/app.min.js"></script>

        <script>
            $(document).ready(function () {
                $(".preloader").fadeOut();
            })
        </script>
        
    </body>
</html>