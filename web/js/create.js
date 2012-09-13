var countConservations = 1;
var hashConservations = new Array();
var greekActive = false;

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

function addToSigna(id,description){
	var added = false;
	$('#selectSigna option').each(function() {
		if ($(this).attr('value') == id){
			//already added
			added = true;
			return;
		}
	});
	
	if (added){
		alert("Error The Signum Christi: " + description + "is already added!!");
		return;
	}
	
	$('#selectSigna').append('<option value="' + id +'" selected="selected">' + description + '</option>');
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

function addNewSupport(){
	
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
		if (result.toString() == '"ok"') {
			loadSupports();
			$('#modalNewSupport').modal('hide');
		} else {
			alert(result);
		}
	});
	
}

function addNewTechnique(){
	
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
		if (result.toString() == '"ok"') {
			loadTechniques();
			$('#modalNewTechnique').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewSignumChristi(){
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
		if (result.toString() == '"ok"') {
			loadTechniques();
			$('#modalNewSigna').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewOnomasticArea(){
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
		if (result.toString() == '"ok"') {
			loadOnomasticAreas();
			$('#modalNewOnomasticArea').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewFunction(){
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
		if (result.toString() == '"ok"') {
			loadFunctions();
			$('#modalNewFunction').modal('hide');
		} else {
			alert(result);
		}
	});
}

function addNewPaleography(){
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
	
	$.post(url, {id: id, description: desc}, function(result) {
		
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

function loadSupports(){
	
	// clean the loaded options
	$('#selectSupport').html("<option></option>");

	var url = Routing.generate('edb_support_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectSupport').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectSupport').append(
				"<option value =\"-1\">Add New</option>");
	});
	
}

function loadTechniques(){
	
	// clean the loaded options
	$('#selectTechnique').html("<option></option>");

	var url = Routing.generate('edb_technique_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectTechnique').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectTechnique').append(
				"<option value =\"-1\">Add New</option>");
	});
}

function checkPreciseYearAction(){
	var checked = $('#checkPreciseYear').attr('checked') == 'checked' ? true : false;
	
	if (checked){
		$("#selectDating").prop('disabled', true);
		$("#inputAnnumFrom").prop('disabled', false);
		$("#inputAnnumTo").prop('disabled', false);
		$("#selectDating").val('0');
		$("#inputAnnumFrom").focus();
	}else{
		$("#selectDating").prop('disabled', false);
		$('#inputAnnumFrom').attr('value',null);
		$('#inputAnnumTo').attr('value',null);
		$("#inputAnnumFrom").prop('disabled', true);
		$("#inputAnnumTo").prop('disabled', true);
	}
}

function loadOnomasticAreas(){
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

function loadFunctions(){
	// clean the loaded options
	$('#selectFunction').html("<option></option>");

	var url = Routing.generate('edb_function_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectFunction').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectFunction').append(
				"<option value =\"-1\">Add New</option>");
	});
}

