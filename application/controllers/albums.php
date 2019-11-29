<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albums extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->SA =& get_instance();
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		
		$data['content']		= '/default/content/albums';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['kategori_id']			=  (empty($filter1))?'':$filter1;
		$where_kategori['k.kategori_id']	=  $data['kategori_id'];
		$where 						= (empty($data['kategori_id']))?'': $where_kategori;
		$data['halaman']		= (empty($filter2))?1:$filter2;
		$data['batas']			= 24;
		$data['title']			= 'Galeri |';
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_berita($where,'');
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		error_reporting(0);
		$data['slide']				= TRUE;
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
	}
	
	public function galeri($berita_id='', $filter2='', $berita_judul='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
	  $where['berita_id'] 		= $berita_id;
	  $get = $this->ADM->get_berita("",$where);
	  if($get == "")
	  {
	  	redirect(base_url());
	  } else {
		$data['content']		= '/default/content/albums';
		$data['web']				= $this->ADM->identitaswebsite();
		
		$data['berita_id']				= $berita_id;
		$where_berita['b.berita_id']	= $data['berita_id'];
		$data['berita'] 				= $this->ADM->get_berita('*', $where_berita);
		$row = $this->ADM->get_berita('*', $where_berita);
		$data['title']					= $row->berita_judul. ' |';
		$data['action']					= 'detail';
		
		$data['boxtodaydeals']		= TRUE;
		$data['boxkategori']		= TRUE;
		$data['boxiklan']			= TRUE;
		$data['boxtestimonial']		= TRUE;
		$data['boxnewsletter']		= TRUE;
		$data['boxprodukterbaru']	= TRUE;
		$data['boxpopularpost']		= TRUE;
		$data['boxtags']			= TRUE;
		
	  	$b['berita_id'] = 0;
		if($b = "")	
	  	{
	  		redirect(base_url());
	  	} else {
	  	$update['berita_id'] = $berita_id;
			$this->ADM->update_hits_berita($berita_id);
	  }
	}
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	

}

/* End of file news.php */
/* Location: ./application/controllers/albums.php */