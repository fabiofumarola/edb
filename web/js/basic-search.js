function loadPertinence() {

	// Get all the contexts
	var url = Routing.generate('edb_pertinence_context_list_all');
	
	// For each context
	$.getJSON(url, function(data)
	{
		for (j in data) 
		{			
			// If the area is not n.d.
			if(data[j].area.id != 1)
			{
				var context_id = '';
				var context_desc = '';
				
				// If the context is not n.d., set it to the string
				if(data[j].description != 'n.d.')
				{
					context_id = data[j].id;
					context_desc = data[j].description;
				}
								
				$('#search_area').append(
						"<option value=\"" + data[j].area.id + "@_@" + context_id+ "\">"
								+ data[j].area.description + " - " + context_desc + "</option>");
			}
		}
	});
}


function loadPertinenceContexts(id) {
	cleanPertinenceContexts();

	var url = Routing.generate('edb_pertinence_context_list', { id: id });

	$.getJSON(url, function(data) {

		for (i in data) {
			$('#search_context').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
	});
}


function loadPertinencePositions(id) {
	cleanPertinencePosition();
	var url = Routing.generate('edb_pertinence_position_list', {
		id : id
	});

	$.getJSON(url, function(data) {
		for (i in data) {
			$('#search_position').append("<option value=\"" + data[i].id + "\">"+ data[i].description + "</option>");
		}
	});
}



function cleanPertinenceContexts(){
	$('#search_context').html("<option></option>");
}

function cleanPertinencePosition(){
	$('#search_position').html("<option></option>");
}

function checkTesaurus()
{
	var checked = $('#search_thesaurus').attr('checked') == 'checked' ? true : false;
	
	if(checked)
	{
		$("#search_nogreek").prop('checked', '');
		$("#search_nodiacr").prop('checked', '');
		$("#search_nogreek").prop('disabled', true);
		$("#search_nodiacr").prop('disabled', true);
	}
	else
	{
		$("#search_nogreek").prop('disabled', false);
		$("#search_nodiacr").prop('disabled', false);
	}
}




function cleanConservationContext(){
	$('#search_cons_context').html("<option></option>");
}

function cleanConservationPosition(){
	$('#search_cons_position').html("<option></option>");
}

function loadConservationArea() {
	$('#search_cons_area').html("<option></option>");

	var url = Routing.generate('edb_conservation_location_list');
	$.getJSON(url, function(data) {

		for (i in data) {
				$('#search_cons_area').append(
						"<option value=\"" + data[i].id + "\">"
								+ data[i].description + "</option>");
		}
	});
	
}

function loadConservationContext(idConservationArea) {
	cleanConservationContext();
	
	var url = Routing.generate('edb_conservation_context_list', {
		id : idConservationArea
	});

	$.getJSON(url, function(data) {
		for (i in data) {
			$('#search_cons_context').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
	});
}


function loadConservationPosition(idContext) {

	cleanConservationPosition();

	var url = Routing.generate('edb_conservation_position_list', {
		id : idContext
	});

	$.getJSON(url, function(data) {
		for (i in data) {
			$('#search_cons_position').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
	});		
}










$('document').ready(function() {
	
	loadPertinence();
	loadConservationArea();
	
	$(function() {
	    $( "#search_area" ).combobox();
	  });
	
	$('#search_area').change(function() {
		cleanPertinencePosition();
		var id = $(this).val();
		//length returns 0 if the emplty value is selected
		if (id.length != 0)
			loadPertinenceContexts(id);
		else
			cleanPertinenceContexts();
	});
	
	$('#search_context').change(function() {
		
		var id = $(this).val();
		if (id.length != 0)
			loadPertinencePositions(id);
		else
			cleanPertinencePosition();
	});
	
	
	$('#search_cons_area').change(function() {
		cleanConservationPosition();
		var id = $(this).val();
		//length returns 0 if the emplty value is selected
		if (id.length != 0)
			loadConservationContext(id);
		else
			cleanConservationContext();
	});
	
	$('#search_cons_context').change(function() {
		
		var id = $(this).val();
		if (id.length != 0)
			loadConservationPosition(id);
		else
			cleanConservationPosition();
	});
	
	
	
	$('#greekToogle').click(function(event) {
		greekActive = !$('#greekToogle').hasClass('active');		
	});
	
	$('signa_description').change(function() {
		if (greekActive) 
			doit();
	});	
	
	$('#search_thesaurus').click(function(event) {
		checkTesaurus();
	});
});


