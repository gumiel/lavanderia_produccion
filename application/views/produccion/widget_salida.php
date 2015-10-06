                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalSalida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ver Boleta de Produccion</h4>
                      </div>
                      <form id="formSalidaPro" name="formSalidaPro" class="form-horizontal fixed-formulario" action="<?php echo site_url('produccion/editarSalidaProduccion'); ?>" method="POST">
                        <div class="modal-body">
                              <div class="form-group">
                                  <label for="fecha_ingresoS" class="col-sm-4 control-label">Fecha Ingreso</label>
                                  <div class="col-sm-8">
                                    <span id="fecha_ingresoS" ></span>
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="orden_lavadoS" class="col-sm-4 control-label">Orden Lavado</label>
                                  <div class="col-sm-8">
                                    <span id="orden_lavadoS"></span>
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="orden_trabajoS" class="col-sm-4 control-label">Orden Trabajo</label>
                                  <div class="col-sm-8">
                                    <span id="orden_trabajoS"></span>
                                  </div>
                              </div>                            
                              <div class="form-group">
                                  <label for="id_tiposS" class="col-sm-4 control-label">Tipo</label>
                                  <div class="col-sm-8">
                                    <span id="nombre_tipo"></span>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="codigo_disenoS" class="col-sm-4 control-label">Codigo Diseño</label>
                                  <div class="col-sm-8">
                                    <span id="codigo_disenoS"></span>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label for="id_clientesS" class="col-sm-4 control-label">Cliente</label>
                                  <div class="col-sm-8">
                                    <span id="clienteS"></span>
                                  </div>
                              </div>      
                              <div class="form-group">
                                  <label for="cantidadS" class="col-sm-4 control-label">Cantidad</label>
                                  <div class="col-sm-8">
                                    <span id="cantidadS"></span>
                                  </div>
                              </div>     
                              <div class="form-group">
                                  <label for="id_prendasS" class="col-sm-4 control-label">Prenda</label>
                                  <div class="col-sm-8">
                                    <span id="nombre_prenda"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_tallasS" class="col-sm-4 control-label">Talla</label>
                                  <div class="col-sm-8">
                                    <span id="nombre_talla"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="id_modelosS" class="col-sm-4 control-label">Modelo</label>
                                  <div class="col-sm-8">
                                    <span id="nombre_modelo"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="ojalS" class="col-sm-4 control-label">Ojal</label>
                                  <div class="col-sm-8">
                                    <span id="ojalS"></span>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <label for="total" class="col-sm-4 control-label">Total</label>
                                  <div class="col-sm-8">
                                    <span id="totalS"></span>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label for="id_lavadosS" class="col-sm-4 control-label">Lavado</label>
                                  <div class="col-sm-8">
                                    <span id="nombre_lavados"></span>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-sm-4 control-label">Aplicaciones</label>
                                  <div class="col-sm-8 aplicacionesRealizadasS">                                    
                                  </div>
                              </div>      
                              <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="alert alert-danger" role="alert" id="msgEditarPro" style="display:none">
                                  </div>
                                </div>                                     
                              </div>    
                              <div class="form-group">
                                  <label for="fecha_salida" class="col-sm-4 control-label">Fecha Salida</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="fechaModal form-control" id="fecha_salida" name="fecha_salida" placeholder="Ejm. 31/07/2015" value="">
                                  </div>
                              </div>                                
                              <div class="form-group">
                                  <label for="cantidad_salida" class="col-sm-4 control-label">Cantidad Salida</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cantidad_salida" name="cantidad_salida" value="" placeholder="Ejm. 100">
                                  </div>
                              </div>    
                              <div class="form-group">
                                  <label for="observacion" class="col-sm-4 control-label">Observacion</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="observacion" name="observacion" value="">
                                  </div>
                              </div>    
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="id_produccionS" name="id_produccionS" value="" >
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->