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
                                <h3 class="" style="text-align: center;">INFORME TECNICO
                                    </h3>
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
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nro. de tramite</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="nro_tramite" name="nro_tramite" required>
                                            </div>
                                        </div>
                                        <!--<?php $fecha //= date('d-m-Y'); ?>
                                         <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_tramite" name="fecha_tramite" value="<?php echo $fecha ?>" required>
                                            <label >Fecha<span class="text-danger">*</span></label>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Procesador : </label>
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
                                            <div class="form-group row col-12">
                                                <label for="example-text-input" class="col-3 col-form-label">Fecha de solicitud</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="date" id="fecha_solicitud" name="fecha_solicitud" required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                            ?>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Tipo de Tramite : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"   id="tipo_tramite_id" name="tipo_tramite_id"  onchange="CargarProductos(this.value);" required>
                                                    <option value=""></option>
                                                    <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="padding-bottom: 10px;">
                                            <button class="btn-info" id="adicionar_propietario">Adicionar propietario</button>
                                        </div>
                                                                               
                                        <div class="row">
                                            <div class="form-group  row col-4">
                                                <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="ci1" name="ci1" required>
                                                </div>
                                            </div>
                                            <div class="form-group  row col-8">
                                                <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="solicitante" name="solicitante" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="persona_id1" id="persona_id1">
                                        </div>
                                        <div id="listas">
                                          
                                        </div>
                                        <!--------transferencia--------------->
                                        <div class="transferencia">
                                            <div style="padding-bottom: 10px;">
                                                <button class="btn-info" id="adicionar_vendedor">Adicionar vendedor</button>
                                            </div>
                                            <div class="row">
                                                <div class="form-group  row col-4">
                                                    <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="ci2" name="ci2[]" >
                                                    </div>
                                                </div>
                                    
                                                <div class="form-group  row col-8">
                                                    <label for="example-text-input" class="col-3 col-form-label">Vendedor</label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                    </div>
                                                </div>
                                                <input type="hidden" name="persona_id2" id="persona_id2">
                                            </div>
                                            <div id="listas2">
                                            </div>
                                             <div class="row">
                                                <div class="form-group row col-4">
                                                    <label for="example-text-input" class="col-4 col-form-label">Fecha de plano aprobado</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="date" id="fecha_aprobacion_plano" name="fecha_aprobacion_plano">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--------fin de transferencia--------------->        

                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-2 col-form-label">Ubicacion</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ubicacion" name="ubicacion">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Lote</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="lote" name="lote">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Urbanizacion</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="urbanizacion" name="urbanizacion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Manzano</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="manzana" name="manzana">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Comunidad</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="comunidad" name="comunidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--------Quitar empadronamiento--------------->
                                        <div class="quitar">
                                            <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                <u><b>DOCUMENTACION PRESENTADA</b></u> <br>
                                                <b>Folio</b>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">N°  </label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="nro_folio" name="nro_folio" required>
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
                                                    <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row col-4">
                                                    <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="notario" name="notario" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-form-group ">
                                                <b>Impuestos</b>
                                            </div>
                                        </div>
                                        
                                        <!--------fin quitar empadronamiento--------------->
                                        
                                        <!--------empadronamiento--------------->
                                        <div class="empadronamiento">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Certificado de la comunidad</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="certificacion_comunidad" name="certificacion_comunidad" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Otra documentacion</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="otra_documentacion" name="otra_documentacion" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Tipo via</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="tipo_via" name="tipo_via">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Energia electrica</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="energia" name="energia" >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Agua potable</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="agua" name="agua" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Telefono</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="telefono" name="telefono" >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Alcantarillado</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="alcantarillado" name="alcantarillado" >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Construccion</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="construccion" name="construccion" >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-6">
                                                    <label for="example-text-input" class="col-4 col-form-label">Superficie construida</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" id="superficie_construida" name="superficie_construida">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <!--------fin de empadronamiento--------------->       
                                        
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
                                            Glosa del certificado de superficie (Datos del predio anterior)
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
    $("#ci1").focusout(function(){
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>tipo_tramite/verificarCedula/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);
                if (data.estado == 'si' ) {
                    // console.log('Si se esta');
                    $("#ci1").val(data.ci);
                    $('#solicitante').val(data.nombres);
                    $("#persona_id1").val(data.persona_id);
                } else {
                    $('#solicitante').val('');
                    $("#persona_id1").val('');
                    alert('no encontrado');
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
    $("#ci2").focusout(function(){
        var ci = $("#ci2").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>tipo_tramite/verificarCedula/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);

                if (data.estado == 'si' ) {
                    // console.log('Si se esta');
                    $("#ci2").val(data.ci);
                    $('#vendedor').val(data.nombres);
                    $("#persona_id2").val(data.persona_id);
                } else {
                    $('#vendedor').val(' ');
                    $("#persona_id2").val('');
                    alert('no encontrado');
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
</script>
<script type="text/javascript">
    function CargarProductos(val){  
        if(val == 1){
            //alert(' es empadronamiento');
            $('.quitar').hide();
            $('.transferencia').hide();
            $('.empadronamiento').show();
        }else if(val== 6){
            //alert('Transferencia');
             $('.transferencia').show();
             $('.empadronamiento').hide();
              $('.quitar').show();
        }else{
            $('.empadronamiento').hide();
            $('.transferencia').hide();
            $('.quitar').show();
        }
    }
</script>
<script type="text/javascript">
    var campos_max = 10;   //max de 10 campos
        var x = 0;
        $('#adicionar_propietario').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                $('#listas').append('<div class="row">\
                                        <div class="form-group  row col-4">\
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>\
                                            <div class="col-10">\
                                                <input class="form-control" type="text" id="ci'+x+'" name="ci[]">\
                                            </div>\
                                        </div>\
                                        <div class="form-group  row col-7">\
                                            <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>\
                                            <div class="col-9">\
                                                <input class="form-control" type="text" id="solicitante'+x+'" name="solicitante[]">\
                                            </div>\
                                        </div>\
                                        <input type="hidden" name="persona_id1" id="persona_id1">\
                                        <a href="#" class="remover_campo">Remover</a>\
                                    </div>');
                
                x++;
            }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
</script>
<script type="text/javascript">
    var campos_max = 10;   //max de 10 campos
        var x = 0;
        $('#adicionar_vendedor').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                $('#listas2').append('<div class="row">\
                                        <div class="form-group  row col-4">\
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>\
                                            <div class="col-10">\
                                                <input class="form-control" type="text" id="ci2'+x+'" name="ci2" required>\
                                            </div>\
                                        </div>\
                                        <div class="form-group  row col-7">\
                                            <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>\
                                            <div class="col-9">\
                                                <input class="form-control" type="text" id="vendedor'+x+'" name="vendedor" required>\
                                            </div>\
                                        </div>\
                                        <input type="hidden" name="persona_id2" id="persona_id2">\
                                        <a href="#" class="remover_campo2">Remover</a>\
                                    </div>');
                x++;
            }
        });
        // Remover o div anterior
        $('#listas2').on("click",".remover_campo2",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
</script>