<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rincian_gaji_karyawan extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->page->use_directory();
		$this->load->model('model_laporan_penggajian');	
	}

	public function index(){
		$this->page->view('rincian_gaji_karyawan_form', array(
			'pdf'			=> $this->page->base_url('/download/'),
		));
	}
	
	public function options_slipgaji(){
		$slipgaji = $this->db->order_by('id')->get('transaksi_gaji');
		return options($slipgaji, 'id', NULL, 'id');
	}
	
	public function ajax_rinciangaji_options(){
		$no_slip = $this->input->post('no_slip');
		$karyawan = $this->model_laporan_penggajian->show_noslip_options($no_slip);
		echo $karyawan->id_karyawan.'#'.$karyawan->nama.'#'.$karyawan->alamat.'#'.$karyawan->jabatan.'#'.$karyawan->pendapatan.'#'.$karyawan->potongan.'#'.$karyawan->gaji_bersih;
	}
	
	public function ajax_list_perkiraan_gaji(){
		$no_slip = $this->input->post('no_slip');
		$list_gaji = $this->model_laporan_penggajian->show_list_gaji($no_slip);
		echo json_encode($list_gaji);
	}
	
	public function pdf($no_slip) {
		$this->load->library('pdf');
		$content = $this->load->view('rincian_gaji_karyawan_pdf', array (
			'karyawan' 		=> $this->model_laporan_penggajian->show_noslip_options($no_slip),
			'list_gaji'  	=> $this->model_laporan_penggajian->show_list_gaji($no_slip)
		), TRUE);
		$this->pdf->create($content, 'rincian_gaji');
	}
	
	public function download() {
		$no_slip = $this->input->post('no_slip');
		$this->load->helper('download');
		$data = file_get_contents(site_url('/laporan/rincian_gaji_karyawan/pdf/'.$no_slip));
		force_download('rincian_gaji_'.$no_slip.'.pdf', $data); 
	}
	
	
}

/* End of file Rincian_gaji_karyawan.php */
/* Location: ./application/modules/laporan/controllers/Rincian_gaji_karyawan.php */