<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_cuentas_model extends CI_Model {

	public function nuevoEstadoCuenta($datos)
	{
		$this->db->insert('estado_cuentas', $datos);
	}

	public function editarEstadoCuenta($idProduccion,$datos)
	{
		$this->db->where('id_produccion', $idProduccion);
		$this->db->update('estado_cuentas', $datos);		
	}
	public function eliminarEstadoCuenta($idProduccion)
	{
		$this->db->where('id_produccion', $idProduccion);
		$this->db->delete('estado_cuentas');
	}

	public function eliminarEstadoCuentasTotal($id_clientes)
	{
		$this->db->where('id_clientes', $id_clientes);
		$this->db->delete('estado_cuentas');
	}

	public function getEstadosCuentasClienteGestion($idCliente,$gestion)
	{	
		$this->db->where('estado_cuentas.id_clientes', $idCliente);
		$this->db->join('produccion', 'produccion.id_produccion= estado_cuentas.id_produccion', 'left');
		$this->db->order_by('fecha_hora', 'ASC');
		$this->db->like('fecha_hora', $gestion, 'both'); 
		$res = $this->db->get('estado_cuentas');
		if($res->num_rows() > 0)
		{
			return $res->result();
		}else{
			return false;
		}
	}

	public function getEstadosCuentasClienteGestionPasada($idCliente,$gestion)
	{	
		$gestion = (int)$gestion - 1;
		$sql = 'SELECT sum(monto_adeudado)AS adeudado, sum(monto_pagado) AS pagado
				FROM estado_cuentas
				WHERE id_clientes = "'.$idCliente.'" AND YEAR(fecha_hora) <= '.$gestion.'
				GROUP BY id_clientes';
		$res = $this->db->query($sql);

		if($res->num_rows() > 0)
		{
			return $res->row();
		}else{
			return false;
		}
	}

	public function getGestionesCliente($idCliente)
	{
		$query = $this->db->query('SELECT YEAR(fecha_hora) AS anio FROM estado_cuentas WHERE id_clientes ="'.$idCliente.'" GROUP BY YEAR(fecha_hora) ORDER BY fecha_hora DESC');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

}

/* End of file estado_cuentas_model.php */
/* Location: ./application/models/estado_cuentas_model.php */