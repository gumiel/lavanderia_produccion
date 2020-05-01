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
                        <h1 class="page-header">Kardex por Meses</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3><b>Código:</b> <?php echo 'COD-'.$cliente->id_clientes; ?></h3>
                        <h3><b>Nombre y Apellido:</b> <?php echo $cliente->nombres.' '.$cliente->apellidos ?></h3>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-01') ?>">
                            <div style="text-align: center">Enero</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-02') ?>">
                            <div style="text-align: center">Febrero</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-03') ?>">
                            <div style="text-align: center">Marzo</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-04') ?>">
                            <div style="text-align: center">Abril</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-05') ?>">
                            <div style="text-align: center">Mayo</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-06') ?>">
                            <div style="text-align: center">Junio</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-07') ?>">
                            <div style="text-align: center">Julio</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-08') ?>">
                            <div style="text-align: center">Agosto</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-09') ?>">
                            <div style="text-align: center">Septiembre</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-10') ?>">
                            <div style="text-align: center">Octubre</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-11') ?>">
                            <div style="text-align: center">Noviembre</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo site_url('kardex/mes/'.$idCliente.'/2015-12') ?>">
                            <div style="text-align: center">Diciembre</div>
                            <i class="fa fa-table fa-fw" style="font-size:140px;margin-left: 26px;"></i>
                        </a>
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
