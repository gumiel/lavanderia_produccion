<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion extends CI_Controller {

	public function index()
	{
		
	}
	public function lista()
	{	
		$this->load->model('produccion_model');
		$this->load->model('tipos_model');
		$this->load->model('clientes_model');
		$this->load->model('prendas_model');
		$this->load->model('modelos_model');
		$this->load->model('lavados_model');
		$this->load->model('aplicaciones_model');
		$this->load->model('aplicaciones_realizadas_model');
		$this->load->model('tallas_model');

		$producciones = $this->produccion_model->getProduccion();
		$tipos        = $this->tipos_model->getTipos();
		$clientes     = $this->clientes_model->getClientes();
		$prendas      = $this->prendas_model->getPrendas();
		$tallas       = $this->tallas_model->getTallas();
		$modelos      = $this->modelos_model->getModelos();
		$lavados      = $this->lavados_model->getLavados();
		$aplicaciones = $this->aplicaciones_model->getAplicaciones();
		foreach ($producciones as $produccion) 
		{
			$idP = $produccion->id_produccion;
			$produccion->realizados = $this->aplicaciones_realizadas_model->getAplicacionesRealizadas($idP);
			$produccion->totalOjales = $produccion->cantidad * $produccion->ojal;
		}

		$data = array('tipos' => $tipos,
						'clientes'=>$clientes,
						'prendas'=>$prendas,
						'tallas'=>$tallas,
						'producciones'=>$producciones,
						'modelos'=>$modelos,
						'lavados'=>$lavados,
						'aplicaciones'=>$aplicaciones
						);
		$this->load->view('produccion/lista',$data);
	}

	public function crearProduccion()
	{
		$this->load->model('produccion_model');
		$this->load->model('aplicaciones_realizadas_model');
		$this->load->model('costo_ojal_model');
		// $this->load->model('costo_lavado_model');
		$this->load->model('ojales_cortesia_model');
		$this->load->model('costo_aplicacion_model');

		$this->form_validation->set_rules('fecha_ingreso', 'Fecha', 'trim|required|min_length[3]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('orden_lavado', 'Orden Lavado', 'trim|required|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('orden_trabajo', 'Orden Trabajo', 'trim|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_tipos', 'Tipo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('codigo_diseno', 'Codigo Diseño', 'trim|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('id_clientes', 'Cliente', 'trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|max_length[20]|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('id_prendas', 'Prenda', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_tallas', 'Tallas', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_modelos', 'Modelo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('ojal', 'Ojal', 'trim|max_length[10]|xss_clean|is_natural');
		$this->form_validation->set_rules('id_lavados', 'Lavados', 'trim|required|max_length[20]|xss_clean');

		if ($this->form_validation->run() ==TRUE) 
		{
			if($this->verificarExistenciaPrecio($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_modelos'),$this->input->post('id_prendas'),$this->input->post('id_lavados')))
			{	
				$respuesta = $this->verificarOjalesCortesiaValores($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_prendas'),$this->input->post('id_modelos'),$this->input->post('id_aplicaciones'));
				if($respuesta)
				{
					$arrayFecha    = explode('/',$this->input->post('fecha_ingreso'));
					$ojl           = $this->costo_ojal_model->getDatosOjalClientes($this->input->post('id_clientes'));
					$costo_ojal    = $ojl->costo_bs;							
					$ojal_cortesia = $this->ojales_cortesia_model->getOjalesCortesia($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_prendas'),$this->input->post('id_modelos'));												
					$costo_prenda  = $this->getCostoPrendaCliente($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_modelos'),$this->input->post('id_prendas'),$this->input->post('id_lavados'));
						

					$datos = array('fecha_ingreso' => $arrayFecha[2].'-'.$arrayFecha[1].'-'.$arrayFecha[0], 
									'orden_lavado' => $this->input->post('orden_lavado'), 
									'orden_trabajo' => $this->input->post('orden_trabajo'), 
									'id_tipos' => $this->input->post('id_tipos'), 
									'codigo_diseno' => $this->input->post('codigo_diseno'), 
									'id_clientes' => $this->input->post('id_clientes'), 
									'cantidad' => $this->input->post('cantidad'), 
									'id_prendas' => $this->input->post('id_prendas'), 
									'id_tallas' => $this->input->post('id_tallas'), 
									'id_modelos' => $this->input->post('id_modelos'), 
									'ojal' => $this->input->post('ojal'), 
									'costo_ojal' => $costo_ojal, 
									'ojal_cortesia' => $ojal_cortesia, 
									'id_lavados' => $this->input->post('id_lavados'),
									'costo_lavado' => $costo_prenda,
									'cambio_dolar' => 6.95
						);
					$idInsertado = $this->produccion_model->crearProduccion($datos);
					if ($idInsertado > 0) 
					{	
						$arrayIdAplicaciones = $this->input->post('id_aplicaciones');
						$arrayCostoAplicaciones = array();
						
						if($arrayIdAplicaciones)
						{
							for($i=0;$i<count($arrayIdAplicaciones);$i++)
							{
								// $arrayCostoAplicaciones[] = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($this->input->post('id_clientes'),$arrayIdAplicaciones[$i]);
								$arrayCostoAplicaciones[] = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_modelos'),$this->input->post('id_prendas'),$arrayIdAplicaciones[$i]);
							}
							$this->aplicaciones_realizadas_model->ingresarAplicacionRealizadas($idInsertado,$this->input->post('id_aplicaciones'),$arrayCostoAplicaciones);
						}								
						
						$this->crearEstadoCuenta($idInsertado);

						$this->session->set_flashdata('msgSuccessProduccion', 'Fue Ingresado una Nueva Boleta correctamente');
						redirect('produccion/lista','location',301);
					}else
					{
						$this->session->set_flashdata('msgErrorProduccion', "Error al crear una Boleta de produccion");
						redirect('produccion/lista','location',301);
					}
				}else
				{
					$this->session->set_flashdata('msgErrorProduccion', '<b>Error al crear nueva Produccion</b>.<br>No existe un precio asignado a <b>alguna de las Aplicaciones</b> seleccionadas');
					redirect('produccion/lista','location',301);	
				}			
			}else
			{
				$this->session->set_flashdata('msgErrorProduccion', '<b>Error al crear nueva Produccion</b>.<br>No existe un precio asignado a este lavado o teñido');
				redirect('produccion/lista','location',301);
			}
		}else
		{			
			$this->session->set_flashdata('msgErrorProduccion', validation_errors());
			redirect('produccion/lista','location',301);
		}

	}

	public function verificarOrdenLavadoRepetido()
	{		
		$this->load->model('produccion_model');
		$orden_lavado = $this->input->get('orden_lavado');
		$res = $this->produccion_model->verificarOrdenLavadoRepetido($orden_lavado);
		if($res == 'ya existe')
			echo "false";
		else
			echo "true";
	}

	public function verificarOrdenLavadoRepetidoEdit()
	{		
		if($this->input->get('orden_lavadoE') && $this->input->get('id_produccionE') > 0)
		{
			$this->load->model('produccion_model');
			$orden_lavado = $this->input->get('orden_lavadoE');
			$id_produccion = $this->input->get('id_produccionE');
			$res = $this->produccion_model->verificarOrdenLavadoRepetidoEdit($orden_lavado,$id_produccion);
			if($res == 'ya existe')
				echo "false";
			else
				echo "true";			
		}
	}

	public function obtenerProduccion()
	{
		if($this->input->post('id_produccion') > 0)
		{
			$this->load->model('produccion_model');
			$this->load->model('aplicaciones_realizadas_model');
			$res = $this->produccion_model->getProduccionUnique($this->input->post('id_produccion'));
			$res[0]->aplicacionesRealizadas = $this->aplicaciones_realizadas_model->getAplicacionesRealizadasEdit($this->input->post('id_produccion'));
			$arrayDato = explode('-',$res[0]->fecha_ingreso);
			$res[0]->fecha_ingreso = $arrayDato[2].'/'.$arrayDato[1].'/'.$arrayDato[0];
			
			if($res)
			{
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($res);
			}else
			{
				echo json_encode(array('error' => 'No existe un id relacionado' ));		
			}
		}else
		{
			echo json_encode(array('error' => 'No envio el codigo ID' ));
		}
	}

	public function editarProduccion()
	{
		$this->load->model('produccion_model');
		$this->load->model('aplicaciones_realizadas_model');
		$this->load->model('costo_ojal_model');
		$this->load->model('costo_lavado_model');
		$this->load->model('costo_aplicacion_model');
		$this->load->model('ojales_cortesia_model');

		$this->form_validation->set_rules('id_produccionE', 'ID', 'trim|required|max_length[15]|xss_clean');
		$this->form_validation->set_rules('fecha_ingresoE', 'Fecha', 'trim|required|min_length[3]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('orden_lavadoE', 'Orden Lavado', 'trim|required|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('orden_trabajoE', 'Orden Trabajo', 'trim|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_tiposE', 'Tipo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('codigo_disenoE', 'Codigo Diseño', 'trim|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('id_clientesE', 'Cliente', 'trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('cantidadE', 'Cantidad', 'trim|required|max_length[20]|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('id_prendasE', 'Prenda', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_tallasE', 'Tallas', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('id_modelosE', 'Modelo', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('ojalE', 'Ojal', 'trim|required|max_length[10]|xss_clean|is_natural');
		$this->form_validation->set_rules('id_lavadosE', 'Lavados', 'trim|required|max_length[20]|xss_clean');

		if($this->form_validation->run() == true)
		{	
			if($this->verificarExistenciaPrecio($this->input->post('id_clientesE'),$this->input->post('id_tallasE'),$this->input->post('id_modelosE'),$this->input->post('id_prendasE'),$this->input->post('id_lavadosE')))
			{
				$respuesta = $this->verificarOjalesCortesiaValores($this->input->post('id_clientesE'),$this->input->post('id_tallasE'),$this->input->post('id_prendasE'),$this->input->post('id_modelosE'),$this->input->post('id_aplicacionesE'));
				if($respuesta)
				{
					$ojl   = $this->costo_ojal_model->getDatosOjalClientes($this->input->post('id_clientesE'));
					$costo_ojal   = $ojl->costo_bs;	
					$ojal_cortesia = $ojl->ojal_cortesia;			
					$ojal_cortesia = $this->ojales_cortesia_model->getOjalesCortesia($this->input->post('id_clientesE'),$this->input->post('id_tallasE'),$this->input->post('id_prendasE'),$this->input->post('id_modelosE'));
					// $lav          = $this->costo_lavado_model->getDatosLavadosClientes($this->input->post('id_clientesE'));
					// $costo_lavado = $lav[0]->costo_bs;
					$costo_prenda = $this->getCostoPrendaCliente($this->input->post('id_clientesE'),$this->input->post('id_tallasE'),$this->input->post('id_modelosE'),$this->input->post('id_prendasE'),$this->input->post('id_lavadosE'));
					
					$idE = $this->input->post('id_produccionE');
					$arrayFecha = explode('/',$this->input->post('fecha_ingresoE'));
					$datos = array('fecha_ingreso' => $arrayFecha[2].'-'.$arrayFecha[1].'-'.$arrayFecha[0], 
									'orden_lavado' => $this->input->post('orden_lavadoE'), 
									'orden_trabajo' => $this->input->post('orden_trabajoE'), 
									'id_tipos' => $this->input->post('id_tiposE'), 
									'codigo_diseno' => $this->input->post('codigo_disenoE'), 
									'id_clientes' => $this->input->post('id_clientesE'), 
									'cantidad' => $this->input->post('cantidadE'), 
									'id_prendas' => $this->input->post('id_prendasE'), 
									'id_tallas' => $this->input->post('id_tallasE'), 
									'id_modelos' => $this->input->post('id_modelosE'), 
									'ojal' => $this->input->post('ojalE'), 
									'costo_ojal' => $costo_ojal, 
									'id_lavados' => $this->input->post('id_lavadosE'),
									'costo_lavado' => $costo_prenda,
									'ojal_cortesia' => $ojal_cortesia,
									'cambio_dolar' => 6.95
						);
					$this->produccion_model->editarProduccion($idE,$datos);

					$this->aplicaciones_realizadas_model->vaciarAplicacionesEditar($idE);
					
					$arrayIdAplicaciones = $this->input->post('id_aplicacionesE');
					
					$arrayCostoAplicaciones = array();
					
					if($arrayIdAplicaciones)
					{				
						for($i=0;$i<count($arrayIdAplicaciones);$i++)
						{
							// $arrayCostoAplicaciones[] = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($this->input->post('id_clientesE'),$arrayIdAplicaciones[$i]);
							$arrayCostoAplicaciones[] = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($this->input->post('id_clientesE'),$this->input->post('id_tallasE'),$this->input->post('id_modelosE'),$this->input->post('id_prendasE'),$arrayIdAplicaciones[$i]);
						}
						
						$this->aplicaciones_realizadas_model->ingresarAplicacionRealizadas($idE,$this->input->post('id_aplicacionesE'),$arrayCostoAplicaciones);
					}
					$this->editarEstadoCuenta($idE);
					
					$this->session->set_flashdata('msgSuccessProduccion', 'Fue Editado una boleta de Produccion correctamente');
					redirect('produccion/lista','location',301);
				}else
				{
					$this->session->set_flashdata('msgErrorProduccion', '<b>Error al crear nueva Produccion</b>.<br>No existe un precio asignado a <b>alguna de las Aplicaciones</b> seleccionadas');
					redirect('produccion/lista','location',301);	
				}
			}else
			{
				$this->session->set_flashdata('msgErrorProduccion', '<b>Error al crear nueva Produccion</b>.No existe un precio asignado a este lavado o teñido');
				redirect('produccion/lista','location',301);
			}
		}else
		{	
			$this->session->set_flashdata('msgErrorProduccion', validation_errors());
			redirect('/produccion/lista','location',301);
		}
	}

	public function editarSalidaProduccion()
	{
		$this->form_validation->set_rules('id_produccionS', 'ID', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('fecha_salida', 'Fecha Salida', 'trim|required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('cantidad_salida', 'Cantidad Salida', 'trim|required|max_length[10]|xss_clean');
		$this->form_validation->set_rules('observacion', 'Observacion', 'trim|max_length[600]|xss_clean');
		if($this->form_validation->run() == true)
		{
			$this->load->model('produccion_model');
			$id_produccion = $this->input->post('id_produccionS');
			$fecha = explode('/',$this->input->post('fecha_salida'));
			$data = array('fecha_salida'=> $fecha[2].'-'.$fecha[1].'-'.$fecha[0], 'cantidad_salida'=> $this->input->post('cantidad_salida'), 'observacion'=> $this->input->post('observacion') );
			$this->produccion_model->editarProduccion($id_produccion,$data);
			$this->session->set_flashdata('msgSuccessProduccion', 'Fue modificado los datos de Salida');
			redirect('produccion/lista','location',301);
		}else
		{	
			$this->session->set_flashdata('msgErrorProduccion', validation_errors());
			redirect('/produccion/lista','location',301);
		}
	}

	public function eliminarProduccion()
	{		
		$this->load->model('produccion_model');
		$this->load->model('aplicaciones_realizadas_model');
		if($this->input->post('id_produccionD') > 0)
		{
			$this->produccion_model->eliminarProduccion($this->input->post('id_produccionD'));
			$this->aplicaciones_realizadas_model->vaciarAplicacionesEditar($this->input->post('id_produccionD'));
			$this->eliminarEstadoCuenta($this->input->post('id_produccionD'));
			$this->session->set_flashdata('msgSuccessProduccion', 'Eliminacion de Produccion Correctamente');
			redirect('/produccion/lista','location',301);
		}else
		{
			$this->session->set_flashdata('msgErrorProduccion', 'No fue seleccionado un identificador');
			redirect('/produccion/lista','location',301);
		}
	} 

	public function crearEstadoCuenta($idProduccion=0)
	{
		if( $idProduccion > 0 )
		{
			$this->load->model('produccion_model');
			$this->load->model('aplicaciones_realizadas_model');
			$this->load->model('estado_cuentas_model');

			$pro = $this->produccion_model->getProduccionUnique($idProduccion);

			$cantidad        = $pro[0]->cantidad;
			$costoLavado     = $pro[0]->costo_lavado;
			$ojales          = $pro[0]->ojal; //Cantidad de ojales 0,1,2,3,4
			$costoOjal       = $pro[0]->costo_ojal; // Costo de un ojal
			$ojalCortesia    = $pro[0]->ojal_cortesia; // Cantidad de ojales de cortesia 0,1,2,3
			$costoAplicacion = 0;

			$cantOjalesContados = ($ojales >=$ojalCortesia)? ($ojales-$ojalCortesia) : 0;
			$costoOjalesTotal   = ($cantidad*$cantOjalesContados)*$costoOjal;

			$aplicacion = $this->aplicaciones_realizadas_model->getAplicacionesRealizadas($idProduccion);

			for ($i=0; $i < count($aplicacion); $i++) { 
				$costoAplicacion = $costoAplicacion +$aplicacion[$i]['costo_aplicacion'];
			}

			$totalCostoProduccion = $cantidad*($costoLavado+$costoAplicacion)+$costoOjalesTotal;			

			$datos = array('monto_adeudado' => $totalCostoProduccion, 
							'monto_pagado' => 0, 
							'fecha_hora' => $pro[0]->fecha_ingreso, 
							'tipo_pago' => 0, 
							'detalle' => 'Deuda mes de Enero', 
							'id_clientes' => $pro[0]->id_clientes, 
							'id_produccion' => $idProduccion 
							);
			$this->estado_cuentas_model->nuevoEstadoCuenta($datos);
		}
	}

	public function editarEstadoCuenta($idProduccion=0)
	{
		if( $idProduccion > 0 )
		{
			$this->load->model('produccion_model');
			$this->load->model('aplicaciones_realizadas_model');
			$this->load->model('estado_cuentas_model');

			$pro = $this->produccion_model->getProduccionUnique($idProduccion);

			$cantidad        = $pro[0]->cantidad;
			$costoLavado     = $pro[0]->costo_lavado;
			$ojales          = $pro[0]->ojal; //Cantidad de ojales 0,1,2,3,4
			$costoOjal       = $pro[0]->costo_ojal;
			$ojalCortesia    = $pro[0]->ojal_cortesia; // Cantidad de ojales de cortesia 0,1,2,3
			$costoAplicacion = 0;

			$cantOjalesContados = ($ojales >=$ojalCortesia)? ($ojales-$ojalCortesia) : 0;
			$costoOjalesTotal   = ($cantidad*$cantOjalesContados)*$costoOjal;

			$aplicacion = $this->aplicaciones_realizadas_model->getAplicacionesRealizadas($idProduccion);

			for ($i=0; $i < count($aplicacion); $i++) { 
				$costoAplicacion = $costoAplicacion +$aplicacion[$i]['costo_aplicacion'];
			}

			$totalCostoProduccion = $cantidad*($costoLavado+$costoAplicacion)+$costoOjalesTotal;				

			$datos = array('monto_adeudado' => $totalCostoProduccion, 
							'monto_pagado' => 0, 
							'fecha_hora' => $pro[0]->fecha_ingreso, 
							'tipo_pago' => 0, 
							'detalle' => 'Deuda mes de Enero', 
							'id_clientes' => $pro[0]->id_clientes, 
							'id_produccion' => $idProduccion 
							);
			$this->estado_cuentas_model->editarEstadoCuenta($idProduccion,$datos);
		}
	}

	public function eliminarEstadoCuenta($idProduccion=0)
	{
		if( $idProduccion > 0 )
		{
			$this->load->model('estado_cuentas_model');
			$this->estado_cuentas_model->eliminarEstadoCuenta($idProduccion);			
		}
	}

	private function verificarExistenciaPrecio($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados){
		$this->load->model('costo_prenda_model');
		$res = $this->costo_prenda_model->getCostoPrendaCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados);
		
		if($res >= 0 && $res != false)
		{
			return true;
		}else
		{
			return false;
		}
	}

	private function getCostoPrendaCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados){
		$this->load->model('costo_prenda_model');
		return $this->costo_prenda_model->getCostoPrendaCliente($idCliente,$id_tallas,$id_modelos,$id_prendas,$id_lavados);		
	}

	public function verificarCostoLavadoCliente()
	{
		$this->load->model('costo_prenda_model');

		$id_clientes = $this->input->post('id_clientes');
		$id_prendas  = $this->input->post('id_prendas');
		$id_tallas   = $this->input->post('id_tallas');
		$id_modelos  = $this->input->post('id_modelos');
		$id_lavados  = $this->input->post('id_lavados');
		$costo = $this->costo_prenda_model->getCostoPrendaCliente($id_clientes,$id_tallas,$id_modelos,$id_prendas,$id_lavados);	
		
		if($costo >= 0 && $costo!==false)
		{
			$res = array('costo' => $costo, 'success' => 1, 'error' => 0, 'msg' => 'Correcto' );
			echo json_encode($res);
		}else
		{
			$res = array('costo' => '', 'success' => 0, 'error' => 1, 'msg' => "$id_clientes,$id_tallas,$id_modelos,$id_prendas,$id_lavados -".'El lavado seleccionado segun sus caracteristica no tiene un precio establecido. No podra procesar estos datos.' );
			echo json_encode($res);
		}
	}

	public function devolverUltimoOrdenLavado()
	{
		$this->load->model('produccion_model');
		$ordenUltimo = $this->produccion_model->devolverUltimoOrdenLavado();
		echo ( (int)$ordenUltimo+1 );
	}

	public function devolverValorOjalesCortesia()
	{		
		$this->load->model('costo_aplicacion_model');		
		$res = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($this->input->post('id_clientes'),$this->input->post('id_tallas'),$this->input->post('id_modelos'),$this->input->post('id_prendas'),$this->input->post('id_aplicaciones'));		
		if($res){
			echo $res->costo_bs;
		}else{
			echo "Sin Valor";
		}
	}

	private function verificarOjalesCortesiaValores($id_clientes=0,$id_tallas=0,$id_prendas=0,$id_modelos=0,$arreglo_id_aplicaciones)
	{
		if($arreglo_id_aplicaciones)
		{
			$return = false;
			$this->load->model('costo_aplicacion_model');
			for ($i=0; $i < count($arreglo_id_aplicaciones) ; $i++) 
			{ 
				$res = $this->costo_aplicacion_model->getDatosAplicacionClienteCosto($id_clientes,$id_tallas,$id_modelos,$id_prendas,$arreglo_id_aplicaciones[$i]);		
				if($res)
				{
					$return = true;					
				}else{
					$return = false;		
				}			
			}
			return $return;			
		}
		else{
			return true;
		}		
	}
}

/* End of file produccion.php */
/* Location: ./application/controllers/produccion.php */