function loadPaleographies(){
	// clean the loaded options
	$('#selectPaleography').html("<option></option>");

	var url = Routing.generate('edb_paleography_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#selectPaleography').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
		$('#selectPaleography').append(
				"<option value =\"-1\">Add New</option>");
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

function loadConservationPosition(idContext){
	
	$('#selectConservationPosition').html("<option></option>");
	
	var url = Routing.generate('edb_conservation_position_list', {id: idContext});
	
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

function openDialogCreateConservationContext(){
	$('#inputConservationContextDescription').attr('value', null);
	$('#divConservationContext').attr('class', 'control-group');
	$('#errorValConservationContext').html(null);
	$('#modalNewConservationContext').modal('show');
	$('#inputConservationContextDescription').focus();
}

function openDialogCreateConservationPosition(){
	$('#inputConservationPositionDescription').attr('value', null);
	$('#divConservationPosition').attr('class', 'control-group');
	$('#errorValConservationPosition').html(null);
	$('#modalNewConservationPosition').modal('show');
	$('#inputConservationPositionDescription').focus();
}

function openNewDialogCreateSupport(){
	$('#inputSupportId').attr('value', null);
	$('#divSupportId').attr('class', 'control-group');
	$('#errorValSupportId').html(null);
	
	$('#inputSupportDescription').attr('value', null);
	$('#divSupportDesc').attr('class', 'control-group');
	$('#errorValSupportDesc').html(null);
	
	$('#modalNewSupport').modal('show');
	$('#inputSupportId').focus();
}

function openNewDialogCreateTechnique(){
	$('#inputTechniqueId').attr('value', null);
	$('#divTechniqueId').attr('class', 'control-group');
	$('#errorValTechniqueId').html(null);
	
	$('#inputTechniqueDescription').attr('value', null);
	$('#divTechniqueDesc').attr('class', 'control-group');
	$('#errorValTechniqueDesc').html(null);
	
	$('#modalNewTechnique').modal('show');
	$('#inputTechniqueId').focus();
}

function openNewDialogCreateOnomasticArea(){
	$('#inputOnomasticAreaId').attr('value', null);
	$('#divOnomasticAreaId').attr('class', 'control-group');
	$('#errorValOnomasticAreaId').html(null);
	
	$('#inputOnomasticAreaDescription').attr('value', null);
	$('#divOnomasticAreaDesc').attr('class', 'control-group');
	$('#errorValOnomasticAreaDesc').html(null);
	
	$('#modalNewOnomasticArea').modal('show');
	$('#inputOnomasticAreaId').focus();
}

function openNewDialogCreatePaleography(){
	$('#inputPaleographyId').attr('value', null);
	$('#divPaleographyId').attr('class', 'control-group');
	$('#errorValPaleographyId').html(null);
	
	$('#inputPaleographyDescription').attr('value', null);
	$('#divPaleographyDesc').attr('class', 'control-group');
	$('#errorValPaleographyDesc').html(null);
	
	$('#modalNewPaleography').modal('show');
	$('#inputPaleographyId').focus();
}

function openNewDialogCreateFunction(){
	$('#inputFunctionId').attr('value', null);
	$('#divFunctionId').attr('class', 'control-group');
	$('#errorValFunctionId').html(null);
	
	$('#inputFunctionDescription').attr('value', null);
	$('#divFunctionDesc').attr('class', 'control-group');
	$('#errorValFunctionDesc').html(null);
	
	$('#modalNewFunction').modal('show');
	$('#inputFunctionId').focus();
}

function openDialogNewSigna(){

	$('#inputSignaId').attr('value', null);
	$('#divSignaId').attr('class', 'control-group');
	$('#errorValSignaId').html(null);
	
	$('#inputSignaDescription').attr('value', null);
	$('#divSignaDesc').attr('class', 'control-group');
	$('#errorValSignaDesc').html(null);
	
	$('#modalNewSigna').modal('show');
	$('#inputSignaId').focus();
}

function openDialogViewSignas(){
	//clean for eventual data
	$('#tbodySigna').empty();
	
	//load the data in the modal table
	var url = Routing.generate('edb_signa_list') + ".json";
	
	$.getJSON(url,function(data){
		for (i in data){
			$('#tbodySigna').append(
				'<tr>' + 
					'<td>' + data[i].id + '</td>' +	
					'<td>' + data[i].description + '</td>' +	
				"<td><button class='btn' type='button' onclick=\"addToSigna('" + data[i].id + "', '" + data[i].description + "')\">Add</button>" + "</td>" +
				"</tr>" 
			);
		}
	});
	
	//show the view
	$('#modalViewSignas').modal('show');
	
}

function removeLastSigna(){
	
	if ($('#selectSigna option').size() == 0){
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

function addNewConservationContext(desc,idLocation){
	
	
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

function addNewConservationPosition(desc,idContext){
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

	var url = Routing.generate('edb_pertinence_context_list', { id: id });

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

	var url = Routing.generate('edb_pertinence_position_list', {id: id});

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


function addConservationToTableAction(){
	//get the values text
	
	var	locationId = $('#selectConservationLocation :selected').val();
	var contextId = $('#selectConservationContext :selected').val();
	var positionId = $('#selectConservationPosition :selected').val();
			
	var locationText = $('#selectConservationLocation :selected').text();
	var contextText = $('#selectConservationContext :selected').text();
	var positionText = $('#selectConservationPosition :selected').text();
	
	//it is true if all the variables do not contains values
	if (!locationText || !contextText || !positionText){
		alert('please select values for location context and position');
		return;
	}
		
	var hiddenValue = locationId + "-" + contextId + "-" + positionId;
	var inputHidden = "<input type='hidden' name='epigraph[conservationsIds][]' value='" + hiddenValue + "'/>";
	
	var delTd = "deleteTd" + countConservations;
	countConservations++;
	
	//add values to the table as row
	var row = "<tr> " +
	"<td>" + locationText + "</td> " +
	"<td>" + contextText + "</td> " +
	"<td>" + positionText + "</td> " +
	"<td id='" + delTd + "'></td> " +
	inputHidden +
	"</tr>";	
	
	if (hashConservations[hiddenValue]  != undefined){
		alert('values already added to the table');
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

///DIACRITICI START

function storeCaret(textEl) {
	if (textEl.createTextRange)
		textEl.caretPos = document.selection.createRange().duplicate();
}
function insertAtCaret(textEl, text) {
	if (textEl.createTextRange && textEl.caretPos) {
		var caretPos = textEl.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text
				+ ' '
				: text;
	} else
		textEl.value = text;
}

function setSelectionRange(input, selectionStart, selectionEnd) {
	if (input.setSelectionRange) {
		input.focus();
		input.setSelectionRange(selectionStart, selectionEnd);
	} else if (input.createTextRange) {
		var range = input.createTextRange();
		range.collapse(true);
		range.moveEnd('character', selectionEnd);
		range.moveStart('character', selectionStart);
		range.select();
	}
}
function setCaretToEnd(input) {
	setSelectionRange(input, input.value.length, input.value.length);
}

function setCaretToBegin(input) {
	setSelectionRange(input, 0, 0);
}
function setCaretToPos(input, pos) {
	setSelectionRange(input, pos, pos);
}
function selectString(input, string) {
	var match = new RegExp(string, "i").exec(input.value);
	if (match) {
		setSelectionRange(input, match.index, match.index + match[0].length);
	}
}


function replaceSelection(input, replaceString) {
	if (input.setSelectionRange) {
		var selectionStart = input.selectionStart;
		var selectionEnd = input.selectionEnd;
		input.value = input.value.substring(0, selectionStart) + replaceString
				+ input.value.substring(selectionEnd);
		if (selectionStart != selectionEnd) // has there been a selection
			setSelectionRange(input, selectionStart, selectionStart
					+ replaceString.length);
		else
			// set caret
			setCaretToPos(input, selectionStart + replaceString.length);
	} else if (document.selection) {
		var range = document.selection.createRange();
		if (range.parentElement() == input) {
			var isCollapsed = range.text == '';
			range.text = replaceString;
			if (!isCollapsed) { // there has been a selection
				//it appears range.select() should select the newly 
				//inserted text but that fails with IE
				range.moveStart('character', -replaceString.length);
				range.select();
			}
		}
	}
}

/////DIACRITICI END

///GREEK START

function keyd(e) {
    var input2 = document.getElementById('transcription');
    if (e.srcElement != input2)
        return;
    
	storeCaret(this);
	if (navigator.userAgent.indexOf('Mozilla') > -1) {
		e = (e) ? e : window.event;
		keyCode = (e.keyCode) ? e.keyCode : e.which;
	}
	doit();
}

if (document.all | navigator.userAgent.indexOf('Mozilla') > -1
		| navigator.userAgent.indexOf('Netscape') > -1) {
	document.onkeyup = keyd;
}

function setSelectionRange(input, selectionStart, selectionEnd) {
	if (input.setSelectionRange) {
		input.focus();
		input.setSelectionRange(selectionStart, selectionEnd);
	}
}

function replace(inText, start, inFindStr, inReplStr) {

	var outText = inText.substring(0,start-1);
		
	var toChangeText = inText.substring(start-1, inText.length);

	outText += toChangeText.replace(inFindStr,inReplStr);
	
	return outText;

	if (navigator.userAgent.indexOf('MSIE') > -1) {
		setCaretAtEnd(document.getElementById('transcription'));
		storeCaret(document.getElementById('transcription'));
	}
};

//thanks to Pablo Rodriguez for the keyboard routine
function doit() {

	if (!greekActive)
		return;

	text2 = document.getElementById('transcription').value;
	
	if (navigator.userAgent.indexOf('MSIE') > -1) {
		
		var currentRange = document.selection.createRange();
		var workRange = currentRange.duplicate();

		// select the whole contents and get 'all' selection
		event.srcElement.select();
		var allRange = document.selection.createRange();

		var len = 0;
		// NB text.length does not give the caret position
		while (workRange.compareEndPoints("StartToStart", allRange) > 0) {
			workRange.moveStart("character", -1);
			len++;
			// recover the original selection
			currentRange.select();
			// len contains the caret position if no selection
			// or selection start point offset if any
		}
	}
	
	var len = 0;

	if (!document.all && navigator.userAgent.indexOf('Mozilla') > -1) {
		
		var input2 = document.getElementById('transcription');
		
		if (input2.setSelectionRange){
			len = input2.selectionStart;
		}
		if (keyCode == 57 || keyCode == 48 || keyCode == 191 || keyCode == 220
				|| keyCode == 61 || keyCode == 109)
			len += -1;

	}

	var key = document.all ? event.keyCode : 0;

	if (navigator.userAgent.indexOf('MSIE') > -1) {
		if ((event.shiftKey == false) && (key == 191))
			len += -1;
		if ((event.shiftKey == true) && (key == 57 || key == 48))
			len += -1;
		if (key == 220 || key == 187 || key == 189)
			len += -1;
	}

	if (key == 8 || key == 16 || key == 17 || key == 18 || key == 20
			|| key == 33 || key == 34 || key == 36 || key == 37 || key == 38
			|| key == 39 || key == 40 || key == 45 || key == 46) {
		return;
	}

	text2 = replace(text2,len, '``', '“');
	text2 = replace(text2,len, '\'\'', '”');
	text2 = replace(text2,len, '´´', '”');
	text2 = replace(text2,len, ',,', '„');
	text2 = replace(text2,len, '<<', '«');
	text2 = replace(text2,len, '>>', '»');
	text2 = replace(text2,len, ':', '·');
	text2 = replace(text2,len, '?', ';');
	text2 = replace(text2,len, ' )', '᾽');

	text2 = replace(text2,len, 'a', 'α');
	text2 = replace(text2,len, 'α/', 'ά');
	text2 = replace(text2,len, 'α\\', 'ὰ');
	text2 = replace(text2,len, 'α=', 'ᾶ');
	text2 = replace(text2,len, 'α)', 'ἀ');
	text2 = replace(text2,len, 'α(', 'ἁ');
	text2 = replace(text2,len, 'α_', 'ᾱ');
	text2 = replace(text2,len, 'α-', 'ᾰ');
	text2 = replace(text2,len, 'α|', 'ᾳ');
	text2 = replace(text2,len, 'ἀ\\', 'ἂ');
	text2 = replace(text2,len, 'ἀ/', 'ἄ');
	text2 = replace(text2,len, 'ἁ\\', 'ἃ');
	text2 = replace(text2,len, 'ἁ/', 'ἅ');
	text2 = replace(text2,len, 'ἁ=', 'ἇ');
	text2 = replace(text2,len, 'ἀ=', 'ἆ');
	text2 = replace(text2,len, 'ά|', 'ᾴ');
	text2 = replace(text2,len, 'ὰ|', 'ᾲ');
	text2 = replace(text2,len, 'ἀ|', 'ᾀ');
	text2 = replace(text2,len, 'ἁ|', 'ᾁ');
	text2 = replace(text2,len, 'ᾶ|', 'ᾷ');
	text2 = replace(text2,len, 'ἆ|', 'ᾆ');
	text2 = replace(text2,len, 'ἇ|', 'ᾇ');
	text2 = replace(text2,len, 'ἂ|', 'ᾂ');
	text2 = replace(text2,len, 'ἄ|', 'ᾄ');
	text2 = replace(text2,len, 'ἃ|', 'ᾃ');
	text2 = replace(text2,len, 'ἅ|', 'ᾅ');

	text2 = replace(text2,len, 'b', 'β');
	text2 = replace(text2,len, 'c', 'ξ');
	text2 = replace(text2,len, 'd', 'δ');

	text2 = replace(text2,len, 'e', 'ε');
	text2 = replace(text2,len, 'ε/', 'έ');
	text2 = replace(text2,len, 'ε\\', 'ὲ');
	text2 = replace(text2,len, 'ε)', 'ἐ');
	text2 = replace(text2,len, 'ε(', 'ἑ');
	text2 = replace(text2,len, 'ἐ\\', 'ἒ');
	text2 = replace(text2,len, 'ἐ/', 'ἔ');
	text2 = replace(text2,len, 'ἑ\\', 'ἓ');
	text2 = replace(text2,len, 'ἑ/', 'ἕ');

	text2 = replace(text2,len, 'f', 'φ');
	text2 = replace(text2,len, 'g', 'γ');

	text2 = replace(text2,len, 'h', 'η');
	text2 = replace(text2,len, 'η/', 'ή');
	text2 = replace(text2,len, 'η\\', 'ὴ');
	text2 = replace(text2,len, 'η=', 'ῆ');
	text2 = replace(text2,len, 'η)', 'ἠ');
	text2 = replace(text2,len, 'η(', 'ἡ');
	text2 = replace(text2,len, 'η|', 'ῃ');
	text2 = replace(text2,len, 'ἠ\\', 'ἢ');
	text2 = replace(text2,len, 'ἡ\\', 'ἣ');
	text2 = replace(text2,len, 'ἠ/', 'ἤ');
	text2 = replace(text2,len, 'ἡ/', 'ἥ');
	text2 = replace(text2,len, 'ἠ=', 'ἦ');
	text2 = replace(text2,len, 'ἡ=', 'ἧ');
	text2 = replace(text2,len, 'ή|', 'ῄ');
	text2 = replace(text2,len, 'ὴ|', 'ῂ');
	text2 = replace(text2,len, 'ῆ|', 'ῇ');
	text2 = replace(text2,len, 'ἠ|', 'ᾐ');
	text2 = replace(text2,len, 'ἡ|', 'ᾑ');
	text2 = replace(text2,len, 'ἢ|', 'ᾒ');
	text2 = replace(text2,len, 'ἣ|', 'ᾓ');
	text2 = replace(text2,len, 'ἤ|', 'ᾔ');
	text2 = replace(text2,len, 'ἥ|', 'ᾕ');
	text2 = replace(text2,len, 'ἦ|', 'ᾖ');
	text2 = replace(text2,len, 'ἧ|', 'ᾗ');

	text2 = replace(text2,len, 'i', 'ι');
	text2 = replace(text2,len, 'ι/', 'ί');
	text2 = replace(text2,len, 'ι\\', 'ὶ');
	text2 = replace(text2,len, 'ι=', 'ῖ');
	text2 = replace(text2,len, 'ι)', 'ἰ');
	text2 = replace(text2,len, 'ι(', 'ἱ');
	text2 = replace(text2,len, 'ἰ\\', 'ἲ');
	text2 = replace(text2,len, 'ἱ/', 'ἵ');
	text2 = replace(text2,len, 'ἰ/', 'ἴ');
	text2 = replace(text2,len, 'ἱ\\', 'ἳ');
	text2 = replace(text2,len, 'ἰ=', 'ἶ');
	text2 = replace(text2,len, 'ἱ=', 'ἷ');
	text2 = replace(text2,len, 'ι-', 'ῐ');
	text2 = replace(text2,len, 'ι_', 'ῑ');
	text2 = replace(text2,len, 'ι+', 'ϊ');
	text2 = replace(text2,len, 'ϊ/', 'ΐ');
	text2 = replace(text2,len, 'ϊ\\', 'ῒ');
	text2 = replace(text2,len, 'ϊ=', 'ῗ');

	text2 = replace(text2,len, 'j', 'ς');
	text2 = replace(text2,len, 'k', 'κ');
	text2 = replace(text2,len, 'l', 'λ');
	text2 = replace(text2,len, 'm', 'μ');
	text2 = replace(text2,len, 'n', 'ν');

	text2 = replace(text2,len, 'o', 'ο');
	text2 = replace(text2,len, 'ο/', 'ό');
	text2 = replace(text2,len, 'ο\\', 'ὸ');
	text2 = replace(text2,len, 'ο)', 'ὀ');
	text2 = replace(text2,len, 'ο(', 'ὁ');
	text2 = replace(text2,len, 'ὀ\\', 'ὂ');
	text2 = replace(text2,len, 'ὁ\\', 'ὃ');
	text2 = replace(text2,len, 'ὀ/', 'ὄ');
	text2 = replace(text2,len, 'ὁ/', 'ὅ');

	text2 = replace(text2,len, 'p', 'π');
	text2 = replace(text2,len, 'q', 'θ');

	text2 = replace(text2,len, 'r', 'ρ');
	text2 = replace(text2,len, 'ρ)', 'ῤ');
	text2 = replace(text2,len, 'ρ(', 'ῥ');

	text2 = replace(text2,len, 's', 'σ');
	text2 = replace(text2,len, 't', 'τ');

	text2 = replace(text2,len, 'u', 'υ');
	text2 = replace(text2,len, 'υ/', 'ύ');
	text2 = replace(text2,len, 'υ\\', 'ὺ');
	text2 = replace(text2,len, 'υ=', 'ῦ');
	text2 = replace(text2,len, 'υ)', 'ὐ');
	text2 = replace(text2,len, 'υ(', 'ὑ');
	text2 = replace(text2,len, 'ὐ\\', 'ὒ');
	text2 = replace(text2,len, 'ὑ\\', 'ὓ');
	text2 = replace(text2,len, 'ὐ/', 'ὔ');
	text2 = replace(text2,len, 'ὑ/', 'ὕ');
	text2 = replace(text2,len, 'ὐ=', 'ὖ');
	text2 = replace(text2,len, 'ὑ=', 'ὗ');
	text2 = replace(text2,len, 'υ+', 'ϋ');
	text2 = replace(text2,len, 'ϋ/', 'ΰ');
	text2 = replace(text2,len, 'ϋ\\', 'ῢ');
	text2 = replace(text2,len, 'ϋ=', 'ῧ');
	text2 = replace(text2,len, 'υ_', 'ῡ');
	text2 = replace(text2,len, 'υ-', 'ῠ');

	text2 = replace(text2,len, 'v', 'ϝ');

	text2 = replace(text2,len, 'w', 'ω');
	text2 = replace(text2,len, 'ω/', 'ώ');
	text2 = replace(text2,len, 'ω\\', 'ὼ');
	text2 = replace(text2,len, 'ω=', 'ῶ');
	text2 = replace(text2,len, 'ω)', 'ὠ');
	text2 = replace(text2,len, 'ω(', 'ὡ');
	text2 = replace(text2,len, 'ω|', 'ῳ');
	text2 = replace(text2,len, 'ὠ/', 'ὤ');
	text2 = replace(text2,len, 'ὡ/', 'ὥ');
	text2 = replace(text2,len, 'ὠ\\', 'ὢ');
	text2 = replace(text2,len, 'ὡ\\', 'ὣ');
	text2 = replace(text2,len, 'ὠ=', 'ὦ');
	text2 = replace(text2,len, 'ὡ=', 'ὧ');
	text2 = replace(text2,len, 'ώ|', 'ῴ');
	text2 = replace(text2,len, 'ὼ|', 'ῲ');
	text2 = replace(text2,len, 'ῶ|', 'ῷ');
	text2 = replace(text2,len, 'ὠ|', 'ᾠ');
	text2 = replace(text2,len, 'ὡ|', 'ᾡ');
	text2 = replace(text2,len, 'ὤ|', 'ᾤ');
	text2 = replace(text2,len, 'ὥ|', 'ᾥ');
	text2 = replace(text2,len, 'ὢ|', 'ᾢ');
	text2 = replace(text2,len, 'ὣ|', 'ᾣ');
	text2 = replace(text2,len, 'ὦ|', 'ᾦ');
	text2 = replace(text2,len, 'ὧ|', 'ᾧ');

	text2 = replace(text2,len, 'x', 'χ');
	text2 = replace(text2,len, 'y', 'ψ');
	text2 = replace(text2,len, 'z', 'ζ');

	text2 = replace(text2,len, 'A', 'Α');
	text2 = replace(text2,len, 'Α/', 'Ά');
	text2 = replace(text2,len, 'Α\\', 'Ὰ');
	text2 = replace(text2,len, 'Α(', 'Ἁ');
	text2 = replace(text2,len, 'Α)', 'Ἀ');
	text2 = replace(text2,len, 'Α|', 'ᾼ');
	text2 = replace(text2,len, 'Ἁ\\', 'Ἃ');
	text2 = replace(text2,len, 'Ἀ\\', 'Ἂ');
	text2 = replace(text2,len, 'Ἁ/', 'Ἅ');
	text2 = replace(text2,len, 'Ἀ/', 'Ἄ');
	text2 = replace(text2,len, 'Ἁ=', 'Ἇ');
	text2 = replace(text2,len, 'Ἀ=', 'Ἆ');
	text2 = replace(text2,len, 'Ἁ|', 'ᾉ');
	text2 = replace(text2,len, 'Ἀ|', 'ᾈ');
	text2 = replace(text2,len, 'Ἃ|', 'ᾋ');
	text2 = replace(text2,len, 'Ἂ|', 'ᾊ');
	text2 = replace(text2,len, 'Ἅ|', 'ᾍ');
	text2 = replace(text2,len, 'Ἄ|', 'ᾌ');
	text2 = replace(text2,len, 'Ἇ|', 'ᾏ');
	text2 = replace(text2,len, 'Ἆ|', 'ᾎ');
	text2 = replace(text2,len, 'Α-', 'Ᾰ');
	text2 = replace(text2,len, 'Α_', 'Ᾱ');

	text2 = replace(text2,len, 'B', 'Β');
	text2 = replace(text2,len, 'C', 'Ξ');
	text2 = replace(text2,len, 'D', 'Δ');

	text2 = replace(text2,len, 'E', 'Ε');
	text2 = replace(text2,len, 'Ε/', 'Έ');
	text2 = replace(text2,len, 'Ε\\', 'Ὲ');
	text2 = replace(text2,len, 'Ε)', 'Ἐ');
	text2 = replace(text2,len, 'Ε(', 'Ἑ');
	text2 = replace(text2,len, 'Ἐ\\', 'Ἒ');
	text2 = replace(text2,len, 'Ἐ/', 'Ἔ');
	text2 = replace(text2,len, 'Ἑ\\', 'Ἓ');
	text2 = replace(text2,len, 'Ἑ/', 'Ἕ');

	text2 = replace(text2,len, 'F', 'Φ');
	text2 = replace(text2,len, 'G', 'Γ');

	text2 = replace(text2,len, 'H', 'Η');
	text2 = replace(text2,len, 'Η\\', 'Ὴ');
	text2 = replace(text2,len, 'Η/', 'Ή');
	text2 = replace(text2,len, 'Η)', 'Ἠ');
	text2 = replace(text2,len, 'Η(', 'Ἡ');
	text2 = replace(text2,len, 'Η|', 'ῌ');
	text2 = replace(text2,len, 'Ἠ\\', 'Ἢ');
	text2 = replace(text2,len, 'Ἠ/', 'Ἤ');
	text2 = replace(text2,len, 'Ἠ=', 'Ἦ');
	text2 = replace(text2,len, 'Ἡ\\', 'Ἣ');
	text2 = replace(text2,len, 'Ἡ/', 'Ἥ');
	text2 = replace(text2,len, 'Ἡ=', 'Ἧ');
	text2 = replace(text2,len, 'Ἠ|', 'ᾘ');
	text2 = replace(text2,len, 'Ἡ|', 'ᾙ');
	text2 = replace(text2,len, 'Ἢ|', 'ᾚ');
	text2 = replace(text2,len, 'Ἤ|', 'ᾜ');
	text2 = replace(text2,len, 'Ἦ|', 'ᾞ');
	text2 = replace(text2,len, 'Ἣ|', 'ᾛ');
	text2 = replace(text2,len, 'Ἥ|', 'ᾝ');
	text2 = replace(text2,len, 'Ἧ|', 'ᾟ');

	text2 = replace(text2,len, 'I', 'Ι');
	text2 = replace(text2,len, 'Ι\\', 'Ὶ');
	text2 = replace(text2,len, 'Ι/', 'Ί');
	text2 = replace(text2,len, 'Ι)', 'Ἰ');
	text2 = replace(text2,len, 'Ι(', 'Ἱ');
	text2 = replace(text2,len, 'Ἰ\\', 'Ἲ');
	text2 = replace(text2,len, 'Ἰ/', 'Ἴ');
	text2 = replace(text2,len, 'Ἱ\\', 'Ἳ');
	text2 = replace(text2,len, 'Ἱ\\', 'Ἵ');
	text2 = replace(text2,len, 'Ἰ=', 'Ἶ');
	text2 = replace(text2,len, 'Ἱ=', 'Ἷ');
	text2 = replace(text2,len, 'Ι-', 'Ῐ');
	text2 = replace(text2,len, 'Ι_', 'Ῑ');
	text2 = replace(text2,len, 'Ι+', 'Ϊ');

	text2 = replace(text2,len, 'J', '*');
	text2 = replace(text2,len, 'K', 'Κ');
	text2 = replace(text2,len, 'L', 'Λ');
	text2 = replace(text2,len, 'M', 'Μ');
	text2 = replace(text2,len, 'N', 'Ν');

	text2 = replace(text2,len, 'O', 'Ο');
	text2 = replace(text2,len, 'Ο\\', 'Ὸ');
	text2 = replace(text2,len, 'Ο/', 'Ό');
	text2 = replace(text2,len, 'Ο(', 'Ὁ');
	text2 = replace(text2,len, 'Ο)', 'Ὀ');
	text2 = replace(text2,len, 'Ὁ\\', 'Ὃ');
	text2 = replace(text2,len, 'Ὁ/', 'Ὅ');
	text2 = replace(text2,len, 'Ὀ\\', 'Ὂ');
	text2 = replace(text2,len, 'Ὀ/', 'Ὄ');

	text2 = replace(text2,len, 'P', 'Π');
	text2 = replace(text2,len, 'Q', 'Θ');

	text2 = replace(text2,len, 'R', 'Ρ');
	text2 = replace(text2,len, 'Ρ(', 'Ῥ');

	text2 = replace(text2,len, 'S', 'Σ');
	text2 = replace(text2,len, 'T', 'Τ');

	text2 = replace(text2,len, 'U', 'Υ');
	text2 = replace(text2,len, 'Υ/', 'Ύ');
	text2 = replace(text2,len, 'Υ\\', 'Ὺ');
	text2 = replace(text2,len, 'Υ(', 'Ὑ');
	text2 = replace(text2,len, 'Ὑ\\', 'Ὓ');
	text2 = replace(text2,len, 'Ὑ/', 'Ὕ');
	text2 = replace(text2,len, 'Ὑ=', 'Ὗ');
	text2 = replace(text2,len, 'Υ-', 'Ῠ');
	text2 = replace(text2,len, 'Υ_', 'Ῡ');
	text2 = replace(text2,len, 'Υ+', 'ϔ');

	text2 = replace(text2,len, 'V', 'Ϝ');

	text2 = replace(text2,len, 'W', 'Ω');
	text2 = replace(text2,len, 'Ω\\', 'Ὼ');
	text2 = replace(text2,len, 'Ω/', 'Ώ');
	text2 = replace(text2,len, 'Ω)', 'Ὠ');
	text2 = replace(text2,len, 'Ω(', 'Ὡ');
	text2 = replace(text2,len, 'Ω|', 'ῼ');
	text2 = replace(text2,len, 'Ὠ\\', 'Ὢ');
	text2 = replace(text2,len, 'Ὠ/', 'Ὤ');
	text2 = replace(text2,len, 'Ὠ=', 'Ὦ');
	text2 = replace(text2,len, 'Ὡ\\', 'Ὣ');
	text2 = replace(text2,len, 'Ὡ/', 'Ὥ');
	text2 = replace(text2,len, 'Ὡ=', 'Ὧ');
	text2 = replace(text2,len, 'Ὠ|', 'ᾨ');
	text2 = replace(text2,len, 'Ὡ|', 'ᾩ');
	text2 = replace(text2,len, 'Ὢ|', 'ᾪ');
	text2 = replace(text2,len, 'Ὤ|', 'ᾬ');
	text2 = replace(text2,len, 'Ὦ|', 'ᾮ');
	text2 = replace(text2,len, 'Ὣ|', 'ᾫ');
	text2 = replace(text2,len, 'Ὥ|', 'ᾭ');
	text2 = replace(text2,len, 'Ὧ|', 'ᾯ');

	text2 = replace(text2,len, 'X', 'Χ');
	text2 = replace(text2,len, 'Y', 'Ψ');
	text2 = replace(text2,len, 'Z', 'Ζ');

	document.getElementById('transcription').value = text2;

	if (navigator.userAgent.indexOf('MSIE') > -1) {
		document.getElementById('transcription').focus();

		var range = document.getElementById('transcription').createTextRange();
		range.moveStart("character", len);
		range.collapse(), range.select();
	}

	if (navigator.userAgent.indexOf('Mozilla') > -1) {

		var obj = document.getElementById('transcription');

		obj.focus();

		obj.scrollTop = obj.scrollHeight;

		setCaretToPos(document.getElementById('transcription'), len);
	} else
		document.getElementById('transcription').value = text2;
	storeCaret(document.getElementById('transcription'));
}

function GkPoly(replaceString) {
	var input = document.getElementById('transcription');

	if (input.setSelectionRange) {
		var selectionStart = input.selectionStart;
		var selectionEnd = input.selectionEnd;

		input.value = input.value.substring(0, selectionStart) + replaceString
				+ input.value.substring(selectionEnd);

		var obj = document.getElementById('transcription');

		obj.focus();

		obj.scrollTop = obj.scrollHeight;

		if (selectionStart != selectionEnd) // has there been a selection 
		{
			setSelectionRange(input, selectionStart, selectionStart
					+ replaceString.length);
		}

		else // set caret 
		{
			setCaretToPos(input, selectionStart + replaceString.length);
		}
		return;
	}

	if (document.selection && navigator.userAgent.indexOf('MSIE') > -1) {
		insertAtCaret(input, replaceString);
		document.getElementById('transcription').focus();
	} else {
		input.value += replaceString;
	}
}

///GREEK END



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
		
		addNewConservationContext(description,idLocation);
	});
	
	$('#selectConservationPosition').change(function() {
		var id = $(this).val();
		
		if (id == -1)
			openDialogCreateConservationPosition();
	});
	
	$('#addConservationPosition').click(function() {
		var description = $('#inputConservationPositionDescription').val();
		var idContext = $('#selectConservationContext').val();
		
		addNewConservationPosition(description,idContext);
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
	
	$('#greekToogle').click(function(event) {
		//alert(greekActive);
		greekActive = !$('#greekToogle').hasClass('active');		
		//alert(greekActive);
	});
	
	$('#addSigna').click(function() {
		openDialogViewSignas();
	});
	
	$('#newSigna').click(function() {
		openDialogNewSigna();
	});
	
	$('#removeSigna').click(function(){
		removeLastSigna();
	});
	
	$('#addSignum').click(function() {
		addNewSignumChristi();
	});
	
	$('#checkPreciseYear').click(function(){
		checkPreciseYearAction();
	});
});
