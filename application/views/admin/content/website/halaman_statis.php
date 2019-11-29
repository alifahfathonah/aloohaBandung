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
                     <form action="<?php echo site_url();?>website/halaman_statis" method="post" id="form">
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
                                      <a class="btn btn-primary" href="<?php echo site_url();?>website/halaman_statis">
                                        <i class="fa fa-times-circle"></i> Bersihkan Pencarian
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
                                    <th width="48%">JUDUL</th>
                                    <th width="20%">LINK</th>
                                    <th>TANGGAL</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 	
	                            $i	= $page+1;
	                            $like_statis[$cari] = $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_statis('*', 'statis_waktu', 'DESC', $batas, $page, '', $like_statis) as $row){
	                        ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->statis_judul;?></td>
                                    <td>pages/detail/<?php echo dateIndo6($row->statis_waktu)."/".$row->statis_id; ?></td>
                                    <td align="center"><?php echo dateIndo($row->statis_waktu);?></td>
                                   <td align="center">
                                            <div class="btn-action">
                                                    <a href="<?php echo site_url();?>website/halaman_statis/edit/<?php echo $row->statis_id; ?>" title="Edit <?php echo $row->statis_judul; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mod-info" type="button" href="<?php echo site_url();?>website/halaman_statis_detail/<?php echo $row->statis_id;?>" rel="detail" title="Detail <?php echo $row->statis_judul; ?>"><i class='fa fa-eye'></i></a> 
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
                                        <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/halaman_statis/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-halaman_statis">Ya</a>
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
    <li class=""><a href="<?php echo base_url();?>website/halaman_statis"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/halaman_statis/tambah" method="post" enctype="multipart/form-data"  data-parsley-validate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="statis_judul" class="control-label">Judul Statis <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="statis_judul" type="text" id="statis_judul" required class="form-control" value="<?php echo $statis_judul;?>" size="80"  placeholder="Masukan Judul Statis"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="statis_deskripsi" class="control-label">Deskripsi Statis <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="20" cols="20" id="statis_deskripsi" name="statis_deskripsi" >
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="statis_gambar" class="control-label">Gambar </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control btn-sm" name="statis_gambar" id="statis_gambar"  />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/halaman_statis'"/>
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
<div class="page-content">
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class=""><a href="<?php echo base_url();?>website/halaman_statiss"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/halaman_statis/edit/<?php echo $statis_id; ?>" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <input type="hidden" name="statis_id" value="<?php echo $statis_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">  
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="statis_judul" class="control-label">Judul Statis <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="statis_judul" type="text" id="statis_judul" required class="form-control"  value="<?php echo $statis_judul;?>" size="80" placeholder="Masukan Judul Statis" />
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td width="130">
                                            <label for="statis_deskripsi" class="control-label">Deskripsi Statis <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" id="statis_deskripsi" name="statis_deskripsi" >
                                                <?php echo $statis_deskripsi;?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($statis_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="statis_gambar" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/statis/".$statis_gambar;?>" width="220"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="statis_gambar" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control btn-sm" name="statis_gambar"  id="statis_gambar" />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="statis_gambar" class="control-label">Gambar </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control btn-sm" name="statis_gambar" id="statis_gambar"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/halaman_statis'"/>
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
    <h4 class="modal-title">Detail. Halaman Statis</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>ID statis</strong></td>
                <td>: <strong><?php echo $statis->statis_id;?></strong></td>
            </tr>
            <tr>
                <td width="90">Judul Statis</td>
                <td>: <?php echo $statis->statis_judul;?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="statis_deskripsi" name="statis_deskripsi" ><?php echo $statis->statis_deskripsi;?></textarea><?php echo $ckeditor;?></td>
            </tr>
        <?php if ($statis->statis_gambar){?>
            <tr class="awal">
                <td>Gambar</td>
                <td>: <img src="<?php echo base_url()."assets/images/statis/".$statis->statis_gambar;?>" width="200"/></td>
            </tr>  
        <?php } else { ?>
            <tr class="awal">
                <td>Gambar</td>
                <td>: Tidak Ada Gambar</td>
            </tr>  
        <?php } ?>
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