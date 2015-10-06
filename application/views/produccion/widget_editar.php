                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Boleta de Produccion</h4>
                      </div>
                      <form id="formEditPro" name="formProduccion" class="form-horizontal fixed-formulario" action="<?php echo site_url('produccion/editarProduccion'); ?>" method="POST">
                        <div class="modal-body">
                              <div class="form-group">
                                  <label for="fecha_ingresoE" class="col-sm-4 control-label">Fecha Ingreso</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="fecha_ingresoE" name="fecha_ingresoE" placeholder="Ejm. 31/07/2015" value="<?php echo date("d/m/Y"); ?>">
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for=" orden_lavadoE" class="col-sm-4 control-label">Orden Lavado</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="orden_lavadoE" name="orden_lavadoE" placeholder="Ejm. 037841">
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="orden_trabajoE" class="col-sm-4 control-label">Orden Trabajo</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="orden_trabajoE" name="orden_trabajoE" placeholder="Ejm. 11845">
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="id_tiposE" class="col-sm-4 control-label">Tipo</label>
                                  <div class="col-sm-8">
                                    <select name="id_tiposE" id="id_tiposE" class="form-control">
                                      <?php foreach ($tipos as $tipo): ?>                                      
                                        <option value="<?php echo $tipo->id_tipos; ?>"><?php echo $tipo->nombre ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="codigo_disenoE" class="col-sm-4 control-label">Codigo Diseño</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="codigo_disenoE" name="codigo_disenoE" placeholder="Ejm. 122-0258-15">
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label for="id_clientesE" class="col-sm-4 control-label">Cliente</label>
                                  <div class="col-sm-8">
                                    <select name="id_clientesE" id="id_clientesE" class="form-control">
                                      <?php foreach ($clientes as $cliente): ?>                                    
                                        <option value="<?php echo $cliente->id_clientes ?>"><?php echo $cliente->nombres.' '.$cliente->apellidos; ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>      
                              <div class="form-group">
                                  <label for="cantidadE" class="col-sm-4 control-label">Cantidad</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cantidadE" name="cantidadE" placeholder="Ejm. 100">
                                  </div>
                              </div>     
                              <div class="form-group">
                                  <label for="id_prendasE" class="col-sm-4 control-label">Prenda</label>
                                  <div class="col-sm-8">
                                    <select name="id_prendasE" id="id_prendasE" class="form-control">
                                      <?php foreach ($prendas as $prenda): ?>
                                        <option value="<?php echo $prenda->id_prendas ?>"><?php echo $prenda->nombre; ?></option>                                      
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_tallasE" class="col-sm-4 control-label">Talla</label>
                                  <div class="col-sm-8">
                                    <select name="id_tallasE" id="id_tallasE" class="form-control">
                                      <?php foreach ($tallas as $talla): ?>
                                        <option value="<?php echo $talla->id_tallas ?>"><?php echo $talla->nombre; ?></option>                                      
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_modelosE" class="col-sm-4 control-label">Modelo</label>
                                  <div class="col-sm-8">
                                    <select name="id_modelosE" id="id_modelosE" class="form-control">
                                      <?php foreach ($modelos as $modelo): ?>
                                        <option value="<?php echo $modelo->id_modelos ?>"><?php echo $modelo->nombre ?></option>                                                                            
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="ojalE" class="col-sm-4 control-label">Ojal</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ojalE" name="ojalE" value="0" placeholder="Ejm. 0">
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="total" class="col-sm-4 control-label">Total</label>
                                  <div class="col-sm-8">
                                    <span id="totalE"><span class="monto">0</span> Ojales</span>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label for="id_lavadosE" class="col-sm-4 control-label">Lavado</label>
                                  <div class="col-sm-8">
                                    <select name="id_lavadosE" id="id_lavadosE" class="form-control">
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
                                              <input class="id_aplicacionesE aplicacionesClienteE" name="id_aplicacionesE[]" type="checkbox" value="<?php echo $aplicacion->id_aplicaciones ?>"><?php echo $aplicacion->nombre ?>
                                              <span></span>
                                          </label>
                                      </div>
                                    <?php endforeach ?>
                                  </div>
                              </div>      
                              <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="alert alert-danger" role="alert" id="msgEditarPro" style="display:none">
                                  </div>
                                </div>                                     
                              </div>                                   
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="id_produccionE" name="id_produccionE" value="" >
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" id="guardarCambiosEdit">Guardar Cambios</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->