   <!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/contact.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>kontak</h2>
                            <p><a href="<?=base_url()?>" style="color:white;">Home</a><span>//</span>kontak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.455405873313!2d107.9216124153837!3d-6.835874968771323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e644e46a6435%3A0xc2adbda35a1a1a52!2sSTMIK%20Sumedang!5e0!3m2!1sid!2sid!4v1579273830882!5m2!1sid!2sid"
          width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Kritik dan Saran</h2>
        </div>
        <div class="col-md-12">
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
        <div class="col-lg-8">
          <form class="form-contact" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subjek" id="subject" type="text" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Judul'" placeholder = 'Judul'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="isi" id="message" required cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan pesan'" placeholder = 'Masukan pesan'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="nama" id="name" type="text" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama anda'" placeholder = 'Nama anda'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email anda'" placeholder = 'Email anda'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                <?php 
								$nilai1 = rand(10,99);
								$nilai2 = rand(10,99);
								?>
								<input type="hidden" name="nilai1" value="<?=$nilai1;?>">
								<input type="hidden" name="nilai2" value="<?=$nilai2;?>">
                                <input type="text" name="hasil" placeholder="<?=$nilai1?> + <?=$nilai2;?> = " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '<?=$nilai1?> + <?=$nilai2;?> = '" required class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="addIdea" class="button button-contactForm btn_4">Kirim Pesan</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3><?=$profiles->alamat?></h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><?=$profiles->telp?></h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><?=$profiles->email;?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->