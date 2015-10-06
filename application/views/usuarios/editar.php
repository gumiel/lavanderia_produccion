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
                        <h1 class="page-header">Perfil de Adminitración</h1>
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
                        <form id="formEditPerfil" name="formEditPerfil" class="form-horizontal" action="<?php echo site_url('usuarios/procesarEditarPerfil'); ?>" method="POST">
                            <div class="form-group">
                                <label for="nombre_usu" class="col-sm-4 control-label">Nombre Completo</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre_usu" name="nombre_usu" value="<?php echo $usuario->nombre_usu ?>">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="nom_usu" class="col-sm-4 control-label">Cuenta</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nom_usu" name="nom_usu" value="<?php echo $usuario->nom_usu ?>">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="pass_usu" class="col-sm-4 control-label">Password Actual</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="pass_usu" name="pass_usu" value="">
                                </div>
                            </div>   
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Editar Datos</button>
                            </div> 
                        </form>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="page-header">Cambiar Password</h3>
                        <form id="formcreateLav" name="formcreateLav" class="form-horizontal" action="<?php echo site_url('usuarios/editarPasswordUsuario'); ?>" method="POST">
                            <div class="form-group">
                                <label for="nuevo" class="col-sm-4 control-label">Password Nuevo</label>
                                <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="nuevo" name="nuevo" value="" >
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="repetir" class="col-sm-4 control-label">Repetir Password Nuevo</label>
                                <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="repetir" name="repetir" value="">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password Actual</label>
                                <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="password" name="password" value="">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Cambiar Password</button>
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
