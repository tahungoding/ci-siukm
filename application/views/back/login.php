<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/back/assets/images/fav-siukm.png">

    <!-- App css -->
    <link href="<?=base_url()?>assets/back/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/back/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg"
        style="background: url(<?=base_url()?>assets/back/assets/images/bg-3.jpg);background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card shadow-none">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box shadow-none p-4 mt-2">

                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert alert-danger">
                                <?=$this->session->flashdata('msg')?>
                            </div>
                        <?php } ?>
                        
                        <h2 class="text-uppercase text-center pb-3">
                            <a href="index.html" class="text-success">
                                <span><img src="<?=base_url()?>assets/back/assets/images/logo_ukm.png" alt="" height="26"></span>
                            </a>
                        </h2>

                        <form method="POST">

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="emailaddress">Username</label>
                                    <input class="form-control" type="text" name="username" id="emailaddress" required=""
                                        placeholder="Masukan username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" required="" id="password"
                                        placeholder="Masukan Password">
                                </div>
                            </div>

                            
                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <button class="btn btn-block btn-primary waves-effect waves-light"
                                    type="submit" name="masuk">Masuk</button>
                                </div>
                            </div>
                            
                        </form>
                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Lupa password ? <b class="text-dark ml-1">Hubungi admin.</b>                                        </p>
                                    </div>
                                </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <p class="account-copyright">2020 &copy; All Right Reserved <a href="https://instagram.com/tahungoding"><b>TAHU</b>NGODING </a></p>
        </div>

    </div>

    <!-- Vendor js -->
    <script src="<?=base_url()?>assets/back/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url()?>assets/back/assets/js/app.min.js"></script>

</body>

</html>