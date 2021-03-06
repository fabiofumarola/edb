var countConservations = 1;
var countPertinences = 1;
var countDatings = 1;
var hashConservations = new Array();
var hashPertinences = new Array();
var hashDatings = new Array();
var hashReferences = new Array();
var countRelatedResources = 1;
var hashRelatedResources = new Array();


function addToReferences(id) 
{
	var relationship = $('#bibliography_resource_relation').val();
	var note = $('#refNote').val();
	if(note.indexOf('@_@') != -1)
	{
		alert("Error - The field Note cannot contain the string @_@");
		return;
	}
	
	var toCheck = id + "@_@" + note + "@_@" + relationship;
	if (hashReferences[toCheck] != undefined) 
	{
		alert("Error - The selected bibliographic reference (" + id + ")" + ", with note '" + note + "' and relationship " + relationship + " has already been added!");
		return;
	}
	
	var value = id;
	if(note.length > 0)
		value = value + ", " + note;
	
	if(relationship != 'Identity')
		value = value + " (" + relationship + ")";
	
	hashReferences[toCheck] = toCheck;
	
	$('#selectReferences').append('<option value="' + toCheck + '" selected="selected">' + value + '</option>');
	$('#refNote').val("");
	$('#viewLiteratureModal').modal('hide');
}


function cleanNewLiteratureValues() {
	$('#cod_literature').attr('value', null);
	$('#div_cod_literature').attr('class', 'control-group');
	$('#errorCod').html(null);
	$('#desc_literature').attr('value', null);
	$('#div_desc_literature').attr('class', 'control-group');
	$('#note_literature').attr('value', null);
}

function addToLiterature(id) {
	$('#literature').val($('#literature').val() + id + ";\n");
	$('#viewLiteratureModal').modal('hide');
}

function addToSigna(id, description) {
	var added = false;
	$('#selectSigna option').each(function() {
		if ($(this).attr('value') == id) {
			// already added
			added = true;
			return;
		}
	});

	if (added) {
		alert("Error The Signum Christi: " + description + "is already added!!");
		return;
	}

	$('#selectSigna').append(
			'<option value="' + id + '" selected="selected">' + description
					+ '</option>');
	$('#modalViewSignas').modal('hide');
}


function addNewSupport() {

	var id = $('#inputSupportId').val();
	var desc = $('#inputSupportDescription').val();

	if (id.length == 0) {
		$('#divSupportId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divSupportDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_support');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadSupports();
			$('#modalNewSupport').modal('hide');
		} else {
			alert(result);
		}
	});

}

function addNewTechnique() {

	var id = $('#inputTechniqueId').val();
	var desc = $('#inputTechniqueDescription').val();

	if (id.length == 0) {
		$('#divTechniqueId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divTechniqueDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_technique');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadTechniques();
			$('#modalNewTechnique').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewSignumChristi() {
	var desc = $('#inputSignaDescription').val();

	if (desc.length == 0) {
		$('#divSignaDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_signa');

	$.post(url, {
		description : desc
	},  function(result) {

		if (result.toString() == '"ok"') {
			$('#modalNewSigna').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewOnomasticArea() {
	var id = $('#inputOnomasticAreaId').val();
	var desc = $('#inputOnomasticAreaDescription').val();

	if (id.length == 0) {
		$('#divOnomasticAreaId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divOnomasticAreaDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_onomastic_area');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadOnomasticAreas();
			$('#modalNewOnomasticArea').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewFunction() {
	var id = $('#inputFunctionId').val();
	var desc = $('#inputFunctionDescription').val();

	if (id.length == 0) {
		$('#divFunctionId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divFunctionDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_function');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadFunctions();
			$('#modalNewFunction').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewPaleography() {
	var id = $('#inputPaleographyId').val();
	var desc = $('#inputPaleographyDescription').val();

	if (id.length == 0) {
		$('#divPaleographyId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divPaleographyDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_paleography');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadPaleographies();
			$('#modalNewPaleography').modal('hide');
		} else {
			alert(result);
		}
	});
}

// Recupera e carica la select con le aree di pertinenza
function loadPertinenceArea() {

	// clean the loaded options
	$('#selectPertinenceArea').html("<option></option>");

	var url = Routing.generate('edb_pertinence_area_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectPertinenceArea').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectPertinenceArea').append(
				"<option value =\"-1\">Add New</option>");
	});

}

function loadSupports() {

	// clean the loaded options
	$('#selectSupport').html("<option></option>");

	var url = Routing.generate('edb_support_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectSupport').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectSupport').append("<option value =\"-1\">Add New</option>");
	});

}

function loadTechniques() {

	// clean the loaded options
	$('#selectTechnique').html("<option></option>");

	var url = Routing.generate('edb_technique_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectTechnique').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectTechnique').append("<option value =\"-1\">Add New</option>");
	});
}

function checkPreciseYearAction() {
	var checked = $('#checkPreciseYear').prop('checked');

	if (checked) {
		$("#selectDating").prop('disabled', true);
		$("#selectDating").val(0);
		$("#inputAnnumFrom").prop('disabled', false);
		$("#inputAnnumTo").prop('disabled', false);
		$('#inputAnnumFrom').attr('value', null);
		$('#inputAnnumTo').attr('value', null);
		$("#inputAnnumFrom").focus();
	} else {
		$("#selectDating").prop('disabled', false);
		var idDating = $("#selectDating :selected").val();
		var from = $('#datingFrom'+idDating).val();
		var to = $('#datingTo'+idDating).val();
		$('#inputAnnumFrom').attr('value', from);
		$('#inputAnnumTo').attr('value', to);
		$("#inputAnnumFrom").prop('disabled', true);
		$("#inputAnnumTo").prop('disabled', true);
	}
}

function checkLostAction() {
	var checked = $('#lost').prop('checked');
	
	if (checked) 
	{
		resetConservationLocation('15', null);
		resetConservationContext(null, "<option value=\"17\" selected>n.d.</option>");
		resetConservationPosition(null, "<option value=\"19\" selected>n.d.</option>");
		
		disableCombo("selectConservationLocation");
		disableCombo("selectConservationContext");
		disableCombo("selectConservationPosition");	
	} 
	else 
	{
		resetConservationLocation('0', null);
		resetConservationContext(null, "<option></option>");
		resetConservationPosition(null, "<option></option>");
		
		enableCombo("selectConservationLocation");
		enableCombo("selectConservationContext");
		enableCombo("selectConservationPosition");	
	}
}

function loadOnomasticAreas() {
	// clean the loaded options
	$('#selectOnomasticArea').html("<option></option>");

	var url = Routing.generate('edb_onomastic_area_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectOnomasticArea').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectOnomasticArea').append(
				"<option value =\"-1\">Add New</option>");
	});
}

