<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Backup extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['content']				= 'admin/content/backup/backup';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$web							= $this->ADM->identitaswebsite();
			$this->load->helper("download");
			$tanggal						=date("Ymd-His");
			$namaFile						="backup-".$web->identitas_website.'-'.$tanggal . ".sql.zip";
			$this->load->dbutil();
			$backup=& $this->dbutil->backup();
			force_download($namaFile, $backup);
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("sign_in");
		}
	 }
    
    
}