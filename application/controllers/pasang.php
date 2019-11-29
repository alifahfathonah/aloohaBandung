<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasang extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$data['content']					= '/default/content/pasang';
		@date_default_timezone_set('Asia/Jakarta');
		$data['web']						= $this->ADM->identitaswebsite();
		$data['title']						= 'Pasang Iklan |';
			$data['action']					= (empty($filter1))?'view':$filter1;
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('produk_nama'=>'NAMA PRODUK');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'produk_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 25;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_produk[$data['cari']]	= $data['q'];
				$where_account2['account_id']= $this->session->userdata('account_id');				
				$data['jml_data']			= $this->ADM->count_all_produk2($where_account2, $like_produk);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'account_nama';
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
				$data['produk_status']		= "R";
				$data['account_id']			= ($this->input->post('account_id'))?$this->input->post('account_id'):'';
				$data['produk_post']		= date("Y-m-d H:i:s");

				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					$insert['account_id']	 	 = validasi_sql($data['account_id']);
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
					$insert['produk_post']		 = validasi_sql($data['produk_post']);
					$this->ADM->insert_produk($insert);
					$this->session->set_flashdata('success','Iklan telah berhasil ditambahkan!,');
					redirect("pasang/index/tambah"); 
				}
			} elseif ($data['action']	== 'edit') {
				$where['produk_id'] 		=  validasi_sql($filter2);
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
				$data['account_id']			= ($this->input->post('account_id'))?$this->input->post('account_id'):$produk->account_id;	
				$data['produk_post']		= date('Y-m-d H:i:s');	
				$simpan						= $this->input->post('simpan');
				if ($simpan) {
					error_reporting(0);
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
					$this->session->set_flashdata('success','Iklan telah berhasil diedit!,');
					redirect('pasang/index/view');	
				}	
			
			 } elseif ($data['action']	== 'hapus') {
				 $where['produk_id']	= validasi_sql($filter2);
				 $row = $this->ADM->get_produk('*', $where);
				 @unlink ('./assets/images/produk/'.$row->produk_foto);
				 @unlink ('./assets/images/produk/'.$row->produk_foto2);
				 @unlink ('./assets/images/produk/'.$row->produk_foto3);
				 @unlink ('./assets/images/produk/'.$row->produk_foto4);
				 @unlink ('./assets/images/produk/'.$row->produk_foto5);
				 $this->ADM->delete_produk($where);
				 $this->session->set_flashdata('warning','Iklan telah berhasil dihapus!,');
				 redirect('pasang/index/view');
		 } 
		$data['boxtodaydeals']		= TRUE;
		$data['boxkategori']		= TRUE;
		$data['boxiklan']			= TRUE;
		$data['boxtestimonial']		= TRUE;
		$data['boxnewsletter']		= TRUE;
		$data['boxprodukterbaru']	= TRUE;
		$data['boxpopularpost']		= TRUE;
		$data['boxtags']			= TRUE;
		$this->load->vars($data);
		$this->load->view('default/home');
		} else {
			redirect("account");
		}
	}
}