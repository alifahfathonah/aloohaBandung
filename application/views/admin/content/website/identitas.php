<?php if ($action == 'view' || empty($action)){ ?>
<?php } elseif ($action == 'edit') { ?>
<div class="page-content">
	<ol class="breadcrumb">
		<li class=""><a href="<?php echo site_url();?>admin"><i class="fa fa-home"></i>Dashboard</a></li>
		<li class="active">Identitas Website</li>
	</ol>						
	<div class="page-heading">
		<h1>Identitas Website</h1>
		
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default" data-widget='{"draggable": "false"}'>
					<div class="panel-heading">
						<h2>Edit Identitas Website</h2>
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
									<i class="fa fa-check sign"></i>&nbsp;<?php echo $this->session->flashdata('success'); ?>
                            	</div>
                        	<?php } else if ($this->session->flashdata('warning')) { ?>
                            	<div class="alert alert-warning">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="fa fa-check sign"></i>&nbsp;<?php echo $this->session->flashdata('warning'); ?>
                            	</div>
                        	<?php } else { ?>
                            	<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="fa fa-warning sign"></i>&nbsp;<?php echo $this->session->flashdata('error'); ?>
                            	</div>
                        	<?php } ?>
                    	<?php } ?>
                    	<!-- ========== End Flashdata ========== -->
	                 	<form  role="form" class="form-horizontal" action="<?php echo site_url();?>website/identitas/edit/<?php echo $identitas_id;?>" method="post" enctype="multipart/form-data" data-parsley-validate>
                            <input type="hidden" name="identitas_id" value="<?php echo $identitas_id;?>" />
                            <div class="table-responsive">
                                <table class="table hover">
                                    <tbody>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_website" class="control-label">Nama Website <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Nama Website" size="100" name="identitas_website" id="identitas_website" value="<?php echo $identitas_website; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_deskripsi" class="control-label">Meta Deskripsi <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Nama Website" size="100" name="identitas_deskripsi" id="identitas_deskripsi" value="<?php echo $identitas_deskripsi; ?>">
                                            </td>
                                        </tr>
                                       <tr class="validate">
        	                               <td>
                                                <label for="identitas_keyword" class="control-label">Meta Keyword <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Meta Keyword" size="100" name="identitas_keyword" id="identitas_keyword" value="<?php echo $identitas_keyword; ?>">
                                            </td>
                                        </tr>
                                       <tr class="validate">
                                            <td>
                                                <label for="identitas_alamat" class="control-label">Alamat <span class="required">*</span></label>
                                            </td>
                                            <td>    
                                                <input type="text" required class="form-control" placeholder="Masukan Alamat" size="100" name="identitas_alamat" id="identitas_alamat" value="<?php echo $identitas_alamat; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
        	                               <td>
                                               <label for="identitas_notelp" class="control-label">No.Telepon <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required parsley-maxlength="15" class="form-control" placeholder="Masukan Alamat" size="100" name="identitas_notelp" id="identitas_notelp" value="<?php echo $identitas_notelp; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_email" class="control-label">Email <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="email" required class="form-control" placeholder="Masukan Email" size="100" name="identitas_email" id="identitas_email" value="<?php echo $identitas_email; ?>">
                                            </td>
                                        </tr>
                                       <tr class="validate">
        	                                <td>
                                               <label for="identitas_fb" class="control-label">Facebook <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Akun Facebook" size="100" name="identitas_fb" id="identitas_email" value="<?php echo $identitas_fb; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_tw" class="control-label">Twitter <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Akun Twitter" size="100" name="identitas_tw" id="identitas_tw" value="<?php echo $identitas_tw; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_ig" class="control-label">Instagram <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Akun Instagram" size="100" name="identitas_ig" id="identitas_ig" value="<?php echo $identitas_ig; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_gp" class="control-label">Google Plus <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Akun Google Plus" size="100" name="identitas_gp" id="identitas_gp" value="<?php echo $identitas_gp; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_email" class="control-label">Youtube <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Akun Youtube" size="100" name="identitas_yb" id="identitas_yb" value="<?php echo $identitas_yb; ?>">
                                            </td>
                                        </tr>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_maps" class="control-label">Koordinat Google Maps <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" placeholder="Masukan Koordinat Google Maps" size="100" name="identitas_maps" id="identitas_maps" value="<?php echo $identitas_maps; ?>">
                                            </td>
                                        </tr>                                        
                                       
                                    <?php if ($identitas_favicon){?>
                                        <tr>
        	                               <td>
                                               <label for="identitas_favicon" class="control-label">Favicon</label>
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/<?php echo $identitas_favicon; ?>" style="width:50px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_favicon" class="control-label">Ganti Favicon</label>
                                            </td>
                                            <td>
                                                <input type="file" class="form-control" size="100" name="identitas_favicon" id="identitas_favicon" value="<?php echo $identitas_favicon; ?>">
                                            </td>
                                        </tr>    
                                        <?php } else {?>
                                        <tr class="validate">
                                            <td>
                                                <label for="identitas_favicon" class="control-label">Favicon <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="file" required class="form-control" size="100" name="identitas_favicon" id="identitas_favicon" value="<?php echo $identitas_favicon; ?>">
                                            </td>
                                        </tr>
                                    <?php }?>             
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer center">
								<div class="row">
									<div class="col-sm-12">
										<input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                                		<input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin'"/>
									</div>
								</div>
							</div>                          
                        </form>
         			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
