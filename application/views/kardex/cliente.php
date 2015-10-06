<?php $this->load->view('plantillas/head'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top nuevo" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('plantillas/menu_top'); ?>

            <?php $this->load->view('plantillas/menu'); ?>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">            
                        <h1 class="page-header">Kardex  <?php echo (isset($mes))?'de '.$mes : ''; ?></h1>
                            <?php if ($this->session->flashdata('msgErrorProduccion')): ?>                            
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $this->session->flashdata('msgErrorProduccion'); ?>
                                </div>
                            <?php endif ?>
                            <?php if ($this->session->flashdata('msgSuccessProduccion')): ?>                          
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $this->session->flashdata('msgSuccessProduccion'); ?>
                                </div>
                            <?php endif ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <h3><b>Mes:</b> <?php echo (isset($mes))? $mes.' del '.$anio : ''; ?></h3>
                        <h3><b>Codigo:</b> <?php echo 'COD-'.$cliente->id_clientes; ?></h3>
                        <h3><b>Nombre y Apellido:</b> <?php echo $cliente->nombres.' '.$cliente->apellidos ?></h3>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <h3><b>Cantidad total Lavados:</b> <span id="cantidadTotalK2">0</span></h3>
                        <h3><b>Total Lavado Bs.:</b> <span id="montoTotalK2">0</span></h3>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-12 col-md-12">                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Produccion</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th colspan="3" ></th>
                                                <th colspan="3" class="text-center">DETALLE</th>                                                
                                                <th colspan="3">DETALLE LAVADOS</th>                                                                                                
                                                <th colspan="3">DETALLE APLICACIONES</th>                                                                                                
                                                <th colspan="3" class="text-center">Ojal Excedente</th>                                                
                                                <th></th>                                                                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Nª de Orden</th>
                                                <th class="text-center">Cant.</th>
                                                <th class="text-center">Prenda</th>
                                                <th class="text-center">Talla</th>
                                                <th class="text-center">Modelo</th>
                                                <th class="text-center">Tipo de Lavado</th>
                                                <th class="text-center">P. Unit<br>Bs.</th>
                                                <th class="text-center">Total<br>Bs.</th>
                                                <th class="text-center">Aplicaciones</th>
                                                <th class="text-center">P. Unit<br>Bs.</th>
                                                <th class="text-center">Total<br>Bs.</th>                                                
                                                <th class="text-center">Nº de Ojal</th>                                                
                                                <th class="text-center">P. Unit.<br>Bs.</th>                                                
                                                <th class="text-center">Total<br>Bs.</th>                                                
                                                <th class="text-center">Total Pro.<br>Bs.</th>                                                
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php 

                                                $cantidadTotal = 0;
                                                $totalTotalesMontoLavado = 0;
                                                $totalTotalesMontoAplicacion = 0;
                                                $totalTotalesMontoOjales = 0;
                                                $totalGeneral = 0;

                                                foreach ($producciones as $pro): 


                                                    $cantidadTotal = $cantidadTotal + $pro->cantidad;
                                                    

                                                    /*---------------------------*/
                                                    /*-----Costo lavado----*/
                                                    /*---------------------------*/
                                                    $costoLavado = $pro->costo_lavado;
                                                    $costoTotalLavado = $costoLavado * $pro->cantidad;
                                                    $totalTotalesMontoLavado = $totalTotalesMontoLavado + $costoTotalLavado;

                                                    /*---------------------------*/
                                                    /*-----Costo Aplicaciones----*/
                                                    /*---------------------------*/
                                                    $textAplicacionesRealizadas = '';
                                                    $costoAplicaciones = 0;
                                                    $costoTotalAplicaciones = 0;
                                                    for ($i=0; $i < count($pro->realizados) ; $i++) { 
                                                        $textAplicacionesRealizadas = $textAplicacionesRealizadas.$pro->realizados[$i]['nombre'].'/'.$pro->realizados[$i]['costo_aplicacion'].', ';
                                                        $costoAplicaciones = ($costoAplicaciones+$pro->realizados[$i]['costo_aplicacion']);
                                                    }
                                                    $costoTotalAplicaciones = ($costoAplicaciones*$pro->cantidad);
                                                    $totalTotalesMontoAplicacion = $totalTotalesMontoAplicacion + $costoTotalAplicaciones;
                                                    /*---------------------------*/
                                                    /*--------Costo ojales-------*/
                                                    /*---------------------------*/
                                                    $nOjal = $pro->ojal;
                                                    $nOjalCortesia = $pro->ojal_cortesia;
                                                    $nOjalCaculado = ($nOjal > $nOjalCortesia)? ($nOjal - $nOjalCortesia) : 0 ;
                                                    $costoOjal = $pro->costo_ojal;
                                                    $costoTotalOjal = ( $nOjalCaculado * $costoOjal ) * $pro->cantidad;                                                    
                                                    $totalTotalesMontoOjales = $totalTotalesMontoOjales + $costoTotalOjal;                                                    

                                                    /*---------------------------*/
                                                    /*--Totales por produccion---*/
                                                    /*---------------------------*/
                                                    $totalProduccion = $costoTotalLavado + $costoTotalAplicaciones + $costoTotalOjal;
                                                    $totalGeneral = $totalGeneral + $totalProduccion;

                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php 
                                                        $fecha = explode('-',$pro->fecha_ingreso);    
                                                        echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0]; 
                                                        ?>
                                                    </td>
                                                    <td><?php echo $pro->orden_lavado; ?></td>
                                                    <td class="center"><?php echo $pro->cantidad; ?></td>
                                                    <td class="center"><?php echo $pro->prenda; ?></td>
                                                    <td class="center"><?php echo $pro->talla; ?></td>
                                                    <td class="center"><?php echo $pro->modelo; ?></td>
                                                    <td class="center"><?php echo $pro->lavado ?></td>                                                    
                                                    <td class="text-center" style="background-color: #F2FAFF"><?php echo $costoLavado; ?></td>
                                                    <td class="text-center" style="background-color: #DDF2FF"><?php echo $costoTotalLavado; ?></td>
                                                    <!-- Aplicaciones -->
                                                    <td class="center"><?php echo $textAplicacionesRealizadas;?></td>                                                    
                                                    <td class="text-center" style="background-color: #F2FAFF"><?php echo $costoAplicaciones;?></td>                                                    
                                                    <td class="text-center" style="background-color: #DDF2FF"><?php echo $costoTotalAplicaciones;?></td>                                                    
                                                    <!-- Ojales -->
                                                    <td class="text-center"><?php echo $nOjal; ?><?php echo ($nOjalCortesia >0)?'<br><span style="color:#FCAEAE">(-'.$nOjalCortesia.')</span>':''; ?></td>
                                                    <td class="center" style="background-color: #F2FAFF"><?php echo $costoOjal; ?> </td>
                                                    <td class="center" style="background-color: #DDF2FF"><?php echo $costoTotalOjal; ?></td>
                                                    <!-- Total de todos los costos -->
                                                    <td class="text-center" style="background-color: #D9FCF2"><?php echo $totalProduccion; ?></td>
                                                </tr>                                            
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="background-color: #FFFEF2">
                                                <!-- Cantidad -->
                                                <td colspan="3" align="right">
                                                    Total Cantidad 
                                                    <b><span id="cantidadTotalK"><?php echo $cantidadTotal; ?></span></b>
                                                </td>
                                                <!-- Total totales Costo lavado o tenido -->
                                                <td colspan="6" align="right">
                                                    Total Monto Lavado 
                                                    <b><span id="montoTotalK"><?php echo $totalTotalesMontoLavado; ?></span> Bs</b>
                                                </td>
                                                
                                                <td colspan="3" align="right">
                                                    Total Monto Aplicaciones
                                                    <b><span id="montoTotalK"><?php echo $totalTotalesMontoAplicacion; ?> Bs.</span></b>
                                                </td>
                                                
                                                <td colspan="3" align="right">
                                                    Totales Ojales
                                                    <b><span id="montoTotalK"><?php echo $totalTotalesMontoOjales; ?> Bs.</span></b>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style="background-color: #FFFEF2">
                                                <td colspan="16" align="right">
                                                    <u><b>TOTAL GENERAL Bs. <span id="montoTotalK"><?php echo $totalGeneral ?></span></b></u>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('plantillas/javascript'); ?>

</body>

</html>
