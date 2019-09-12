<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">

<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="font-">
                <div id="map" style="width: 100%; height: 650px;"></div>
                <div id="carga_ajax_mapa"></div>
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
                            <h4 class="card-title">Edita Registro de Predio </h4>
                            <h6 class="card-subtitle">Ingrese los datos del predio </h6>
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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%;height:15px;" role="progressbar""> 30% </div>
                            </div>
                            <p></p>

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                            <?php echo form_open_multipart('predios/guarda', array('method'=>'POST')); ?>

                            <h6>Datos del terreno</h6>
                                <div class="row">
                                    <div class="col-md-9">

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                                <input autofocus type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" maxlength="11" value="<?php echo $predio[0]->codcatas; ?>" required />
                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                                <input type="number" class="form-control" step='1' id="codigo_catastral_anterior" name="codigo_catastral_anterior" value="<?php echo $predio[0]->codcatas_anterior; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nro_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="nro_inmueble" name="nro_inmueble"  value="<?php echo $predio[0]->nro_inmueble; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="distrito" step='1' name="distrito" value="<?php echo $predio[0]->distrito; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="manzana" step='1' name="manzana" value="<?php echo $predio[0]->manzana; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="predio" step='1' name="predio" value="<?php echo $predio[0]->predio; ?>" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($predio[0]); ?>

                                                <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
                                                    <option value="">Seleccione tipo</option>
                                                    <?php //echo form_dropdown('tipo_predio_id', $dc_tipos_predio); ?>
                                                    <?php foreach ($dc_tipos_predio as $d): ?>
                                                        <option value="<?php echo $d->tipo_predio_id; ?>" <?php echo $predio[0]->tipo_predio_id == $d->tipo_predio_id ?' selected ':''?>><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="zona_econo"> Zona eco : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="zona_econo" name="zona_econo" maxlength="5" value="<?php echo $predio[0]->zona_econo; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="zonaurb_id" name="zonaurb_id" required />
                                                    <option value="">Seleccione zona</option>
                                                    <?php foreach ($dc_zona_urbana as $d): ?>
                                                        <option value="<?php echo $d->zonaurb_id; ?>" <?php echo $predio[0]->zonaurb_id == $d->zonaurb_id ?' selected ':''?>><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="n_puerta"> Numero puerta : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="n_puerta" name="nro_puerta" value="<?php echo $predio[0]->nro_puerta; ?>" required />
                                            </div>
                                        </div>
                                        <?php 
                                            $latlong = explode(",", $predio[0]->latlong);
                                         ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="latitud"> Latitud : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" maxlength="13" id="latitud" name="latitud" value="<?php echo $latlong[0]; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="longintud"> Longitud : <span class="text-danger">*</span> </label>
                                                <!-- <input type="text" class="form-control" id="longitud" name="longitud">  -->
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="longitud" id="longitud" maxlength="13" value="<?php echo $latlong[1]; ?>" required />
                                                    <div class="input-group-append">
                                                        <button class="btn btn-warning" type="button" id="google_maps" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="muestra_mapa();">Mapa</button>
                                                    </div>
                                                </div>
                                                 <!-- <img src="../assets/images/alert/model2.png" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-fluid" required /> -->
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' id="superficie_geo" name="superficie_geo" value="<?php echo $predio[0]->superficie_geo; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' id="superficie_campo" name="superficie_campo" min="1" value="<?php echo $predio[0]->superficie_campo; ?>" required />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' id="superficie_legal" name="superficie_legal" min="1" value="<?php echo $predio[0]->superficie_legal; ?>" required />
                                            </div>
                                        </div>

                                        </div>

                                        <?php //vdebug($predio[0]); ?>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="ubicacion_id" name="ubicacion_id" required />
                                                    <option value="">Seleccione ubicacion</option>
                                                    <?php foreach ($dc_ubicacion as $d): ?>
                                                    <option value="<?php echo $d->ubicacion_id; ?>" <?php echo $predio[0]->ubicacion_id == $d->ubicacion_id ?' selected ':''?>>
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
                                                    <option value="<?php echo $d->pendiente_id; ?>" <?php echo $predio[0]->pendiente_id == $d->pendiente_id ?' selected ':''?>>
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
                                                    <option value="<?php echo $d->nivel_id; ?>" <?php echo $predio[0]->nivel_id == $d->nivel_id ?' selected ':''?>>
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
                                                    <option value="">Seleccione forma</option>
                                                    <?php foreach ($dc_forma as $d): ?>
                                                    <option value="<?php echo $d->forma_id; ?>" <?php echo $predio[0]->forma_id == $d->forma_id ?' selected ':'' ?>>
                                                        <?php echo $d->descripcion; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #f6f6f6;">

                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="c_principal">Calle Principal : <span class="text-danger">*</span></label>

                                                    <?php //foreach ($calles as $key => $c): ?>
                                                        <?php //if ($c->gvia_tipo==1): ?>
                                                            <?php // ?>
                                                        <?php //else: ?>        
                                                        <?php //endif ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio_<?php //echo $key; ?>" name="calle_principal" class="custom-control-input" <?php //echo $c->gvia_tipo == 1 ?' checked ':'' ?> >
                                                            <label class="custom-control-label" for="customRadio_<?php //echo $key; ?>">
                                                                <?php //echo $c->nombre ?>
                                                            </label>
                                                        </div>    
                                                    <?php //endforeach ?>
                                                <!-- <input type="text" class="form-control" id="c_principal" name="principal" required /> -->
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zona">Zona : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="zona" name="zona" required />
                                            </div>
                                        </div> -->

                                        </div>

                                        <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="frente">Frente : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' id="frente" value="<?php echo $predio[0]->frente; ?>" name="frente"/d>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' id="fondo" value="<?php echo $predio[0]->fondo; ?>" name="fondo"/d>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="background-color: #f6f6f6;">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" name="clase_predio_id" required />
                                                    <option value="">Seleccione clase</option>
                                                    <?php foreach ($dc_clase_predio as $d): ?>
                                                        <option value="<?php echo $d->clase_predio_id; ?>" <?php echo $predio[0]->clase_predio_id == $d->clase_predio_id ?' selected ':''?>><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Uso Suelo : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" name="uso_suelo_id" required />
                                                    <option value="">Seleccione clase</option>
                                                    <?php foreach ($dc_uso_suelo as $d): ?>
                                                        <option value="<?php echo $d->uso_suelo_id; ?>" <?php echo $predio[0]->uso_suelo_id == $d->uso_suelo_id ?' selected ':''?>><?php echo $d->descripcion; ?></option>
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