function loadFunctions() {
	// clean the loaded options
	$('#selectFunction').html("<option></option>");

	var url = Routing.generate('edb_function_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectFunction').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectFunction').append("<option value =\"-1\">Add New</option>");
	});
}

function loadPaleographies() {
	// clean the loaded options
	$('#selectPaleography').html("<option></option>");

	var url = Routing.generate('edb_paleography_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectPaleography').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectPaleography')
				.append("<option value =\"-1\">Add New</option>");
	});
}

function loadConservationLocation() {

	$('#selectConservationLocation').html("<option></option>");

	var url = Routing.generate('edb_conservation_location_list');
	$.getJSON(url, function(data) {

		for (i in data) {
			if(data[i].id == 20)	
				$('#selectConservationLocation').append(
						"<option value=\"" + data[i].id + "\" selected>"
								+ data[i].description + "</option>");
			else
				$('#selectConservationLocation').append(
						"<option value=\"" + data[i].id + "\">"
								+ data[i].description + "</option>");
		}
		$('#selectConservationLocation').append(
				"<option value =\"-1\">Add New</option>");
		resetConservationLocation('20', null);
	});
	
}

function loadConservationPosition(idContext) {

	$('#selectConservationPosition').html("<option></option>");

	if(idContext != null)
	{
		var url = Routing.generate('edb_conservation_position_list', {
			id : idContext
		});
	
		$.getJSON(url, function(data) {
			for (i in data) {
				$('#selectConservationPosition').append(
						"<option value=\"" + data[i].id + "\">"
								+ data[i].description + "</option>");
			}
			$('#selectConservationPosition').append(
					"<option value =\"-1\">Add New</option>");
		});		
	}
}

function loadConservationContext(idConservationLocation) {

	$('#selectConservationContext').html("<option></option>");
	
	var url = Routing.generate('edb_conservation_context_list', {
		id : idConservationLocation
	});

	$.getJSON(url, function(data) {
		for (i in data) {
			$('#selectConservationContext').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectConservationContext').append(
				"<option value =\"-1\">Add New</option>");
	});
}



function openDialogCreatePertinenceArea() {

	$('#inputPertinenceAreaDescription').attr('value', null);
	$('#divPertinenceArea').attr('class', 'control-group');
	$('#errorValPertinenceArea').html(null);
	$('#modalNewPertinenceArea').modal('show');
	$('#inputPertinenceAreaDescription').focus();
}

function openDialogCreatePertinenceContext() {
	$('#inputPertinenceContextDescription').attr('value', null);
	$('#divPertinenceContext').attr('class', 'control-group');
	$('#errorValPertinenceContext').html(null);
	$('#modalNewPertinenceContext').modal('show');
	$('#inputPertinenceContextDescription').focus();
}

function openDialogCreatePertinencePosition() {
	$('#inputPertinencePositiontDescription').attr('value', null);
	$('#divPertinencePosition').attr('class', 'control-group');
	$('#errorValPertinencePosition').html(null);
	$('#modalNewPertinencePosition').modal('show');
	$('#inputPertinencePositionDescription').focus();
}

function openDialogCreateConservationLocation() {
	$('#inputConservationLocationDescription').attr('value', null);
	$('#divConservationLocation').attr('class', 'control-group');
	$('#errorValConservationLocation').html(null);
	$('#modalNewConservationLocation').modal('show');
	$('#inputConservationLocationDescription').focus();
}

function openDialogCreateConservationContext() {
	$('#inputConservationContextDescription').attr('value', null);
	$('#divConservationContext').attr('class', 'control-group');
	$('#errorValConservationContext').html(null);
	$('#modalNewConservationContext').modal('show');
	$('#inputConservationContextDescription').focus();
}

function openDialogCreateConservationPosition() {
	$('#inputConservationPositionDescription').attr('value', null);
	$('#divConservationPosition').attr('class', 'control-group');
	$('#errorValConservationPosition').html(null);
	$('#modalNewConservationPosition').modal('show');
	$('#inputConservationPositionDescription').focus();
}

function openNewDialogCreateSupport() {
	$('#inputSupportId').attr('value', null);
	$('#divSupportId').attr('class', 'control-group');
	$('#errorValSupportId').html(null);

	$('#inputSupportDescription').attr('value', null);
	$('#divSupportDesc').attr('class', 'control-group');
	$('#errorValSupportDesc').html(null);

	$('#modalNewSupport').modal('show');
	$('#inputSupportId').focus();
}

function openNewDialogCreateTechnique() {
	$('#inputTechniqueId').attr('value', null);
	$('#divTechniqueId').attr('class', 'control-group');
	$('#errorValTechniqueId').html(null);

	$('#inputTechniqueDescription').attr('value', null);
	$('#divTechniqueDesc').attr('class', 'control-group');
	$('#errorValTechniqueDesc').html(null);

	$('#modalNewTechnique').modal('show');
	$('#inputTechniqueId').focus();
}

function openNewDialogCreateOnomasticArea() {
	$('#inputOnomasticAreaId').attr('value', null);
	$('#divOnomasticAreaId').attr('class', 'control-group');
	$('#errorValOnomasticAreaId').html(null);

	$('#inputOnomasticAreaDescription').attr('value', null);
	$('#divOnomasticAreaDesc').attr('class', 'control-group');
	$('#errorValOnomasticAreaDesc').html(null);

	$('#modalNewOnomasticArea').modal('show');
	$('#inputOnomasticAreaId').focus();
}

function openNewDialogCreatePaleography() {
	$('#inputPaleographyId').attr('value', null);
	$('#divPaleographyId').attr('class', 'control-group');
	$('#errorValPaleographyId').html(null);

	$('#inputPaleographyDescription').attr('value', null);
	$('#divPaleographyDesc').attr('class', 'control-group');
	$('#errorValPaleographyDesc').html(null);

	$('#modalNewPaleography').modal('show');
	$('#inputPaleographyId').focus();
}

