<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->load->model('M_account', 'LOG', TRUE);
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		if ($this->session->userdata('logged_in2') == TRUE){       
            redirect('pasang','refresh');
        } else {     
		$data['captcahImage'] 	= $this->makeCaptcha();
		$data['web']			= $this->ADM->identitaswebsite();
		$data['content']		= '/default/content/login';
		$data['title']			= 'Login |';
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
	
	public function ceklogin()
	{
		$account_email			= validasi_sql($this->input->post('account_email'));
		$account_password1		= validasi_sql($this->input->post('account_password1'));
		$account_status			= 'Y';
		$do						= validasi_sql($this->input->post('masuk'));
		
		$where_login['account_email']	= $account_email;
		$where_login['account_status']	= 'Y';
		$where_login['account_password1']	= do_hash($account_password1, 'md5');
		
		date_default_timezone_set('Asia/Jakarta');
		$exp=time()-7200;
		$q="DELETE FROM captcha WHERE captcha_time < ".$exp."";
		$this->db->query($q);
		$sql="SELECT COUNT(*) as count FROM captcha WHERE word=? AND ip_address=? AND captcha_time > ?";
		$datacap=array($_POST['captcha'],$_SERVER['REMOTE_ADDR'],$exp);
		$query=$this->db->query($sql,$datacap);
		$row=$query->row();
		
		if ($row->count != 0 && $do && $account_status && $this->LOG->cek_login($where_login) === TRUE){
			redirect("pasang/index/tambah");
		} else {
			$this->session->set_flashdata('warning','Email atau Password, atau Caphcha tidak cocok!');
            redirect("account");
		}
		
	}
	
	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("account");
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
			'captcha_time'=>$captcha['time'],
			'ip_address'=>$_SERVER['REMOTE_ADDR'],
			'word'=>$captcha['word']
		);
		$query=$this->db->insert_string('captcha',$data);
		$this->db->query($query);
		return $captcha['image'];
	}

	public function daftar($filter1='', $filter2='', $filter3='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$data['web']			= $this->ADM->identitaswebsite();
		$data['content']		= '/default/content/daftar';
		$data['title']			= 'Ayo Daftar dan Jual Beli Online Sekarang |';
		@date_default_timezone_set('Asia/Jakarta');
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
		$data['account_status']		= "Y";
		$data['account_post']		= date('Y-m-d H:i:s');
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
		$data['account_status']		= "Y";
		$where['account_email']			= $data['account_email'];
		$jml_account				= $this->ADM->count_all_account($where);
		$data['account_post']		= date('Y-m-d H:i:s');
				$simpan						= $this->input->post('simpan');
				if($simpan && $jml_account < 1){
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
					$this->session->set_flashdata('success','Terimakasih anda telah terdaftar sebagai user baru!,');
					redirect("account/index");
					} elseif ($simpan && $jml_account > 0 ){
						echo '<script type="text/javascript">
						  	alert("Email sudah terdaftar!,");
						  </script>';
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

	}

	public function profil($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		$data['content']					= '/default/content/profil';
			@date_default_timezone_set('Asia/Jakarta');
		$data['web']						= $this->ADM->identitaswebsite();
		$data['title']						= 'Profil |';
		$data['action']						= (empty($filter1))?'edit':$filter1;
		$data['validate']					= array('account_nama'=>'Judul');
		if($data['action'] == 'edit') {
				$data['onload']					= 'account_nama';
				$where_account['account_id']	= $filter2;
				$account						= $this->ADM->get_account('', $where_account);
				$data['account_id']				= ($this->input->post('account_id'))?$this->input->post('account_id'):$account->account_id;
				$data['account_email']			= ($this->input->post('account_email'))?$this->input->post('account_email'):$account->account_email;
				$data['account_password1']		= ($this->input->post('account_password1'))?$this->input->post('account_password1'):$account->account_password1;
				$data['account_password2']		= ($this->input->post('account_password2'))?$this->input->post('account_password2'):$account->account_password2;
				$data['account_nama']			= ($this->input->post('account_nama'))?$this->input->post('account_nama'):$account->account_nama;
				$data['account_jk']				= ($this->input->post('account_jk'))?$this->input->post('account_jk'):$account->account_jk;
				$data['account_alamat']			= ($this->input->post('account_alamat'))?$this->input->post('account_alamat'):$account->account_alamat;
				$data['provinsi_id']		= ($this->input->post('provinsi_id'))?$this->input->post('provinsi_id'):$account->provinsi_id;
				$data['kota_id']				= ($this->input->post('kota_id'))?$this->input->post('kota_id'):$account->kota_id;
				$data['account_tlp']			= ($this->input->post('account_tlp'))?$this->input->post('account_tlp'):$account->account_tlp;
				$data['account_foto']			= ($this->input->post('account_foto'))?$this->input->post('account_foto'):$account->account_foto;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$gambar = upload_image("account_foto", "./assets/images/account/", seo($data['account_nama']));
					$data['account_foto']	= $gambar;
					$where_edit['account_id']	= validasi_sql($data['account_id']);
					$edit['account_email']		= validasi_sql($data['account_email']);
					if($data['account_password1'] == $data['account_password1']) {
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
					$this->ADM->update_account($where_edit, $edit);
					$this->session->set_flashdata('success','Profil telah berhasil diedit!,');
					redirect("account/profil/edit/".$this->session->userdata('account_id'));
				}
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

	public function forgot_password($filter1='', $filter2='', $filter3='')
	{
		$where_account['account_email']		= $this->session->userdata('account_email');
		$data['account']					= $this->ADM->get_account('',$where_account);  
		if ($this->session->userdata('logged_in2') == TRUE){       
            redirect('pasang','refresh');
        } else {     
		$data['account_email']		= ($this->input->post('account_email'))?$this->input->post('account_email'):'';
		$where['account_email']			= $data['account_email'];
		$jml_account				= $this->ADM->count_all_account($where);
		$data['account_post']		= date('Y-m-d H:i:s');
				$kirim					= $this->input->post('kirim');
				if($kirim && $jml_account < 1){
					$insert['account_email']	= validasi_sql($data['account_email']);
					$this->session->set_flashdata('warning','Email tidak terdaftar!,');
					redirect("account/forgot_password");
					} elseif ($kirim && $jml_account > 0 ){
						echo '<script type="text/javascript">
						  	alert("Reset password telah dilakukan, silahkan cek email!,");
						  </script>';

				$web				= $this->ADM->identitaswebsite();
		 		$account_email   = ($this->input->post('account_email'))?$this->input->post('account_email'):'';
				$query = $this->db->query("SELECT * FROM account where account_email='".$account_email."'");
         		foreach ($query->result() as $results){ }
		  		$to=$results->account_email;
                $subject="Forgot Password";
                $from = $web->identitas_email;
                 $body='<h3>Selamat Datang, <b>'.$results->account_nama."</b></h3>
                 <ul>
                 	<li>Email: <b>".$results->account_email."</b></li>
                 	<li>Password anda adalah: <b>".$results->account_password2."</b></li>
                 </ul>
                 <br>Untuk Login kembali silahkan klik link dibawah:<br>
                 ".base_url()."account<br><br><br>
                 Terimakasih<br>
                 Salam,<br><b>".$web->identitas_website."</b>";
              		$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					error_reporting(0);
                	mail($to,$subject,$body,$headers);
			}
	
			
		$data['web']			= $this->ADM->identitaswebsite();
		$data['content']		= '/default/content/forgot_password';
		$data['title']			= 'Forgot Password |';
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

}
	