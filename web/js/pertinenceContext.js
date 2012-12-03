var pertinenceContexts = null;
var mapId = "#map";
var address = "#address";
var geoposition = "#Original_Context_geoposition";

function clearPertinenceContextSelect() {
	// clean the loaded options
	$('#selectPertinenceContext').html("<option></option>");
}

function loadPertinenceContexts(id) {

	var url = Routing.generate('edb_pertinence_context_list', {
		id : id
	});

	$.getJSON(url, function(data) {

		pertinenceContexts = data;

		for (i in data) {
			$('#selectPertinenceContext').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
	});
}

function addMarker(pertinenceContext){
	
	var value = new String(pertinenceContext.geoposition);
	value = value.replace("(", "");
	value = value.replace(")", "");
	var split = value.split(",");

	var ltn = parseFloat(split[0]);
	var lng = parseFloat(split[1]);

	$(mapId).gmap3({
		clear : "marker",
		marker : {
			latLng : [ ltn, lng ],
			options : {
				draggable : true
			},
			events : {
				dragend : function(marker) {
					//alert(marker.getPosition());
					$('#Original_Context_geoposition').attr('value',marker.getPosition());
				}
			}
		},
		map : {
			options : {
				zoom : 8
			}
		}
	});
}


function loadDataToForm(id) {

	if (pertinenceContexts == null)
		return;

	if (pertinenceContexts.length == 0)
		return;

	for (i in pertinenceContexts) {
		if (pertinenceContexts[i].id == id) {
			$('#Original_Context_id').attr('value', pertinenceContexts[i].id);
			$('#Original_Context_area').attr('value',
					pertinenceContexts[i].area.id);
			$('#Original_Context_description').attr('value',
					pertinenceContexts[i].description);
			$('#Original_Context_geoposition').attr('value',
					pertinenceContexts[i].geoposition);

			if (pertinenceContexts[i].geoposition != null) {
				addMarker(pertinenceContexts[i]);
			}else{
				$(mapId).gmap3({
					clear : "marker",
				});
			}
		}
	}
}

$('document').ready(function() {

	var initValue = $('#selectPertinenceArea').val();
	clearPertinenceContextSelect();
	loadPertinenceContexts(initValue);

	$('#selectPertinenceArea').change(function() {
		// get the value
		var id = $(this).val();
		clearPertinenceContextSelect();
		loadPertinenceContexts(id);
	});

	$('#selectPertinenceContext').change(function() {
		var id = $(this).val();
		loadDataToForm(id);
	});

	// init the map with center in Bari
	$(mapId).gmap3({
		map : {
			options : {
				center : [ 41.9015141, 12.4607737 ],
				zoom : 10,
				mapTypeControl : true,
				mapTypeControlOptions : {
					style : google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				navigationControl : true,
				scrollwheel : true,
				streetViewControl : true
			}
		}
	});

	$(address).autocomplete({
		source : function() {
			$(mapId).gmap3({
				getaddress : {
					address : $(this).val(),
					callback : function(results) {
						if (!results)
							return;
						$(address).autocomplete("display", results, false);
					}
				}
			});
		},
		cb : {
			cast : function(item) {
				return item.formatted_address;
			},
			select : function(item) {

				// put the coordinates in geoposition input text
				$(geoposition).attr('value', item.geometry.location);

				$(mapId).gmap3({
					clear : "marker",
					marker : {
						latLng : item.geometry.location,
						options : {
							draggable : true
						},
						events : {
							dragend : function(marker) {
								//alert(marker.getPosition());
								$('#Original_Context_geoposition').attr('value',marker.getPosition());
							}
						}
					},
					map : {
						options : {
							center : item.geometry.location,
						}
					}
				});
			}
		}
	}).focus();

});
