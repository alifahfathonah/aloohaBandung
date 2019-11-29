<div class="page-content">
	<ol class="breadcrumb">
		<li class="active"><a href="<?php echo site_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
	</ol>						
	<div class="page-heading">
		<h1>Dashboard</h1>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Selamat datang di Halaman Administrator <?php echo $web->identitas_website;?></h2>
					</div>
					<div class="panel-body">
 						<div class='blockquote'>
			  				<div class='text-orange'><h5>Hallo, <?php echo $admin->admin_nama; ?></h5></div>
                    		<p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                		</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<a href="<?php echo site_url();?>website/produk">
            		<div class="small-box bg-aqua">
            	    	<div class="inner">
                	  		<h3><?php echo $jml_data_produk;?></h3>
                        	<p>Barang</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-shopping-cart"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="<?php echo site_url();?>website/account">
            		<div class="small-box bg-blue">
            	    	<div class="inner">
                	  		<h3><?php echo $jml_data_account;?></h3>
                        	<p>User</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-users"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="<?php echo site_url();?>website/iklan">
            		<div class="small-box bg-deepblue">
            	    	<div class="inner">
                	  		<h3><?php echo $jml_data_iklan;?></h3>
                        	<p>Iklan</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-dollar"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="<?php echo site_url();?>website/berita">
            		<div class="small-box bg-purple">
            	    	<div class="inner">
                	  		<h3><?php echo $jml_data_berita;?></h3>
                        	<p>Berita</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-newspaper-o"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <!--div class="col-lg-3 col-xs-6">
				<a href="#">
            		<div class="small-box bg-purple">
            	    	<div class="inner">
                	  		<h3>5</h3>
                        	<p>Galeri Foto</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-camera"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="#">
            		<div class="small-box bg-deepblue">
            	    	<div class="inner">
                	  		<h3>2</h3>
                        	<p>Galeri Video</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-laptop"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="#">
            		<div class="small-box bg-blue">
            	    	<div class="inner">
                	  		<h3>5</h3>
                        	<p>Slide</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-newspaper-o"></i>
                    	</div>
                	</div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
				<a href="#">
            		<div class="small-box bg-aqua">
            	    	<div class="inner">
                	  		<h3>20</h3>
                        	<p>Testimonial</p>
                    	</div>
               			<div class="icon">
               				<i class="fa fa-users"></i>
                    	</div>
                	</div>
                </a>
            </div-->
         </div>
	</div>
</div>