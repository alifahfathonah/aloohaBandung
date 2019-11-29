<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title; ?> <?php echo $web->identitas_website;?> </title>
		<meta name="google-site-verification" content="" />
		<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
		<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
		<meta name="author" content="<?php echo $web->identitas_author;?>" />
		<meta property="og:title" content="<?php echo $web->identitas_website;?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/fontello.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/owlcarousel/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/fancybox/source/jquery.fancybox.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/fancybox/source/helpers/jquery.fancybox-thumbs.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/arcticmodal/jquery.arcticmodal.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/style.css">
		<script src="<?php echo base_url();?>templates/default/js/modernizr.js"></script>
	</head>
	<body class="front_page">
		<!-- - - - - - - - - - - - - - Main Wrapper - - - - - - - - - - - - - - - - -->
		<div class="boxed_layout">
			<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
			<header id="header" class="type_6">
				<!-- - - - - - - - - - - - - - Top part - - - - - - - - - - - - - - - - -->
				<?php 
                $query = $this->db->query("SELECT * FROM iklan WHERE iklan_id='1' order by iklan_post DESC LIMIT 1");
                    foreach ($query->result() as $row){  
                ?>
				<div class="advertise1">
						<a href="<?php echo $row->iklan_link; ?>" target="_blank" >
						<img src="<?php echo base_url(); ?>assets/images/iklan/<?php echo $row->iklan_gambar; ?>" alt="" height="40">
						</a>
				</div>
			<?php } ?>
				<div class="top_part">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-8">
							<?php if ($this->session->userdata('logged_in2') == TRUE && $this->session->userdata('account_email')) { ?>
								<p> <?php echo "Selamat Datang, <b>$account->account_nama</b>"; ?> | <a href="<?php echo base_url();?>account/keluar" style="margin-left:10px;">Logout</a> </p>
							<?php } else { ?>
								<p> Halo, Tamu!  <a href="<?php echo base_url();?>account" style="margin-left:10px;">Login</a> | <a href="<?php echo base_url();?>account/daftar">Daftar</a> </p>
							<?php } ?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-4">
								<div class="clearfix">
									<div class="alignright site_settings">
										<span><a href="<?php echo base_url();?>pages/contact_us">Kontak</a></span>
									</div>
									<div class="alignright site_settings">
										<span><a href="<?php echo base_url();?>pages/detail/2016/3">Ketentuan Layanan</a></span>
									</div>
									<div class="alignright site_settings">
										<span><a href="<?php echo base_url();?>pages/detail/2016/2">Cara Pasang Iklan Premium</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- - - - - - - - - - - - - - End of top part - - - - - - - - - - - - - - - - -->
				<hr>
				<!-- - - - - - - - - - - - - - Bottom part - - - - - - - - - - - - - - - - -->
				<div class="bottom_part">
					<div class="container">
						<div class="row">
							<div class="main_header_row">
								<div class="col-sm-3">
									<a href="<?php echo base_url();?>home" class="logo">
										<img src="<?php echo base_url();?>templates/default/images/logo.png" alt="">
									</a>
								</div>
								<!--div class="col-sm-3">
									<div class="call_us">
										<span>Tlp :</span> <b>0813 2047 1670</b>
									</div>
								</div-->
								<div class="col-sm-6 col-xs-12">
									<form class="clearfix search" action="<?php echo site_url(); ?>search" method="post">
										<input type="text" name="q"  tabindex="1" placeholder="Cari semua barang disini" class="alignleft">
										<button type="submit" value="" class="button_blue def_icon_btn alignleft"></button>
									</form>
								</div>
								<div class="col-sm-6 col-xs-12">

									<!-- - - - - - - - - - - - - - Loginbox & Wishlist & Compare - - - - - - - - - - - - - - - - -->
									<ul class="btn-login">
									<li>
											<a href="<?php echo $web->identitas_fb;?>" class="icon_btn middle_btn social_facebook tooltip_container" target="_blank"><i class="icon-facebook-1"></i><span class="tooltip top">Facebook</span></a>
											<a href="<?php echo $web->identitas_tw;?>"  target="_blank" class="icon_btn middle_btn social_twitter tooltip_container"><i class="icon-twitter"></i><span class="tooltip top">Twitter</span></a>
											<a href="<?php echo $web->identitas_ig;?>"  target="_blank" class="icon_btn middle_btn social_instagram tooltip_container"><i class="icon-instagram-4"></i><span class="tooltip top">Instagram</span></a>
											<a href="<?php echo $web->identitas_gp;?>"  target="_blank" class="icon_btn middle_btn social_googleplus tooltip_container"><i class="icon-gplus-2"></i><span class="tooltip top">GooglePlus</span></a>
											<a href="<?php echo $web->identitas_yb;?>"  target="_blank" class="icon_btn middle_btn social_youtube tooltip_container"><i class="icon-youtube"></i><span class="tooltip top">Youtube</span></a>
										</li>

									</ul><!--/ .account_bar-->

									<!-- - - - - - - - - - - - - - End Loginbox & Wishlist & Compare - - - - - - - - - - - - - - - - -->

								</div><!--/ [col]-->

							</div>
						</div>
					</div>
				</div>
				<!-- - - - - - - - - - - - - - End of bottom part - - - - - - - - - - - - - - - - -->
				
				<!-- - - - - - - - - - - - - - Main navigation wrapper - - - - - - - - - - - - - - - - -->
				<div id="main_navigation_wrap">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="sticky_inner type_2">
									<div class="nav_item">
										<nav class="main_navigation">
											<ul>
												<!--li class="current"><a href="<?php echo base_url();?>home">Home</a></li-->
												<li><a href="<?php echo base_url();?>home">Home</a></li>
												<li><a href="<?php echo base_url();?>news/cat/1-berita">Berita</a></li>
												<li><a href="<?php echo base_url();?>news/cat/2-review">Review</a></li>
												<li><a href="<?php echo base_url();?>news/cat/3-artikel">Artikel</a></li>
												<li><a href="<?php echo base_url();?>albums">Galeri</a></li>
												<li><a href="<?php echo base_url();?>product">Jual Beli Barang</a></li>
												<li><a href="<?php echo base_url();?>pasang/index/tambah">Pasang Iklan</a></li>
												
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- - - - - - - - - - - - - - End of main navigation wrapper - - - - - - - - - - - - - - - - -->
			</header>
			<!-- - - - - - - - - - - - - - End Header - - - - - - - - - - - - - - - - -->

		
			<!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->
			<div class="page_wrapper">
				<div class="container">
					<div class="row">
		<main class="col-md-12" id="premium">
		<section class="section_offset transparent" data-animation="fadeInDown">
			<h3 class="offset_title">Premium</h3>
			<div class="owl_carousel five_items">
 				<?php 
                $query = $this->db->query("SELECT * FROM produk WHERE produk_status='P' order by produk_post DESC");
                    foreach ($query->result() as $row){  
                ?>
				<div class="product_item">
					<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>"><div class="image_wrap">
						<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_foto; ?>" alt="">
						<div class="actions_wrap">
							<div class="centered_buttons">
								<!--a href="#" class="button_dark_grey middle_btn quick_view" data-modal-url="modals/quick_view.html">Quick View</a-->
							</div>
						</div>
					</div>
					</a>
					<div class="description">
						<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>">   <?php echo substr($row->produk_nama,0,35); ?> <span class="boxcategory-small"></span></a>
						<div class="clearfix product_info">
							<p class="product_price alignleft"><b>Rp.<?php echo format_rupiah($row->produk_harga); ?>,-</b></p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>	
	</main>
	</div>
					<?php echo $this->load->view($content); ?>
				</div><!--/ .container-->
			</div><!--/ .page_wrapper-->
			
			<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->

			<!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
			<footer id="footer">
				<div class="container">
					<div class="infoblocks_container">
						<ul class="infoblocks_wrap">
							<li>
								<a href="<?php echo base_url();?>pages/detail/2016/2" class="infoblock type_1">
									<i class="icon-paper-plane"></i>
									<span class="caption"><b>Cara Pasang Iklan Premium</b></span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>pages/detail/2016/3" class="infoblock type_1">
									<i class="icon-lock"></i>
									<span class="caption"><b>Ketentuan Layanan</b></span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>pages/detail/2016/4" class="infoblock type_1">
									<i class="icon-money"></i>
									<span class="caption"><b>100% Transaksi dan Berjualan Aman</b></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<hr>
				<div class="footer_section_3 align_center">
					<div class="container">
						<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo base_url();?>home"><?php echo $web->identitas_website;?></a>. All Rights Reserved.</p>
					</div>
				</div>
			</footer>
			<!-- - - - - - - - - - - - - - End Footer - - - - - - - - - - - - - - - - -->
		</div>
		<!-- - - - - - - - - - - - - - End Main Wrapper - - - - - - - - - - - - - - - - -->

		<!-- - - - - - - - - - - - - - Social feeds - - - - - - - - - - - - - - - - -->


		<!-- Include Libs & Plugins
		============================================ -->
		<script src="<?php echo base_url();?>templates/default/js/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/queryloader2.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/jquery.elevateZoom-3.0.8.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/fancybox/source/jquery.fancybox.pack.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/jquery.appear.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/owlcarousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/jquery.countdown.plugin.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/jquery.countdown.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/arcticmodal/jquery.arcticmodal.js"></script>
		<script src="<?php echo base_url();?>templates/default/twitter/jquery.tweet.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/colorpicker/colorpicker.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/retina.min.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/addthis_widget.js" type="text/javascript" ></script>

		<!-- Theme files
		============================================ -->
		<script src="<?php echo base_url();?>templates/default/js/theme.plugins.js"></script>
		<script src="<?php echo base_url();?>templates/default/js/theme.core.js"></script>

		
		
	</body>
</html>