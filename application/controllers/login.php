<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login/index');
	}

	public function procesarLogin()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|min_length[5]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('clave', 'Clave', 'trim|required|min_length[5]|max_length[20]|xss_clean');
		if($this->form_validation->run() == TRUE)
		{			
			if ($this->verificarUsuario($this->input->post('usuario'),$this->input->post('clave')) == true) 
			{
				$this->load->model('usuarios_model');				
				$usuario = $this->usuarios_model->devolverDatosUsuarioLogin($this->input->post('usuario'),$this->input->post('clave'));
				$array = array( 'usuario' => $this->input->post('usuario') , 'id' => $usuario->id_usu );								
				$this->session->set_userdata( $array );				
				redirect('administracion/index','location',301);	
			}else
			{
				$this->session->set_flashdata('msgLogin', 'No existe el Usuario o la contraseña es incorrecta');			
				redirect('login/index','location',301);		
			}
		}else
		{
			$this->session->set_flashdata('msgLogin', validation_errors());			
			redirect('login/index','location',301);			
		}
		
	}
	private function verificarUsuario($usuario='',$clave='')
	{
		$this->load->model('usuarios_model');
		return $this->usuarios_model->verificarUsuario($usuario,$clave);
	}
	
	public function cerrar()
	{
		$this->session->unset_userdata('usuario');
		$this->session->sess_destroy();
		redirect('login/index','location',301);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */