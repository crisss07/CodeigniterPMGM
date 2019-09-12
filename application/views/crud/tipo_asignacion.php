<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">
                    <div class="card-body">
                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Tipo asignacion</h4>                                
                            </div>
                        </div>
                        <p></p>                        
                        <div class="row" >
                            <div class="col-md-12">                                        
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Datos Registrados</h4>                                        
                                <div class="table-responsive m-t-40">
                                    <table id="documento_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nro</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>                                                           
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>                                                
                                            <?php foreach ($data_tcorr as $row) { $datos = $row->tipo_asignacion_id."||".
                                            $row->tipo;  ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->tipo; ?></td>
                                                <td>                                           
                                                <?php if (($row->activo)==1):?>
                                                        <a <?php echo $verifica['baja'];?>="<?php echo site_url('tipo_asignacion/delete'); ?>/<?php echo $row->tipo_asignacion_id; ?>"><button type="button" class="btn btn-success"><span class="fas fa-arrow-alt-circle-up" aria-hidden="true"></span> Activo</button></a>                                                          
                                                    <?php endif ?>
                                                    <?php if (($row->activo)==0):?>
                                                        <a <?php echo $verifica['baja'];?>="<?php echo site_url('tipo_asignacion/delete'); ?>/<?php echo $row->tipo_asignacion_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-arrow-alt-circle-down" aria-hidden="true"></span> Inactivo</button></a>                                                          
                                                    <?php endif ?>
                                                </td>                                                                                                              
                                                <td>
                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </button> 
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                        } ?>
                                    </tbody>
                                </table>
                            </div>                                        
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Insertar nuevo</h4>
                            </div>
                            <div class="modal-body">                                
                                    <?php echo form_open('tipo_asignacion/create', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Tipo</label>
                                        <input type="text" class="form-control" id="tipo" name="tipo">
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
                <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Edicion</h4>
                            </div>
                            <div class="modal-body">                        
                                <?php echo form_open('tipo_asignacion/update', array('method'=>'POST')); ?>                            
                                <div class="form-group">
                                    <input type="text" class="form-control" hidden="" id="tipo_asignacion_id_e" name="tipo_asignacion_id_e">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Tipo</label>
                                    <input type="text" class="form-control" id="tipo_e" name="tipo_e" >
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
    </div>
</div>
</div>
</div>
<!-- ============================================================== --> 
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    function agregarform(datos)
    {
       d=datos.split('||');
       $('#tipo_asignacion_id_e').val(d[0]);
       $('#tipo_e').val(d[1]);
   }
</script>
