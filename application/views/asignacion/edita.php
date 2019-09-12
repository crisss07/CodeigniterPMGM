<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

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
                            <?php //vdebug($asignacion, false, false, true); ?>
                            <?php echo form_open_multipart('asignacion/guarda_edicion', array('method'=>'POST')); ?>
                                    <h3 class="card-title">Inspeccion</h3>
                                    <div class="form-row">
                                    <input type="hidden" class="form-control" id="asignacion_id" name="asignacion_id" value="<?php echo $asignacion->asignacion_id; ?>">

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom02"><b>
                                            <?php 
                                                $persona = $this->db->get_where("persona", array('persona_id'=>$asignacion->persona_id))->row(); 
                                                // vdebug($tramite, false, false, true);
                                                echo $persona->nombres.' ';
                                                echo $persona->paterno.' ';
                                                echo $persona->materno.' ';
                                            ?>  </b>
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

                                    <div class="col-md-2 mb-2">
                                        <label for="validationCustom02"><b>  Tramite</b></label>
                                        <div class="input-group">
                                            <?php 
                                                $tramite = $this->db->get_where("tramite.tramite", array('tramite_id'=>$asignacion->tramite_id))->row(); 
                                                // vdebug($tramite, false, false, true);
                                                echo $tramite->cite;
                                            ?>                                                                                            </div>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <label for="validationCustomUsername"><b>Tipo Documento</b></label>
                                        <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->                                        
                                        <div class="input-group">
                                            <?php 
                                                $tipo_asignacion = $this->db->get_where("inspeccion.tipo_asignacion", array('tipo_asignacion_id'=>$asignacion->tipo_asignacion_id))->row(); 
                                                // vdebug($tramite, false, false, true);
                                                echo $tipo_asignacion->tipo;
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <label for="validationCustomUsername"><b>Distrito</b></label>
                                        <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->                                        
                                        <div class="input-group">
                                            <?php 
                                                $district = $this->db->get_where("inspeccion.asignacion", array('asignacion_id'=>$asignacion->asignacion_id))->row(); 
                                                // vdebug($tramite, false, false, true);
                                                echo $district->distrito;
                                            ?>
                                              <!--<select name="distrito" class="form-control">
                                                <?php foreach ($dist as $i): ?>
                                                    <?php if(($district->distrito)==$i->distrito):?>
                                                    <option selected value="<?= $i->gid; ?>" >
                                                    <?= $i->distrito ?>
                                                    <?php else: ?>
                                                        <option value="<?= $i->gid; ?>">
                                                        <?= $i->distrito ?>                                                 
                                                        </option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>-->
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername"><b><?= $asignacion->inicio ?></b></label>

                                        <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                        
                                        <div class="input-group">
                                            <input type="date" name="fecha_inicio" class="form-control">
                                            <select name="turno">
                                                <option value="m">Ma&ntilde;ana</option>
                                                <option value="t">Tarde</option>
                                            </select>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>


