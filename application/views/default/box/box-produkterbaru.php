<section class="section_offset  transparent" data-animation="fadeInDown">
	<h3>Barang Populer</h3>
	<ul class="products_list_widget">
	<?php 
    $query = $this->db->query("SELECT * FROM produk order by produk_hits DESC LIMIT 3");
        foreach ($query->result() as $row){  
	?>
		<li>
			<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="product_thumb">
				<img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_foto; ?>" alt="">
			</a>
			<div class="wrapper">
				<a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="product_title"><?php echo $row->produk_nama ?><span class="boxcategory-small"></span></a>
				<div class="clearfix product_info">
					<p class="product_price alignleft"><b>Rp.<?php echo format_rupiah($row->produk_harga); ?>,-</b></p>
				</div>
			</div>
		</li>
	<?php } ?>
	</ul>
	<!--footer class="bottom_box">
		<a href="#" class="button_grey middle_btn">Lihat Semua</a>
	</footer-->
</section>