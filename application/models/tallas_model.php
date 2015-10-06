<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tallas_model extends CI_Model {

	public function getTallas()
	{
		$this->db->order_by('id_tallas', 'desc');
		return $this->db->get('tallas')->result();	
	}

	public function devolverTallas($id_tallas)
	{
		$this->db->where('id_tallas', $id_tallas);
		$res = $this->db->get('tallas');
		if($res->num_rows()==1)
		{
			return $res->row();
		}else
		{
			return FALSE;
		}
	}
}

/* End of file tallas_model.php */
/* Location: ./application/models/tallas_model.php */