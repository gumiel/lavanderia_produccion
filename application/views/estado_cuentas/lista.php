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
                        <h1 class="page-header">ESTADO DE CUENTAS</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Clientes para ver el Estado de Cuentas</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr>
                                                <th>Cod.</th>
                                                <th>Nombre y Apellido</th>                                            
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>                                     
                                        <tbody>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <tr class="odd gradeX">
                                                    <td>COD-<?php echo $cliente->id_clientes;?></td>
                                                    <td><?php echo $cliente->nombres.' '.$cliente->apellidos; ?></td>
                                                    <td class="center">
                                                        <!-- Single button -->
                                                        <div class="btn-group">
                                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-folder" style="font-size: 20px;color:#23527c"></i> Estado de Cuenta Gestion<span class="caret" style="font-size: 20px"></span>
                                                          </button>
                                                          <ul class="dropdown-menu">                                                            
                                                            <?php if ($cliente->gestiones): ?>                                                                
                                                                <?php foreach ($cliente->gestiones as $ges): ?>
                                                                    <li><a href="<?php echo site_url('estado_cuentas/cuenta/'.$cliente->id_clientes.'/'.$ges->anio) ?>">Gestion <?php echo $ges->anio ?></a></li>                                                                
                                                                <?php endforeach ?>
                                                            <?php else: ?>
                                                                <li style="background: #F6C2C2;font-size: 12px;padding: 7px;"><div>NO EXISTE GESTIONES PARA ESTE CLIENTE</div></li>
                                                            <?php endif ?>
                                                          </ul>
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
