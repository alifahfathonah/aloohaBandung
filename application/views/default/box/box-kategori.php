<section class="section_offset transparent" data-animation="fadeInDown">
	<h3>Kategori Barang</h3>
	<ul class="theme_menu cats">
		 <?php   
        $sql = $this->db->query("SELECT * FROM katproduk ORDER BY katproduk_id");
        foreach ($sql->result() as $row){ 
                $katproduk_nama=$row->katproduk_nama;        
        $sql_jumlah = $this->db->query("SELECT count( * ) as  katproduk_id FROM produk p inner join katproduk b on p.katproduk_id=b.katproduk_id WHERE katproduk_nama='$katproduk_nama'");         
        foreach ($sql_jumlah->result() as $row2){ 
                    $katproduk_id= $row2->katproduk_id;                 
            }             
        ?>    
		<li class="has_megamenu"><a href="<?php echo base_url();?>product/category/<?php echo $row->katproduk_id.'-'.$this->CONF->seo($row->katproduk_nama)?>"><?php echo $row->katproduk_nama; ?> (<?php echo $row2->katproduk_id; ?>)</a></li>
		<?php } ?>
	</ul>
</section>