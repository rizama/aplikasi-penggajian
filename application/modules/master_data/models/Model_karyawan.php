<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_Model {

	public	$nama    	  = '';
	public	$alamat  	  = '';
	public	$no_telp 	  = '';
	public	$jk 	 	  = '';
	public	$tempat_lahir = '';
	public	$tgl_lahir 	  = '';
	public	$email 		  = '';
	public	$pendidikan   = '';
	
	public function get_karyawan(){
		$query = "
			SELECT k.*,
				   j.nama AS nama_jabatan
			FROM karyawan AS k
			LEFT JOIN jabatan AS j
				ON k.id_jabatan = j.id
			ORDER BY k.id DESC
		";
		return $this->db->query($query)->result();
	}
	
	public function by_id_karyawan($id){
		$datasrc = $this->db->get_where('karyawan', array('id' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
	public function show_karyawan_options($id){
		$query = "
			SELECT k.id,
				   k.nama,
				   k.alamat,
				   j.nama AS nama_jabatan
			FROM karyawan AS k
			LEFT JOIN jabatan AS j
				ON k.id_jabatan = j.id
			WHERE k.id = '{$id}'
		";
		$query = $this->db->query($query)->row();
		return $query;
	}
	
}

/* End of file Model_karyawan.php */
/* Location: ./application/modules/master_data/models/Model_karyawan.php */