<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function editar()
	{
		$id = $this->session->userdata('id');
		if($id)
		{
			$this->load->model('usuarios_model');
			$usuario = $this->usuarios_model->devolverDatosUsuarioId($id);
			$data = array( 'usuario' => $usuario );
			$this->load->view('usuarios/editar', $data);			
		}else
		{
			redirect('login/cerrar','location',301);
		}
	}

	public function procesarEditarPerfil()
	{
		$this->form_validation->set_rules('nombre_usu', 'Nombre Completo', 'trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('nom_usu', 'Cuenta', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('pass_usu', 'Password', 'trim|required|max_length[20]|xss_clean');

		if($this->form_validation->run() == true)
		{
			$this->load->model('usuarios_model');
			if($this->usuarios_model->verificarPasswordUsuario($this->session->userdata('id'), $this->input->post('pass_usu') ))
			{
				$data = array('nom_usu' => $this->input->post('nom_usu') , 'nombre_usu' => $this->input->post('nombre_usu') );
				$this->usuarios_model->editarUsuario($this->session->userdata('id') , $data);
				$this->session->set_flashdata('msgSuccess', 'Fue modificado sus datos');
				redirect('usuarios/editar','location',301);
			}else{
				$this->session->set_flashdata('msgError', '<b>Error al modificar.</b>No coincide el password  ingresado');
				redirect('usuarios/editar','location',301);
			}
		}else{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('usuarios/editar','location',301);
		}
	}

	public function editarPasswordUsuario()
	{
		$this->form_validation->set_rules('nuevo', 'Password Nuevo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('repetir', 'Password repetido', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|xss_clean');

		if($this->form_validation->run() == true)
		{
			$this->load->model('usuarios_model');
			if($this->usuarios_model->verificarPasswordUsuario($this->session->userdata('id'), $this->input->post('password') ))
			{
				if($this->input->post('nuevo') == $this->input->post('repetir'))
				{
					$data = array( 'pass_usu' => md5($this->input->post('nuevo')) );
					// var_dump($data);					
					$this->usuarios_model->editarUsuario($this->session->userdata('id') , $data);
					$this->session->set_flashdata('msgSuccess', 'Fue modificado sus datos del password');
					redirect('usuarios/editar','location',301);
				}else
				{
					$this->session->set_flashdata('msgError', '<b>Error al modificar.</b>El password nuevo no coincide con el password para repetir');
					redirect('usuarios/editar','location',301);
				}
				
			}else{
				$this->session->set_flashdata('msgError', '<b>Error al modificar.</b>No coincide el password  ingresado');
				redirect('usuarios/editar','location',301);
			}
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('usuarios/editar','location',301);
		}
	}

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */