<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Oficina virtual</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">

  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

   <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/custombox/dist/custombox.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/fancybox/jquery.fancybox.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/vendor/flatpickr/dist/flatpickr.min.css">

  <!-- CSS Space Template -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/oficina_virtual/assets/css/theme.css">

  <!-- CSS Estilos tramite -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/estilos_tramite.css">
</head>

<body>
  <!-- Skippy -->
  <a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
    <div class="container">
      <span class="u-skiplink-text">Skip to main content</span>
    </div>
  </a>
  <!-- End Skippy -->

  <!-- ========== HEADER ========== -->
  <header id="header" class="u-header u-header--bg-transparent u-header--white-nav-links u-header--sticky-top-lg">
    <div class="u-header__section">
      <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg u-header__navbar">
          <!-- Logo -->
          <div class="u-header__navbar-brand-wrapper">
            <a class="navbar-brand u-header__navbar-brand" href="<?php echo base_url(); ?>Oficina_virtual" aria-label="Space">
              <img class="u-header__navbar-brand-default" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/logos/seicu_blanco.svg" alt="Logo">
              <img class="u-header__navbar-brand-on-scroll" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/logos/seicu_negro.svg" alt="Logo">
              <img class="u-header__navbar-brand-mobile" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/logos/logo-short.svg" alt="Logo">
            </a>
          </div>

          <!-- Responsive Toggle Button -->
          <button type="button" class="navbar-toggler btn u-hamburger u-header__hamburger"
                  aria-label="Toggle navigation"
                  aria-expanded="false"
                  aria-controls="navBar"
                  data-toggle="collapse"
                  data-target="#navBar">
            <span class="d-none d-sm-inline-block">Menu</span>
            <span id="hamburgerTrigger" class="u-hamburger__box ml-3">
              <span class="u-hamburger__inner"></span>
            </span>
          </button>
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse py-0">
            <ul class="navbar-nav u-header__navbar-nav">
              <!-- Home -->
              <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="fadeInUp"
                  data-animation-out="fadeOut">
                <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="homeSubMenu">
                  Inicio
            
                </a>

                <!-- Home - Submenu -->
              
                <!-- End Home - Submenu -->
              </li>
              <!-- End Home -->

              <!-- Pages -->
              <li class="nav-item hs-has-mega-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="fadeInUp"
                  data-animation-out="fadeOut"
                  data-position="right">
                <a id="PagesMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false">
                  GAMS
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Pages - Mega Menu -->
                <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="PagesMegaMenu">
                  <div class="u-header__mega-menu-wrapper-v1">
                    <ul class="row list-unstyled u-header__mega-menu-list">
                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col mb-3 mb-lg-0">
                        <span class="u-header__sub-menu-title">El torno</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>

                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col mb-3 mb-lg-0">
                        <span class="u-header__sub-menu-title">Viacha</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>

                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col mb-3 mb-lg-0">
                        <span class="u-header__sub-menu-title">Sacaba</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>

                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col mb-3 mb-sm-0">
                        <span class="u-header__sub-menu-title">El Alto</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>

                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col">
                        <span class="u-header__sub-menu-title">Oruro</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>

                      <li class="col-sm-6 col-lg-2 u-header__mega-menu-col">
                        <span class="u-header__sub-menu-title">Tarija</span>

                        <!-- Links -->
                        <ul class="list-unstyled">
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-agency.html">Información GAM</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/about-start-up.html">Ubicación</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-agency.html">Tramites</a></li>
                          <li><a class="nav-link u-header__sub-menu-nav-link px-0" href="../pages/services-start-up.html">Noticias</a></li>
                        </ul>
                        <!-- End Links -->
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- End Pages - Mega Menu -->
              </li>
              <!-- End Pages -->

              <!-- Works -->
              <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="fadeInUp"
                  data-animation-out="fadeOut">
                <a id="worksMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="worksSubMenu">
                  Tramites
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Works - Submenu -->
                <ul id="worksSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 220px;"
                    aria-labelledby="worksMegaMenu">
                  <!-- Classic -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksBoxedLayout" class="nav-link u-header__sub-menu-nav-link" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksBoxedLayout">
                      Tramites
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuWorksBoxedLayout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkWorksBoxedLayout">
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo base_url(); ?>Oficina_virtual/listar_tramites">Listar tramites</a>
                      </li>
                      <!-- <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-grid.html">Costo tramites</a>
                      </li> -->
                      <!--<li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-masonry.html">Portfolio Masonry</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-gallery.html">Portfolio Gallery</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-slider.html">Portfolio Slider</a>
                      </li>-->
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Classic -->

                  <!-- Full Width
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksFullWidthLayout" class="nav-link u-header__sub-menu-nav-link" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksFullWidthLayout">
                      Full Width Layout
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    Submenu (level 2) 
                    <ul id="navSubmenuWorksFullWidthLayout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkWorksFullWidthLayout">
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-classic.html">Portfolio Classic</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-grid.html">Portfolio Grid</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-masonry.html">Portfolio Masonry</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-gallery.html">Portfolio Gallery</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-slider.html">Portfolio Slider</a>
                      </li>
                    </ul>
                  </li>
                    End Submenu (level 2) 
                   Full Width -->

                  <!-- Single Page -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksSinglePage" class="nav-link u-header__sub-menu-nav-link" href="<?php echo base_url(); ?>Oficina_virtual/seguimiento_tramite"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksSinglePage">
                      Segumiento de tramite
                    </a>
                  </li>
                  <!-- Single Page -->
                </ul>
                <!-- End Works - Submenu -->
              </li>
              <!-- End Works -->

                 <!-- catastro -->
                 <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="fadeInUp"
                  data-animation-out="fadeOut">
                <a id="worksMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="worksSubMenu">
                  Catastro
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Works - Submenu -->
                <ul id="worksSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 220px;"
                    aria-labelledby="worksMegaMenu">
                  <!-- Classic -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksBoxedLayout" class="nav-link u-header__sub-menu-nav-link" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksBoxedLayout">
                      Catastro
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    <!-- Submenu (level 2) -->
                    <ul id="navSubmenuWorksBoxedLayout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkWorksBoxedLayout">
                      <!-- <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-classic.html">Vivienda</a>
                      </li> -->
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-grid.html">Segumiento</a>
                      </li>
                      <!--<li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-masonry.html">Portfolio Masonry</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-gallery.html">Portfolio Gallery</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-slider.html">Portfolio Slider</a>
                      </li>-->
                    </ul>
                    <!-- End Submenu (level 2) -->
                  </li>
                  <!-- Classic -->

                  <!-- Full Width
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksFullWidthLayout" class="nav-link u-header__sub-menu-nav-link" href="javascript:;"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksFullWidthLayout">
                      Full Width Layout
                      <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                    </a>

                    Submenu (level 2) 
                    <ul id="navSubmenuWorksFullWidthLayout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-offset" style="min-width: 220px;"
                        aria-labelledby="navLinkWorksFullWidthLayout">
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-classic.html">Portfolio Classic</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-grid.html">Portfolio Grid</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-masonry.html">Portfolio Masonry</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-gallery.html">Portfolio Gallery</a>
                      </li>
                      <li class="dropdown-item u-header__sub-menu-list-item">
                        <a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/fullwidth-slider.html">Portfolio Slider</a>
                      </li>
                    </ul>
                  </li>
                    End Submenu (level 2) 
                   Full Width -->

                  <!-- Single Page -->
                  <li class="dropdown-item hs-has-sub-menu">
                    <a id="navLinkWorksSinglePage" class="nav-link u-header__sub-menu-nav-link" href="<?php echo base_url(); ?>Oficina_virtual/visualizar_predio"
                       aria-haspopup="true"
                       aria-expanded="false"
                       aria-controls="navSubmenuWorksSinglePage">
                      Visualizar predio
                    </a>
                  </li>
                  <!-- Single Page -->
                </ul>
                <!-- End Works - Submenu -->
              </li>
              <!-- End Works -->

              <!-- Docs -->
              <li class="nav-item hs-has-sub-menu u-header__nav-item"
                  data-event="hover"
                  data-animation-in="fadeInUp"
                  data-animation-out="fadeOut">
                <a id="docsMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                   aria-haspopup="true"
                   aria-expanded="false"
                   aria-labelledby="docsSubMenu">
                  Documentos
                  <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                </a>

                <!-- Docs - Submenu -->
                <ul id="docsSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 260px;"
                    aria-labelledby="docsMegaMenu">
                  <!-- <li class="dropdown-item u-header__sub-menu-list-item py-0">
                    <a class="nav-link d-block u-header__sub-menu-nav-link" href="../../documentation/index.html">
                      <div class="media align-items-center">
                        <img class="max-width-5 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/news-dark-icon.svg" alt="Image Description">
                        <div class="media-body">
                          <span class="d-block text-dark font-weight-medium">Documentación</span>
                          <small class="d-block">Development guides</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="dropdown-item u-header__sub-menu-list-item py-0">
                    <a class="nav-link d-block u-header__sub-menu-nav-link" href="../../starter/index.html">
                      <div class="media align-items-center">
                        <img class="max-width-5 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/portfolio-dark-icon.svg" alt="Image Description">
                        <div class="media-body">
                          <span class="d-block text-dark font-weight-medium">Tramites</span>
                          <small class="d-block">Components and snippets</small>
                        </div>
                      </div>
                    </a>
                  </li> -->
                  <li class="dropdown-item u-header__sub-menu-list-item py-0">
                    <a class="nav-link d-block u-header__sub-menu-nav-link" href="<?php echo base_url(); ?>Oficina_virtual/noticias">
                      <div class="media align-items-center">
                        <img class="max-width-5 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/business-icons/iStar_Design_Business_LineIcons_Live-34.svg" >
                        <div class="media-body">
                          <span class="d-block text-dark font-weight-medium">Noticias</span>
                          <small class="d-block">Seccion noticias</small>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- End Docs -->

              <!-- Button -->
              <li class="nav-item u-header__nav-item-btn">
                <a class="btn btn-sm btn-primary" href="#signupModal" role="button"
                   data-modal-target="#signupModal"
                   data-overlay-color="#151b26">
                  <span class="fa fa-user-circle mr-1"></span>
                  Usuario
                </a>
              </li>
              <!-- End Button -->
            </ul>
          </div>
          <!-- End Navigation -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->