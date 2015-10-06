<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ojales_cortesia_model extends CI_Model {

	public function crearOjalesCortesia($datos)
	{
		$this->db->insert('ojales_cortesia', $datos);
	}

	public function eliminarOjalesCortesia($id_clientes,$id_tallas,$id_modelos,$id_prendas)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);		
		$this->db->delete('ojales_cortesia');
	}

	public function eliminarCostoAplicacionTotal($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->delete('ojales_cortesia');
	}


	public function getOjalesCortesia($id_clientes='',$id_tallas='',$id_prendas='',$id_modelos='')
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_prendas', $id_prendas);
		$this->db->where('id_modelos', $id_modelos);
		$res = $this->db->get('ojales_cortesia');
		if($res->num_rows()>0)
		{
			return $res->row()->cantidad;
		}else
		{
			return 0;
		}
	}
	public function getCantidadDeOjalesCortesiaCliente($id_clientes='')
	{
		$this->db->where('id_clientes', $id_clientes);
		$res = $this->db->get('ojales_cortesia');
		if($res->num_rows()>0)
		{
			return $res->num_rows();
		}else
		{
			return 0;
		}
	}
}

/* End of file ojales_cortesia_model.php */
/* Location: ./application/models/ojales_cortesia_model.php */