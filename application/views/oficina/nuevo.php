
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Iniciar tramite</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Nuevo</a></li>
                <li class="active">Tramite</li>
            </ol>
        </div>
    </div>
</section>

<section class="blog_area">
    <div class="whole-wrap">
        <div class="container">
            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30 title_color">Iniciar tramite</h3>
                        <?php echo form_open_multipart('Tipo_tramite/do_upload', array('method'=>'POST')); ?>
                        <!-- <form action="#"> -->
                            <div class="row row_alinaer">
                                <div class="col-lg-2 alinear">Tramite : </div>
                                <div class="col-lg-10">
                                    <div class="input-group-icon mt-10">
                                        <div class="form-select" id="default-select">
                                            <select id="tipo_tramite_id" name="tipo_tramite_id">
                                                <option selected="">Escoger</option>
                                                <?php foreach ($tramites as $valores): ?>
                                                    <option value="<?php echo $valores->tipo_tramite_id; ?>"><?php echo $valores->tramite; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php 
                                    $año = date("Y");
                                    $cite = $this->db->query("SELECT * FROM tramite.numero_tramite WHERE gestion='$año' AND activo = '1'")->row();
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
                            <div class="row row_alinaer">
                                <div class="col-lg-3 alinear">Cedula de identidad : </div>
                                <div class="col-lg-9">
                                    <input type="text" name="cedula" id="cedula" required class="single-input">
                                </div>
                            </div>
                            <div class="row row_alinaer">
                                <div class="col-lg-3 alinear">Propietario : </div>
                                <div class="col-lg-9">
                                    <input type="text" name="remitente" id="remitente" required class="single-input">
                                </div>
                            </div>
                           
                            <input type="hidden" name="solicitante_id" id="solicitante_id" required class="single-input">
                               
                            <div class="row row_alinaer">
                                <div class="col-lg-3 alinear">Tipo de solicitante : </div>
                                <div class="col-lg-9">
                                    <div class="input-group-icon mt-10">
                                        <div class="form-select" id="default-select">
                                            <select id="tipo_solicitante" name="tipo_solicitante">
                                                <option selected="">Escoger</option>
                                                <option value="Propietario">Propietario</option>
                                                <option value="Juridico">Juridico</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                        <div class="blog_right_sidebar">
                    
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Tramite</h4>
                                <p>
                                    Para iniciar un nuevo tramite, necesita el numero de folio, una vez finalizado, apersonarse por las oficinas de catastro para continuar con el tramite, con los documentos originales
                                </p>
                                <div class="br"></div>                          
                            </aside>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Registrar datos del nuevo solicitante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!--<form action="<?php //echo base_url();?>persona/insertar" method="POST">-->
                <!-- <?php //echo form_open('persona/insertar', array('method' => 'GET')); ?> -->
                <!--<input type="hidden" id="<?php //echo $this->security->get_csrf_token_name(); ?>" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" />-->
                <?php echo form_open_multipart('Persona/guardar_solicitante', array('method'=>'POST')); ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="ci"> Cedula de identidad : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="ci1" name="ci1" />
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
                    </div>
                    <div class="form-actions">
                        <button class="btn waves-effect waves-light btn-info" type="button" onclick="confirmar()"> <i class="fa fa-check"></i>Guardar</button>
                        <button class="btn btn-danger" type="button"  data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<style type="text/css">
    .alinear{
        display: flex; 
        align-items: center;
        padding-bottom: 10px;
    }
    .row_alinaer{
        padding-bottom: 10px;
    }
</style>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $("#cedula").focusout(function(){
        var ci = $("#cedula").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajax({
            url: '<?php echo base_url(); ?>Persona/ajax_verifica_cedula/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                //alert(data.message);
                if(data.estado=='si'){
                    $('#remitente').val(data.nombres+' '+data.paterno+' '+data.materno);
                    $('#solicitante_id').val(data.solicitante_id);
                }else{
                    $('#remitente').val('');
                    $('#solicitante_id').val('');
                    //$('#remitente').prop('disabled', true);
                    if (data.estado == 'segip') {
                        $("#ci1").val(data.ci);
                        $("#msg_sucess_catastral").html('Esta registrado en el segip la persona con cedula de identidad Numero: '+data.ci);
                        $('#nombres1').val(data.nombres);
                        $('#paterno1').val(data.paterno);
                        $('#materno1').val(data.materno);
                        $('#fec_nacimiento1').val(data.fec_nacimiento);
                        $("#direccion1").val('');
                        $("#email1").val('');
                        $("#telefono_fijo1").val('');
                        $("#telefono_celular1").val('');
                    }else{
                        $("#ci1").val(data.ci);
                        $("#msg_error_catastral").html('La persona no existe ni en la base de datos ni en el segip: '+data.ci);
                        $('#nombres1').val('');
                        $('#paterno1').val('');
                        $('#materno1').val('');
                        $('#fec_nacimiento1').val('');
                        $("#direccion1").val('');
                        $("#email1").val('');
                        $("#telefono_fijo1").val('');
                        $("#telefono_celular1").val('');
                    }
                    $('#exampleModal').modal('toggle');
                    //$('#exampleModal').modal('show');
                    //$('#exampleModal').modal('hide');
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
</script>
<script type="text/javascript">
    function confirmar(){
        var ci = $('#ci1').val();
        var nombres = $('#nombres1').val();
        var paterno = $('#paterno1').val();
        var materno = $('#materno1').val();
        var fec_nacimiento = $('#fec_nacimiento1').val();
        var direccion = $('#direccion1').val();
        var email = $('#email1').val();
        var telefono_fijo = $('#telefono_fijo1').val();
        var telefono_celular = $('#telefono_celular1').val();
        //var csrf_test_name = $('#csrf_test_name').val();
        //var lqs=document.cookie.split('=');
        //var tok = lqs[1];
        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>Persona/guardar_solicitante/",
            dataType: 'json',
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento, '<?php echo $this->security->get_csrf_token_name(); ?>': '<?PHP echo $this->security->get_csrf_hash(); ?>', direccion:direccion, email:email, telefono_fijo:telefono_fijo, telefono_celular:telefono_celular},
            success: function (data, textStatus, jqXHR){ 
                if (data.estado == 'datos_invalidos') {
                    $("#ci1").val(data.ci);
                    $('#nombres1').val(data.nombres);
                    $('#paterno1').val(data.paterno);
                    $('#materno1').val(data.materno);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                }else if(data.estado == 'guardado'){
                    //alert('guardado');
                    $('#exampleModal').modal('hide');
                    $('#remitente').val(data.nombres+' '+data.paterno+' '+data.materno);
                    $('#solicitante_id').val(data.solicitante_id);
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    }
</script>
