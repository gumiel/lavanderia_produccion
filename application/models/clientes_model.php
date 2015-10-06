<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function getClientes()
	{			
		$this->db->order_by('id_clientes', 'desc');
		$res = $this->db->get('clientes');
		return $res->result();
	}

	public function crearNuevoCLiente($data)
	{
		$this->db->insert('clientes', $data);
		return $this->db->insert_id();
	}

	public function editarCLiente($idCliente,$data)
	{
		$this->db->where('id_clientes', $idCliente);
		$this->db->update('clientes', $data);		
	}

	public function eliminarCliente($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->delete('clientes');	
	}

	public function getCliente($idCliente)
	{
		if($idCliente>0)
		{	
			$this->db->where('id_clientes', $idCliente);
			$res = $this->db->get('clientes');
			
			if($res->num_rows() > 0)			
				return $res->row();
			else
				return false;
		}else
		{
			return false;
		}
	}

}

/* End of file clientes_model.php */
/* Location: ./application/models/clientes_model.php */