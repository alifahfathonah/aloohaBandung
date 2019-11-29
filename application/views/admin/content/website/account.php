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
                       <!-- ========== End Flashdata ========== -->
                    <form action="<?php echo site_url();?>website/account" method="post" id="form">
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
                                      <a class="btn btn-primary" title="Bersihkan Pencarian" href="<?php echo site_url();?>website/account">
                                        <i class="fa fa-refresh"></i> 
                                      </a>
                                      <a class="btn btn-primary" title="Tambah User" href="<?php echo site_url();?>website/account/tambah">
                                        <i class="fa fa-plus-circle"></i> 
                                      </a>
                                      <a class="btn btn-green" title="Export Excel" href="<?php echo site_url();?>website/account_export">
                                        <i class="fa fa-file-text-o "></i>
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
                                    <th style="text-align:center" width="50">#</th>
                                    <th>NAMA</th>
                                    <th>E-MAIL</th>
                                    <th>KOTA</th>
                                    <th style="text-align:center">TANGGAL</th>
                                    <th style="text-align:center" width="150">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $page+1;
		                        $like_account[$cari] = $q;
                            if ($jml_data > 0) {
                                foreach($this->ADM->grid_all_account('', 'account_post', 'DESC', $batas, $page , '', $like_account) as $row) {
		                        ?>
                                <tr>
        	                        <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->account_nama;?></td>
                                    <td><?php echo $row->account_email;?></td>
                                    <td><?php echo $row->kota_nama;?></td>
                                    <td style="text-align:center"><?php echo dateIndo($row->account_post);?></td>
                                  <td align="center">
                                            <div class="btn-action">
                                                   <a href="<?php echo site_url();?>website/account/edit/<?php echo $row->account_id; ?>" title="Edit <?php echo $row->account_nama; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mod-info" type="button" href="<?php echo site_url();?>website/account_detail/<?php echo $row->account_id;?>" rel="detail" title="Detail <?php echo $row->account_nama; ?>"><i class='fa fa-eye'></i></a>
                                                    <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row->account_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->account_nama; ?>"><i class='fa fa-trash-o'></i></a> 
                                                </div>
                                           </td>
                                </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="6">Belum ada data!.</td>
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
                                        <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/account/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-account">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<div class="page-content">
  <ol class="breadcrumb">
    <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class=""><a href="<?php echo base_url();?>website/account"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/account/tambah" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="account_nama" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_nama" type="text" id="account_nama" required class="form-control" value="<?php echo $account_nama;?>" placeholder="Masukan Nama" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_email" class="control-label">E-mail <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_email" type="email" id="account_email" required class="form-control" value="<?php echo $account_email;?>" placeholder="Masukan Email" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_password1" class="control-label">Password <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_password1" type="password" id="account_password1" required class="form-control" value="<?php echo $account_password1;?>" placeholder="Masukan Password" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <label for="account_jk" class="control-label">Jenis Kelamin</label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio"  checked=""  name="account_jk" id="account_jk" value="L"> Laki-laki
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="account_jk" id="account_jk" value="P"> Perempuan
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_alamat" class="control-label">Alamat </label>
                                        </td>
                                        <td>
                                            <textarea id="account_alamat" name="account_alamat" class="form-control"><?php echo $account_email;?></textarea>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                            <td width="130">
                                                <label for="provinsi_id" class="control-label">Provinsi <span class="required">*</span></label>
                                            </td>
                                            <td><?php $this->ADM->combo_box("SELECT * FROM provinsi", 'provinsi_id', 'provinsi_id', 'provinsi_nama', $provinsi_id, 'submit();');?>
                                            </td>
                                        </tr>
                                      <?php if ($provinsi_id == $provinsi_id) {?>
                                      <tr class="validate">
                                            <td>
                                                <label for="kota_id" class="control-label">Kota <span class="required">*</span></label>
                                            </td>
                                            <td>

                                                <?php $this->ADM->combo_box("SELECT * FROM kota WHERE provinsi_id='$provinsi_id'", 'kota_id', 'kota_id', 'kota_nama', $kota_id);?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_tlp" class="control-label">Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_tlp" type="text" id="account_tlp" required class="form-control" value="<?php echo $account_tlp;?>" placeholder="Masukan Telepon" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="account_foto" class="control-label">Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="account_foto" id="account_foto" required class="form-control" />
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <label for="account_status" class="control-label">Status </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio"  class="icheck"  name="account_status" id="Y" class="icheck" value="Y"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="account_status" id="N" value="N"> Tidak
                                                </label> 
                                            </div>
                                            <p>* Bila status <b>tidak</b> maka user tidak bisa login</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/account'"/>
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
<script type="text/javascript">
function checkPass(){
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('account_password1');
  var pass2 = document.getElementById('account_password2');
  //Store the Confimation Message Object ...
  var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Compare the values in the password field 
  //and the confirmation field
  if(pass1.value == pass2.value){
    //The passwords match. 
    //Set the color to the good color and inform
    //the user that they have entered the correct password 
    //pass2.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Password Sesuai!"
  }else{
    //The passwords do not match.
    //Set the color to the bad color and
    //notify the user.
    //pass2.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "Password Tidak Sesuai!"
  }
}  
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/password-strength.js"></script>
<style type="text/css">
#formMenu .short{color:#FF0000;}
#formMenu .short_param{width:25px;background:#FF0000;}
#formMenu .weak{color:#E66C2C;}
#formMenu .weak_param{width:50px;background:#E66C2C;}
#formMenu .good{color:#2D98F3; }
#formMenu .good_param{width:75px;background:#2D98F3;}
#formMenu .strong{color:#006400;}
#formMenu .strong_param{width:100px;background:#006400;}
</style>
<div class="page-content">
  <ol class="breadcrumb">
    <li class=""><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
    <li class=""><a href="<?php echo base_url();?>website/account"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/account/edit/<?php echo $account_id; ?>" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <input type="hidden" name="account_id" value="<?php echo $account_id;?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
    	                             <tr class="validate">
                                        <td width="130">
                                            <label for="account_nama" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_nama" type="text" id="account_nama" required class="form-control" value="<?php echo $account_nama;?>" placeholder="Masukan Nama" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_email" class="control-label">E-mail <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_email" type="email" id="account_email" required class="form-control" value="<?php echo $account_email;?>" placeholder="Masukan Email" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td width="130">
                                            <label for="account_password1" class="control-label">Password </label>
                                        </td>
                                        <td>
                                           <input name="account_password1" class="form-control" type="password" id="account_password1" value="" size="30" maxlength="50"/><div style="height: 20px; margin-left: 5px; margin-bottom: -5px; display:inline-block; width: 300px; position:relative;">
                                        <span id="strength"  style="font-size:10px; font-weight: bold; height:10px; display:block; position:absolute; top:0px;  margin-bottom: 2px;"></span>
                                       <span id="parameter" style="font-size:10px; font-weight: bold; height:10px; display:block; position:absolute; bottom:0px; margin-top: 2px;"></span>
                                            </div>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td width="130">
                                            <label for="account_password2" class="control-label">Ulangi Password </label>
                                        </td>
                                        <td>
                                           <input name="account_password2" class="form-control" type="password" id="account_password2" value="" size="30" maxlength="50" onkeyup="checkPass(); return false;"/><span id="confirmMessage" class="confirmMessage" style="font-size:12px; font-weight: bold; padding-left: 10px;"></span>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <label for="account_jk" class="control-label">Jenis Kelamin</label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $yes = ($account_jk=='L')?'checked':'';?> name="account_jk" id="L" value="L"> Laki-laki
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $no = ($account_jk=='P')?'checked':'';?> name="account_jk" id="P" value="P"> Perempuan
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_alamat" class="control-label">Alamat </label>
                                        </td>
                                        <td>
                                            <textarea id="account_alamat" name="account_alamat" class="form-control"><?php echo $account_alamat;?></textarea>
                                        </td>
                                    </tr>
                                      <tr class="validate">
                                            <td width="130">
                                                <label for="provinsi_id" class="control-label">Provinsi <span class="required">*</span></label>
                                            </td>
                                            <td><?php $this->ADM->combo_box("SELECT * FROM provinsi", 'provinsi_id', 'provinsi_id', 'provinsi_nama', $provinsi_id, 'submit();');?>
                                            </td>
                                        </tr>
                                      <?php if ($provinsi_id == $provinsi_id) {?>
                                      <tr class="validate">
                                            <td>
                                                <label for="kota_id" class="control-label">Kota <span class="required">*</span></label>
                                            </td>
                                            <td>

                                                <?php $this->ADM->combo_box("SELECT * FROM kota WHERE provinsi_id='$provinsi_id'", 'kota_id', 'kota_id', 'kota_nama', $kota_id);?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                      <tr class="validate">
                                        <td width="130">
                                            <label for="account_tlp" class="control-label">Telepon <span class="required">*</span></label>
                                        </td>
                                        <td>
                                           <input name="account_tlp" type="text" id="account_tlp" required class="form-control" value="<?php echo $account_tlp;?>" placeholder="Masukan Telepon" size="30" maxlength="30"/>
                                        </td>
                                    </tr>
                                          <?php if ($account_foto){?>
                                    <tr>
                                        <td>
                                            <label for="account_foto" class="control-label">Foto </label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/account/".$account_foto;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="account_foto" class="control-label">Edit Foto </label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="account_foto" id="account_foto" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="account_foto" class="control-label">Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="account_foto" id="account_foto"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                     <tr>
                                        <td>
                                            <label for="account_status" class="control-label">Status </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio"  class="icheck"  name="account_status"  <?php echo $yes = ($account_status=='Y')?'checked':'';?> id="Y" class="icheck" value="Y"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $no = ($account_status=='N')?'checked':'';?> name="account_status" id="N" value="N"> Tidak
                                                </label> 
                                            </div>
                                            <p>* Bila status <b>tidak</b> maka user tidak bisa login</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/account'"/>
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
    <h4 class="modal-title">Detail. User</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" align="center" id="form_detail">
          <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $account->account_id; ?></strong></td>
    	    </tr>
    	    <tr>
        	    <td width="130">Nama Penjual</td>
                <td>: <?php echo  $account->account_nama; ?></td>
          </tr>
          <tr class="awal">
              <td width="130">E-mail</td>
                <td>: <?php echo  $account->account_email; ?></td>
          </tr>
          <tr class="awal">
              <td width="130">Jenis Kelamin</td>
                <td>: <?php  $jk = ($account->account_jk == 'L')?'Laki-laki':'Perempuan';  echo 
                                $jk;  ?></td>
          </tr>
          <tr>
              <td width="130">Alamat</td>
                <td>: <?php echo  $account->account_alamat; ?></td>
          </tr>
          <tr class="awal">
              <td width="130">Kota</td>
                <td>: <?php echo  $account->kota_nama; ?></td>
          </tr>
          <tr>
              <td width="130">Telepon</td>
                <td>: <?php echo  $account->account_tlp; ?></td>
          </tr>
          <tr class="awal">
              <td width="130">Status Penjual</td>
                <td>: <?php  $status = ($account->account_status== 'Y')?'Aktif':'Tidak';  echo $status;  ?></td>
          </tr>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } elseif ($action == 'export') { ?>

<table border="1">
  <tr>
    <th>account_email</th>
    <th>account_password1</th>
    <th>account_password2</th>
    <th>account_nama</th>
    <th>account_jk</th>
    <th>account_alamat</th>
    <th>kota_id</th>
    <th>account_tlp</th>
    <th>account_foto</th>
    <th>account_status</th>
    <th>account_post</th>
  </tr>
  <?php
  $sql = $this->db->query("SELECT * FROM account ORDER BY account_id");
        foreach ($sql->result() as $row){
  ?>
    <tr>
      <td><?php echo $row->account_email;?></td>
      <td><?php echo $row->account_password1;?></td>
      <td><?php echo $row->account_password2; ?></td>
      <td><?php echo $row->account_nama;?></td>
      <td><?php echo $row->account_jk;?></td>
      <td><?php echo $row->account_alamat;?></td>
      <td><?php echo $row->kota_id;?></td>
      <td><?php echo $row->account_tlp;?></td>
      <td><?php echo $row->account_foto;?></td>
      <td><?php echo $row->account_status;?></td>
      <td><?php echo $row->account_post;?></td>
    </tr>
   <?php } ?>
</table>
<?php } ?>  
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>