function openNewDialogCreateFunction() {
	$('#inputFunctionId').attr('value', null);
	$('#divFunctionId').attr('class', 'control-group');
	$('#errorValFunctionId').html(null);

	$('#inputFunctionDescription').attr('value', null);
	$('#divFunctionDesc').attr('class', 'control-group');
	$('#errorValFunctionDesc').html(null);

	$('#modalNewFunction').modal('show');
	$('#inputFunctionId').focus();
}

function openDialogNewSigna() {

	$('#inputSignaId').attr('value', null);
	$('#divSignaId').attr('class', 'control-group');
	$('#errorValSignaId').html(null);

	$('#inputSignaDescription').attr('value', null);
	$('#divSignaDesc').attr('class', 'control-group');
	$('#errorValSignaDesc').html(null);

	$('#modalNewSigna').modal('show');
	$('#inputSignaId').focus();
}

function openDialogViewSignas() {
	// clean for eventual data
	$('#tbodySigna').empty();

	// load the data in the modal table
	var url = Routing.generate('edb_signa_list') + ".json";

	$
			.getJSON(
					url,
					function(data) {
						for (i in data) {
							$('#tbodySigna')
									.append(
											'<tr>'
													+ '<td>'
													+ data[i].description
													+ '</td>'
													+ "<td><button class='btn' type='button' onclick=\"addToSigna('"
													+ data[i].id + "', '"
													+ data[i].description
													+ "')\">Add</button>"
													+ "</td>" + "</tr>");
						}
					});

	// show the view
	$('#modalViewSignas').modal('show');

}

function removeSelectedSigna() {
	if ($('#selectSigna option').size() == 0) {
		alert("There are no elements to remove.");
		return;
	}
	$('#selectSigna option:selected').remove();
}

