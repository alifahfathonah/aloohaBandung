<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['content'] 				= 'admin/dashboard/statistik';
			$data['jml_data_komentar']		= $this->ADM->count_all_komentar('');
			$data['jml_data_berita']		= $this->ADM->count_all_berita('');
			$data['jml_data_agenda']		= $this->ADM->count_all_agenda('');
			$data['jml_data_testimonial']	= $this->ADM->count_all_testimonial('');
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("sign_in");
		}
	 }
    
    // ================================================== MODUL WEB ================================================== //
    // IDENTITAS WEB
    public function identitas($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Identitas Website';
			$data['content']				= 'admin/content/website/identitas';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'edit') {		
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
				$data['identitas_ig']			= ($this->input->post('identitas_ig'))?$this->input->post('identitas_ig'):$identitas->identitas_ig;
				$data['identitas_gp']			= ($this->input->post('identitas_gp'))?$this->input->post('identitas_gp'):$identitas->identitas_gp;
				$data['identitas_yb']			= ($this->input->post('identitas_yb'))?$this->input->post('identitas_yb'):$identitas->identitas_yb;
				$data['identitas_maps']			= ($this->input->post('identitas_maps'))?$this->input->post('identitas_maps'):$identitas->identitas_maps;
				$data['identitas_author']			= ($this->input->post('identitas_author'))?$this->input->post('identitas_author'):$identitas->identitas_author;
				$data['identitas_warning']			= ($this->input->post('identitas_warning'))?$this->input->post('identitas_warning'):$identitas->identitas_warning;
				$data['identitas_aktif']			= ($this->input->post('identitas_aktif'))?$this->input->post('identitas_aktif'):$identitas->identitas_aktif;
				$data['identitas_favicon']		= ($this->input->post('identitas_favicon'))?$this->input->post('identitas_favicon'):$identitas->identitas_favicon;	
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$gambar	= upload_file("identitas_favicon", "./assets/");
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
					$edit['identitas_ig']					= validasi_sql($data['identitas_ig']);
					$edit['identitas_gp']					= validasi_sql($data['identitas_gp']);
					$edit['identitas_yb']					= validasi_sql($data['identitas_yb']);	
					$edit['identitas_maps']					= validasi_sql($data['identitas_maps']);	
					$edit['identitas_author']					= validasi_sql($data['identitas_author']);
					$edit['identitas_warning']					= validasi_sql($data['identitas_warning']);	
					$edit['identitas_aktif']					= validasi_sql($data['identitas_aktif']);	
					if ($data['identitas_favicon']) { 
						$row = $this->ADM->get_identitas('*', $where_edit);
						@unlink('./assets/'.$row->identitas_favicon);
						$edit['identitas_favicon']	= validasi_sql($data['identitas_favicon']); 
					}
					$this->ADM->update_identitas($where_edit, $edit);
					$this->session->set_flashdata('success','Identitas Website telah berhasil diedit!,');
					redirect("website/identitas/edit/1");
				}
			}
		 
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
    }
    
     //HALAMAN STATIS
	public function halaman_statis($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Halaman Statis';
			$data['content'] 			= 'admin/content/website/halaman_statis';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '105';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('statis_judul'=>'Judul',
												'statis_deskripsi'=>'Deskripsi');
			if ($data['action'] == 'view') {
				$data['berdasarkan']	= array('statis_judul'=>'JUDUL');
				$data['cari']			= ($this->input->post('cari'))?$this->input->post('cari'):'statis_judul';
				$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']		= (empty($filter1))?1:$filter2;
				$data['batas']			= 10;
				$data['page']			= ($data['halaman']-1) * $data['batas'];
				$like_statis[$data['cari']]= validasi_sql($data['q']);
				$data['jml_data']		= $this->ADM->count_all_statis('',$like_statis);
				$data['jml_halaman']	= ceil($data['jml_data']/$data['batas']);				
			} elseif ($data['action'] == 'tambah') {
				$data['ckeditor']		= $this->ckeditor('statis_deskripsi');
				$data['onload']			= 'statis_judul';
				$data['statis_id']		= ($this->input->post('statis_id'))?$this->input->post('statis_id'):'';
				$data['statis_judul']	= ($this->input->post('statis_judul'))?$this->input->post('statis_judul'):'';
				$data['statis_gambar']	= ($this->input->post('statis_gambar'))?$this->input->post('statis_gambar'):'';
				$data['statis_deskripsi']= ($this->input->post('statis_deskripsi'))?$this->input->post('statis_deskripsi'):'';
				$data['statis_waktu']	= date("Y-m-d H:i:s");
				$simpan					= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("statis_gambar", "./assets/images/statis/", seo($data['statis_judul']));
					$data['statis_gambar']	= $gambar;
					$insert['statis_judul']		 = validasi_sql($data['statis_judul']);
					$insert['statis_deskripsi']   = $data['statis_deskripsi'];
					if ($data['statis_gambar']) { $insert['statis_gambar'] = validasi_sql($data['statis_gambar']); }
					$insert['statis_waktu']		 = validasi_sql($data['statis_waktu']);
					$this->ADM->insert_statis($insert);
					$this->session->set_flashdata('success','Halaman Statis telah berhasil ditambahkan!,');
					redirect("website/halaman_statis");
				}
				
			} elseif ($data['action'] == 'edit') {
				$where['statis_id'] 		=  validasi_sql($filter2);
				$data['ckeditor'] 			= $this->ckeditor('statis_deskripsi'); 
				$data['onload']			 	= 'statis_judul';
				$where_statis['statis_id']	= validasi_sql($filter2);
				$statis						= $this->ADM->get_statis('*', $where_statis);
				$data['statis_id']			= ($this->input->post('statis_id'))?$this->input->post('statis_id'):$statis->statis_id;	
				$data['statis_judul']		= ($this->input->post('statis_judul'))?$this->input->post('statis_judul'):$statis->statis_judul;	
				$data['statis_gambar']		= ($this->input->post('statis_gambar'))?$this->input->post('statis_gambar'):$statis->statis_gambar;	
				$data['statis_deskripsi']	= ($this->input->post('statis_deskripsi'))?$this->input->post('statis_deskripsi'):$statis->statis_deskripsi;	
				$data['statis_waktu']		= ($this->input->post('statis_waktu'))?$this->input->post('statis_waktu'):$statis->statis_waktu;
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("statis_gambar", "./assets/images/statis/", seo($data['statis_judul']));
					$data['statis_gambar']		= $gambar;
					$where_edit['statis_id']		= validasi_sql($data['statis_id']);
					$edit['statis_judul']		= validasi_sql($data['statis_judul']);
					$edit['statis_deskripsi']	= $data['statis_deskripsi'];
					if ($data['statis_gambar']) {
						$row = $this->ADM->get_statis('*', $where_edit);
						@unlink('./assets/images/statis/'.$row->statis_gambar);
						$edit['statis_gambar']	= $data['statis_gambar']; 
					}
					$this->ADM->update_statis($where_edit, $edit);
					$this->session->set_flashdata('success','Halaman Statis telah berhasil diedit!,');
					redirect('website/halaman_statis');		
				}		
		} elseif ($data['action']	== 'hapus') {
			 $where['statis_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_statis('*', $where);
			 @unlink ('./assets/images/statis/'.$row->statis_gambar);
			 $this->ADM->delete_statis($where);
			 $this->session->set_flashdata('warning','Halaman Statis telah berhasil dihapus!,');
			 redirect("website/halaman_statis");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}
    
    public function statis_detail($statis_id='')
    {
	  if($this->session->userdata('logged_in') == TRUE) {
		  $where_admin['admin_user']	= $this->session->userdata('admin_user');
		  $data['admin']				= $this->ADM->get_admin('', $where_admin);
		  $where_statis['statis_id']		= validasi_sql($statis_id);
		  $data['statis']				= $this->ADM->get_statis('*', $where_statis);
		  $data['ckeditor']				= $this->ckeditor('statis_deskripsi');
		  $data['action']				= 'detail';
		  $this->load->vars($data);
		  $this->load->view('admin/content/website/halaman_statis');
	  } else {
		  redirect("wp_login");
	  }
    }	

	//SLIDE
	public function slide($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Slide';
			$data['content'] 			= 'admin/content/website/slide';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '105';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('slide_judul'=>'Judul',
												'slide_deskripsi'=>'Deskripsi',
												'slide_gambar'=>'Gambar');
			if ($data['action'] == 'view') {
				$data['berdasarkan']	= array('slide_judul'=>'JUDUL');
				$data['cari']			= ($this->input->post('cari'))?$this->input->post('cari'):'slide_judul';
				$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']		= (empty($filter1))?1:$filter2;
				$data['batas']			= 10;
				$data['page']			= ($data['halaman']-1) * $data['batas'];
				$like_slide[$data['cari']]= validasi_sql($data['q']);
				$data['jml_data']		= $this->ADM->count_all_slide('',$like_slide);
				$data['jml_halaman']	= ceil($data['jml_data']/$data['batas']);				
			} elseif ($data['action'] == 'tambah') {
				$data['ckeditor']		= $this->ckeditor('slide_deskripsi');
				$data['onload']			= 'slide_judul';
				$data['slide_id']		= ($this->input->post('slide_id'))?$this->input->post('slide_id'):'';
				$data['slide_judul']	= ($this->input->post('slide_judul'))?$this->input->post('slide_judul'):'';
				$data['slide_gambar']	= ($this->input->post('slide_gambar'))?$this->input->post('slide_gambar'):'';
				$data['slide_deskripsi']= ($this->input->post('slide_deskripsi'))?$this->input->post('slide_deskripsi'):'';
				$data['slide_waktu']	= date("Y-m-d H:i:s");
				$simpan					= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("slide_gambar", "./assets/images/slide/", seo($data['slide_judul']));
					$data['slide_gambar']	= $gambar;
					$insert['slide_judul']		 = validasi_sql($data['slide_judul']);
					$insert['slide_deskripsi']   = $data['slide_deskripsi'];
					if ($data['slide_gambar']) { $insert['slide_gambar'] = validasi_sql($data['slide_gambar']); }
					$insert['slide_waktu']		 = validasi_sql($data['slide_waktu']);
					$this->ADM->insert_slide($insert);
					$this->session->set_flashdata('success','Slide telah berhasil ditambahkan!,');
					redirect("website/slide");
				}
				
			} elseif ($data['action'] == 'edit') {	
				$data['ckeditor'] 			= $this->ckeditor('slide_deskripsi'); 
				$data['onload']			 	= 'slide_judul';
				$where_slide['slide_id']	= validasi_sql($filter2);
				$slide						= $this->ADM->get_slide('*', $where_slide);
				$data['slide_id']			= ($this->input->post('slide_id'))?$this->input->post('slide_id'):$slide->slide_id;	
				$data['slide_judul']		= ($this->input->post('slide_judul'))?$this->input->post('slide_judul'):$slide->slide_judul;	
				$data['slide_gambar']		= ($this->input->post('slide_gambar'))?$this->input->post('slide_gambar'):$slide->slide_gambar;	
				$data['slide_deskripsi']	= ($this->input->post('slide_deskripsi'))?$this->input->post('slide_deskripsi'):$slide->slide_deskripsi;	
				$data['slide_waktu']		= ($this->input->post('slide_waktu'))?$this->input->post('slide_waktu'):$slide->slide_waktu;
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("slide_gambar", "./assets/images/slide/", seo($data['slide_judul']));
					$data['slide_gambar']		= $gambar;
					$where_edit['slide_id']		= validasi_sql($data['slide_id']);
					$edit['slide_judul']		= validasi_sql($data['slide_judul']);
					$edit['slide_deskripsi']	= $data['slide_deskripsi'];
					if ($data['slide_gambar']) {
						$row = $this->ADM->get_slide('*', $where_edit);
						@unlink('./assets/images/slide/'.$row->slide_gambar);
						$edit['slide_gambar']	= $data['slide_gambar']; 
					}
					$this->ADM->update_slide($where_edit, $edit);
					$this->session->set_flashdata('success','Slide telah berhasil diedit!,');
					redirect('website/slide');		
				}		
		} elseif ($data['action']	== 'hapus') {
			 $where['slide_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_slide('*', $where);
			 @unlink ('./assets/images/slide/'.$row->slide_gambar);
			 $this->ADM->delete_slide($where);
			 $this->session->set_flashdata('warning','Slide telah berhasil dihapus!,');
			 redirect("website/slide");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("sign_in");
		}
	}
    public function slide_detail($slide_id='')
    { 
	  if($this->session->userdata('logged_in') == TRUE) {
		  $where_admin['admin_user']	= $this->session->userdata('admin_user');
		  $data['admin']				= $this->ADM->get_admin('', $where_admin);
		  $where_slide['slide_id']		= validasi_sql($slide_id);
		  $data['slide']				= $this->ADM->get_slide('*', $where_slide);
		  $data['ckeditor']				= $this->ckeditor('slide_deskripsi');
		  $data['action']				= 'detail';
		  $this->load->vars($data);
		  $this->load->view('admin/content/website/slide');
	  } else {
		  redirect("sign_in");
	  }
    }
    
   
    // ================================================== END MODUL WEB ================================================== //
    
    // ================================================== MENU UTAMA ================================================== //
    // KATEGORI
    public function kategori($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Kategori Berita';
			$data['content']				= 'admin/content/website/kategori';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kategori_judul'=>'Judul');
			if($data['action'] == 'view') {
				//ACCESS ADMIN LEVEL
			    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') {	
				$data['berdasarkan']		= array('kategori_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kategori_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kategori[$data['cari']]	= $data['q'];
				$where_kategori['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_kategori('', $like_kategori);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				//END ACCESS ADMIN LEVEL
				} else {
				$data['berdasarkan']		= array('kategori_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kategori_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kategori[$data['cari']]	= $data['q'];
				$where_kategori['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_kategori($where_kategori, $like_kategori);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				}
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'kategori_judul';
				$data['kategori_judul']		= ($this->input->post('kategori_judul'))?$this->input->post('kategori_judul'):'';								    $data['admin_nama']			= $this->session->userdata('admin_nama');				
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['kategori_judul']	= validasi_sql($data['kategori_judul']);
					$insert['admin_nama']	= validasi_sql($data['admin_nama']);
					$this->ADM->insert_kategori($insert);
					$this->session->set_flashdata('success','Kategori telah berhasil ditambahkan!,');
					redirect("website/kategori");
				}
			} elseif ($data['action']	== 'edit') {
				$where['kategori_id'] 		= $filter2;
				$get = $this->ADM->get_kategori("",$where);
				 if($get == "")
				{
				  	redirect('website/kategori');
				} else {
				$data['onload']					= 'kategori_judul';
				$where_kategori['kategori_id']	= $filter2;
				$kategori						= $this->ADM->get_kategori('', $where_kategori);
				$data['kategori_id']			= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$kategori->kategori_id;
				$data['kategori_judul']			= ($this->input->post('kategori_judul'))?$this->input->post('kategori_judul'):$kategori->kategori_judul;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['kategori_id']	= validasi_sql($data['kategori_id']);
					$edit['kategori_judul']		= validasi_sql($data['kategori_judul']);
					$this->ADM->update_kategori($where_edit, $edit);
					$this->session->set_flashdata('success','Kategori telah berhasil diedit!,');
					redirect("website/kategori");
				}
			   }
			} elseif ($data['action'] == 'hapus') {
				$where_delete['kategori_id'] = validasi_sql($filter2);
				$this->ADM->delete_kategori($where_delete);
				$this->session->set_flashdata('warning','Kategori telah berhasil dihapus!,');
				redirect("website/kategori");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
				
		 }
		 
    public function kategori_detail($kategori_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_kategori['kategori_id']		= validasi_sql($kategori_id);
			$data['kategori']					= $this->ADM->get_kategori('',$where_kategori);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/kategori');
		} else {
			redirect("sign_in");
		}
	}
    
    // BERITA
    public function berita($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Berita';
			$data['content']				= 'admin/content/website/berita';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('berita_judul' => 'Judul',
													'kategori_id'  => 'Kategori',
													'berita_deskripsi' => 'Deskripsi');
			if($data['action']	== 'view') {					
				$data['berdasarkan']		= array('berita_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'berita_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_berita[$data['cari']]	= $data['q'];		
				$data['jml_data']			= $this->ADM->count_all_berita('', $like_berita);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['ckeditor']			= $this->ckeditor('berita_deskripsi');
				$data['onload']				= 'berita_judul';
				$data['berita_id']			= ($this->input->post('berita_id'))?$this->input->post('berita_id'):'';
				$data['berita_judul']		= ($this->input->post('berita_judul'))?$this->input->post('berita_judul'):'';
				$data['headline']			= ($this->input->post('headline'))?$this->input->post('headline'):'';
				$data['berita_deskripsi']	= ($this->input->post('berita_deskripsi'))?$this->input->post('berita_deskripsi'):'';
				$data['berita_waktu']		= date("Y-m-d H:i:s");
				$data['berita_foto']		= ($this->input->post('berita_foto'))?$this->input->post('berita_foto'):'';
				$data['berita_foto2']		= ($this->input->post('berita_foto2'))?$this->input->post('berita_foto2'):'';
				$data['berita_foto3']		= ($this->input->post('berita_foto3'))?$this->input->post('berita_foto3'):'';
				$data['berita_foto4']		= ($this->input->post('berita_foto4'))?$this->input->post('berita_foto4'):'';
				$data['berita_foto5']		= ($this->input->post('berita_foto5'))?$this->input->post('berita_foto5'):'';
				$data['news_email']			= ($this->input->post('news_email'))?$this->input->post('news_email'):'';	
				$data['tags']		 		= ($this->input->post('tags'))?$this->input->post('tags'):'';
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):'';	
				$data['admin_nama']			= $this->session->userdata('admin_nama');
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("berita_foto", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto']	= $gambar;
					$gambar2 = upload_image("berita_foto2", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto2']	= $gambar2;
					$gambar3 = upload_image("berita_foto3", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto3']	= $gambar3;
					$gambar4 = upload_image("berita_foto4", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto4']	= $gambar4;
					$gambar5 = upload_image("berita_foto5", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto5']	= $gambar5;
					$tags	= "";
					if ($this->input->post('tag')) {
						$tags = implode(',', $this->input->post('tag'));
					}
					$insert['berita_id']		 = validasi_sql($data['berita_id']);
					$insert['berita_judul']		 = validasi_sql($data['berita_judul']);
					$insert['headline']	 	 	 = validasi_sql($data['headline']);
					$insert['berita_deskripsi']  = $data['berita_deskripsi'];
					$insert['berita_waktu']		 = validasi_sql($data['berita_waktu']);			
					$insert['berita_deskripsi']  = $data['berita_deskripsi'];
					if ($data['berita_foto']) { $insert['berita_foto'] = validasi_sql($data['berita_foto']); }
					if ($data['berita_foto2']) { $insert['berita_foto2'] = validasi_sql($data['berita_foto2']); }
					if ($data['berita_foto3']) { $insert['berita_foto3'] = validasi_sql($data['berita_foto3']); }
					if ($data['berita_foto4']) { $insert['berita_foto4'] = validasi_sql($data['berita_foto4']); }
					if ($data['berita_foto5']) { $insert['berita_foto5'] = validasi_sql($data['berita_foto5']); }
					$insert['tags']				 = validasi_sql($tags);
					$insert['kategori_id']		 = validasi_sql($data['kategori_id']);
					$insert['admin_nama']		 = validasi_sql($data['admin_nama']);
						$web				= $this->ADM->identitaswebsite();
					$email = "".$data['news_email'];"";
					
					$url = base_url();
					$deskripsi = $data['berita_deskripsi'];
					$img =''.base_url().'assets/images/berita/'.$data['berita_foto'].'';
					$gmbr = "<center><img src=".$img." width='650px' height='350px'/></center>";
					$to=$email;
					$subject='Newslatter '.$web->identitas_website;
					$from = $web->identitas_email;
					$body= '<h2>'.$data['berita_judul'].'</h2><br />'.$data['admin_nama'].' | '.dateIndoNews($data['berita_waktu']).'<hr><br/>'.$gmbr.'<br/>'.$data['berita_deskripsi'].'<br/><hr/>'.$url.'<br/>';
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                	mail($to,$subject,$body,$headers);
					$this->ADM->insert_berita($insert);
					$this->session->set_flashdata('success','Berita telah berhasil ditambahkan!,');
					redirect("website/berita"); 
				}
			} elseif ($data['action']	== 'edit') {
				$where['berita_id'] 		=  validasi_sql($filter2);
				$data['ckeditor']			= $this->ckeditor('berita_deskripsi');
				$data['onload']				= 'berita_judul';
				$where_berita['berita_id']	= validasi_sql($filter2);
				$berita 					= $this->ADM->get_berita('*', $where_berita);
				$data['berita_id']			= ($this->input->post('berita_id'))?$this->input->post('berita_id'):$berita->berita_id;	
				$data['berita_judul']		= ($this->input->post('berita_judul'))?$this->input->post('berita_judul'):$berita->berita_judul;
				$data['headline']			= ($this->input->post('headline'))?$this->input->post('headline'):$berita->headline;	
				$data['berita_deskripsi']	= ($this->input->post('berita_deskripsi'))?$this->input->post('berita_deskripsi'):$berita->berita_deskripsi;
				$data['berita_waktu']		= ($this->input->post('berita_waktu'))?$this->input->post('berita_waktu'):$berita->berita_waktu;
				$data['berita_foto']		= ($this->input->post('berita_foto'))?$this->input->post('berita_foto'):$berita->berita_foto;
				$data['berita_foto2']		= ($this->input->post('berita_foto2'))?$this->input->post('berita_foto2'):$berita->berita_foto2;
				$data['berita_foto3']		= ($this->input->post('berita_foto3'))?$this->input->post('berita_foto3'):$berita->berita_foto3;
				$data['berita_foto4']		= ($this->input->post('berita_foto4'))?$this->input->post('berita_foto4'):$berita->berita_foto4;
				$data['berita_foto5']		= ($this->input->post('berita_foto5'))?$this->input->post('berita_foto5'):$berita->berita_foto5;
				$data['tags']				= ($this->input->post('tag'))?$this->input->post('tag'):$berita->tags;		
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$berita->kategori_id;		
				$data['kategori_id']		= ($this->input->post('kategori_id'))?$this->input->post('kategori_id'):$berita->kategori_id;	
				$data['admin_nama']			= $this->session->userdata('admin_nama');	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("berita_foto", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto']	= $gambar;
					$gambar2 = upload_image("berita_foto2", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto2']	= $gambar2;
					$gambar3 = upload_image("berita_foto3", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto3']	= $gambar3;
					$gambar4 = upload_image("berita_foto4", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto4']	= $gambar4;
					$gambar5 = upload_image("berita_foto5", "./assets/images/berita/", seo($data['berita_judul']));
					$data['berita_foto5']	= $gambar5;
					$tags = "";
					if ($this->input->post('tag')) {
						$tags = implode(',', $this->input->post('tag'));
					}
					$where_edit['berita_id']	= validasi_sql($data['berita_id']);
					$edit['berita_judul']		= validasi_sql($data['berita_judul']);
					$edit['headline']			= validasi_sql($data['headline']);
					$edit['berita_deskripsi']	= $data['berita_deskripsi'];
					$edit['tags']				= $tags;
					if ($data['berita_foto']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_foto);
						$edit['berita_foto']	= $data['berita_foto']; 
					}
					if ($data['berita_foto2']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_foto2);
						$edit['berita_foto2']	= $data['berita_foto2']; 
					}
					if ($data['berita_foto3']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_foto3);
						$edit['berita_foto3']	= $data['berita_foto3']; 
					}
					if ($data['berita_foto4']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_foto4);
						$edit['berita_foto4']	= $data['berita_foto4']; 
					}
					if ($data['berita_foto5']) {
						$row = $this->ADM->get_berita('*', $where_edit);
						@unlink('./assets/images/berita/'.$row->berita_foto5);
						$edit['berita_foto5']	= $data['berita_foto5']; 
					}
					$edit['kategori_id']		= validasi_sql($data['kategori_id']);
					$edit['admin_nama']		 	= validasi_sql($data['admin_nama']);
					$this->ADM->update_berita($where_edit, $edit);
					$this->session->set_flashdata('success','Berita telah berhasil diedit!,');
					redirect('website/berita');	
				}	
		 } elseif ($data['action']	== 'hapus') {
			 $where['berita_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_berita('*', $where);
			 @unlink ('./assets/images/berita/'.$row->berita_foto);
			 @unlink ('./assets/images/berita/'.$row->berita_foto2);
			 @unlink ('./assets/images/berita/'.$row->berita_foto3);
			 @unlink ('./assets/images/berita/'.$row->berita_foto4);
			 @unlink ('./assets/images/berita/'.$row->berita_foto5);
			 $this->ADM->delete_berita($where);
			 $this->session->set_flashdata('warning','Berita telah berhasil dihapus!,');
			 redirect("website/berita");
		 } elseif ($data['action']	== 'hapus-img') {
			 $where['berita_img_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_berita_img('*', $where);
			 @unlink ('./assets/images/berita/'.$row->berita_img_nama);
			 $this->ADM->delete_berita_img($where);
			echo"<script>
 window.location=history.go(-1);
 </script>";
	     }
			 $this->load->vars($data);
			 $this->load->view('admin/home');
	  } else {
		  redirect("sign_in");
	  }
	}
  
	public function berita_detail($berita_id='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']	= $this->session->userdata('admin_user');
            $data['admin']				= $this->ADM->get_admin('', $where_admin);
		    $where_berita['berita_id']	= validasi_sql($berita_id);
		    $data['berita']				= $this->ADM->get_berita('*', $where_berita);
		    $data['ckeditor']			= $this->ckeditor('berita_deskripsi');
		    $data['action']				= 'detail';
		    $this->load->vars($data);
		    $this->load->view('admin/content/website/berita');
	  } else {
		  redirect("sign_in");
	  }
	}
    
    // TAGS
	public function tags($filter1='', $filter2='', $filter3='')
	 {
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Tags';
			$data['content'] 			= 'admin/content/website/tags';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '79';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('tag_judul'=>'Judul');
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('tag_judul'=>'JUDUL');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'tag_judul';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_tag[$data['cari']]	= validasi_sql($data['q']);
				$data['jml_data']			= $this->ADM->count_all_tags('', $like_tag);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'tag_judul';
				$data['tag_judul']			= ($this->input->post('tag_judul'))?$this->input->post('tag_judul'):'';
				$simpan						= $this->input->post('simpan');
				if ($simpan){
					$insert['tag_judul']	= $data['tag_judul'];
					$insert['tag_seo']		= seo($data['tag_judul']);
					$this->ADM->insert_tags($insert);
					$this->session->set_flashdata('success','Tag baru telah berhasil ditambahkan!,');
					redirect("website/tags");
				}
			} elseif ($data['action'] == 'edit'){
				$where['tag_id'] 		= $filter2;
				$data['onload']			= 'tag_judul';
				$where_tag['tag_id']	= $filter2; 
				$tag					= $this->ADM->get_tags('*', $where_tag);
				$data['tag_id']			= ($this->input->post('tag_id'))?$this->input->post('tag_id'):$tag->tag_id;
				$data['tag_judul']		= ($this->input->post('tag_judul'))?$this->input->post('tag_judul'):$tag->tag_judul;				
				$simpan					= $this->input->post('simpan');
				if ($simpan){
					$where_edit['tag_id']	= $data['tag_id'];
					$edit['tag_judul']		= $data['tag_judul'];
					$edit['tag_seo']		= seo($data['tag_judul']);					
					$this->ADM->update_tags($where_edit, $edit);
					$this->session->set_flashdata('success','Tag berita telah berhasil diedit!,');
					redirect("website/tags");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['tag_id']	= $filter2;
				$this->ADM->delete_tags($where_delete);
				$this->session->set_flashdata('warning','Tag berita telah berhasil dihapus!,');
				redirect("website/tags");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("sign_in");
		}
	}
	
	public function tags_detail($tag_id="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 			= $this->ADM->get_admin('',$where_admin);
			$where_tag['tag_id']	= $tag_id; 
			$data['tag'] 			= $this->ADM->get_tags('*', $where_tag);
			$data['action']			= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/tags');
		} else {
			redirect("sign_in");
		}
	}

	// newsletter
    public function newsletter($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Newsletter';
			$data['content']				= 'admin/content/website/newsletter';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('news_email'=>'Email');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('news_email'=>'Email');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'news_email';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_newsletter[$data['cari']]	= $data['q'];				
				$data['jml_data']			= $this->ADM->count_all_newsletter('', $like_newsletter);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'news_email';
				$data['news_email']			= ($this->input->post('news_email'))?$this->input->post('news_email'):'';	
				$data['news_post']			= date("Y-m-d H:i:s");				
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['news_email']	= validasi_sql($data['news_email']);
					$insert['news_post']	= validasi_sql($data['news_post']);
					$this->ADM->insert_newsletter($insert);
					$this->session->set_flashdata('success','Newsletter telah berhasil ditambahkan!,');
					redirect("website/newsletter");
				}
			} elseif ($data['action']	== 'edit') {
				$data['onload']					= 'news_email';
				$where_newsletter['news_id']	= $filter2;
				$newsletter						= $this->ADM->get_newsletter('', $where_newsletter);
				$data['news_id']				= ($this->input->post('news_id'))?$this->input->post('news_id'):$newsletter->news_id;
				$data['news_email']				= ($this->input->post('news_email'))?$this->input->post('news_email'):$newsletter->news_email;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['news_id']	= validasi_sql($data['news_id']);
					$edit['news_email']		= validasi_sql($data['news_email']);
					$this->ADM->update_newsletter($where_edit, $edit);
					$this->session->set_flashdata('success','Newsletter telah berhasil diedit!,');
					redirect("website/newsletter");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['news_id'] = validasi_sql($filter2);
				$this->ADM->delete_newsletter($where_delete);
				$this->session->set_flashdata('warning','Newsletter telah berhasil dihapus!,');
				redirect("website/newsletter");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
				
		 }
		 
    public function newsletter_detail($news_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_newsletter['news_id']		= validasi_sql($news_id);
			$data['newsletter']					= $this->ADM->get_newsletter('*',$where_newsletter);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view("admin/content/website/newsletter");
		} else {
			redirect("sign_in");
		}
	}
    
   
    // ================================================== PRODUK ================================================== //
      // katproduk
    public function katproduk($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Kategori Produk';
			$data['content']				= 'admin/content/website/katproduk';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('katproduk_nama'=>'Judul');
			if($data['action'] == 'view') {
				//ACCESS ADMIN LEVEL
				$data['berdasarkan']		= array('katproduk_nama'=>'NAMA KATEGORI PRODUK');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'katproduk_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_katproduk[$data['cari']]	= $data['q'];
				$where_katproduk['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_katproduk('', $like_katproduk);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'katproduk_nama';
				$data['katproduk_nama']		= ($this->input->post('katproduk_nama'))?$this->input->post('katproduk_nama'):'';								  
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['katproduk_nama']	= validasi_sql($data['katproduk_nama']);
					$this->ADM->insert_katproduk($insert);
					$this->session->set_flashdata('success','Kategori Produk telah berhasil ditambahkan!,');
					redirect("website/katproduk");
				}
			} elseif ($data['action']	== 'edit') {
				$data['onload']					= 'katproduk_nama';
				$where_katproduk['katproduk_id']	= $filter2;
				$katproduk						= $this->ADM->get_katproduk('', $where_katproduk);
				$data['katproduk_id']			= ($this->input->post('katproduk_id'))?$this->input->post('katproduk_id'):$katproduk->katproduk_id;
				$data['katproduk_nama']			= ($this->input->post('katproduk_nama'))?$this->input->post('katproduk_nama'):$katproduk->katproduk_nama;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['katproduk_id']	= validasi_sql($data['katproduk_id']);
					$edit['katproduk_nama']		= validasi_sql($data['katproduk_nama']);
					$this->ADM->update_katproduk($where_edit, $edit);
					$this->session->set_flashdata('success','Kategori Produk telah berhasil diedit!,');
					redirect("website/katproduk");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['katproduk_id'] = validasi_sql($filter2);
				$this->ADM->delete_katproduk($where_delete);
				$this->session->set_flashdata('warning','Kategori Produk telah berhasil dihapus!,');
				redirect("website/katproduk");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
				
		 }
		 
    public function katproduk_detail($katproduk_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_katproduk['katproduk_id']		= validasi_sql($katproduk_id);
			$data['katproduk']					= $this->ADM->get_katproduk('',$where_katproduk);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/katproduk');
		} else {
			redirect("sign_in");
		}
	}

	// produk
    public function produk($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Barang';
			$data['content']				= 'admin/content/website/produk';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('produk_nama' => 'Judul',
													'katproduk_id'  => 'katproduk',
													'produk_deskripsi' => 'Deskripsi');
			if($data['action']	== 'view') {					
				$data['berdasarkan']		= array('produk_nama'=>'NAMA BARANG','katproduk_nama'=>'KATEGORI BARANG','account_nama'=>'NAMA USER');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'produk_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_produk[$data['cari']]	= $data['q'];		
				$data['jml_data']			= $this->ADM->count_all_produk('', $like_produk);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['ckeditor']			= $this->ckeditor('produk_deskripsi');
				$data['onload']				= 'produk_nama';
				$data['produk_id']			= ($this->input->post('produk_id'))?$this->input->post('produk_id'):'';
				$data['produk_nama']		= ($this->input->post('produk_nama'))?$this->input->post('produk_nama'):'';
				$data['katproduk_id']		= ($this->input->post('katproduk_id'))?$this->input->post('katproduk_id'):'';
				$data['produk_harga']		= ($this->input->post('produk_harga'))?$this->input->post('produk_harga'):'';	
				$data['produk_kondisi']		= ($this->input->post('produk_kondisi'))?$this->input->post('produk_kondisi'):'';
				$data['produk_deskripsi']	= ($this->input->post('produk_deskripsi'))?$this->input->post('produk_deskripsi'):'';
				$data['produk_foto']		= ($this->input->post('produk_foto'))?$this->input->post('produk_foto'):'';
				$data['produk_foto2']		= ($this->input->post('produk_foto2'))?$this->input->post('produk_foto2'):'';
				$data['produk_foto3']		= ($this->input->post('produk_foto3'))?$this->input->post('produk_foto3'):'';
				$data['produk_foto4']		= ($this->input->post('produk_foto4'))?$this->input->post('produk_foto4'):'';
				$data['produk_foto5']		= ($this->input->post('produk_foto5'))?$this->input->post('produk_foto5'):'';
				$data['news_email']			= ($this->input->post('news_email'))?$this->input->post('news_email'):'';	
				$data['produk_status']		= ($this->input->post('produk_status'))?$this->input->post('produk_status'):'';
				$data['account_id']			= ($this->input->post('account_id'))?$this->input->post('account_id'):'';
				$data['produk_post']		= date("Y-m-d H:i:s");

				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("produk_foto", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto']	= $gambar;
					$gambar2 = upload_image("produk_foto2", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto2']	= $gambar2;
					$gambar3 = upload_image("produk_foto3", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto3']	= $gambar3;
					$gambar4 = upload_image("produk_foto4", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto4']	= $gambar4;
					$gambar5 = upload_image("produk_foto5", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto5']	= $gambar5;
					$insert['produk_id']		 = validasi_sql($data['produk_id']);
					$insert['produk_nama']		 = validasi_sql($data['produk_nama']);
					$insert['katproduk_id']		 = validasi_sql($data['katproduk_id']);
					$insert['produk_harga']		 = validasi_sql($data['produk_harga']);
					$insert['produk_kondisi']	 = validasi_sql($data['produk_kondisi']);
					$insert['produk_deskripsi']  = $data['produk_deskripsi'];
					if ($data['produk_foto']) { $insert['produk_foto'] = validasi_sql($data['produk_foto']); }
					if ($data['produk_foto2']) { $insert['produk_foto2'] = validasi_sql($data['produk_foto2']); }
					if ($data['produk_foto3']) { $insert['produk_foto3'] = validasi_sql($data['produk_foto3']); }
					if ($data['produk_foto4']) { $insert['produk_foto4'] = validasi_sql($data['produk_foto4']); }
					if ($data['produk_foto5']) { $insert['produk_foto5'] = validasi_sql($data['produk_foto5']); }
					$insert['produk_status']	 = validasi_sql($data['produk_status']);
					$insert['account_id']	 	 = validasi_sql($data['account_id']);
					$insert['produk_post']		 = validasi_sql($data['produk_post']);
					$this->ADM->insert_produk($insert);
					$this->session->set_flashdata('success','Barang telah berhasil ditambahkan!,');
					redirect("website/produk"); 
				}
			} elseif ($data['action']	== 'edit') {
				$where['produk_id'] 		=  validasi_sql($filter2);
				$data['ckeditor']			= $this->ckeditor('produk_deskripsi');
				$data['onload']				= 'produk_nama';
				$where_produk['produk_id']	= validasi_sql($filter2);
				$produk 					= $this->ADM->get_produk('*', $where_produk);
				$data['produk_id']			= ($this->input->post('produk_id'))?$this->input->post('produk_id'):$produk->produk_id;	
				$data['produk_nama']		= ($this->input->post('produk_nama'))?$this->input->post('produk_nama'):$produk->produk_nama;
				$data['katproduk_id']		= ($this->input->post('katproduk_id'))?$this->input->post('katproduk_id'):$produk->katproduk_id;
				$data['produk_harga']		= ($this->input->post('produk_harga'))?$this->input->post('produk_harga'):$produk->produk_harga;
				$data['produk_kondisi']		= ($this->input->post('produk_kondisi'))?$this->input->post('produk_kondisi'):$produk->produk_kondisi;	
				$data['produk_deskripsi']	= ($this->input->post('produk_deskripsi'))?$this->input->post('produk_deskripsi'):$produk->produk_deskripsi;
				$data['produk_foto']		= ($this->input->post('produk_foto'))?$this->input->post('produk_foto'):$produk->produk_foto;
				$data['produk_foto2']		= ($this->input->post('produk_foto2'))?$this->input->post('produk_foto2'):$produk->produk_foto2;
				$data['produk_foto3']		= ($this->input->post('produk_foto3'))?$this->input->post('produk_foto3'):$produk->produk_foto3;
				$data['produk_foto4']		= ($this->input->post('produk_foto4'))?$this->input->post('produk_foto4'):$produk->produk_foto4;
				$data['produk_foto5']		= ($this->input->post('produk_foto5'))?$this->input->post('produk_foto5'):$produk->produk_foto5;
				$data['produk_status']		= ($this->input->post('produk_status'))?$this->input->post('produk_status'):$produk->produk_status;	
				$data['account_id']			= ($this->input->post('account_id'))?$this->input->post('account_id'):$produk->account_id;	
				$data['produk_post']		= date('Y-m-d H:i:s');	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("produk_foto", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto']	= $gambar;
					$gambar2 = upload_image("produk_foto2", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto2']	= $gambar2;
					$gambar3 = upload_image("produk_foto3", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto3']	= $gambar3;
					$gambar4 = upload_image("produk_foto4", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto4']	= $gambar4;
					$gambar5 = upload_image("produk_foto5", "./assets/images/produk/", seo($data['produk_nama']));
					$data['produk_foto5']	= $gambar5;
					$where_edit['produk_id']	= validasi_sql($data['produk_id']);
					$edit['produk_nama']		= validasi_sql($data['produk_nama']);
					$edit['katproduk_id']		= validasi_sql($data['katproduk_id']);
					$edit['produk_harga']		= validasi_sql($data['produk_harga']);
					$edit['produk_kondisi']		= validasi_sql($data['produk_kondisi']);
					$edit['produk_deskripsi']	= $data['produk_deskripsi'];
					$edit['produk_status']		= validasi_sql($data['produk_status']);
					$edit['account_id']			= validasi_sql($data['account_id']);
					$edit['produk_post']		= validasi_sql($data['produk_post']);
					if ($data['produk_foto']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_foto);
						$edit['produk_foto']	= $data['produk_foto']; 
					}
					if ($data['produk_foto2']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_foto2);
						$edit['produk_foto2']	= $data['produk_foto2']; 
					}
					if ($data['produk_foto3']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_foto3);
						$edit['produk_foto3']	= $data['produk_foto3']; 
					}
					if ($data['produk_foto4']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_foto4);
						$edit['produk_foto4']	= $data['produk_foto4']; 
					}
					if ($data['produk_foto5']) {
						$row = $this->ADM->get_produk('*', $where_edit);
						@unlink('./assets/images/produk/'.$row->produk_foto5);
						$edit['produk_foto5']	= $data['produk_foto5']; 
					}
					$this->ADM->update_produk($where_edit, $edit);
					$this->session->set_flashdata('success','Barang telah berhasil diedit!,');
					redirect('website/produk');	
				}	

			} elseif ($data['action'] == 'status'){
				$where_edit['produk_id'] 		= $filter2;
				if ($filter3 == 'P') {
					$edit['produk_id'] = validasi_sql($filter2);
					$edit['produk_status'] = 'R';
				} else {
 					$edit['produk_status']= 'P';
				}
				$this->ADM->update_produk($where_edit, $edit);
				$this->session->set_flashdata('success','Status Barang telah berhasil diedit!,');
				redirect("website/produk");	
		 } elseif ($data['action']	== 'hapus') {
			 $where['produk_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_produk('*', $where);
			 @unlink ('./assets/images/produk/'.$row->produk_foto);
			 @unlink ('./assets/images/produk/'.$row->produk_foto2);
			 @unlink ('./assets/images/produk/'.$row->produk_foto3);
			 @unlink ('./assets/images/produk/'.$row->produk_foto4);
			 @unlink ('./assets/images/produk/'.$row->produk_foto5);
			 $this->ADM->delete_produk($where);
			 $this->session->set_flashdata('warning','Barang telah berhasil dihapus!,');
			 redirect("website/produk");
		 } 
			 $this->load->vars($data);
			 $this->load->view('admin/home');
	  } else {
		  redirect("sign_in");
	  }
	}
  
	public function produk_detail($produk_id='')
    {
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']	= $this->session->userdata('admin_user');
            $data['admin']				= $this->ADM->get_admin('', $where_admin);
		    $where_produk['produk_id']	= validasi_sql($produk_id);
		    $data['produk']				= $this->ADM->get_produk('*', $where_produk);
		    $data['ckeditor']			= $this->ckeditor('produk_deskripsi');
		    $data['action']				= 'detail';
		    $this->load->vars($data);
		    $this->load->view('admin/content/website/produk');
	  } else {
		  redirect("sign_in");
	  }
	}

	public function produk_export()
    {
		if($this->session->userdata('logged_in') == TRUE) {
		$web							= $this->ADM->identitaswebsite();
		$waktu =date("Y-m-d");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=backup-Barang-".$web->identitas_website."-".dateIndo($waktu).".xls");
        header("Content-Transfer-Encoding: binary ");
		$data['action']				= 'export';
		$this->load->vars($data);
		$this->load->view('admin/content/website/produk');
	  } else {
		  redirect("sign_in");
	  }
	}
	// ================================================== PENJUAL ================================================== //
      // account
    public function account($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'User';
			$data['content']				= 'admin/content/website/account';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('account_nama'=>'Judul');
			if($data['action'] == 'view') {
				//ACCESS ADMIN LEVEL
				$data['berdasarkan']		= array('account_nama'=>'NAMA','kota_nama'=>'KOTA');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'account_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_account[$data['cari']]	= $data['q'];
				$where_account['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_account('', $like_account);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'account_nama';
				$data['account_email']		= ($this->input->post('account_email'))?$this->input->post('account_email'):'';	
				$data['account_password1']	= ($this->input->post('account_password1'))?$this->input->post('account_password1'):'';	
				$data['account_password2']	= ($this->input->post('account_password2'))?$this->input->post('account_password2'):'';	
				$data['account_nama']		= ($this->input->post('account_nama'))?$this->input->post('account_nama'):'';	
				$data['account_jk']			= ($this->input->post('account_jk'))?$this->input->post('account_jk'):'';	
				$data['account_alamat']		= ($this->input->post('account_alamat'))?$this->input->post('account_alamat'):'';	
				$data['provinsi_id']		= ($this->input->post('provinsi_id'))?$this->input->post('provinsi_id'):'';	
				$data['kota_id']			= ($this->input->post('kota_id'))?$this->input->post('kota_id'):'';	
				$data['account_foto']		= ($this->input->post('account_foto'))?$this->input->post('account_foto'):'';	
				$data['account_tlp']		= ($this->input->post('account_tlp'))?$this->input->post('account_tlp'):'';	
				$data['account_status']		= ($this->input->post('account_status'))?$this->input->post('account_status'):'';	
				$data['account_post']		= date('Y-m-d H:i:s');
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$gambar = upload_image("account_foto", "./assets/images/account/", seo($data['account_nama']));
					$data['account_foto']	= $gambar;

					$insert['account_email']	= validasi_sql($data['account_email']);
					$insert['account_password1']= validasi_sql(do_hash(($data['account_password1']), 'md5'));
					$insert['account_password2']= validasi_sql($data['account_password1']);
					$insert['account_nama']		= validasi_sql($data['account_nama']);
					$insert['account_jk']		= validasi_sql($data['account_jk']);
					$insert['account_alamat']	= $data['account_alamat'];
					$insert['kota_id']			= validasi_sql($data['kota_id']);
					$insert['account_tlp']		= validasi_sql($data['account_tlp']);
					if ($data['account_foto']) { $insert['account_foto'] = validasi_sql($data['account_foto']); }
					$insert['account_status']	= validasi_sql($data['account_status']);
					$insert['account_post']			= validasi_sql($data['account_post']);
					$this->ADM->insert_account($insert);
					$this->session->set_flashdata('success','User telah berhasil ditambahkan!,');
					redirect("website/account");
				}
			} elseif ($data['action']	== 'edit') {
				$data['onload']					= 'account_nama';
				$where_account['account_id']	= $filter2;
				$account						= $this->ADM->get_account('', $where_account);
				$data['account_id']				= ($this->input->post('account_id'))?$this->input->post('account_id'):$account->account_id;
				$data['account_email']			= ($this->input->post('account_email'))?$this->input->post('account_email'):$account->account_email;
				$data['account_password1']		= ($this->input->post('account_password1'))?$this->input->post('account_password1'):$account->account_password1;
				$data['account_password2']		= ($this->input->post('account_password2'))?$this->input->post('account_password2'):$account->account_password2;
				$data['pwd']					= ($this->input->post('account_password1'))?$this->input->post('account_password1'):$account->account_password1;
				$data['account_nama']			= ($this->input->post('account_nama'))?$this->input->post('account_nama'):$account->account_nama;
				$data['account_jk']				= ($this->input->post('account_jk'))?$this->input->post('account_jk'):$account->account_jk;
				$data['account_alamat']			= ($this->input->post('account_alamat'))?$this->input->post('account_alamat'):$account->account_alamat;
				$data['provinsi_id']		= ($this->input->post('provinsi_id'))?$this->input->post('provinsi_id'):$account->provinsi_id;
				$data['kota_id']				= ($this->input->post('kota_id'))?$this->input->post('kota_id'):$account->kota_id;
				$data['account_tlp']			= ($this->input->post('account_tlp'))?$this->input->post('account_tlp'):$account->account_tlp;
				$data['account_foto']			= ($this->input->post('account_foto'))?$this->input->post('account_foto'):$account->account_foto;
				$data['account_status']			= ($this->input->post('account_status'))?$this->input->post('account_status'):$account->account_status;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$gambar = upload_image("account_foto", "./assets/images/account/", seo($data['account_nama']));
					$data['account_foto']	= $gambar;
					$where_edit['account_id']	= validasi_sql($data['account_id']);
					$edit['account_email']		= validasi_sql($data['account_email']);
						if($data['account_password1'] == $data['account_password2']) {
					$where_edit['account_id']	= validasi_sql($data['account_id']);
						if($data['account_password1'] <> '') {
							$edit['account_password2']		= $data['account_password1']; 
							$edit['account_password1']		= validasi_sql(do_hash(($data['account_password1']), 'md5')); 
						}
					}
					$edit['account_nama']		= validasi_sql($data['account_nama']);
					$edit['account_jk']			= validasi_sql($data['account_jk']);
					$edit['account_alamat']		= validasi_sql($data['account_alamat']);
					$edit['kota_id']			= validasi_sql($data['kota_id']);
					$edit['account_tlp']		= validasi_sql($data['account_tlp']);
					if ($data['account_foto']) {
						$row = $this->ADM->get_account('*', $where_edit);
						@unlink('./assets/images/account/'.$row->account_foto);
						$edit['account_foto']	= $data['account_foto']; 
					}
					$edit['account_status']		= validasi_sql($data['account_status']);
					$this->ADM->update_account($where_edit, $edit);
					$this->session->set_flashdata('success','User telah berhasil diedit!,');
					redirect("website/account");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['account_id'] = validasi_sql($filter2);
			 	$row = $this->ADM->get_account('*', $where_delete);
			 	@unlink ('./assets/images/account/'.$row->account_foto);
				$this->ADM->delete_account($where_delete);
			 	@unlink ('./assets/images/account/'.$row->account_foto);
				$this->session->set_flashdata('warning','User telah berhasil dihapus!,');
				redirect("website/account");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
				
		 }
		 
    public function account_detail($account_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_account['account_id']		= validasi_sql($account_id);
			$data['account']					= $this->ADM->get_account('',$where_account);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/account');
		} else {
			redirect("sign_in");
		}
	}

	public function account_export()
    {
		if($this->session->userdata('logged_in') == TRUE) {
		$web							= $this->ADM->identitaswebsite();
		$waktu =date("Y-m-d");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=backup-User-".$web->identitas_website."-".dateIndo($waktu).".xls");
        header("Content-Transfer-Encoding: binary ");
		$data['action']				= 'export';
		$this->load->vars($data);
		$this->load->view('admin/content/website/account');
	  } else {
		  redirect("sign_in");
	  }
	}
      // kota
    public function kota($filter1='', $filter2='', $filter3='')
    {
		 if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Kota';
			$data['content']				= 'admin/content/website/kota';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '79';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('kota_nama'=>'Judul');
			if($data['action'] == 'view') {
				//ACCESS ADMIN LEVEL
				$data['berdasarkan']		= array('kota_nama'=>'NAMA KOTA');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'kota_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_kota[$data['cari']]	= $data['q'];
				$where_kota['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_kota('', $like_kota);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
				
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'kota_nama';
				$data['kota_nama']			= ($this->input->post('kota_nama'))?$this->input->post('kota_nama'):'';							
				$data['provinsi_id']		= ($this->input->post('provinsi_id'))?$this->input->post('provinsi_id'):'';								  
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$insert['kota_nama']	= validasi_sql($data['kota_nama']);
					$insert['provinsi_id']	= validasi_sql($data['provinsi_id']);
					$this->ADM->insert_kota($insert);
					$this->session->set_flashdata('success','Kota telah berhasil ditambahkan!,');
					redirect("website/kota");
				}
			} elseif ($data['action']	== 'edit') {
				$data['onload']					= 'kota_nama';
				$where_kota['kota_id']	= $filter2;
				$kota						= $this->ADM->get_kota('', $where_kota);
				$data['kota_id']			= ($this->input->post('kota_id'))?$this->input->post('kota_id'):$kota->kota_id;
				$data['kota_nama']			= ($this->input->post('kota_nama'))?$this->input->post('kota_nama'):$kota->kota_nama;
				$data['provinsi_id']		= ($this->input->post('provinsi_id'))?$this->input->post('provinsi_id'):$kota->provinsi_id;
				$simpan						= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['kota_id']	= validasi_sql($data['kota_id']);
					$edit['kota_nama']		= validasi_sql($data['kota_nama']);
					$edit['provinsi_id']	= validasi_sql($data['provinsi_id']);
					$this->ADM->update_kota($where_edit, $edit);
					$this->session->set_flashdata('success','Kota telah berhasil diedit!,');
					redirect("website/kota");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['kota_id'] = validasi_sql($filter2);
				$this->ADM->delete_kota($where_delete);
				$this->session->set_flashdata('warning','Kota telah berhasil dihapus!,');
				redirect("website/kota");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("sign_in");		 	
			}
				
		 }
		 
    public function kota_detail($kota_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']			= $this->session->userdata('admin_user');
			$data['admin']						= $this->ADM->get_admin('',$where_admin);
			$where_kota['kota_id']		= validasi_sql($kota_id);
			$data['kota']					= $this->ADM->get_kota('',$where_kota);
			$data['action']						= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/website/kota');
		} else {
			redirect("sign_in");
		}
	}

	//IKLAN
	public function iklan($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Iklan';
			$data['content'] 			= 'admin/content/website/iklan';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '105';
			$data['action']				= (empty($filter1))?'view':$filter1;
			$data['validate']			= array('iklan_link'=>'link',
												'iklan_gambar'=>'Gambar');
			if ($data['action'] == 'view') {
				$data['berdasarkan']	= array('iklan_link'=>'LINK');
				$data['cari']			= ($this->input->post('cari'))?$this->input->post('cari'):'iklan_link';
				$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']		= (empty($filter1))?1:$filter2;
				$data['batas']			= 5;
				$data['page']			= ($data['halaman']-1) * $data['batas'];
				$like_iklan[$data['cari']]= validasi_sql($data['q']);
				$data['jml_data']		= $this->ADM->count_all_iklan('',$like_iklan);
				$data['jml_halaman']	= ceil($data['jml_data']/$data['batas']);				
			} elseif ($data['action'] == 'tambah') {
				$data['onload']			= 'iklan_link';
				$data['iklan_id']		= ($this->input->post('iklan_id'))?$this->input->post('iklan_id'):'';
				$data['iklan_link']		= ($this->input->post('iklan_link'))?$this->input->post('iklan_link'):'';
				$data['iklan_gambar']	= ($this->input->post('iklan_gambar'))?$this->input->post('iklan_gambar'):'';
				$data['iklan_post']	= date("Y-m-d H:i:s");
				$simpan					= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("iklan_gambar", "./assets/images/iklan/", seo($data['iklan_link']));
					$data['iklan_gambar']	= $gambar;
					$insert['iklan_link']		 = validasi_sql($data['iklan_link']);
					if ($data['iklan_gambar']) { $insert['iklan_gambar'] = validasi_sql($data['iklan_gambar']); }
					$insert['iklan_post']		 = validasi_sql($data['iklan_post']);
					$this->ADM->insert_iklan($insert);
					$this->session->set_flashdata('success','Iklan telah berhasil ditambahkan!,');
					redirect("website/iklan");
				}
				
			} elseif ($data['action'] == 'edit') {	
				$where['iklan_id'] 			= $filter2;
				$data['onload']			 	= 'iklan_link';
				$where_iklan['iklan_id']	= validasi_sql($filter2);
				$iklan						= $this->ADM->get_iklan('*', $where_iklan);
				$data['iklan_id']			= ($this->input->post('iklan_id'))?$this->input->post('iklan_id'):$iklan->iklan_id;	
				$data['iklan_link']			= ($this->input->post('iklan_link'))?$this->input->post('iklan_link'):$iklan->iklan_link;	
				$data['iklan_gambar']		= ($this->input->post('iklan_gambar'))?$this->input->post('iklan_gambar'):$iklan->iklan_gambar;	
				$data['iklan_post']			= date("Y-m-d H:i:s");
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$gambar = upload_image("iklan_gambar", "./assets/images/iklan/", seo($data['iklan_link']));
					$data['iklan_gambar']		= $gambar;
					$where_edit['iklan_id']		= validasi_sql($data['iklan_id']);
					$edit['iklan_post']			= validasi_sql($data['iklan_post']);
					$edit['iklan_link']			= validasi_sql($data['iklan_link']);
					if ($data['iklan_gambar']) {
						$row = $this->ADM->get_iklan('*', $where_edit);
						@unlink('./assets/images/iklan/'.$row->iklan_gambar);
						$edit['iklan_gambar']	= $data['iklan_gambar']; 
					}
					$this->ADM->update_iklan($where_edit, $edit);
					$this->session->set_flashdata('success','Iklan telah berhasil diedit!,');
					redirect('website/iklan');		
				}				
		} elseif ($data['action']	== 'hapus') {
			 $where['iklan_id']	= validasi_sql($filter2);
			 $row = $this->ADM->get_iklan('*', $where);
			 @unlink ('./assets/images/iklan/'.$row->iklan_gambar);
			 $this->ADM->delete_iklan($where);
			 $this->session->set_flashdata('warning','iklan telah berhasil dihapus!,');
			 redirect("website/iklan");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("wp_login");
		}
	}

    public function iklan_detail($iklan_id='')
    { 
	  if($this->session->userdata('logged_in') == TRUE) {
		  $where_admin['admin_user']	= $this->session->userdata('admin_user');
		  $data['admin']				= $this->ADM->get_admin('', $where_admin);
		  $where_iklan['iklan_id']		= validasi_sql($iklan_id);
		  $data['iklan']				= $this->ADM->get_iklan('*', $where_iklan);
		  $data['action']				= 'detail';
		  $this->load->vars($data);
		  $this->load->view('admin/content/website/iklan');
		  
	  } else {
		  redirect("wp_login");
	  }
    }

    //CKEDITOR
	private function ckeditor($text) {
		return '
		<script type="text/javascript" src="'.base_url().'editor/ckeditor.js"></script>
		<script type="text/javascript">
		var editor = CKEDITOR.replace("'.$text.'",
		{
			filebrowserBrowseUrl 	  : "'.base_url().'finder/ckfinder.html",
			filebrowserImageBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Images",
			filebrowserFlashBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Flash",
			filebrowserUploadUrl 	  : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
			filebrowserImageUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
			filebrowserFlashUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
			filebrowserWindowWidth    : 900,
			filebrowserWindowHeight   : 700,
			toolbarStartupExpanded 	  : false,
			height					  : 400	
		}
		);
	</script>';
	}
    
}