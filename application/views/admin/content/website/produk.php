
<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
  <style>
  .prem {
    color: #32CD32;
    font-size: 14px;
  }
  .non {
    color: #F00;
    font-size: 14px;
  }
  </style>
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
                  <form action="<?php echo site_url();?>website/produk" method="post" id="form">
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
                                      <a class="btn btn-primary" title="Bersihkan Pencarian" href="<?php echo site_url();?>website/produk">
                                        <i class="fa fa-refresh"></i> 
                                      </a>
                                      <a class="btn btn-primary" title="Tambah Barang" href="<?php echo site_url();?>website/produk/tambah">
                                        <i class="fa fa-plus-circle"></i> 
                                      </a>
                                      <a class="btn btn-green" title="Export Excel" href="<?php echo site_url();?>website/produk_export">
                                        <i class="fa fa-file-text-o "></i>
                                      </a>
                                    </div>
                                </div>
                              </div>
                          </form>
                           <div class="table-responsive table-view">
                              <table class="table hover table-striped">
                            <thead class="primary-emphasis">
                                <tr>
                                    <th style="text-align:center" width="50">#</th>
                                    <th>NAMA BARANG</th>
                                    <th>KATEGORI BARANG</th>
                                    <th>STATUS</th>
                                    <th>PEMBUAT</th>
                                    <th style="text-align:center" width="120">TANGGAL</th>
                                    <th style="text-align:center" width="170">AKSI</th>
                             </tr>
                            </thead>
                            <tbody>
                                <?php 
                              $i  = $page+1;
                              $where_produk['admin_nama'] = $admin->admin_nama;
                              $like_produk[$cari] = $q;
                            if ($jml_data > 0){
                              foreach ($this->ADM->grid_all_produk('', 'produk_post', 'DESC', $batas, $page, '', $like_produk) as $row){
                                $kondisi = ($row->produk_kondisi == 'B')?'Baru':'Bekas'; 
                                $status  = ($row->produk_status == 'R')?'<span class=non>Non Premium</span>':'<span class=prem>Premium</span>';
                              ?>
                                <tr>
                                  <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->produk_nama;?></td>
                                    <td><?php echo $row->katproduk_nama;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $row->account_nama;?></td>
                                    <td align="center"><?php echo dateIndo4($row->produk_post);?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                       <div class="btn-action">
                                                    <a href="<?php echo site_url();?>website/produk/edit/<?php echo $row->produk_id; ?>" title="Edit <?php echo $row->produk_nama; ?>" class="btn btn-primary" ><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mod-info" type="button" href="<?php echo site_url();?>website/produk_detail/<?php echo $row->produk_id;?>" rel="detail" title="Detail <?php echo $row->produk_nama; ?>"><i class='fa fa-eye'></i></a>

                                                    <a href="<?php echo site_url();?>website/produk/status/<?php echo $row->produk_id; ?>" title="Edit Status Barang" class="btn btn-green" ><i class="fa fa-dollar"></i></a>

                                                    <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row->produk_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->produk_nama; ?>"><i class='fa fa-trash-o'></i></a> 
                                                </div>
                                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
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
                                        <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/produk/view', $id=""); }?>
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
            var editor = CKEDITOR.replace("produk_deskripsi",
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
        <a href="javascript:;" class="btn btn-danger" id="hapus-produk">Ya</a>
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
    <li class=""><a href="<?php echo base_url();?>website/produk"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/produk/tambah" method="post" enctype="multipart/form-data" data-parsley-validate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr class="validate">
                                        <td>
                                            <label for="account_id" class="control-label">Nama User <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM account", 'account_id', 'account_id', 'account_nama', $katproduk_id);?>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td width="130">
                                            <label for="produk_nama" class="control-label">Nama Barang <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="produk_nama" id="produk_nama" required class="form-control" value="" size="80" maxlength="100" placeholder="Masukan Nama Barang"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="katproduk_id" class="control-label">Kategori Barang <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM katproduk", 'katproduk_id', 'katproduk_id', 'katproduk_nama', $katproduk_id);?>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td width="150">
                                            <label for="produk_harga" class="control-label">Harga <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="number" name="produk_harga" id="produk_harga" required class="form-control" value="" size="80" maxlength="100" placeholder="Masukan Harga Barang"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="prduk_kondisi" class="control-label">Kondisi </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="produk_kondisi" id="baru" class="icheck" value="B"> Baru
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="produk_kondisi" id="bekas" class="icheck" value="S"> Bekas
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" id="produk_deskripsi" name="produk_deskripsi" class="form-control">
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td>
                                            <label for="produk_foto" class="control-label">Foto Utama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="produk_foto" id="produk_foto" required class="form-control" />
                                        </td>
                                    </tr>
                                   
                                     <tr class="validate">
                                        <td>
                                            <label for="produk_foto2" class="control-label">Foto Tambahan 2<span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="produk_foto2" id="produk_foto2" required class="form-control" />
                                        </td>
                                    </tr>                                    
                                     <tr class="validate">
                                        <td>
                                            <label for="produk_foto3" class="control-label">Foto Tambahan 3 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="produk_foto3" id="produk_foto3" required class="form-control" />
                                        </td>
                                    </tr>                          
                                     <tr class="validate">
                                        <td>
                                            <label for="produk_foto4" class="control-label">Foto Tambahan 4 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="produk_foto4" id="produk_foto4" required class="form-control" />
                                        </td>
                                    </tr>                          
                                     <tr class="validate">
                                        <td>
                                            <label for="produk_foto5" class="control-label">Foto Tambahan 5 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="produk_foto5" id="produk_foto5" required class="form-control" />
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <label for="prduk_status" class="control-label">Status Produk </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio"  class="icheck"  name="produk_status" id="premium" class="icheck" value="P"> Premium
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="produk_status" id="nonpremium" value="R"> Non Premium
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="news_email" id="news_email" value="<?php 
                                      $query = $this->db->query("SELECT * FROM newsletter ORDER BY news_id");
                                         foreach ($query->result() as $row){?><?php echo $row->news_email;?>, <?php }?>"class="form-control btn-sm input-sm" />
                                </tbody>
                            </table>
                        </div>
                        <div class='center' id="actions">
                            <input class="btn btn-primary start" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/produk'"/>
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
    <li class=""><a href="<?php echo base_url();?>website/produk"> <?php echo $breadcrumb; ?> </a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/produk/edit/<?php echo $produk_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="produk_id" value="<?php echo $produk_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                <tr class="validate">
                                        <td>
                                            <label for="account_id" class="control-label">Nama User <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM account", 'account_id', 'account_id', 'account_nama', $account_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="produk_nama" class="control-label">Nama Barang <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="produk_nama" type="text" required class="form-control" id="produk_nama" value="<?php echo $produk_nama;?>" size="80" maxlength="100" placeholder="Masukan Nama Barang"/>
                                        </td>
                                    </tr>
                                    <tr class="validate">
                                        <td>
                                            <label for="katproduk_id" class="control-label">Kategori Barang <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM katproduk", 'katproduk_id', 'katproduk_id', 'katproduk_nama', $katproduk_id);?>
                                        </td>
                                    </tr>
                                     <tr class="validate">
                                        <td width="130">
                                            <label for="produk_harga" class="control-label">Harga <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="number" name="produk_harga" id="produk_harga" required class="form-control" value="<?php echo $produk_harga;?>" size="80" maxlength="100" placeholder="Masukan Harga Barang"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_kondisi" class="control-label">Kondisi </label>
                                        </td>
                                        <td>
                                             <div id="icheck">
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="produk_kondisi" value="B" id="BARU" <?php echo $baru = ($produk_kondisi=='B')?'checked':'';?>/> Baru
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="produk_kondisi" value="S" id="S" <?php echo $bekas = ($produk_kondisi=='S')?'checked':'';?>/> Bekas
                                                 </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="40" cols="60" id="produk_deskripsi" name="produk_deskripsi" class="form-control">
                                                <?php echo $produk_deskripsi;?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($produk_foto){?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto" class="control-label">Foto Utama</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/produk/".$produk_foto;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_foto" class="control-label">Edit Foto Utama</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="produk_foto" id="produk_foto" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto" class="control-label">Foto Utama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="produk_foto" id="produk_foto"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                 <?php if ($produk_foto2){?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto2" class="control-label">Foto Tambahan 2</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/produk/".$produk_foto2;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_foto2" class="control-label">Edit Foto Tambahan 2</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="produk_foto2" id="produk_foto2" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto2" class="control-label">Foto Tambahan 2 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="produk_foto2" id="produk_foto2"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                 <?php if ($produk_foto3){?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto3" class="control-label">Foto Tambahan 3</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/produk/".$produk_foto3;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_foto3" class="control-label">Edit Foto Tambahan 3</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="produk_foto3" id="produk_foto3" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto3" class="control-label">Foto Tambahan 3 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="produk_foto3" id="produk_foto3"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                 <?php if ($produk_foto4){?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto4" class="control-label">Foto Tambahan 4</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/produk/".$produk_foto4;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_foto4" class="control-label">Edit Foto Tambahan 4</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="produk_foto4" id="produk_foto4" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto4" class="control-label">Foto Tambahan 4 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="produk_foto4" id="produk_foto4"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                 <?php if ($produk_foto5){?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto5" class="control-label">Foto Tambahan 5</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/produk/".$produk_foto5;?>" width="120"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="produk_foto5" class="control-label">Edit Foto Tambahan 5</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="produk_foto5" id="produk_foto5" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="produk_foto5" class="control-label">Foto Tambahan 5 <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="produk_foto5" id="produk_foto5"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td>
                                            <label for="produk_status" class="control-label">Status Produk </label>
                                        </td>
                                        <td>
                                             <div id="icheck">
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="produk_status" value="P" id="P" <?php echo $premium = ($produk_status=='P')?'checked':'';?>/> Premium
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="produk_status" value="R" id="R" <?php echo $nonpremium = ($produk_status=='R')?'checked':'';?>/> Non Premium
                                                 </label>
                                            </div>
                                        </td>
                                    </tr>
                             </tbody></table>
                        <div class='center'>
                        <input class="btn btn-primary start" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/produk'"/>
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
        <a href="javascript:;" class="btn btn-danger" id="hapus-produk-img">Ya</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>

    </div>
  </div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. Barang</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $produk->produk_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">Nama User</td>
                <td>: <?php echo $produk->account_nama;?></td>
            </tr>
            <tr class="awal">
                <td width="110">Nama Barang</td>
                <td>: <?php echo $produk->produk_nama;?></td>
            </tr>
            <tr>
                <td>Kategori Barang</td>
                <td>: <?php echo $produk->produk_nama;?></td>
            </tr>
            <tr class="awal">
                <td>Harga</td>
                <td>: <?php echo $produk->produk_harga;?></td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>: <?php echo ($produk->produk_kondisi == 'B')?'Baru':'Bekas'; ?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>: </td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="produk_deskripsi" name="produk_deskripsi" readonly ><?php echo $produk->produk_deskripsi;?></textarea><?php echo $ckeditor;?></td>
            </tr>
            <tr>
                <td>Status Produk</td>
                <td>: <?php echo ($produk->produk_status == 'P')?'Premium':'Non Premium'; ?></td>
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
    <th>produk_nama</th>
    <th>katproduk_id</th>
    <th>produk_harga</th>
    <th>produk_kondisi</th>
    <th>produk_deskripsi</th>
    <th>produk_foto</th>
    <th>produk_foto2</th>
    <th>produk_foto3</th>
    <th>produk_foto4</th>
    <th>produk_foto5</th>
    <th>produk_hits</th>
    <th>produk_status</th>
    <th>account_id</th>
    <th>produk_post</th>
  </tr>
  <?php
  $sql = $this->db->query("SELECT * FROM produk ORDER BY produk_id");
        foreach ($sql->result() as $row){
  ?>
    <tr>
      <td><?php echo $row->produk_nama;?></td>
      <td><?php echo $row->katproduk_id;?></td>
      <td><?php echo $row->produk_harga;?></td>
      <td><?php echo $row->produk_kondisi;?></td>
      <td><?php echo $row->produk_deskripsi;?></td>
      <td><?php echo $row->produk_foto;?></td>
      <td><?php echo $row->produk_foto2;?></td>
      <td><?php echo $row->produk_foto3;?></td>
      <td><?php echo $row->produk_foto4;?></td>
      <td><?php echo $row->produk_foto5;?></td>
      <td><?php echo $row->produk_hits;?></td>
      <td><?php echo $row->produk_status;?></td>
      <td><?php echo $row->account_id;?></td>
      <td><?php echo $row->produk_post;?></td>
    </tr>
   <?php } ?>
</table>
<?php } ?>              
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->                
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>