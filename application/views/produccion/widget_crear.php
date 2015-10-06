                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document" style="width: 800px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Boleta de Produccion</h4>
                      </div>
                      <form id="formcreatePro" name="formProduccion" class="form-horizontal fixed-formulario" action="<?php echo site_url('produccion/crearProduccion'); ?>" method="POST">
                        <div class="modal-body" style="background-color: #F7F7F7!important">

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                  <label for="fecha_ingreso" class="col-sm-4 control-label">Fecha Ingreso</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="Ejm. 31/07/2015" value="<?php echo date("d/m/Y"); ?>">
                                  </div>
                              </div>                                                          
                              <div class="form-group">
                                  <label for=" orden_lavado" class="col-sm-4 control-label">Orden Lavado</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="orden_lavado" name="orden_lavado" placeholder="Ejm. 037841">
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="orden_trabajo" class="col-sm-4 control-label">Orden Trabajo</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="orden_trabajo" name="orden_trabajo" placeholder="Ejm. 11845">
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="id_tipos" class="col-sm-4 control-label">Tipo</label>
                                  <div class="col-sm-8">
                                    <select name="id_tipos" id="id_tipos" class="form-control">
                                      <?php foreach ($tipos as $tipo): ?>                                      
                                        <option value="<?php echo $tipo->id_tipos; ?>"><?php echo $tipo->nombre ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="codigo_diseno" class="col-sm-4 control-label">Codigo Diseño</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="codigo_diseno" name="codigo_diseno" placeholder="Ejm. 122-0258-15">
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label for="id_clientes" class="col-sm-4 control-label">Cliente</label>
                                  <div class="col-sm-8">
                                    <select name="id_clientes" id="id_clientes" class="form-control">
                                      <?php foreach ($clientes as $cliente): ?>                                    
                                        <option value="<?php echo $cliente->id_clientes ?>"><?php echo $cliente->nombres.' '.$cliente->apellidos; ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>      
                              <div class="form-group">
                                  <label for="cantidad" class="col-sm-4 control-label">Cantidad</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ejm. 100">
                                  </div>
                              </div>     
                              <div class="form-group">
                                  <label for="id_prendas" class="col-sm-4 control-label">Prenda</label>
                                  <div class="col-sm-8">
                                    <select name="id_prendas" id="id_prendas" class="form-control">
                                      <?php foreach ($prendas as $prenda): ?>
                                        <option value="<?php echo $prenda->id_prendas ?>"><?php echo $prenda->nombre; ?></option>                                      
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_tallas" class="col-sm-4 control-label">Talla</label>
                                  <div class="col-sm-8">
                                    <select name="id_tallas" id="id_tallas" class="form-control">
                                      <?php foreach ($tallas as $talla): ?>
                                        <option value="<?php echo $talla->id_tallas ?>"><?php echo $talla->nombre; ?></option>                                      
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_modelos" class="col-sm-4 control-label">Modelo</label>
                                  <div class="col-sm-8">
                                    <select name="id_modelos" id="id_modelos" class="form-control">
                                      <?php foreach ($modelos as $modelo): ?>
                                        <option value="<?php echo $modelo->id_modelos ?>"><?php echo $modelo->nombre ?></option>                                                                            
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="ojal" class="col-sm-4 control-label">Ojal</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ojal" name="ojal" value="0" placeholder="Ejm. 0">
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="total" class="col-sm-4 control-label">Total</label>
                                  <div class="col-sm-8">
                                    <span id="total"><span class="monto">0</span> Ojales</span>
                                  </div>
                              </div>  
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                  <label for="id_lavados" class="col-sm-4 control-label">Lavado</label>
                                  <div class="col-sm-8">
                                    <select name="id_lavados" id="id_lavados" class="form-control">
                                      <?php foreach ($lavados as $lavado): ?>
                                        <option value="<?php echo $lavado->id_lavados ?>"><?php echo $lavado->nombre ?></option>                                        
                                      <?php endforeach ?>                                  
                                    </select>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-sm-4 control-label">Aplicaciones</label>
                                  <div class="col-sm-8">
                                    <?php foreach ($aplicaciones as $aplicacion): ?>
                                      <div class="checkbox">
                                          <label>
                                              <input name="id_aplicaciones[]" type="checkbox" value="<?php echo $aplicacion->id_aplicaciones ?>" class="aplicacionesCliente"><?php echo $aplicacion->nombre ?>
                                              <span></span>
                                          </label>
                                      </div>
                                    <?php endforeach ?>
                                  </div>
                              </div>                                
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-danger" role="alert" id="msgCrearPro" style="display:none">
                            </div>
                          </div>                                     
                        </div> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->