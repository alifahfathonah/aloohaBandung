<ul class="breadcrumbs">
    <li><a href="<?php echo base_url();?>home">Home</a></li>
    <li><?php echo $judul;?></li>
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
        <section class="section_offset">
            <h1><?php echo $judul;?></h1>
            <article class="entry single">
                <div class="entry_image detail-berita">
                  
                     <?php if ($gambar){?>
                       <img src="<?php echo base_url()."assets/images/statis/".$gambar;?>" />
                  <?php } else { }?>
                </div>
                <h4 class="entry_title"><a href="#"><?php echo $judul;?></a></h4>
                <p align="justify"><?php echo $deskripsi;?></p>
                <!--div class="v_centered share">
                    <span class="title">Share this:</span>
                    <div class="addthis_widget_container">
                        <ul class="social_btns">
                            <li>
                                <a href="#" class="icon_btn middle_btn social_facebook tooltip_container"><i class="icon-facebook-1"></i><span class="tooltip top">Facebook</span></a>
                            </li>
                            <li>
                                <a href="#" class="icon_btn middle_btn  social_twitter tooltip_container"><i class="icon-twitter"></i><span class="tooltip top">Twitter</span></a>
                            </li>
                            <li>
                                <a href="#" class="icon_btn middle_btn social_googleplus tooltip_container"><i class="icon-gplus-2"></i><span class="tooltip top">GooglePlus</span></a>
                            </li>
                            <li>
                                <a href="#" class="icon_btn middle_btn social_youtube tooltip_container"><i class="icon-youtube"></i><span class="tooltip top">Youtube</span></a>
                            </li>
                            <li>
                                <a href="#" class="icon_btn middle_btn social_instagram tooltip_container"><i class="icon-instagram-4"></i><span class="tooltip top">Instagram</span></a>
                            </li>
                        </ul>
                    </div>
                </div-->
            </article>
            
        </section>
        
    </main>
    <!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>