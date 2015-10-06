                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalLavado" tabindex="-1" role="dialog" aria-labelledby="myModalLavadoLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLavadoLabel">Nueva Lavado</h4>
                      </div>
                      <form id="formcreateLav" name="formcreateLav" class="form-horizontal fixed-formulario" action="<?php echo site_url('configuracion/crearLavado'); ?>" method="POST">
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="nombre" class="col-sm-4 control-label">Nombre</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="">
                              </div>
                          </div>                                                             
                          <div class="form-group">
                              <label for="total" class="col-sm-4 control-label">Fecha</label>
                              <div class="col-sm-8" style="margin-top: 3px;">
                                <b><?php echo date('d/m/Y'); ?></b>
                              </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" >Crear</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->