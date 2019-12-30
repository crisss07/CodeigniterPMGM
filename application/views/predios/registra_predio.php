<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" type="text/css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- <div id="map" style="width: 100%; height: 650px;"></div> -->
                <!-- <div id="carga_ajax_mapa"></div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <!-- <h4 class="card-title">
                                Registro de Predio
                                <button type="button" class="btn waves-effect waves-light btn-success" id="btn_sel_predio">Seleccionar predio</button>
                            </h4> -->
                            <div id="muestra_mapa" style="display: none;">
                                <!-- <div id="map" style="height: 650px;"></div> -->
                                <div id="map" style="width: 800px; height: 600px; border: 1px solid #ccc"></div>
                                <div style="width: 100%;">
                                    <button class="btn btn-block btn-warning" type="button" id="btn_finalizado">GENERA CODIGO CATASTRAL</button>
                                </div>
                            </div>

                            <!-- <h6 class="card-subtitle">Ingrese los datos del predio </h6> -->
                            <br />

                            <span class="metadata-marker" style="display: none;" data-region_tag="html-body"></span>

                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                                </div>
                            </div>
                            <p></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%; height:15px;" role="progressbar"> 30% </div>
                            </div>
                            <p></p>

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                            <?php echo form_open_multipart('predios/guarda', array('method'=>'POST', 'id'=>'predio_form')); ?>

                            <!-- <h6>Datos del terreno</h6> -->
                                <div class="row">
                                    <div class="col-md-9">

                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Ingrese la Geometria : <span class="text-danger">*</span> </label>
                                                <div id="mapid" style="height: 480px; width: 100%"></div>
                                                <textarea rows="4" class="form-control" id="cod_referencial" autofocus ></textarea>
                                                <div style="width: 100%;">
                                                    <button class="btn btn-block btn-warning" type="button" id="btn_genera_catas">GENERA CODIGO CATASTRAL</button>
                                                </div>
                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- datos catastrales -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header" onclick="muestraDatosCatastrales();">
                                                    <h4 class="mb-0 text-white">DATOS CATASTRALES</h4>
                                                </div>
                                                <div class="card-body" style="display: block;" id="bloqueDatosCatastrales">
                                                    <!-- primera fila -->
                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" maxlength="11" required />
                                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                                                <input type="number" class="form-control" step='1' id="codigo_catastral_anterior" name="codigo_catastral_anterior" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nro_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="nro_inmueble" name="nro_inmueble" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="distrito" step='1' name="distrito" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="manzana" step='1' name="manzana" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="predio" step='1' name="predio" required />
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <!-- segunda fila -->
                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
                                                                    <option value="">Seleccione tipo</option>
                                                                    <?php foreach ($dc_tipos_predio as $d): ?>
                                                                        <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="zona_econo"> Zona eco : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="zona_econo" name="zona_econo" maxlength="5"/d>
                                                            </div>
                                                        </div>

<!--                                                         <div class="col-md-2">
    <div class="form-group">
        <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
        <select class="custom-select form-control" id="zonaurb_id" name="zonaurb_id" required />
            <option value="">Seleccione zona</option>
            <?php //foreach ($dc_zona_urbana as $d): ?>
                <option value="<?php //echo $d->zonaurb_id; ?>"><?php //echo $d->descripcion; ?></option>
            <?php //endforeach; ?>
        </select>
    </div>
