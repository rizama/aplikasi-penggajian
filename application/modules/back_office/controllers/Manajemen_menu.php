<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_menu extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('model_manajemen_menu');
	}
	
	public function index() {
		$this->page->view('manajemen_menu_index', array (
			'add'		=> $this->page->base_url('/add'),
			'grid'		=> $this->model_manajemen_menu->get_manajemen_menu(),
		));
	}
	
	private function form($action = 'insert', $id = ''){

		$this->page->view('manajemen_menu_form', array (
			'back'			 => $this->agent->referrer(),
			'action'		 => $this->page->base_url("/{$action}/{$id}"),
			'manajemen_menu' => $this->model_manajemen_menu->by_id_manajemen_menu($id),
			'aksi'			 => $action,
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
			'nama' 			=> $this->input->post('nama'),
			'uri' 	   		=> $this->input->post('uri'),
			'id_menu_induk' => $this->input->post('id_menu_induk'),
			'aktif'   		=> $this->input->post('aktif'),
		);
		$this->db->insert('menu', $data);
		
		redirect($this->page->base_url());
	}
	
	public function update($id){		
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'uri' 	   		=> $this->input->post('uri'),
			'id_menu_induk' => $this->input->post('id_menu_induk'),
			'aktif'   		=> $this->input->post('aktif'),
		);		
		$this->db->where('id', $id);
		$this->db->update('menu', $data);
		
		redirect($this->page->base_url());
	}
	
	public function options_manajemen_menu($id){
		$manajemen_menu = $this->db->get_where('menu', array('id_menu_induk' => 0));
		return options($manajemen_menu, 'id', $id, 'nama');
	}

}

/* End of file Manajemen_menu.php */
/* Location: ./application/modules/master/controllers/Manajemen_menu.php */