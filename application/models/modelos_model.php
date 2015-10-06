<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelos_model extends CI_Model {

	
	public function getModelos()
	{
		return $this->db->get('modelos')->result();
	} 
}

/* End of file modelos_model.php */
/* Location: ./application/models/modelos_model.php */