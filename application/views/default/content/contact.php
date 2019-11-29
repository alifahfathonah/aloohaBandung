
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Kontak</li>
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
			<h3>Hubungi Kami</h3>
			<div class="theme_box">
				<div class="row">
					<div class="col-sm-5">
						<div class="proportional_frame">
							<div id="map"></div> 
						</div>
					</div>
					<div class="col-sm-7">
						<p class="form_caption">Kami membutuhkan saran dan kritik untuk dapat memberikan layanan yang terbaik untuk Anda.</p>
						<ul class="c_info_list">
							<li class="c_info_location"><?php echo $web->identitas_alamat;?></li>
							<li class="c_info_phone"><?php echo $web->identitas_notelp;?></li>
							<li class="c_info_mail"><a href="mailto:#"><?php echo $web->identitas_email;?></a></li>
							<li>	<a href="<?php echo $web->identitas_fb;?>" class="icon_btn middle_btn social_facebook tooltip_container" target="_blank"><i class="icon-facebook-1"></i><span class="tooltip top">Facebook</span></a>
											<a href="<?php echo $web->identitas_tw;?>"  target="_blank" class="icon_btn middle_btn social_twitter tooltip_container"><i class="icon-twitter"></i><span class="tooltip top">Twitter</span></a>
											<a href="<?php echo $web->identitas_ig;?>"  target="_blank" class="icon_btn middle_btn social_instagram tooltip_container"><i class="icon-instagram-4"></i><span class="tooltip top">Instagram</span></a>
											<a href="<?php echo $web->identitas_gp;?>"  target="_blank" class="icon_btn middle_btn social_googleplus tooltip_container"><i class="icon-gplus-2"></i><span class="tooltip top">GooglePlus</span></a>
											<a href="<?php echo $web->identitas_yb;?>"  target="_blank" class="icon_btn middle_btn social_youtube tooltip_container"><i class="icon-youtube"></i><span class="tooltip top">Youtube</span></a>
							</li>
						</ul>

					</div>
				</div>
			</div>
		</section>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div> <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript">
              
//              menentukan koordinat titik tengah peta
              var myLatlng = new google.maps.LatLng(<?php echo $web->identitas_maps;?>);
 
//              pengaturan zoom dan titik tengah peta
              var myOptions = {
                  zoom: 13,
                  center: myLatlng
              };
              
//              menampilkan output pada element
              var map = new google.maps.Map(document.getElementById("map"), myOptions);
              
//              menambahkan marker
              var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title:"<?php echo $web->identitas_website;?>"
              });
        </script>