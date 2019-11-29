<?php if( $action == 'detail' ) {?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.7&appId=530737950380626";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li><a href="<?php echo base_url();?>product">Barang</a></li>
	<li><?php echo $produk->produk_nama; ?></li>
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
		<h1>Detail Barang</h1>
		<div class="clearfix">
			<div class="single_product">
				<div class="image_preview_container product-img">
					<img id="img_zoom" data-zoom-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto; ?>" src="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto; ?>" alt="">
					<button class="button_grey_2 icon_btn middle_btn open_qv"><i class="icon-resize-full-6"></i></button>
				</div>
				<div class="product_preview">
					<div class="owl_carousel" id="thumbnails">
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto2; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto2; ?>">
							<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto2; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto2; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto3; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto3; ?>">
							<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto3; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto3; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto4; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto4; ?>">
							<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto4; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto4; ?>">
						</a>
						<a href="#" data-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto5; ?>" data-zoom-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto5; ?>">
							<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto5; ?>" alt="" data-large-image="<?php echo base_url(); ?>assets/images/produk/<?php echo $produk->produk_foto5; ?>">
						</a>
					</div>
				</div>
				<!--div class="v_centered">
					<div class="addthis_widget_container">
				</-->
				<div id="fb-root"></div>
			</div>
			<div class="single_product_description">
				<h3 class="offset_title"><a href="#"><?php echo $produk->produk_nama; ?></a></h3>
				<div class="description_section v_centered">
					<ul class="topbar">
						<li><a href="<?php echo base_url();?>product/category/<?php echo $produk->katproduk_id.'-'.$this->CONF->seo($produk->katproduk_nama)?>"><?php echo $produk->katproduk_nama; ?></a></li>
					</ul>
				</div>
				<div class="description_section">
					<table class="product_info">
						<tbody>
							<tr>
								<td>Kondisi: </td>
								<td><a href="#"><?php echo ($produk->produk_kondisi == 'B')?'Baru':'Bekas'; ?></a></td>
							</tr>
							<tr>
								<td>Dilihat: </td>
								<td><a href="#"><?php echo $produk->produk_hits; ?></a> kali</td>
							</tr>
							<tr>
								<td>Update Terakhir: </td>
								<td><a href="#"><?php echo dateIndo($produk->produk_post); ?></a></td>
							</tr>
							<tr style="margin-top=20px;">
								<td>Bagikan: </td>
								<td colspan="2">
								<div class="fb-share-button" data-href="<?php echo base_url();?>product/detail<?php echo $produk->produk_id.'/'.$this->CONF->seo($produk->produk_nama)?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" >Bagikan</a></div>
								<iframe
								  src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=<?php echo base_url();?>product/detail<?php echo $produk->produk_id.'/'.$this->CONF->seo($produk->produk_nama)?>"
								  width="140"
								  height="37"
								  title="Twitter Tweet Button"
								  style="border: 0; overflow: hidden;">
								</iframe>
								</td>
							</tr> 
						</tbody>
					</table>
				</div>
				<div class="description_section">
					<div class="table_wrap product_price_table">
						<table>
							<tbody>
								<tr>
									<td class="special_price">
										Harga Jual:
										<div class="price-red">Rp.<?php echo format_rupiah($produk->produk_harga); ?>,-</div>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="section_offset margin-top-20">
			<div class="tabs type_2">
				<ul class="tabs_nav clearfix">
					<li><a href="#tab-1">Detail Barang</a></li>
					<li><a href="#tab-2">Informasi Penjual</a></li>
					<!--li><a href="#tab-3">Custom Tab</a></li-->
				</ul>
				<div class="tab_containers_wrap">
					<div id="tab-1" class="tab_container">
						<p><?php echo $produk->produk_deskripsi; ?></p>
					</div>
					<div id="tab-2" class="tab_container">
						<ul class="specifications">
							<li><center><img src="<?php echo base_url(); ?>assets/images/account/<?php echo $produk->account_foto; ?>" width="170" /></center></li>
							<li><span>Nama:</span><b><?php echo $produk->account_nama; ?></b></li>
							<li><span>Alamat:</span><b><?php echo $produk->account_alamat; ?></b></li>
							<li><span>Kota:</span><b><?php echo $produk->kota_nama; ?></b></li>
							<li><span>Telepon:</span><b><?php echo $produk->account_tlp; ?></b></li>
						</ul>
					</div>
					<!--div id="tab-3" class="tab_container">
						<div class="video_wrap">
							<iframe src="http://www.youtube.com/embed/-BrDlrytgm8?controls=1&amp;autohide=0&amp;wmode=transparent"></iframe>
						</div>
					</div-->
				</div>
			</div>
		</div>
		<section class="section_offset transparent" data-animation="fadeInDown">
			<h3>Barang Terkait</h3>
			<div class="tabs type_2 products">
				<div class="tab_containers_wrap">
					<div id="tab-1" class="tab_container">
						<div class="owl_carousel carousel_in_tabs">
						<?php							
					    $query = $this->db->query("SELECT * FROM produk WHERE katproduk_id='".$produk->katproduk_id."' order by produk_id");
					        foreach ($query->result() as $row2){  
						?>
							<div class="product_item type_2">
								<div class="image_wrap">
									<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row2->produk_foto4; ?>" alt="">
								</div>
								<div class="description">
									<a href="<?php echo base_url();?>product/detail/<?php echo $row2->produk_id.'/'.$this->CONF->seo($row2->produk_nama)?>"><?php echo $row2->produk_nama; ?></a>
									<div class="clearfix product_info">
										<p class="product_price alignleft"><b>Rp.<?php echo format_rupiah($row2->produk_harga); ?></b></p>
									</div>
								</div>
								<div class="buttons_row">
									<a href="<?php echo base_url();?>product/detail/<?php echo $row2->produk_id.'/'.$this->CONF->seo($row2->produk_nama)?>"><button class="button_blue middle_btn">Detail Barang</button></a>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
					
				</div>
			</div>
		</section>

	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php }  else { ?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Barang</li>
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
			<h1>Semua Barang</h1>
		<header class="top_box on_the_sides">
			<div class="left_side v_centered">
				<div class="layout_type buttons_row" data-table-container="#main_blog_list">
					<a href="#" data-table-layout="grid_view" class="button_grey middle_btn icon_btn active tooltip_container"><i class="icon-th"></i><span class="tooltip top">Grid View</span></a>
					<a href="#" data-table-layout="list_view" class="button_grey middle_btn icon_btn  tooltip_container"><i class="icon-th-list"></i><span class="tooltip top">List View</span></a>
				</div>
			</div>
		</header>
		<ul id="main_blog_list" class="list_of_entries grid_view">
        <?php 
            $i  = $page+1;
            if ($jml_data > 0){
            foreach ($this->ADM->grid_all_produk('*', 'produk_post', 'DESC', $batas, $page, '', '') as $row){
        ?>  
			<li>
				<article class="entry">
					<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="thumbnail entry_image">
						<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_foto; ?>"alt="">
					</a>
					<h4 class="entry_title"><a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>"><?php echo substr($row->produk_nama,0,34); ?></a></h4>
					<div class="entry_meta">
						<div class="alignleft">
							<span><i class="icon-calendar"></i><?php echo dateIndoNews($row->produk_post); ?></span>
							<span><i class="icon-folder-open-empty-1"></i> <a href="<?php echo base_url();?>product/category/<?php echo $row->katproduk_id?>"><?php echo $row->katproduk_nama; ?></a>
						</div>
					</div>
					<h1 class="product_price"><b>Rp.<?php echo format_rupiah($row->produk_harga); ?>,-</b></h1>
					<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="button_grey middle_btn">Detail Barang</a>
				</article>
			</li>
        <?php 
             $i++; 
             }                                               
        ?>                                                        
        <?php } else {  ?>
            <li>
                <article class="entry"><b> Tidak Ada Barang</b></article>
            </li>
        <?php } ?>
		</ul>
		<footer class="bottom_box on_the_sides">
			<div class="right_side">
				<ul class="pags">
					<?php if ($jml_halaman > 1){ echo pages2($halaman, $jml_halaman, 'product/index', $id=""); }?>        
				</ul>
			</div>
		</footer>
	</main>
	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php } ?>