                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalApliEdit" tabindex="-1" role="dialog" aria-labelledby="myModalApliLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalApliLabel">Editar Aplicacion</h4>
                      </div>
                      <form id="formeditarApli" name="formeditarApli" class="form-horizontal fixed-formulario" action="<?php echo site_url('configuracion/editarAplicacion'); ?>" method="POST">
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="nombreE" class="col-sm-4 control-label">Nombre</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="nombreE" name="nombreE" value="">
                              </div>
                          </div>                                                             
                          <div class="form-group">
                              <label for="total" class="col-sm-4 control-label">Fecha</label>
                              <div class="col-sm-8" style="margin-top: 3px;">
                                <b><span id="fechaE"><?php echo date('d/m/Y'); ?></span></b>
                              </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_aplicacionesE" id="id_aplicacionesE" value="">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" >Editar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->