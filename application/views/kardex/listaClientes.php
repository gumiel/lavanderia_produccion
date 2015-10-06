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
                        <h1 class="page-header">KARDEX</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">                        
                        <div class="panel panel-default">
                            <div class="panel-heading">Lista de Kardex</div>
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
                                                            <a href="<?php echo site_url('kardex/mes/'.$cliente->id_clientes.'/'.$cliente->ultimo); ?>" title="Mostrar Kardex" class="" ><i class="fa fa-calendar" style="font-size: 20px"></i> Ultimo Kardex (<?php echo $cliente->ultimo; ?>)</a>
                                                            <a href="<?php echo site_url('kardex/fecha/'.$cliente->id_clientes); ?>" title="Mostrar Kardex" class="" ><i class="fa fa-calendar" style="font-size: 20px"></i> Todos los Kardex</a>                                                            
                                                        
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
