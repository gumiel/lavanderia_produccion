<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_cuentas extends CI_Controller {

	public function lista()
	{
		$this->load->model('clientes_model');
		$this->load->model('estado_cuentas_model');
		$clientes = $this->clientes_model->getClientes();
		foreach ($clientes as $cliente) {
			$cliente->gestiones = $this->estado_cuentas_model->getGestionesCliente($cliente->id_clientes);
		}
		$data = array('clientes' => $clientes );		
		$this->load->view('estado_cuentas/lista', $data);
	}

	// public function realizar_pago()
	// {
	// 	$data = array('a' => 0);
	// 	$this->load->view('estado_cuentas/lista', $data);
	// }

	public function cuenta($idCliente=0,$gestion=0)
	{
		$this->load->model('estado_cuentas_model');
		$this->load->model('clientes_model');
		$cliente = $this->clientes_model->getCliente($idCliente);
		$cuentas = $this->estado_cuentas_model->getEstadosCuentasClienteGestion($idCliente,$gestion);
		$cuentasTotalAnteriores = $this->estado_cuentas_model->getEstadosCuentasClienteGestionPasada($idCliente,$gestion);
		$data = array('cuentas' => $cuentas, 'cliente'=>$cliente, 'gestion'=>$gestion, 'anterior'=>$cuentasTotalAnteriores);
		$this->load->view('estado_cuentas/cuenta', $data);
	}

	public function realizar_pago()
	{
		$this->load->helper('fechas_helper');
		$this->load->model('clientes_model');
		$clientes = $this->clientes_model->getClientes();
		$data = array('clientes' => $clientes );		
		$this->load->view('estado_cuentas/realizar_pago',$data);
	}

	public function procesarPago()
	{
		$this->form_validation->set_rules('id_cliente', 'Id Cliente', 'trim|required|max_length[12]|xss_clean');
		$this->form_validation->set_rules('detalle', 'Detalle', 'trim|required|max_length[255]|xss_clean');
		$this->form_validation->set_rules('monto', 'Monto', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('n_recibo', 'Numero de Recibo', 'trim|required|max_length[20]|xss_clean');

		if($this->form_validation->run()==true)
		{
			$this->load->model('estado_cuentas_model');
			$datos = array('monto_adeudado' => 0, 
							'monto_pagado' => $this->input->post('monto'), 
							'n_recibo' => $this->input->post('n_recibo'), 
							'fecha_hora' => date('Y-m-d H-i-s'), 
							'tipo_pago' => 1, 
							'detalle' => $this->input->post('detalle'), 
							'id_clientes' => $this->input->post('id_cliente'), 
							);
			$this->estado_cuentas_model->nuevoEstadoCuenta($datos);
			$this->session->set_flashdata('msgSuccess', 'Pago procesado exitosamente');
			redirect('estado_cuentas/lista','location',301);	
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('estado_cuentas/realizar_pago','location',301);
		}
	}

}

/* End of file estado_cuentas.php */
/* Location: ./application/controllers/estado_cuentas.php */