// Global variables
var map;
var marker;
var geocoder;

// Starting point: centre of the world is St. Peter @ Rome if nothing else provided
var defLat = 41.90228857328969;
var defLng = 12.457235282897955;

//At each show map click use current values of selected object to show
function showMap($latlngInput) 
{
	var latlngStr = $latlngInput.split(",",2);
	var lat = parseFloat(latlngStr[0]);
	var lng = parseFloat(latlngStr[1]);
    var latlng = new google.maps.LatLng(lat, lng);
	map.setCenter(latlng);
	marker.setPosition(latlng);  
	document.getElementById('map_geoPosition').innerHTML = lat + ',' + lng;
	codeLatLng();
	$('#viewGeoPositionModal').modal('show');	
}

//At modal startup init everything with default
function loadGeoPosition() {
  var lat = defLat;
  var lng = defLng;
  var latlng = new google.maps.LatLng(lat, lng);
  var mapOptions = {
    center: latlng,
    zoom: 15,
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


$('document').ready(function() {
	loadGeoPosition();
});


function showRef(refId) 
{
	// load the data in the modal table
	var url = Routing.generate('edb_literature_single_modal', {refId : refId});

	var refText = "";	
	$.getJSON(url, function(data) 
	{
		var refData = data[0];
			
		if(refData.tipo == "Rivista")
		{
			var authors = refData.autori.split('@');
			for(j in authors)
			{
				var surname_name = authors[j].split(';');
				if(surname_name[1].length > 0)
					refText = refText + surname_name[1].substring(0,1) + ". ";
				refText = refText + surname_name[0] + ", ";
			}
			refText = refText + "<i>" + refData.titolo + "</i>, ";
			refText = refText + refData.idRivista.titolo + ", ";
			if (refData.numero != null && refData.numero.length > 0)
				refText = refText + refData.numero + ", ";
			refText = refText + refData.anno + ", ";
			refText = refText + refData.pagineDa + "-" + refData.pagineA;
		}
			
		else if(refData.tipo == "Convegno")
		{
			var authors = refData.autori.split('@');
			for(j in authors)
			{
				var surname_name = authors[j].split(';');
				if(surname_name[1].length > 0)
					refText = refText + surname_name[1].substring(0,1) + ". ";
				refText = refText + surname_name[0] + ", ";
			}
			refText = refText + "<i>" + refData.titolo + "</i>, in ";
			
			if(refData.idConvegno.editori != null && refData.idConvegno.editori.length > 0)
			{
				var editors = refData.idConvegno.editori.split('@');
				for(j in editors)
				{
					var surname_name = editors[j].split(';');
					if(surname_name[1].length > 0)
						refText = refText + surname_name[1].substring(0,1) + ". ";
					refText = refText + surname_name[0];
					if(j == editors.length-1)
						refText = refText + " (a cura di)";
					refText = refText + ", ";
				}
			}
			refText = refText + "<i>" + refData.idConvegno.titolo + "</i> (" + refData.idConvegno.luogoConvegno + " " + refData.idConvegno.dataConvegno  + "), ";
			refText = refText + refData.idConvegno.cittaEdizione + " " + refData.idConvegno.annoEdizione + ", ";
			refText = refText + refData.pagineDa + "-" + refData.pagineA;
		}
			
		else if(refData.tipo == "Monografia")
		{
			var authors = refData.autori.split('@');
			for(j in authors)
			{
				var surname_name = authors[j].split(';');
				if(surname_name[1].length > 0)
					refText = refText + surname_name[1].substring(0,1) + ". ";
				refText = refText + surname_name[0] + ", ";
			}
			refText = refText + "<i>" + refData.titolo + "</i>, ";
			refText = refText + refData.cittaEdizione + " " + refData.anno;
		}
			
		else if(refData.tipo == "Repertorio")
			refText = refText + refData.titolo;
			
		else if(refData.tipo == "Corpus")
		{
			refText = refText + "<i>" + refData.titolo + "</i>. ";
			refText = refText + refData.numero + ", ";
			if(refData.editori != null && refData.editori.length >0)
			{
				var editors = refData.editori.split('@');
				for(j in editors)
				{
					var surname_name = editors[j].split(';');
					if(surname_name[1].length > 0)
						refText = refText + surname_name[1].substring(0,1) + ". ";
					refText = refText + surname_name[0];
					if(j == editors.length-1)
						refText = refText + " (a cura di)";
					refText = refText + ", ";
				}
			}
			if(refData.cittaEdizione != null)
				refText = refText + refData.cittaEdizione;
			
			if(refData.anno != null)
			{
				if(refData.cittaEdizione == null && refData.editori == null)
					refText = refText + ", ";
				refText = refText + " " + refData.anno;
			}
		}
			
		else if(refData.tipo == "Volume")
		{
			var authors = refData.autori.split('@');
			for(j in authors)
			{
				var surname_name = authors[j].split(';');
				if(surname_name[1].length > 0)
					refText = refText + surname_name[1].substring(0,1) + ". ";
				refText = refText + surname_name[0] + ", ";
			}
			refText = refText + "<i>" + refData.titolo + "</i>, in ";
			
			if(refData.idVolume.editori != null && refData.idVolume.editori.length > 0)
			{
				var editors = refData.idVolume.editori.split('@');
				for(j in editors)
				{
					var surname_name = editors[j].split(';');
					if(surname_name[1].length > 0)
						refText = refText + surname_name[1].substring(0,1) + ". ";
					refText = refText + surname_name[0];
					if(j == editors.length-1)
						refText = refText + " (a cura di)";
					refText = refText + ", ";
				}
			}
			refText = refText + "<i>" + refData.idVolume.titolo + "</i>, ";
			refText = refText + refData.idVolume.cittaEdizione + " " + refData.idVolume.annoEdizione + ", ";
			refText = refText + refData.pagineDa + "-" + refData.pagineA;
		}
		$('#reference').html(refText);
		$('#viewSingleLiteratureModal').modal('show');
	});	

	
}