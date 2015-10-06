<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	function getCostoPrendaCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();
		$ci->db->where('id_clientes', $idCliente);
		$ci->db->where('id_tallas', $id_tallas);
		$ci->db->where('id_modelos', $id_modelos);
		$ci->db->where('id_prendas', $id_prendas);
		$ci->db->where('id_lavados', $id_lavados);
		$res = $ci->db->get('costo_prenda');
		
		if($res->num_rows()==1)
		{				
			return $res->row()->costo;
		}else
		{
			return false;
		}		

	}

	function getCostoAplicacionCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_aplicaciones)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();
		$ci->db->where('id_clientes', $idCliente);
		$ci->db->where('id_tallas', $id_tallas);
		$ci->db->where('id_modelos', $id_modelos);
		$ci->db->where('id_prendas', $id_prendas);
		$ci->db->where('id_aplicaciones', $id_aplicaciones);
		$res = $ci->db->get('costo_aplicacion');
		
		if($res->num_rows()==1)
		{				
			return $res->row()->costo_bs;
		}else
		{
			return false;
		}		

	}

	function getCantidadOjalesCortesia($idCliente,$id_tallas,$id_modelos,$id_prendas)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();
		$ci->db->where('id_clientes', $idCliente);
		$ci->db->where('id_tallas', $id_tallas);
		$ci->db->where('id_modelos', $id_modelos);
		$ci->db->where('id_prendas', $id_prendas);		
		$res = $ci->db->get('ojales_cortesia');
		
		if($res->num_rows()==1)
		{				
			return $res->row()->cantidad;
		}else
		{
			return false;
		}		

	}

