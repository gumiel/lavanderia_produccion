                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalEliminarLav" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Lavado</h4>
                      </div>
                      <form id="formEliminarLav" name="formEliminarLav" class="form-horizontal fixed-formulario" action="<?php echo site_url('configuracion/eliminarLavado'); ?>" method="POST">
                        <div class="modal-body">
                          Desea eliminar el Lavado seleccionado?
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="id_lavadosD" name="id_lavadosD" value="" >
                          <button type="submit" class="btn btn-primary">Eliminar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->