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

<!--<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<div id='map' style='width: 400px; height: 300px;'></div>
<script>
  mapboxgl.accessToken = 'pk.eyJ1Ijoicm9kcmlnb3NlY2tvIiwiYSI6ImNrNGNyZDBlaDByY28zbW12Yzh6dWV5ZHAifQ.25V_qs5OhVMoudUXm36kZw';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11'
  });
</script>-->


<head>
<meta charset="utf-8" />
<title>Locate the user</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.css" rel="stylesheet" />
<style>
  body { margin: 0; padding: 0; }
  #map { position: absolute; top: 0; bottom: 0; width: 100%; };
</style>
</head>

<div class="page-wrapper">
          
            <div class="container-fluid">

<div class="row">
                  
                    <div class="col-lg-6">

<!--
  <div id="map" style='width: 700px; height: 600px;'></div>
<script>
  mapboxgl.accessToken = 'pk.eyJ1Ijoicm9kcmlnb3NlY2tvIiwiYSI6ImNrNGNyZDBlaDByY28zbW12Yzh6dWV5ZHAifQ.25V_qs5OhVMoudUXm36kZw';

var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11',//, 
center: [-63.377706, -17.987004], // starting position-17.987004, -63.377706
zoom: 15 // starting zoom
});
 
// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
trackUserLocation: true
})
);

new mapboxgl.Marker().setLngLat([-63.377706, -17.987004]).addTo(map);

console.log(map);


window.onload = function() {
        document.getElementByID('latitud').value="text";
        };
</script>

<script>
 function get_value(){
  var BrowserName = 'objbrowserName';
  document.getElementById('latitud').value = BrowserName;
  document.getElementById('longitud').value = mapboxgl;
 }
 </script>
 -->

 <style>
  body { margin: 0; padding: 0; }
  #map { position: absolute; top: 0; bottom: 0; width: 100%; };
</style>
</head>
<body>
<style type="text/css">
#info {
display: block;
position: relative;
margin: 0px auto;
width: 50%;
padding: 10px;
border: none;
border-radius: 3px;
font-size: 12px;
text-align: center;
color: #222;
background: #fff;
}
</style>
<div id="map" style='width: 700px; height: 600px;'></div>
<pre id="info"></pre>
<script>
  mapboxgl.accessToken = 'pk.eyJ1Ijoicm9kcmlnb3NlY2tvIiwiYSI6ImNrNGNyZDBlaDByY28zbW12Yzh6dWV5ZHAifQ.25V_qs5OhVMoudUXm36kZw';
var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11',
center: [<?php echo $coordinates->longitud; ?>, <?php echo $coordinates->latitud; ?>], // starting position longitud,latitud


zoom: 16 // starting zoom
});
 
map.on('mousemove', function(e) {
document.getElementById('info').innerHTML =
// e.point is the x, y coordinates of the mousemove event relative
// to the top-left corner of the map
JSON.stringify(e.point) +
'<br />' +
// e.lngLat is the longitude, latitude geographical position of the event
JSON.stringify(e.lngLat.wrap());
console.log(JSON.stringify(e.lngLat.wrap()));
 document.getElementById('latitud').value = JSON.stringify(e.lngLat.lat);
 document.getElementById('longitud').value = JSON.stringify(e.lngLat.lng);
});

// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
trackUserLocation: true
})
);
</script>
</div>


<div class="col-lg-6">
  <h2>Posicion  </h2>
  <?php echo form_open('Ubicacion/guardar', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Longitud</label>
                                        <input type="text" class="form-control" id="longitud" name="longitud" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Latitud</label>
                                        <input type="text" class="form-control" id="latitud" name="latitud" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Calle</label>
                                        <input type="text" class="form-control" id="calle" name="calle">
                                    </div>
                                       
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-info">Guardar Ubicacion</button>
                                    </div>
                            </form> 

                            <div id="mydiv"></div>
 <button type="button" onclick="get_value();">Get Position</button>
</div>

</div>