</div>
 -->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="n_puerta"> Numero puerta : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="n_puerta" name="nro_puerta" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="latitud"> Latitud y Longitud: <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="latlong" name="latlong" required />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- datos superficie -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header" onclick="muestraDatosSuperficie();">
                                                    <h4 class="mb-0 text-white">DATOS SUPERFICIE</h4>
                                                </div>
                                                <div class="card-body" style="display: none;" id="bloqueDatosSuperficie">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_geo" name="superficie_geo" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_campo" name="superficie_campo" min="1" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_legal" name="superficie_legal" min="1" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- datos predio -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header" onclick="muestraDatosPredio();">
                                                    <h4 class="mb-0 text-white">DATOS PREDIO</h4>
                                                </div>
                                                <div class="card-body" style="display: none;" id="bloqueDatosPredio">
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <select class="custom-select form-control" id="ubicacion_id" name="ubicacion_id" required />
                                                                    <option value="">Seleccione ubicacion</option>
                                                                    <?php foreach ($dc_ubicacion as $d): ?>
                                                                    <option value="<?php echo $d->ubicacion_id; ?>">
                                                                        <?php echo $d->descripcion; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="pendiente_id"> Pendiente : <span class="text-danger">*</span> </label>
                                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <select class="custom-select form-control" id="pendiente_id" name="pendiente_id" required />
                                                                    <option value="">Seleccione pendiente</option>
                                                                    <?php foreach ($dc_pendiente as $d): ?>
                                                                    <option value="<?php echo $d->pendiente_id; ?>">
                                                                        <?php echo $d->descripcion; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <label for="nivel_id"> Nivel : <span class="text-danger">*</span> </label>
                                                                <select class="custom-select form-control" id="nivel_id" name="nivel_id" required />
                                                                    <option value="">Seleccione nivel</option>
                                                                    <?php foreach ($dc_nivel as $d): ?>
                                                                    <option value="<?php echo $d->nivel_id; ?>">
                                                                        <?php echo $d->descripcion; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <label for="forma_id"> Forma : <span class="text-danger">*</span> </label>
                                                                <select class="custom-select form-control" id="forma_id" name="forma_id" required />
                                                                     <option value="<?php echo $prod->forma; ?>"><?php echo $prod->forma; ?></option>
                                                                    <?php foreach ($dc_forma as $d): ?>
                                                                    <option value="<?php echo $d->forma_id; ?>">
                                                                        <?php echo $d->descripcion; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="c_principal">Calle : <span class="text-danger">*</span></label>
                                                                <div id="predio_vias"></div>

                                                                <!-- <input type="hidden" name="calles_colindantes" id="calles_colindantes"> -->
                                                                <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $prod->calle; ?>" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="c_principal">Zona : <span class="text-danger">*</span></label>
                                                                <div id="predio_vias"></div>

                                                                <!-- <input type="hidden" name="calles_colindantes" id="calles_colindantes"> -->
                                                                <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $prod->zona; ?>" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="c_principal">Numero : <span class="text-danger">*</span></label>
                                                                <div id="predio_vias"></div>

                                                                <!-- <input type="hidden" name="calles_colindantes" id="calles_colindantes"> -->
                                                                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $prod->numero; ?>" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="zona">Material : <span class="text-danger">*</span></label>
                                                                <!-- <input type="text" class="form-control" id="zona" name="zona" required /> -->
                                                                <select class="custom-select form-control" id="mat_via_id" name="mat_via_id" required />
                                                                    <option value="">Material</option>
                                                                    <?php foreach ($dc_materiales_via as $v): ?>
                                                                    <option value="<?php echo $v->matvia_id; ?>">
                                                                        <?php echo $v->descripcion; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="frente">Frente : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" step='0.01' value="<?php echo $prod->frente; ?>" id="frente" name="frente" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" step='0.01' value="<?php echo $prod->fondo; ?>" id="fondo" name="fondo" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                                                <select class="custom-select form-control" id="forma_id" name="clase_predio_id" required />
                                                                    <option value="">Seleccione clase</option>
                                                                    <?php foreach ($dc_clase_predio as $d): ?>
                                                                        <option value="<?php echo $d->clase_predio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                                <label for="forma_id"> Uso Suelo : <span class="text-danger">*</span> </label>
                                                                <select class="custom-select form-control" id="forma_id" name="uso_suelo_id" required />
                                                                    <option value="">Seleccione clase</option>
                                                                    <?php foreach ($dc_uso_suelo as $d): ?>
                                                                        <option value="<?php echo $d->uso_suelo_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="forma">Matriz PH : <span class="text-danger">*</span></label>
                                                                <!-- <input type="number" class="form-control" id="forma" step='1' name="matriz_ph" required /> -->
                                                                <select class="custom-select form-control" name="matriz_ph" />
                                                                    <option value="1">SI</option>
                                                                    <option value="0">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <?php //vdebug($dc_estado, false, false, true); ?>
                                                                <label for="forma_id"> Estado : <span class="text-danger">*</span> </label>
                                                                <select class="custom-select form-control" id="forma_id" name="edificio_id" required />
                                                                    <option value="<?php echo $prod->estado; ?>" selected><?php echo $prod->estado; ?></option>
                                                                    <?php foreach ($dc_estado as $e): ?>
                                                                        <option value="<?php echo $e->estado_id; ?>"><?php echo $e->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- servicios basicos -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header" onclick="muestraServiciosBasicos();">
                                                    <h4 class="mb-0 text-white">SERVICIOS BASICOS</h4>
                                                </div>
                                                <div class="card-body" style="display: none;" id="bloqueServiciosBasicos">

                                                    <div class="row">
                                                        <div class="col">
                                                        <label for="forma_id"> Servicios Basicos : <span class="text-danger">*</span> </label>
                                                            <div class="form-group row pt-12">
                                                                <div class="col-sm-12">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck99">
                                                                    <label class="custom-control-label" for="customCheck99"><b>Selecciona Todos</b></label>
                                                                </div>
                                                                    <?php foreach ($listado_servicios as $key => $ls): ?>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="servicios[<?php echo $key; ?>]" value="<?php echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>">
                                                                        <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                                    </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="observaciones">Observaciones : </label>
                                                                <input type="text" class="form-control" id="observaciones" name="observaciones" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                    <div class="col-md-3">

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Plano</h4>
                                                <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                    OJO Solo archivos jpg
                                                </label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_plano" data-allowed-file-extensions="jpg" required />
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Fachada</h4>
                                                <img src="https://res.cloudinary.com/ddcnjlkev/image/upload/v1577673300/yhbnildmm60u3ggwg3r6.jpg" alt="Logo" width="300"  class="logo"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 offset-md-11">
                                        <button type="submit" class="btn waves-effect waves-light btn-info">Siguiente Paso</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script> -->

    <script type="text/javascript">

         var contador_eliminados = 0;
         var todos = new Array();

        $("#codigo_catastral").focusout(function(){

            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var cod_catastral = $("#codigo_catastral").val();

            $.ajax({
                url: '<?php echo base_url(); ?>predios/ajax_verifica_cod_catastral/',
                type: 'GET',
                dataType: 'json',
                data: {csrfName: csrfHash, param1: cod_catastral},
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    // alert("Se envio bien");
                    // csrfName = data.csrfName;
                    // csrfHash = data.csrfHash;
                    // alert(data.message);
                    if (data.estado == 'si') {
                        // console.log('Si se esta');
                        $("#msg_error_catastral").show();
                        $("#codigo_catastral").val("");
                        $("#msg_error_catastral").html('YA existe el codigo: '+data.codigo);
                    } else {
                        $("#msg_error_catastral").hide();
                        // console.log('no');
                    }

                },
                error:function(jqXHR, textStatus, errorThrown) {
                    // alert("error");
                }
            });

        });

        $("#btn_genera_catas").click(function(){

            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var csrf = $("input[name=csrf_test_name]").val()
            // console.log(csrf);

            var cod_referencial = $("#cod_referencial").val();
            // alert(cod_referencial);
            $.ajax({
                url: '<?php echo base_url(); ?>predios/ajax_genera_codcatas/',
                type: 'POST',
                dataType: 'json',
                data: {csrfName: csrfHash, codigo: cod_referencial, csrf_test_name: csrf},
                success:function(data, textStatus, jqXHR) {
                    // var datos = JSON.parse
                    // var datos = JSON.parse(data);
                    var datos = jQuery.parseJSON(JSON.stringify(data));
                    // console.log(datos.vias);

                    //var combos_vias = '<select class="custom-select form-control" id="" name="" required="">';
                    var checkbox_vias = '<table>';
                    var contador = 0;

                    datos.vias.forEach(function(element){
                        // console.log(element.sp_get_vias);
                        var aux1 = element.sp_get_vias;
                        var aux2 = element.sp_get_vias.split(",");
                        var aux3 = aux2[0].substring(1);
                        todos.push(aux3);
                        // console.log(todos);
                        // console.log(contador);
                        // combos_vias += '<option value="'+aux3+'">'+element.sp_get_vias+'</option>';
                        // checkbox_vias += '<input type="checkbox" name="'+aux3+'" value="Bike"> '+element.sp_get_vias+'<br>';
                        checkbox_vias += '<tr id=fila_'+aux3+'>\
                            <td><div class="custom-control custom-radio">\
                                            <input type="radio" id="customRadio_'+aux3+'" name="calle_principal" class="custom-control-input" value="'+aux3+'">\
                                            <label class="custom-control-label" for="customRadio_'+aux3+'">'+element.sp_get_vias+'</label></div>\
                                            </td><td><button type="button" class="btn btn-danger" onclick="elimina_fila_tabla('+aux3+')">\
                                                    <span class="fas fa-trash-alt"></span>\
                                                </button></td></tr>';
                        contador++;
                        });
                    checkbox_vias += '</table>';

                    $("#calles_colindantes").val(todos);
                    // console.log('Aqui los datos: '+todos);

                    //combos_vias += "</select>"
                    // console.log(combos_vias);
                    $("#predio_vias").html(checkbox_vias);

                    // var cod_cat = parseInt(data);
                    $("#codigo_catastral").val(datos.codcatas);

                    cantidad_codcatas = datos.codcatas.length;
                    // console.log(datos.codcatas.length);


                    if (cantidad_codcatas != 10) {
                        swal("Error!", "El codigo catastral no es valido!", "error");
                    }

                    // $("#codigo_catastral").val(codigo_cat);
                    var s_codigo_cat = datos.codcatas.toString();
                    // var cod_catastral = $("#codigo_catastral").val();
                    var predio = s_codigo_cat.substr(6, 10);
                    var distrito = s_codigo_cat.substr(0, 3);
                    var manzana = s_codigo_cat.substr(3, 3);

                    $("#distrito").val(distrito);
                    $("#manzana").val(manzana);
                    $("#predio").val(predio);

                    $("#codigo_catastral").prop('readonly', true);
                    $("#distrito").prop('readonly', true);
                    $("#manzana").prop('readonly', true);
                    $("#predio").prop('readonly', true);
                },
                error:function(jqXHR, textStatus, errorThrown) {
                }
            });

        });

        $("#btn_sel_predio").click(function(event) {
            $("#muestra_mapa").toggle('slow');
        });

        $('#customCheck99').change(function () {
            var checkboxes = $(this).closest('form').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });

        $("#btn_finalizado").click(function(){
            $("#muestra_mapa").toggle('slow');
            var codigo_cat = getGeneraRandom(1, 99999999999);
            var s_codigo_cat = codigo_cat.toString();
            $("#codigo_catastral").val(codigo_cat);
            // var cod_catastral = $("#codigo_catastral").val();
            var predio = s_codigo_cat.substr(7, 10);
            var distrito = s_codigo_cat.substr(0, 3);
            var manzana = s_codigo_cat.substr(3, 4);

            $("#distrito").val(distrito);
            $("#manzana").val(manzana);
            $("#predio").val(predio);

            $("#distrito").prop('readonly', true);
            $("#manzana").prop('readonly', true);
            $("#predio").prop('readonly', true);

            $("#latitud").val(-18.00418108);
            $("#longitud").val(-63.39072107);
            $("#superficie_geo").val(125);
            $("#superficie_campo").val(60);
            $("#superficie_legal").val(90);

            // console.log('Aqui mi cod'+lat);
        });

