
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNACIONES</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr> 
                                    <th>TRAMITE</th>                                   
                                    <th>INSPECTOR</th>
                                    <th>TIPO ASIGNACION</th>
                                    <th>DISTRITO</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>                                    
                                    <th>editar</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                <?php foreach ($lista as $mt):
                                    $datos = $mt->asignacion_id."||".
                                    $mt->tramite_id."||".
                                    $mt->persona_id."||". 
                                    $mt->tipo_asignacion_id."||".                               
                                    $mt->distrito."||".
                                    $mt->inicio;
                                    ?>
                                    <tr>
                                         <td><?php echo $mt->cite; ?></td>
                                        <td><?php echo $mt->nombres.' '.$mt->paterno.' '.$mt->materno; ?></td>                                        
                                        <td><?php echo $mt->tipo; ?></td>
                                        <td><?php echo $mt->distrito; ?></td>
                                        <td><?php echo $mt->inicio; ?></td>
                                        <td><?php echo $mt->fin; ?></td>                                  
                                        <td>   
                                        <a <?php echo $verifica['baja'];?>="<?= base_url('asignacion/edita/'. $mt->asignacion_id); ?>" type="button" class="btn btn-warning footable-delete">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </a>
                                                    <!--<button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </button>                                            -->
                                        </td>
                                    </tr>    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Trigger the modal with a button -->
     
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog modal-lg"  role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Editar asignacion de inspeccion</h4>
                            </div>
                                <div class="modal-body">                        
                                <?php echo form_open('tipo_actuacion/update', array('method'=>'POST')); ?>                            
                                    <div class="form-group">
                                        <input type="text" class="form-control" hidden="" id="tipo_asignacion_id" name="tipo_asignacion_id">
                                    </div>

                                    <div class="form-row">

                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom02">
                                        
                                        </label>
                                        <div class="input-group">
                                                                                                                                    
                                            <select name="persona_id" class="form-control">
                                                <?php foreach ($inspectores as $i): ?>
                                                    <option value="<?= $i->persona_id; ?>">
                                                    <?= $i->nombres ?> 
                                                    <?= $i->paterno ?> 
                                                    <?= $i->materno ?> 
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustom02">Tramite</label>
                                        <div class="input-group" >
                                        <input type="text" name="fecha_inicio" class="form-control" id="tramite" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label for="validationCustomUsername">Tipo Documento</label>

                                        <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                        
                                        <div class="input-group">
                                        <input type="text" name="fecha_inicio" class="form-control" id="tipo_documento" readonly>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="col-md-5 mb-5">
                                        <label for="validationCustom02">Distrito</label>
                                        <p></p>
                                            <select name="turno">
                                            <?php foreach ($dist as $j): ?>
                                                    <option value="<?= $j->gid; ?>">
                                                    <?= $j->distrito ?> 
                                                    
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>

                                    
                                        <div class="col-md-5 mb-5">
                                        <label for="validationCustomUsername" id="inicio"></label>   
                                        <div class="input-group">                                   
                                            <input type="date" name="fecha_inicio" class="form-control">
                                            <select name="turno">
                                                <option value="m">Ma&ntilde;ana</option>
                                                <option value="t">Tarde</option>
                                            </select>
                                        </div>

                                        </div>
                                    </div>

                                    </div>

                           
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    </form>
                                </div>                    
                    </div>
                </div>
        </div>
          



</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================-->

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    function agregarform(datos)
    {
       d=datos.split('||');
       $('#asignacion_id').val(d[0]);
       $('#tramite').val(d[1]);
       $('#persona').val(d[2]);
       $('#tipo_documento').val(d[3]);
       $('#inicio').val(d[4]);
   }
</script>