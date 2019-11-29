<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<?php if ($action == 'view' || empty($action)){ ?>
	<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Daftar Iklan Anda</li>
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
	<section class="section_offset transparent" data-animation="fadeInDown">
			<h3>Daftar Iklan Anda</h3>
			<div class="tabs type_2 products">
				<ul class="tabs_nav clearfix">
					<li><a href="<?php echo site_url();?>pasang/index/tambah">Pasang Iklan</a></li>
					<li  class="active"><a href="<?php echo site_url();?>pasang/index/view">Daftar Iklan Anda</a></li>
					<li><a href="<?php echo site_url();?>account/profil/edit/<?php echo $account->account_id; ?>">Profil</a></li>
				</ul>
				<div class="tab_containers_wrap">
					<div id="tab-1" class="tab_container">
						<div class="table_layout" id="products_container">
							<div class="table_row">
								<div class="table_cell">
				<!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                   			 <div class="alert_box success">
                                <b><?php echo $this->session->flashdata('success'); ?></b>
									<button class="close"></button>
								</div><!--/ .alert_box.warning -->
                        <?php } else if ($this->session->flashdata('info')) { ?>
                             <div class="alert_box info">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                             <div class="alert_box warning">
                                <b><?php echo $this->session->flashdata('warning'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else { ?>
                        	<div class="alert_box error">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } ?>
                    <?php } ?><br>
                    <!-- ========== End Flashdata ========== -->
				                    <!-- ========== End Flashdata ========== -->
								<div class="theme_box">
									<form action="<?php echo site_url();?>pasang/index/view" method="post" id="form">
                              <div class="btn-navigation">
                                <div class='row'>
                                    <div class='col-md-3 col-sm-12'>
                                      <div class="btn-search">Cari Berdasarkan :</div>
                                    </div>    
                                    <div class='col-md-4 col-sm-6'>
                                        <div class='button-search'>
                                          <?php array_pilihan('cari', $berdasarkan, $cari);?>
                                        </div>
                                    </div>
                                    <div class='col-md-5 col-sm-6'>
                                        <div class="input-group">
                                            <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                            <span class="input-group-btn">
                                              <button type="submit" name="kirim" class="btn button_blue middle_btn icon_btn" type="button">
                                                  <i class='icon-search'></i>
                                              </button>
                                            </span>
                                        </div>
                                    </div>
                                    <!--<div class='col-md-4 col-sm-12 text-right'>
                                      <a class="button_blue middle_btn" href="<?php echo site_url();?>pasang/index">
                                        <i class="icon-times-circle"></i> Bersihkan Pencarian
                                      </a>
                                    </div>-->
                                </div>
                              </div>
                          </form>
                                <?php 
                              $i  = $page+1;
                			 $where_account2['account_id']  = $account->account_id;
                              $like_produk[$cari] = $q;
                            if ($jml_data > 0){
                              foreach ($this->ADM->grid_all_produk2('', 'produk_post', 'DESC', $batas, $page, $where_account2, $like_produk) as $row){
                              ?>
                              		<ul>
									<li class="row">
										<div class="col-sm-3">
											<img src="<?php echo base_url()."assets/images/produk/".$row->produk_foto;?>" width="120"/>
										</div><!--/ [col] -->
										<div class="col-sm-3">
											<?php echo $row->produk_nama;?>
										</div><!--/ [col] -->
										<div class="col-sm-3">
											<h5 class="button_red middle_btn">Rp.<?php echo format_rupiah($row->produk_harga);?></h5>
										</div><!--/ [col] -->
										<div class="col-sm-3">
											<a href="<?php echo site_url();?>pasang/index/edit/<?php echo $row->produk_id; ?>" title="Edit <?php echo $row->produk_nama; ?>" class="button_blue middle_btn icon_btn" ><i class="icon-pencil"></i> Edit</a>
											<a class="icon_btn middle_btn social_contact open_" href="<?php echo site_url();?>pasang/index/hapus/<?php echo $row->produk_id; ?>" title="Hapus <?php echo $row->produk_nama; ?>"  ><i class="icon-trash"></i> Hapus</a>
										</div><!--/ [col] -->
									</li><!--/ .row --><br><hr><br>
								</ul>
                               
                                <?php
                                    $i++;
                              } 
                          } else {
                                ?>
                               	<div class="alert_box warning">
                                <b>Belum ada Barang</b>
								</div>
                            <?php } ?>
                    		<div class='row'>
                              <div class="col-md-6 col-xs-12">
                                <div class='pagination-right'>
                                    <ul class="pags">
                                        <?php if ($jml_halaman > 1) { echo pages2($halaman, $jml_halaman, 'pasang/index/view', $id=""); }?>
                                    </ul>
                                </div>
                            </div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>

<?php } elseif ($action == 'tambah') { ?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li>Pasang Iklan</li>
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
	<section class="section_offset transparent" data-animation="fadeInDown">
			<h3>Pasang Iklan</h3>
			<div class="tabs type_2 products">
				<ul class="tabs_nav clearfix">
					<li><a href="<?php echo site_url();?>pasang/index/tambah">Pasang Iklan</a></li>
					<li><a href="<?php echo site_url();?>pasang/index/view">Daftar Iklan Anda</a></li>
					<li><a href="<?php echo site_url();?>account/profil/edit/<?php echo $account->account_id; ?>">Profil</a></li>
				</ul>
				<div class="tab_containers_wrap">
					<div id="tab-1" class="tab_container">
						<div class="table_layout" id="products_container">
							<div class="table_row">
								<div class="table_cell">
						<!-- ========== Flashdata ========== -->
		                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
		                        <?php if ($this->session->flashdata('success')) { ?>
		                   			 <div class="alert_box success">
		                                <b><?php echo $this->session->flashdata('success'); ?></b>
											<button class="close"></button>
										</div><!--/ .alert_box.warning -->
		                        <?php } else if ($this->session->flashdata('info')) { ?>
		                             <div class="alert_box info">
		                                <b><?php echo $this->session->flashdata('info'); ?></b>
											<button class="close"></button>
										</div>
		                        <?php } else if ($this->session->flashdata('warning')) { ?>
		                             <div class="alert_box warning">
		                                <b><?php echo $this->session->flashdata('warning'); ?></b>
											<button class="close"></button>
										</div>
		                        <?php } else { ?>
		                        	<div class="alert_box error">
		                                <b><?php echo $this->session->flashdata('info'); ?></b>
											<button class="close"></button>
										</div>
		                        <?php } ?>
		                    <?php } ?><br>
		                    <!-- ========== End Flashdata ========== -->
								<div class="theme_box">
									<form class="type_2" action="<?php echo site_url();?>pasang/index/tambah" method="post" enctype="multipart/form-data">
									<input type="hidden" name="account_id" value="<?php echo $account->account_id; ?>" id="account_id">
									<h5>INFORMASI BARANG DIJUAL</h5><hr><br>
										<ul>
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_nama" class="required">JUDUL IKLAN</label>
													<input type="text" name="produk_nama"  required id="produk_nama">
												</div><!--/ [col] -->
											</li><!--/ .row -->
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_nama" class="required">KATEGORI BARANG</label>
		                                            <?php $this->ADM->combo_box("SELECT * FROM katproduk", 'katproduk_id', 'katproduk_id', 'katproduk_nama', $katproduk_id);?>
												</div><!--/ [col] -->
											</li><!--/ .row -->
											<li class="row">	
												<div class="col-sm-6">
													<label for="produk_harga" class="required">HARGA JUAL (RP)</label>
													<input type="number" name="produk_harga" required id="produk_harga">
												</div><!--/ [col] -->
												<div class="col-sm-6">
													<label for="fax">KONDISI BARANG</label><br>
													<input type="radio" name="produk_kondisi" id="baru" value="B">
													<label for="baru">Baru</label>
													<input type="radio" checked name="produk_kondisi" id="bekas" value="S">
													<label for="bekas">Bekas</label>
												</div><!--/ [col] -->
											</li><!-- / .row -->
											<br><h5>FOTO & DESKRIPSI LAIN</h5><hr><br>
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_deskripsi" class="required">DESKRIPSI LAIN</label>
													<textarea name="produk_deskripsi" required ></textarea>
												</div><!--/ [col] -->
												
											</li><!--/ .row -->
											<li class="row">
												<div class="col-sm-3">
													<label for="produk_foto" class="required">FOTO UTAMA</label>
													<input type="file" name="produk_foto" required id="produk_foto">
												</div><!--/ [col] -->
												<div class="col-sm-3">
													<label for="produk_foto2">FOTO TAMBAHAN 2</label>
													<input type="file" name="produk_foto2" id="produk_foto2">
												</div><!--/ [col] -->
												<div class="col-sm-3">
													<label for="produk_foto3">FOTO TAMBAHAN 3</label>
													<input type="file" name="produk_foto3" id="produk_foto3">
												</div><!--/ [col] -->
											</li>
											<li class="row">
												<div class="col-sm-3">
													<label for="produk_foto4">FOTO TAMBAHAN 4</label>
													<input type="file" name="produk_foto4" id="produk_foto4">
												</div><!--/ [col] -->
												<div class="col-sm-3">
													<label for="produk_foto5">FOTO TAMBAHAN 5</label>
													<input type="file" name="produk_foto5" id="produk_foto5">
												</div><!--/ [col] -->
											</li><!--/ .row -->
										</ul>
								</div>
									<footer class="bottom_box on_the_sides">
										<div class="left_side">
			                            <input class="button_blue middle_btn" type="submit" name="simpan" value="Simpan">
										</div>
									</footer>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php } elseif ($action == 'edit') { ?>
<ul class="breadcrumbs">
	<li><a href="<?php echo base_url();?>home">Home</a></li>
	<li><a href="<?php echo base_url();?>pasang/index/view">Daftar Iklan Anda</a></li>
	<li>Edit Iklan</li>
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
	<section class="section_offset transparent" data-animation="fadeInDown">
			<h3>Edit Iklan</h3>
			<div class="tabs type_2 products">
				<ul class="tabs_nav clearfix">
					<li><a href="<?php echo site_url();?>pasang/index/tambah">Pasang Iklan</a></li>
					<li class="active"><a href="<?php echo site_url();?>pasang/index/view">Daftar Iklan Anda</a></li>
					<li><a href="<?php echo site_url();?>account/profil/edit/<?php echo $account->account_id; ?>">Profil</a></li>
				</ul>
				<div class="tab_containers_wrap">
					<div id="tab-1" class="tab_container">
						<div class="table_layout" id="products_container">
							<div class="table_row">
								<div class="table_cell">
								
				<!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                   			 <div class="alert_box success">
                                <b><?php echo $this->session->flashdata('success'); ?></b>
									<button class="close"></button>
								</div><!--/ .alert_box.warning -->
                        <?php } else if ($this->session->flashdata('info')) { ?>
                             <div class="alert_box info">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                             <div class="alert_box warning">
                                <b><?php echo $this->session->flashdata('warning'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } else { ?>
                        	<div class="alert_box error">
                                <b><?php echo $this->session->flashdata('info'); ?></b>
									<button class="close"></button>
								</div>
                        <?php } ?>
                    <?php } ?><br>
                    <!-- ========== End Flashdata ========== -->
				                    <!-- ========== End Flashdata ========== -->
								<div class="theme_box">
									<form class="type_2" action="<?php echo site_url();?>pasang/index/edit" method="post" enctype="multipart/form-data">
									<input type="hidden" name="account_id" value="<?php echo $account->account_id; ?>" id="account_id">
									<input type="hidden" name="produk_id" value="<?php echo $produk_id; ?>" id="produk_id">
									<h5>EDIT BARANG DIJUAL</h5><hr><br>
										<ul>
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_nama" class="required">JUDUL IKLAN</label>
													<input type="text" name="produk_nama" value="<?php echo $produk_nama;?>"  required id="produk_nama">
												</div><!--/ [col] -->
											</li><!--/ .row -->
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_nama" class="required">KATEGORI BARANG</label>
		                                            <?php $this->ADM->combo_box("SELECT * FROM katproduk", 'katproduk_id', 'katproduk_id', 'katproduk_nama', $katproduk_id);?>
												</div><!--/ [col] -->
											</li><!--/ .row -->
											<li class="row">	
												<div class="col-sm-6">
													<label for="produk_harga" class="required">HARGA JUAL (RP)</label>
													<input type="number" name="produk_harga" value="<?php echo $produk_harga;?>" required id="produk_harga">
												</div><!--/ [col] -->
												<div class="col-sm-6">
													<label for="fax">KONDISI BARANG</label><br>
													<input type="radio" <?php echo $baru = ($produk_kondisi=='B')?'checked':'';?> value="B" name="produk_kondisi" id="baru">
													<label for="baru">Baru</label>
													<input type="radio" <?php echo $bekas = ($produk_kondisi=='S')?'checked':'';?>  name="produk_kondisi" value="S" id="bekas">
													<label for="bekas">Bekas</label>
												</div><!--/ [col] -->
											</li><!-- / .row -->
											<br><h5>FOTO & DESKRIPSI LAIN</h5><hr><br>
											<li class="row">
												<div class="col-xs-12">
													<label for="produk_deskripsi" class="required">DESKRIPSI LAIN</label>
													<textarea name="produk_deskripsi"><?php echo $produk_deskripsi;?></textarea>
												</div><!--/ [col] -->
											</li><!--/ .row -->
											<li class="row">
												<div class="col-sm-3">
												<?php if ($produk_foto){?>
                                            		<img src="<?php echo base_url()."assets/images/produk/".$produk_foto;?>" width="120"/>
													<label for="produk_foto" class="required">EDIT FOTO UTAMA</label>
													<input type="file" name="produk_foto"  id="produk_foto">
                                				<?php } else { ?>
													<label for="produk_foto" class="required">FOTO UTAMA</label>
													<input type="file" name="produk_foto" id="produk_foto">
                                				<?php } ?>
												</div><!--/ [col] -->
												<div class="col-sm-3">
												<?php if ($produk_foto2){?>
                                            		<img src="<?php echo base_url()."assets/images/produk/".$produk_foto2;?>" width="120"/>
													<label for="produk_foto2" >EDIT FOTO TAMBAHAN 2</label>
													<input type="file" name="produk_foto2" id="produk_foto2">
                                				<?php } else { ?>
													<label for="produk_foto2" >FOTO TAMBAHAN 2</label>
													<input type="file" name="produk_foto2" id="produk_foto2">
                                				<?php } ?>
												</div><!--/ [col] -->
												<div class="col-sm-3">													
												<?php if ($produk_foto3){?>
                                            		<img src="<?php echo base_url()."assets/images/produk/".$produk_foto3;?>" width="120"/>
													<label for="produk_foto3" >EDIT FOTO TAMBAHAN 3</label>
													<input type="file" name="produk_foto3" id="produk_foto3">
                                				<?php } else { ?>
													<label for="produk_foto3">FOTO TAMBAHAN 3</label>
													<input type="file" name="produk_foto3" id="produk_foto3">
                                				<?php } ?>
												</div><!--/ [col] -->
											</li>
											<li class="row">
												<div class="col-sm-3">
												<?php if ($produk_foto4){?>
                                            		<img src="<?php echo base_url()."assets/images/produk/".$produk_foto4;?>" width="120"/>
													<label for="produk_foto4">EDIT FOTO TAMBAHAN 4</label>
													<input type="file" name="produk_foto4"  id="produk_foto4">
                                				<?php } else { ?>
													<label for="produk_foto4">FOTO TAMBAHAN 4</label>
													<input type="file" name="produk_foto4" id="produk_foto4">
                                				<?php } ?>
												</div><!--/ [col] -->
												<div class="col-sm-3">
												<?php if ($produk_foto5){?>
                                            		<img src="<?php echo base_url()."assets/images/produk/".$produk_foto5;?>" width="120"/>
													<label for="produk_foto5">EDIT FOTO TAMBAHAN 5</label>
													<input type="file" name="produk_foto5" id="produk_foto5">
                                				<?php } else { ?>
													<label for="produk_foto5">FOTO TAMBAHAN 5</label>
													<input type="file" name="produk_foto5" id="produk_foto5">
                                				<?php } ?>
												</div><!--/ [col] -->
											</li><!--/ .row -->
										</ul>
								</div>
									<footer class="bottom_box on_the_sides">
										<div class="left_side">
			                            <input class="button_blue middle_btn" type="submit" name="simpan" value="Simpan">
										</div>
									</footer>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
<?php } ?>