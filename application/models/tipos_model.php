<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_model extends CI_Model {

	public function getTipos()
	{
		$res = $this->db->get('tipos_produccion');
		return $res->result();
	}	

}

/* End of file tipos_model.php */
/* Location: ./application/models/tipos_model.php */