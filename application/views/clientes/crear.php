<?php $this->load->view('plantillas/head'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top  nuevo" role="navigation">
            <?php $this->load->view('plantillas/menu_top'); ?>
            <?php $this->load->view('plantillas/menu'); ?>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nuevo/a Cliente</h1>
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
                        <form method="POST" action="<?php echo site_url('clientes/procesarNuevoCliente') ?>" class="form-horizontal" name="formCliente" id="formCliente" >                                             
                            <div class="panel panel-default">
                                <div class="panel-heading">Formulario para la creacion de un Cliente</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nombres" class="col-sm-4 control-label">Nombres del CLiente</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ejm. Juan" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos" class="col-sm-4 control-label">apellidos del Cliente</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ejm.Perez" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-lg-5">
                                            <div class="panel panel-green panel-labelH">
                                                <div class="panel-heading">
                                                    Configuracion del Cliente
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label for="apellidos" class="col-sm-4 control-label">Alerta saldo deuda</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="saldoAlerta" name="saldoAlerta" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="panel panel-green panel-labelH">
                                                <div class="panel-heading">
                                                    Costo por Ojal
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label for="Ojal" class="col-sm-6 control-label">Ojal</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group">                                                                
                                                                <input type="text" class="form-control" id="ojal" name="ojal" placeholder="Ejm. 0.9" value="0">
                                                                <div class="input-group-addon"> Bs.</div>
                                                                <input type="hidden" name="id_ojal">
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>                                        
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                            <button type="submit" class="btn btn-lg btn-primary">Crear Cliente</button>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </form>
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
