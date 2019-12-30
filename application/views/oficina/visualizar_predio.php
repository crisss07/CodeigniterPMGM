<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <style>
       #mapdiv{
        height: 500px;
        width: 500;
      }
    </style>
    <title>OpenLayers example</title>
  </head>
  <body>
    <br />

    <h2>Visualizar predio</h2>
    <div id="mapdiv" class="mapdiv"></div>
    <?php 
      $id_predio = $predio_id;
      echo "El predio que recibe en la vista es: ",$id_predio;

  $vertices22 = $this->db->query("SELECT ST_AsText(geom) as area
                                        FROM catastro.geo_predios
                                        WHERE predio_id = $id_predio;")->row_array();//$vertices2 = $coordenadas_predio; print_r($vertices2);
      $vertices2 = $vertices22;
      $quitado_texto_1 = str_replace("MULTIPOLYGON(((", "", $vertices2);
      $quitado_texto_2 = str_replace(")))", "", $quitado_texto_1);
      $coordenadas = explode(",", $quitado_texto_2['area']);
      $cambio_coordenadas = str_replace(" ", ",", $coordenadas);
      //$el_primero = substr($coordenadas[1], 21);
      $coordenadas_json = json_encode($cambio_coordenadas);
      ?>

    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
    <script src="<?php echo base_url(); ?>public/js/proj4-compressed.js"></script>
    <script src="<?php echo base_url(); ?>public/js/proj4leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
    <script src="<?php echo base_url(); ?>public/js/L.LatLng.UTM.js"></script>

    <script>
      var coordenadas = <?php echo $coordenadas_json; ?>;
        for(i=0;i<coordenadas.length;i++){
          var separador = coordenadas[i].split(',');
          var      item = L.utm({x: separador[0], y: separador[1], zone: 20, band: 'K'});
          var     coord = item.latLng();
        }
      var longitud = coord["lng"];console.log("La longitud es: " + coord["lng"]);
      var latitud  = coord["lat"];console.log("La latitud  es: " + coord["lat"]);
      map = new OpenLayers.Map("mapdiv");
      map.addLayer(new OpenLayers.Layer.OSM());
      var lonLat = new OpenLayers.LonLat(longitud, latitud)
      .transform(
        new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
        map.getProjectionObject() // to Spherical Mercator Projection
      );
      var zoom=16;
      var markers = new OpenLayers.Layer.Markers( "Markers" );
      map.addLayer(markers);
      markers.addMarker(new OpenLayers.Marker(lonLat));
      map.setCenter (lonLat, zoom);
    </script>
  </body>
</html>....