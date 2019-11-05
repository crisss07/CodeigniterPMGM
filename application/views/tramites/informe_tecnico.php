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
<style type="text/css">
    input{
        text-transform:uppercase;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open_multipart('tipo_tramite/guardar_informe', array('method'=>'POST')); ?>
                                <h3 class="" style="text-align: center;">INFORME TECNICO</h3>
                                    <div>
                                        <input type="hidden" name="organigrama_persona_id" value="" >
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-3 col-form-label">CITE: GAMM-SMDT-TEC-Nº </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="cite" name="cite" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">A : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="a" name="a" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">VIA : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="via" name="via" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">DE</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="de" name="de" value="<?php echo $de->nombre; ?> - <?php echo $de->cargo; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">REFERENCIA</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="nro_tramite" name="nro_tramite" required>
                                            </div>
                                        </div>
                                       
                                       <?php setlocale(LC_TIME, 'es_ES');
                                        $mi_fecha = date("d-m-Y");          
                                        $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));             
                                        $Mes_Anyo = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));?>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">FECHA</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" id="fecha_tramite" name="fecha_tramite" value="<?php echo $Mes_Anyo; ?>" required>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">PROCESADOR : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"  id="procesador" name="procesador" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                            <u><b>ANTECEDENTES</b></u> <br>   
                                        <b>Da curso a la siguiente solicitud</b> <br/>
                                    </div>
                                    <div class="row" >
                                        <div class="form-group row col-6">
                                            <label for="example-text-input" class="col-3 col-form-label">GAMM</label>
                                            <div class="col-9">
                                                <input class="form-control" type="text" id="de_nro_tramite" name="de_nro_tramite" required>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="example-text-input" class="col-3 col-form-label">de fecha</label>
                                            <div class="col-9">
                                                <input class="form-control" type="date" id="fecha_solicitud" name="fecha_solicitud" required>
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="row">
                                        <div class="form-group  row col-8">
                                            <label for="example-text-input" class="col-3 col-form-label">SOLICITANTE</label>
                                            <div class="col-9">
                                                <input class="form-control" type="text" id="solicitante1" name="solicitante1" required>
                                            </div>
                                        </div>
                                        <div class="form-group  row col-4">
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ci1" name="ci1" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group  row col-8">
                                            <label for="example-text-input" class="col-3 col-form-label">SOLICITANTE</label>
                                            <div class="col-9">
                                                <input class="form-control" type="text" id="solicitante2" name="solicitante2" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group  row col-4">
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ci2" name="ci2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();?>

                                    <div class="form-group row">
                                        <label for="example-month-input2" class="col-2 col-form-label">TIPO DE TRAMITE : </label>
                                        <div class="col-10">
                                            <select class="custom-select col-12"   id="tipo_tramite_id" name="tipo_tramite_id" required>
                                                <option value=""></option>
                                                <?php foreach ($lista2 as $tc): ?>
                                                <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-2 col-form-label">UBICACION</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ubicacion" name="ubicacion">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">LOTE</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="lote" name="lote">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-4 col-form-label">URBANIZACION</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" id="urbanizacion" name="urbanizacion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">MANZANO</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="manzana" name="manzana">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">COMUNIDAD</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="comunidad" name="comunidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE SEGUN TESTIMONIO</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE SEGUN MEDICION</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="quitar">
                                            <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                <u><b>DOCUMENTACION PRESENTADA</b></u> <br>
                                                <b>Carnet de identidad</b>
                                            </div>

                                            <div class="row">
                                                <div class="form-group  row col-8">
                                                    <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE </label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor" name="a_favor" required>
                                                    </div>
                                                </div>
                                                <div class="form-group  row col-4">
                                                    <label for="example-text-input" class="col-2 col-form-label">N</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="a_favor_ci1" name="a_favor_ci1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-8">
                                                    <label for="example-text-input" class="col-3 col-form-label"></label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor2" name="a_favor2" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group  row col-4">
                                                    <label for="example-text-input" class="col-2 col-form-label">N</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="a_favor_ci2" name="a_favor_ci2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                <b>Folio</b>
                                            </div>
                                            <div class="row">
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-2 col-form-label">N°  </label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="nro_folio" name="nro_folio" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-3 col-form-label">SUPERFICIE </label>
                                                    <div class="col-19">
                                                        <input class="form-control" type="text" id="superficie" name="superficie" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-8">
                                                    <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE </label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor_1" name="a_favor_1" required>
                                                    </div>
                                                </div>
                                                <div class="form-group  row col-4">
                                                    <label for="example-text-input" class="col-2 col-form-label">N</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="a_favor1_ci1" name="a_favor1_ci1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-8">
                                                    <label for="example-text-input" class="col-3 col-form-label"></label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor2_1" name="a_favor2_1" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group  row col-4">
                                                    <label for="example-text-input" class="col-2 col-form-label">N</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="a_favor1_ci2" name="a_favor1_ci2" required>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                            <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                <b>Testimonio de propiedad</b>
                                            </div>
                                            <div class="row">
                                                <div class="form-group row col-4">
                                                    <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row col-4">
                                                    <label for="example-text-input" class="col-4 col-form-label">NOTARIA</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row col-4">
                                                    <label for="example-text-input" class="col-4 col-form-label">FECHA</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">NOTARIO DR(A)</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="notario" name="notario" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-12">
                                                    <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE </label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor_2" name="a_favor_2" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-12">
                                                    <label for="example-text-input" class="col-3 col-form-label"></label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="a_favor2_2" name="a_favor2_2" required>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                <u><b>CARACTERISTICAS DE LA PROPIEDAD</b></u> <br>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE SEGUN TESTIMONIO</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="llena_st" name="llena_st" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE SEGUN MEDICION</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="llena_sm" name="llena_sm" required>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 mb-form-group ">
                                                <b>IMPUESTOS</b>
                                            </div>
                                    
                                        
                
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Años</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group ">
                                            <u><b>OBSERVACIONES</b></u>
                                        </div>
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="observaciones" name="observaciones" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group ">
                                            <b> Glosa del certificado de superficie (Datos del predio anterior)</b>
                                        </div>
                                        <div class="form-group  row">
                                            
                                            <div class="col-12">
                                                <textarea style="text-transform:uppercase;" rows="3" class="form-control" type="text" id="glosa" name="glosa" placeholder="LA SUPERFICE EN CUESTION SE ENCUENTRA UBICADA EN EX HACIENDA HUAJCHILLA, URBANIZACION LAS PALMERAS II, LOTE 3-B, MANZANO B, CON UNA SUPERFICIE DE 715,16 M2 SEGUN MEDICION REGISTRADO EN LA UNIDAD DE CATASTRO, DEL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA"></textarea>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="boton" value="generar" class="btn waves-effect waves-light btn-block btn-info">Guardar</button>
                                        </div>
                                        
                                    </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-12" >
                <div class="card" style="background: #0489B1;">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <!-- <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div> -->
                            <div class="pl-3">
                                <h3 style="color: white;" class="font-medium">Forma de llenar el formulario</h3>
                                <!-- <h6 style="color: white;">UIUX Designer</h6> -->
                            </div>
                        </div>
                        <div class="row mt-5">
                            <!-- <div class="col border-right">
                                <h2 style="color: white;" class="font-light">14</h2>
                                <h6 style="color: white;" >Photos</h6></div>
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">54</h2>
                                <h6 style="color: white;">Videos</h6></div>
                            <div class="col">
                                <h2 style="color: white;" class="font-light">145</h2>
                                <h6 style="color: white;" >Tasks</h6></div> -->
                            

                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>
