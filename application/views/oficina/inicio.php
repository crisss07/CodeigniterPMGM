 <!-- ========== MAIN CONTENT ========== -->
 <main id="content">
    <!-- Hero Section -->
    <div class="gradient-overlay-dark-v1 bg-img-hero" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/demo/real-estate/jumbotron.jpg);">
      <div class="w-lg-50 w-md-80 mx-3 mx-md-auto space-2 space-3--sm space-4--lg text-center text-white">
        <!-- Title -->
        <div class="mb-6">
          <h2 class="h1 text-lh-xs mb-3">Sistema Espacial de Información Catastral Urbano</h2>
          <p class="text-white-70 text-lh-sm">Aplicación desarrollada para la gestión del catastro en los gobiernos autónomos municipales del<br class="d-none d-lg-inline-block">Estado Plurinacional de Bolivia</p>
        </div>
        <!-- End Title -->

        <!-- Search -->
        <div class="input-group rounded-pill bg-white overflow-hidden p-2 mb-6">
          <input type="search" class="form-control form-control-sm rounded-pill border-0 mr-1" placeholder="Buscar" aria-label="Bucar">
          <!--<input type="search" class="form-control form-control-sm rounded-pill border-0 mr-1" placeholder="Search what kind of property do you like?" aria-label="Search what kind of property do you like?">-->

          <div class="input-group-append">
            <button type="button" class="btn btn-sm btn-primary rounded-pill font-weight-medium px-4 py-2 mr-2">Buscar</button>
            <!--<button type="button" class="btn btn-sm btn-primary rounded-pill font-weight-medium px-4 py-2">For Rent</button>-->
          </div>
        </div>
        <!-- End Search -->

        <a class="js-fancybox text-white" href="javascript:;"
           data-src="//youtube.com/embed/5ksBQ9jevAI"
           data-speed="700"
           data-animate-in="zoomIn"
           data-animate-out="zoomOut"
           data-caption="Tropical Experiences with Space">
           Mira sobre nuestros servicios
          <i class="u-icon u-icon--sm u-icon--white-soft rounded-circle ml-2">
            <i class="u-icon__inner svg-icon svg-icon-xs text-white">
              <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <path d="M9.82866499,18.2771971 L16.5693679,12.3976203 C16.7774696,12.2161036 16.7990211,11.9002555 16.6175044,11.6921539 C16.6029128,11.6754252 16.5872233,11.6596867 16.5705402,11.6450431 L9.82983723,5.72838979 C9.62230202,5.54622572 9.30638833,5.56679309 9.12422426,5.7743283 C9.04415337,5.86555116 9,5.98278612 9,6.10416552 L9,17.9003957 C9,18.1765381 9.22385763,18.4003957 9.5,18.4003957 C9.62084305,18.4003957 9.73759731,18.3566309 9.82866499,18.2771971 Z" fill="#000000"></path>
                </g>
              </svg>
            </i>
          </i>
        </a>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Experiences -->
    <div class="bg-dark text-white space-2 overflow-hidden">
      <div class="container">
        <div class="row no-gutters align-items-center">
          <div class="col-lg-5 mb-5 mb-lg-0">
            <h6 class="text-uppercase font-weight-medium letter-spacing-0_06 mb-3">Experiencias recientes</h6>
            <h2 class="text-lh-xs mb-4">Encuentra el aspecto para tu<br class="d-none d-lg-inline-block">nuevo hogar</h2>
            <p class="text-white-70">Comenzar una nueva vida con una mejor experiencia<br class="d-none d-lg-inline-block"></p>

            <!-- Gallarie's arrows -->
            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick pt-9 mt-6"
                 data-infinite="true"
                 data-slides-show="1"
                 data-is-thumbs="true"
                 data-nav-for="#sliderSyncingNav"
                 data-arrows-classes="u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="fa fa-arrow-left u-slick__arrow-classic-inner bg-white text-dark left-0"
                 data-arrow-right-classes="fa fa-arrow-right u-slick__arrow-classic-inner bg-white text-dark right-0" style="width: 90px;">
              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/proyectovivienda/edificio.jpg" alt="Image Description">
              </div>

              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/proyectovivienda/viviendas.jpg" alt="Image Description">
              </div>

              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/demo/real-estate/gallery-4.jpg" alt="Image Description">
              </div>

              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/demo/real-estate/gallery-3.jpg" alt="Image Description">
              </div>

              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/demo/real-estate/gallery-5.jpg" alt="Image Description">
              </div>

              <div class="js-slide d-none">
                <img class="img-fluid" src="../../assets/img/demo/real-estate/gallery-6.jpg" alt="Image Description">
              </div>
            </div>
            <!-- End Gallarie's arrows -->
          </div>

          <div class="col-lg-6 offset-lg-1">
            <div class="position-relative h-100 vw-lg-50">
              <!-- Slick Carousel -->
              <div id="sliderSyncingNav" class="js-slick-carousel js-slick-gallery u-slick u-slick--equal-height u-slick--gutters-3 mr-lg-n9"
                   data-infinite="true"
                   data-slides-show="4"
                   data-center-mode="false"
                   data-nav-for="#sliderSyncingThumb"
                   data-responsive='[{
                     "breakpoint": 1442,
                     "settings": {
                       "slidesToShow": 4
                     }
                   }, {
                     "breakpoint": 1441,
                     "settings": {
                       "slidesToShow": 3
                     }
                   }, {
                     "breakpoint": 992,
                     "settings": {
                       "slidesToShow": 3
                     }
                   }, {
                     "breakpoint": 768,
                     "settings": {
                       "slidesToShow": 2
                     }
                   }, {
                     "breakpoint": 300,
                     "settings": {
                       "slidesToShow": 1
                     }
                   }]'>
                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/proyectovivienda/edificio.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Vivienda</h5>
                    </div>
                  </a>
                </div>

                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/proyectovivienda/viviendas.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Casa</h5>
                    </div>
                  </a>
                </div>

                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/demo/real-estate/gallery-4.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Infrestructura</h5>
                    </div>
                  </a>
                </div>

                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/demo/real-estate/gallery-3.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Patio</h5>
                    </div>
                  </a>
                </div>

                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/demo/real-estate/gallery-5.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Transport</h5>
                    </div>
                  </a>
                </div>

                <div class="js-slide my-3 lift-lg shadow-2-sm-hover">
                  <a class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" href="#" style="background-image: url(<?php echo base_url(); ?>public/oficina_virtual/assets/img/demo/real-estate/gallery-6.jpg);">
                    <div class="mt-auto text-center">
                      <h5 class="font-weight-normal">Services</h5>
                    </div>
                  </a>
                </div>
              </div>
              <!-- End Slick Carousel -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Experiences -->


    <!-- CTA -->
    <div class="text-center space-2 space-3--lg gradient-overlay-quarter-light-v1">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <!-- Card -->
            <article class="card shadow-sm h-md-100 px-4 py-7 border-top-0 border-left-0 border-right-0 border-bottom border-3 border-primary mb-4 mb-md-0">
              <div class="w-md-70 mx-md-auto">
                <span class="u-icon u-icon--lg u-icon--primary-soft rounded-circle mb-4">
                  <i class="svg-icon svg-icon-sm text-primary u-icon__inner">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000"></path>
                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000"></path>
                      </g>
                    </svg>
                  </i>
                </span>

                <h3 class="text-lh-xs mb-3">Visualizar los requisitos de tramite<br class="d-none d-lg-inline-block"> </h3>
                <p class="text-muted mb-5">Detalle de los requitos para<br class="d-none d-lg-inline-block">empezar los tramites de vivienda</p>
                <a class="btn btn-sm btn-primary" href="#">Ver tramites</a>
              </div>
            </article>
            <!-- End Card -->
          </div>

          <div class="col-md-6">
            <!-- Card -->
            <article class="card shadow-sm h-md-100 px-4 py-7 border-top-0 border-left-0 border-right-0 border-bottom border-3 border-primary">
              <div class="w-md-70 mx-md-auto">
                <span class="u-icon u-icon--lg u-icon--primary-soft rounded-circle mb-4">
                  <i class="svg-icon svg-icon-sm text-primary u-icon__inner">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"></path>
                      </g>
                    </svg>
                  </i>
                </span>

                <h3 class="text-lh-xs mb-3">Proyecto det<br class="d-none d-lg-inline-block">vivienda</h3>
                <p class="text-muted mb-5">Vivienda de la población<br class="d-none d-lg-inline-block"> Boliviana</p>
                <a class="btn btn-sm btn-primary" href="#">Empecemos</a>
              </div>
            </article>
            <!-- End Card -->
          </div>
        </div>
      </div>
    </div>
    <!-- End CTA -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->