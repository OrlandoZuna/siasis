    <!-- Modal -->
    <div class="modal modal-success fade reportegrupo-modal-sm" id="reportegrupo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Colocar datos para el reporte de grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="reporte">
                        <tr>
                           <td>
                           <label for="grupito" class="form-label">Grupos</label>
                           <select class="form-control" name="grupito" id="grupito">
                                <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($grupo->id); ?>"><?php echo e($grupo->nombre_trabajo); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="fecha1" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="fecha1" id="fecha1" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="fecha2" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="fecha2" id="fecha2" placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success reportegrupo" id="reportegrupogenerar"> <i class="fa fa-download"></i>  Descargar</button>
                    <a class="as" id="as" target="_blank"></a>

                </div>

            </div>
        </div>
    </div>

<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/modals/modal-reportegrupo.blade.php ENDPATH**/ ?>