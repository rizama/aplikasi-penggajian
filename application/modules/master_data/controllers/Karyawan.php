<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends MX_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('model_karyawan');
	}
	
	public function index() {		
		$this->page->view('karyawan_index', array (
			'add'		=> $this->page->base_url('/add'),
			'grid'		=> $this->model_karyawan->get_karyawan(),
		));
	}
	
	private function form($action = 'insert', $id = ''){
		$this->page->view('karyawan_form', array (
			'back'			=> $this->agent->referrer(),
			'action'		=> $this->page->base_url("/{$action}/{$id}"),
			'karyawan'		=> $this->model_karyawan->by_id_karyawan($id),
		));
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'id_jabatan' => $this->input->post('id_jabatan'),
			'no_telp' => $this->input->post('no_telp'),
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'email' => $this->input->post('email'),
			'pendidikan' => $this->input->post('pendidikan'),
		);
		$this->db->insert('karyawan', $data);
		
		redirect($this->page->base_url());
	}
	
	public function update($id){
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'id_jabatan' => $this->input->post('id_jabatan'),
			'no_telp' => $this->input->post('no_telp'),
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'email' => $this->input->post('email'),
			'pendidikan' => $this->input->post('pendidikan'),			
		);
		$this->db->where('id', $id);
		$this->db->update('karyawan', $data);
		
		redirect($this->page->base_url());
	}
	
	public function delete($id){
		$this->db->delete('karyawan', array('id' => $id));
		redirect($this->agent->referrer());
	}
	
	public function options_karyawan(){
		$karyawan = $this->db->order_by('nama')->get('karyawan');
		return options($karyawan, 'id', NULL, 'nama');
	}
	
	public function ajax_karyawan_options(){
		$id_karyawan = $this->input->post('id_karyawan');
		$karyawan = $this->model_karyawan->show_karyawan_options($id_karyawan);
		echo $karyawan->id.'#'.$karyawan->nama.'#'.$karyawan->alamat.'#'.$karyawan->nama_jabatan;
	}

}

/* End of file Karyawan.php */
/* Location: ./application/modules/master_data/controllers/Karyawan.php */