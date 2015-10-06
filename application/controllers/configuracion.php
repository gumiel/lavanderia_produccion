<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

	public function index()
	{
		
	}

	public function listaLavados()
	{
		$this->load->model('lavados_model');
		$lavados = $this->lavados_model->getLavados();
		$data = array('lavados'=>$lavados );
		$this->load->view('configuracion/listaLavados', $data);
	}

	public function listaAplicaciones($value='')
	{
		$this->load->model('aplicaciones_model');
		$aplicaciones = $this->aplicaciones_model->getAplicaciones();
		$data = array('aplicaciones'=>$aplicaciones );
		$this->load->view('configuracion/listaAplicaciones', $data);
	}


	public function crearAplicacion()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[30]|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$this->load->model('aplicaciones_model');
			$data = array('nombre' => $this->input->post('nombre'), 'fecha' => date('y-m-d') );
			$res = $this->aplicaciones_model->crearAplicacion($data);
			if($res==TRUE)
			{
				$this->session->set_flashdata('msgSuccess', 'Fue Ingresado una Nueva Aplicacion');
				redirect('configuracion/listaAplicaciones','location',301);
			}else
			{
				$this->session->set_flashdata('msgError', "No se creo una la Aplicacion");
				redirect('configuracion/listaAplicaciones','location',301);
			}
		}else
		{
			$this->session->set_flashdata('msgError', "No se creo una la Aplicacion");
			redirect('configuracion/listaAplicaciones','location',301);
		}
	}

	public function crearLavado()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[30]|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$this->load->model('lavados_model');
			$data = array('nombre' => $this->input->post('nombre'), 'fecha' => date('y-m-d') );
			$res = $this->lavados_model->crearLavado($data);
			if($res==TRUE)
			{
				$this->session->set_flashdata('msgSuccess', 'Fue Ingresado un Nuevo Lavado');
				redirect('configuracion/listaLavados','location',301);
			}else
			{
				$this->session->set_flashdata('msgError', "No se creo una Lavado");
				redirect('configuracion/listaLavados','location',301);
			}
		}else
		{
			$this->session->set_flashdata('msgError', "No se creo una Lavado");
			redirect('configuracion/listaLavados','location',301);
		}
	}

	public function editarAplicacion()
	{
		$this->form_validation->set_rules('id_aplicacionesE', 'ID', 'trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('nombreE', 'Nombre', 'trim|required|max_length[30]|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$this->load->model('aplicaciones_model');
			$data = array('nombre' => $this->input->post('nombreE'), 'fecha' => date('y-m-d') );
			$res = $this->aplicaciones_model->editarAplicacion($this->input->post('id_aplicacionesE'),$data);

			if($res==TRUE)
			{
				$this->session->set_flashdata('msgSuccess', 'Fue Ingresado una Nueva Aplicacion');
				redirect('configuracion/listaAplicaciones','location',301);
			}else
			{
				$this->session->set_flashdata('msgError', "No se creo una la Aplicacion");
				redirect('configuracion/listaAplicaciones','location',301);
			}
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('configuracion/listaAplicaciones','location',301);
		}
	}

	public function editarLavado()
	{
		$this->form_validation->set_rules('id_lavadosE', 'ID', 'trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('nombreE', 'Nombre', 'trim|required|max_length[30]|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$this->load->model('lavados_model');
			$data = array('nombre' => $this->input->post('nombreE'), 'fecha' => date('y-m-d') );
			$res = $this->lavados_model->editarLavado($this->input->post('id_lavadosE'),$data);

			if($res==TRUE)
			{
				$this->session->set_flashdata('msgSuccess', 'Fue Ingresado un Lavado');
				redirect('configuracion/listaLavados','location',301);
			}else
			{
				$this->session->set_flashdata('msgError', "No se creo un Lavado");
				redirect('configuracion/listaLavados','location',301);
			}
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('configuracion/listaLavados','location',301);
		}
	}

	public function eliminarAplicacion()
	{
		$this->form_validation->set_rules('id_aplicacionesD', 'ID', 'trim|required|max_length[12]|xss_clean');
		if($this->form_validation->run() == true)
		{
			$this->load->model('aplicaciones_model');
			$this->aplicaciones_model->eliminarAplicacion($this->input->post('id_aplicacionesD'));
			$this->session->set_flashdata('msgSuccess', 'Fue Eliminado la Aplicacion');
			redirect('configuracion/listaAplicaciones','location',301);
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('configuracion/listaAplicaciones','location',301);
		}
	}

	public function eliminarLavado()
	{
		$this->form_validation->set_rules('id_lavadosD', 'ID', 'trim|required|max_length[12]|xss_clean');
		if($this->form_validation->run() == true)
		{
			$this->load->model('lavados_model');
			$this->lavados_model->eliminarLavado($this->input->post('id_lavadosD'));
			$this->session->set_flashdata('msgSuccess', 'Fue Eliminado el Lavado');
			redirect('configuracion/listaLavados','location',301);
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('configuracion/listaLavados','location',301);
		}
	}

	public function devolverAplicacion()
	{
		if( $this->input->post('id_aplicaciones') > 0 )
		{
			$this->load->model('aplicaciones_model');
			$datos = $this->aplicaciones_model->devolverAplicacion($this->input->post('id_aplicaciones'));
			echo json_encode($datos);
		}else
		{
			echo 'false';
		}
	}

	public function devolverLavado()
	{
		if( $this->input->post('id_lavados') > 0 )
		{
			$this->load->model('lavados_model');
			$datos = $this->lavados_model->devolverLavado($this->input->post('id_lavados'));
			echo json_encode($datos);
		}else
		{
			echo 'false';
		}
	}

}

/* End of file configuracion.php */
/* Location: ./application/controllers/configuracion.php */