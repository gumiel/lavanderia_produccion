<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	
	public function index()
	{
		
	}

	public function lista()
	{
		$this->load->model('clientes_model');
		$this->load->model('costo_prenda_model');
		$this->load->model('costo_aplicacion_model');
		$this->load->model('costo_ojal_model');
		$this->load->model('ojales_cortesia_model');

		$clientes = $this->clientes_model->getClientes();
		
		foreach ($clientes as $cliente) {
			$cliente->lavados      = $this->costo_prenda_model->getCantidadDePrendasCostoCliente($cliente->id_clientes);
			$cliente->aplicaciones = ($this->costo_aplicacion_model->getDatosAplicacionClientes($cliente->id_clientes))?'existe':'no exite';
			$cliente->ojales       = $this->costo_ojal_model->getDatosOjalClientes($cliente->id_clientes);			
			$cliente->ojalesCortesia       = $this->ojales_cortesia_model->getCantidadDeOjalesCortesiaCliente($cliente->id_clientes);			
		}
		$data = array('clientes' =>$clientes);	

		$this->load->view('clientes/lista',$data);
	}

	public function modalAplicacionesDelCliente()
	{
		$id_clientes = 11; 

		$this->load->model('costo_aplicacion_model');
		
		$this->load->model('tallas_model');
		$this->load->model('prendas_model');
		$this->load->model('modelos_model');
		$this->load->model('aplicaciones_model');

		$res = $this->costo_aplicacion_model->getDatosAplicacionClientes($id_clientes);
		
		$tallas       = $this->tallas_model->getTallas();
		$prendas      = $this->prendas_model->getPrendas();
		$modelos      = $this->modelos_model->getModelos();
		$aplicaciones = $this->aplicaciones_model->getAplicaciones();
		$arrayTallas  = array();
		
		foreach ($res as $apli) 
		{
			$nombreTalla = array('nombre_aplicacion' => $this->tallas_model->devolverTallas($apli->id_tallas)->nombre, 'id_aplicaciones' => $apli->id_aplicaciones );			
			foreach ($tallas as $talla) 
			{
				$talla->id_tallas == $apli->id_tallas;
			}
		}
	}

	public function crear()
	{
		$this->load->model('aplicaciones_model');
		// $this->load->model('lavados_model');

		$aplicaciones = $this->aplicaciones_model->getAplicaciones();
		// $lavados      = $this->lavados_model->getLavados();
		
		$data = array('aplicaciones' => $aplicaciones );
		$this->load->view('clientes/crear',$data);
	}

	public function crear1()
	{
		$this->load->model('aplicaciones_model');
		$this->load->model('lavados_model');
		$this->load->model('modelos_model');
		$this->load->model('prendas_model');		
		$this->load->model('tallas_model');

		$tallas       = $this->tallas_model->getTallas();
		$modelos      = $this->modelos_model->getModelos();
		$prendas      = $this->prendas_model->getPrendas();
		$aplicaciones = $this->aplicaciones_model->getAplicaciones();
		$lavados      = $this->lavados_model->getLavados();
		
		$data = array('aplicaciones' => $aplicaciones, 'lavados' => $lavados, 'tallas' => $tallas, 'modelos' => $modelos, 'prendas' => $prendas );
		$this->load->view('clientes/crear1',$data);
	}

	public function procesarNuevoCliente()
	{
		$this->load->model('clientes_model');				

		$this->form_validation->set_rules('nombres', 'Nombre', 'trim|required|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|min_length[3]|max_length[30]|xss_clean');
		
		
		
		if( $this->form_validation->run() == TRUE && 
			$this->validarAplicacionesNuevo($this->input->post('id_aplicacion'),$this->input->post('costo_aplicacion')) && 
			// $this->validarLavadosNuevo($this->input->post('id_lavado'),$this->input->post('costo_lavado')) && 
			$this->validarOjalNuevo($this->input->post('ojal')))
		{
			$datos = array('nombres' => $this->input->post('nombres'), 'apellidos' => $this->input->post('apellidos'), 'fecha' => date('Y-m-d'));
			$idCliente = $this->clientes_model->crearNuevoCLiente($datos);

			// $this->crearCostoLavado($idCliente,$this->input->post('id_lavado'),$this->input->post('costo_lavado'));
			$this->crearCostoAplicacion($idCliente,$this->input->post('id_aplicacion'),$this->input->post('costo_aplicacion'));
			$this->crearCostoOjal($idCliente,$this->input->post('ojal'));
			// exit();
			
			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente creado el CLiente');
			redirect('clientes/lista','location',301);
		}else{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('clientes/crear','location',301);
		}
	}

	public function editar($idCliente)
	{
		if($idCliente>0)
		{	
			$this->load->model('clientes_model');
			$this->load->model('aplicaciones_model');
			$this->load->model('costo_aplicacion_model');
			$this->load->model('lavados_model');
			$this->load->model('costo_lavado_model');
			$this->load->model('costo_ojal_model');

			$this->load->model('modelos_model');
			$this->load->model('prendas_model');		
			$this->load->model('tallas_model');
			
			$cliente             = $this->clientes_model->getCliente($idCliente);
			$aplicaciones        = $this->aplicaciones_model->getAplicaciones();
			$lavados             = $this->lavados_model->getLavados();
			$lavadosCliente      = $this->costo_lavado_model->getDatosLavadosClientes($idCliente);
			// $aplicacionesCliente = $this->costo_aplicacion_model->getDatosAplicacionClientes($idCliente);
			$ojal                = $this->costo_ojal_model->getDatosOjalClientes($idCliente);

			$tallas       = $this->tallas_model->getTallas();
			$modelos      = $this->modelos_model->getModelos();
			$prendas      = $this->prendas_model->getPrendas();

			// $tabla = $this->generarTablaPrenda($idCliente,$tallas,$modelos,$prendas,$lavados);
			$tabla = $this->generarTablaPrendaSin($tallas,$modelos,$prendas,$lavados,$aplicaciones);
			
			
			$data  = array('cliente' => $cliente, 'lavados' => $lavados, 'aplicaciones' => $aplicaciones , 'lavadosCliente' => $lavadosCliente, 'ojal' => $ojal, 'tallas' => $tallas, 'modelos' => $modelos, 'prendas' => $prendas, 'tabla' => $tabla  );

			$this->load->view('clientes/editar', $data);			
		}else
		{
			redirect('clientes/lista','location',301);
		}
	}

	private function generarTablaPrenda($idCliente,$tallas,$modelos,$prendas,$lavados)
	{
		$this->load->model('costo_prenda_model');

		$arreglo = array();
		foreach ($tallas as $talla) {
			foreach ($modelos as $modelo) {
				foreach ($prendas as $prenda) {
					foreach ($lavados as $lavado) 
					{
						$costo = $this->costo_prenda_model->getCostoPrendaCliente($idCliente,$talla->id_tallas,$modelo->id_modelos,$prenda->id_prendas,$lavado->id_lavados);
						$arreglo[] = array('talla' => $talla, 'modelo' => $modelo, 'prenda' => $prenda, 'lavado' => $lavado, 'costo' => $costo);

					}
				}
			}
		}
		return $arreglo;
	}
	private function generarTablaPrendaSin($tallas,$modelos,$prendas,$lavados,$aplicaciones)
	{
		$this->load->model('costo_prenda_model');
		$this->load->helper('fix_costo_prenda_helper');

		foreach ($tallas as $talla) 
		{
			foreach ($prendas as $prenda) 
			{
				foreach ($modelos as $modelo) 
				{
					// foreach ($lavados as $lavado) 
					// {
					// 	// $echo = $idCliente.','.$talla->id_tallas.','.$modelo->id_modelos.','.$prenda->id_prendas.','.$lavado->id_lavados.'<br>';
					// 	// $costo2 = $this->costo_prenda_model->getCostoPrendaCliente($idCliente,$talla->id_tallas,$modelo->id_modelos,$prenda->id_prendas,$lavado->id_lavados);						
					// 	// $lavado->costo = $echo;
							
					// }
					
					$modelo->lavados      = $lavados;
					$modelo->aplicaciones = $aplicaciones;
				}			
				$prenda->modelos = $modelos;
			}
			$talla->prendas = $prendas;
		}

		return $tallas;
	}

	

	public function costoPrendaEditar($idCliente)
	{
		$this->load->model('costo_prenda_model');

		$tallas  = $this->input->post('tallas');
		$modelos = $this->input->post('modelos');
		$prendas = $this->input->post('prendas');
		$lavados =$this->input->post('lavados');
		$costo = $this->input->post('costo');

		$this->form_validation->set_rules('costo[]', 'Costo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('tallas[]', 'Tallas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('modelos[]', 'Modelos', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('prendas[]', 'Prendas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('lavados[]', 'Lavados', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');

		if($this->form_validation->run() == true)
		{
			for($a=0;$a<count($tallas);$a++)
			{
				for($b=0;$b<count($modelos);$b++)
				{
					for($c=0;$c<count($prendas);$c++)
					{
						for($d=0;$d<count($lavados);$d++)
						{
							$data = array('id_tallas' => $tallas[$a],
											'id_prendas' => $prendas[$c],
											'id_modelos' => $modelos[$b],
											'id_lavados' => $lavados[$d],
											'id_clientes' => $idCliente,
											'costo' => $costo,
											'fecha' => date('Y-m-d H:i:s') );
							$this->costo_prenda_model->eliminarCostoPrenda($idCliente,$tallas[$a],$modelos[$b],$prendas[$c],$lavados[$d]);
							$this->costo_prenda_model->crearCostoPrenda($data);
						}
					}
				}
			}
			// var_dump($lavados);
			// exit;
			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente procesado');
			redirect('clientes/editar/'.$idCliente,'location',301);
		}else
		{			
			$this->session->set_flashdata('msgError', validation_errors());
			$this->session->set_flashdata('msgError1', validation_errors());
			redirect('clientes/editar/'.$idCliente,'location',301);
		}

	}


	public function costoAplicacionEditar($idCliente)
	{
		$this->load->model('costo_aplicacion_model');

		$tallas  = $this->input->post('tallas');
		$modelos = $this->input->post('modelos');
		$prendas = $this->input->post('prendas');
		$aplicaciones =$this->input->post('aplicaciones');
		$costo = $this->input->post('costo');

		$this->form_validation->set_rules('costo[]', 'Costo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('tallas[]', 'Tallas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('modelos[]', 'Modelos', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('prendas[]', 'Prendas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('aplicaciones[]', 'Lavados', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');

		if($this->form_validation->run() == true)
		{
			for($a=0;$a<count($tallas);$a++)
			{
				for($b=0;$b<count($modelos);$b++)
				{
					for($c=0;$c<count($prendas);$c++)
					{
						for($d=0;$d<count($aplicaciones);$d++)
						{
							$data = array('id_tallas' => $tallas[$a],
											'id_prendas' => $prendas[$c],
											'id_modelos' => $modelos[$b],
											'id_aplicaciones' => $aplicaciones[$d],
											'id_clientes' => $idCliente,
											'costo_bs' => $costo,
											'costo_us' => $costo,
											'fecha' => date('Y-m-d H:i:s') );
							$this->costo_aplicacion_model->eliminarCostoAplicacion($idCliente,$tallas[$a],$modelos[$b],$prendas[$c],$aplicaciones[$d]);
							$this->costo_aplicacion_model->crearCostoAplicacion($data);
						}
					}
				}
			}
			// var_dump($aplicaciones);
			// exit;
			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente procesado');
			redirect('clientes/editar/'.$idCliente,'location',301);
		}else
		{			
			$this->session->set_flashdata('msgError', validation_errors());
			$this->session->set_flashdata('msgError1', validation_errors());
			redirect('clientes/editar/'.$idCliente,'location',301);
		}

	}


	public function asignarOjalesCortesia($idCliente)
	{
		$this->load->model('ojales_cortesia_model');

		$tallas  = $this->input->post('tallas');
		$modelos = $this->input->post('modelos');
		$prendas = $this->input->post('prendas');
		$cantidad = $this->input->post('cantidad');

		$this->form_validation->set_rules('tallas[]', 'Tallas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('modelos[]', 'Modelos', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');
		$this->form_validation->set_rules('prendas[]', 'Prendas', 'trim|required|xss_clean|callback__validarArreglosDeEnteros');		
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|max_length[20]|xss_clean');

		if($this->form_validation->run() == true)
		{
			for($a=0;$a<count($tallas);$a++)
			{
				for($b=0;$b<count($modelos);$b++)
				{
					for($c=0;$c<count($prendas);$c++)
					{

						$data = array('id_tallas' => $tallas[$a],
										'id_prendas' => $prendas[$c],
										'id_modelos' => $modelos[$b],										
										'id_clientes' => $idCliente,
										'cantidad' => $cantidad,										
										'fecha' => date('Y-m-d H:i:s') );
						$this->ojales_cortesia_model->eliminarOjalesCortesia($idCliente,$tallas[$a],$modelos[$b],$prendas[$c]);
						$this->ojales_cortesia_model->crearOjalesCortesia($data);
					
					}
				}
			}
			// var_dump($aplicaciones);
			// exit;
			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente procesado');
			redirect('clientes/editar/'.$idCliente,'location',301);
		}else
		{			
			$this->session->set_flashdata('msgError', validation_errors());
			$this->session->set_flashdata('msgError1', validation_errors());
			redirect('clientes/editar/'.$idCliente,'location',301);
		}

	}


	private function validarArreglosDeEnteros($arreglo)
	{	
		$res = true;
		if (is_array($arreglo)) {
		    for ($i=0; $i < count($arreglo) ; $i++) { 
		    	if( $arreglo[$i] > 0 ){
		    		$res = true;
		    	}
		    	else{
		    		$res = false;
		    		break;
		    	}
		    }
		    return $res;
		}else{
			return false;
		}
	}

	public function procesarEditarCliente($idCliente)
	{
		$this->load->model('clientes_model');		
		$this->load->model('costo_lavado_model');
		// $this->load->model('costo_aplicacion_model');		
		$this->load->model('costo_ojal_model');		

		$this->form_validation->set_rules('nombres', 'Nombre', 'trim|required|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|min_length[3]|max_length[30]|xss_clean');		
		
		
		if( $this->form_validation->run() == TRUE && 
			// $this->validarAplicacionesNuevo($this->input->post('id_aplicacion'),$this->input->post('costo_aplicacion')) && 
			// $this->validarLavadosNuevo($this->input->post('id_lavado'),$this->input->post('costo_lavado')) &&
			$this->validarOjalNuevo($this->input->post('ojal')))
		{
			$datos = array('nombres' => $this->input->post('nombres'), 'apellidos' => $this->input->post('apellidos'), 'fecha' => date('Y-m-d'));			
			$this->clientes_model->editarCLiente($idCliente,$datos);

			// $this->costo_lavado_model->vaciarCostoLavado($idCliente);
			// $this->costo_aplicacion_model->vaciarCostoAplicacion($idCliente);
			$this->costo_ojal_model->vaciarCostoOjal($idCliente);

			// $this->crearCostoLavado($idCliente,$this->input->post('id_lavado'),$this->input->post('costo_lavado'));
			// $this->crearCostoAplicacion($idCliente,$this->input->post('id_aplicacion'),$this->input->post('costo_aplicacion'));
			$this->crearCostoOjal($idCliente,$this->input->post('ojal'));
			// print_r($this->input->post('costo_aplicacion'));
			
			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente editado el CLiente');
			redirect('clientes/lista','location',301);
		}else{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('clientes/editar/'.$idCliente,'location',301);
		}
	}

	private function crearCostoLavado($idCliente,$id,$lavado)
	{				
		$this->load->model('costo_lavado_model');
		for ($i=0; $i < count($lavado) ; $i++) { 
			if( $id[$i] > 0 && $lavado[$i] >= 0 )
			{							
				$data = array('id_clientes' => $idCliente, 'id_lavados' => $id[$i], 'costo_bs' => $lavado[$i], 'costo_us' => $lavado[$i] );
				$this->costo_lavado_model->crearCostoLavado($data);						
			}
		}
	}

	private function crearCostoAplicacion($idCliente,$id,$aplicacion)
	{				
		$this->load->model('costo_aplicacion_model');
		for ($i=0; $i < count($aplicacion) ; $i++) { 
			if( $id[$i] > 0 && $aplicacion[$i] >= 0 )
			{				
				$data = array('id_clientes' => $idCliente, 'id_aplicaciones' => $id[$i], 'costo_bs' => $aplicacion[$i], 'costo_us' => $aplicacion[$i] );
				$this->costo_aplicacion_model->crearCostoAplicacion($data);						
			}
		}
	}

	private function crearCostoOjal($idCliente,$ojal)
	{				
		$this->load->model('costo_ojal_model');
		$data = array('id_clientes' => $idCliente, 'costo_bs' => $ojal, 'costo_us' => $ojal );		
		$this->costo_ojal_model->crearCostoOjal($data);
	}

	public function validarAplicacionesNuevo($ides,$aplicaciones)
	{
		$bandera = false;
		$bandera1 = false;

		for ($i=0; $i < count($ides) ; $i++) { 
			if($ides[$i]>0 || $ides[$i] == ''){
				$bandera = true;
			}else{
				$bandera = false;
				break;
			}
		}
		for ($i=0; $i < count($aplicaciones) ; $i++) { 
			if($aplicaciones[$i] >= 0 || $aplicaciones[$i] == ''){
				$bandera1 = true;
			}else{
				$bandera1 = false;
				break;
			}
		}
		return ($bandera && $bandera1);
	}

	public function validarLavadosNuevo($ides,$lavados)
	{
		$bandera = false;
		$bandera1 = false;

		for ($i=0; $i < count($ides) ; $i++) { 
			if($ides[$i]>0 || $ides[$i] == ''){
				$bandera = true;
			}else{
				$bandera = false;
				break;
			}
		}
		for ($i=0; $i < count($lavados) ; $i++) { 
			if($lavados[$i] >=0 || $lavados[$i] == ''){
				$bandera1 = true;
			}else{
				$bandera1 = false;
				break;
			}
		}
		return ($bandera && $bandera1);
	}

	public function validarOjalNuevo($ojal)
	{
		if($ojal>=0)
		{
			return true;
		}else
		{
			return false;
		}
	}

	public function eliminarCliente()
	{
		$this->form_validation->set_rules('id_clientesD', 'ID', 'trim|required|max_length[20]|xss_clean');
		if($this->form_validation->run() == true)
		{
			$id_clientes = $this->input->post('id_clientesD');

			$this->load->model('clientes_model');
			$this->clientes_model->eliminarCliente($id_clientes);

			$this->load->model('costo_aplicacion_model');
			$this->costo_aplicacion_model->eliminarCostoAplicacionTotal($id_clientes);

			// $this->load->model('costo_ojal_model');
			// $this->costo_ojal_model->eliminarOjalesCortesiaTotal($id_clientes);

			$this->load->model('costo_prenda_model');
			$this->costo_prenda_model->eliminarCostoPrendaTotal($id_clientes);

			$this->load->model('estado_cuentas_model');
			$this->estado_cuentas_model->eliminarEstadoCuentasTotal($id_clientes);

			$this->load->model('ojales_cortesia_model');
			$this->ojales_cortesia_model->eliminarCostoAplicacionTotal($id_clientes);

			$this->load->model('aplicaciones_realizadas_model');
			$this->aplicaciones_realizadas_model->eliminarAplicacionesRealizadasTotal($id_clientes);

			$this->load->model('produccion_model');
			$this->produccion_model->eliminarProduccionTotal($id_clientes);

			$this->session->set_flashdata('msgSuccess', 'Fue Correctamente eliminado el Cliente');
			redirect('clientes/lista','location',301);		
		}else
		{
			$this->session->set_flashdata('msgError', validation_errors());
			redirect('clientes/editar/'.$idCliente,'location',301);
		}
	}

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */