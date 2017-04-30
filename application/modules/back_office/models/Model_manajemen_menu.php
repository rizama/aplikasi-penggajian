<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manajemen_menu extends CI_Model {
	
	public	$nama  	  		= '';
	public	$uri  	  		= '';
	public	$id_menu_induk  = '';
	public	$aktif 	  	  	= '';
	
	public function get_manajemen_menu(){
		$query = "
			SELECT *
			FROM menu
			WHERE aktif = 'Y'
			ORDER BY id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_manajemen_menu($id){
		$datasrc = $this->db->get_where('menu', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
}
/* End of file Model_manajemen_menu.php */
/* Location: ./application/modules/back_office/models/Model_manajemen_menu.php */