/*        var aplicacion = new Vue({
          el: '#aplicacion',
          data: {
            name: 'Cristiam Herrera'
          },
          // define methods under the `methods` object
          methods: {
            oculta: function (event){
                $("#muestra_mapa").toggle('slow');
            },
            llena: function (event) {
                alert("holas");
            }
        });
*/

/*var aplicacion = new Vue({
    el: '#aplicacion',
    data: {
        codcatas: 'Vue.js'
    },
    // define methods under the `methods` object
    methods: {
        oculta: function(event) {
            $("#muestra_mapa").toggle('slow');
        },
        llena: function(event) {
            // $("#muestra_mapa").toggle('slow');
            var cod_catastral = getRndInteger(1, 9999999999);
        },
    }
}) */

function elimina_fila_tabla(fila){

    // console.log('Aqui los datos '+ todos);
    var fila_numero = parseInt(fila);
    $('#fila_'+fila).remove();

    // console.log(array)
    // var index = todos.indexOf("fila_numero");

    // var index = todos.findIndex(fila_numero);
    // console.log('array ', todos);
    // console.log('encontrado '+todos.indexOf(fila));
    // console.log('A buscar '+fila_numero);
    // console.log('El indice '+index);

    todos.forEach(function (elemento, indice, array) {
        // console.log(elemento, indice);
        if(elemento==fila){
            // console.log('Si '+indice);
            todos.splice(indice, 1);
            // console.log(todos.indexOf(fila));
        }else{
            // console.log('No');
        }
    });
    // console.log('Aqui los modificados '+ todos);
    $('#calles_colindantes').val(todos);

    // if (index > -1) {
    // }
    // array = [2, 9]
    // console.log(array);

    // contador_eliminados++;
    // console.log(contador_eliminados);
    // console.log(todos);
    // console.log(fila);
}

