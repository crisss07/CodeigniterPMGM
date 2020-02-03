<!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Description Section -->
    <div class="container space-1 space-3--md">
      <div class="row">
        <div class="col-md-7 mb-7 mb-md-0">
          <!-- Cubeportfolio -->
          <div class="cbp"
               data-layout="grid"
               data-animation="quicksand"
               data-x-gap="32"
               data-y-gap="32"
               data-media-queries='[
                {"width": 300, "cols": 1}
              ]'>
            <!-- Item -->
            <div class="cbp-item">
              <div class="cbp-caption">
                <?php
                  $url = 'public/assets/images/noticias/'.$noticias->adjunto.'';
                 ?>
                <img class="w-100 card bg-img-hero border-0 gradient-overlay-half-black-v2 min-height-320 text-white rounded-pseudo p-3" src="<?php echo base_url(); ?><?php echo $url; ?>" alt="Image Description">
              </div>
            </div>
            <!-- End Item -->

          </div>
          <!-- End Cubeportfolio -->
        </div>

        <div id="stickyBlockStartPoint" class="col-md-5">
          <!-- Sticky Block -->
          <div class="js-sticky-block pl-lg-4"
               data-sticky-view="md"
               data-start-point="#stickyBlockStartPoint"
               data-end-point="#stickyBlockEndPoint"
               data-offset-top="80"
               data-offset-bottom="130">
            <div class="mb-6">
              <h1><?php echo $noticias->titulo; ?></h1>
              <p class="mb-0"><?php echo $noticias->contenido; ?></p>
            </div>

            <hr class="my-5">



          </div>
          <!-- End Sticky Block -->
        </div>
      </div>
    </div>
    <!-- End Description Section -->

    <!-- Sticky Block End Point -->
    <div id="stickyBlockEndPoint"></div>

  </main>
  <!-- ========== END MAIN CONTENT ========== -->