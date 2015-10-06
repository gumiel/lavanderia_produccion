<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costo_prenda extends CI_Controller {

	public function devolverListaLavadoCliente()
	{
		if($this->input->post('id_clientes'))
		{
			$this->load->model('costo_prenda_model');			
			$lavados = $this->costo_prenda_model->devolverListaLavadoCliente($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_modelos'),$this->input->post('id_prendas'));
			if($lavados)
			{
				echo json_encode( array('lavados' => $lavados, 'error' => 0, 'msj'=> '' ));				
			}else
			{
				echo json_encode(array('error' => 1,'msj' => 'No tiene costos de lavado' ));				
			}
		}else
		{
			echo json_encode(array('error' => 1,'msj' => 'No envio un ID' ));
		}
	}

}

/* End of file costo_lavado.php */
/* Location: ./application/controllers/costo_lavado.php */