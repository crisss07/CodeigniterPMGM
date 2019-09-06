
N<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open_multipart('tipo_tramite/do_upload', array('method'=>'POST')); ?>
                                <h4 class="card-title">Registro de Tramite</h4>
                                <div class="floating-labels mt-5">
                                    <div class="form-row">
                                        <?php $lista = $this->db->query("SELECT op.organigrama_persona_id, op.persona_id, p.persona_id, p.nombres, p.paterno, p.materno FROM tramite.organigrama_persona op, public.persona p WHERE op.organigrama_persona_id = '$idss' AND op.persona_id = p.persona_id")->row();
                                        ?>  
                                        <input type="hidden" name="organigrama_persona_id" value="<?php echo $lista->organigrama_persona_id ?>" >
                                        <div class="col-md-6 form-group mb-5">
                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                            <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                            ?> 
                                            <select class="custom-select form-control" id="tipo_tramite_id" name="tipo_tramite_id"  onchange="CargarProductos(this.value);" required />
                                                <option value=""></option>
                                                <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                            <label>Tipo de Tramite</label>
                                        </div>
                                        <div class="col-md-12 form-group mb-5" id="listas">    
                                            
                                        </div>
                                        <div class="col-md-6 form-group mb-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="remitente" name="remitente" required>
                                                <label > Nombre del solicitante<span class="text-danger">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5 col-md-6">
                                            <div class="form-group">
                                                <input type="integer" class="form-control" id="" name="" required pattern="[0-9]{1,40}">
                                                <label > Cedula de identidad del solicitante <span class="text-danger">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="referencia" name="referencia" required>
                                            <label >Observaciones<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 form-group mb-5"> 
                                            <select class="custom-select form-control" id="destino" name="destino" required />
                                                <option value=""></option>
                                                <?php foreach ($personas as $key => $p): ?>
                                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                <?php endforeach ?>
                                            </select>  
                                            <label >Derivar a </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <?php 
                                            $año = date("Y");
                                            $cite = $this->db->query("SELECT * FROM tramite.numero_tramite WHERE gestion = '$año' AND activo = '1'")->row();
                                            $numero = $cite->correlativo + 1 ;
                                            $numeroConCeros = str_pad($numero, 5, "0", STR_PAD_LEFT);
                                        ?> 
                                        <div>
                                            <input hidden type="integer" name="cite_sin" value="<?php echo $cite->tipo ?><?php echo $cite->gestion ?>-<?php echo $numeroConCeros ?>" >
                                        </div>
                                        <div>
                                            <input hidden type="integer" name="gestion" value="<?php echo $año; ?>" >
                                        </div>
                                        <div>
                                            <input hidden type="integer" name="correlativo" value="<?php echo $numero; ?>" >
                                        </div>
                                        <div>
                                            <input hidden type="text" name="cite" value="<?php echo $cite->tipo ?>/<?php echo $cite->gestion ?>-<?php echo $numeroConCeros ?>" >
                                        </div>
                                        <div>
                                            <input hidden type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="boton" value="generar" class="btn waves-effect waves-light btn-block btn-info">Generar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="boton" value="derivar" class="btn waves-effect waves-light btn-block btn-success">Generar y derivar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                                function CargarProductos(val)
                                {   

                                    $.ajax({
                                        type: "GET",
                                        url: '<?php echo base_url(); ?>tipo_tramite/ajax_verifica/',
                                        data: 'param1='+val,
                                        success: function(resp){
                                            //alert(resp[resp.length]);
                                            asistente = JSON.parse(resp);
                                            $('.borrar').remove();
                                            for (var i = 0; i < asistente.length; i++) {

                                                $('#listas').append('<div class="borrar"> <input type="checkbox" id="requisitos['+i+']" name="requisitos['+i+']" value="'+asistente[i]['requisito_id']+'"> '+asistente[i]['descripcion']+' </div>');
                                                //console.log(asistente[i]['descripcion']);
                                            }
                                        }
                                    });
                                }
                            </script>
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
    </div>
</div>

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>