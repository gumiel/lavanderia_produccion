<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function verificarUsuario($usuario,$clave)
	{		
		$this->db->where('nom_usu', $usuario);
		$this->db->where('pass_usu', md5($clave));
		$res = $this->db->get('usuarios');
		if($res->num_rows() ==1){
			return true;
		}else{
			return false;
		}
	}

	public function devolverDatosUsuarioLogin($usuario,$clave)
	{
		$this->db->where('nom_usu', $usuario);
		$this->db->where('pass_usu', md5($clave));
		$res = $this->db->get('usuarios');
		if($res->num_rows() ==1){
			return $res->row();
		}else{
			return false;
		}
	}

	public function devolverDatosUsuarioId($id)
	{
		$this->db->where('id_usu', $id);		
		$res = $this->db->get('usuarios');
		if($res->num_rows() ==1){
			return $res->row();
		}else{
			return false;
		}
	}

	public function verificarPasswordUsuario($id_usu,$pass_usu)
	{
		$this->db->where('id_usu', $id_usu);
		$this->db->where('pass_usu', md5($pass_usu));
		$res = $this->db->get('usuarios');

		if($res->num_rows()==1)
		{
			return true;
		}else{
			return false;
		}
	}

	public function editarUsuario($id,$data)
	{
		$this->db->where('id_usu', $id);
		$this->db->update('usuarios', $data);
	}
}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */