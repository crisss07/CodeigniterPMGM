<style>
  #map{
    height:500px;
    width:450px;
  }
  #centro{
    display:flex;
    justify-content:center;
    text-align:center;
  }
  #informacion_izquierda{
    text-align:left;
  }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
<script src="<?php echo base_url(); ?>public/js/proj4-compressed.js"></script>
<script src="<?php echo base_url(); ?>public/js/proj4leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" crossorigin=""></script>
<script src="<?php echo base_url(); ?>public/js/L.LatLng.UTM.js"></script>

<?php 
  // $id_predio = $predio_id;
  // // echo "El predio que recibe en la vista es: ",$id_predio;
  // $vertices22 = $this->db->query("SELECT ST_AsText(geom) as area
  //                                       FROM catastro.geo_predios
  //                                       WHERE predio_id = $id_predio;")->row_array();//$vertices2 = $coordenadas_predio; print_r($vertices2);
  // $vertices2 = $vertices22;
  // $quitado_texto_1 = str_replace("MULTIPOLYGON(((", "", $vertices2);
  // $quitado_texto_2 = str_replace(")))", "", $quitado_texto_1);
  // $coordenadas = explode(",", $quitado_texto_2['area']);
  // $cambio_coordenadas = str_replace(" ", ",", $coordenadas);
  // $coordenadas_json = json_encode($cambio_coordenadas);
?>
      <br />
      <br />
      <br />
<div id="centro">
  <div class="row align-items-center container">
    <!-- Visualizar mapa predio -->
      <div class="col-md-7 col-xl-5 order-md-1">
          <div id="map"></div>
      </div>
    <!-- Finalizar visualizar mapa predio -->
    <!-- Inicio de informacion predio -->
      <div class="col-md-5 col-xl-7 py-9 py-md-0 mb-9 mb-md-0 order-md-2" id="informacion_izquierda">
        <div class="card">
          <div class="card-header border-0 pt-6 px-6 pb-0">
            <h6 class="text-uppercase text-gray-700 font-weight-medium letter-spacing-0_06 mb-2">Informacion</h6>
            <h2>Predio de propietario</h2>
          </div>
          <div class="card-body px-6 py-0">
            <!-- Contacts List -->
            <ul class="list-unstyled">
              <li class="media align-items-center pb-2">
                <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/user-type-dark-icon.svg" alt="Image Description">
                <div class="media-body">
                <h3 class="h6 mb-0">Propietario:</h3>
                <small class="text-secondary">Full-time</small>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li>

                      <li class="media align-items-center pb-2">
                        <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/location-dark-icon.svg" alt="Image Description">
                        <div class="media-body">
                          <h3 class="h6 mb-0">Direccion:</h3>
                          <a class="small text-secondary" href="#">San Francisco</a>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li>

                      <li class="media align-items-center pb-2">
                        <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/social-services-dark-icon.svg" alt="Image Description">
                        
                        <div class="media-body">
                          <h3 class="h6 mb-0">Tipo de predio:</h3>
                          <small class="text-secondary">Product Management</small>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li>
                    </ul>
                  <!-- End Contacts List -->
                </div>
                <div class="card-footer border-0 d-sm-flex justify-content-between align-items-center pt-0 px-6 pb-6">
                  <div class="mb-3 mb-sm-0">
                    <small class="text-muted d-block mb-n1">Numero de predios</small>
                    <span class="font-size-28">3</span>
                  </div>

                  <div class="text-sm-right">
                    <a class="btn btn-sm btn-primary" href="#">Siguente predio</a>
                  </div>
                </div>
              </div>
            </div>
    <!-- Finalizar informacion de predio -->
  </div>
</div>
<br />
<br />
<br />
<!-- <script>
  var coordenadas = <?php echo $coordenadas_json; ?>;
        for(i=0;i<coordenadas.length;i++){
          var separador = coordenadas[i].split(',');
          var      item = L.utm({x: separador[0], y: separador[1], zone: 20, band: 'K'});
          var     coord = item.latLng();
        }
      var longitud = coord["lng"];console.log("La longitud es: " + coord["lng"]);
      var latitud  = coord["lat"];console.log("La latitud  es: " + coord["lat"]);
     
      
  var iconFeature1 = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([longitud, latitud]),),
    name: 'Somewhere',
  });

  const iconLayerSource = new ol.source.Vector({
    features: [iconFeature1]
  });
  const iconLayer = new ol.layer.Vector({
    source: iconLayerSource,
    // style for all elements on a layer
    style: new ol.style.Style({
      image: new ol.style.Icon({
        anchor: [0.5, 46],
        anchorXUnits: 'fraction',
        anchorYUnits: 'pixels',
        src: '<?php echo base_url(); ?>public/img/location.png'
      })
    })
  });     
  const map = new ol.Map({
      target: 'map',
      layers: [
          new ol.layer.Tile({
              source: new ol.source.OSM(),
          }),
          iconLayer
      ],
      view: new ol.View({
          center: ol.proj.fromLonLat([longitud, latitud]),
          zoom: 14
      })
  });
</script>    -->