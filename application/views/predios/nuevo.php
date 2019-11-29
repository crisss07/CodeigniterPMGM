<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">

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

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                 <h4 class="card-title">Registro de los datos del propietario</h4>
                            <h6 class="card-subtitle">Ingrese los datos del propietario </h6>
                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $cod_catastral; ?>
                                </button>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                                </div>
                            </div>
                            <p></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;height:15px;" role="progressbar"> 100% </div>
                            </div>
                            <p></p>

<!-- 
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="login-form" action="http://magistratura.organojudicial.gob.bo/sinarepweb/index.php" method="post" target="_blank">
                                                <p class="note">
                                                    <label hidden="" for="LoginForm_usuario">Usuario</label>      
                                                    <input hidden="" SIZE="45" name="LoginForm[username]" id="LoginForm_username" type="text" value="sarrieta" />      
                                                    <div class="errorMessage" id="LoginForm_username_em_" style="display:none"></div>  
                                                </p>
                                                <div >
                                                    <label hidden="" for="LoginForm_contrase&amp;ntilde;a">Contrase&ntilde;a</label>      
                                                    <input hidden="" name="LoginForm[password]" id="LoginForm_password" type="password" value="3966115" />   
                                                    <div class="errorMessage" id="LoginForm_password_em_" style="display:none"></div>       
                                                   
                                                </div>
                                            
                                                <div class="row buttons">
                                                    <input type="submit" name="yt0" value="Ingresar a la pagina"  />
                                                </div>

                                            </form>
                                </div>
                                <div class="col-md-6">
                                    <form id="elegir-form" action="http://magistratura.organojudicial.gob.bo/sinarepweb/index.php?r=buscarmatricula/resultado" method="post" target="_blank">        
                                        Introduzca el numero completo de la matricula o los 12 primeros numeros para obtener resultados
                                        <div class="row">
                                            Nro Matricula
                                            <input type="text" name="txtmatricula" id="txtmatricula">      
                                        </div>      
                                        <div class="row buttons">
                                            <input type="submit" name="yt0" value="Consultar" />    
                                        </div>
                                    </form>
                                </div> 
                               
                            </div>-->
                             <p class="hint">&nbsp;</p>
                            <?php echo form_open_multipart('ddrr/guardar', array('method'=>'POST')); ?>
                            <!-- <?php //echo form_open('ddrr/guardar', array('method' => 'POST')); ?> -->
                                <div class="row">
                                    <div class="col-md-6" style="background-color: #f7f9ff;">
                                        <h6>Datos propietario</h6>
                                        <div  id="registro" style="padding-top: 30px;">
                                            <div class="button-box">
                                                <?php if ( $this->cart->total_items() < 100) { ?>
                                                    <button <?php echo $verifica['alta']; ?> class="btn btn-success waves-effect waves-light " type="button"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Propietario</button><span class="text-danger ">*</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="portlet-body" style="padding-top: 30px;">
                                          <!-- <form action="SendMatCivController/actualizar_carrito" method="post"> -->
                                            <!-- <?php //echo form_open('persona/insertar', array('method' => 'POST')); ?> -->
                                            <table cellpadding="6" cellspacing="1" class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2" border="1">
                                                <tr>
                                                    <th style="display:none;">RowId</th>
                                                    <th>N°</th>
                                                    <th>Nombre</th>
                                                    <th >Cedula de identidad</th>
                                                    <th >Porcentaje de participacion</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                                <?php
                                                    $i = 1;
                                                    $count = 1;
                                                ?>
                                                <?php foreach ($this->cart->contents() as $items): ?>
                                                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                    <tr>
                                                        <td><?php echo $count;?></td>
                                                        <td style="display: none"><?php echo $items['id']; ?></td>
                                                        <td><?php echo $items['name']; ?></td>
                                                        <td><?php echo $items['price']; ?></td>
                                                        <td><?php echo $items['qty']; ?></td>
                                                        <td><a href="<?php echo site_url('persona/remove/' . $items['rowid']).'/'.$cod_catastral; ?>" class="eliminarPersona btn btn-danger btn-xs" title="Eliminar" data-toggle="tooltip" ><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $i++;
                                                        $count++;
                                                    ?>
                                                <?php endforeach; ?>
                                                <?php if ($count == 1): ?>
                                                    <tr><td colspan="5" style="text-align: center;">No existe propietarios</td></tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td colspan="2"> </td>
                                                    <td class="right"><strong>Total</strong></td>
                                                    <td id="total" class="right"><?php echo $this->cart->total_items(); ?> %</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <?php if ( $this->cart->total_items() < 100) { ?>
                                            <div class="alert alert-info">
                                                <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Información</h3> Mientras el total del porcentaje de participacion no llegue al 100% no podra finalizar el registro.
                                            </div>
                                        <?php } ?>
                                        <!-- <iframe src="http://magistratura.organojudicial.gob.bo/sinarepweb/index.php" title="iframe Example 1" width="100%" height="300"> -->
                                        <iframe src="<?php echo base_url(); ?>Ddrr/mostrar" title="iframe Example 1" width="100%" height="300">
                                            <p>Your browser does not support iframes.</p>
                                        </iframe>
                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="background-color: #f6f6f6;">
                                            <div class="col-md-0">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="predio_id" value="<?php echo $cod_catastral ?>" required />
                                                </div>
                                            </div>
                                           <!--  <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Numero de matricula folio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="nro_matricula_folio" required />
                                                </div>
                                            </div> -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Numero de folio : <span class="text-danger">*</span> </label>
                                                    <input type="text" id="nro_folio" class="form-control" name="nro_folio" placeholder="_.__._.__._______" title="Introducir numero de folio" input-mask="_.__._.__._______">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha de folio : <span class="text-danger">*</span> </label>
                                                    <input type="date" class="form-control date-inputmask" name="fecha_folio" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #fffef7;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="participants1">Superficie legal : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="superficie_legal" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #fffef7;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="participants1">Nombre del notario : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="nom_notario" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #f6f6f6;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Numero de testimonio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="nro_testimonio" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha de testimonio : <span class="text-danger">*</span> </label>
                                                    <input type="date" class="form-control date-inputmask" name="fecha_testimonio" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #fffef7;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Partida : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="partida" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Partida computarizada : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="partida_computarizada" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #f6f6f6;">
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label for="participants1">Foja : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="foja" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #fffef7;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Libro : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="libro" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha de registro de libro : <span class="text-danger">*</span> </label>
                                                    <input type="date" class="form-control date-inputmask" name="fecha_reg_libro" required />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions col-md-12 offset-md-11">
                                        <?php if ( $this->cart->total_items() == 100) { ?>
                                            <button type="submit" class="btn waves-effect waves-light btn-info">Finalizar registro</button>
                                        <?php } ?>

                                    </div>
                                </div>



                            <?php echo form_close(); ?>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel1">Registrar datos del propietario</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <?php if (validation_errors()): ?>
                                           <div class="alert alert-error">
                                              <?php echo validation_errors(); ?>
                                           </div>
                                        <?php endif; ?>

                                        <div class="modal-body">
                                            <!--<form action="<?php //echo base_url();?>persona/insertar" method="POST">-->
                                            <!-- <?php //echo form_open('persona/insertar', array('method' => 'GET')); ?> -->
                                            <!--<input type="hidden" id="<?php //echo $this->security->get_csrf_token_name(); ?>" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" />-->
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label for="ci"> Cedula de identidad : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="ci1" name="ci1" />
                                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                                <small id="msg_sucess_catastral" class="form-control-feedback" style="display: none; color: #31B404"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Nombres : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="nombres1" name="nombres1"/>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Paterno : <span class="text-danger">*</span></label>
                                                                <input type="text" name="paterno1" id="paterno1" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Materno : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="materno1" id="materno1"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Fecha de nacimiento : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control  date-inputmask" name="fec_nacimiento1" id="fec_nacimiento1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Direccion : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="direccion1" id="direccion1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Email : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="email1" id="email1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Telefono fijo </label>
                                                                <input type="text" name="telefono_fijo1" id="telefono_fijo1" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Telefono celular : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="telefono_celular1" id="telefono_celular1"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i= 100 - $this->cart->total_items(); ?>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Porcentaje : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="porcen_parti1" name="porcen_parti1" value="<?php echo $i; ?>" max="<?php $i; ?>"/>
                                                                <small id="msg_alerta_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                                <small id="alerta-porcentaje" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                                <small id="no-valido" class="form-control-feedback" style="display: none; color: #ff0000"></small>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-actions">
                                                    <button class="btn waves-effect waves-light btn-info" type="button" onclick="confirma()"> <i class="fa fa-check"></i>Guardar</button>
                                                    <button class="btn btn-danger" type="button"  data-dismiss="modal">Cerrar</button>
                                                </div>
                                            <!-- <?php //echo form_close(); ?> -->
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">

    $("#ci1").focusout(function(){
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>persona/ajax_verifica/',
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
                    $("#msg_error_catastral").hide();
                    $("#msg_sucess_catastral").show();
                    $("#msg_alerta_catastral").show();
                    $("#ci").val(data.ci);
                    $("#msg_sucess_catastral").html('La persona existe: '+data.ci);
                    $('#nombres1').val(data.nombres);
                    $("#nombres1").prop("disabled", true);
                    $('#paterno1').val(data.paterno);
                    $("#paterno1").prop("disabled", true);
                    $('#materno1').val(data.materno);
                    $("#materno1").prop("disabled", true);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                    $("#fec_nacimiento1").prop("disabled", true);
                    $("#direccion1").val(data.direccion);
                    $("#direccion1").prop("disabled", true);
                    $("#email1").val(data.email);
                    $("#email1").prop("disabled", true);
                    $("#telefono_fijo1").val(data.telefono_fijo);
                    $("#telefono_fijo1").prop("disabled", true);
                    $("#telefono_celular1").val(data.telefono_celular);
                    $("#telefono_celular1").prop("disabled", true);
                    $("#msg_alerta_catastral").html('Podria cambiar el porcentaje de participacion del propietario que sea menor o igual a lo indicado');

                } else {
                    if (data.estado == 'segip') {
                        $("#msg_error_catastral").hide();
                    $("#msg_sucess_catastral").show();
                    $("#msg_alerta_catastral").show();
                        $("#ci").val(data.ci);
                    $("#msg_sucess_catastral").html('Esta registrado en el segip la persona con cedula de identidad Numero: '+data.ci);
                    $('#nombres1').val(data.nombres);
                    $("#nombres1").prop("disabled", true);
                    $('#paterno1').val(data.paterno);
                    $("#paterno1").prop("disabled", true);
                    $('#materno1').val(data.materno);
                    $("#materno1").prop("disabled", true);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                    $("#fec_nacimiento1").prop("disabled", true);
                    $("#direccion1").val('');
                    $("#direccion1").prop("disabled", false);
                    $("#email1").val('');
                    $("#email1").prop("disabled", false);
                    $("#telefono_fijo1").val('');
                    $("#telefono_fijo1").prop("disabled", false);
                    $("#telefono_celular1").val('');
                    $("#telefono_celular1").prop("disabled", false);
                    $("#msg_alerta_catastral").html('Podria cambiar el porcentaje de participacion del propietario que sea menor o igual a lo indicado');
                    }else{
                    $("#msg_sucess_catastral").hide();
                     $("#msg_error_catastral").show();
                     $("#msg_alerta_catastral").hide();
                    $("#msg_error_catastral").html('La persona no existe ni en la base de datos ni en el segip: '+data.ci);
                    $('#nombres1').val('');
                    $('#paterno1').val('');
                    $('#materno1').val('');
                    $('#fec_nacimiento1').val('');
                    $("#nombres1").prop("disabled", false);

                    $("#paterno1").prop("disabled", false);

                    $("#materno1").prop("disabled", false);

                    $("#fec_nacimiento1").prop("disabled", false);
                    $("#direccion1").val('');
                    $("#direccion1").prop("disabled", false);
                    $("#email1").val('');
                    $("#email1").prop("disabled", false);
                    $("#telefono_fijo1").val('');
                    $("#telefono_fijo1").prop("disabled", false);
                    $("#telefono_celular1").val('');
                    $("#telefono_celular1").prop("disabled", false);
                }

                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });

    function confirma(){
        var ci = $('#ci1').val();
        var nombres = $('#nombres1').val();
        var paterno = $('#paterno1').val();
        var materno = $('#materno1').val();
        var fec_nacimiento = $('#fec_nacimiento1').val();
        var porcen_parti = $('#porcen_parti1').val();
        var direccion = $('#direccion1').val();
        var email = $('#email1').val();
        var telefono_fijo = $('#telefono_fijo1').val();
        var telefono_celular = $('#telefono_celular1').val();
        var csrf_test_name = $('#csrf_test_name').val();
        var lqs=document.cookie.split('=');
        var token = lqs[1];
        var cod_catastral = $('#cod_catastral').val();

        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>Persona/insertar/",
            dataType: 'json',
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento,porcen_parti:porcen_parti,'<?php echo $this->security->get_csrf_token_name(); ?>': '<?PHP echo $this->security->get_csrf_hash(); ?>', direccion:direccion, email:email, telefono_fijo:telefono_fijo, telefono_celular:telefono_celular ,cod_catastral:cod_catastral},
            success: function (data, textStatus, jqXHR){
                if (data.estado == 'sobrepasa') {
                    $("#msg_error_catastral").hide();
                    $("#msg_sucess_catastral").show();
                    $("#msg_alerta_catastral").hide();
                    $("#no-valido").show();
                    $("#ci1").val(data.ci);
                    $('#nombres1').val(data.nombres);
                    $('#paterno1').val(data.paterno);
                    $('#materno1').val(data.materno);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                    $('#porcen_parti1').val(data.porcen_parti);
                    $("#no-valido").html('El porcentaje es menor de lo q se esperaba');
                     //swal("¡BIEN!", "Se adiciono con exito a la persona", "success");
                }else if(data.estado == 'guardado'){
                    window.location.reload();
                    //swal("¡MAL!", "Porcentaje sobrepaso el 100%", "error");
                }else{
                    $("#msg_error_catastral").hide();
                    $("#msg_sucess_catastral").show();
                    $("#msg_alerta_catastral").hide();
                    $("#no-valido").show();
                    $("#ci1").val(data.ci);
                    $('#nombres1').val(data.nombres);
                    $('#paterno1').val(data.paterno);
                    $('#materno1').val(data.materno);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                    $('#porcen_parti1').val(data.porcen_parti);
                    $("#no-valido").html('Llene correctamente');
                     //swal("¡BIEN!", "Se adiciono con exito a la persona", "success");
                }
               //window.location.reload();
            },
                error:function(jqXHR, textStatus, errorThrown) {
                    // alert("error");
                }
        });
    }
