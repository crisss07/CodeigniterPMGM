<!--<link rel="stylesheet" href="<?= base_url(); ?>public/assets/leaflet/leaflet.css" />
<script src="<?= base_url(); ?>public/assets/leaflet/leaflet.js"></script>
<style>
#map { height: 480px; }
</style>
<div id="map"></div>

<script>


  

  var map = L.map('map').setView([42.35, -71.08], 13);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
      maxZoom: 17,
      minZoom: 9   
}).addTo(map);
  

</script>-->

<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<div id='map' style='width: 400px; height: 300px;'></div>
<script>
  mapboxgl.accessToken = 'pk.eyJ1Ijoicm9kcmlnb3NlY2tvIiwiYSI6ImNrNGNyZDBlaDByY28zbW12Yzh6dWV5ZHAifQ.25V_qs5OhVMoudUXm36kZw';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11'
  });
</script>


