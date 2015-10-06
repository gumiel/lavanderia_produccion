<?php $this->load->view('plantillas/head'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top mes" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('plantillas/menu_top'); ?>

            <?php $this->load->view('plantillas/menu'); ?>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Kardex</h1>
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
                    <div class="col-lg-12 col-md-12">                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Produccion</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr>
                                                <th>Fecha Ingreso</th>
                                                <th>Nª de Orden</th>
                                                <th>Cantidad</th>
                                                <th>Prenda</th>
                                                <th>Talla</th>
                                                <th>Modelo</th>
                                                <th>Tipo Lavado</th>




                                                <th>Aplicaciones</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php foreach ($producciones as $pro): ?>
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
                                                    <td class="center"><?php echo $pro->lavado.'-'.$pro->costo_lavado; ?></td>



                                                    
                                                    <td class="center">
                                                        <?php 

                                                        for ($i=0; $i < count($pro->realizados) ; $i++) { 
                                                            echo $pro->realizados[$i]['nombre'].'/'.$pro->realizados[$i]['costo_aplicacion'].', ';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="center">
                                                        <div class="botoneraLista">
                                                            <a href="#" data-idp="<?php echo $pro->id_produccion; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Editar" class="modalEditar genBotonOpcion" ><i class="fa fa-edit" style="font-size: 20px"></i></a>                                                            
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
