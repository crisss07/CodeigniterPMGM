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