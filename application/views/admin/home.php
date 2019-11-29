<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<title>ADMINISTRATOR - <?php echo $web->identitas_website;?></title>
		<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
		<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
		<meta name="author" content="<?php echo $web->identitas_author;?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
		<link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/css/styles.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/codeprettifier/prettify.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet">
	</head>

	<body class="infobar-offcanvas">
		<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">
			<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
				<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
					<span class="icon-bg">
						<i class="fa fa-fw fa-bars"></i>
					</span>
				</a>
			</span>
			<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
				<a href="#" class="toggle-fullscreen">
				</a>
			</span>	
			<!-- <div class="yamm navbar-left navbar-collapse collapse in">
				<ul class="nav navbar-nav">
					<li class="dropdown" id="widget-classicmenu">
						<a href="#"><i class="fa fa-home"></i></a>
					</li>
				</ul>
			</div> -->
			<ul class="nav navbar-nav toolbar pull-right">
				<li class="dropdown toolbar-icon-bg">
					<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'>
						<span class="icon-bg">
							<i class="fa fa-fw fa-envelope"></i>
						</span>
					</a>
					<div class="dropdown-menu dropdown-alternate notifications arrow">
						<div class="dd-header">
							<span>Notifications</span>
						</div>
						<div class="scrollthis scroll-pane">
							<ul class="scroll-content">
								<?php 
							    $query = $this->db->query("SELECT * FROM account order by account_post DESC LIMIT 3");
							        foreach ($query->result() as $row){  
								?>
								<li class="">
									<a href="<?php echo base_url();?>website/account" class="notification-primary">
										<div class="notification-icon"><i class="fa fa-users fa-fw"></i></div>
										<div class="notification-content"><?php echo $row->account_nama;?></div>
									</a>
								</li>
								<?php } ?>
								<?php 
							    $query = $this->db->query("SELECT * FROM produk order by produk_post DESC LIMIT 3");
							        foreach ($query->result() as $row){  
								?>
								<li class="">
									<a href="<?php echo base_url();?>website/produk" class="notification-danger">
										<div class="notification-icon"><i class="fa fa-shopping-cart fa-fw"></i></div>
										<div class="notification-content"><?php echo $row->produk_nama;?></div>
									</a>
								</li>
								<?php } ?>
								
							</ul>
						</div>
						<div class="dd-footer">
							<a href="#">View all notifications</a>
						</div>
					</div>
				</li>
				<li class="dropdown toolbar-icon-bg">
					<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
					<ul class="dropdown-menu userinfo arrow">
						<li><a href="<?php echo base_url();?>" target="_blank"><span class="pull-left">Lihat Website</span> <i class="pull-right fa fa-dashboard"></i></a></li>
						<li><a href="<?php echo base_url();?>admin/edit_password"><span class="pull-left">Edit Password</span> <i class="pull-right fa fa-key"></i></a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url();?>sign_in/keluar"><span class="pull-left">Logout</span> <i class="pull-right fa fa-sign-out"></i></a></li>
					</ul>
				</li>
			</ul>
		</header>

		<div id="wrapper">
			<div id="layout-static">
				<div class="static-sidebar-wrapper sidebar-midnightblue">
					<div class="static-sidebar">
						<div class="sidebar">
							<div class="widget stay-on-collapse" id="widget-welcomebox">
								<div class="widget-body welcome-box tabular">
									<div class="tabular-row">
										<div class="tabular-cell welcome-avatar">
											<a href="#"><img src="<?php echo base_url();?>templates/admin/assets/img/avatar1_50.jpg" class="avatar"></a>
										</div>
										<div class="tabular-cell welcome-options">
											<span class="welcome-text">Selamat datang,</span>
											<a href="#" class="name"><?php echo $admin->admin_nama; ?></a>
										</div>
									</div>
								</div>
							</div>
							<div class="widget stay-on-collapse" id="widget-sidebar">
								<nav role="navigation" class="widget-body">
									<ul class="acc-menu">										
                                <?php $this->ADM->submenu_pengguna($menu_terpilih, $submenu_terpilih);?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="static-content-wrapper">
					<div class="static-content">
						<?php echo $this->load->view($content); ?>
					</div>
					<footer role="contentinfo">
						<div class="clearfix">
							<ul class="list-unstyled list-inline pull-left">
								<li>
									<h6 style="margin: 0;"> &copy; 2016 <?php echo $web->identitas_website;?></h6>
								</li>
							</ul>
							<button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
						</div>
					</footer>
				</div>
			</div>
		</div>

		<!--div class="demo-options">
			<div class="demo-options-icon"><i class="fa fa-spin fa-fw fa-gear"></i></div>
			<div class="demo-heading">Layout Settings</div>
			<div class="demo-body">
				<div class="tabular">
					<div class="tabular-row">
						<div class="tabular-cell">Fixed Header</div>
						<div class="tabular-cell demo-switches">
							<input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-fixedheader" data-on-text="I" data-off-text="O">
						</div>
					</div>
					<div class="tabular-row">
						<div class="tabular-cell">Boxed Layout</div>
						<div class="tabular-cell demo-switches">
							<input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-boxedlayout" data-on-text="I" data-off-text="O">
						</div>
					</div>
					<div class="tabular-row">
						<div class="tabular-cell">Collapse Leftbar</div>
						<div class="tabular-cell demo-switches">
							<input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapseleftbar" data-on-text="I" data-off-text="O">
						</div>
					</div>
					<div class="tabular-row">
						<div class="tabular-cell">Collapse Rightbar</div>
						<div class="tabular-cell demo-switches">
							<input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapserightbar" data-on-text="I" data-off-text="O">
						</div>
					</div>
					<div class="tabular-row hide" id="demo-horizicon">
						<div class="tabular-cell">Horizontal Icons</div>
						<div class="tabular-cell demo-switches">
							<input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="primary" data-off-color="warning" data-on-text="S" data-off-text="L" name="demo-horizicons">
						</div>
					</div>
				</div>
			</div>
			<div class="demo-body">
				<div class="option-title">Header Colors</div>
				<ul id="demo-header-color" class="demo-color-list">
					<li><span class="demo-white"></span></li>
					<li><span class="demo-black"></span></li>
					<li><span class="demo-midnightblue"></span></li>
					<li><span class="demo-primary"></span></li>
					<li><span class="demo-info"></span></li>
					<li><span class="demo-alizarin"></span></li>
					<li><span class="demo-green"></span></li>
					<li><span class="demo-violet"></span></li>
					<li><span class="demo-indigo"></span></li>
				</ul>
			</div>
			<div class="demo-body">
				<div class="option-title">Sidebar Colors</div>
				<ul id="demo-sidebar-color" class="demo-color-list">
					<li><span class="demo-white"></span></li>
					<li><span class="demo-black"></span></li>
					<li><span class="demo-midnightblue"></span></li>
					<li><span class="demo-primary"></span></li>
					<li><span class="demo-info"></span></li>
					<li><span class="demo-alizarin"></span></li>
					<li><span class="demo-green"></span></li>
					<li><span class="demo-violet"></span></li>
					<li><span class="demo-indigo"></span></li>
				</ul>
			</div>

			<div class="demo-body hide" id="demo-boxes">
				<div class="option-title">Boxed Layout Options</div>
				<ul id="demo-boxed-bg" class="demo-color-list">
					<li><span class="pattern-brickwall"></span></li>
					<li><span class="pattern-dark-stripes"></span></li>
					<li><span class="pattern-rockywall"></span></li>
					<li><span class="pattern-subtle-carbon"></span></li>
					<li><span class="pattern-tweed"></span></li>
					<li><span class="pattern-vertical-cloth"></span></li>
					<li><span class="pattern-grey_wash_wall"></span></li>
					<li><span class="pattern-pw_maze_black"></span></li>
					<li><span class="patther-wild_oliva"></span></li>
					<li><span class="pattern-stressed_linen"></span></li>
					<li><span class="pattern-sos"></span></li>
				</ul>
			</div>
		</div-->
		
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/jqueryui-1.9.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/bootstrap.min.js"></script>
<script>
            $(function(){
		        $('#modal-konfirmasi').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
			        var id = div.data('id') 
                    var modal = $(this)
                    // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
                    // MODUL WEB
                    modal.find('#hapus-halaman_statis').attr("href","<?php echo site_url();?>website/halaman_statis/hapus/"+id); 
                    modal.find('#hapus-slide').attr("href","<?php echo site_url();?>website/slide/hapus/"+id); 
                    modal.find('#hapus-testimonial').attr("href","<?php echo site_url();?>website/testimonial/hapus/"+id); 
                    // MENU UTAMA
                    modal.find('#hapus-kategori').attr("href","<?php echo site_url();?>website/kategori/hapus/"+id); 
                    modal.find('#hapus-berita').attr("href","<?php echo site_url();?>website/berita/hapus/"+id);
                    modal.find('#hapus-berita-img').attr("href","<?php echo site_url();?>website/berita/hapus-img/"+id);
                    modal.find('#hapus-tags').attr("href","<?php echo site_url();?>website/tags/hapus-img/"+id);
                    modal.find('#hapus-newsletter').attr("href","<?php echo site_url();?>website/newsletter/hapus/"+id);
                    // PRODUK
                    modal.find('#hapus-katproduk').attr("href","<?php echo site_url();?>website/katproduk/hapus/"+id);
                    modal.find('#hapus-produk').attr("href","<?php echo site_url();?>website/produk/hapus/"+id);
                    // PENJUAL
                    modal.find('#hapus-account').attr("href","<?php echo site_url();?>website/account/hapus/"+id);
                    modal.find('#hapus-kota').attr("href","<?php echo site_url();?>website/kota/hapus/"+id);

                    // PENGATURAN
                    modal.find('#hapus-menu').attr("href","<?php echo site_url();?>pengaturan/menu/hapus/"+id); 
                    modal.find('#hapus-pengguna').attr("href","<?php echo site_url();?>pengaturan/pengguna/hapus/"+id); 
                    modal.find('#hapus-kelompok_pengguna').attr("href","<?php echo site_url();?>pengaturan/kelompok_pengguna/hapus/"+id); 
                });
            });
        </script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/easypiechart/jquery.easypiechart.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/sparklines/jquery.sparklines.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/jstree/dist/jstree.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/codeprettifier/prettify.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/iCheck/icheck.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/enquire.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootbox/bootbox.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/application.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo-switcher.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/wijets/wijets.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/charts-chartistjs/chartist.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/charts-chartistjs/chartist-plugin-tooltip.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/form-daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/form-daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo-index.js"></script>
		
		<script>
// See Docs
	window.ParsleyConfig = {
    	  successClass: 'has-success'
		, errorClass: 'has-error'
		, errorElem: '<span></span>'
		, errorsWrapper: '<span class="help-block"></span>'
		, errorTemplate: "<div></div>"
		, classHandler: function(el) {
    		return el.$element.closest(".validate");
		}
	};
</script>
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/form-parsley/parsley.js"></script> 
		<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo-formvalidation.js"></script>
	</body>
	</html>
<?php ?>

