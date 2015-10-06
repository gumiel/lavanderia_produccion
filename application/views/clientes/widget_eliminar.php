                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalEliminarCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Cliente</h4>
                      </div>
                      <form id="formEliminarCli" name="formEliminarCli" class="form-horizontal fixed-formulario" action="<?php echo site_url('clientes/eliminarCliente'); ?>" method="POST">
                        <div class="modal-body">
                          Desea eliminar al Cliente?<br>
                          Si elimina igual se eliminaran todas sus datos de Boletas, Kardex y Estados de cuentas
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="id_clientesD" name="id_clientesD" value="" >
                          <button type="submit" class="btn btn-primary">Eliminar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->