<ul class="breadcrumbs">
	<li><a href="<?php echo site_url();?>home">Home</a></li>
	<li>Forgot Password</li>
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
			<h3>Forgot Password</h3>

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
				<form class="type_2" action="<?php echo site_url();?>account/forgot_password" method="post" name="formLogin" id="form">
					<ul>
						<li class="row">
							<div class="col-sm-12">
								<input type="email" name="account_email" id="account_email" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Email" autocomplete="off" />
							</div>	
						</li>
					</ul>
			</div>
			<footer class="bottom_box on_the_sides">
				<div class="left_side">
						<input type="submit" class="button_blue middle_btn" name="kirim" value="Forgot Password"/>
				</div>
				</form>
			</footer>
		</section>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>