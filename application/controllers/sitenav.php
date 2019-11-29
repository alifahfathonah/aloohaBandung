<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitenav extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
	}
	
	public function index()
	{
			$data['web']					= $this->ADM->identitaswebsite();
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['content']				= 'admin/dashboard/index';
			$data['jml_data_komentar']		= $this->ADM->count_all_komentar('');
			$data['jml_data_berita']		= $this->ADM->count_all_berita('');
			$data['jml_data_agenda']		= $this->ADM->count_all_agenda('');
			$data['jml_data_testimonial']	= $this->ADM->count_all_testimonial('');
            $data['breadcrumb']             = 'Dashboard';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$this->load->vars($data);
			$this->load->view('admin/site/index');
	 }
    
    // ================================================== MODUL WEB ================================================== //
    // IDENTITAS WEB
    public function identitas($filter1='', $filter2='', $filter3='')
    {
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Identitas Website';
			$data['content']				= 'admin/dashboard/identitas';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('identitas_website'=>'Nama Website',
													'identitas_deskripsi'=>'Deskripsi',
													'identitas_keyword'=>'Keyword',
													'identitas_notelp'=>'No Telepon',
													'identitas_email'=>'Email',
													'identitas_fb'=>'Facebook',
													'identitas_tw'=>'Twitter',
													'identitas_yb'=>'Youtube',	
													'identitas_maps'=>'Koordinat Google Maps',														
													'identitas_favicon' => 'Favicon');
			if($data['action'] == 'edit') {
				$data['onload']					= 'identitas_website';
				$where_identitas['identitas_id']= $filter2;
				$identitas						= $this->ADM->get_identitas('',$where_identitas);
				$data['identitas_id']			= ($this->input->post('identitas_id'))?$this->input->post('identitas_id'):$identitas->identitas_id;
				$data['identitas_website']		= ($this->input->post('identitas_website'))?$this->input->post('identitas_website'):$identitas->identitas_website;
				$data['identitas_deskripsi']	= ($this->input->post('identitas_deskripsi'))?$this->input->post('identitas_deskripsi'):$identitas->identitas_deskripsi;
				$data['identitas_keyword']		= ($this->input->post('identitas_keyword'))?$this->input->post('identitas_keyword'):$identitas->identitas_keyword;
				$data['identitas_alamat']		= ($this->input->post('identitas_alamat'))?$this->input->post('identitas_alamat'):$identitas->identitas_alamat;
				$data['identitas_notelp']		= ($this->input->post('identitas_notelp'))?$this->input->post('identitas_notelp'):$identitas->identitas_notelp;
				$data['identitas_email']		= ($this->input->post('identitas_email'))?$this->input->post('identitas_email'):$identitas->identitas_email;
				$data['identitas_fb']			= ($this->input->post('identitas_fb'))?$this->input->post('identitas_fb'):$identitas->identitas_fb;
				$data['identitas_tw']			= ($this->input->post('identitas_tw'))?$this->input->post('identitas_tw'):$identitas->identitas_tw;
				$data['identitas_gp']			= ($this->input->post('identitas_gp'))?$this->input->post('identitas_gp'):$identitas->identitas_gp;
				$data['identitas_yb']			= ($this->input->post('identitas_yb'))?$this->input->post('identitas_yb'):$identitas->identitas_yb;
				$data['identitas_maps']			= ($this->input->post('identitas_maps'))?$this->input->post('identitas_maps'):$identitas->identitas_maps;
				$data['identitas_author']		= ($this->input->post('identitas_author'))?$this->input->post('identitas_author'):$identitas->identitas_author;
				$data['identitas_warning']		= ($this->input->post('identitas_warning'))?$this->input->post('identitas_warning'):$identitas->identitas_warning;
				$data['identitas_aktif']		= ($this->input->post('identitas_aktif'))?$this->input->post('identitas_aktif'):$identitas->identitas_aktif;
				$data['identitas_favicon']		= ($this->input->post('identitas_favicon'))?$this->input->post('identitas_favicon'):$identitas->identitas_favicon;	
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$gambar	= upload_image("identitas_favicon", "./assets/");
					$data['identitas_favicon']	= $gambar;
					$where_edit['identitas_id']				= validasi_sql($data['identitas_id']);
					$edit['identitas_website']				= validasi_sql($data['identitas_website']);
					$edit['identitas_deskripsi']			= validasi_sql($data['identitas_deskripsi']);
					$edit['identitas_keyword']				= validasi_sql($data['identitas_keyword']);
					$edit['identitas_alamat']				= validasi_sql($data['identitas_alamat']);
					$edit['identitas_notelp']				= validasi_sql($data['identitas_notelp']);
					$edit['identitas_email']				= validasi_sql($data['identitas_email']);
					$edit['identitas_fb']					= validasi_sql($data['identitas_fb']);
					$edit['identitas_tw']					= validasi_sql($data['identitas_tw']);
					$edit['identitas_gp']					= validasi_sql($data['identitas_gp']);
					$edit['identitas_yb']					= validasi_sql($data['identitas_yb']);	
					$edit['identitas_maps']					= validasi_sql($data['identitas_maps']);
					$edit['identitas_author']				= validasi_sql($data['identitas_author']);
					$edit['identitas_warning']					= validasi_sql($data['identitas_warning']);
					$edit['identitas_aktif']					= validasi_sql($data['identitas_aktif']);		
					if ($data['identitas_favicon']) { 
						$row = $this->ADM->get_identitas('*', $where_edit);
						@unlink('./assets/'.$row->identitas_favicon);
						$edit['identitas_favicon']	= validasi_sql($data['identitas_favicon']); 
					}
					$this->ADM->update_identitas($where_edit, $edit);
					$this->session->set_flashdata('success','Identitas Website telah berhasil diedit!,');
					redirect("sitenav/identitas/edit/1");
				}
			} 
		 
			$this->load->vars($data);
			$this->load->view('admin/site');
		 
    }
	public function pengguna($filter1='', $filter2='', $filter3='')
	{
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Pengguna';
			$data['content'] 			= 'admin/dashboard/account';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '162';
			$data['action']				= (empty($filter1))?'view':$filter1;			
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('admin_user'=>'USERNAME',
													'admin_nama'=>'NAMA LENGKAP',
													'admin_telepon'=>'TELEPON',
													'admin_level_kode'=>'KELOMPOK');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'admin_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				//$where_admin['admin_status']	= 'A';
				$like_admin[$data['cari']]	= $data['q'];
				$data['jml_data_admin']		= $this->ADM->count_all_admin('');
				$data['jml_data']			= $this->ADM->count_all_admin('', $like_admin);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['validate']			= array('admin_user'=>'Username',
												'admin_pass'=>'Password',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']				= 'admin_user';
				$data['admin_user']			= ($this->input->post('admin_user'))?$this->input->post('admin_user'):'';
				$data['admin_pass']			= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):'';
				$data['admin_nama']			= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):'';
				$data['admin_alamat']		= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):'';				
				$data['admin_telepon']		= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):'';
				$data['admin_level_kode']	= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):'';
				
				$where['admin_user']		= $data['admin_user'];
				$jml_pengguna				= $this->ADM->count_all_admin($where);
								
				$simpan						= $this->input->post('simpan');
				if ($simpan && $jml_pengguna < 1 ){								
					$insert['admin_user']		= validasi_sql($data['admin_user']);
					$insert['admin_pass']		= validasi_sql(do_hash(($data['admin_pass']), 'md5'));
					$insert['admin_nama']		= validasi_sql($data['admin_nama']);
					$insert['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$insert['admin_telepon']	= validasi_sql($data['admin_telepon']);
					$insert['admin_level_kode']	= validasi_sql($data['admin_level_kode']);			
					$insert['admin_status']		= validasi_sql('A');
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Pengguna baru telah berhasil ditambahkan!,');
					redirect("sitenav/pengguna");
				} elseif ($simpan && $jml_pengguna > 0 ){
					echo '<script type="text/javascript">
						  	alert("Pengguna telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$data['validate']			= array('admin_user'=>'Pengguna',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']					= 'admin_nama';
				$where_admin['admin_user']		= $filter2; 
				$admin							= $this->ADM->get_admin('*', $where_admin);
				$data['admin_user']				= ($this->input->post('admin_user'))?$this->input->post('admin_user'):$admin->admin_user;
				$data['admin_pass']				= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):$admin->admin_pass;				
				$data['admin_nama']				= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):$admin->admin_nama;				
				$data['admin_alamat']			= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):$admin->admin_alamat;				
				$data['admin_telepon']			= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):$admin->admin_telepon;				
				$data['admin_level_kode']		= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):$admin->admin_level_kode;	
				$simpan							= $this->input->post('simpan');
				if ($simpan){
					$where_edit['admin_user']	= validasi_sql($data['admin_user']);
					if ($data['admin_pass'] <> '') {						
					$edit['admin_pass']			= validasi_sql(do_hash(($data['admin_pass']), 'md5')); }
					$edit['admin_nama']			= validasi_sql($data['admin_nama']);
					$edit['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$edit['admin_telepon']		= validasi_sql($data['admin_telepon']);					
					$edit['admin_level_kode']	= validasi_sql($data['admin_level_kode']);
					$this->ADM->update_admin($where_edit, $edit);
					$this->session->set_flashdata('success','Pengguna telah berhasil diedit!,');
					redirect("sitenav/pengguna");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_edit['admin_user']= $filter2;
				$edit['admin_status']	= 'H';
				$this->ADM->update_admin($where_edit, $edit);
				$this->session->set_flashdata('warning','Pengguna telah berhasil dihapus!,');
				redirect("sitenav/pengguna");
			}
			$this->load->vars($data);
			$this->load->view('admin/site');
		
	}
	
	public function pengguna_detail($admin_user="")
	{
			$data['web']					= $this->ADM->identitaswebsite();
			$where_admin['admin_user']	= $admin_user; 
			$data['admin'] 				= $this->ADM->get_admin('', $where_admin);
			$data['action']				= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/dashboard/pengguna');
		
	}
    
    
}