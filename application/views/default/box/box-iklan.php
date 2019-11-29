<div class="section_offset transparent" data-animation="fadeInDown">
<?php 
    $query = $this->db->query("SELECT * FROM iklan WHERE iklan_id='3' order by iklan_post DESC LIMIT 1");
        foreach ($query->result() as $row){  
?>
	<a href="<?php echo $row->iklan_link; ?>" target="_blank" >
		<img src="<?php echo base_url(); ?>assets/images/iklan/<?php echo $row->iklan_gambar; ?>" alt="" >
	</a>
<?php } ?>
</div>