// $('#predio_form').submit(function(e) {

//     swal("Excelente!", "Puedes continuar con el siguiente paso!", "success");
//     e.preventDefault(); // don't submit multiple times
//     this.submit(); // use the native submit method of the form element
    // $('#imagefile').val(''); // blank the input
// });

function getGeneraRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function muestraDatosCatastrales() {
    $('#bloqueDatosCatastrales').toggle('slow');
}

function muestraDatosSuperficie() {
    $('#bloqueDatosSuperficie').toggle('slow');
}

function muestraDatosPredio() {
    $('#bloqueDatosPredio').toggle('slow');
}

function muestraServiciosBasicos() {
    $('#bloqueServiciosBasicos').toggle('slow');
}

</script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<!-- <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" crossorigin=""></script> -->
<!-- <script src="<?php echo base_url(); ?>public/ll/leaflet-src.js"></script> -->
<!-- <script src="libs/leaflet-src.js"></script> -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/ll/leaflet.css"/> -->

<script src="<?php echo base_url(); ?>public/ll/Leaflet.draw.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Leaflet.Draw.Event.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/ll/leaflet.draw.css"/>

<script src="<?php echo base_url(); ?>public/ll/Toolbar.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Tooltip.js"></script>

<script src="<?php echo base_url(); ?>public/ll/GeometryUtil.js"></script>
<script src="<?php echo base_url(); ?>public/ll/LatLngUtil.js"></script>
<script src="<?php echo base_url(); ?>public/ll/LineUtil.Intersect.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Polygon.Intersect.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Polyline.Intersect.js"></script>
<script src="<?php echo base_url(); ?>public/ll/TouchEvents.js"></script>

