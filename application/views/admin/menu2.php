<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/perfil1.jpg" alt="user" /> </div>
            <!-- User profile text-->

             <?php
                    $id = $this->session->userdata("persona_perfil_id");
                    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                    $persona = $resi->persona_id;
                    $perfil = $resi->perfil_id; 

                    $res = $this->db->get_where('persona', array('persona_id' => $persona))->row();
                    $res1 = $this->db->get_where('perfil', array('perfil_id' => $perfil))->row();


             ?>
            
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">USUARIO <?php echo strtoupper($res1->perfil);?> <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                   
                    <div class="dropdown-divider"></div> <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar Sesi&oacute;n</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-home fa-lg"></i><span class="hide-menu"> Inicio </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>predios/principal"><i class=" hide-menu"></i> Principal</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu"> Gesti&oacute;n de Catastro </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>predios/registra_predio"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>predios/index"><i class="fas fa-clipboard-list"></i>  Listado</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu"> Gesti&oacute;n de Tramites</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>prueba"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index1"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                        <li><a href="<?php echo base_url(); ?>organigrama_persona/inicio"><i class=" fas fa-book"></i> Asignacion de Oficinas</a></li>
                        <li><a href="<?php echo base_url(); ?>tipo_tramite/index"><i class="fas fa-clipboard-list"></i> Tramite</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu"> Gesti&oacute;n de Inspecciones</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>prueba/index2"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index3"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu"> Mantenimiento</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow" href="<?php echo base_url(); ?>usuario/listar"><i class="fas fa-user"></i> Usuarios</a></li>
                        <li><a href="<?php echo base_url(); ?>Usuario"><i class="fas fa-address-card"></i> Perfil</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index5"><i class="fas fa-users"></i> Roles</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index6"><i class="fas fa-th-list"></i> Men&uacute;</a></li>

                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-thumbtack"></i><span class="hide-menu"> PARAM&Eacute;TRICAS CATASTRO</span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url(); ?>Bloque_grupo_mat">Bloque Grupo Material</a></li>
                                <li><a href="<?php echo base_url(); ?>Bloque_mat_item">Bloque Material item</a></li>
                                <li><a href="<?php echo base_url(); ?>Clase_predio">Clase Predio</a></li>
                                <li><a href="<?php echo base_url(); ?>Destino_bloque">Destino Bloque</a></li>
                                <li><a href="<?php echo base_url(); ?>Edificio">Edificio</a></li>
                                <li><a href="<?php echo base_url(); ?>Forma">Forma</a></li>
                                <li><a href="<?php echo base_url(); ?>Matvia">Matvia</a></li>
                                <li><a href="<?php echo base_url(); ?>Nivel">Nivel</a></li>
                                <li><a href="<?php echo base_url(); ?>Pendiente">Pendiente</a></li>
                                <li><a href="<?php echo base_url(); ?>Predio_via">Predio Via</a></li>
                                <li><a href="<?php echo base_url(); ?>Rol">Rol</a></li>
                                <li><a href="<?php echo base_url(); ?>Servicio">Servicio</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipopredio">Tipo de Predio</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_planta">Tipo Planta</a></li>
                                <li><a href="<?php echo base_url(); ?>Ubicacion">Ubicaci&oacute;n</a></li>
                                <li><a href="<?php echo base_url(); ?>Uso_bloque">Uso Bloque</a></li>
                                <li><a href="<?php echo base_url(); ?>Uso_suelo">Uso Suelo</a></li>
                                <li><a href="<?php echo base_url(); ?>Zona_urbana">Zona Urbana</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_documento/nuevo">Tipo de Documento</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_tramite_doc/nuevo">Tipo Tramite</a></li>
                                <li><a href="<?php echo base_url(); ?>Organigrama/nuevo">Organigrama</a></li>
                                <li><a href="<?php echo base_url(); ?>Cargo/nuevo">Cargo</a></li>
                                

                                
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->