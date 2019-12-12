<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" type="text/css">


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Registro de Usuario</h3>
                                <h5 class="card-title">Datos de Usuario</h5>
                                <!--<form class="needs-validation" action="Usuario/registra" method="POST">-->


                                    <?php echo form_open_multipart('Usuario/do_upload', array('method'=>'POST')); ?>

                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <center class="mt-4"><div class="card">
                                                                                <div class="card-body">
                                                                                    <label for="input-file-now-custom-1"></label>
                                                                                    <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="<?php echo base_url(); ?>public/assets/images/users/perfil.jpg" name="adjunto" accept=".jpg,.jpeg,.png"/>
                                                                                </div>
                                                                            </div>
                                                            <h4 class="card-title mt-2" id="nombres1"></h4>
                                                            <h4 class="card-title mt-2" id="apellidos1"></h4>
                                                            <!-- <h6 class="card-subtitle" id="apellidos11"></h6> -->
                                                            
                                                        </center>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                                <div class="card">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Datos Personales</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Datos de Usuario</a> </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                       
                                                        <div class="tab-pane active" id="settings" role="tabpanel">
                                                            <div class="card-body">
                                                                    

                                                                    <div class="form-row">
                                                                        <div class="col-lg-6 col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-6 text-right col-form-label">Carnet de Identidad</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" name="ci" id="ci1">
                                                                                    <small class="form-control-feedback"> Coloque el Carnet de Identidad </small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-lg-6 col-md-12">
                                                                            <button type="button" class="btn btn-success" onclick="buscar();">Buscar</button>
                                                                        </div>
                                                                        <!--/span-->
                                                                    </div>

                                                                    <div class="form-row">

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Nombres</label>
                                                                            <input type="text" class="form-control" name="nombress" id="nombress" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Apellido Paterno</label>
                                                                            <input type="text" class="form-control" name="paternos" id="paternos" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Apellido Materno</label>
                                                                            <input type="text" class="form-control" name="maternos" id="maternos" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Fecha de Nacimiento</label>
                                                                            <input type="text" class="form-control" name="fec_nacimientos" id="fec_nacimientos" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div>
                                                                            <input type="text" hidden name="estados" id="estados">
                                                                        </div>

                                                                        <div>
                                                                            <input type="text" hidden name="persona_id" id="persona_idd">
                                                                        </div>
                                                                       
                                                                    </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="profile" role="tabpanel">
                                                            <div class="card-body">
                                                                <div class="form-row">

                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="validationCustom03">Oficina</label>
                                                                            <select class="form-control custom-select"  id="organigrama_id" name="organigrama_id"  />
                                                                                <option>Seleccionar oficina</option>
                                                                            <?php foreach($organigramas as $olista){ ?>
                                                                                <option value="<?php echo $olista->organigrama_id; ?>"><?php echo $olista->unidad; ?></option>
                                                                            <?php } ?>
                                                                            </select>   
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid city.
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-5 mb-3">
                                                                        <label for="validationCustom04">Cargo</label>
                                                                            <select class="form-control custom-select"  id="cargo_id" name="cargo_id"  />
                                                                                <option>Seleccionar cargo</option>
                                                                            <?php foreach($cargos as $clista){ ?>
                                                                                <option value="<?php echo $clista->cargo_id; ?>"><?php echo $clista->descripcion; ?></option>
                                                                            <?php } ?>
                                                                            </select>   
                                                                    </div>
                                                                     <div class="col-md-3 mb-3">
                                                                        <label for="recipient-name" class="control-label">Fecha de alta</label>
                                                                        <input type="date" class="form-control" id="fec_alta" name="fec_alta">
                                                                    </div>
                                                                </div>

                                                                <h5 class="card-title">Perfil y Rol de Usuario</h5>
                                                                    
                                                                    <div class="form-row">

                                                                        <?php $lista = $this->db->query("SELECT * FROM public.perfil  WHERE activo = '1' ORDER BY perfil_id ASC")->result();
                                                                        ?>                                      

                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationCustom03">Perfil</label>
                                                                                <select class="form-control custom-select"  id="perfil_id" name="perfil_id"  />
                                                                                    <?php foreach ($lista as $liss) { ?>
                                                                                        <option value="<?php echo $liss->perfil_id; ?>"><?php echo $liss->perfil; ?>
                                                                                        </option>
                                                                                   <?php } ?>
                                                                                </select>   
                                                                            <div class="invalid-feedback">
                                                                                Please provide a valid city.
                                                                            </div>
                                                                        </div>

                                                                        <?php $lista1 = $this->db->query("SELECT * FROM public.rol  WHERE activo = '1' ORDER BY rol_id ASC")->result();
                                                                         ?>


                                                                        <div class="col-md-3 mb-3">
                                                                            <label for="validationCustom04">Rol</label>
                                                                                <select class="form-control custom-select"  id="rol_id" name="rol_id"  />
                                                                                    
                                                                                       <?php foreach ($lista1 as $liss1) { ?>
                                                                                        <option value="<?php echo $liss1->rol_id; ?>"><?php echo $liss1->rol; ?>
                                                                                        </option>
                                                                                   <?php } ?>
                                                                                </select>   
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="card-title">Usuario Contrase&ntilde;a</h5>
                                                                    <div class="form-row">
                                                                        <div class="col-md-4 mb-3">
                                                                                <label for="validationCustom02">Nombre de Usuario</label>
                                                                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-3">
                                                                                <label for="validationCustom02">Contrase&ntilde;a</label>
                                                                                <input type="text" class="form-control" id="validationCustom02" name="contrasenia" placeholder="Contrase&ntilde;a" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                        </div>

                                        
                                    </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
    </div>
</div>
                <!-- ============================================================== -->
<script>
function alerta_ci(){
Swal.fire({
  icon: 'error',
  title: 'Error...',
  text: 'El Carnet de Identidad no es Valido!'
})
//location.reload();
}
</script>

<script type="text/javascript">
function buscar()
    {
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Usuario/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                if (data.estado == 'registrado') {
                   
                    $('#nombres1').html(data.nombres);
                    $('#apellidos1').html(data.apellidos);
                    $('#nombress').val(data.nombres);
                    $('#paternos').val(data.paterno);
                    $('#maternos').val(data.materno);
                    $('#fec_nacimientos').val(data.fec_nacimiento);
                    $('#estados').val(data.estado);
                    $('#persona_idd').val(data.persona_id);
                }
                else
                {
                    if (data.estado == 'malo') {
                        alerta_ci();
                    }
                    else{
                        $('#nombres1').html(data.nombres);
                        $('#apellidos1').html(data.apellidos);
                        $('#nombress').val(data.nombres);
                        $('#paternos').val(data.paterno);
                        $('#maternos').val(data.materno);
                        $('#fec_nacimientos').val(data.fec_nacimiento);
                        $('#estados').val(data.estado);
                    }
                }  

            },
            error:function(jqXHR, textStatus, errorThrown) {
                
            }
        });
  }
   
</script>