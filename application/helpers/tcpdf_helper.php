<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


require_once('tcpdf/mypdf.php');


function init_pdf() {	
	return new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, TRUE, 'UTF-8', FALSE);
}


/* End of file tcpdf_helper.php */
/* Location: ./application/helpers/tcpdf_helper.php */