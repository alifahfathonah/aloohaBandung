<ul class="breadcrumbs">
	<li><a href="index.html">Home</a></li>
	<li>Sitemap</li>
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
		
		

	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>