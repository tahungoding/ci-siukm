	<!-- breadcrumb start-->
    <section class="breadcrumb" style="background-image : url(<?=base_url()?>assets/front/img/add/register.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
							<h2>Pendaftaran</h2>
                            <p><a href="<?=base_url()?>" style="color:white;">Home</a> <span>//</span>Pendaftaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- End banner Area -->

	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<div class="row">
					<div class="col-md-8">
					<?php if ($profiles->pendaftaran == 1) { ?>
						<h3 class="mb-30">Form Pendaftaran</h3>
						<?php if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success">
							<?=$this->session->flashdata('success')?>
						</div>
						<?php } ?> <?php if ($this->session->flashdata('error')){ ?>
							<div class="alert alert-danger">
								<?=$this->session->flashdata('error')?>
							</div>  
						<?php } ?>
						<form method="POST">
							<div class="mt-10">
								<input type="number" name="nim" placeholder="NIM contoh: 1800001"
									value=<?=isset($_POST['nim']) ? $_POST['nim'] : null;?> onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'NIM contoh: 1800001'"
								 required class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="nama" placeholder="Nama Lengkap" value="<?=isset($_POST['nama']) ? $_POST['nama'] : null;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'"
								 required class="single-input">
							</div>

							<div class="mt-10">
								<textarea class="single-textarea" name="alamat" value="<?=isset($_POST['alamat']) ? $_POST['alamat'] : null;?>" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
								 required></textarea>
							</div>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-book-reader" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select">
								<select name="program_studi">
									<option >-- Program Studi -- </option>
									<option value="Teknik Informatika" <?php if(!empty($_POST['program_studi'])){ if($_POST['program_studi'] == 'Teknik Informatika'){ echo 'required'; } }  ?>>Teknik Informatika</option>
									<option value="Sistem Informasi" <?php if(!empty($_POST['program_studi'])){ if($_POST['program_studi'] == 'Sistem Informasi'){ echo 'required'; } }  ?>>Sistem Informasi</option>
									<option value="Manajemen Informatika" <?php if(!empty($_POST['program_studi'])){ if($_POST['program_studi'] == 'Manajemen Informatika'){ echo 'required'; } }  ?>>Manajemen Informatika</option>
									</select>
								</div>
							</div>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-school" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
								<select name="angkatan">
									<option >-- Angkatan -- </option>
									<?php 
									$date = date('Y');
									$date = date('Y', strtotime($date));
									$i = $date - 3;
									$t = $date;
									for ($i; $i <= $t; $i++) { ?>
									<option value="<?=$i?>" <?php if(!empty($_POST['angkatan'])){ if($_POST['angkatan'] == $i) { echo 'required';} }  ?>><?=$i?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="mt-10">
								<textarea class="single-textarea" name="alasan" placeholder="Alasan bergabung" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alasan bergabung'"
								 required><?=isset($_POST['alasan']) ? $_POST['alasan'] : null;?></textarea>
							</div>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fab fa-hubspot" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select">
								<select name="divisi">
									<option >-- Divisi yang diinginkan -- </option>
									<?php foreach ($divisi as $divisis) { ?>
									<option value="<?=$divisis->id_divisi?>" <?php if(!empty($_POST['divisi'])){ if($_POST['divisi'] == $divisis->id_divisi) { echo 'required';} }  ?>><?=$divisis->nama?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="mt-10">
								<input type="number" name="no_hp" placeholder="No hp yang bisa dihubungi"
									value=<?=isset($_POST['no_hp']) ? $_POST['no_hp'] : null;?> onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'No hp yang bisa dihubungi'" required class="single-input">
							</div>
                            <div class="mt-10">
								<?php 
								$nilai1 = rand(10,99);
								$nilai2 = rand(10,99);
								?>
								<input type="hidden" name="nilai1" value="<?=$nilai1;?>">
								<input type="hidden" name="nilai2" value="<?=$nilai2;?>">
                                <input type="text" name="hasil" placeholder="<?=$nilai1?> + <?=$nilai2;?> = " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '<?=$nilai1?> + <?=$nilai2;?> = '" required class="single-input">
                            </div>
							<div class="button-group-area mt-40">
								<button name="addRegister" type="submit" class="genric-btn primary default">Submit</button>
							</div>
						</form>
					<?php }else{ ?>
						<div class="alert alert-danger">
							Mohon maaf pendaftaran sedang ditutup, terimakasih.
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Align Area -->