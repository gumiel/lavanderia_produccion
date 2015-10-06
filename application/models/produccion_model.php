<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion_model extends CI_Model {

	public function getProduccion()
	{	
		$this->db->select('*, tipos_produccion.nombre AS tipo,
			clientes.nombres AS nombres,
			clientes.apellidos AS apellidos,
			prendas.nombre AS prenda,
			tallas.nombre AS talla,
			modelos.nombre AS modelo,
			lavados.nombre AS lavado,		
			');
		$this->db->join('tipos_produccion', 'tipos_produccion.id_tipos = produccion.id_tipos', 'left');
		$this->db->join('clientes', 'clientes.id_clientes = produccion.id_clientes', 'left');
		$this->db->join('prendas', 'prendas.id_prendas = produccion.id_prendas', 'left');
		$this->db->join('tallas', 'tallas.id_tallas = produccion.id_tallas', 'left');
		$this->db->join('modelos', 'modelos.id_modelos = produccion.id_modelos', 'left');
		$this->db->join('lavados', 'lavados.id_lavados = produccion.id_lavados', 'left');
		$this->db->order_by('id_produccion', 'desc');
		return $this->db->get('produccion')->result();
	}	

	public function getProduccionCliente($idCliente)
	{	
		$this->db->select('*, tipos_produccion.nombre AS tipo,
			clientes.nombres AS nombres,
			clientes.apellidos AS apellidos,
			prendas.nombre AS prenda,
			tallas.nombre AS talla,
			modelos.nombre AS modelo,
			lavados.nombre AS lavado,		
			');
		$this->db->join('tipos_produccion', 'tipos_produccion.id_tipos = produccion.id_tipos', 'left');
		$this->db->join('clientes', 'clientes.id_clientes = produccion.id_clientes', 'left');
		$this->db->join('prendas', 'prendas.id_prendas = produccion.id_prendas', 'left');
		$this->db->join('tallas', 'tallas.id_tallas = produccion.id_tallas', 'left');
		$this->db->join('modelos', 'modelos.id_modelos = produccion.id_modelos', 'left');
		$this->db->join('lavados', 'lavados.id_lavados = produccion.id_lavados', 'left');
		$this->db->where('produccion.id_clientes', $idCliente);
		return $this->db->get('produccion')->result();
	}

	public function getProduccionClienteMes($idCliente,$mes)
	{	
		$this->db->select('*, tipos_produccion.nombre AS tipo,
			clientes.nombres AS nombres,
			clientes.apellidos AS apellidos,
			prendas.nombre AS prenda,
			tallas.nombre AS talla,
			modelos.nombre AS modelo,
			lavados.nombre AS lavado,		
			');
		$this->db->join('tipos_produccion', 'tipos_produccion.id_tipos = produccion.id_tipos', 'left');
		$this->db->join('clientes', 'clientes.id_clientes = produccion.id_clientes', 'left');
		$this->db->join('prendas', 'prendas.id_prendas = produccion.id_prendas', 'left');
		$this->db->join('tallas', 'tallas.id_tallas = produccion.id_tallas', 'left');
		$this->db->join('modelos', 'modelos.id_modelos = produccion.id_modelos', 'left');
		$this->db->join('lavados', 'lavados.id_lavados = produccion.id_lavados', 'left');
		$this->db->like('produccion.fecha_ingreso', $mes, 'after'); 
		$this->db->where('produccion.id_clientes', $idCliente);
		return $this->db->get('produccion')->result();
	}	

	public function crearProduccion($datos)
	{
		$this->db->insert('produccion', $datos);
		if($this->db->affected_rows()==1)		
			return $this->db->insert_id();
		else		
			return 0;		
	}

	public function getProduccionUnique($id)
	{
		$this->db->select('*, lavados.nombre AS nombre_lavado, tipos_produccion.nombre AS nombre_tipo, prendas.nombre AS nombre_prenda, tallas.nombre AS nombre_talla, modelos.nombre AS nombre_modelo, clientes.nombres AS nombre_cliente, clientes.apellidos AS apellido_cliente');
		$this->db->where('id_produccion', $id);
		$this->db->join('lavados', 'lavados.id_lavados = produccion.id_lavados', 'left');
		$this->db->join('tipos_produccion', 'tipos_produccion.id_tipos = produccion.id_tipos', 'left');
		$this->db->join('prendas', 'prendas.id_prendas = produccion.id_prendas', 'left');
		$this->db->join('tallas', 'tallas.id_tallas = produccion.id_tallas', 'left');
		$this->db->join('modelos', 'modelos.id_modelos = produccion.id_modelos', 'left');
		$this->db->join('clientes', 'clientes.id_clientes = produccion.id_clientes', 'left');
		$res = $this->db->get('produccion');
		if($res->num_rows() == 1)
			return $res->result();
		else
			return false;
		
	}

	public function editarProduccion($id=0,$datos='')
	{
		$this->db->where('id_produccion', $id);
		$this->db->update('produccion', $datos);
	}

	public function eliminarProduccion($idProduccion=0)
	{
		if($idProduccion>0)
		{	
			$this->db->where('id_produccion', $idProduccion);
			$this->db->delete('produccion');
		}
	}

	public function eliminarProduccionTotal($id_clientes)
	{
		if($id_clientes>0)
		{	
			$this->db->where('id_clientes', $id_clientes);
			$this->db->delete('produccion');
		}
	}

	public function verificarOrdenLavadoRepetido($orden_lavado)
	{
		$this->db->where('orden_lavado', $orden_lavado);
		$res =$this->db->get('produccion');				
		return ($res->num_rows() > 0) ? 'ya existe' : 'no existe' ;
	}
	
	public function verificarOrdenLavadoRepetidoEdit($orden_lavado,$id_produccion)
	{
		$this->db->where('orden_lavado', $orden_lavado);
		$this->db->where('id_produccion !=', $id_produccion);
		$res =$this->db->get('produccion');				
		return ($res->num_rows() > 0) ? 'ya existe' : 'no existe' ;
	}

	public function devolverUltimoOrdenLavado()
	{
		$this->db->order_by('id_produccion', 'DESC');
		$res = $this->db->get('produccion');
		if($res->num_rows()>0)
		{
			return $res->row()->orden_lavado;
		}else{
			return '';
		}
	}

	public function ultimaFechaProduccionRealizada($id_clientes=0)
	{
		$sql = "SELECT fecha_ingreso FROM produccion WHERE id_clientes='".$id_clientes."' ORDER BY fecha_ingreso DESC LIMIT 1";
		$res = $this->db->query($sql);
		if($res->num_rows() >0)		
			return $res->row()->fecha_ingreso;
		else		
			return false;
		
	}

}

/* End of file produccion_model.php */
/* Location: ./application/models/produccion_model.php */