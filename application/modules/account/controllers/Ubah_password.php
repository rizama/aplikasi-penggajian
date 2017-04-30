<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_password extends MX_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this->page->use_directory();
		$this->load->model('back_office/model_pengguna');
	}
	
	public function index() {
		$this->page->view('ubah_password_form', array (
			'action' => $this->page->base_url('/update_pwd'),
		));
	}
	
	public function update_pwd() {
		$current = $this->input->post('current');
		$new 	 = $this->input->post('new');
		$retype  = $this->input->post('retype');
			
		$retval = $this->model_pengguna->update_pwd($current, $new, $retype);
		$this->session->set_flashdata('status', $retval);
		redirect($this->page->base_url());
	}

}

/* End of file Ubah_password.php */
/* Location: ./application/modules/account/controllers/Ubah_password.php */