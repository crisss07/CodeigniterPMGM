<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<div class="page-wrapper">    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">
                    <div class="card-body">
                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Datos Organigrama</h4>                                
                            </div>
                        </div>
                        <p></p>                        
                        <div class="row" >
                            <div class="col-md-6">                                        
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo</button>
                            </div>
                            <div class="col-md-6" align="right">                                        
                                <a  class=" btn btn-warning" <?php echo $verifica['alta1'];?>="<?php echo site_url('organigrama/chart'); ?>" align="right"><i class="mdi mdi-printer"></i> visualizar organigrama</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">organigramas Registrados</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="org_chart_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nro</th>                                                        
                                                <th>Unidad superior</th>                                                         
                                                <th>unidad</th>
                                                <th>CITE</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_org as $row) {
                                               $datos = $row->organigrama_id."||".
                                               $row->padre_id."||".
                                               $row->unidad."||".
                                               $row->cite_id."||".
                                               $row->tipo."||".
                                               $row->gestion."||".
                                               $row->correlativo."||".
                                               $row->observaciones;
                                                ?>
                                               <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->jefe; ?></td>    
                                                <td><?php echo $row->unidad; ?></td>  
                                                <td>
                                                <?php if($row->tipo!=null): ?>
                                                <?php echo $row->tipo.'-0000'.$row->correlativo; ?>                                                
                                                <?php else: ?>
                                                <?php echo 'no registrado'; ?>
                                                <?php endif ?>
                                                </td>  
                                                <td>                                           
                                                <?php if (($row->activo)==1):?>
                                                        <a <?php echo $verifica['baja']; ?>="<?php echo site_url('organigrama/delete'); ?>/<?php echo $row->organigrama_id; ?>"><button type="button" class="btn btn-success"><span class="fas fa-arrow-alt-circle-up" aria-hidden="true"></span> Activo</button></a>                                                          
                                                    <?php endif ?>
                                                    <?php if (($row->activo)==0):?>
                                                        <a <?php echo $verifica['baja']; ?>="<?php echo site_url('organigrama/delete'); ?>/<?php echo $row->organigrama_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-arrow-alt-circle-down" aria-hidden="true"></span> Inactivo</button></a>                                                          
                                                    <?php endif ?>
                                                </td>                     
                                                <td>
                                                    <a <?php echo $verifica['baja']; ?>="<?php echo site_url('organigrama/edit'); ?>/<?php echo $row->organigrama_id; ?>"><button type="button" class="btn btn-warning"><span class="fas fas fa-edit" aria-hidden="true"></span></button></a>                                                  
                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-plus" aria-hidden="true"> 
                                                            </span> CITE
                                                    </button>                                                    
                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-info" data-toggle="modal" data-target="#modalvistacite" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="far fa-check-circle" aria-hidden="true"> 
                                                            </span> VER CITE
                                                    </button>                                                    
                                                </td>                                                
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>                                        
                        </div>
                    </div>
                </div>

            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">CITE</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>nivel/update" method="POST">-->
                        <?php echo form_open('organigrama/cite', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <input type="text" hidden="" id="organigrama_id_e" name="organigrama_id_e">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Unidad</label>
                                <input type="text" class="form-control" id="unidad_e" name="unidad_e" readonly>
                            </div>
                            <div class="form-group">
                            <label for="recipient-name" class="control-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo">
                                                                          
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Gestion</label>
                                <input type="text" class="form-control" id="gestion" name="gestion" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Observaciones</label>
                                <input type="text" class="form-control" id="observaciones" name="observaciones">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Correlativo</label>
                                <input type="number" class="form-control" id="correlativo" name="correlativo" min=1>
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

        <div class="modal fade" id="modalvistacite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">CITE</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>nivel/update" method="POST">-->
                        <?php echo form_open('organigrama/cite', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <input type="text" hidden="" id="organigrama_id_e" name="organigrama_id_e">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Unidad</label>
                                <input type="text" class="form-control" id="unidad_e" name="unidad_e" readonly>
                            </div>
                            <div class="form-group">
                            <label for="recipient-name" class="control-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" readonly>
                                                                          
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Gestion</label>
                                <input type="text" class="form-control" id="gestion" name="gestion" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Observaciones</label>
                                <input type="text" class="form-control" id="observaciones" name="observaciones" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Correlativo</label>
                                <input type="number" class="form-control" id="correlativo" name="correlativo" readonly>
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




                <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Nueva Unidad</h4>
                            </div>
                            <div class="modal-body">
                                <!--<?php echo form_open('organigrama/create', array('method'=>'POST', 'id'=>'insertar')); ?>-->
                                <?php echo form_open_multipart('organigrama/do_upload'); ?>
                                <div class="form-group">
                                    <label for="location1">Nivel Superior :<span class="text-danger"> *</span></label>
                                    <select class="custom-select form-control" id="organigrama_id" name="organigrama_id">
                                        <option value="">Seleccione Unidad Superior</option>
                                        <?php foreach ($data_grupo as $tp) : ?>
                                            <option value="<?php echo $tp->organigrama_id; ?>"><?php echo $tp->unidad; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Unidad</label>
                                    <input type="text" class="form-control" id="unidad" name="unidad" required>
                                    <input type="hidden" class="form-control" id="opcion" name="opcion" value="1">
                                </div>
                                <div class="form-group">
                                    <div class="card">
                                        <label for="recipient-name" class="control-label">Foto</label>
                                        <label for="input-file-now">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            OJO Solo archivos png
                                        </label>
                                        <input type="file" id="input-file-now" class="dropify" name="foto_org" data-allowed-file-extensions="png" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div><!--modal-body-->
                    </div>
                </div>
            </div><!--modal insertar-->
            
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>public/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>public/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>public/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>public/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- Plugins for this page -->
<!-- ============================================================== -->
<!-- jQuery file upload -->
<script src="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: 'Arrastre un archivo o haga click',
                replace: 'Arrastre un archivo para reemplazar',
                remove: 'eliminar',
                error: 'Lo sentimos, el archivo es demasiado grande.'
            }
        });
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
<script>
    function agregarform(datos)
    {
       d=datos.split('||');             
             $('#organigrama_id_e').val(d[0]); 
             $('#padre_id_e').val(d[1]);             
             $('#unidad_e').val(d[2]);
         }
</script>

<script>
    function vercite(datos)
    {
       d=datos.split('||');             
             $('#organigrama_id_c').val(d[0]); 
             $('#tipo_c').val(d[1]);             
             $('#gestion_c').val(d[2]);
             $('#correlativo').val(d[2]);
             $('#observaciones').val(d[2]);
         }
</script>



