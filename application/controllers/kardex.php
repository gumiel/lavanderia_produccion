<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kardex extends CI_Controller {

	public function index()
	{
				
	}

	public function cliente($idCliente=0)
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

		$producciones = $this->produccion_model->getProduccionCliente($idCliente);
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
		
		$this->load->view('kardex/cliente',$data);
	}

	public function listaClientes()
	{
		$this->load->model('clientes_model');
		$this->load->model('produccion_model');

		$clientes = $this->clientes_model->getClientes();
		foreach ($clientes as $cliente) {
			$ultimaFecha = $this->produccion_model->ultimaFechaProduccionRealizada($cliente->id_clientes);
			if($ultimaFecha)
			{
				$fecha = explode('-',$ultimaFecha);
				$cliente->ultimo = $fecha[0].'-'.$fecha[1];				
			}else
			{
				$cliente->ultimo = 0;
			}
		}
		$data = array('clientes' => $clientes );
		$this->load->view('kardex/listaClientes', $data);
	}

	public function fecha($idCliente=0)
	{		
		$this->load->model('clientes_model');
		$cliente = $this->clientes_model->getCliente($idCliente);
		$data = array('idCliente' => $idCliente, 'cliente' => $cliente );
		$this->load->view('kardex/fecha',$data);
	}

	public function mes($idCliente=0,$fecha='')
	{
		if($idCliente > 0 && $fecha !='')
		{
			$this->load->helper('fechas_helper');

			$this->load->model('produccion_model');
			$this->load->model('tipos_model');
			$this->load->model('clientes_model');
			$this->load->model('prendas_model');
			$this->load->model('modelos_model');
			$this->load->model('lavados_model');
			$this->load->model('aplicaciones_model');
			$this->load->model('aplicaciones_realizadas_model');
			$this->load->model('tallas_model');


			$producciones = $this->produccion_model->getProduccionClienteMes($idCliente,$fecha);
			$tipos        = $this->tipos_model->getTipos();
			$clientes     = $this->clientes_model->getClientes();
			$prendas      = $this->prendas_model->getPrendas();
			$tallas       = $this->tallas_model->getTallas();
			$modelos      = $this->modelos_model->getModelos();
			$lavados      = $this->lavados_model->getLavados();
			$aplicaciones = $this->aplicaciones_model->getAplicaciones();
			$arrayFecha   = explode('-',$fecha);
			$cliente      = $this->clientes_model->getCliente($idCliente);

			foreach ($producciones as $produccion) 
			{
				$totalCostoLavados            = $produccion->cantidad * $produccion->costo_lavado;
				$totalCostoLavadosUnidad      = $produccion->costo_lavado;
				$totalCostoAplicaciones       = 0;
				$totalCostoAplicacionesUnidad = 0;

				$idP                                 = $produccion->id_produccion;
				$produccion->realizados              = $this->aplicaciones_realizadas_model->getAplicacionesRealizadas($idP);

				for ($i=0; $i < count($produccion->realizados) ; $i++) 
				{ 
                    $totalCostoAplicacionesUnidad = $totalCostoAplicacionesUnidad + $produccion->realizados[$i]['costo_aplicacion'];
                }

                $totalCostoAplicaciones = $produccion->cantidad * $totalCostoAplicacionesUnidad;

				$produccion->totalCostoLavados            = $totalCostoLavados;
				$produccion->totalCostoLavadosUnidad      = $totalCostoLavadosUnidad;
				$produccion->totalCostoAplicaciones       = $totalCostoAplicaciones;
				$produccion->totalCostoAplicacionesUnidad = $totalCostoAplicacionesUnidad;
			}

			$data  = array('tipos' => $tipos,
					'clientes'     =>$clientes,
					'cliente'     =>$cliente,
					'prendas'      =>$prendas,
					'tallas'       =>$tallas,
					'producciones' =>$producciones,
					'modelos'      =>$modelos,
					'lavados'      =>$lavados,
					'aplicaciones' =>$aplicaciones,
					'mes'          =>devolverMesLiteral($arrayFecha[1]),
					'anio'          =>$arrayFecha[0],
					);
			
			$this->load->view('kardex/cliente',$data);
		}else
		{
			// echo $idCliente.'/'.$fecha;
			redirect('kardex/lista','location',301);
		}
	}

	

}

/* End of file kardex.php */
/* Location: ./application/controllers/kardex.php */