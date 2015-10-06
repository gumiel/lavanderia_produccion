<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costo_lavado_model extends CI_Model {

	public function getDatosLavadosClientes($idCliente)
	{
		$this->db->where('costo_lavado.id_clientes', $idCliente);		
		$this->db->join('lavados', 'lavados.id_lavados = costo_lavado.id_lavados', 'left');
		return $this->db->get('costo_lavado')->result();
	}

	public function crearCostoLavado($data)
	{
		$this->db->insert('costo_lavado', $data);
	}

	public function vaciarCostoLavado($idCliente)
	{
		$this->db->where('id_clientes', $idCliente);
		$this->db->delete('costo_lavado');
	}

}

/* End of file cosot_lavado_model.php */
/* Location: ./application/models/cosot_lavado_model.php */