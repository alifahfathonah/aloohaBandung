<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katproduct extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->SA =& get_instance();
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/katproduct';
		$data['web']			= $this->ADM->identitaswebsite();
		$data['title']			= 'Kategori Barang |';
		$data['katproduk_id']			=  (empty($filter1))?'':$filter1;
		$where_katproduk_id['k.katproduk_id']	=  $data['katproduk_id'];
		$where 						= (empty($data['katproduk_id']))?'': $where_katproduk_id;
		$data['halaman']		= (empty($filter2))?1:$filter2;
		$data['batas']			= 24;
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_berita($where,'');
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);
		error_reporting(0);
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
	
	
}

/* End of file news.php */
/* Location: ./application/controllers/katproduct.php */