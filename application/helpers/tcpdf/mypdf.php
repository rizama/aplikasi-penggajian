<?php
require_once('tcpdf.php');

class MyPDF extends TCPDF {

	private $_CI;
	
	public function Header() {
		$this->_CI =& get_instance();
		$company = $this->_CI->db->get_where('perusahaan',  array('id' => '1'))->row();
		$nama = $company->nama;
		$alamat = $company->alamat.", Kode Pos: ".$company->kode_pos;
		$telepon = 'Telp: '.$company->no_telp.'. Fax: '.$company->fax.'. Email: '.$company->email;
		$this->SetFont('tahoma', 'B', 16);
		$this->Cell(180, 15, $nama, 0, FALSE, 'C', 0, '', 0, FALSE, 'M', 'M');
		$this->Ln(6);        
        
		$this->SetFont('tahoma', 'C', 9);
		$this->Cell(180, 0, $alamat, 0, FALSE, 'C', 0, '', 0, FALSE, 'M', 'M');
		$this->Ln(4);
		
		$this->Cell(180, 0, $telepon, 0, FALSE, 'C', 0, '', 0, FALSE, 'M', 'M');
		$this->Ln(4);
		
		$this->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0));
		$this->Cell(0, 0, '', 'T', 0, 'C');
	}
	
}

?>