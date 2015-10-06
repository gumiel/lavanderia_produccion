<?php $this->load->view('plantillas/head'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top nuevo" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('plantillas/menu_top'); ?>

            <?php $this->load->view('plantillas/menu'); ?>
        </nav>
        <?php $this->load->view('clientes/widget_eliminar'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Clientes</h1>
                            <?php if ($this->session->flashdata('msgError')): ?>                            
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $this->session->flashdata('msgError'); ?>
                                </div>
                            <?php endif ?>
                            <?php if ($this->session->flashdata('msgSuccess')): ?>                          
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $this->session->flashdata('msgSuccess'); ?>
                                </div>
                            <?php endif ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <p>                                
                                <a class="btn btn-primary btn-lg" href="<?php echo site_url('clientes/crear') ?>">Nuevo/a Cliente</a>
                            </p>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Clientes</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Costo<br>Ojal</th>
                                                <th>Ojal<br>Cortesia</th>
                                                <th>Costo<br>Lavado</th>                                                
                                                <th>Costo<br>Aplicacion</th>                                                
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <tr class="odd gradeX">
                                                    <td>COD-<?php echo $cliente->id_clientes;?></td>
                                                    <td><?php echo $cliente->nombres.' '.$cliente->apellidos; ?></td>
                                                    <td>
                                                        <?php 
                                                            $color = ($cliente->ojales->costo_us == 0)? ' style="color:red" ':'';
                                                            echo (isset($cliente->ojales->costo_us) && $cliente->ojales->costo_us != 0 ) ? $cliente->ojales->costo_us.' bs C/U' : '<span '.$color.'>0 bs</span> C/U' ; 
                                                        ?> 
                                                    </td>
                                                    <td style="text-align: center">
                                                        <?php 
                                                            echo (isset($cliente->ojalesCortesia) && $cliente->ojalesCortesia > 0 ) ? '<span style="background-color:green" class="badge"><i style="color:white" class="fa fa-check"></i></span>':'<i style="color:red" class="fa fa-times"> </i><span style="display: inline-block;font-size: 10px !important;margin-left: 5px;vertical-align: top;">No se asigno<br>Ninguno</span> ';
                                                        ?> 
                                                    </td>
                                                    <td style="text-align: center">
                                                        <?php
                                                            echo ( isset($cliente->lavados) && $cliente->lavados > 0 )? '<span style="background-color:green" class="badge"><i style="color:white" class="fa fa-check"></i></span>':'<i style="color:red" class="fa fa-times"> </i><span style="display: inline-block;font-size: 10px !important;margin-left: 5px;vertical-align: top;">No se asigno<br>Ninguno</span> ';                                                            
                                                        ?>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <?php
                                                            echo ($cliente->aplicaciones == 'existe')? '<span style="background-color:green" class="badge"><i style="color:white" class="fa fa-check"></i></span>':'<i style="color:red" class="fa fa-times"> </i><span style="display: inline-block;font-size: 10px !important;margin-left: 5px;vertical-align: top;">No se asigno<br>Ninguno</span> ';
                                                        ?>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="botoneraLista">                                                            
                                                            <a href="<?php echo site_url('clientes/editar/'.$cliente->id_clientes) ?>" title="Opcion para Editar" class="genBotonOpcion" ><i class="fa fa-edit" style="font-size: 20px"></i></a>
                                                            <a href="#" title="Opcion para Eliminar" class="genBotonOpcion modalEliminarCli" data-idc="<?php echo $cliente->id_clientes; ?>"  ><i class="fa fa-times" style="font-size: 20px"></i></a>                                                            
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
