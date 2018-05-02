<!DOCTYPE html>
<html lang="en">
<head>
<!--
This file is part of Foobar.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Foobar is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
-->
    <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
    <meta charset='utf-8' />
    <title>Road Trippin'</title>
  	<link rel="stylesheet" type="text/css" href="styleMap.css">
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; height:100%; }
    </style>
</head>
<body>
<?php include('../firebase.js') ?>
  <div class="topnav" id="Topnav">
    <div class='links'>
      <a href="" id='webname'>Road Trippin'</a>
      <div id='r-links'>
        <div id='link'>
          <a href="../pages/ProfilePage.html"id='r-links'>My Profile</a>
        </div>
        <div id='link'>
          <a href="#Help" id='r-links'>Help</a>
        </div>
        <div id='link'>
          <a href="AboutUs.html"id='r-links'>About</a>
        </div>
      </div>
    </div>
  </div>
  <div id='content'>
    <div id='sidebar'>
      <div id='sidenav'>
        <button type="button" id='direct'>Directions</button>
        <button type="button" id='explore'>Explore</button>
      </div>
      <div id='search-area' style="display:none;">
        <input type="text" placeholder="Search..">
        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.1/mapbox-gl-directions.js'></script>
        // value
        <pre id = 'explore'></pre>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.1/mapbox-gl-directions.css' type='text/css' />
      </div>
    </div>
    <div id='map-container'>
      <div id='map'>
      </div>
    </div>
  </div>
<script>
mapboxgl.accessToken =
'pk.eyJ1IjoiY2xhd3MiLCJhIjoiY2plbXcxNGxtMGE0MDJ4cXl2ZngzYmtoZSJ9.RT29Vm1TaIEB89TwzSdO4w';
var map = new mapboxgl.Map({
  container: 'map', // container id
  style: 'mapbox://styles/claws/cjf8k1i6o55uv2rothno3hgph',
  center: [-95.140, 37.091], // starting position
  zoom: 3.5 // starting zoom
});

map.on('load', function() {
  document.getElementById('direct').style.backgroundColor = '#8a8acb';
  document.getElementById('explore').style.color = 'black';
  var mapCanvas = document.getElementsByClassName('mapboxgl-canvas')[0];
  var mapDiv = document.getElementById('map');
  var mapCont = document.getElementById('map-container');
  document.getElementsByClassName('mapboxgl-ctrl-top-left')[0].style.marginTop = '10%';
  mapCont.style.width = '100%';
  mapCanvas.style.height = '-webkit-fill-available !important';
  map.resize();
  mapCanvas.style.width = '100%';
  document.getElementsByClassName('mapboxgl-ctrl-bottom-left')[0].style.marginLeft = '25%';
  map.resize();
});

map.addControl(new MapboxDirections({
    accessToken: mapboxgl.accessToken
}), 'top-left');

document.getElementById('direct').addEventListener('click',function() {
  document.getElementById('search-area').style.display = 'none';
  document.getElementsByClassName('mapboxgl-ctrl-top-left')[0].style.display = 'unset';
  document.getElementById('direct').style.backgroundColor = '#8a8acb';
  document.getElementById('direct').style.color = 'white';
  document.getElementById('explore').style.backgroundColor = 'unset';
  document.getElementById('explore').style.color = 'black';
});
document.getElementById('explore').addEventListener('click',function() {
  document.getElementById('direct').style.backgroundColor = 'unset';
  document.getElementById('direct').style.color = 'black';
  document.getElementById('explore').style.backgroundColor = '#3bb2d0';
  document.getElementById('explore').style.color = 'white';
  document.getElementById('search-area').style.display = 'unset';
  document.getElementsByClassName('mapboxgl-ctrl-top-left')[0].style.display = 'none';
});
</script>

</body>
</html>
