<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$data['content']		= '/default/content/product';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'Barang |';
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 6;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_produk();
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		$data['action']			= 'product';
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
	
	public function detail($produk_id='', $filter2='', $produk_nama='')
	{  
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$where['produk_id'] 		= $produk_id;
	  $get = $this->ADM->get_produk("",$where);
	  if($get == "")
	  {
	  		redirect(base_url());
	  } else {
		$data['content']			= '/default/content/product';
		$data['web']				= $this->ADM->identitaswebsite();
		
		$data['produk_id']				= $produk_id;
		$where_produk['p.produk_id']	= $data['produk_id'];
		$data['produk'] 				= $this->ADM->get_produk('*', $where_produk);
		$row = $this->ADM->get_produk('*', $where_produk);
		$data['title']					= 'Barang > ' .$row->produk_nama. ' |';
		$data['action']					= 'detail';
		
		$data['boxtodaydeals']		= TRUE;
		$data['boxkategori']		= TRUE;
		$data['boxiklan']			= TRUE;
		$data['boxtestimonial']		= TRUE;
		$data['boxprodukterbaru']	= TRUE;
		$data['boxpopularpost']		= TRUE;
		$data['boxtags']			= TRUE;
		$data['boxnewsletter']		= TRUE;
		
	  	$b['produk_id'] = 0;
		if($b = "")	
	  	{
	  		redirect(base_url());
	  	} else {
	  	$update['produk_id'] = $produk_id;
			$this->ADM->update_hits_produk($produk_id);
	  }
	}
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	public function category($filter1='', $filter2='', $filter3='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$where['katproduk_id'] 			= $filter1;
	  	$get = $this->ADM->get_katproduk("",$where);
	  	if($get == "")
	  	{
	  		redirect('home');
	  	} else {
		$data['content']		= '/default/content/category';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'Kategori Barang |';
		$data['katproduk_id']			=  (empty($filter1))?'':$filter1;
		$where_katproduk['k.katproduk_id']	=  $data['katproduk_id'];
		$where 						= (empty($data['katproduk_id']))?'': $where_katproduk;
		$data['halaman']		= (empty($filter2))?1:$filter2;
		$data['batas']			= 24;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_produk($where,'');
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);

		$data['boxtodaydeals']		= TRUE;
		$data['boxkategori']		= TRUE;
		$data['boxiklan']			= TRUE;
		$data['boxtestimonial']		= TRUE;
		$data['boxprodukterbaru']	= TRUE;
		$data['boxpopularpost']		= TRUE;
		$data['boxtags']			= TRUE;
		$data['boxnewsletter']		= TRUE;
		}
		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	
}

/* End of file produk.php */
/* Location: ./application/controllers/product.php */