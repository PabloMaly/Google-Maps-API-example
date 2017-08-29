<?
include("../scripts/class_conn.php");
include("../scripts/validauser.php");
include("../scripts/fx.php");
include("../scripts/config.php");
?>
<html>
<head>
  <?//= GetIncludesNew();?>
<title>Geolocalizacion</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
var map;
var markers = [];
var marker = 0;
var countmarkers = 0;
var count = 1;
function initMap() {
  var myLatlng = {lat: -34.60842, lng: -58.381559100000004};
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROAD
  });
    // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {
    var clickLat = event.latLng.lat();
    var clickLon = event.latLng.lng();
    // show in input box
    if(countmarkers == 1){
      document.getElementById("lat2").value = clickLat.toFixed(5);
      document.getElementById("lon2").value = clickLon.toFixed(5);
    }else{
      document.getElementById("lat").value = clickLat.toFixed(5);
      document.getElementById("lon").value = clickLon.toFixed(5);
    }
    if(countmarkers == 2){
      deleteMarkers();
    }
    //Add Marker
    addMarker(event.latLng);
  });
  
   var input = /** @type {!HTMLInputElement}*/ (
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    id:count,
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });
  markers.push(marker);
  autocomplete.addListener('place_changed', function() {
     if(countmarkers == 2){
      deleteMarkers();
    }
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Debe seleccionar una ubicacion");
      //countmarkers = countmarkers - 1;
      return false;
    }
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
      map.setZoom(3);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(3);
    }
    if(countmarkers == 1){
      document.getElementById("lat2").value = place.geometry.location.lat();
      document.getElementById("lon2").value = place.geometry.location.lng();
    }else{
      document.getElementById("lat").value = place.geometry.location.lat();
      document.getElementById("lon").value = place.geometry.location.lng();
    }
    addMarker(place.geometry.location);
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    /*infowindow.open(map, marker);*/
    
  if(count == 0 || count == 3){
    count = 1;
  }
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
  
}
function clearOverlays(id) {
  markers[id].setMap(null);
  alert(markers[id].setMap(null));
  alert(markers[id]);
        
  if(id == 1){
   document.getElementById("lat").value = "";
   document.getElementById("lon").value = "";
  }else{
   document.getElementById("lat2").value = "";
   document.getElementById("lon2").value = "";
  }
  if(count == 0 || count == 3){
    count = 1;
  }
  document.getElementById("countmarkers").value = countmarkers;
  document.getElementById("count").value = count;
}
// Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    id:count,
    position: location,
    map: map
  });
    document.getElementById("countmarkers").value = countmarkers;
  document.getElementById("count").value = count;
   marker.addListener('click', function() {
    var marker = this;
    clearOverlays(this.id);
  });
  markers.push(marker);
  countmarkers ++;
  count ++;
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
  count = 1;
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
  countmarkers = 0;
}
$(document).ready(function(){
		//e.preventDefault();
        var latitud_1;
        var latitud_2;
        var longitud_1;
        var longitud_2;
         //hacemos focus al campo de búsqueda
        //$("#busqueda").focus();
        //comprobamos si se pulsa una tecla
        $("#search").click(function(e){
			//$( "#tbl_search" ).hide();
              //obtenemos el texto introducido en el campo de búsqueda
              latitud_1 = $("#lat").val();
              latitud_2 = $("#lat2").val();
              longitud_1 = $("#lon").val();
              longitud_2 = $("#lon2").val();
              //hace la búsqueda
              $.ajax({
                    type: "GET",
                    url: "geolocalizacion_search.php",
                    data: "latitud="+latitud_1+"&latitud2="+latitud_2+"&longitud="+longitud_1+"&longitud2="+longitud_2,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                         $("#resultado").html("<p align='center'><img src='../images/preloader.gif' /></p>");
                    },
                    error: function(){
                          alert("Error, vuelva a intentar");
                    },
                    success: function(data){                                                   
                          $("#resultado").empty();
                          $("#resultado").append(data);
                    }
              });
        });
});
</script>
     <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  bottom: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
    </style>
</head>
<body>
    <div id="floating-panel">
       <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="type-selector" class="controls">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">Todos</label>
      
      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-address">
      <label for="changetype-address">Dirreciones</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Establecimientos</label>
    </div>
      Latitud: <input type="text" id="lat" value="">
      Longitud: <input type="text" id="lon" value="">
      Latitud2: <input type="text" id="lat2" value="">
      Longitud2: <input type="text" id="lon2" value="">
      markers: <input type="text" id='countmarkers' value="">
      count: <input type="text" id='count' value="">
      <br>
      KM:<div id="resultado"></div>
      <input id="search" type=button value="BUSCAR RUTA">
      <!--onclick="deleteMarkers();"-->
      
    </div>
    <div id="map"></div>
      <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZiX9quA0AJiAFuoxrogRYObImmbCa-6g&signed_in=true&libraries=geometry,places&callback=initMap"></script>
</body>
</html>