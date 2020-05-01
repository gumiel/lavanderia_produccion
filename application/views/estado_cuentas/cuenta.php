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
                        <h1 class="page-header">ESTADO DE CUENTAS POR COBRAR</h1>
                        <h4><b>Gestión:</b> <?php echo $gestion ?></h4>
                        <h4><b>Cliente:</b> <?php echo $cliente->nombres.' '.$cliente->apellidos; ?></h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">ESTADO DE CUENTAS POR COBRAR</div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="1000px">
                                        <thead>
                                            <tr style="background: #258afc none repeat scroll 0 0;color: white;">
                                                <th>Fecha</th>
                                                <th>Detalle</th>                                            
                                                <th>Nº Prendas</th>
                                                <th>Importe Bs.</th>
                                                <th>Nº Recibo</th>
                                                <th>Importe Bs.</th>
                                                <th>Saldo Por Cobrar</th>
                                            </tr>
                                        </thead>                                
                                        <tbody>
                                            <?php  
                                                $totalAdeudado  = (isset($anterior->adeudado))?$anterior->adeudado:0;
                                                $totalPagado    = (isset($anterior->pagado))?$anterior->pagado:0;;
                                                $saldoPorCobrar = $totalAdeudado - $totalPagado;
                                                $totalPrendas   = 0;
                                            ?>
                                             <tr class="odd gradeX" style="background-color:#FFF6DD;text-decoration: underline">
                                                <td><strong>Gestión <?php echo (int)$gestion-1; ?></strong></td>
                                                <td>saldo deuda gestion anterior</td>
                                                <td></td>                                                    
                                                <td><?php echo $totalAdeudado; ?></td>
                                                <td></td>
                                                <td><?php echo $totalPagado; ?></td>
                                                <td><?php echo ($totalAdeudado - $totalPagado); ?></td>                                                    
                                            </tr> 
                                            <?php if ($cuentas): ?>                                                
                                                <?php                                                
                                                        foreach ($cuentas as $cuenta): 
                                                            $saldoPorCobrar = $saldoPorCobrar + $cuenta->monto_adeudado - $cuenta->monto_pagado;
                                                            $totalPrendas   = $totalPrendas + $cuenta->cantidad;
                                                            $totalAdeudado  = $totalAdeudado + $cuenta->monto_adeudado;
                                                            $totalPagado    = $totalPagado + $cuenta->monto_pagado;
                                                ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $cuenta->fecha_hora ?></td>
                                                            <td><?php echo $cuenta->detalle ?></td>
                                                            <td><?php echo $cuenta->cantidad ?></td>                                                    
                                                            <td><?php echo $cuenta->monto_adeudado ?></td>
                                                            <td><?php echo $cuenta->n_recibo; ?></td>
                                                            <td><?php echo $cuenta->monto_pagado ?></td>
                                                            <td><?php echo $saldoPorCobrar; ?></td>                                                    
                                                        </tr>                                            
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="background-color: #E2E2E2">
                                                <th colspan='2'>TOTAL</th>
                                                <th>Cant. <?php echo $totalPrendas ?></th>
                                                <th><?php echo $totalAdeudado ?> Bs.</th>
                                                <th></th>
                                                <th><?php echo $totalPagado ?> Bs.</th>
                                                <th><?php echo ($totalAdeudado-$totalPagado) ?> Bs.</th>
                                            </tr>
                                            <tr>
                                                <th colspan='7'></th>                                                
                                            </tr>
                                            <tr>
                                                <th colspan='5' style="text-align: center">SALDO POR COBRAR GESTIÓN <?php echo $gestion ?></th>                                                
                                                <th colspan='2' style="text-align: center"><?php echo ($totalAdeudado-$totalPagado) ?> Bs.</th>                                                
                                            </tr>
                                        </tfoot>
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
