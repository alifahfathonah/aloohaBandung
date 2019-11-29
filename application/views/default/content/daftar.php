<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Pendaftaran User Baru</li>
</ul>
<div class="row">
	<!-- - - - - - - - - - - - - - Box - - - - - - - - - - - - - - - - -->
	<aside class="col-md-3 col-sm-4 has_mega_menu">
		<?php 
        	if ($boxtodaydeals == TRUE) {
            	$this->load->view('default/box/box-todaydeals');
        	} 
        	if ($boxkategori == TRUE) {
            	$this->load->view('default/box/box-kategori');
        	} 
        	if ($boxiklan == TRUE) {
            	$this->load->view('default/box/box-iklan');
        	} 
			if ($boxprodukterbaru == TRUE) {
            	$this->load->view('default/box/box-produkterbaru');
        	} 
        	if ($boxtags == TRUE) {
            	$this->load->view('default/box/box-tags');
        	} 
			if ($boxpopularpost == TRUE) {
            	$this->load->view('default/box/box-popularpost');
        	} 
			if ($boxtestimonial == TRUE) {
            	$this->load->view('default/box/box-testimonial');
        	} 
			if ($boxnewsletter == TRUE) {
            	$this->load->view('default/box/box-newsletter');
        	} 
		?>
	</aside>
	<!-- - - - - - - - - - - - - - End Box - - - - - - - - - - - - - - - - -->

	<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
	<main class="col-md-9 col-sm-8">
					<section class="section_offset">
						<h3>Pendaftaran User Baru</h3>
						<div class="theme_box">
				<!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                   			 <div class="alert_box success">
                                <b><?php echo $this->session->flashdata('success'); ?></b>
									<button class="close"></button>
								</div><!--/ .alert_box.warning -->
                        <?php } else if ($this->session->flashdata('info')) { ?>
                             <div class="alert_box info">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                             <div class="alert_box warning">
                                <b><?php echo $this->session->flashdata('warning'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else { ?>
                        	<div class="alert_box error">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } ?>
                    <?php } ?><br>
                    <!-- ========== End Flashdata ========== -->
							<form class="type_2" action="<?php echo site_url();?>account/daftar" method="post" enctype="multipart/form-data">
								<ul>
									<li class="row">
										<div class="col-sm-6">
											<label for="account_email" class="required">EMAIL</label>
											<input type="email" name="account_email" value="<?php echo $account_email;?>" required id="account_email">
										</div><!--/ [col] -->
										<div class="col-sm-6">
											<label for="account_password1" class="required">PASSWORD</label>
											<input type="password" name="account_password1" value="<?php echo $account_password1;?>" required id="account_password1">
										</div><!--/ [col] -->
									</li><!--/ .row -->
									<li class="row">
										<div class="col-xs-12">
											<label for="account_nama" class="required">NAMA PENJUAL</label>
											<input type="text" name="account_nama" value="<?php echo $account_nama;?>" required id="account_nama">
										</div><!--/ [col] -->
									</li><!--/ .row -->
									<li class="row">
										<div class="col-sm-6">
											<label for="account_tlp" class="required">TELEPON/HP</label>
											<input type="text" name="account_tlp" value="<?php echo $account_tlp;?>" required id="account_tlp">
										</div><!--/ [col] -->
										<div class="col-sm-6">
											<label for="account_jk">JENIS KELAMIN</label><br>
											<input type="radio"  checked=""  name="account_jk" id="L" value="L"> 
											<label for="L">Laki-laki</label>
											  <input type="radio" name="account_jk" id="P" value="P">
											<label for="P">Perempuan</label>
										</div><!--/ [col] -->
									</li><!--/ .row -->
									<li class="row">
										<div class="col-xs-12">
											<label for="account_alamat" class="required">ALAMAT</label>
											<textarea name="account_alamat" required id="account_alamat"><?php echo $account_alamat;?></textarea>
										</div><!--/ [col] -->

									</li><!--/ .row -->
									<li class="row">
										<div class="col-sm-6">
											<label for="provinsi_id" class="required">Provinsi</label>
											<?php $this->ADM->combo_box("SELECT * FROM provinsi", 'provinsi_id', 'provinsi_id', 'provinsi_nama', $provinsi_id, 'submit();');?>
										</div><!--/ [col] -->
										<div class="col-sm-6">
											<label for="kota_id" class="required">Kota</label>
                                      <?php if ($provinsi_id == $provinsi_id) {?>
                                                <?php $this->ADM->combo_box("SELECT * FROM kota WHERE provinsi_id='$provinsi_id'", 'kota_id', 'kota_id', 'kota_nama', $kota_id);?>
                                    <?php } ?>
										</div><!--/ [col] -->

									<li class="row">
										<div class="col-xs-12">
											<label for="account_foto" class="required">FOTO </label>
											<input type="file" name="account_foto" required id="account_foto">
										</div><!--/ [col] -->
									</li><!--/ .row -->

								</ul>

						</div>

							<footer class="bottom_box on_the_sides">
								<div class="left_side">
	                            <input class="button_blue middle_btn" type="submit" name="simpan" value="Daftar">
								</div>
				<div class="right_side">
					<span class="prompt">Wajib diisi</span>
				</div>
				</form>
			</footer>
		</section>

	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>