<!--                                         <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Edificio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" name="edificio_id" required />
                                                    <option value="">Seleccione edificio</option>
                                                    <?php //foreach ($dc_edificio as $d): ?>
                                                        <option value="<?php //echo $d->edificio_id; ?>"><?php //echo $d->descripcion; ?></option>
                                                    <?php //endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
 -->
                                        </div>

                                        <div class="row">

                                        <div class="col" style="background-color: #f7f9ff;">
                                        <label for="forma_id"> Servicios Basicos : <span class="text-danger">*</span> </label>

                                            <div class="form-group row pt-12">

                                                <div class="col-sm-12">

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck99">
                                                    <label class="custom-control-label" for="customCheck99"><b>Selecciona Todos</b></label>
                                                </div>
                                                <?php // vdebug($servicios, false, false, true); ?>
                                                    <?php foreach ($listado_servicios as $key => $ls): ?>

                                                    <div class="custom-control custom-checkbox">

                                                        <?php  foreach ($servicios as $s): ?>
                                                            <?php  if ($s->servicio_id == $ls->servicio_id): ?>
                                                                <?php $seleccionado = "checked" ?>
                                                                <?php break ?>
                                                            <?php else: ?>
                                                                <?php $seleccionado = "" ?>
                                                            <?php endif ?>
                                                        <?php  endforeach ?>

                                                        <input type="checkbox" class="custom-control-input" name="servicios[<?php echo $key; ?>]" value="<?php  echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>" <?php echo $seleccionado; ?> />
                                                        <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                    </div>
                                                    <?php endforeach; ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col"  style="background-color: #fffef7;">
                                            <div class="form-group">
                                                <label for="observaciones">Observaciones : </label>
                                                <input type="text" class="form-control" id="observaciones" name="observaciones" required />
                                                <?php //vdebug($servicios); ?>
                                            </div>
                                        </div>

                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <?php $fotof = $fotos[0]->foto_fachada; ?>
                                        <?php $fotop = $fotos[0]->foto_plano_ubi; ?>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Plano</h4>
                                                <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                    OJO Solo imagenes
                                                </label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_plano" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo base_url("/public/assets/files/predios/$fotof"); ?>" />
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Fachada</h4>
                                                <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                    OJO Solo imagenes
                                                </label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_fachada" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo base_url("/public/assets/files/predios/$fotop"); ?>" required />
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap" async defer></script>

    <script type="text/javascript">

        var map;
        var lat = $("#latitud").val()
        var lon = $("#longitud").val()

        $("#google_maps").hover(function(){

            lat = $("#latitud").val();
            lon = $("#longitud").val();
            // console.log(lat + lon);
            var myLatlng = new google.maps.LatLng(lat, lon);
            var mapOptions = {
                zoom: 18,
                center: myLatlng,
                mapTypeId: 'hybrid',
            }

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Predio"
                    // label: "Aqui el predio"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
        });

        function muestra_mapa(){

        }

        function initMap() {

            var myLatlng = new google.maps.LatLng(-18.00418108,-63.39072107);
            var mapOptions = {
                zoom: 18,
                center: myLatlng,
                mapTypeId: 'hybrid'
            }

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Predio"
                    // label: "Aqui el predio"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
        }
    </script>
    <script type="text/javascript">
        $("#codigo_catastral").focusout(function(){

            var cod_catastral = $("#codigo_catastral").val();
            var predio = cod_catastral.substr(7, 10);
            var distrito = cod_catastral.substr(0, 3);
            var manzana = cod_catastral.substr(3, 4);
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            
            $("#distrito").val(distrito);
            $("#manzana").val(manzana);
            $("#predio").val(predio);

            $("#distrito").prop('readonly', true);
            $("#manzana").prop('readonly', true);
            $("#predio").prop('readonly', true);

        });

        $('#customCheck99').change(function () {
            var checkboxes = $(this).closest('form').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });

    </script>
