<html lang="en-US">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>404 Page not found</title>
		<meta name="google-site-verification" content="" />
		<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
		<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
		<meta name="author" content="<?php echo $web->identitas_author;?>" />
		<meta property="og:title" content="<?php echo $web->identitas_website;?>" />
		<meta property="og:url" content="<?php echo base_url();?>" />
		<meta property="og:description" content="<?php echo $web->identitas_deskripsi;?>" />
		<meta property="og:site_name" content="<?php echo $web->identitas_website;?>" />
		<meta property="og:image" content="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/animate.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/fontello.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/owlcarousel/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/js/arcticmodal/jquery.arcticmodal.css">
		<link rel="stylesheet" href="<?php echo base_url();?>templates/default/css/style.css">
		<script src="<?php echo base_url();?>templates/default/js/modernizr.js"></script>
	</head>
<body>

<div class="secondary_page_wrapper">

				<div class="container">

					<div class="row">

						<div class="col-xs-12">

							<div class="container_404">

								<p class="not_found_404">404</p>

								<p class="not_found">Page Not Found!</p>

								<?php echo date('Y');?> © <?php echo $web->identitas_website;?>, <br> All rights reserved. Design and Development by <a href="http://nava.web.id" target="_blank">Ali Abdul Wahid & Nava Gia Ginasta</a><br><br><br>

								<a href="<?php echo base_url();?>home" class="button_dark_grey middle_btn">Go to Homepage</a>
							</div><!--/ .align_center -->

						</div><!--/ [col]-->

					</div><!--/ .row -->

				</div><!--/ .container-->

			</div><!--/ .page_wrapper-->
			

</body>
</html