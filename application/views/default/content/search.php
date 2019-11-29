<ul class="breadcrumbs">
    <li><a href="<?php echo base_url();?>home">Home</a></li>
    <li>Hasil pencarian kata kunci "<i><?php echo $q; ?></i>"</li>
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
            <h1><?php echo $q; ?></h1>
        <header class="top_box on_the_sides">
            <div class="left_side v_centered">
                <div class="layout_type buttons_row" data-table-container="#main_blog_list">
                    <a href="#" data-table-layout="grid_view" class="button_grey middle_btn icon_btn active tooltip_container"><i class="icon-th"></i><span class="tooltip top">Grid View</span></a>
                    <a href="#" data-table-layout="list_view" class="button_grey middle_btn icon_btn  tooltip_container"><i class="icon-th-list"></i><span class="tooltip top">List View</span></a>
                </div>
            </div>
        </header>
        <ul id="main_blog_list" class="list_of_entries grid_view">
       <?php 
                            $i  = $page+1;
                            $like_pencarian['produk_nama'] = $q;
                            $like_pencarian['produk_deskripsi'] = $q;
                            if ($jml_data > 0){                         
                            foreach ($this->ADM->grid_all_pencarian('*', 'produk_post', 'DESC', $batas, $page, '', $like_pencarian) as $row){
                            ?>  
            <li>
                <article class="entry">
                    <a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="thumbnail entry_image">
                        <img src="<?php echo base_url(); ?>assets/images/produk/<?php echo $row->produk_foto; ?>"alt="">
                    </a>
                    <h4 class="entry_title"><a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>"><?php echo substr($row->produk_nama,0,34); ?></a></h4>
                    <div class="entry_meta">
                        <div class="alignleft">
                            <span><i class="icon-calendar"></i><?php echo dateIndoNews($row->produk_post); ?></span>
                            <span><i class="icon-folder-open-empty-1"></i> <a href="<?php echo base_url();?>product/category/<?php echo $row->katproduk_id?>"><?php echo $row->katproduk_nama; ?></a>
                        </div>
                    </div>
                    <h1 class="product_price"><b>Rp.<?php echo format_rupiah($row->produk_harga); ?>,-</b></h1>
                    <a href="<?php echo base_url();?>product/detail/<?php echo $row->produk_id.'/'.$this->CONF->seo($row->produk_nama)?>" class="button_grey middle_btn">Detail Barang</a>
                </article>
            </li>
        <?php 
             $i++; 
             }                                               
        ?>                                                        
        <?php } else {  ?>
            <li>
                <article class="entry"><b> Tidak Ada Barang</b></article>
            </li>
        <?php } ?>
        </ul>
        <footer class="bottom_box on_the_sides">
            <div class="right_side">
                <ul class="pags">
                    <?php if ($jml_halaman > 1){ echo pages2($halaman, $jml_halaman, 'product/index', $id=""); }?>        
                </ul>
            </div>
        </footer>
    </main>
    <!-- - - - - - - - - - - - - - End Content - - - - - - - - - - - - - - - - -->
</div>
