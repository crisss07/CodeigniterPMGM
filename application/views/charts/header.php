<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/assets/images/favicon.png">
    <title>MOP</title>
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>public/css/colors/blue-dark.css" id="theme" rel="stylesheet">
</head>
<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header">
                       <a class="navbar-brand" href="#">
                        <b>                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                           <img src="<?php echo base_url(); ?>public/assets/images/seicu-libre.png" class="light-logo" alt="homepage" /></span>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="#">
                                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                        <div class="mail-contnet">
                                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                                        </a>
                                                        <!-- Message -->
                                                        <a href="#">
                                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                            <div class="mail-contnet">
                                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- ============================================================== -->
                                        <!-- End Comment -->
                                        <!-- ============================================================== -->
                                        <!-- ============================================================== -->
                                        <!-- Messages -->
                                        <!-- ============================================================== -->
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                            </a>
                                            <div class="dropdown-menu mailbox animated bounceInDown" aria-labelledby="2">
                                                <ul>
                                                    <li>
                                                        <div class="drop-title">You have 4 new messages</div>
                                                    </li>
                                                    <li>
                                                        <div class="message-center">
                                                            <!-- Message -->
                                                            <a href="#">
                                                                <div class="user-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online float-right"></span> </div>
                                                                <div class="mail-contnet">
                                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                                </a>
                                                                <!-- Message -->
                                                                <a href="#">
                                                                    <div class="user-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy float-right"></span> </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                                    </a>
                                                                    <!-- Message -->
                                                                    <a href="#">
                                                                        <div class="user-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away float-right"></span> </div>
                                                                        <div class="mail-contnet">
                                                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                                        </a>
                                                                        <!-- Message -->
                                                                        <a href="#">
                                                                            <div class="user-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline float-right"></span> </div>
                                                                            <div class="mail-contnet">
                                                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <!-- ============================================================== -->
                                                        <!-- End Messages -->
                                                        <!-- ============================================================== -->
                                                        <!-- ============================================================== -->
                                                        <!-- Messages -->
                                                        <!-- ============================================================== -->
                                                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                                                            <div class="dropdown-menu animated bounceInDown">
                                                                <ul class="mega-dropdown-menu row">
                                                                    <li class="col-lg-3 col-xlg-2 mb-4">
                                                                        <h4 class="mb-3">CAROUSEL</h4>
                                                                        <!-- CAROUSEL -->
                                                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                                            <div class="carousel-inner" role="listbox">
                                                                                <div class="carousel-item active">
                                                                                    <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url(); ?>public/assets/images/big/img1.jpg" alt="First slide"></div>
                                                                                </div>
                                                                                <div class="carousel-item">
                                                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url(); ?>public/assets/images/big/img2.jpg" alt="Second slide"></div>
                                                                                </div>
                                                                                <div class="carousel-item">
                                                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url(); ?>public/assets/images/big/img3.jpg" alt="Third slide"></div>
                                                                                </div>
                                                                            </div>
                                                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                                                        </div>
                                                                        <!-- End CAROUSEL -->
                                                                    </li>
                                                                    <li class="col-lg-3 mb-4">
                                                                        <h4 class="mb-3">ACCORDION</h4>
                                                                        <!-- Accordian -->
                                                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                                                            <div class="card">
                                                                                <div class="card-header" role="tab" id="headingOne">
                                                                                    <h5 class="mb-0">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                          Collapsible Group Item #1
                                                                                      </a>
                                                                                  </h5> </div>
                                                                                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header" role="tab" id="headingTwo">
                                                                                    <h5 class="mb-0">
                                                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                          Collapsible Group Item #2
                                                                                      </a>
                                                                                  </h5> </div>
                                                                                  <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header" role="tab" id="headingThree">
                                                                                    <h5 class="mb-0">
                                                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                          Collapsible Group Item #3
                                                                                      </a>
                                                                                  </h5> </div>
                                                                                  <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="col-lg-3  mb-4">
                                                                        <h4 class="mb-3">CONTACT US</h4>
                                                                        <!-- Contact -->
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                                                                <div class="form-group">
                                                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> </div>
                                                                                    <div class="form-group">
                                                                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                                                </form>
                                                                            </li>
                                                                            <li class="col-lg-3 col-xlg-4 mb-4">
                                                                                <h4 class="mb-3">List style</h4>
                                                                                <!-- List style -->
                                                                                <ul class="list-style-none">
                                                                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                                                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <!-- ============================================================== -->
                                                                <!-- End Messages -->
                                                                <!-- ============================================================== -->
                                                            </ul>
                                                            <!-- ============================================================== -->
                                                            <!-- User profile and search -->
                                                            <!-- ============================================================== -->
                                                            <ul class="navbar-nav my-lg-0">
                                                                <li class="nav-item hidden-sm-down">
                                                                    <form class="app-search">
                                                                        <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                                                                    </li>
                                                                    <li class="nav-item dropdown">
                                                                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>public/assets/images/users/perfil1.jpg" alt="user" class="profile-pic" /></a>
                                                                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                                                            <ul class="dropdown-user">
                                                                                <li>
                                                                                    <div class="dw-user-box">
                                                                                        <div class="u-img"><img src="<?php echo base_url(); ?>public/assets/images/users/perfil1.jpg" alt="user"></div>
                                                                                        <div class="u-text">
                                                                                           <?php
                                                                                           $id = $this->session->userdata("persona_perfil_id");
                                                                                           $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                                                                                           $dato = $resi->persona_id;
                                                                                           $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
                                                                                           ?>
                                                                                           <h4> <?php echo strtoupper($res->nombres);?> <?php echo strtoupper($res->paterno);?></h4>
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
                                                                     <img class="card-img-top img-responsive" src="<?php echo base_url(); ?>public/assets/images/users/perfil.jpg" alt="Card image cap">
                                                                     <div class="card-body">
                                                                        <h4 class="card-title">Datos Personales</h4>
                                                                        <p class="card-text">Nombre: <?php echo strtoupper($res->nombres);?> <?php echo strtoupper($res->paterno);?> <?php echo strtoupper($res->materno);?>
                                                                    </p>
                                                                    <p class="card-text">Carnet de Identidad: <?=$res->ci?></p>
                                                                    <p class="card-text">Fecha de Nacimiento: <?=$res->fec_nacimiento?></p>
                                                                    
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
                                                               <?php echo form_open('persona/update', array('method'=>'POST')); ?>
                                                               <img class="card-img-top img-responsive" src="<?php echo base_url(); ?>public/assets/images/users/perfil.jpg" alt="Card image cap">
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
                                                                    <input type="text" class="form-control" id="fec_nacimiento" name="fec_nacimiento" value="<?php echo $res->fec_nacimiento;?>">
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

                                            

