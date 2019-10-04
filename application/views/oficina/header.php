<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Oficina virtual</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css_3/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/vendors/linericon/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css_3/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/vendors/nice-select/css/nice-select.css">
        <!-- main css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css_3/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css_3/responsive.css">
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-5">
                            <ul class="nav social_icon">
                                
                            </ul>
                        </div>
                        <div class="col-sm-6 col-7">
                            <div class="top_btn d-flex justify-content-end">
                                <?php if ($logueado == 'no') { ?>
                                   <a href="<?php echo base_url(); ?>">Iniciar sesion</a>
                                <?php }else{ ?>
                                    <a href="#"><?php echo $nombre->nombre;  ?></a>
                                    <a href="<?php echo base_url(); ?>login/logout">Salir</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html" target="_blank"><img src="<?php echo base_url(); ?>public/assets/images/seicu-libre.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>oficina_virtual/index">Inicio</a></li> 
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>oficina_virtual/requisitos">Requisitos</a></li>
                            <?php if ($logueado == 'si') { ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>oficina_virtual/servicios">Servicios en linea</a></li>
                            
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tramites</a>
                                <ul class="dropdown-menu" style="width: 300px;">
                                    <li class="nav-item" ><a class="nav-link" href="<?php echo base_url(); ?>oficina_virtual/nuevo">Iniciar tramite</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="<?php //echo base_url(); ?>oficina_virtual/seguimiento">Seguimiento de tramites</a></li>
 -->                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>oficina_virtual/inspecciones">Inspecciones</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo base_url(); ?>oficina_virtual/certificado">Certificado catastral</a></li> -->
                                </ul>
                            </li> 
                            <?php } ?>
                            <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
 <!--                           <li class="nav-item"><a class="nav-link" href="#contact.html">Contacto</a></li>
                             <li class="nav-item"><a class="nav-link" href="contact.html">Consultas</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Consultas</a></li> -->

                        </ul>
                    
                        <!-- <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                        </ul> -->
                    </div> 
                </div>
            </nav>
        </header>