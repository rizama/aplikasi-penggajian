<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MX_Controller {

	var $gallerypath;
	var $gallery_path_url;

	public function __construct() {
		parent::__construct();

		$this->page->use_directory();
		$this->load->model('model_pengguna');

		$this->gallerypath = realpath(APPPATH . '../foto/foto_pengguna');
		$this->gallery_path_url = base_url().'foto/foto_pengguna/';
	}

	public function index() {
		$this->page->view('pengguna_index', array (
			'add'		=> $this->page->base_url('/add'),
			'grid'		=> $this->model_pengguna->get_pengguna(),
		));
	}

	private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		$this->page->view('pengguna_form', array (
			'back'			=> $this->agent->referrer(),
			'action'		=> $this->page->base_url("/{$action}/{$id}"),
			'pengguna'		=> $this->model_pengguna->by_id_pengguna($id),
			'aksi'			=> $action,
		));
	}

	public function add(){
		$this->form();
	}

	public function edit($id){
		$this->form('update', $id);
	}

	public function insert(){
		$konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
							 'upload_path' => $this->gallerypath);

		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();

		$konfigurasi = array('source_image' => $datafile['full_path'],
							 'new_image' => $this->gallerypath . '/thumbnails',
							 'maintain_ration' => true,
							 'width' => 110,
							 'height' =>100);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();

		$data = array(
			'username' 			=> $this->input->post('username'),
			'nama' 	   			=> $this->input->post('nama'),
			'password' 			=> password($this->input->post('password')),
			'foto' 	   			=> $_FILES['userfile']['name'],
			'id_pengguna_grup' 	=> $this->input->post('id_pengguna_grup'),
			'blokir'   			=> $this->input->post('blokir'),
		);
		$this->db->insert('pengguna', $data);

		redirect($this->page->base_url());
	}

	public function update($id){
		$userfile = $_FILES['userfile']['name'];

		if(!empty($userfile)){
			$konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
								 'upload_path' => $this->gallerypath);

			$this->load->library('upload', $konfigurasi);
			$this->upload->do_upload();
			$datafile = $this->upload->data();

			$konfigurasi = array('source_image' => $datafile['full_path'],
								'new_image' => $this->gallerypath . '/thumbnails',
								'maintain_ration' => true,
								'width' => 110,
								'height' =>100);

			$this->load->library('image_lib', $konfigurasi);
			$this->image_lib->resize();

			$data = array(
				'username' => $this->input->post('username'),
				'nama' 	   => $this->input->post('nama'),
				#'password' => password($this->input->post('password')),
				'foto' 	   => $_FILES['userfile']['name'],
				'id_pengguna_grup' 	=> $this->input->post('id_pengguna_grup'),
				'blokir'   => $this->input->post('blokir'),
			);
			$this->db->where('id', $id);
			$this->db->update('pengguna', $data);
		}
		else{
			$data = array(
				'username' => $this->input->post('username'),
				'nama' 	   => $this->input->post('nama'),
				#'password' => password($this->input->post('password')),
				'id_pengguna_grup' 	=> $this->input->post('id_pengguna_grup'),
				'blokir'   => $this->input->post('blokir'),
			);
			$this->db->where('id', $id);
			$this->db->update('pengguna', $data);
		}

		redirect($this->page->base_url());
	}

	public function delete($id){
		$this->db->delete('pengguna', array('id' => $id));
		redirect($this->agent->referrer());
	}

}

/* End of file Pengguna.php */
/* Location: ./application/modules/master/controllers/Pengguna.php */
