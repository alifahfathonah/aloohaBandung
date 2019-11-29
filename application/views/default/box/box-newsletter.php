<section class="section_offset transparent" data-animation="fadeInDown">
	<h3>Newsletter</h3>
	<div class="theme_box">
		<p class="form_caption">Yuk Daftarkan Dirimu Untuk Mendapatkan Informasi <?php echo $web->identitas_website;?>  Terbaru Dari Kami Secara Gratis !</p>
         <form action="<?php echo base_url();?>pages/input_newsletter" class="newsletter  clearfix " method="POST">
			<input type="email" id="news_email" required name="news_email" placeholder="Enter your email address">
			 <button type="submit" name="krm" value="krm" class="button_blue def_icon_btn"></button>
			<!--button class="button_blue def_icon_btn" name="krm"></button-->
		</form>
	</div>
</section>