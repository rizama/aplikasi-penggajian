<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengguna extends CI_Model {
	
	public	$username  	  = '';
	public	$password  	  = '';
	public	$nama    	  = '';
	public	$foto 	  	  = '';
	public	$blokir	 	  = '';
	
	public function get_pengguna(){
		$query = "
			SELECT *
			FROM pengguna
			ORDER BY id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_pengguna($id){
		$datasrc = $this->db->get_where('pengguna', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
	public function get_pengguna_grup(){
		$query = "
			SELECT *
			FROM pengguna_grup
			ORDER BY id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_grup_pengguna($id){
		$datasrc = $this->db->get_where('pengguna_grup', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
	public function update_pwd($current, $new, $retype){
		if ($new != $retype) return 'unmatch';
		
		$pengguna = $this->session->userdata('pengguna');
		if (password($current) != $pengguna->password) return 'wrong';
		
		$this->db->update('pengguna', array('password' => password($new)), array('id' => $pengguna->id));
		return 'ok';
	}
	
	public function get_menu($id = '') {
		$query = "
			SELECT m.*, ma.id AS id_menu_akses 
			FROM menu AS m 
			LEFT JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id}') AS ma  
				ON ma.id_menu = m.id 
			WHERE m.id_menu_induk = 0
			ORDER BY m.id			
		";
		return $this->db->query($query);
	}
	
	public function get_submenu($id = '') {
		$query = "
			SELECT m.*, ma.id AS id_menu_akses 
			FROM menu AS m 
			LEFT JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id}') AS ma 
				ON ma.id_menu = m.id 
			WHERE m.id_menu_induk > 0 
			ORDER BY m.id		
		";
		return $this->db->query($query);
	}
	
}
/* End of file Model_pengguna.php */
/* Location: ./application/modules/back_office/models/Model_pengguna.php */