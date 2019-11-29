<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	
	//CONFIGURATION TABLE USER (PENGGUNA)
	public function menu_pengguna($active=''){
		$query = $this->db->query("SELECT menu.menu_kode AS kode, menu.menu_url AS url, menu.menu_nama AS title, menu.menu_deskripsi AS deskripsi, menu.menu_subkode AS subkode FROM menu_admin LEFT JOIN menu ON menu_admin.menu_kode=menu.menu_kode WHERE menu_admin.admin_level_kode='".$this->session->userdata('admin_level')."' AND menu.menu_level='1' AND menu.menu_status='A' ORDER BY menu.menu_urutan ASC");
		foreach ($query->result() as $row){
			if ($active == $row->kode){
				echo "<li><a href='".site_url().$row->url."' title='".$row->deskripsi."' class='".$row->url."_active'></a></li>";
			} else {
				echo "<li><a href='".site_url().$row->url."' title='".$row->deskripsi."' class='".$row->url."'></a></li>";
			} 
		}
	}
	
	public function submenu_pengguna($menu, $active=''){
		$query = $this->db->query("SELECT menu.menu_kode AS kode, menu.menu_url AS url, menu.menu_nama AS title, menu.menu_deskripsi AS deskripsi, menu.menu_subkode AS subkode FROM menu_admin LEFT JOIN menu ON menu_admin.menu_kode=menu.menu_kode WHERE menu_admin.admin_level_kode='".$this->session->userdata('admin_level')."' AND menu.menu_level='2' AND menu.menu_subkode='".$menu."' AND menu.menu_status='A' ORDER BY menu.menu_urutan ASC");
		foreach ($query->result() as $row){
			$subquery 	= $this->db->query("SELECT menu.menu_url AS url, menu.menu_nama AS title, menu.menu_deskripsi AS deskripsi FROM menu_admin LEFT JOIN menu ON menu_admin.menu_kode=menu.menu_kode WHERE menu_admin.admin_level_kode='".$this->session->userdata('admin_level')."' AND menu.menu_level='3' AND menu.menu_subkode='".$row->kode."' AND menu.menu_status='A' ORDER BY menu.menu_urutan ASC");
			if ($active == $row->kode){
				//$informasi_home = "fa-home";
				$url = ($row->url == '#')?'javascript:;':site_url().$row->url;
				echo "<li ".$url."'>
                            <a href='".$url."'>
                                <i class='fa ".$row->deskripsi."'></i> <span>".$row->title."</span>
                            </a>";
				if ($subquery->num_rows() > 0){
				echo "<ul class='acc-menu'>";
				foreach ($subquery->result() as $row2){
					echo "<li class='".$url."'><a href='".site_url().$row2->url."' title='".$row2->deskripsi."'>".$row2->title."</a></li>";
				}
				echo "</ul>";
				}
				echo "</li>";
				//echo "<div class='clear'></div>";
			} else {
				//$informasi_home = "fa fa-home";
				$url = ($row->url == '#')?'javascript:;':site_url().$row->url;
				echo "<li>
                            <a href='".$url."'>
                                <i class='fa ".$row->deskripsi."'></i> <span>".$row->title."</span>
                            </a>";
				if ($subquery->num_rows() > 0){
				echo "<ul class='acc-menu'>";
				foreach ($subquery->result() as $row2){
					echo "<li><a href='".site_url().$row2->url."' title='".$row2->deskripsi."'>".$row2->title."</a></li>";
				}
				echo "</ul>";
				}
				echo "</li>";
				//echo "<div class='clear'></div>";
			} 
		}
	}  
	
	
    // ================================================== MODUL WEB ================================================== //
	
	//CONFIGURATION TABEL newsletter
	public function insert_newsletter($data){
        $this->db->insert("newsletter",$data);
    }
    
    public function update_newsletter($where,$data){
        $this->db->update("newsletter",$data,$where);
    }

    public function delete_newsletter($where){
        $this->db->delete("newsletter", $where);
    }

	public function get_newsletter($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("newsletter");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_newsletter($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("newsletter");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_newsletter($where="", $like=""){
        $this->db->select("*");
        $this->db->from("newsletter");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	public function newsletter(){
        $data = "";
		$where['newsletter_id'] = 1;
		$this->db->select("*");
        $this->db->from("newsletter");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	
	//CONFIGURATION TABEL IDENTITAS
	public function insert_identitas($data){
        $this->db->insert("identitas",$data);
    }
    
    public function update_identitas($where,$data){
        $this->db->update("identitas",$data,$where);
    }

    public function delete_identitas($where){
        $this->db->delete("identitas", $where);
    }

	public function get_identitas($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("identitas");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_identitas($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("identitas");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_identitas($where="", $like=""){
        $this->db->select("*");
        $this->db->from("identitas");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	public function identitaswebsite(){
        $data = "";
		$where['identitas_id'] = 1;
		$this->db->select("*");
        $this->db->from("identitas");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
    
 
	//CONFIGURATION TABEL STATIS
	public function insert_statis($data){
        $this->db->insert("statis",$data);
    }
    
    public function update_statis($where,$data){
        $this->db->update("statis",$data,$where);
    }

    public function delete_statis($where){
        $this->db->delete("statis", $where);
    }

	public function get_statis($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("statis");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_statis($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("statis");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_statis($where="", $like=""){
        $this->db->select("*");
        $this->db->from("statis");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

	
	//CONFIGURATION TABEL SLIDE
	public function insert_slide($data){
        $this->db->insert("slide",$data);
    }
    
    public function update_slide($where,$data){
        $this->db->update("slide",$data,$where);
    }

    public function delete_slide($where){
        $this->db->delete("slide", $where);
    }

	public function get_slide($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("slide");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_slide($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("slide");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_slide($where="", $like=""){
        $this->db->select("*");
        $this->db->from("slide");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
	
    
    // ================================================== MENU UTAMA ================================================== //    
    // KONFIGURASI TABEL KATEGORI
	public function insert_kategori($data){
        $this->db->insert("kategori",$data);
    }
    
    public function update_kategori($where,$data){
        $this->db->update("kategori",$data,$where);
    }

    public function delete_kategori($where){
        $this->db->delete("kategori", $where);
    }

	public function get_kategori($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("kategori");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_kategori($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_kategori($where="", $like=""){
        $this->db->select("*");
        $this->db->from("kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    //KONFIGURASI TABEL BERITA
	public function insert_berita($data){
        $this->db->insert("berita",$data);
    }
    
    public function update_berita($where,$data){
        $this->db->update("berita",$data,$where);
    }
	
	public function update_hits_berita($where){		
        $this->db->query("UPDATE berita SET berita_hits=berita_hits+1 WHERE berita_id=$where");
    }

    public function delete_berita($where){
        $this->db->delete("berita", $where);
    }

	public function get_berita($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("berita b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	 public function grid_all_berita1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
			$data = "";
			$this->db->select($select);
			$this->db->from("berita b");
			$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
			if ($where){$this->db->where($where);}
			if ($like){
				foreach($like as $key => $value){ 
				$this->db->like($key, $value); 
				}
			}
			$names = array('nava', 'admin');
			$this->db->where_not_in('admin_nama', $names);
			$this->db->order_by($sidx,$sord);
			$this->db->limit($limit,$start);
			$Q = $this->db->get();
			if ($Q->num_rows() > 0){
				$data=$Q->result();
			}
			$Q->free_result();
			return $data;
		}
		
    public function grid_all_berita($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("berita b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_berita($where="", $like=""){
        $this->db->select("*");
        $this->db->from("berita b");
		$this->db->join('kategori k', 'b.kategori_id= k.kategori_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    public function grid_all_berita2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("berita");
		if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_berita2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("berita");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


    
    //CONFIGURATION TABLE TAGS
    public function insert_tags($data){
        $this->db->insert("tags",$data);
    }
    
    public function update_tags($where,$data){
        $this->db->update("tags",$data,$where);
    }

    public function delete_tags($where){
        $this->db->delete("tags", $where);
    }

	public function get_tags($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("tags");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_tags($select, $sidx,$sord,$limit,$start,$where="", $like){
        $data = "";
        $this->db->select($select);
        $this->db->from("tags");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_tags($where="", $like=""){
        $this->db->select("*");
        $this->db->from("tags");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
	}
	
	
   
    // ================================================== END MENU UTAMA ================================================== //	

   
    // ================================================== PRODUK ================================================== //	

// KONFIGURASI TABEL katproduk
	public function insert_katproduk($data){
        $this->db->insert("katproduk",$data);
    }
    
    public function update_katproduk($where,$data){
        $this->db->update("katproduk",$data,$where);
    }

    public function delete_katproduk($where){
        $this->db->delete("katproduk", $where);
    }

	public function get_katproduk($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("katproduk");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_katproduk($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("katproduk");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_katproduk($where="", $like=""){
        $this->db->select("*");
        $this->db->from("katproduk");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
    //KONFIGURASI TABEL produk
	public function insert_produk($data){
        $this->db->insert("produk",$data);
    }
    
    public function update_produk($where,$data){
        $this->db->update("produk",$data,$where);
    }
	
	public function update_hits_produk($where){		
        $this->db->query("UPDATE produk SET produk_hits=produk_hits+1 WHERE produk_id=$where");
    }

    public function delete_produk($where){
        $this->db->delete("produk", $where);
    }

	public function get_produk($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("produk p");
		$this->db->join('katproduk k', 'p.katproduk_id= k.katproduk_id', 'left');
		$this->db->join('account a', 'p.account_id= a.account_id', 'left');
		$this->db->join('kota kt', 'a.kota_id= kt.kota_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	 public function grid_all_produk1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
			$data = "";
			$this->db->select($select);
			$this->db->from("produk b");
			$this->db->join('katproduk k', 'b.katproduk_id= k.katproduk_id', 'left');
			if ($where){$this->db->where($where);}
			if ($like){
				foreach($like as $key => $value){ 
				$this->db->like($key, $value); 
				}
			}
			$names = array('nava', 'admin');
			$this->db->where_not_in('admin_nama', $names);
			$this->db->order_by($sidx,$sord);
			$this->db->limit($limit,$start);
			$Q = $this->db->get();
			if ($Q->num_rows() > 0){
				$data=$Q->result();
			}
			$Q->free_result();
			return $data;
		}
		
    public function grid_all_produk($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("produk p");
		$this->db->join('katproduk k', 'p.katproduk_id= k.katproduk_id', 'left');
		$this->db->join('account a', 'p.account_id= a.account_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
    public function count_all_produk($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk p");
		$this->db->join('katproduk k', 'p.katproduk_id= k.katproduk_id', 'left');
		$this->db->join('account a', 'p.account_id= a.account_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    public function grid_all_produk2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
       $data = "";
        $this->db->select($select);
        $this->db->from("produk");
			if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_produk2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    

    //KONFIGURASI TABEL account
	public function insert_account($data){
        $this->db->insert("account",$data);
    }
    
    public function update_account($where,$data){
        $this->db->update("account",$data,$where);
    }
	
	public function update_hits_account($where){		
        $this->db->query("UPDATE account SET account_hits=account_hits+1 WHERE account_id=$where");
    }

    public function delete_account($where){
        $this->db->delete("account", $where);
    }

	public function get_account($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("account a");
		$this->db->join('kota k', 'a.kota_id= k.kota_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	 public function grid_all_account1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
			$data = "";
			$this->db->select($select);
			$this->db->from("account a");
			$this->db->join('kota k', 'a.kota_id= k.kota_id', 'left');
			if ($where){$this->db->where($where);}
			if ($like){
				foreach($like as $key => $value){ 
				$this->db->like($key, $value); 
				}
			}
			$names = array('nava', 'admin');
			$this->db->where_not_in('admin_nama', $names);
			$this->db->order_by($sidx,$sord);
			$this->db->limit($limit,$start);
			$Q = $this->db->get();
			if ($Q->num_rows() > 0){
				$data=$Q->result();
			}
			$Q->free_result();
			return $data;
		}
		
    public function grid_all_account($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("account a");
		$this->db->join('kota k', 'a.kota_id= k.kota_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_account($where="", $like=""){
        $this->db->select("*");
        $this->db->from("account a");
		$this->db->join('kota k', 'a.kota_id= k.kota_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    public function grid_all_account2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("account");
		if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_account2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("account");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


// KONFIGURASI TABEL kota
	public function insert_kota($data){
        $this->db->insert("kota",$data);
    }
    
    public function update_kota($where,$data){
        $this->db->update("kota",$data,$where);
    }

    public function delete_kota($where){
        $this->db->delete("kota", $where);
    }

	public function get_kota($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("kota k");
		$this->db->join('provinsi p', 'k.provinsi_id= p.provinsi_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_kota($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("kota k");
		$this->db->join('provinsi p', 'k.provinsi_id= p.provinsi_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_kota($where="", $like=""){
        $this->db->select("*");
        $this->db->from("kota");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
     //CONFIGURATION TABLE iklan
    public function insert_iklan($data){
        $this->db->insert("iklan",$data);
    }
    
    public function update_iklan($where,$data){
        $this->db->update("iklan",$data,$where);
    }

    public function delete_iklan($where){
        $this->db->delete("iklan", $where);
    }

	public function get_iklan($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("iklan");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_iklan($select, $sidx,$sord,$limit,$start,$where="", $like){
        $data = "";
        $this->db->select($select);
        $this->db->from("iklan");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_iklan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("iklan");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
	}
    // ================================================== PENGATURAN ================================================== //
	//CONFIGURATION TABLE MENU ADMIN
	public function insert_menu_admin($data){
        $this->db->insert("menu_admin",$data);
    }
    
    public function update_menu_admin($where,$data){
        $this->db->update("menu_admin",$data,$where);
    }

    public function delete_menu_admin($where){
        $this->db->delete("menu_admin", $where);
    }

	public function get_menu_admin($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("menu_admin");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_menu_admin($select, $sidx, $sord, $limit, $start, $where=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("menu_admin");
		if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_menu_admin($where=""){
        $this->db->select("*");
        $this->db->from("menu_admin");
		if ($where){$this->db->where($where);}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
	//CONFIGURATION TABLE MENU
	public function insert_menu($data){
        $this->db->insert("menu",$data);
    }
    
    public function update_menu($where,$data){
        $this->db->update("menu",$data,$where);
    }

    public function delete_menu($where){
        $this->db->delete("menu", $where);
    }

	public function get_menu($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("menu");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_menu($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("menu");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
		$this->db->order_by('menu_urutan','ASC');
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_menu($where="", $like=""){
        $this->db->select("*");
        $this->db->from("menu");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

	//CONFIGURATION TABLE ADMIN
	public function insert_admin($data){
        $this->db->insert("admin",$data);
    }
    
    public function update_admin($where,$data){
        $this->db->update("admin",$data,$where);
    }

    public function delete_admin($where){
        $this->db->delete("admin", $where);
    }

	public function get_admin($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("admin a");
		$this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_admin($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin a");
        $this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
		$names = array('nava', 'admin');
        $this->db->where_not_in('admin_user', $names);
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_admin2($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin a");
        $this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	//CONFIGURATION TABLE ADMIN LEVEL
	public function insert_admin_level($data){
        $this->db->insert("admin_level",$data);
    }
    
    public function update_admin_level($where,$data){
        $this->db->update("admin_level",$data,$where);
    }

    public function delete_admin_level($where){
        $this->db->delete("admin_level", $where);
    }

	public function get_admin_level($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("admin_level");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_admin_level($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin_level");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin_level($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin_level");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    // ================================================== END PENGATURAN ================================================== //
    
    // FUNGSI PENCARIAN
	public function grid_all_pencarian($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("produk p");
		$this->db->join('katproduk k', 'p.katproduk_id= k.katproduk_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->or_like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
	
	public function count_all_pencarian($where="", $like=""){
        $this->db->select("*");
        $this->db->from("produk p");
		$this->db->join('katproduk k', 'p.katproduk_id= k.katproduk_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->or_like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }	
    
    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
	public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' required class='form-control' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
	public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' class='form-control' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
			echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
		}
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
			echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
		}
	}
	
	//CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
	public function listarray($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			if (array_search($row->tag_id, $array_tag) === false) {
			} else {
			echo $row->$name_value.", ";
			}
		}
	}
	
	//CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
	public function tagsberita($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			if (array_search($row->tag_id, $array_tag) === false) {
			} else {
			echo "<a href='".site_url()."news/tags/".$row->tag_id."' class='tag'>".$row->$name_value."</a> ";
			}
		}
	}
}