</script>
<script type="text/javascript">
    function validate_int(myEvento) {
        if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
            dato = true;
        } else {
            dato = false;
        }
      return dato;
    }
    function folio_mask() {
        var myMask = "_.__._.__._______";
        var myCaja = document.getElementById("nro_folio");
        var myText = "";
        var myNumbers = [];
        var myOutPut = ""
        var theLastPos = 1;
        myText = myCaja.value;
        for (var i = 0; i < myText.length; i++) {
            if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
                myNumbers.push(myText.charAt(i));
            }
        }
        for (var j = 0; j < myMask.length; j++) {
            if (myMask.charAt(j) == "_") { //replace "_" by a number
                if (myNumbers.length == 0)
                    myOutPut = myOutPut + myMask.charAt(j);
                else {
                    myOutPut = myOutPut + myNumbers.shift();
                    theLastPos = j + 1; //set caret position
                }
            }else{
                myOutPut = myOutPut + myMask.charAt(j);
            }
        }
            document.getElementById("nro_folio").value = myOutPut;
            document.getElementById("nro_folio").setSelectionRange(theLastPos, theLastPos);
    }
    document.getElementById("nro_folio").onkeypress = validate_int;
    document.getElementById("nro_folio").onkeyup = folio_mask;
</script>
<script type="text/javascript">
    $('.eliminarPersona').on("click", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal({
        title: 'Está seguro?',
        text: "No podrá recuperar una vez sea eliminado!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "No, Cancelar!",
        confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(url);
                swal("Eliminado!", "Su información ha sido eliminado!", "success");
            }else{
                swal("Cancelado", "Su información está a salvo! :)", "error");
            }
        });
    });
</script>
