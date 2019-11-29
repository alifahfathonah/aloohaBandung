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
                     <form action="<?php echo site_url();?>pengaturan/menu" method="post" id="form">
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
                                      <a class="btn btn-primary" href="<?php echo site_url();?>pengaturan/menu">
                                        <i class="fa fa-times-circle"></i> Bersihkan Pencarian
                                      </a>
                                      <a class="btn btn-primary" href="<?php echo site_url();?>pengaturan/menu/tambah">
                                        <i class="fa fa-plus-circle"></i> Tambah Menu
                                      </a>
                                    </div>
                                </div>
                              </div>
                          </form>
                    <!-- ========== End Button ========== -->
                    <!-- ========== Table ========== -->
                     <div class="table-responsive table-view">
                        <table class="table hover table-striped">
                            <thead class="primary-emphasis" >
                                <tr>
    	                            <th style="text-align:center" width="30">#</th>
                                    <th width="200">NAMA MENU</th>
                                    <th>URL</th>
                                    <th style="text-align:center" width="150">AKSI</th>
	                            </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $where_menu['menu_status']	= 'A';
	                            $like_menu[$cari]			= $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_menu('', 'menu_level', 'ASC', $batas, $page, $where_menu, $like_menu) as $row){
	                            ?>
                                <tr>
                                    <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->menu_nama;?></td>
                                    <td><?php echo site_url().$row->menu_url;?></td>
                                    <td align="center">
                                              <div class="btn-action">
                                                     <a href="<?php echo site_url();?>pengaturan/menu/edit/<?php echo $row->menu_kode; ?>" title="Edit <?php echo $row->menu_nama; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                      <a class="btn btn-primary" data-toggle="modal" data-target="#mod-info" type="button" href="<?php echo site_url();?>pengaturan/menu_detail/<?php echo $row->menu_kode;?>" rel="detail" title="Detail <?php echo $row->menu_nama; ?>"><i class='fa fa-eye'></i></a>
                                                      <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row->menu_kode;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->menu_nama; ?>"><i class='fa fa-trash-o'></i></a> 
                                                  </div>
                                             </td>
                               </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="4">Belum ada data!.</td>
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
                                        <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'pengaturan/menu/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-menu">Ya</a>
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
    <li class=""><a href="<?php echo base_url();?>pengaturan/menu"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>pengaturan/menu/tambah" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <input type="hidden" name="menu_kode" value="<?php echo $menu_kode;?>" />
                                <tbody class="no-border-y"> 
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_level" class="control-label">Level Menu <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php array_pilihan('menu_level', $level, $menu_level, 'submit();');?>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="menu_nama" class="control-label">Nama Menu <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_nama" type="text" id="menu_nama" required class="form-control " value="<?php echo $menu_nama;?>" size="30" maxlength="255" placeholder="Masukan Nama Menu"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_deskripsi" type="text" required class="form-control " id="menu_deskripsi" value="<?php echo $menu_deskripsi;?>" size="50" maxlength="255" placeholder="Masukan Deskripsi Menu"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_url" class="control-label">URL <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_url" type="text" required class="form-control " id="menu_url" value="<?php echo $menu_url;?>" size="50" maxlength="255" placeholder="Masukan URL Menu"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_site" class="control-label">Sertakan Site URL <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
    	                                            <input type="radio" name="menu_site" value="A" id="menu_site_a" class="icheck"/> Ya
                                                </label>
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="menu_site" value="H" id="menu_site_b" class="icheck"/> Tidak
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_urutan" class="control-label">Urutan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_urutan" type="text" required class="form-control " id="menu_urutan" value="<?php echo $menu_urutan;?>" size="20" maxlength="25" placeholder="Masukan Urutan Menu"/>
                                        </td>
                                    </tr>
                                <?php if ($menu_level == 2) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='1'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } else if ($menu_level == 3) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='2'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } else if ($menu_level == 4) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='3'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>pengaturan/menu'"/>
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
    <li class=""><a href="<?php echo base_url();?>pengaturan/menu"> <?php echo $breadcrumb; ?> </a></li>
    <li class="active">Edit </li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>pengaturan/menu/edit" method="post" enctype="multipart/form-data"  data-parsley-validate>
                        <input type="hidden" name="menu_kode" value="<?php echo $menu_kode;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                     <tr class="validate">
                                        <td>
                                            <label for="menu_level" class="control-label">Level Menu <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php array_pilihan('menu_level', $level, $menu_level, 'submit();');?>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td width="130">
                                            <label for="menu_nama" class="control-label">Nama Menu <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_nama" type="text" id="menu_nama" value="<?php echo $menu_nama;?>" size="30" maxlength="255" required class="form-control " placeholder="Masukan Nama Menu"/>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td>
                                            <label for="menu_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_deskripsi" type="text" id="menu_deskripsi" value="<?php echo $menu_deskripsi;?>" size="50" maxlength="255" required class="form-control " placeholder="Masukan Deskripsi Menu"/>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td>
                                            <label for="menu_url" class="control-label">URL <span class="required">*</span></label>
                                        </td>
                                        <td><input name="menu_url" type="text" id="menu_url" value="<?php echo $menu_url;?>" size="50" maxlength="255" required class="form-control " placeholder="Masukan URL Menu"/></td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_site" class="control-label">Sertakan Site URL <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline">                                             
    	                                            <input type="radio" name="menu_site" value="A" id="menu_site_a" <?php echo $checked = ($menu_site == 'A')?'checked':''; ?> class="icheck"/> Ya
                                                </label>
                                                <label class="radio-inline">       
                                                    <input type="radio" name="menu_site" value="H" id="menu_site_b" <?php echo $checked = ($menu_site == 'H')?'checked':''; ?> class="icheck"/> Tidak
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="menu_urutan" class="control-label">Urutan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="menu_urutan" type="text" id="menu_urutan" value="<?php echo $menu_urutan;?>" size="20" maxlength="25" required class="form-control " placeholder="Masukan Urutan Menu"/>
                                        </td>
                                    </tr>
                                <?php if ($menu_level == 2) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='1'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } else if ($menu_level == 3) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='2'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } else if ($menu_level == 4) {?>
                                    <tr>
                                        <td>
                                            <label for="menu_subkode" class="control-label">SubMenu dari</label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='3'", 'menu_subkode', 'menu_kode', 'menu_nama', $menu_subkode);?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>pengaturan/menu'"/>
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
    <h4 class="modal-title">Detail. Menu</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Level Menu</strong></td>
                <td>: <?php echo $menu->menu_level;?></td>
            </tr>
            <tr>
                <td width="110">Nama Menu</td>
                <td>: <?php echo $menu->menu_nama;?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>: <?php echo $menu->menu_deskripsi;?></td>
            </tr>
            <tr>
                <td>URL</td>
                <td>: <?php echo site_url().$menu->menu_url;?></td>
            </tr>
            <tr class="awal">
                <td>Urutan</td>
                <td>: <?php echo $menu->menu_urutan;?></td>
            </tr>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<!-- ================================================== END DETAIL ================================================== -->

<!-- ================================================== HAK AKSES ================================================== -->
<?php } elseif ($action == 'hak_akses'){ ?>
<div class="page-content">
  <ol class="breadcrumb">
    <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class="active"><?php echo $breadcrumb; ?></li>
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
            <h2><?php echo $breadcrumb; ?> </h2>
            <div class="panel-ctrls"
              data-actions-container="" 
              data-action-collapse='{"target": ".panel-body"}'
              data-action-colorpicker=''>
            </div>
          </div>
          <div class="panel-editbox" data-widget-controls=""></div>
          <div class="panel-body">
                    <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <form role="form" class="form-horizontal" action="" name="formHakAkses" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="200">
                                            <label class="control-label">Pilih Kelompok Pengguna : </label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM admin_level WHERE admin_level_status='A'", 'admin_level_kode', 'admin_level_kode', 'admin_level_nama', $admin_level_kode, 'submit();');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="menu_utama" class="control-label">Pilih Menu Utama : </label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box2("SELECT * FROM menu WHERE menu_status='A' AND menu_level='1' ORDER BY menu_urutan ASC", 'menu_kode', 'menu_kode', 'menu_nama', $menu_kode, 'submit();');?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <table class="table no-border hover">
                                <tbody class="no-border-y">
                                   <tr class="validate">
                        <?php
		                   $i = 0;
		                   if ($menu_kode){
			                  $where_pengguna['menu_kode']	= $menu_kode;
			                  $where_pengguna['admin_level_kode']	= $admin_level_kode;
			                  $lisquery = $this->db->query("SELECT * FROM menu WHERE menu_level='2' AND menu_status='A' AND menu_subkode='".$menu_kode."' ORDER BY menu_urutan ASC");
			                  foreach ($lisquery->result() as $list){
				                     $i++;	
				                     $where_pengguna2['menu_kode']	= $list->menu_kode;
				$where_pengguna2['admin_level_kode']	= $admin_level_kode;
				                     $ceklist = ($this->ADM->count_all_menu_admin($where_pengguna2) < 1) ? '' : 'checked';
				                     echo "<tr>";
				                     echo "<td class='first' style='padding-left:35px;'><input type='checkbox' class='icheck' id='cb".$i."' name='menu[]' value='".$list->menu_kode."' ".$ceklist.">&nbsp;<label for='cb".$i."'><span class='nm'>".$list->menu_nama."</span></label></td>";
				                     echo "</tr>";
				                     $lisquery2 = $this->db->query("SELECT * FROM menu WHERE menu_level='3' AND menu_status='A' AND menu_subkode='".$list->menu_kode."' ORDER BY menu_urutan ASC");
				                     foreach ($lisquery2->result() as $list2){
					                    $i++;	
					                    $where_pengguna3['menu_kode']	= $list2->menu_kode;
					                    $where_pengguna3['admin_level_kode']	= $admin_level_kode;
					                    $ceklist = ($this->ADM->count_all_menu_admin($where_pengguna3) < 1) ? '' : 'checked';
					                    echo "<tr>";
					                    echo "<td class='first' style='padding-left:60px;'><input type='checkbox' class='icheck' id='cb".$i."' name='menu[]' value='".$list2->menu_kode."' ".$ceklist.">&nbsp;<label for='cb".$i."'><span class='nm'>".$list2->menu_nama."</span></label></td>";
					                    echo "</tr>";
				                     }
			                  $i++;
			                  }
		                   } elseif ($admin_level_kode) {
			                  $lisquery = $this->db->query("SELECT * FROM menu WHERE menu_level='1' AND menu_status='A' ORDER BY menu_urutan ASC");
			                  foreach ($lisquery->result() as $list){	
				                     $where_pengguna2['menu_kode'] = $list->menu_kode;
				                     $where_pengguna2['admin_level_kode'] = $admin_level_kode;
				                     $ceklist = ($this->ADM->count_all_menu_admin($where_pengguna2) < 1) ? '' : 'checked';
				                     echo "<tr>";
				                     echo "<td class='first' style='padding-left:35px;'><input type='checkbox' class='icheck' id='cb".$i."' name='menu[]' value='".$list->menu_kode."' ".$ceklist.">&nbsp;<label for='cb".$i."'><span class='nm'>".$list->menu_nama."</span></label></td>";
				                     echo "</tr>";
			                  $i++;
			                  }
		                   }
	                    ?>
	                    </table>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>pengaturan/hak_akses'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
</div>
<?php } ?>
<!-- ================================================== END HAK AKSES ================================================== -->
<!-- Include More Js For This Content -->                
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>	