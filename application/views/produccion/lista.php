<?php $this->load->view('plantillas/head'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top nuevo " role="navigation" >
            <?php $this->load->view('plantillas/menu_top'); ?>

            <?php $this->load->view('plantillas/menu'); ?>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Producción</h1>
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
                
                <?php $this->load->view('produccion/widget_salida'); ?>
                <?php $this->load->view('produccion/widget_crear'); ?>
                <?php $this->load->view('produccion/widget_editar'); ?>
                <?php $this->load->view('produccion/widget_eliminar'); ?>

                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <p>                                
                                <button type="button" class="btn btn-primary btn-lg" id="modalCrear">Nueva Boleta Producción</button>
                            </p>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Producción</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr>
                                                <th>Fecha Ingreso</th>
                                                <th>Orden de Lavado</th>
                                                <th>Orden Trabajo</th>
                                                <th>Tipo</th>
                                                <th>Código Diseño</th>
                                                <th>Cliente</th>
                                                <th>Cantidad</th>
                                                <th>Prenda</th>
                                                <th>Talla</th>
                                                <th>Modelo</th>
                                                <th>Ojal</th>
                                                <th>Total Ojal</th>
                                                <th>Lavado</th>
                                                <th>Aplicaciones</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php foreach ($producciones as $pro): 

                                                    $color = '';
                                                    if($pro->fecha_ingreso && $pro->fecha_salida)
                                                    {
                                                       $color = 'style="background-color: #f2fff3;"';
                                                    }
                                            ?>
                                                <tr class="odd gradeX" <?php echo $color; ?> >
                                                    <td><?php 
                                                        $fecha = explode('-',$pro->fecha_ingreso);    
                                                        echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

                                                        if($pro->fecha_salida)
                                                        {                                                            
                                                            $fechaS = explode('-',$pro->fecha_salida);    
                                                            echo '<br>'.$fechaS[2].'/'.$fechaS[1].'/'.$fechaS[0].'<span class="textSalida">Salida</span>'; 
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $pro->orden_lavado; ?></td>
                                                    <td><?php echo $pro->orden_trabajo; ?></td>
                                                    <td class="center"><?php echo $pro->tipo; ?></td>
                                                    <td class="center"><?php echo $pro->codigo_diseno; ?></td>
                                                    <td class="center"><?php echo $pro->nombres.' '.$pro->apellidos; ?></td>
                                                    <td class="center">
                                                        <?php 
                                                        echo $pro->cantidad;

                                                        if($pro->cantidad_salida)
                                                        {  
                                                            echo '<br>'.$pro->cantidad_salida.'<span class="textSalida"> Salida</span>';
                                                        } 
                                                        ?>
                                                    </td>
                                                    <td class="center"><?php echo $pro->prenda; ?></td>
                                                    <td class="center"><?php echo $pro->talla; ?></td>
                                                    <td class="center"><?php echo $pro->modelo; ?></td>
                                                    <td class="center"><?php echo $pro->ojal; ?></td>
                                                    <td class="center"><?php echo $pro->totalOjales; ?></td>                                                    
                                                    <td class="center"><?php echo $pro->lavado; ?></td>
                                                    <td class="center">
                                                        <?php 

                                                        for ($i=0; $i < count($pro->realizados) ; $i++) { 
                                                            echo $pro->realizados[$i]['nombre'].',';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="center">
                                                        <div class="botoneraLista">
                                                            <a href="javascript:void(0);" data-idp="<?php echo $pro->id_produccion; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Ver" class="modalSalida genBotonOpcion" ><i class="fa fa-eye" style="font-size: 20px"></i></a>
                                                            <a href="javascript:void(0);" data-idp="<?php echo $pro->id_produccion; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Editar" class="modalEditar genBotonOpcion" ><i class="fa fa-edit" style="font-size: 20px"></i></a>
                                                            <a href="javascript:void(0);" data-idp="<?php echo $pro->id_produccion; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Eliminar" class="modalEliminar genBotonOpcion" ><i class="fa fa-times" style="font-size: 20px"></i></a>                                                            
                                                        </div>
                                                    </td>
                                                </tr>                                            
                                            <?php endforeach ?>
                                        </tbody>
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
