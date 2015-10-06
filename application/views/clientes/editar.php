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
                        <h1 class="page-header">Editar Cliente</h1>
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
                        <form method="POST" action="<?php echo site_url('clientes/procesarEditarCliente/'.$cliente->id_clientes) ?>" class="form-horizontal" name="formClienteEdit" id="formClienteEdit" >                                             
                            <div class="panel panel-default">
                                <div class="panel-heading">Formulario para la editar un Cliente</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nombres" class="col-sm-4 control-label">Nombres del CLiente</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $cliente->nombres ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos" class="col-sm-4 control-label">Apellidos del Cliente</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $cliente->apellidos ?>">
                                        </div>
                                    </div>








                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- ********************* EDITAR DATOS DEL CLIENTE  *************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
                                    <!-- *************************************************************************************************** -->
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
                                                                <input type="text" class="form-control" id="ojal" name="ojal" placeholder="0" value="<?php echo (isset($ojal->costo_bs))? $ojal->costo_bs : '0' ?>">
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
                                            <button type="submit" class="btn btn-lg btn-primary">Editar Cliente</button>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </form>
                    </div>
                </div>














                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- ********************** COMPONENTE TAB ************************************************************* -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <!-- *************************************************************************************************** -->
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tabLavadoAplicacion" aria-controls="tabLavadoAplicacion" role="tab" data-toggle="tab" class="tabFormLavado">Lavados y Aplicaciones</a>
                        </li>
                        <li role="presentation" style="margin-left: 15px;">
                            <a href="#tabOjalesCortesia" aria-controls="tabOjalesCortesia" role="tab" data-toggle="tab" class="tabFormLavado2">Ojales de Cortesia</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active tabContentFormLavado" id="tabLavadoAplicacion">
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- ********************** TAB DE LAVADO Y APLICACIONES************************************************ -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <div class="row">
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- ********************** FORMULARIOS DE LAVADO *************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                                    <form name="costoPrendaEditar" id="costoPrendaEditar" action="<?php echo site_url('clientes/costoPrendaEditar/'.$cliente->id_clientes) ?>" method="POST" class="form-horizontal" role="form">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Costos del Lavado o Teñido</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <?php if ($this->session->flashdata('msgError1')): ?>                            
                                                                    <div class="alert alert-danger alert-dismissable">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                                        <?php echo $this->session->flashdata('msgError1'); ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                                                                <div class="form-group">
                                                                    <div class="col-sm-4 text-right"><b>Cliente</b></div>
                                                                    <div class="col-sm-7">
                                                                        <?php echo $cliente->nombres.' '.$cliente->apellidos ?>
                                                                    </div>
                                                                </div>                                                                                                                                           
                                                                <div class="form-group">
                                                                    <label class="col-sm-4 control-label" for="codigo_diseno">Costo</label>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group input-group">
                                                                            <input class="form-control" type="text" name="costo" id="costo">
                                                                            <span class="input-group-addon"> Bs.</span>
                                                                        </div>   
                                                                    </div>
                                                                </div>
                                                            </div>                                            
                                                        </div>
                                                        <div class="row">   
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de TALLAS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="tallas[]" data-placeholder="Seleccione su TALLA" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($tallas as $talla): ?>
                                                                                
                                                                                <option value="<?php echo $talla->id_tallas ?>"><?php echo $talla->nombre ?></option>
                                                                            
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                             
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de MODELOS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="modelos[]" data-placeholder="Seleccione su MODELO" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($modelos as $modelo): ?>                                                                    
                                                                                <option value="<?php echo $modelo->id_modelos ?>"><?php echo $modelo->nombre ?></option>                                                                
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                       
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de PRENDAS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="prendas[]" data-placeholder="Seleccione su PRENDA" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($prendas as $prenda): ?>
                                                                                
                                                                                <option value="<?php echo $prenda->id_prendas ?>"><?php echo $prenda->nombre ?></option>
                                                                            
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div> 
                                                            </div>  
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipo de LAVADO O TEÑIDO
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="lavados[]" data-placeholder="Seleccione su LAVADO o TEÑIDO" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($lavados as $lavado): ?>
                                                                                
                                                                                <option value="<?php echo $lavado->id_lavados ?>"><?php echo $lavado->nombre ?></option>
                                                                            
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                                <button type="submit" class="btn btn-success">Agregar Costo</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- ********************** FORMULARIOS DE APLICACIONES *************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->                                          
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">  
                                    <form name="costoPrendaEditar" id="costoPrendaEditar" action="<?php echo site_url('clientes/costoAplicacionEditar/'.$cliente->id_clientes) ?>" method="POST" class="form-horizontal" role="form">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Costos de la Aplicacion</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <?php if ($this->session->flashdata('msgError1')): ?>                            
                                                                <div class="alert alert-danger alert-dismissable">
                                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                                    <?php echo $this->session->flashdata('msgError1'); ?>
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                                                            <div class="form-group">
                                                                <div for="nombres" class="col-sm-4 text-right"><b>Cliente</b></div>
                                                                <div class="col-sm-7">
                                                                    <?php echo $cliente->nombres.' '.$cliente->apellidos ?>
                                                                </div>
                                                            </div>                                                                                                                                           
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label" for="codigo_diseno">Costo</label>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group input-group">
                                                                        <input class="form-control" type="text" name="costo" id="costo">
                                                                        <span class="input-group-addon"> Bs.</span>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="row">   
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="panel panel-green panel-labelH">
                                                                <div class="panel-heading">
                                                                    Tipos de TALLAS
                                                                </div>
                                                                <div class="panel-body">
                                                                    <select name="tallas[]" data-placeholder="Seleccione su TALLA" class="chosen-select" multiple tabindex="6">
                                                                        <?php foreach ($tallas as $talla): ?>                                                                
                                                                            <option value="<?php echo $talla->id_tallas ?>"><?php echo $talla->nombre ?></option>                                                            
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>                                             
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="panel panel-green panel-labelH">
                                                                <div class="panel-heading">
                                                                    Tipos de MODELOS
                                                                </div>
                                                                <div class="panel-body">
                                                                    <select name="modelos[]" data-placeholder="Seleccione su MODELO" class="chosen-select" multiple tabindex="6">
                                                                        <?php foreach ($modelos as $modelo): ?>
                                                                            
                                                                            <option value="<?php echo $modelo->id_modelos ?>"><?php echo $modelo->nombre ?></option>
                                                                        
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>                                                   
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="panel panel-green panel-labelH">
                                                                <div class="panel-heading">
                                                                    Tipos de PRENDAS
                                                                </div>
                                                                <div class="panel-body">
                                                                    <select name="prendas[]" data-placeholder="Seleccione su PRENDA" class="chosen-select" multiple tabindex="6">
                                                                        <?php foreach ($prendas as $prenda): ?>
                                                                            
                                                                            <option value="<?php echo $prenda->id_prendas ?>"><?php echo $prenda->nombre ?></option>
                                                                        
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="panel panel-green panel-labelH">
                                                                <div class="panel-heading">
                                                                    Tipo de Aplicacion
                                                                </div>
                                                                <div class="panel-body">
                                                                    <select name="aplicaciones[]" data-placeholder="Seleccione su Aplicacion" class="chosen-select" multiple tabindex="6">
                                                                        <?php foreach ($aplicaciones as $aplicacion): ?>
                                                                            
                                                                            <option value="<?php echo $aplicacion->id_aplicaciones ?>"><?php echo $aplicacion->nombre ?></option>
                                                                        
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                            <button type="submit" class="btn btn-success">Agregar Costo</button>
                                                        </div>
                                                    </div>                                            
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- ********************** TABLA DE LAVADOS Y APLICACIONES *************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <div class="row" style="padding-left: 15px;padding-right: 15px; ">               
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php 
                                    foreach ($tabla as $talla) {                                                                        
                                    ?>
                                        <!-- <div class="collapse in" id="tallaPanel<?php echo $talla->id_tallas ?>"> -->
                                        <div class="panel-group" id="accordion<?php echo $talla->id_tallas ?>" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">

                                                <div class="panel-heading" role="tab" id="headingOne<?php echo $talla->id_tallas ?>">
                                                    <h3 class="panel-title"> 
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion<?php echo $talla->id_tallas ?>" href="#collapseOne<?php echo $talla->id_tallas ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $talla->id_tallas ?>">
                                                          Talla (<?php echo $talla->nombre ?>)
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="collapseOne<?php echo $talla->id_tallas ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body" style="background-color: grey;">


                                                        <?php foreach ($talla->prendas as $prenda): ?>
                                                            <div class="panel-group" id="accordion2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading" role="tab" id="headingOne2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">
                                                                        <h3 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" href="#collapseOne2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">                                                                    
                                                                                Prenda (<?php echo $prenda->nombre ?>)
                                                                            </a>
                                                                        </h3>
                                                                    </div>
                                                                    <div id="collapseOne2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">
                                                                        <div class="panel-body">
                                                                            <!-- <div class="row">                                                         -->
                                                                                <?php foreach ($prenda->modelos as $modelo): ?>
                                                                                    <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">-->
                                                                                    <div class="panel-group" id="accordionModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" role="tablist" aria-multiselectable="true">
                                                                                        <div class="panel panel-success">
                                                                                            <!-- <div class="panel-heading"> -->
                                                                                            <div class="panel-heading" role="tab" id="headingOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                <h3 class="panel-title">
                                                                                                    <a role="button" data-toggle="collapse" data-parent="#accordionModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" href="#collapseOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" aria-expanded="true" aria-controls="collapseOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                        <?php echo $modelo->nombre ?>
                                                                                                    </a>
                                                                                                </h3>
                                                                                            </div>
                                                                                            <div id="collapseOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                <div class="panel-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                                            <h4>Lavados o teñinos</h4>
                                                                                                            <ul class="list-group">
                                                                                                                <?php foreach ($modelo->lavados as $lavado): ?>                                                                
                                                                                                                    <li class="list-group-item">
                                                                                                                        <?php echo $lavado->nombre; 
                                                                                                                                $costo = getCostoPrendaCliente( $cliente->id_clientes,$talla->id_tallas,$modelo->id_modelos,$prenda->id_prendas,$lavado->id_lavados);
                                                                                                                                if($costo!==FALSE)
                                                                                                                                {
                                                                                                                                    if($costo>0)
                                                                                                                                        $color = 'primary';
                                                                                                                                    else
                                                                                                                                        $color = 'warning';
                                                                                                                                }else
                                                                                                                                {
                                                                                                                                    $color = 'danger';
                                                                                                                                    $costo = 'Vacio';
                                                                                                                                }
                                                                                                                        ?>                                                                                
                                                                                                                        <span class="label label-<?php echo $color ?>" style="float:right;padding: 6px;font-size:15px">
                                                                                                                            <?php echo $costo; ?>
                                                                                                                        </span>
                                                                                                                    </li>
                                                                                                                <?php endforeach ?>                                                                    
                                                                                                            </ul>                                                                                            
                                                                                                        </div>   

                                                                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                                            <ul class="list-group">
                                                                                                                <h4>Aplicaciones</h4>
                                                                                                                <?php foreach ($modelo->aplicaciones as $aplicacion): ?>                                                                
                                                                                                                    <li class="list-group-item">
                                                                                                                        <?php echo $aplicacion->nombre; 
                                                                                                                                $costo = getCostoAplicacionCliente( $cliente->id_clientes,$talla->id_tallas,$modelo->id_modelos,$prenda->id_prendas,$aplicacion->id_aplicaciones);
                                                                                                                                if($costo!==FALSE)
                                                                                                                                {
                                                                                                                                    if($costo>0)
                                                                                                                                        $color = 'primary';
                                                                                                                                    else
                                                                                                                                        $color = 'warning';
                                                                                                                                }else
                                                                                                                                {
                                                                                                                                    $color = 'danger';
                                                                                                                                    $costo = 'Vacio';
                                                                                                                                }
                                                                                                                        ?>                                                                                
                                                                                                                        <span class="label label-<?php echo $color ?>" style="float:right;padding: 6px;font-size:15px">
                                                                                                                            <?php echo $costo; ?>
                                                                                                                        </span>
                                                                                                                    </li>
                                                                                                                <?php endforeach ?>                                                                    
                                                                                                            </ul>                                                                                            
                                                                                                        </div>                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach ?>
                                                                            <!-- </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>



                                                    </div>
                                                </div>
                                            </div> 
                                        </div>     

                                    <?php 
                                    } 
                                    ?>                  

                                </div>
                            </div>


















                           

















                        </div>
            
                        <!-- Tab panes -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- ********************** TAB OJALES CORTESIA ************************************************* -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <!-- *************************************************************************************************** -->
                        <div role="tabpanel" class="tab-pane tabContentFormLavado2" id="tabOjalesCortesia">
                            
                             <div class="row">
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- ********************** FORMULARIOS DE OJALES CORTESIA *************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <!-- *************************************************************************************************** -->
                                <style type="text/css">
                                .fix-chosen-select .chosen-container.chosen-container-multi{
                                    width: 100%!important;
                                }
                                .fix-chosen-select .chosen-container.chosen-container-multi .search-field{
                                    width: 100%!important;
                                }
                                .fix-chosen-select .chosen-container.chosen-container-multi input{
                                    width: 100%!important;
                                }
                                </style>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fix-chosen-select"> 
                                    <form name="formOjalCortesia" id="formOjalCortesia" action="<?php echo site_url('clientes/asignarOjalesCortesia/'.$cliente->id_clientes) ?>" method="POST" class="form-horizontal" role="form">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Cantidad de Ojales de Cortesia</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <?php if ($this->session->flashdata('msgError1')): ?>                            
                                                                    <div class="alert alert-danger alert-dismissable">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                                        <?php echo $this->session->flashdata('msgError1'); ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                                                                <div class="form-group">
                                                                    <div class="col-sm-2 text-right"><b>Cliente</b></div>
                                                                    <div class="col-sm-10">
                                                                        <?php echo $cliente->nombres.' '.$cliente->apellidos ?>
                                                                    </div>
                                                                </div>                                                                                                                                           
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="codigo_diseno">Cantidad</label>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group input-group">
                                                                            <input class="form-control" type="text" name="cantidad" id="cantidad">
                                                                            <span class="input-group-addon"> Bs.</span>
                                                                        </div>   
                                                                    </div>
                                                                </div>
                                                            </div>                                            
                                                        </div>
                                                        <div class="row">   
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de TALLAS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="tallas[]" data-placeholder="Seleccione su TALLA" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($tallas as $talla): ?>
                                                                                
                                                                                <option value="<?php echo $talla->id_tallas ?>"><?php echo $talla->nombre ?></option>
                                                                            
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                             
                                                            </div>
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de MODELOS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="modelos[]" data-placeholder="Seleccione su MODELO" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($modelos as $modelo): ?>                                                                    
                                                                                <option value="<?php echo $modelo->id_modelos ?>"><?php echo $modelo->nombre ?></option>                                                                
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                       
                                                            </div>
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="panel panel-green panel-labelH">
                                                                    <div class="panel-heading">
                                                                        Tipos de PRENDAS
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <select name="prendas[]" data-placeholder="Seleccione su PRENDA" class="chosen-select" multiple tabindex="6">
                                                                            <?php foreach ($prendas as $prenda): ?>
                                                                                
                                                                                <option value="<?php echo $prenda->id_prendas ?>"><?php echo $prenda->nombre ?></option>
                                                                            
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div> 
                                                            </div>                                                              
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                                <button type="submit" class="btn btn-success">Agregar Costo</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>








                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- ********************** TABLA DE OJAL CORTESIA *************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <!-- *************************************************************************************************** -->
                            <div class="row" style="padding-left: 15px;padding-right: 15px; ">               
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php 
                                    foreach ($tabla as $talla) {                                                                        
                                    ?>
                                        <!-- <div class="collapse in" id="tallaPanel<?php echo $talla->id_tallas ?>"> -->
                                        <div class="panel-group" id="accordionCortesia<?php echo $talla->id_tallas ?>" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-primary">

                                                <div class="panel-heading" role="tab" id="headingOne<?php echo $talla->id_tallas ?>">
                                                    <h3 class="panel-title"> 
                                                        <a role="button" data-toggle="collapse" data-parent="#accordionCortesia<?php echo $talla->id_tallas ?>" href="#collapseOneCortesia<?php echo $talla->id_tallas ?>" aria-expanded="true" aria-controls="collapseOneCortesia<?php echo $talla->id_tallas ?>">
                                                          Talla (<?php echo $talla->nombre ?>)
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="collapseOneCortesia<?php echo $talla->id_tallas ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body" style="background-color: grey;">


                                                        <?php foreach ($talla->prendas as $prenda): ?>
                                                            <div class="panel-group" id="accordionCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading" role="tab" id="headingOneCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">
                                                                        <h3 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordionCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" href="#collapseOneCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" aria-expanded="true" aria-controls="collapseOneCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">                                                                    
                                                                                Prenda (<?php echo $prenda->nombre ?>)
                                                                            </a>
                                                                        </h3>
                                                                    </div>
                                                                    <div id="collapseOneCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneCortesia2<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?>">
                                                                        <div class="panel-body">
                                                                            <!-- <div class="row">                                                         -->
                                                                                <?php foreach ($prenda->modelos as $modelo): ?>
                                                                                    <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">-->
                                                                                    <div class="panel-group" id="accordionCortModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" role="tablist" aria-multiselectable="true">
                                                                                        <div class="panel panel-success">
                                                                                            <!-- <div class="panel-heading"> -->
                                                                                            <div class="panel-heading" role="tab" id="headingOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                <h3 class="panel-title">
                                                                                                    <a role="button" data-toggle="collapse" data-parent="#accordionCortModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" href="#collapseOneCorteModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" aria-expanded="true" aria-controls="collapseOneCorteModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                        <?php echo $modelo->nombre ?>
                                                                                                    </a>
                                                                                                </h3>
                                                                                            </div>
                                                                                            <div id="collapseOneCorteModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneModelos<?php echo $talla->id_tallas ?><?php echo $prenda->id_prendas ?><?php echo $modelo->id_modelos ?>">
                                                                                                <div class="panel-body">
                                                                                                    <div class="row">                                                                            
                                                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                                                                                            
                                                                                                            <ul class="list-group">
                                                                                                                <li class="list-group-item">                 
                                                                                                                    <b>Ojales de Cortesia</b>                                                                                                                                                       
                                                                                                                    <?php //echo $modelo->nombre; 
                                                                                                                            $costo = getCantidadOjalesCortesia( $cliente->id_clientes,$talla->id_tallas,$modelo->id_modelos,$prenda->id_prendas);
                                                                                                                            if($costo!==FALSE)
                                                                                                                            {
                                                                                                                                if($costo>0)
                                                                                                                                    $color = 'primary';
                                                                                                                                else
                                                                                                                                    $color = 'warning';
                                                                                                                            }else
                                                                                                                            {
                                                                                                                                $color = 'danger';
                                                                                                                                $costo = 'Vacio';
                                                                                                                            }
                                                                                                                    ?>                                                                                
                                                                                                                    <span class="label label-<?php echo $color ?>" style="float:right;padding: 6px;font-size:15px">
                                                                                                                        <?php echo $costo; ?>
                                                                                                                    </span>
                                                                                                                </li>                                                                                    
                                                                                                            </ul>                                                                                            
                                                                                                        </div>                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach ?>
                                                                            <!-- </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>     

                                    <?php 
                                    } 
                                    ?>                  
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
