<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perkiraan extends CI_Model {
	
	public 	$kode	= '';
	public	$nama   = '';
	public	$aktif  = '';
	
	public function get_perkiraan(){
		$query = "
			SELECT *
			FROM perkiraan
			ORDER BY id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_perkiraan($id){
		$datasrc = $this->db->get_where('perkiraan', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
}
/* End of file Model_perkiraan.php */
/* Location: ./application/modules/master_data/models/Model_perkiraan.php */