<?php if( $action == 'detail' ) {?>
<?php   
$w= $berita->kategori_id;;
$query = $this->db->query("SELECT * FROM kategori WHERE kategori_id='$w'");
foreach ($query->result() as $row2){ }
?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li><a href="<?php echo base_url();?>news/cat/<?php echo $row2->kategori_id.'-'.$this->CONF->seo($row2->kategori_judul)?>"><?php echo $row2->kategori_judul; ?></a></li>
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
					<div class="alignleft">
						<span><i class="icon-calendar"></i> <?php echo inday($berita->berita_waktu); ?>, <?php echo dateIndoNews($berita->berita_waktu); ?></span>
						<span><i class="icon-user-8"></i> by <a href="#"><?php echo $berita->admin_nama; ?></a></span>
						<span><i class="icon-folder-open-empty-1"></i> <a href="<?php echo base_url();?>news/cat/<?php echo $berita->kategori_id.'-'.$this->CONF->seo($berita->kategori_judul)?>"><?php echo $berita->kategori_judul; ?></a></span>
					</div>
					<div class="alignright">
						Dibaca :
						(<?php echo $berita->berita_hits; ?> x)
					</div>
				</div>
				<div class="entry_image detail-berita">
					<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_foto; ?>" alt="">
				</div>
				<h4 class="entry_title"><a href="#"><?php echo $berita->berita_judul; ?></a></h4>
				<p align="justify"><?php echo $berita->berita_deskripsi; ?></p>
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
			<footer class="bottom_box">
				Tags: <?php $this->ADM->tagsberita("SELECT * FROM tags ORDER BY tag_judul ASC", 'tag[]', 'tag_id', 'tag_judul', $berita->tags);?>
			</footer>
		</section>
		<section class="section_offset">
			<h3>Berita Lainnya</h3>
			<div class="table_layout related_posts">
				<div class="table_row">
				 <?php 
                        $jml = $this->ADM->count_all_berita();
                         if ($jml > 0) {
                            foreach ($this->ADM->grid_all_berita('*', 'berita_waktu', 'DESC', 3, '', '', '') as $row){  
                    ?>
					<div class="table_cell">
						<article class="entry">
							<a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="entry_thumb">
								<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row->berita_foto; ?>" alt="">
							</a>
							<div class="wrapper">
								<h6 class="entry_title"><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo substr($row->berita_judul,0,35); ?></a></h6>
								<div class="entry_meta">
									<span><i class="icon-calendar"></i> <?php echo dateIndoNews($row->berita_waktu);?></span>
								</div>
							</div>
						</article>
					</div>
					<?php  } } else { ?>
					<div class="table_cell">Tidak ada Berita</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php }  else { ?>
<?php
error_reporting(0);
$w= $kategori_id;
$query = $this->db->query("SELECT * FROM kategori WHERE kategori_id='$w'");
foreach ($query->result() as $row2){ }
?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li><?php echo $row2->kategori_judul; ?></li>
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
		<h1><?php echo $row2->kategori_judul; ?></h1>
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
					<a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="thumbnail entry_image">
						<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row->berita_foto; ?>" alt="">
					</a>
					<h4 class="entry_title"><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo substr($row->berita_judul,0,54); ?></a></h4>
					<div class="entry_meta">
						<div class="alignleft">
							<span><i class="icon-calendar"></i> <?php echo dateIndoNews($row->berita_waktu); ?></span>
							<span><i class="icon-user-8"></i> by <a href="#"><?php echo $row->admin_nama; ?></a></span>
							<span><i class="icon-folder-open-empty-1"></i> <a href="<?php echo base_url();?>news/cat/<?php echo $row->kategori_id; ?>"><?php echo $row->kategori_judul; ?></a>
						</div>
					</div>
					<?php echo substr($row->berita_deskripsi,0,180).'...';?><br>
					<a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="button_grey middle_btn">Read More</a>
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