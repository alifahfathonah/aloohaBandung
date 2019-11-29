<?php if( $action == 'detail' ) {?>

<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li><a href="<?php echo base_url();?>albums">Galeri</a></li>
	<li><?php echo $berita->berita_judul; ?></li>
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
			<h1><?php echo $berita->berita_judul; ?></h1>
			<article class="entry single">
				<div class="entry_meta">
				</div>
				<div class="image_preview_container product-img">
					<img id="img_zoom"  src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto; ?>"  alt="">
					<button class="button_grey_2 icon_btn middle_btn open_qv"><i class="icon-resize-full-6"></i></button>
				</div>
				<div class="product_preview">
					<div class="owl_carousel" id="thumbnails">
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto2; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto2; ?>">
							<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto2; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto2; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto3; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto3; ?>">
							<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto3; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto3; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto4; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto4; ?>">
							<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto4; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto4; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto5; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto5; ?>">
							<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto5; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto5; ?>">
						</a>
					</div>
				</div>
				<h4 class="entry_title"><a href="#"><?php echo $berita->berita_judul; ?></a></h4>
				<!--div class="v_centered share">
					<span class="title">Share this:</span>
					<div class="addthis_widget_container">
						<ul class="social_btns">
							<li>
								<a href="#" class="icon_btn middle_btn social_facebook tooltip_container"><i class="icon-facebook-1"></i><span class="tooltip top">Facebook</span></a>
							</li>
							<li>
								<a href="#" class="icon_btn middle_btn  social_twitter tooltip_container"><i class="icon-twitter"></i><span class="tooltip top">Twitter</span></a>
							</li>
							<li>
								<a href="#" class="icon_btn middle_btn social_googleplus tooltip_container"><i class="icon-gplus-2"></i><span class="tooltip top">GooglePlus</span></a>
							</li>
							<li>
								<a href="#" class="icon_btn middle_btn social_youtube tooltip_container"><i class="icon-youtube"></i><span class="tooltip top">Youtube</span></a>
							</li>
							<li>
								<a href="#" class="icon_btn middle_btn social_instagram tooltip_container"><i class="icon-instagram-4"></i><span class="tooltip top">Instagram</span></a>
							</li>
						</ul>
					</div>
				</div-->
			</article>
		</section>
	
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php }  else { ?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Galeri</li>
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
		<h1>Berita Foto</h1>
		<ul id="main_blog_list" class="list_of_entries grid_view">
		  <?php 
            $i  = $page+1;
            $where_kategori['k.kategori_id'] = $kategori_id;
            $where                      = (empty($kategori_id))?'': $where_kategori;
            if ($jml_data > 0){
            foreach ($this->ADM->grid_all_berita('*', 'berita_id', 'DESC', $batas, $page, $where, '') as $row){
        	?>  
			<li>
				<article class="entry">
					<a href="<?php echo base_url();?>albums/galeri/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="thumbnail entry_image">
						<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row->berita_foto; ?>" alt="">
					</a>
					<h4 class="entry_title"><a href="<?php echo base_url();?>albums/galeri/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo $row->berita_judul; ?></a></h4>
				</article>
			</li>
		
        <?php 
             $i++; 
             }                                               
        ?>                                                        
        <?php } else {  ?>
        <b> Tidak Ada Berita</b>
        <?php } ?>
		</ul>
		<footer class="bottom_box on_the_sides">
			<div class="right_side">
				<ul class="pags">
					<?php if ($jml_halaman > 1){ echo pages2($halaman, $jml_halaman, 'news/index', $id=""); }?>    
				</ul>
			</div>
		</footer>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php } ?>