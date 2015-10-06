<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costo_prenda_model extends CI_Model {

	public function crearCostoPrenda($datos)
	{
		$this->db->insert('costo_prenda', $datos);
	}

	public function getCostoPrendaCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados)
	{	
		// echo "$idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados";
		// exit;
		$this->db->where('id_clientes', $idCliente);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);
		$this->db->where('id_lavados', $id_lavados);
		$res = $this->db->get('costo_prenda');		
		
		if($res->num_rows()==1)
		{			
			return $res->row()->costo;
		}else
		{				
			return false;
		}
	}	

	public function getCantidadDePrendasCostoCliente($id_clientes='')
	{
		$this->db->where('id_clientes', $id_clientes);
		$res = $this->db->get('costo_prenda');		
		
		if($res->num_rows() > 0)
		{			
			return $res->num_rows();
		}else
		{				
			return 0;
		}
	}

	public function eliminarCostoPrenda($id_clientes,$id_tallas,$id_modelos,$id_prendas,$id_lavados)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);
		$this->db->where('id_lavados', $id_lavados);
		$this->db->delete('costo_prenda');
	}

	public function eliminarCostoPrendaTotal($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);		
		$this->db->delete('costo_prenda');	
	}

	public function devolverListaLavadoCliente($id_clientes,$id_tallas,$id_modelos,$id_prendas)
	{	
		$this->db->select('costo, costo_us, nombre, costo_prenda.id_lavados AS id_lavados');
		$this->db->join('lavados', 'lavados.id_lavados = costo_prenda.id_lavados', 'left');
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);
		$res = $this->db->get('costo_prenda');
		return $res->result();
	}

}

/* End of file costo_prenda_model.php */
/* Location: ./application/models/costo_prenda_model.php */