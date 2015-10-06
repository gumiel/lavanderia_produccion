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
                        <h1 class="page-header">Aplicaciones</h1>
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
                                <a class="btn btn-primary btn-lg" href="#" id="modalCrearAplicacion">Nueva Aplicaciones</a>
                            </p>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Aplicaciones</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th>Nombre de Aplicaccion</th>
                                                <th>Fecha Ultima</th>                                             
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php foreach ($aplicaciones as $aplicacion): ?>
                                                <tr class="odd gradeX">
                                                    <td>A<?php echo $aplicacion->id_aplicaciones;?></td>
                                                    <td><?php echo $aplicacion->nombre; ?></td>
                                                    <td><?php echo $aplicacion->fecha; ?></td>                                                   
                                                    <td class="center">
                                                        <div class="botoneraLista">                                                           
                                                            <a href="javascript:void(0);" data-id="<?php echo $aplicacion->id_aplicaciones;?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Editar" class="modalEditarAplicacion genBotonOpcion" ><i class="fa fa-edit" style="font-size: 20px"></i></a>
                                                            <a href="javascript:void(0);" data-id="<?php echo $aplicacion->id_aplicaciones;?>" data-toggle="tooltip" data-placement="left" data-original-title="Opcion para Eliminar" class="modalEliminarAplicacion genBotonOpcion" ><i class="fa fa-times" style="font-size: 20px"></i></a> 
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
	<?php $this->load->view('configuracion/widget_crear_aplicacion'); ?>
	<?php $this->load->view('configuracion/widget_editar_aplicacion'); ?>
	<?php $this->load->view('configuracion/widget_eliminar_aplicacion'); ?>
    <?php $this->load->view('plantillas/javascript'); ?>

</body>

</html>
