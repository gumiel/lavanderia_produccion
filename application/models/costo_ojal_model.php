<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costo_ojal_model extends CI_Model {

	public function crearCostoOjal($data)
	{
		$this->db->insert('costo_ojal', $data);
	}
	
	public function vaciarCostoOjal($idCliente)
	{
		$this->db->where('id_clientes', $idCliente);
		$this->db->delete('costo_ojal');
	}

	public function getDatosOjalClientes($idCliente='')
	{
		$this->db->where('id_clientes', $idCliente);
		$res = $this->db->get('costo_ojal');
		if($res->num_rows()==1)
		{
			return $res->row();
		}else
		{
			return false;
		}

	}

	public function eliminarOjalesCortesiaTotal($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->delete('costo_ojal');	
	}
}

/* End of file costo_ojal_model.php */
/* Location: ./application/models/costo_ojal_model.php */