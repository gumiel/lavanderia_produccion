<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
	}
	public function index()
	{
		
		
		
		$css = array('morris.css', 'timeline.css' );
		$js = array('raphael-min.js', 'morris.min.js' , 'morris-data.js' );
		$data =array("css"=> $css, "js"=> $js );
		$this->load->view('admin/index',$data);
	}

	public function listaa()
	{
		// exit;
		$this->load->view('admin/lista');
	}
}

/* End of file administracion.php */
/* Location: ./application/controllers/administracion.php */