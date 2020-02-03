<style type="text/css">
    @media print {
        .left-sidebar {display: none;}
    }
  #mapid{
    height:400px;
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
#header{
  z-index: 10000;
    background-color: #fff;
    transition: background-color 0.3s ease-in-out;
    border-bottom: 1px solid #e3e6f0;
}
#usuarioHEADER{
  color:#fff;
}
#header_usuario{
    color:#fff;

}
#menu_oficina li a{
  color:#646F79;
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

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" crossorigin=""/>
<?php require_once(APPPATH.'libraries/coordinates.php'); ?>

<?php 
  //Codigo de predio
  $cod_predio = $predio_id;

  $centroide = $this->db->query("SELECT ST_AsText(ST_Centroid(geom)) as area
                                FROM catastro.geo_predios
                                WHERE predio_id = $cod_predio;")->row_array();
  $centroide_texto_1 = str_replace("POINT(", "", $centroide);
  $centroide_texto_2 = str_replace(")", "", $centroide_texto_1);
  $cambio_coordenadas_centroide = str_replace(" ", ",", $centroide_texto_2);
  $centroide_json = json_encode($cambio_coordenadas_centroide);

  $vertices22 = $this->db->query("SELECT ST_AsText(geom) as area
                                        FROM catastro.geo_predios
                                        WHERE predio_id = $cod_predio;")->row_array();//$vertices2 = $coordenadas_predio; print_r($vertices2);
   $vertices2 = $this->db->query("SELECT ST_AsText(geom) as area
   FROM catastro.geo_predios
   WHERE predio_id = $cod_predio;")->row_array();
  $quitado_texto_1 = str_replace("MULTIPOLYGON(((", "", $vertices2);
  $quitado_texto_2 = str_replace(")))", "", $quitado_texto_1);
  $coordenadas = explode(",", $quitado_texto_2['area']);
  $cambio_coordenadas = str_replace(" ", ",", $coordenadas);
  $coordenadas_json = json_encode($cambio_coordenadas);
?>
      <br />
      <br />
      <br />
       <!-- Title -->
       <div class="text-center w-md-80 w-lg-60 mx-md-auto mb-7">
                <h2>Predio</h2>
                <p class="mb-0">Viualizar predio en el mapa de OpenStreetMap</p>
            </div>
      </div>

            <!-- End Title -->
<div id="centro">
  <div class="row align-items-center container">
      <div class="col-md-7 col-xl-5 order-md-1">
        
          <div id="mapid"></div>
      </div>
    <!-- Finalizar visualizar mapa predio -->
    <!-- Inicio de informacion predio -->
      <div class="col-md-5 col-xl-7 py-9 py-md-0 mb-9 mb-md-0 order-md-2" id="informacion_izquierda">
        <div class="card">
          <div class="card-header border-0 pt-6 px-6 pb-0">
            <h6 class="text-uppercase text-gray-700 font-weight-medium letter-spacing-0_06 mb-2">INFORMACIÓN</h6>
            <h2>Predio de propietario</h2>
          </div>
          <div class="card-body px-6 py-0">
            <!-- Contacts List -->          
            <ul class="list-unstyled">
              <li class="media align-items-center pb-2">
                <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/user-type-dark-icon.svg" alt="Image Description">
                <div class="media-body">
                <h3 class="h6 mb-0">Propietario:</h3>
                <small class="text-secondary"><?php echo $titular;?></small>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li>

                      <li class="media align-items-center pb-2">
                        <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/location-dark-icon.svg" alt="Image Description">
                        <div class="media-body">
                          <h3 class="h6 mb-0">Dirección</h3>
                          <a class="small text-secondary" href="#"><?php echo $direccion;?>:</a>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li>

                      <!-- <li class="media align-items-center pb-2">
                        <img class="max-width-6 mr-3" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/social-services-dark-icon.svg" alt="Image Description">
                        
                        <div class="media-body">
                          <h3 class="h6 mb-0">Tipo de predio:</h3>
                          <small class="text-secondary">Product Management</small>
                        </div>
                      </li>

                      <li class="dropdown-divider"></li> -->
                    </ul>
                  <!-- End Contacts List -->
                </div>
                <!-- <div class="card-footer border-0 d-sm-flex justify-content-between align-items-center pt-0 px-6 pb-6">
                  <div class="mb-3 mb-sm-0">
                    <small class="text-muted d-block mb-n1">Numero de predios</small>
                    <span class="font-size-28">3</span>
                  </div>

                  <div class="text-sm-right">
                    <a class="btn btn-sm btn-primary" href="#">Siguente predio</a>
                  </div>
                </div> -->
              </div>
            </div>
    <!-- Finalizar informacion de predio -->
  </div>
</div>
<br />
<br />
<br />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<script src="<?php echo base_url(); ?>public/js/proj4-compressed.js"></script>
<script src="<?php echo base_url(); ?>public/js/proj4leaflet.js"></script>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
<script src="<?php echo base_url(); ?>public/js/L.LatLng.UTM.js"></script>

<script type="text/javascript">
    var centroide = '<?php echo $centroide_json; ?>';
    var obj_centroide = JSON.parse(centroide);
    var descomp_centroide = obj_centroide.area.split(',');
    var geo_centroide = L.utm({x: descomp_centroide[0], y: descomp_centroide[1], zone: 20, band: 'K'});
    var coord_centroide = geo_centroide.latLng();
     console.log(coord_centroide);
    var mymap = L.map('mapid').setView([coord_centroide['lat'], coord_centroide['lng']], 18);

    var item = L.utm({x: 460011.878, y: 8011211.607, zone: 20, band: 'K'});
    var coord = item.latLng();
    var coordenadas = <?php echo $coordenadas_json; ?>;
      var array_poligono = [];
    for(i=0;i<coordenadas.length;i++)
    {
        var separador = coordenadas[i].split(',');
        var item = L.utm({x: separador[0], y: separador[1], zone: 20, band: 'K'});
        var coord = item.latLng();
        array_poligono.push([coord['lat'], coord['lng']]);

    }


    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 22,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    var marker = L.marker([coord_centroide['lat'], coord_centroide['lng']]).addTo(mymap);

    var polygon = L.polygon(array_poligono).addTo(mymap);

</script>
