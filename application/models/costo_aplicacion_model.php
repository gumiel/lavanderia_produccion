<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costo_aplicacion_model extends CI_Model {

	public function getDatosAplicacionClientes($idCliente=0)
	{
		$this->db->where('costo_aplicacion.id_clientes', $idCliente);
		$this->db->join('aplicaciones', 'aplicaciones.id_aplicaciones = costo_aplicacion.id_aplicaciones', 'left');
		$this->db->order_by('id_tallas', 'ASC');
		$this->db->order_by('id_prendas', 'ASC');
		$this->db->order_by('id_modelos', 'ASC');
		return $this->db->get('costo_aplicacion')->result();
	}

	public function getDatosAplicacionClienteCosto($id_clientes=0,$id_tallas=0,$id_modelos=0,$id_prendas=0,$id_aplicaciones=0)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);
		$this->db->where('id_aplicaciones', $id_aplicaciones);	
		return $this->db->get('costo_aplicacion')->row();
	}	

	// public function crearCostoAplicacion($data)
	// {	
	// 	// print_r($data);
	// 	$this->db->insert('costo_aplicacion', $data);
	// }

	// public function vaciarCostoAplicacion($idCliente)
	// {
	// 	$this->db->where('id_clientes', $idCliente);
	// 	$this->db->delete('costo_aplicacion');
	// }

	public function crearCostoAplicacion($datos)
	{
		$this->db->insert('costo_aplicacion', $datos);
	}

	public function eliminarCostoAplicacion($id_clientes,$id_tallas,$id_modelos,$id_prendas,$id_aplicaciones)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->where('id_tallas', $id_tallas);
		$this->db->where('id_modelos', $id_modelos);
		$this->db->where('id_prendas', $id_prendas);
		$this->db->where('id_aplicaciones', $id_aplicaciones);
		$this->db->delete('costo_aplicacion');
	}

	public function eliminarCostoAplicacionTotal($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);		
		$this->db->delete('costo_aplicacion');
	}

}

/* End of file costo_aplicacion_model.php */
/* Location: ./application/models/costo_aplicacion_model.php */