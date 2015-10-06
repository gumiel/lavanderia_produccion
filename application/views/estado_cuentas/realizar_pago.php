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
                        <h1 class="page-header">Realizar Pago</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">   
                        <form method="POST" action="<?php echo site_url('estado_cuentas/procesarPago') ?>" class="form form-horizontal" name="formClientePago" id="formClientePago" >                                             
                            <div class="panel panel-default">
                                <div class="panel-heading">Boleta</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nombres" class="col-sm-4 control-label">Fecha y Hora</label>
                                        <div class="col-sm-8">
                                            <div style="display: block;height: 27px;margin-top: 7px;"><?php echo date('d').' de '.devolverMesLiteral(date('m')).' del '.date('y').' a horas '.date('H:i'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombres" class="col-sm-4 control-label">Cliente</label>
                                        <div class="col-sm-8">
                                            <select name="id_cliente" id="id_cliente" class="form-control" required="required">
                                                <?php foreach ($clientes as $cliente): ?>
                                                    <option value="<?php echo $cliente->id_clientes ?>"><?php echo $cliente->nombres.' '.$cliente->apellidos ?></option>                                                    
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos" class="col-sm-4 control-label">Detalle</label>
                                        <div class="col-sm-8">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="detalle" class="detalle" value="Pago por lavado de prendas" checked="checked">
                                                    Pago por lavado de prendas 
                                                </label><br>
                                                <label>
                                                    <input type="radio" name="detalle" class="detalle" value="">
                                                    Otro tipo de pago
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="n_recibo" class="col-sm-4 control-label">Numero de Recibo</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" name="n_recibo" id="n_recibo" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombres" class="col-sm-4 control-label">Monto</label>
                                        <div class="col-sm-2">
                                            <div class="input-group gruLabelCampo">
                                                <input type="text" name="monto" id="monto" class="form-control" value="">
                                                <span class="input-group-addon">Bs.</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                            <button type="submit" class="btn btn-lg btn-primary">Procesar Pago</button>
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
