<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/assets/images/ico_logo.png">

    <link href="<?php echo base_url(); ?>public/assets/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" media="print" />
    <title>SEICU 2.0</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
   

    <link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->

    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>public/css/colors/green.css" id="theme" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>public/css/colors/green-dark.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- estilos tramite -->
    <!-- <script src="<?php //echo base_url(); ?>public/css/estilos_tramite.css"></script> -->
    
    <!-- DataTable Service Side-->
  
     
    <!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">

                     <a class="navbar-brand" href="<?php echo base_url(); ?>predios/principal">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- Light Logo icon -->
                            <!--<img src="<?php echo base_url(); ?>public/assets/images/icono.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text 
                         <img src="<?php echo base_url(); ?>public/assets/images/logo-text.png" alt="homepage" class="dark-logo" />-->
                         <!-- Light Logo text -->    
                         <img src="<?php echo base_url(); ?>publico/assets/app/media/img/logos/logo_seicu_1.png" class="light-logo" alt="homepage" /></span>
                    </a>


                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->

                    <?php
                            $id = $this->session->userdata("persona_perfil_id");
                            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                            $dato = $resi->persona_id;
                            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

                            $credencial = $this->db->get_where('credencial', array('persona_perfil_id' => $id))->row();
                            $avartar = $credencial->avartar;
                     ?>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Buscar"> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>public/assets/images/users/<?php echo $avartar ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo base_url(); ?>public/assets/images/users/<?php echo $avartar ?>" alt="user"></div>
                                            <div class="u-text">
                                                 
                                                <h4> <?php echo $res->nombres;?> <?php echo $res->paterno;?></h4>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" data-toggle="modal" data-target="#m_modal_1"><i class="ti-user"></i> Ver Perfil</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#m_modal_5"><i class="ti-wallet"></i> Editar Perfil</a></li>
                                    <li><a href="<?php echo base_url(); ?>login/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                            Cerrar Sesión
                                    </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-bo"></i></a>
                           
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
<!--header-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Ver Rol</h4>
                    </div>

                    <span class="m-list-search__result-item-text">
                        <b>
                           
                    </span>

                   <div class="card">
                       <img class="card-img-top img-responsive" src="<?php echo base_url(); ?>public/assets/images/users/<?php echo $avartar ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Datos Personales</h4>
                                <p class="card-text">Nombre: <?php echo strtoupper($res->nombres);?> <?php echo strtoupper($res->paterno);?> <?php echo strtoupper($res->materno);?>
                                                        </p>
                                <p class="card-text">Carnet de Identidad: <?=$res->ci?></p>
                                <p class="card-text">Fecha de Nacimiento: <?= date("Y-m-d",strtotime($res->fec_nacimiento));?></p>
                                
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
</div>


<div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Rol</h4>
                    </div>
                    <div class="modal-body">
                     <?php echo form_open('Persona/update', array('method'=>'POST')); ?>
                         <img class="card-img-top img-responsive" src="<?php echo base_url(); ?>public/assets/images/users/<?php echo $avartar ?>" alt="Card image cap">
                        <!--<form action="">-->
                       

                            <div class="form-group">
                                <input type="text"  hidden="" class="form-control" id="persona_id" name="persona_id" value="<?php echo $res->persona_id;?>">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $res->nombres;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $res->paterno;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $res->materno;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Carnet de Identidad</label>
                                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $res->ci;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="fec_nacimiento" name="fec_nacimiento" value="<?php echo date("Y-m-d",strtotime($res->fec_nacimiento));?>">
                            </div>

                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Edici&oacute;n</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>

       

