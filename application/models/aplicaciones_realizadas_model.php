<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplicaciones_realizadas_model extends CI_Model {

	public function ingresarAplicacionRealizadas($idProducion,$idAplicaciones,$costoAplicaciones){
		for ($i=0; $i < count($idAplicaciones) ; $i++) 
		{ 			
			$this->db->insert('aplicaciones_realizadas', array('id_produccion' => $idProducion, 'id_aplicaciones' => $idAplicaciones[$i], 'costo_aplicacion' => $costoAplicaciones[$i]->costo_bs ));
		}
	}

	public function getAplicacionesRealizadas($idProducion=0)
	{
		if($idProducion > 0)
		{
			$this->db->select('nombre,costo_aplicacion');
			$this->db->where('aplicaciones_realizadas.id_produccion', $idProducion);
			$this->db->join('aplicaciones', 'aplicaciones.id_aplicaciones = aplicaciones_realizadas.id_aplicaciones', 'left');
			return $this->db->get('aplicaciones_realizadas')->result_array();
		}else
		{
			return false;
		}
	}

	public function getAplicacionesRealizadasEdit($idProducion=0)
	{
		if($idProducion > 0)
		{
			$this->db->select('nombre, aplicaciones.id_aplicaciones AS id');
			$this->db->where('aplicaciones_realizadas.id_produccion', $idProducion);
			$this->db->join('aplicaciones', 'aplicaciones.id_aplicaciones = aplicaciones_realizadas.id_aplicaciones', 'left');
			return $this->db->get('aplicaciones_realizadas')->result();
		}else
		{
			return false;
		}
	}

	public function vaciarAplicacionesEditar($idProducion=0)
	{
		$this->db->where('id_produccion', $idProducion);
		$this->db->delete('aplicaciones_realizadas');
	}

	public function eliminarAplicacionesRealizadasTotal($id_clientes)
	{                                                                                                                                                                                                                                                                                                                                                                                                                                           
		$sql = "DELETE FROM aplicaciones_realizadas, produccion WHERE  produccion.id_produccion = aplicaciones_realizadas.id_produccion";
		// $this->db->where('produccion.id_clientes', $id_clientes);
		// $this->db->join('produccion', '', 'left');
		$this->db->query($sql);
		// $this->db->delete('aplicaciones_realizadas');
	}

}

/* End of file aplicaciones_realizadas_model.php */
/* Location: ./application/models/aplicaciones_realizadas_model.php */









