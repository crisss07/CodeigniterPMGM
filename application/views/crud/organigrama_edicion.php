
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
                                <h4 class="card-title">Editar unidad </h4>                                
                            </div>
                        </div>						
                        <div class="col-lg-3">
                          <?php echo form_open_multipart('organigrama/do_upload'); ?>                            
                          <div class="form-group">
                            <label for="location1">Nivel Superior :<span class="text-danger"> *</span></label>
                            <select class="custom-select form-control" id="padre_id_e" name="padre_id_e">
                                <option value="<?php echo $datos->padre_id; ?>" selected><?php echo $datos->jefe; ?></option>                                                                    
                                <?php foreach ($data_grupo as $tp) : ?>
                                    <?php if (($datos->padre_id) != ($tp->organigrama_id)): ?>
                                    <option value="<?php echo $tp->organigrama_id; ?>"><?php echo $tp->unidad; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>                                               
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Unidad</label>
                        <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo $datos->unidad; ?>">
                        <input type="hidden" class="form-control" id="unidad_old" name="unidad_old" value="<?php echo $datos->unidad; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="organigrama_id_e" name="organigrama_id_e" value="<?php echo $datos->organigrama_id; ?>">
                    <input type="hidden" class="form-control" id="opcion" name="opcion" value="2">  
                    <div class="form-group">
                        <div class="card">                                    
                            <label for="recipient-name" class="control-label">Foto</label>
                            <label for="input-file-now-custom-3">OJO Solo archivos png</label>                                        
                            <input type="file" id="input-file-now-custom-3" class="dropify" name="foto_org" data-allowed-file-extensions="png" data-default-file="<?php echo base_url(); ?><?php echo $datos->url; ?>/<?php echo $datos->imagen ?>" />                                                                         
                        </div>
                    </div>                        
                    <a class="btn btn-danger" href="<?php echo site_url('organigrama/nuevo'); ?>" align="right">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>                          
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




