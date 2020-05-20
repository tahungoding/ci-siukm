<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <link rel="icon" href="<?=base_url()?>assets/data/profiles/<?=$profiles->favicon?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/slick.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/all.css">

    <!-- css_page -->
    <?=isset($css_page) ? $css_page : null ;?>

    <!-- style CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/css/style.css">

    <style>
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
        transform: translate(-50%,-50%);
        font: 14px arial;
        }
    </style>
    


</head>

<body>
    <div class="preloader">
    	<div class="loading">
    		<img src="<?=base_url()?>assets/front/img/loader2.gif" width="80">
    		<p>Harap Tunggu</p>
    	</div>
    </div>
    <!--::header part start::-->
    <header class="main_menu <?=isset($home_menu) ? $home_menu : null ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?=base_url()?>"> <img src="<?=base_url()?>assets/data/profiles/<?=$profiles->logo?>" alt="logo" style="height:70px;object-fit: cover;" > <b style="font-size:30px;position: absolute;bottom: 25px;left:10%;" class="hide-title scroll" id="nav-1"><?=$profiles->webname;?></b> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?=base_url()?>">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?=base_url()?>team">Team</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Artikel
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($kategori as $kategoris) { ?>
                                        <a class="dropdown-item" href="<?=base_url()?>blog?kategori=<?=$kategoris->nama?>"><?=$kategoris->nama?></a>
                                    <?php } ?>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>gallery">Galeri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>register">Pendaftaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>contact">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php $this->load->view($contents);?>

    <!-- footer part start-->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="single-footer-widget footer_1" >
                    <h4>Alamat</h4>
                    <div style="color:white">
                        <?=$profiles->alamat?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>Akses Cepat</h4>
                    <ul>
                        <li> <a href="<?=base_url()?>blog" class="text-white">Artikel</a> </li>
                        <li> <a href="<?=base_url()?>gallery" class="text-white">Galeri</a> </li>
                        <li> <a href="<?=base_url()?>register" class="text-white">Pendaftaran</a> </li>
                        <li> <a href="<?=base_url()?>contact" class="text-white">Kontak</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-xl-3">
                <div class="single-footer-widget footer_2">
                    <h4>Sosial Media</h4>
                    <ul>
                        <li></li>
                    </ul>
                    <div class="social_icon">
                        <a href="https://facebook.com/<?=$profiles->facebook?>"> <i class="ti-facebook"></i> </a>
                        <a href="https://twitter.com/<?=$profiles->twitter?>"> <i class="ti-twitter-alt"></i> </a>
                        <a href="https://instagram.com/<?=$profiles->instagram?>"> <i class="ti-instagram"></i> </a>
                        <a href="#"> <i class="ti-whatsapp"></i> </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a> x <a href="https://instagram.com/tahungoding" style="color:#f3b630" target="_blank">TAHUNGODING</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?=base_url()?>assets/front/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
        <script>
        	$(document).ready(function () {
        		$(".preloader").fadeOut();
        	})
        </script>
    <script src="<?=base_url()?>assets/front/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?=base_url()?>assets/front/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?=base_url()?>assets/front/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?=base_url()?>assets/front/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?=base_url()?>assets/front/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?=base_url()?>assets/front/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>assets/front/js/owl.carousel2.thumbs.min.js"></script>
    <!-- swiper js -->
    <script src="<?=base_url()?>assets/front/js/slick.min.js"></script>

    <!-- js_page -->
    <?=isset($js_page) ? $js_page : null ;?>

    <!-- custom js -->
    <script src="<?=base_url()?>assets/front/js/custom.js"></script>
</body>

</html>