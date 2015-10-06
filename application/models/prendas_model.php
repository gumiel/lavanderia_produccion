<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prendas_model extends CI_Model {

	public function getPrendas()
	{
		return $this->db->get('prendas')->result();
	}

}

/* End of file prendas_model.php */
/* Location: ./application/models/prendas_model.php */