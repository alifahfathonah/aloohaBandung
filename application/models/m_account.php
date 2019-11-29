<?php
class M_account extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("account");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'account_id' 			=> $data->account_id,
					'account_email' 		=> $data->account_email,
					'account_password1' 	=> $data->account_password1,
					'account_status' 		=> $data->account_status,
					'account_nama'		 	=> $data->account_nama,
					'logged_in2'			=> TRUE
					);
		$this->session->set_userdata($session);
	}

	function remov_session() {
		$session = array(
					'account_id'   		 =>'',
					'account_email'   	 =>'',
					'account_password1'  =>'',
					'account_status'	 =>'',
					'account_nama'		 =>'',
					'logged_in2'	 	 => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}