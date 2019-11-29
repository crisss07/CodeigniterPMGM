<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">


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
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nombres</label>
                                            <input type="text" class="form-control" name="nombres" id="validationCustom01" placeholder="First name" value="Jose Jose" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="paterno" id="validationCustom01" placeholder="First name" value="Perez" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Apellido Materno</label>
                                            <input type="text" class="form-control" name="materno" id="validationCustom01" placeholder="First name" value="Perez" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Carnet de Identidad</label>
                                            <input type="text" class="form-control" name="ci" id="validationCustom01" placeholder="First name" value="9876543" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" name="fec_nacimiento" id="validationCustom01" placeholder="First name"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                       
                                    </div>
                                    <h5 class="card-title">Perfil y Rol de Usuario</h5>
                                    <div class="form-row">

                                    <?php $lista1 = $this->db->query("SELECT * FROM public.perfil  WHERE activo = '1' ORDER BY perfil_id ASC")->result();
                                    ?>                                      

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Perfil</label>
                                                <select class="form-control custom-select"  id="perfil_id" name="perfil_id"  />
                                                    <?php foreach ($lista1 as $liss) { ?>
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
                                           
                                             <?php foreach ($lista1 as $key => $ls): ?>
                                                            <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="servicios[<?php echo $key; ?>]" value="<?php echo $ls->rol_id; ?>" id="customCheck<?php echo $key; ?>">
                                                                    <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->rol ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Usuario Contrase&ntilde;a</h5>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Nombre de Usuario</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Contrase&ntilde;a</label>
                                                <input type="password" class="form-control" id="validationCustom02" placeholder="Contrase&ntilde;a" required>
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

                    <!--
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content ">
                                <h4 class="card-title">Step wizard</h4>
                                <h6 class="card-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website</a></h6>
                                <form action="#" class="tab-wizard vertical wizard-circle">
                                     Step 1 
                                    <h6>Informaci&oacute;n de la Persona</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstName1">Nombres :</label>
                                                    <input type="text" class="form-control" id="nombres"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lastName1">Apellido Paterno :</label>
                                                    <input type="text" class="form-control" id="paterno"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emailAddress1">Apellido Materno :</label>
                                                    <input type="text" class="form-control" id="materno"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber1">Carnet de Identidad :</label>
                                                    <input type="text" class="form-control" id="ci"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emailAddress1">Fecha de Nacimiento :</label>
                                                    <input type="date" class="form-control" id="fec_nacimiento"> </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                    <!-- Step 2 
                                    <h6>Tipo de Acceso</h6>
                                    <section>

                                        <?php $lista1 = $this->db->query("SELECT * FROM public.perfil  WHERE activo = '1' ORDER BY perfil_id ASC")->result();
                                       ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle1">Perfil :</label>
                                                        <select class="form-control custom-select"  id="perfil_id" name="perfil_id"  />
                                                            <?php foreach ($lista1 as $liss) { ?>
                                                                <option value="<?php echo $liss->perfil_id; ?>"><?php echo $liss->perfil; ?>
                                                                </option>
                                                           <?php } ?>
                                                        </select>        
                                                </div>
                                            </div>
                                            

                                            <div class="col" style="background-color: #f7f9ff;">
                                                <label for="forma_id"> Rol : <span class="text-danger">*</span> </label>

                                         <?php $lista1 = $this->db->query("SELECT * FROM public.rol  WHERE activo = '1' ORDER BY rol_id ASC")->result();
                                         ?>

                                                    <div class="form-group row pt-12">

                                                        <div class="col-sm-12">

                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck99">
                                                            <label class="custom-control-label" for="customCheck99"><b>Selecciona Todos</b></label>
                                                        </div>
                                                            <?php foreach ($lista1 as $key => $ls): ?>
                                                            <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="servicios[<?php echo $key; ?>]" value="<?php echo $ls->rol_id; ?>" id="customCheck<?php echo $key; ?>">
                                                                    <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->rol ?></label>
                                                            </div>
                                                            <?php endforeach; ?>

                                                    </div>

                                                </div>
                                            </div>


                                            
                                        </div>
                                    </section>
                                    <!-- Step 3 
                                    <h6>Interview</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="int1">Interview For :</label>
                                                    <input type="text" class="form-control" id="int1"> </div>
                                                <div class="form-group">
                                                    <label for="intType1">Interview Type :</label>
                                                    <select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="intType1">
                                                        <option value="Banquet">Normal</option>
                                                        <option value="Fund Raiser">Difficult</option>
                                                        <option value="Dinner Party">Hard</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Location1">Location :</label>
                                                    <select class="custom-select form-control" id="Location1" name="location">
                                                        <option value="">Select City</option>
                                                        <option value="India">India</option>
                                                        <option value="USA">USA</option>
                                                        <option value="Dubai">Dubai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle2">Interview Date :</label>
                                                    <input type="date" class="form-control" id="jobTitle2">
                                                </div>
                                                <div class="form-group">
                                                    <label>Requirements :</label>
                                                    <div class="mb-2">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio5" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Employee</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio6" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Contract</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 
                                    <h6>Remark</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="behName1">Behaviour :</label>
                                                    <input type="text" class="form-control" id="behName1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants1">Confidance</label>
                                                    <input type="text" class="form-control" id="participants1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants1">Result</label>
                                                    <select class="custom-select form-control" id="participants1" name="location">
                                                        <option value="">Select Result</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Call Second-time">Call Second-time</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="decisions1">Comments</label>
                                                    <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rate Interviwer :</label>
                                                    <div class="c-inputs-stacked">
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input" <span class="custom-control-label ml-0">1 star</span>
                                                        </label>
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input" <span class="custom-control-label ml-0">2 star</span>
                                                        </label>
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input" <span class="custom-control-label ml-0">3 star</span>
                                                        </label>
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input" <span class="custom-control-label ml-0">4 star</span>
                                                        </label>
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input" <span class="custom-control-label ml-0">5 star</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                     -->
                </div>
    </div>
</div>
                <!-- ============================================================== -->

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/jquery.validate.min.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>




