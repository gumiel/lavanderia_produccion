<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kardex_model extends CI_Model {

	public function listaKardex(){
		
		return $this->db->get('produccion')->result();
	}

}

/* End of file kardex_model.php */
/* Location: ./application/models/kardex_model.php */