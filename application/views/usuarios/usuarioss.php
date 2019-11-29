


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


                                    <?php echo form_open('Usuario/registra', array('method'=>'POST')); ?>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nombres</label>
                                            <input type="text" class="form-control" name="nombres" id="validationCustom01" placeholder="Nombres" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="paterno" id="validationCustom01" placeholder="Paterno" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Apellido Materno</label>
                                            <input type="text" class="form-control" name="materno" id="validationCustom01" placeholder="Materno" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Carnet de Identidad</label>
                                            <input type="text" class="form-control" name="ci" id="validationCustom01" placeholder="CI:" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" name="fec_nacimiento" id="validationCustom01" placeholder="Fecha de Nacimiento"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
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
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Usuario" name="usuario" required>
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





                                    <button class="btn btn-primary" type="submit">Registrar</button>
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
</div>
                <!-- ============================================================== -->






