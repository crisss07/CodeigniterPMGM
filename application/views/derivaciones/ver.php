<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">ASIGNADOS</h4></h4> -->
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">CITE: <?php echo $tramite->cite; ?></h2>
                                <h4 class="font-light mt-0"></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo date("d-m-Y",strtotime($tramite->fecha)); ?></div>
                        </div>
                        <!-- <form class="floating-labels mt-5"> -->
                        <?php echo form_open('tipo_tramite/editar', array('method'=>'POST')); ?>
                            <div class="row floating-labels mt-5">
                                <div class="col-6">
                                    <div class="form-group mb-5">
                                        ARCHIVO : &nbsp; &nbsp; <a href="<?php echo base_url(); ?>public/assets/images/tramites/<?php echo $tramite->adjunto.'.pdf';?>" target='_blank'><?php echo $tramite->adjunto.'.pdf'; ?></a>
                                     </div>
                                    <div class="form-group mb-5">
                                        TIPO DE TRAMITE : <?php echo $tipo_tramite->tramite;?>
                                        <ul class="list-icons">
                                            <?php foreach ($requisitos as $lista): ?>
                                                <li><i class="fa fa-check text-info"></i> <?php echo $lista->descripcion ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                	<div class="form-group mb-5">
                                        TIPO SOLICITANTE : <?php echo $tramite->tipo_solicitante;?>
                                    </div>
                                    <div class="form-group mb-5">
                                        CEDULA DE IDENTIDAD DEL SOLICITANTE : <?php echo $cedula->ci;?>
                                    </div>
                                    <div class="form-group mb-5">
                                        SOLICITANTE : <?php echo $tramite->remitente;?>
                                    </div>
                                    <div class="form-group mb-5">
                                        OBSERVACIONES : <?php echo $tramite->observaciones;?>
                                    </div>
                                    <!-- <div class="form-group mb-5">
                                        <?php if ($tramite->tipo_solicitante == 'Propietario'){ ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipo_solicitante1" name="tipo_solicitante" class="custom-control-input" value="Propietario" checked="checked">
                                                <label class="custom-control-label" for="tipo_solicitante1">Solicitante propietario</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipo_solicitante2" name="tipo_solicitante" class="custom-control-input" value="Legal" >
                                                <label class="custom-control-label" for="tipo_solicitante2">Solicitante legal</label>
                                            </div>
                                        <?php } else {?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipo_solicitante1" name="tipo_solicitante" class="custom-control-input" value="Propietario">
                                                <label class="custom-control-label" for="tipo_solicitante1">Solicitante propietario</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipo_solicitante2" name="tipo_solicitante" class="custom-control-input" value="Legal" checked="checked">
                                                <label class="custom-control-label" for="tipo_solicitante2">Solicitante legal</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula->ci; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1">CEDULA DE IDENTIDAD DEL SOLICITANTE</label>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="remitente" name="remitente" value="<?php echo $tramite->remitente; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> SOLICITANTE</label>
                                        <input type="hidden" name="solicitante_id" id="solicitante_id" value="<?php echo $tramite->solicitante_id; ?>">
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="observaciones" name="observaciones" value="<?php echo $tramite->observaciones; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> OBSERVACIONES</label>
                                    </div>
                                   <!--  <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="input1" value="<?php echo $tramite->adjunto.'.pdf';?>
                                        " required> --> <!-- <a href="<?php //echo base_url(); ?>public/assets/images/tramites/<?php //echo $tramite->adjunto.'.pdf';?>" target='_blank'><?php //echo $tramite->adjunto.'.pdf'; ?></a> -->
                                        <!-- <span class="bar"></span>
                                        <label for="input1"> ARCHIVO</label>
                                    </div> -->
                                    <input type="hidden" name="id_tramite" value="<?php echo $tramite->tramite_id; ?>">
                                   <!--  <div class="form-group">
                                        <label>Archivo</label><?php //echo $tramite->adjunto.'.pdf'; ?>
                                        <input type="file" class="form-control" name="adjunto" value="<?php //echo $tramite->adjunto.'.pdf'; ?>">
                                    </div> -->
                                     
                                </div>
                                <!-- <div>
                                    <center><button type="submit" class="btn btn-primary">Guardar</button></center>
                                </div> -->
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><div class="col-sm-6 col-md-4 col-lg-3 f-icon"><i class="fas fa-angle-double-down"></i> SEGUIMIENTO</h4></h4>
                        <?php foreach ($flujo as $f): ?>
                            <blockquote style="background-color: #F2F2F2;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6><?php 
                                            // echo $f->fuente; 
                                            $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['fuente']))->result_array();
                                            $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                            
                                            // vdebug($organigrama_persona, false, false, true);
                                            // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                            // vdebug($persona, false, false, true);
                                            echo $persona[0]['nombres'].'&nbsp;';
                                            echo $persona[0]['paterno'].'&nbsp;';
                                            echo $persona[0]['materno'].'&nbsp;';
                                        ?></h6>
                                        <h6><?php 
                                            $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['fuente']))->result_array();
                                            $cargo = $this->db->get_where('tramite.cargo', array('cargo_id'=>$organigrama_persona[0]['cargo_id']))->result_array();
                                            echo $cargo[0]['descripcion'].'&nbsp;';
                                        ?></h6>
                                        <?php if ($f['cite'] != null) {?>
                                            <h6><?php echo $f['cite']; ?></h6>
                                        <?php } ?>
                                        <h6><?php echo $f['descripcion']; ?></h6>
                                        <h6><?php echo $f['fecha']; ?></h6>
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <h6><?php 
                                            $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['destino']))->result_array();
                                            $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                            // vdebug($organigrama_persona, false, false, true);
                                            // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                            // vdebug($persona, false, false, true);
                                            echo $persona[0]['nombres'].'&nbsp;';
                                            echo $persona[0]['paterno'].'&nbsp;';
                                            echo $persona[0]['materno'].'&nbsp;';
                                        ?></h6>
                                        <h6><?php 
                                                    $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['destino']))->result_array();
                                                    $cargo = $this->db->get_where('tramite.cargo', array('cargo_id'=>$organigrama_persona[0]['cargo_id']))->result_array();
                                                    echo $cargo[0]['descripcion'].'&nbsp;';
                                                    
                                             ?></h6>
                                            <?php if ($f['estado'] == 0) {?>
                                                <a href=""  class="btn btn-primary footable-edit">Recibido/Derivado</a>
                                            <?php } 
                                            if ($f['estado'] == 1) {?>
                                                <a href=""  class="btn btn-primary footable-edit">Recibido/Pendiente</a>
                                            <?php } 
                                             if ($f['estado'] == 2) {?>
                                                <a href=""  class="btn btn-primary footable-edit">Recibido/Archivado</a>
                                            <?php } ?>
                                    </div>
                                </div>
                            </blockquote>   
                        <?php endforeach; ?>
                        <center><a href="<?php echo base_url();?>derivaciones/listado" class="btn btn-info footable-edit" style="width: 50%;">Atras</a></center>  
                       
                    </div>
                </div>

            </div>
            
                
            
        </div>
    </div>
</div>
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
                <!-- <?php //echo form_close(); ?> -->
            </div> 
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#cedula").focusout(function(){
        var ci = $("#cedula").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajax({
            url: '<?php echo base_url(); ?>persona/ajax_verifica_cedula/',
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
        var csrf_test_name = $('#csrf_test_name').val();
        var lqs=document.cookie.split('=');
        var tok = lqs[1];
        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>Persona/guardar_solicitante/",
            dataType: 'json',
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento,'<?php echo $this->security->get_csrf_token_name(); ?>' : tok, direccion:direccion, email:email, telefono_fijo:telefono_fijo, telefono_celular:telefono_celular},
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

               //window.location.reload();
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    }
</script>
