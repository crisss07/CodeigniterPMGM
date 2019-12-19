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
                                <h4 class="card-title">Modificacion del Menbrete</h4>                                
                            </div>
                        </div>
                        
                        

                          <div class="row el-element-overlay">
                    <div class="col-md-12">
                        <h4 class="card-title"></h4>
                        
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="<?php echo base_url(); ?>public/assets/images/reportes/menbrete_reporte.png" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url(); ?>public/assets/images/reportes/menbrete_reporte.png"><i class="icon-magnifier"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>


                        <div class="row" >
                            <div class="col-md-6">                                        
                                <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Modificar</button>
                            </div>
                           
                        </div>
                       
                    </div>
                </div>

              

            

        




                <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">..</h4>
                            </div>
                            <div class="modal-body">
                                
                                <?php echo form_open_multipart('Reporteseicu/do_upload'); ?>
                              
                               
                                <div class="form-group">
                                    <div class="card">
                                        <label for="recipient-name" class="control-label">Membrete</label>
                                        <label for="input-file-now">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            OJO Solo archivos png <code>(con una resolucion 817x1058)</code> 
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



