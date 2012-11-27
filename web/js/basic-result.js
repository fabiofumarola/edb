//
// START: Geographic position section
//

// Global variables
var map;
var marker;
var geocoder;

// Starting point: centre of the world is St. Peter @ Rome if nothing else provided
var defLat = 41.90228857328969;
var defLng = 12.457235282897955;

// Get inner html from field_id and check if it contains valid geographic coordinates
function checkGeoPosition(field_id) {
	var geoPos = $('#'+field_id).html();
	return (getLatLngFromGeoPos(geoPos) != false); 
}

//At each show map click use current values of selected object to show
function initGeoPosition(id) {
	  var lat = defLat;
	  var lng = defLng;
	  var startingPos = getLatLngFromGeoPos(document.getElementById('fld_geoPosition_'+id).innerHTML);
	  if (startingPos!=false) {
		  lat = startingPos[0];
		  lng = startingPos[1];
	  }
      var latlng = new google.maps.LatLng(lat, lng);
	  // update marker and map with current coordinates
	  map.setCenter(latlng);
	  marker.setPosition(latlng);
      // update modal text fields	  
	  document.getElementById('map_geoPosition').innerHTML = lat + ',' + lng;
	  // update relative address
	  codeLatLng();
}

//At modal startup init everything with default
function loadGeoPosition() {
  var lat = defLat;
  var lng = defLng;
  var latlng = new google.maps.LatLng(lat, lng);
  var mapOptions = {
    center: latlng,
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  geocoder = new google.maps.Geocoder();
  // show map but no marker at load time
  map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
  marker = new google.maps.Marker({
	  position: latlng,
	  map: map,
      title: 'Selected position'
  });
}


// From geoPosition string to geoPosition array if valid, FALSE otherwise
function getLatLngFromGeoPos(geoPos) {
	var geoSplit = geoPos.split(",");
	if (geoSplit.length!=2) return false;
	if (parseFloat(geoSplit[0])==NaN) return false;
	if (parseFloat(geoSplit[1])==NaN) return false;
	return geoSplit;
}

//Get Map point (from marker in the Map) and convert to Address
function codeLatLng() {
    var inputvalue = document.getElementById('map_geoPosition').innerHTML;
    var latlngStr = inputvalue.split(",",2);
    var lat = parseFloat(latlngStr[0]);
    var lng = parseFloat(latlngStr[1]);
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[1]) {
          // update text fields with address
          document.getElementById("map_address").innerHTML = results[1].formatted_address;
        }
      } else {
        alert("Impossible to get address from geographic position: geocoder failed due to: " + status);
      }
    });
  }

//
//END: Geographic position section
//


$('document').ready(function() {

	loadGeoPosition();

	// each item in the result list need a button to show its geographic coordinates on map
	$("a[name=viewGeoPosition]").each(function() { 
		var id = $(this).attr('value');
		if (checkGeoPosition('fld_geoPosition_'+id)) {
			// Click to view geoPosition on map
			$(this).click(function() {
				initGeoPosition(id);
				$('#map_geoPosition').val(id);
				$('#viewGeoPositionModal').modal('show');
			});
		} else {
			$(this).attr("disabled", true);
			$(this).attr("title", "No geographic position available");
		}
	});




});