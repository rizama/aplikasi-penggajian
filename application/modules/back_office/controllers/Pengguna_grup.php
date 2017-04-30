<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_grup extends MX_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('model_pengguna');
	}
	
	public function index() {
		$this->page->view('pengguna_grup_index', array (
			'add'		=> $this->page->base_url('/add'),
			'grid'		=> $this->model_pengguna->get_pengguna_grup(),
		));
	}
	
	private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		$this->page->view('pengguna_grup_form', array (
			'back'			=> $this->agent->referrer(),
			'action'		=> $this->page->base_url("/{$action}/{$id}"),
			'pengguna_grup'	=> $this->model_pengguna->by_id_grup_pengguna($id),
			'aksi'			=> $action,
			'menu'			=> $this->model_pengguna->get_menu($id),
			'submenu'		=> $this->model_pengguna->get_submenu($id),
		));
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		$data = array('nama' => $this->input->post('nama'));
		
		$this->db->insert('pengguna_grup', $data);
		$id_pengguna_grup = $this->db->insert_id();
		
		$menu = $this->input->post('id_menu');
		if($menu != ''){
			foreach ($menu as $p){
				if($p != '0'){
					$this->db->insert('menu_akses', array('id_menu' => $p, 'id_pengguna_grup' => $id_pengguna_grup));
				}			
			}
		}
		
		redirect($this->page->base_url());
	}
	
	public function update($id){
		$data = array('nama' => $this->input->post('nama'));
		
		$this->db->where('id', $id);
		$this->db->update('pengguna_grup', $data);
		
		$menu = $this->input->post('id_menu');
		if($menu != ''){
			$this->db->delete('menu_akses',array('id_pengguna_grup' => $id));
			foreach ($menu as $p) {
				if($p != '0')
				{					
					$this->db->insert('menu_akses', array('id_menu' => $p,'id_pengguna_grup' => $id));
				}			
			}
		}	
		
		redirect($this->page->base_url());
	}
	
	public function options_pengguna_grup($id){
		$pengguna_grup = $this->db->order_by('nama')->get('pengguna_grup');
		return options($pengguna_grup, 'id', $id, 'nama');
	}

}

/* End of file Pengguna_grup.php */
/* Location: ./application/modules/master/controllers/Pengguna_grup.php */