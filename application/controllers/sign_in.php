<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sign_in extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'LOG', TRUE);
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('admin/','refresh');
        } else {     
		$data['web']					= $this->ADM->identitaswebsite();
		$data['captcahImage'] 	= $this->makeCaptcha();
		$this->load->vars($data);
		$this->load->view('admin/login');
		 }
	}
	
	public function ceklogin()
	{
	$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$do				= $this->input->post('masuk');
		
		$where_login['admin_user']	= $username;
		$where_login['admin_pass']	= do_hash($password, 'md5');
		
	
		
		if ($this->LOG->cek_login($where_login) === TRUE){
			redirect("admin/");
		} else {
			$this->session->set_flashdata('warning','Username, Password, dan Caphcha tidak cocok!');
            redirect("sign_in");
		}
	}
	
	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("sign_in");
	}
	
public function makeCaptcha()
	{
		$this->load->helper('captcha');
		$alpha 	= '1234567890';
		$acak 	= str_shuffle($alpha);
		$acak	= substr($acak,0,4);
		$nilai	= array (
						'word' =>$acak,
						'img_path' =>'./captcha/',
						'img_url' =>base_url().'captcha/',
						'font_path' =>'./system/fonts/texb.ttf',
						'img_width' => '100',
						'img_height' =>38,
						'expiration' =>7200
						);
		$captcha=create_captcha($nilai);
		$data=array(
			'captcha_id'=>'',
			'captcha_time'=>'123',
			'ip_address'=>$_SERVER['REMOTE_ADDR'],
			'word'=>'123'
		);
		$query=$this->db->insert_string('captcha',$data);
		$this->db->query($query);
		return $captcha['image'];
	}
		
}