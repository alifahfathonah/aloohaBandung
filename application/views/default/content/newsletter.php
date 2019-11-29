<ul class="breadcrumbs">
    <li><a href="<?php echo base_url();?>home">Home</a></li>
    <li>Newsletter</li>
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
            <h3>Newsletter</h3>
            <div class="theme_box">
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
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                        <center><h3 class="margin-top-20">Dengan berlangganan Newsletter kami, anda akan mendapatkan Informasi Berita terbaru dari <?php echo $web->identitas_website;?></h3></center>
            </div>
        </section>
    </main>
    <!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
