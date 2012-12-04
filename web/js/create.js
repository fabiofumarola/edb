var countConservations = 1;
var hashConservations = new Array();


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

function addNewLiterature() {

	var id = $('#cod_literature').val();
	var description = $('#desc_literature').val();
	var note = $('#note_literature').val();

	if (id.length == 0) {
		$('#div_cod_literature').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (description.length == 0) {
		$('#div_desc_literature').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_literature_new_modal');

	// insert the biblio
	$.post(url, {
		id : id,
		description : description,
		note : note
	}, function(result) {

		if (result.toString() == '"ok"') {
			addToLiterature(id);
			cleanNewLiteratureValues();
			$('#newLiteratureModal').modal('hide');
			// addToModalLiterature maybe
		} else {
			alert(result);
		}

	});
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
	var id = $('#inputSignaId').val();
	var desc = $('#inputSignaDescription').val();

	if (id.length == 0) {
		$('#divSignaId').attr('class', 'control-group error');
		return;
	}

	// check if the id is used
	if (desc.length == 0) {
		$('#divSignaDesc').attr('class', 'control-group error');
		return;
	}

	var url = Routing.generate('edb_new_signa');

	$.post(url, {
		id : id,
		description : desc
	}, function(result) {

		if (result.toString() == '"ok"') {
			loadTechniques();
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
	var checked = $('#checkPreciseYear').attr('checked') == 'checked' ? true
			: false;

	if (checked) {
		$("#selectDating").prop('disabled', true);
		$("#inputAnnumFrom").prop('disabled', false);
		$("#inputAnnumTo").prop('disabled', false);
		$("#selectDating").val('0');
		$("#inputAnnumFrom").focus();
	} else {
		$("#selectDating").prop('disabled', false);
		$('#inputAnnumFrom').attr('value', null);
		$('#inputAnnumTo').attr('value', null);
		$("#inputAnnumFrom").prop('disabled', true);
		$("#inputAnnumTo").prop('disabled', true);
	}
}

function checkLostAction() {
	var checked = $('#lost').attr('checked') == 'checked' ? true
			: false;
	
	if (checked) {
		$("#selectConservationLocation").val('15');
		$('#selectConservationContext').html("<option value=\"17\" selected>n.d.</option>");
		$('#selectConservationPosition').html("<option value=\"19\" selected>n.d.</option>");
		
		$("#selectConservationLocation").prop('disabled', true);
		$("#selectConservationContext").prop('disabled', true);
		$("#selectConservationPosition").prop('disabled', true);
	} else {
		$("#selectConservationLocation").val('0');
		$('#selectConservationContext').html("<option></option>");
		$('#selectConservationPosition').html("<option></option>");
		
		$("#selectConservationLocation").prop('disabled', false);
		$("#selectConservationContext").prop('disabled', false);
		$("#selectConservationPosition").prop('disabled', false);
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
			$('#selectConservationLocation').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectConservationLocation').append(
				"<option value =\"-1\">Add New</option>");
	});

}

function loadConservationPosition(idContext) {

	$('#selectConservationPosition').html("<option></option>");

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
													+ data[i].id
													+ '</td>'
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

function removeLastSigna() {

	if ($('#selectSigna option').size() == 0) {
		alert("there are not element to remove");
		return;
	}

	$('#selectSigna option:last-child').remove();
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

function addNewConservationLocation(desc) {

	if (desc.length == 0) {
		$('#divConservationLocation').attr('class', 'control-group error');
		return;
	}

	// get the url for the service
	var url = Routing.generate('edb_new_conservation_location');

	$.post(url, {
		description : desc
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

	var hiddenValue = locationId + "-" + contextId + "-" + positionId;
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

	$("#" + delTd).wrapInner("<a href='#'>delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashConservations[hiddenValue] = undefined;
		countConservations--;
	});

}



$('document').ready(function() {

	loadPertinenceArea();
	loadConservationLocation();
	
	// Click to add bibliography
	$('#addLiteratureRef').click(function() {
		$('#viewLiteratureModal').modal('show');
	});

	// Click to new bibliography
	$('#newLiterature').click(function() {
		$('#newLiteratureModal').modal('show');
	});

	// click button add new bibliography
	$('#addNewBiblio').click(function() {
		addNewLiterature();
	});

	$("#selectPertinenceArea").change(function() {

		// get the value
		var id = $(this).val();

		if (id == -1) {
			// open the dialog to add a new PertinenceArea
			openDialogCreatePertinenceArea();
		} else {
			// load from the db the Pertinence Context for the id
			loadPertinenceContexts(id);
		}

	});

	$("#addPertinenceArea").click(function() {
		var description = $('#inputPertinenceAreaDescription').val();
		addNewPertinenceArea(description);
	});

	$('#selectPertinenceContext').change(function() {
		var id = $(this).val();

		if (id == -1)
			openDialogCreatePertinenceContext();
		else
			loadPertinencePositions(id);
	});

	$('#addPertinenceContext').click(function() {
		var description = $('#inputPertinenceContextDescription').val();
		var idArea = $('#selectPertinenceArea').val();
		addNewPertinenceContext(description, idArea);
	});

	$('#selectPertinencePosition').change(function() {
		var id = $(this).val();

		if (id == -1)
			openDialogCreatePertinencePosition();
	});

	$('#addPertinencePosition').click(function() {
		var description = $('#inputPertinencePositionDescription').val();
		var idContext = $('#selectPertinenceContext').val();
		addNewPertinencePosition(description, idContext);
	});

	$('#selectConservationLocation').change(function() {
		var id = $(this).val();

		if (id == -1)
			openDialogCreateConservationLocation();
		else
			loadConservationContext(id);
	});

	$('#addConservationLocation').click(function() {
		var description = $('#inputConservationLocationDescription').val();
		addNewConservationLocation(description);
	});

	$('#selectConservationContext').change(function() {
		var id = $(this).val();

		if (id == -1)
			openDialogCreateConservationContext();
		else
			loadConservationPosition(id);
	});

	$('#addConservationContext').click(function() {
		var description = $('#inputConservationContextDescription').val();
		var idLocation = $('#selectConservationLocation').val();

		addNewConservationContext(description, idLocation);
	});

	$('#selectConservationPosition').change(function() {
		var id = $(this).val();

		if (id == -1)
			openDialogCreateConservationPosition();
	});

	$('#addConservationPosition').click(function() {
		var description = $('#inputConservationPositionDescription').val();
		var idContext = $('#selectConservationContext').val();

		addNewConservationPosition(description, idContext);
	});

	$('#addConservationToTable').click(function() {
		addConservationToTableAction();
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
		removeLastSigna();
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
});
