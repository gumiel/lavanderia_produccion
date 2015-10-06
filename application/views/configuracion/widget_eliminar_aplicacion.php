                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalEliminarApli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Aplicacion</h4>
                      </div>
                      <form id="formEliminarPro" name="formProduccion" class="form-horizontal fixed-formulario" action="<?php echo site_url('configuracion/eliminarAplicacion'); ?>" method="POST">
                        <div class="modal-body">
                          Desea eliminar la Aplicacion seleccionada?
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="id_aplicacionesD" name="id_aplicacionesD" value="" >
                          <button type="submit" class="btn btn-primary">Eliminar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->