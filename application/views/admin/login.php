<?php
date_default_timezone_set('Asia/Jakarta'); 
$s=date("Y-m-d h:i:s");
if ($web->identitas_aktif<$s) {
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
<meta name="author" content="<?php echo $web->identitas_author;?>" />
<title><?php echo $web->identitas_website;?> <?php echo $title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/default/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/selectize.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/style.css" type="text/css">
<style type="text/css">
    body {
    background:url(<?php echo base_url();?>templates/admin/images/login.jpg);
    background-attachment:fixed;
    background-size:cover;  
    }
</style>
</head>


<body class="page-homepage-courses">
<!-- Homepage Slider -->
<section id="homepage-slider">
    <div class="flexslider">
                <figure>
                    <div class="slide-wrapper">
                        <div class="inner">
                            <div class="container"><br><br><br><br><br><br>
                                <h2><?php echo $web->identitas_website;?></h2>
                                <h1><?php echo $web->identitas_warning;?></h1>
                                <div><a href="http://<?php echo $web->identitas_author;?>" class="btn" target="_blank"><?php echo $web->identitas_author;?></a></div>
                            </div>
                        </div><!-- /.inner -->
                    </div><!-- /.wrapper -->
                </figure>
    </div>
</section>

</div>
</body>
</html>

<?php  } else { ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">	
<title>LOGIN - <?php echo $web->identitas_website;?></title>
<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
<meta name="author" content="<?php echo $web->identitas_author;?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo base_url();?>templates/admin/assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>templates/admin/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>templates/admin/assets/css/styles.css" rel="stylesheet">

    </head>

<body onLoad="document.getElementById('user').focus()" class="focused-form">    
                

<div class="container" id="login-form">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="<?php echo base_url();?>sign_in" class="login-logo"><img src="<?php echo base_url();?>templates/admin/assets/img/login-logo.png"></a></div>
				<div class="panel-body">
					
					<form style="margin-bottom: 0px !important;" class="form-horizontal" action="<?php echo site_url();?>sign_in/ceklogin" method="post" name="formLogin" id="form" data-parsley-validate>
					   <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-close sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
						<div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									 <input type="text" name="username" id="user" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Username" autocomplete="off"/>
								</div>
	                        </div>
						</div>

						<div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" name="password" id="pass" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Password" autocomplete="off"/>
								</div>
	                        </div>
						</div>
 <div class="form-group">
								<div class="col-sm-12">
									
                                        <div class='row'><div class='col-md-4 col-xs-4'>
										<div class='logo'><?php echo $captcahImage; ?></div></div><div class='col-md-8 col-xs-8'>
<input type="text" name="captcha" id="captcha" required class="form-control" onblur="clearText(this)" placeholder="Captcha" onfocus="clearText(this)"  autocomplete="off" /></div></div>
									</div>
								
							</div>
						
					

						<div class="panel-footer">
							<div class="clearfix">
							
								<input type="submit" class="btn btn-primary pull-right" name="masuk" value="Login"/>	
							</div>
						</div>

					</form>
				</div>
			</div>

				<div class="text-center out-links"><a href="#"><?php echo $web->identitas_website;?> &copy; <?php echo date('Y'); ?> All Right Reserved</a></div>
		</div>
	</div>
</div>

    
    
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/jqueryui-1.9.2.min.js"></script> 							<!-- Load jQueryUI -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->


<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/easypiechart/jquery.easypiechart.js"></script> 		<!-- EasyPieChart-->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/sparklines/jquery.sparklines.min.js"></script>  		<!-- Sparkline -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/jstree/dist/jstree.min.js"></script>  				<!-- jsTree -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/enquire.min.js"></script> 									<!-- Enquire for Responsiveness -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/bootbox/bootbox.js"></script>							<!-- Bootbox -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script> <!-- Weather plugin-->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script> 	<!-- Mousewheel support needed for jScrollPane -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/js/application.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/assets/demo/demo-switcher.js"></script>

<!-- End loading site level scripts -->
    <!-- Load page level scripts-->
    
	<script language="javascript">
        function validate(){
            var username = document.getElementById('user').value;
            var password = document.getElementById('pass').value;
            var captcha = document.getElementById('captcha').value;
            if (username.length==0){
                alert ('Username harap diisi!');
                document.getElementById('user').focus();
                return false;
            }
            if (password.length==0){
                alert ('Password harap diisi!');
                document.getElementById('pass').focus();
                return false;
            }
            if (captcha.length==0){
                alert ('Captcha harap diisi!');
                document.getElementById('captcha').focus();
                return false;
            }
            return true;
        }
        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
         }
         
        </script>
    <!-- End loading page level scripts-->
    </body>
</html>
<?php } ?>