function loadPertinenceAreas() {

	// clean the loaded options
	$('#search_area').html("<option></option>");

	var url = Routing.generate('edb_pertinence_area_list');

	$.getJSON(url + '.json', function(data) {

		for (i in data) {
			$('#search_area').append(
					"<option value=\"" + data[i].id + "\">"
							+ data[i].description + "</option>");
		}
	});

	cleanPertinenceContexts();
}

function loadPertinenceContexts(id) {
	// clean the loaded options
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

function cleanPertinenceContexts(){
	$('#search_context').html("<option></option>");
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


$('document').ready(function() {
	
	loadPertinenceAreas();
	
	$('#search_area').change(function() {
		
		var id = $(this).val();
		//length returns 0 if the emplty value is selected
		if (id.length != 0)
			loadPertinenceContexts(id);
		else
			cleanPertinenceContexts();

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


