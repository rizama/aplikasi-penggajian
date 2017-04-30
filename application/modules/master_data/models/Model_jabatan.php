<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jabatan extends CI_Model {

	public	$nama   = '';
	public	$aktif  = '';
	
	public function get_jabatan(){
		$query = "
			SELECT *
			FROM jabatan
			ORDER BY id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_jabatan($id){
		$datasrc = $this->db->get_where('jabatan', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
}
/* End of file Model_jabatan.php */
/* Location: ./application/modules/master_data/models/Model_jabatan.php */