<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Library for CodeIgniter 3.0.6
 * 
 * Class to manage template page
 *
 * @package		MFS_Library
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Yenda Purbadian
 * @email		yenda.message@gmail.com
 */

class Page {

	private $_CI;											// instance of CodeIgniter Class
	private $_dir			= FALSE;						// wheter the controller use directory or not
	private $_base_url;										// page Base URL
	private $_data			= array();						// data variables sent to View Class
	private $_header		= 'templates/header_tpl';		// page header
	private $_left_content	= 'templates/left_content_tpl';	// page left content
	private $_content		= '';							// page content
	private $_template		= 'site_tpl';					// default template	
	
	/**
	 * Constructor
	 * 
	 * Creates CI Class instance
	 */
	public function __construct() {
		$this->_CI =& get_instance();
	     	
		// define page base URL
		$first = $this->_CI->uri->segment(1);
		$second	= '';
		
		if ($first == '') {
			$first = $this->_CI->router->class;
		}
		else {
			$second	= $this->_CI->uri->segment(2);
		}
		
		$this->_base_url = $this->_dir ? site_url($first.'/'.$second) : site_url($first);
		
		// others
		$this->_CI->load->library('user_agent');
		$prev = $this->_CI->agent->referrer();
		$this->_back = $prev == '' ? $this->_base_url : $prev;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Get page base URL
	 *
	 * @return	string
	 */
	function base_url($uri = '') {
		// check first slash
		if ($uri != '') {
			if ($uri[0] != '/') {
				$uri = '/'.$uri;
			}
		}
		
		// return the base URL
		return $this->_base_url.$uri;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * use_directory
	 *
	 */
	function use_directory() {
		$this->_dir = TRUE;
		$dir				= $this->_CI->uri->segment(1);
		$controller			= $this->_CI->uri->segment(2);
		$this->_base_url 	= site_url($dir.'/'.$controller);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set data sent to view class
	 *
	 * @param	array
	 */
	function _data($values) {
		foreach ($values as $key => $value) {
			$this->_data[$key] = $value;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set content of the page
	 *
	 * @param	string
	 */
	function _content($content) {
		$this->_content = $content;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set template
	 *
	 * @param	string
	 */
	function template($template) {
		$this->_template = $template;
	}
	
	/**
	 * Set header of the page
	 *
	 * @param	string
	 */
	function header($header) {
		return $this->_header = $header;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Set left content of the page
	 *
	 * @param	string
	 */
	function left_content($left_content) {
		return $this->_menu = $left_content;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set data for template
	 */
	function _set_data(){
		foreach ($this as $key => $value) {
			if ($key != '_CI' && $key != '_data') {
				$key = substr($key, 1);
				$this->_data[$key] = $value;
			}
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Display the page
	 */
	function view($content = 'templates/main_content', $data = array()){
		$this->_header;
		$this->_left_content;
		$this->_content($content);
		$this->_data($data);
		
		$this->_set_data();
		$this->_CI->load->view('templates/'.$this->_template, $this->_data);
	}
	
}
 
// END MFS_Page class

/* End of file Page.php */
/* Location: ./application/libraries/Page.php */