<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_gaji_karyawan extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->page->use_directory();
		$this->load->model('model_laporan_penggajian');	
	}

	public function index($bln_awal='', $bln_akhir=''){	
		$p['bln_awal'] = $bln_awal;
		$p['bln_akhir'] = $bln_akhir;
		
		$this->page->view('rekap_gaji_karyawan_index', array(
			'search'		=> $this->page->base_url('/search/'),
			'bln_awal'		=> $bln_awal,
			'bln_akhir'		=> $bln_akhir,
			'grid'			=> $this->model_laporan_penggajian->get_data_penggajian_xls($p),
			'xls'			=> $this->page->base_url("/gaji_xls/{$bln_awal}/{$bln_akhir}"),
		));
	}
	
	public function search(){
		$bln_awal = $this->input->post('bln_awal');
		$bln_akhir = $this->input->post('bln_akhir');
		
		redirect($this->page->base_url("/index/{$bln_awal}/{$bln_akhir}"));
	}
	
	public function gaji_xls($bln_awal='', $bln_akhir=''){
		$p['bln_awal'] = $bln_awal;
		$p['bln_akhir'] = $bln_akhir;
		
		$content = $this->load->view('rekap_gaji_karyawan_xls', array (
			'bln_awal'	=> $bln_awal,
			'bln_akhir'	=> $bln_akhir,
			'src'		=> $this->model_laporan_penggajian->get_data_penggajian_xls($p),
		), TRUE);
		
		excel_header('rekap_gaji_karyawan_'.date('ymdHis').'.xls');
		echo $content;
	}
	
}

/* End of file Rekap_gaji_karyawan.php */
/* Location: ./application/modules/laporan/controllers/Rekap_gaji_karyawan.php */