function addNewPertinenceArea(desc) {

	if (desc.length == 0) {
		$('#divPertinenceArea').attr('class', 'control-group error');
		return;
	}

	// get the url for the service
	var url = Routing.generate('edb_new_pertinence_area');

	$.post(url, {
		description : desc
	}, function(result) {

		if (result == '"ok"') {
			loadPertinenceArea();
			$('#inputPertinenceAreaDescription').attr('value', null);
			$('#modalNewPertinenceArea').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewPertinenceContext(desc, idArea) {

	if (desc.length == 0) {
		$('#divPertinenceContext').attr('class', 'control-group error');
		return;
	}

	// get the url for the service
	var url = Routing.generate('edb_new_pertinence_context');

	$.post(url, {
		description : desc,
		idArea : idArea
	}, function(result) {

		if (result == '"ok"') {
			loadPertinenceContexts(idArea);
			$('#inputPertinenceContextDescription').attr('value', null);
			$('#modalNewPertinenceContext').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewPertinencePosition(desc, idContext) {

	if (desc.length == 0) {
		$('#divPertinencePosition').attr('class', 'control-group error');
		return;
	}
	// get the url for the service
	var url = Routing.generate('edb_new_pertinence_position');

	$.post(url, {
		description : desc,
		idContext : idContext
	}, function(result) {

		if (result == '"ok"') {
			loadPertinencePositions(idContext);
			$('#inputPertinencePositionDescription').attr('value', null);
			$('#modalNewPertinencePosition').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewConservationContext(desc, idLocation) {

	if (desc.length == 0) {
		$('#divConservationContext').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_conservation_context');

	$.post(url, {
		description : desc,
		idLocation : idLocation
	}, function(result) {

		if (result == '"ok"') {
			loadConservationContext(idLocation);
			$('#inputConservationContextDescription').attr('value', null);
			$('#modalNewConservationContext').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewConservationPosition(desc, idContext) {
	if (desc.length == 0) {
		$('#divConservationPosition').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_conservation_position');

	$.post(url, {
		description : desc,
		idContext : idContext
	}, function(result) {

		if (result == '"ok"') {
			loadConservationPosition(idContext);
			$('#inputConservationPositionDescription').attr('value', null);
			$('#modalNewConservationPosition').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewConservationLocation(desc, geonames, country, countrygeonames) {

	if (desc.length == 0 || geonames.length == 0 || country.length == 0 || countrygeonames.length == 0) {
		$('#divConservationLocation').attr('class', 'control-group error');
		return;
	}

	// get the url for the service
	var url = Routing.generate('edb_new_conservation_location');

	$.post(url, {
		description : desc,
		geonames : geonames,
		country : country,
		countrygeonames : countrygeonames
	}, function(result) {

		if (result == '"ok"') {
			loadConservationLocation();
			$('#inputConservationLocationDescription').attr('value', null);
			$('#modalNewConservationLocation').modal('hide');
		} else {
			alert(result);
		}
	});
}

function loadPertinenceContexts(id) {
	// clean the loaded options
	$('#selectPertinenceContext').html("<option></option>");

	var url = Routing.generate('edb_pertinence_context_list', {
		id : id
	});

	$.getJSON(url, function(data) {

		for (i in data) {
			$('#selectPertinenceContext').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectPertinenceContext').append(
				"<option value =\"-1\">Add New</option>");
	});
}

function loadPertinencePositions(id) {

	$('#selectPertinencePosition').html("<option></option>");

	if(id != null)
	{
		var url = Routing.generate('edb_pertinence_position_list', {
			id : id
		});
	
		$.getJSON(url, function(data) {
			for (i in data) {
				$('#selectPertinencePosition').append(
						"<option value=\"" + data[i].id + "\">"
								+ data[i].description + "</option>");
			}
			$('#selectPertinencePosition').append(
					"<option value =\"-1\">Add New</option>");
		});
	}
}

function addConservationToTableAction() {
	// get the values text

	var locationId = $('#selectConservationLocation :selected').val();
	var contextId = $('#selectConservationContext :selected').val();
	var positionId = $('#selectConservationPosition :selected').val();
	
	var locationText = $('#selectConservationLocation :selected').text();
	var contextText = $('#selectConservationContext :selected').text();
	var positionText = $('#selectConservationPosition :selected').text();

	// it is true if all the variables do not contains values
	if (!locationText || !contextText || !positionText) {
		alert('Please select values for City/Town, Location and Position. ');
		return;
	}

	var hiddenValue = locationId + "@-@" + contextId + "@-@" + positionId;
	var inputHidden = "<input type='hidden' name='epigraph[conservationsIds][]' value='"
			+ hiddenValue + "'/>";

	var delTd = "deleteTd" + countConservations;
	countConservations++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + locationText + "</td> " + "<td>" + contextText
			+ "</td> " + "<td>" + positionText + "</td> " + "<td id='" + delTd
			+ "'></td> " + inputHidden + "</tr>";

	if (hashConservations[hiddenValue] != undefined) {
		alert('Values already added to the table.');
		countConservations--;
		return;
	}

	$('#tableConservations > tbody:last').append(row);
	hashConservations[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashConservations[hiddenValue] = undefined;
		countConservations--;
	});

}



function addOriginalContextToTableAction() {
	// get the values text

	var locationId = $('#selectPertinenceArea :selected').val();
	var contextId = $('#selectPertinenceContext :selected').val();
	var positionId = $('#selectPertinencePosition :selected').val();

	var locationText = $('#selectPertinenceArea :selected').text();
	var contextText = $('#selectPertinenceContext :selected').text();
	var positionText = $('#selectPertinencePosition :selected').text();
	
	var inSituVal = $('#insitu').prop('checked');
	
	// Check if all the fields are selected
	if (!locationText || !contextText || !positionText) {
		alert('Please select values for Area, Location and Position. ');
		return;
	}

	var valueToCheck = locationId + "@-@" + contextId + "@-@" + positionId;
	var hiddenValue = valueToCheck + "@-@" + inSituVal;
	
	var inputHidden = "<input type='hidden' name='epigraph[originalIds][]' value='"
			+ hiddenValue + "'/>";

	var delTd = "deletePert" + countPertinences;
	countPertinences++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + locationText + "</td> " + "<td>" + contextText
			+ "</td> " + "<td>" + positionText + "</td> <td>";

	if(inSituVal == true)
		row = row + "<i class=\"icon-ok\"></i></td>";
	else
		row = row + "<i class=\"icon-remove\"></i>";
	row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";

	if (hashPertinences[valueToCheck+"@-@true"] != undefined || hashPertinences[valueToCheck+"@-@false"]) {
		alert('Values already added to the table.');
		countPertinences--;
		return;
	}

	$('#tableOriginalContext > tbody:last').append(row);
	hashPertinences[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashPertinences[hiddenValue] = undefined;
		countPertinences--;
	});
}

function isInteger(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n) && n%1 == 0;
	}

function addDatingToTableAction() {
	
	var datingText = $('#selectDating :selected').text();
	var fromText = $('#inputAnnumFrom').val();
	var toText = $('#inputAnnumTo').val();

	// Check if all the fields are compiled
	if (!fromText || !toText) {
		alert('Please fill the From and To fields.');
		return;
	}

	// Check if both the fields are integer 
	if (!isInteger(fromText) || !isInteger(toText)) {
		alert('FROM and TO fields must be numeric (integer).');
		return;
	}
	
	// Check if from is less than to
	if (parseInt(fromText) > parseInt(toText)) {
		alert('The value of TO field must be greater than (or equal to) the value of FROM field.');
		return;
	}
	
	
	var preciseYear = $('#checkPreciseYear').prop('checked');
	var hiddenValue = fromText + "@-@" + toText;
		
	var inputHidden = "<input type='hidden' name='epigraph[datingIds][]' value='" + hiddenValue + "'/>";
	var delTd = "deleteDating" + countDatings;
	countDatings++;

	// add values to the table as row
	var row = "<tr>";
	if(preciseYear)
		row = row + "<td></td>";
	else
		row = row + "<td>" + datingText + "</td>";
	
	row = row + "<td>" + fromText + "</td><td>" + toText+ "</td><td id='" + delTd + "'></td>" + inputHidden + "</tr>";

	if (hashDatings[hiddenValue] != undefined) {
		alert('Values already added to the table.');
		countDatings--;
		return;
	}

	$('#tableDating > tbody:last').append(row);
	hashDatings[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashDatings[hiddenValue] = undefined;
		countDatings--;
	});
}


function loadListOfOriginalContext()
{
	var epiid = $('#epiid').val();
	
	var url = Routing.generate('edb_epigraph_original_context_list', {
		id : epiid
	});

	$.getJSON(url+".json", function(data) {
		for (i in data) {
			var valueToCheck = data[i].pertinence_area.id + "@-@" + data[i].context.id + "@-@" + data[i].pertinence_position.id;
			var hiddenValue = valueToCheck + "@-@" + data[i].in_situ;
			var inputHidden = "<input type='hidden' name='epigraph[originalIds][]' value='"	+ hiddenValue + "'/>";
		
			var delTd = "deletePert" + countPertinences;
			countPertinences++;
		
			// add values to the table as row
			var row = "<tr> " + "<td>" + data[i].pertinence_area.description + "</td> " + "<td>" + data[i].context.description
					+ "</td> " + "<td>" + data[i].pertinence_position.description + "</td> <td>";
		
			if(data[i].in_situ == true)
				row = row + "<i class=\"icon-ok\"></i></td>";
			else
				row = row + "<i class=\"icon-remove\"></i>";
			row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";
		
			if (hashPertinences[valueToCheck+"@-@true"] != undefined || hashPertinences[valueToCheck+"@-@false"]) {
				alert('Values already added to the table.');
				countPertinences--;
				return;
			}
		
			$('#tableOriginalContext > tbody:last').append(row);
			hashPertinences[hiddenValue] = hiddenValue;
		
			$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
			$("#" + delTd + " a").click(function(e) {
				e.preventDefault();
				$(this).parent().parent().remove();
				hashPertinences[hiddenValue] = undefined;
				countPertinences--;
			});
		}
	});
}



function loadListOfReferences()
{
	var epiid = $('#epiid').val();
	var url = Routing.generate('edb_epigraph_references_list', {
		id : epiid
	});

	$.getJSON(url+".json", function(data) {
		for (i in data) {
			var value = data[i].id_riferimento.id;
			var selectId = value + "@_@"; 
			if(data[i].note != null && data[i].note.length > 0)
			{
				value = value + ", " + data[i].note;
				selectId = selectId + data[i].note;
			}
			if(data[i].relazione != 'Identity')
				value = value + " (" + data[i].relazione + ")";
			selectId = selectId + "@_@" + data[i].relazione;
			hashReferences[selectId] = selectId;
			$('#selectReferences').append('<option value="' + selectId + '" selected="selected">' + value + '</option>');
		}
	});
}


function loadListOfConservation()
{
	var epiid = $('#epiid').val();

	var url = Routing.generate('edb_epigraph_conservation_list', {
		id : epiid
	});

	$.getJSON(url+".json", function(data) {
		for (i in data) {
			var locationId = data[i].conservation_location.id;
			var contextId = data[i].conservation_context.id;
			var positionId = data[i].conservation_position.id;
			
			var locationText = data[i].conservation_location.description;
			var contextText = data[i].conservation_context.description;
			var positionText = data[i].conservation_position.description;

			var hiddenValue = locationId + "@-@" + contextId + "@-@" + positionId;
			var inputHidden = "<input type='hidden' name='epigraph[conservationsIds][]' value='"
					+ hiddenValue + "'/>";

			var delTd = "deleteTd" + countConservations;
			countConservations++;

			// add values to the table as row
			var row = "<tr> " + "<td>" + locationText + "</td> " + "<td>" + contextText
					+ "</td> " + "<td>" + positionText + "</td> " + "<td id='" + delTd
					+ "'></td> " + inputHidden + "</tr>";

			if (hashConservations[hiddenValue] != undefined) {
				alert('Values already added to the table.');
				countConservations--;
				return;
			}

			$('#tableConservations > tbody:last').append(row);
			hashConservations[hiddenValue] = hiddenValue;

			$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
			$("#" + delTd + " a").click(function(e) {
				e.preventDefault();
				$(this).parent().parent().remove();
				hashConservations[hiddenValue] = undefined;
				countConservations--;
			});
		}
	});
}




function loadListOfRelatedResources(){

	var epiid = $('#epiid').val();
	
	var url = Routing.generate('edb_epigraph_relresources_list', {
		id : epiid
	});

	$.getJSON(url+".json", function(data) {
		for (i in data) {
			var resourceSourceId = data[i].resource_type.id;
			var resourceSourceName = data[i].resource_type.description;
			var resourceRel = data[i].relation_type;
			var resourceRef = data[i].resource_ref;
			

			var hiddenValue = resourceSourceId + "@-@" + resourceRel + "@-@" + resourceRef;
			var inputHidden = "<input type='hidden' name='epigraph[relatedResources][]' value='"
					+ hiddenValue + "'/>";

			
			var delTd = "deleteTd" + countRelatedResources;
			countRelatedResources++;

			// add values to the table as row
			var row = "<tr> " + "<td>" + resourceSourceName + "</td> " + "<td>" + resourceRef
					+ "</td> " + "<td>" + resourceRel + "</td> " + "<td id='" + delTd
					+ "'></td> " + inputHidden + "</tr>";


			$('#relationTable > tbody:last').append(row);
			hashRelatedResources[hiddenValue] = hiddenValue;

			$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
			$("#" + delTd + " a").click(function(e) {
				e.preventDefault();
				$(this).parent().parent().remove();
				hashRelatedResources[hiddenValue] = undefined;
				countRelatedResources--;
			});
		}
	});
}





function loadListOfDatings()
{
	var epiid = $('#epiid').val();
	
	var url = Routing.generate('edb_epigraph_datings_list', {
		id : epiid
	});

	$.getJSON(url+".json", function(data) {
		for (i in data) {
			
			var fromText = data[i].from;
			var toText = data[i].to;

			var hiddenValue = fromText + "@-@" + toText;
				
			var inputHidden = "<input type='hidden' name='epigraph[datingIds][]' value='" + hiddenValue + "'/>";
			var delTd = "deleteDating" + countDatings;
			countDatings++;

			// add values to the table as row
			var row = "<tr>";
			row = row + "<td></td>";
			row = row + "<td>" + fromText + "</td><td>" + toText+ "</td><td id='" + delTd + "'></td>" + inputHidden + "</tr>";

			if (hashDatings[hiddenValue] != undefined) {
				alert('Values already added to the table.');
				countDatings--;
				return;
			}

			$('#tableDating > tbody:last').append(row);
			hashDatings[hiddenValue] = hiddenValue;

			$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
			$("#" + delTd + " a").click(function(e) {
				e.preventDefault();
				$(this).parent().parent().remove();
				hashDatings[hiddenValue] = undefined;
				countDatings--;
			});
		}
	});
}

$("#bibliography_type").change(function() 
		{
			var type = $(this).val();
			loadReferences(type);
		});


		function loadReferences(type)
		{
			// Clean the table
			$('#tBodyReferences').empty();

			// load the data in the modal table
			var url = Routing.generate('edb_literature_list_modal', {type : type});
			
			$.getJSON(url, function(data) 
			{
				for (i in data) {
					var toAppend = "<tr>"
						+ "<td>" + data[i].tipo + "</td>"
						+ "<td>" + data[i].id + "</td>";
					
					toAppend = toAppend + "<td>";
					
					
					if(data[i].tipo == "Rivista")
					{
						var authors = data[i].autori.split('@');
						for(j in authors)
						{
							var surname_name = authors[j].split(';');
							if(surname_name[1].length > 0)
								toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
							toAppend = toAppend + surname_name[0] + ", ";
						}
						toAppend = toAppend + "<i>" + data[i].titolo + "</i>, ";
						toAppend = toAppend + data[i].idRivista.titolo + ", ";
						if (data[i].numero != null && data[i].numero.length > 0)
							toAppend = toAppend + data[i].numero + ", ";
						toAppend = toAppend + data[i].anno + ", ";
						toAppend = toAppend + data[i].pagineDa + "-" + data[i].pagineA;
					}
					
					else if(data[i].tipo == "Convegno")
					{
						var authors = data[i].autori.split('@');
						for(j in authors)
						{
							var surname_name = authors[j].split(';');
							if(surname_name[1].length > 0)
								toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
							toAppend = toAppend + surname_name[0] + ", ";
						}
						toAppend = toAppend + "<i>" + data[i].titolo + "</i>, in ";
						
						if(data[i].idConvegno.editori != null && data[i].idConvegno.editori.length > 0)
						{
							var editors = data[i].idConvegno.editori.split('@');
							for(j in editors)
							{
								var surname_name = editors[j].split(';');
								if(surname_name[1].length > 0)
									toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
								toAppend = toAppend + surname_name[0];
								if(j == editors.length-1)
									toAppend = toAppend + " (a cura di)";
								toAppend = toAppend + ", ";
							}
						}
						toAppend = toAppend + "<i>" + data[i].idConvegno.titolo + "</i> (" + data[i].idConvegno.luogoConvegno + " " + data[i].idConvegno.dataConvegno  + "), ";
						toAppend = toAppend + data[i].idConvegno.cittaEdizione + " " + data[i].idConvegno.annoEdizione + ", ";
						toAppend = toAppend + data[i].pagineDa + "-" + data[i].pagineA;
					}
					
					else if(data[i].tipo == "Monografia")
					{
						var authors = data[i].autori.split('@');
						for(j in authors)
						{
							var surname_name = authors[j].split(';');
							if(surname_name[1].length > 0)
								toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
							toAppend = toAppend + surname_name[0] + ", ";
						}
						toAppend = toAppend + "<i>" + data[i].titolo + "</i>, ";
						toAppend = toAppend + data[i].cittaEdizione + " " + data[i].anno;
					}
					
					else if(data[i].tipo == "Repertorio")
						toAppend = toAppend + data[i].titolo;
					
					else if(data[i].tipo == "Corpus")
					{
						toAppend = toAppend + "<i>" + data[i].titolo + "</i>. ";
						toAppend = toAppend + data[i].numero + ", ";
						if(data[i].editori != null && data[i].editori.length >0)
						{
							var editors = data[i].editori.split('@');
							for(j in editors)
							{
								var surname_name = editors[j].split(';');
								if(surname_name[1].length > 0)
									toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
								toAppend = toAppend + surname_name[0];
								if(j == editors.length-1)
									toAppend = toAppend + " (a cura di)";
								toAppend = toAppend + ", ";
							}
						}
						if(data[i].cittaEdizione != null)
							toAppend = toAppend + data[i].cittaEdizione;
						
						if(data[i].anno != null)
						{
							if(data[i].cittaEdizione == null && data[i].editori == null)
								toAppend = toAppend + ", ";
							toAppend = toAppend + " " + data[i].anno;
						}						
					}
					else if(data[i].tipo == "Volume")
					{
						var authors = data[i].autori.split('@');
						for(j in authors)
						{
							var surname_name = authors[j].split(';');
							if(surname_name[1].length > 0)
								toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
							toAppend = toAppend + surname_name[0] + ", ";
						}
						toAppend = toAppend + "<i>" + data[i].titolo + "</i>, in ";
						
						if(data[i].idVolume.editori != null && data[i].idVolume.editori.length > 0)
						{
							var editors = data[i].idVolume.editori.split('@');
							for(j in editors)
							{
								var surname_name = editors[j].split(';');
								if(surname_name[1].length > 0)
									toAppend = toAppend + surname_name[1].substring(0,1) + ". ";
								toAppend = toAppend + surname_name[0];
								if(j == editors.length-1)
									toAppend = toAppend + " (a cura di)";
								toAppend = toAppend + ", ";
							}
						}
						toAppend = toAppend + "<i>" + data[i].idVolume.titolo + "</i>, ";
						toAppend = toAppend + data[i].idVolume.cittaEdizione + " " + data[i].idVolume.annoEdizione + ", ";
						toAppend = toAppend + data[i].pagineDa + "-" + data[i].pagineA;
					}
					
					toAppend = toAppend + "</td>";

//					toAppend = toAppend + "<td><button class='btn' type='button' onclick=\"addToReferences('" + data[i].id + "')\">Add</button></td>" + "</tr>";
					toAppend = toAppend + "<td><input type='radio' id='reference' name='reference' value='" + data[i].id + "'></td>" + "</tr>";
					$('#tBodyReferences').append(toAppend);
				}
			});	
		}

		
function addOtherResourcesToTable() {
		var resourceSource = $('#epigraph_resource_source :selected').val();
		var resourceSourceName = $('#epigraph_resource_source :selected').text();
		var resourceRel = $('#epigraph_resource_relation :selected').val();
		var resourceRef = $('#resource_reference').val();

		// Check if all the fields are compiled
		if (!resourceRef) {
			alert('Please fill the Reference ID field');
			return;
		}
			
		var hiddenValue = resourceSource + "@-@" + resourceRel + "@-@" + resourceRef;
			
		var inputHidden = "<input type='hidden' name='epigraph[relatedResources][]' value='" + hiddenValue + "'/>";
		var delTd = "deleteDating" + countRelatedResources;
		countRelatedResources++;

		// add values to the table as row
		var row = "<tr><td>" + resourceSourceName + "</td><td>" + resourceRef+ "</td><td>" + resourceRel + "<td id='" + delTd + "'></td>" + inputHidden + "</tr>";

		if (hashRelatedResources[hiddenValue] != undefined) {
			alert('Values already added to the table.');
			countRelatedResources--;
			return;
		}

		$('#relationTable > tbody:last').append(row);
		hashRelatedResources[hiddenValue] = hiddenValue;

		$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
		$("#" + delTd + " a").click(function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
			hashRelatedResources[hiddenValue] = undefined;
			countRelatedResources--;
		});
}		
		


//Comboboxes for conservation
//----------------------------------------------------------------------------------------
function resetConservationLocation(value, html)
{
	$('#selectConservationLocation').combobox();
	
	if(value == null)
		$('#selectConservationLocation').val('');
	else
		$('#selectConservationLocation').val(value);

	if(html != null)
		$('#selectConservationLocation').html(html);
	
	$('#selectConservationLocation').combobox('destroy');
	$('#selectConservationLocation').combobox();
	$('#selectConservationLocation').combobox(
	{ 
     select: function (event, ui) 
     { 
     	var id = $(this).val();
     	if (id == -1)
 			openDialogCreateConservationLocation();
 		else
 		{
 			loadConservationContext(id);
 			resetConservationContext(null, null);
 			
 			loadConservationPosition(null);
 			resetConservationPosition(null, null);
 		}
     } 
 });
}



function resetConservationContext(value, html)
{
	$('#selectConservationContext').combobox();
	
	if(value == null)
		$('#selectConservationContext').val('');
	else
		$('#selectConservationContext').val(value);
	
	if(html != null)
		$('#selectConservationContext').html(html);
	
	$('#selectConservationContext').combobox('destroy');
	$('#selectConservationContext').combobox();
	
	$('#selectConservationContext').combobox(
	{ 
     select: function (event, ui) 
     { 
     	var id = $(this).val();

 		if (id == -1)
 			openDialogCreateConservationContext();
 		else
 		{
 			loadConservationPosition(id);
 			resetConservationPosition(null, null);
 		}
     } 
 });
}

function resetConservationPosition(value, html)
{	
	$('#selectConservationPosition').combobox();
	
	if(value == null)
		$('#selectConservationPosition').val('');
	else
		$('#selectConservationPosition').val(value);

	if(html != null)
		$('#selectConservationPosition').html(html);

	
	$('#selectConservationPosition').combobox('destroy');
	$('#selectConservationPosition').combobox();
	$("#selectConservationPosition").combobox(
	{ 
     select: function (event, ui) 
     { 
     	var id = $(this).val();

 		if (id == -1)
 			openDialogCreateConservationPosition();
     } 
 });	
}
//----------------------------------------------------------------------------------------


//Comboboxes for original context
//----------------------------------------------------------------------------------------
function resetPertinenceArea(value, html)
{
	$('#selectPertinenceArea').combobox();
	if(value == null)
		$('#selectPertinenceArea').val('');
	else
		$('#selectPertinenceArea').val(value);
	
	if(html != null)
		$('#selectPertinenceArea').html(value);
	
	$('#selectPertinenceArea').combobox('destroy');
	$('#selectPertinenceArea').combobox();
	
	$('#selectPertinenceArea').combobox(
	{ 
     select: function (event, ui) 
     { 
     	// get the value
 		var id = $(this).val();
 		
 		if (id == -1) 
 			openDialogCreatePertinenceArea();
 		else
 		{
 			loadPertinenceContexts(id);
 			resetPertinenceContext(null, null);
 			
 			loadPertinencePositions(null);
 			resetPertinencePosition(null, null);
 		}
     } 
 });
}



function resetPertinenceContext(value, html)
{
	$('#selectPertinenceContext').combobox();
	if(value == null)
		$('#selectPertinenceContext').val('');
	else
		$('#selectPertinenceContext').val(value);
	
	if(html != null)
		$('#selectPertinenceContext').html(value);
	
	$('#selectPertinenceContext').combobox('destroy');
	$('#selectPertinenceContext').combobox();
	
	$('#selectPertinenceContext').combobox(
	{ 
     select: function (event, ui) 
     { 
     	var id = $(this).val();

 		if (id == -1)
 			openDialogCreatePertinenceContext();
 		else
 		{
 			loadPertinencePositions(id);
 			resetPertinencePosition(null, null);
 		}
     } 
 });
}


function resetPertinencePosition(value, html)
{	
	$('#selectPertinencePosition').combobox();
	
	if(value == null)
		$('#selectPertinencePosition').val('');
	else
		$('#selectPertinencePosition').val(value);
	
	if(html != null)
		$('#selectPertinencePosition').html(html);
	
	$('#selectPertinencePosition').combobox('destroy');
	$('#selectPertinencePosition').combobox();
	$("#selectPertinencePosition").combobox(
	{ 
     select: function (event, ui) 
     { 
     	var id = $(this).val();

 		if (id == -1)
 			openDialogCreatePertinencePosition();
     } 
 });	
}
//----------------------------------------------------------------------------------------




$('document').ready(function() {
	loadPertinenceArea();
	
	resetPertinenceArea(null, null);
	$("#addPertinenceArea").click(function() {
		var description = $('#inputPertinenceAreaDescription').val();
		addNewPertinenceArea(description);
	});
	
	
	resetPertinenceContext(null, null);
	$('#addPertinenceContext').click(function() {
		var description = $('#inputPertinenceContextDescription').val();
		var idArea = $('#selectPertinenceArea').val();
		addNewPertinenceContext(description, idArea);
	});

		
	resetPertinencePosition(null, null);
	$('#addPertinencePosition').click(function() {
		var description = $('#inputPertinencePositionDescription').val();
		var idContext = $('#selectPertinenceContext').val();
		addNewPertinencePosition(description, idContext);
	});
	
	$('#addOriginalContextToTable').click(function() {
		addOriginalContextToTableAction();
	});

	
	
	loadConservationLocation();
	$('#addConservationLocation').click(function() {
		var description = $('#inputConservationLocationDescription').val();
		var geonames = $('#inputConservationLocationIDGeonames').val();
		var country = $('#inputConservationLocationCountry').val();
		var countrygeonames = $('#inputConservationLocationCountryIDGeonames').val();
		addNewConservationLocation(description, geonames, country, countrygeonames);
	});
	resetConservationLocation('20', null);

	resetConservationContext(null, null);
	$('#addConservationContext').click(function() {
		var description = $('#inputConservationContextDescription').val();
		var idLocation = $('#selectConservationLocation').val();

		addNewConservationContext(description, idLocation);
	});
	loadConservationContext(20);

	resetConservationPosition(null, null);
	$('#addConservationPosition').click(function() {
		var description = $('#inputConservationPositionDescription').val();
		var idContext = $('#selectConservationContext').val();

		addNewConservationPosition(description, idContext);
	});
	
	
	$('#addConservationToTable').click(function() {
		addConservationToTableAction();
	});
	
	// ----------------------------------------------------------------------------------------
	
	
	
	
	
	
	
	
	// Button which add a bibliographic reference to the list
	$('#addReferenceButton').click(function() {
		if($('#reference:checked').val() == null)
			alert("Please select a bibliographic reference!");
		else
			addToReferences($('#reference:checked').val());
	});
	
	
	
	
	$('#addToRelationTable').click(function() {
		addOtherResourcesToTable();
	});
	
	// Click to add bibliography
	$('#addLiteratureRef').click(function() {
		$('#bibliography_type').val("Rivista");
		$('#bibliography_resource_relation').val("Identity");
		$('#refNote').val("");
		loadReferences("Rivista");
		$('#viewLiteratureModal').modal('show');
	});

	$('#removeReference').click(function() {
		if ($('#selectReferences option').size() == 0) {
			alert("There is no element to remove.");
			return;
		}
		var selected = $('#selectReferences option:selected').val();
		hashReferences[selected] = null;
		$('#selectReferences option:selected').remove();
	});



	$('#selectSupport').change(function() {
		if ($(this).val() == -1)
			openNewDialogCreateSupport();
	});

	$('#addSupport').click(function() {
		addNewSupport();
	});

	$('#selectTechnique').change(function() {
		if ($(this).val() == -1)
			openNewDialogCreateTechnique();
	});

	$('#addTechnique').click(function() {
		addNewTechnique();
	});

	$('#selectPaleography').change(function() {
		if ($(this).val() == -1)
			openNewDialogCreatePaleography();
	});

	$('#addPaleography').click(function() {
		addNewPaleography();
	});

	$('#selectFunction').change(function() {
		if ($(this).val() == -1)
			openNewDialogCreateFunction();
	});

	$('#addFunction').click(function() {
		addNewFunction();
	});

	$('#selectOnomasticArea').change(function() {
		if ($(this).val() == -1)
			openNewDialogCreateOnomasticArea();
	});

	$('#addOnomasticArea').click(function() {
		addNewOnomasticArea();
	});

	$('#addSigna').click(function() {
		openDialogViewSignas();
	});

	$('#newSigna').click(function() {
		openDialogNewSigna();
	});

	$('#removeSigna').click(function() {
		removeSelectedSigna();
	});

	$('#addSignum').click(function() {
		addNewSignumChristi();
	});

	$('#checkPreciseYear').click(function() {
		checkPreciseYearAction();
	});
	
	$('#lost').click(function() {
		checkLostAction();
	});
	
	$('#selectDating').change(function() {
		checkPreciseYearAction();
	});
	
	$('#addDating').click(function() {
		addDatingToTableAction();
	});
	
	
	
	$('#submitButton').click(function() {
	    $('#selectSigna option').prop('selected', 'selected');
	    $('#selectReferences option').prop('selected', 'selected');
	    return checkIcvr(false);
	});
	
	$('#submitButtonNew').click(function() {
	    $('#selectSigna option').prop('selected', 'selected');
	    $('#selectReferences option').prop('selected', 'selected');
	    return checkIcvr(true);
	});
	
	$('#submitAndApproveButton').click(function() {
	    $('#selectSigna option').prop('selected', 'selected');
	    $('#selectReferences option').prop('selected', 'selected');
	    return checkIcvr(false);
	});
	
	$('#submitAndBackButton').click(function() {
	    $('#selectSigna option').prop('selected', 'selected');
	    $('#selectReferences option').prop('selected', 'selected');
	    return checkIcvr(false);
	});
	
	$('#submitToAdminButton').click(function() {
	    $('#selectSigna option').prop('selected', 'selected');
	    $('#selectReferences option').prop('selected', 'selected');
	    return checkIcvr(false);
	});
	
	loadListOfReferences();
		
	loadListOfOriginalContext();
	
	loadListOfConservation();	
	
	loadListOfDatings();
	
	loadListOfRelatedResources();
});

function checkIcvr(asNew){
	var duplicated = false;
    $('#selectSigna option').prop('selected', 'selected');
    $('#selectReferences option').prop('selected', 'selected');

    icvrvol = $('#epigraph_icvr').val();
    icvrprinc = $('#icvrprinc').val();
    icvrsub = $('#icvrsub').val();
    epiid = $('#epiid').val();
        
    if(icvrvol == 'null' && (icvrprinc != '' || icvrsub != ''))
    {
    	alert('Number and/or subnumber cannot be specified without specifying the ICVR Volume.');
    	return false;
    }
    else if(icvrvol != 'null' && icvrprinc == '')
    {
    	alert('ICVR Volume cannot be specified without specifying the ICVR Number.');
    	return false;
    }
    
    // Only subnumber is specified
    else if(icvrprinc == '' && icvrsub != '')
    {
    	alert('Subnumber cannot specified without specifying the principal number.');
    	return false;
    }

    // Both number and subnumber are specified (check for duplicated)
    else if(icvrprinc != '' && icvrsub != '')
    {
    	var url = Routing.generate('edb_epigraph_icvr_sub_list', {
    		id: icvrprinc,
    		sub: icvrsub
    	});
    	count = 0;
    	message = "";
    	$.ajaxSetup({async: false});
    	$.getJSON(url + '.json', function(data) {		
    		for (i in data) {
    			if(data[i].id != epiid || asNew)
    			{
    				message = message + "ID: " + data[i].id + "\n";
    				count++;
    			}
    		}
    	});
    	$.ajaxSetup({async: true});
    	if(count > 0)
    		duplicated = true;
    }
    
    
    // Only number is specified (check for existing with the same number)
    if(duplicated || (icvrprinc != '' && icvrsub == ''))
    {
    	var url = Routing.generate('edb_epigraph_icvr_list', {
    		id: icvrprinc
    	});
    	message = "";
    	count = 0;
    	
    	$.ajaxSetup({async: false});
    	$.getJSON(url + '.json', function(data) {
    			    		
    		for (i in data) {
    			if(data[i].id != epiid || asNew)
    			{
    				message = message + "ID: " + data[i].id;
	    			if(data[i].sub_numeration != "")
	    				message = message + " - Subnumber: " + data[i].sub_numeration;
	    			else
	    				message = message + " - No subnumber";
	    			message = message + "\n";
	    			count++;
    			}
    		}
    	});
    	$.ajaxSetup({async: true});
    	if(count > 0)
    	{
    		message = "The specified ICVR number/subnumber is already in the database:\n" + message;
    		message = message + "\nPlease specify a correct subnumber!";
    		alert(message);
	    	return false;
    	}
    }
    return true;
}



function disableCombo(comboName)
{
	var comboNameJQuery = "#" + comboName;
	$(comboNameJQuery).parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", true).prop("disabled",true);
	$(comboNameJQuery).parent().find("a.ui-button").button("disable");
}

function enableCombo(comboName)
{
	var comboNameJQuery = "#" + comboName;
	$(comboNameJQuery).parent().find("input.ui-autocomplete-input").autocomplete("option", "disabled", false).prop("disabled",false);
	$(comboNameJQuery).parent().find("a.ui-button").button("enable");
}
