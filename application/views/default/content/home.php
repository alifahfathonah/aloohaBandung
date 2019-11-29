<div class="row">
<main class="col-md-12" id="premium">
			<div class="section_offset transparent" data-animation="fadeInDown">
 				<?php 
                $query = $this->db->query("SELECT * FROM iklan WHERE iklan_id='2' order by iklan_post DESC LIMIT 1");
                    foreach ($query->result() as $row){  
                ?>
			<a href="<?php echo $row->iklan_link; ?>" target="_blank" class="banner-top">
				<img src="<?php echo base_url(); ?>assets/images/iklan/<?php echo $row->iklan_gambar; ?>" alt="">
			</a>
			<?php } ?>
		</div>
	</main>
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
		<div class="section_offset transparent" data-animation="papercut">
			<div class="revolution_slider">
				<div class="rev_slider">
					<ul>
					<?php 
	                $query = $this->db->query("SELECT * FROM berita order by berita_waktu DESC");
	                    foreach ($query->result() as $row){  
	                ?>
						<li data-transition="slideleft" data-slotamount="7">
						<a>
							<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row->berita_foto; ?>" alt="">
					</a>
						<div class="text-slider">
						<h3><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo substr($row->berita_judul,0,120); ?>	</a></h3>
						<span><?php echo substr($row->berita_deskripsi,0,200); ?></span>
						</div>
						</li>
					<?php  } ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="section_offset">
			<div class="row">
				<div class="col-sm-6">
				<?php 
                $query = $this->db->query("SELECT * FROM iklan WHERE iklan_id='4' order by iklan_post DESC LIMIT 1");
                    foreach ($query->result() as $row){  
                ?>
					<a href="<?php echo $row->iklan_link; ?>" target="_blank" class="banner transparent" data-animation="fadeInDown">
						<img src="<?php echo base_url(); ?>assets/images/iklan/<?php echo $row->iklan_gambar; ?>" alt="">
					</a>
				<?php } ?>
				</div>
				<div class="col-sm-6">
				<?php 
                $query = $this->db->query("SELECT * FROM iklan WHERE iklan_id='5' order by iklan_post DESC LIMIT 1");
                    foreach ($query->result() as $row){  
                ?>
					<a href="<?php echo $row->iklan_link; ?>" target="_blank" class="banner transparent" data-animation="fadeInDown" data-animation-delay="150">
						<img src="<?php echo base_url(); ?>assets/images/iklan/<?php echo $row->iklan_gambar; ?>" alt="">
					</a>
				<?php } ?>

				</div>
			</div>
		</div>

		<section class="section_offset transparent" data-animation="fadeInDown">
			<h3 class="offset_title">Barang Terbaru</h3>
			<div class="owl_carousel carousel_in_tabs">
 				<?php 
                $query = $this->db->query("SELECT * FROM produk order by produk_post DESC");
                    foreach ($query->result() as $row){  
                ?>
				<div class="product_item type_2">
					<div class="image_wrap">
						<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_foto; ?>" alt="">
						<div class="actions_wrap">
							<div class="centered_buttons">
								<!--a href="#" class="button_dark_grey middle_btn quick_view" data-modal-url="modals/quick_view.html">Quick View</a-->
							</div>
						</div>
					</div>
					<div class="description">
						<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>"><?php echo substr($row->produk_nama,0,35); ?><span class="boxcategory-small"></span></a>
						<div class="clearfix product_info">
							<p class="product_price alignleft"><b>Rp.<?php echo format_rupiah($row->produk_harga); ?>,-</b></p>
						</div>
					</div>
					<div class="buttons_row">
						<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>"><button class="button_blue middle_btn">Detail Barang</button></a>
					</div>
				</div>
				<?php } ?>
				</div>
			<footer class="bottom_box">
				<a href="<?php echo base_url();?>product" class="button_grey middle_btn">Lihat Semua Barang</a>
			</footer>
		</section>

		
		<section class="section_offset transparent" data-animation="fadeInDown">
			<h3>Berita Terbaru</h3>
			<div class="table_layout">
				<div class="table_row">
                    <?php 
                	$query = $this->db->query("SELECT * FROM berita WHERE kategori_id='1' order by berita_waktu DESC ");
                    foreach ($query->result() as $row){  
                    ?>
					<div class="table_cell">
						<article class="entry">
							<a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="thumbnail entry_image">
								<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row->berita_foto; ?>" alt="">
							</a>
							<h5 class="entry_title"><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><b><?php echo substr($row->berita_judul,0,35); ?></b></a></h5>
							<div class="entry_meta">
								<span><i class="icon-calendar"></i><?php echo dateIndoNews($row->berita_waktu);?></span>
							</div>
							<p><?php echo substr($row->berita_deskripsi,0,127).'...';?></p>
						</article>
					</div>
					<?php } ?>
			</div>
			</div>
		</section>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>