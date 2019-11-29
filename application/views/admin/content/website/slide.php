<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<div class="page-content">
  <ol class="breadcrumb">
    <li class=""><a href="<?php echo site_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class="active"><?php echo $breadcrumb; ?></li>
  </ol>           
  <div class="page-heading">
    <h1><?php echo $breadcrumb; ?></h1>
    <div class="options">
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
          <div class="panel-heading">
            <h2>Tampil <?php echo $breadcrumb; ?></h2>
            <div class="panel-ctrls"
              data-actions-container="" 
              data-action-collapse='{"target": ".panel-body"}'
              data-action-colorpicker=''>
            </div>
          </div>
          <div class="panel-editbox" data-widget-controls=""></div>
          <div class="panel-body">
                 <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <!-- ========== Button ========== -->
                     <form action="<?php echo site_url();?>website/slide" method="post" id="form">
                              <div class="btn-navigation">
                                <div class='row'>
                                    <div class='col-md-2 col-sm-12'>
                                      <div class="btn-search">Cari Berdasarkan :</div>
                                    </div>    
                                    <div class='col-md-3 col-sm-6'>
                                        <div class='button-search'>
                                          <?php array_pilihan('cari', $berdasarkan, $cari);?>
                                        </div>
                                    </div>
                                    <div class='col-md-3 col-sm-6'>
                                        <div class="input-group">
                                            <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                            <span class="input-group-btn">
                                              <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                                  <i class='fa fa-search'></i>
                                              </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class='col-md-4 col-sm-12 text-right'>
                                      <a class="btn btn-primary" href="<?php echo site_url();?>website/slide">
                                        <i class="fa fa-times-circle"></i> Bersihkan Pencarian
                                      </a>
                                      <a class="btn btn-primary" href="<?php echo site_url();?>website/slide/tambah">
                                        <i class="fa fa-plus-circle"></i> Tambah Slide
                                      </a>
                                    </div>
                                </div>
                              </div>
                          </form>
                    <!-- ========== End Button ========== -->
                    <!-- ========== Table ========== -->
                       <div class="table-responsive table-view">
                              <table class="table hover table-striped">
                                <thead>
                                <tr>
    	                            <th style="text-align:center" width="50">#</th>
                                    <th width="60%">JUDUL</th>
                                    <th>GAMBAR</th>
                                    <th>TANGGAL</th>
                                    <th width="150">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
	                            $i	= $page+1;
	                            $like_slide[$cari] = $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_slide('*', 'slide_judul', 'ASC', $batas, $page, '', $like_slide) as $row){
	                            ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->slide_judul;?></td>
                                    <td align="center"><img src="<?php echo base_url();?>assets/images/slide/<?php echo $row->slide_gambar;?>" width="100" /></td>
                                    <td align="center"><?php echo dateIndo($row->slide_waktu);?></td>
                                  <td align="center">
                                            <div class="btn-action">
                                                    <a href="<?php echo site_url();?>website/slide/edit/<?php echo $row->slide_id; ?>" title="Edit <?php echo $row->slide_judul; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mod-info" type="button" href="<?php echo site_url();?>website/slide_detail/<?php echo $row->slide_id;?>" rel="detail" title="Detail <?php echo $row->slide_judul; ?>"><i class='fa fa-eye'></i></a>
                                                    <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row->slide_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->slide_judul; ?>"><i class='fa fa-trash-o'></i></a> 
                                                </div>
                                           </td>
                                </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="5">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                          <div class='row'>
                              <div class="col-md-6 col-xs-12">
                                <div class='pagination-left'>
                                  <span>Total : <?php echo $jml_data;?></span>
                                </div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                <div class='pagination-right'>
                                    <ul class="pagination">
                                        <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/slide/view', $id=""); }?>
                                    </ul>
                                </div>
                            </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Content -->

<!-- ========== Modal Detail ========== -->
<div class="modal fade" id="mod-info" tabindex="-1" role="dialog">
   <div class="modal-dialog">
       <div class="modal-content">                
            <script type="text/javascript" src="<?php echo base_url();?>editor/ckeditor.js"></script>
            <script type="text/javascript">
            var editor = CKEDITOR.replace("berita_deskripsi",
                {
                    filebrowserBrowseUrl      : "<?php echo base_url();?>finder/ckfinder.html",
                    filebrowserImageBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Images",
                    filebrowserFlashBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Flash",
                    filebrowserUploadUrl      : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
                    filebrowserImageUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
                    filebrowserFlashUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
                    filebrowserWindowWidth    : 900,
                    filebrowserWindowHeight   : 700,
                    toolbarStartupExpanded    : false,
                    height                    : 400 
                }
                );
            </script>   
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== End Modal Detail ========== -->

<!-- ========== Modal Konfirmasi ========== -->
<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>

			<div class="modal-body" style="background:#d9534f;color:#fff">
				Apakah Anda yakin ingin menghapus data ini?
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-danger" id="hapus-slide">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<div class="page-content">
  <ol class="breadcrumb">
    <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class=""><a href="<?php echo base_url();?>website/slide"> <?php echo $breadcrumb; ?> </a></li>
    <li class="active">Tambah </li>
  </ol>           
  <div class="page-heading">
    <h1><?php echo $breadcrumb; ?> </h1>
    <div class="options">
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
          <div class="panel-heading">
            <h2>Tambah <?php echo $breadcrumb; ?> </h2>
            <div class="panel-ctrls"
              data-actions-container="" 
              data-action-collapse='{"target": ".panel-body"}'
              data-action-colorpicker=''>
            </div>
          </div>
          <div class="panel-editbox" data-widget-controls=""></div>
          <div class="panel-body">
                         <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/slide/tambah" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="slide_judul" class="control-label">Nama slide <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="slide_judul" type="text" id="slide_judul" required class="form-control" value="<?php echo $slide_judul;?>" placeholder="Masukan Nama Slide"/>
                                        </td>
                                    </tr>
                                   <tr class="validate">
                                        <td>
                                            <label for="slide_judul" class="control-label">Deskripsi slide <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" class="form-control" id="slide_deskripsi" name="slide_deskripsi" >
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="slide_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="slide_gambar" id="slide_gambar" required class="form-control btn-sm" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/slide'"/>
                        </div>
                    </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Content -->
<!-- ================================================== END TAMBAH ================================================== -->

<!-- ================================================== EDIT ================================================== -->
<?php } elseif ($action == 'edit') { ?> 
<<div class="page-content">
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class=""><a href="<?php echo base_url();?>website/slides"> <?php echo $breadcrumb; ?> </a></li>
        <li class="active">Edit</li>
    </ol>                       
    <div class="page-heading">
        <h1><?php echo $breadcrumb; ?> </h1>
        <div class="options">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>Edit <?php echo $breadcrumb; ?> </h2>
                        <div class="panel-ctrls"
                            data-actions-container="" 
                            data-action-collapse='{"target": ".panel-body"}'
                            data-action-colorpicker=''>
                        </div>
                    </div>
                    <div class="panel-editbox" data-widget-controls=""></div>
                    <div class="panel-body">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/slide/edit/<?php echo $slide_id; ?>" method="post" enctype="multipart/form-data" pdata-parsley-validate>
                        <input type="hidden" name="slide_id" value="<?php echo $slide_id;?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                   <tr class="validate">
                                        <td width="130">
                                            <label for="slide_judul" class="control-label">Nama slide <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="slide_judul" type="text" required class="form-control" id="slide_judul" value="<?php echo $slide_judul;?>" size="30" maxlength="30" placeholder="Masukan Nama Slide"/>
                                        </td>
                                    </tr>  
                                    <tr class="validate">
                                        <td>
                                            <label for="slide_judul" class="control-label">Deskripsi slide <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" class="form-control" cols="20" id="slide_deskripsi" name="slide_deskripsi" >
                                                <?php echo $slide_deskripsi;?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($slide_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="slide_gambar" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/slide/".$slide_gambar;?>" width="220"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="slide_gambar" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control btn-sm" name="slide_gambar" id="slide_gambar" />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="slide_gambar" class="control-label">Gambar  <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" required class="form-control btn-sm" name="slide_gambar" id="slide_gambar"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/slide'"/>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content --> 
<!-- ================================================== END EDIT ================================================== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. Slide</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>ID slide</strong></td>
                <td>: <strong><?php echo $slide->slide_id;?></strong></td>
            </tr>
            <tr>
                <td width="90">Nama slide</td>
                <td>: <?php echo $slide->slide_judul;?></td>
             </tr>
             <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="slide_deskripsi" name="slide_deskripsi" ><?php echo $slide->slide_deskripsi;?></textarea><?php echo $ckeditor;?></td>
            </tr>
            <tr class="awal">
                <td>Gambar</td>
                <td>: <img src="<?php echo base_url()."assets/images/slide/".$slide->slide_gambar;?>" width="200"/></td>
            </tr>  
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>