<script src="<?php echo base_url(); ?>public/ll/DrawToolbar.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Feature.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.SimpleShape.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Polyline.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Marker.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Circle.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.CircleMarker.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Polygon.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Draw.Rectangle.js"></script>

<script src="<?php echo base_url(); ?>public/ll/EditToolbar.js"></script>
<script src="<?php echo base_url(); ?>public/ll/EditToolbar.Edit.js"></script>
<script src="<?php echo base_url(); ?>public/ll/EditToolbar.Delete.js"></script>

<script src="<?php echo base_url(); ?>public/ll/Control.Draw.js"></script>

<script src="<?php echo base_url(); ?>public/ll/Edit.Poly.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Edit.SimpleShape.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Edit.Rectangle.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Edit.Marker.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Edit.CircleMarker.js"></script>
<script src="<?php echo base_url(); ?>public/ll/Edit.Circle.js"></script>


<script>
    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib }),
            map = new L.Map('mapid', { center: new L.LatLng(-17.998636933474735, -63.38950296727439), zoom: 20 }),
            drawnItems = L.featureGroup().addTo(map);
    L.control.layers({
        'osm': osm.addTo(map),
        "google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
            attribution: 'google'
        })
    }, { 'drawlayer': drawnItems }, { position: 'topleft', collapsed: false }).addTo(map);
    map.addControl(new L.Control.Draw({
        edit: {
            featureGroup: drawnItems,
            poly: {
                allowIntersection: false
            }
        },
        draw: {
            polygon: {
                allowIntersection: false,
                showArea: true
            }
        }
    }));

    map.on(L.Draw.Event.CREATED, function (event) {
        var layer = event.layer;

        drawnItems.addLayer(layer);
    });

</script>