    <!-- Modal -->
    <div class="modal modal-success fade fechas-modal-sm" id="fechaspermiso" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">colocar fecha para el reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="startt" min="1970-12-31" max="<?php echo e(DATE::now()->format('Y-m-d')); ?>" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="endt" min="1970-12-31" max="<?php echo e(DATE::now()->format('Y-m-d')); ?>"placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <a class="btn btn-success as" id= "<?php echo e($id_persona); ?>" onclick="pdfpermiso(this.id)" style="margin-top: 2px; color: #fff"><i class="fa fa-download"></i> descargar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/vistasHojaCalculo/modals/modal-fechas.blade.php ENDPATH**/ ?>