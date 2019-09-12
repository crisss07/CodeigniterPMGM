<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->

<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content 
   <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
        <option value="">Seleccione tipo</option>
        <?php foreach ($dc_tipos_predio as $d): ?>
            <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
        <?php endforeach; ?>
    </select>  
-->
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <!-- <h4 class="card-title">
                                Registro de Predio
                                <button type="button" class="btn waves-effect waves-light btn-success" id="btn_sel_predio">Seleccionar predio</button>
                            </h4> -->
                           

                            <!-- <h6 class="card-subtitle">Ingrese los datos del predio </h6> -->
                            

                          

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                            <?php echo form_open_multipart('inspeccion/do_upload', array('method'=>'POST')); ?>
                                    <h4 class="card-title">Inspeccion</h4>
                               
                                    <div class="form-row">
                                    <input type="hidden" class="form-control" id="asignacion_id" name="asignacion_id" value="<?php echo $asignacion_id; ?>">
                                       
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Tipo Actuacion</label>

                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                          

                                            <select class="custom-select form-control" id="tipo_actuacion_id" name="tipo_actuacion_id" required />
                                                <option value="">Seleccione tipo</option>
                                                <?php foreach ($data_act as $td): ?>
                                                    <option value="<?php echo $td->tipo_actuacion_id; ?>"><?php echo $td->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Tipo Infraccion</label>

                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                         
                                            <div class="input-group">
                                                <select class="custom-select form-control" id="tipo_infraccion_id" name="tipo_infraccion_id" required />
                                                <option value="">Seleccione tipo</option>
                                                <?php foreach ($data_inf as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_infraccion_id; ?>"><?php echo $tc->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                                                           

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <div class="card">
                                                    <label for="recipient-name" class="control-label">Acta de inspeccion</label>
                                                    <label for="input-file-now">
                                                        <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                            <i class="fas fa-exclamation"></i>
                                                        </button>
                                                        OJO Solo archivos pdf
                                                    </label>
                                                    <input type="file" id="input-file-now" class="dropify" name="inspeccion" data-allowed-file-extensions="pdf" required />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <div class="card">
                                                    <label for="recipient-name" class="control-label">Acta de notificacion</label>
                                                    <label for="input-file-now">
                                                        <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                            <i class="fas fa-exclamation"></i>
                                                        </button>
                                                        OJO Solo archivos pdf
                                                    </label>
                                                    <input type="file" id="input-file-now" class="dropify" name="notificacion" data-allowed-file-extensions="pdf" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                            <label  >VoBo</label>
                                            <input type="checkbox"  id="vobo"  name="vobo">
                                        
                                            </div>
                                        </div>                                                                  
                                    </div>

                                  
                                    
                                    <button class="btn btn-primary" type="submit">Guardar</button>

                                </form>
                                <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                                </script>
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
</div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
 


