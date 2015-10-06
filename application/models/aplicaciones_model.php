<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplicaciones_model extends CI_Model {

	public function getAplicaciones()
	{
		return $this->db->get('aplicaciones')->result();
	}
	public function	crearAplicacion($data)
	{
		$this->db->insert('aplicaciones', $data);		
		if($this->db->insert_id()>0)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}

	public function	editarAplicacion($id_aplicaciones,$data)
	{
		$this->db->where('id_aplicaciones', $id_aplicaciones);
		$this->db->update('aplicaciones', $data);			
		return TRUE;
	}
	public function eliminarAplicacion($id_aplicaciones)
	{
		$this->db->where('id_aplicaciones', $id_aplicaciones);
		$this->db->delete('aplicaciones');
	}
	public function devolverAplicacion($id_aplicaciones)
	{
		$this->db->where('id_aplicaciones', $id_aplicaciones);
		$res = $this->db->get('aplicaciones');
		if($res->num_rows()==1)
		{
			return $res->row();
		}else
		{
			return FALSE;
		}
	}
}

/* End of file aplicaciones_model.php */
/* Location: ./application/models/aplicaciones_model.php */