<script type="text/javascript">
    $("#nro_tramite").focusout(function(){
        var valor = $('#nro_tramite').val();
        $('#de_nro_tramite').val(valor);
    });
    $("#solicitante1").focusout(function(){
        var valor = $('#solicitante1').val();
        $('#a_favor').val(valor);
        $('#a_favor_1').val(valor);
        $('#a_favor_2').val(valor);
    });
    $("#ci1").focusout(function(){
        var valor = $('#ci1').val();
        $('#a_favor_ci1').val(valor);
        $('#a_favor1_ci1').val(valor);
        
    });
    $("#solicitante2").focusout(function(){
        var valor = $('#solicitante2').val();
        $('#a_favor2').val(valor);
        $('#a_favor2_1').val(valor);
        $('#a_favor2_2').val(valor);
    });
    $("#ci2").focusout(function(){
        var valor = $('#ci2').val();
        $('#a_favor_ci2').val(valor);
        $('#a_favor1_ci2').val(valor);
        
    });
    $("#superficie_testimonio").focusout(function(){
        var valor = $('#superficie_testimonio').val();
        $('#superficie').val(valor);
        $('#llena_st').val(valor);
        
    });
    $("#superficie_medicion").focusout(function(){
        var valor = $('#superficie_medicion').val();
        $('#llena_sm').val(valor);
        
    });
</script>