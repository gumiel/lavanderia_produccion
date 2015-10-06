<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lavados_model extends CI_Model {

	public function getLavados()
	{
		return $this->db->get('lavados')->result();
	}	

	public function	crearLavado($data)
	{
		$this->db->insert('lavados', $data);		
		if($this->db->insert_id()>0)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}

	public function	editarLavado($id_lavados,$data)
	{
		$this->db->where('id_lavados', $id_lavados);
		$this->db->update('lavados', $data);			
		return TRUE;
	}

	public function eliminarLavado($id_lavados)
	{
		$this->db->where('id_lavados', $id_lavados);
		$this->db->delete('lavados');
	}

	public function devolverLavado($id_lavados)
	{
		$this->db->where('id_lavados', $id_lavados);
		$res = $this->db->get('lavados');
		if($res->num_rows()==1)
		{
			return $res->row();
		}else
		{
			return FALSE;
		}
	}
}

/* End of file lavados_model.php */
/* Location: ./application/models/lavados_model.php */