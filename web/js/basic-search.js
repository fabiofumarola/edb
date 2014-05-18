var greekActive = false;

function loadPertinence() 
{
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
					context_desc = " - " + data[j].description;
				}
								
				$('#search_area').append(
						"<option value=\"" + data[j].area.id + "@_@" + context_id+ "\">"
								+ data[j].area.description + context_desc + "</option>");
			}
		}
	});
}

function loadConservation() 
{	
	// Get all the contexts
	var url = Routing.generate('edb_conservation_context_list_all');

	// For each context
	$.getJSON(url, function(data) 
	{
		for (j in data) 
		{
			// If the location is not n.d.
			if(data[j].conservationLocation.id != 15)
			{
				var context_id = '';
				var context_desc = '';
				
				// If the context is not n.d., set it to the string
				if(data[j].description != 'n.d.')
				{
					context_id = data[j].id;
					context_desc = " - " + data[j].description;
				}
								
				$('#search_cons_area').append(
						"<option value=\"" + data[j].conservationLocation.id + "@_@" + context_id+ "\">"
								+ data[j].conservationLocation.description + context_desc + "</option>");
			}
		}
	});
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
	
	loadPertinence();
	loadConservation();
	$("#search_area").combobox();
	$("#search_cons_area").combobox();
	
	$('#search_support').change(function() {
		if($('#search_support').val() == 'All')
		{
			$("#notSupport").prop('disabled', true);
			$("#notSupport").prop('checked', false);
		}
		else
			$("#notSupport").prop('disabled', false);
	});
	
	$('#search_technique').change(function() {
		if($('#search_technique').val() == 'All')
		{
			$("#notTechnique").prop('disabled', true);
			$("#notTechnique").prop('checked', false);
		}
		else
			$("#notTechnique").prop('disabled', false);
	});
	
	$('#search_function').change(function() {
		if($('#search_function').val() == 'All')
		{
			$("#notFunction").prop('disabled', true);
			$("#notFunction").prop('checked', false);
		}
		else
			$("#notFunction").prop('disabled', false);
	});
	
	
	$('#submitButton').click(function() {
		textSearch = $('#transcription').val();
		if(textSearch != "")
		{
			// Check the number of double quotes
			count = textSearch.match(/"/g); 
			if(count != null && count.length%2 == 1)
			{
				alert("The number of double quotes cannot be odd.\nPlease check the query!");
				return false;
			}
			
			// Check the presence of the character *
			tokens = textSearch.split("\"");
			
			for (var i=0; i < tokens.length; i++)
			{
				token = tokens[i];
				
				// For strings out of "", check if it is in the middle
				if(i%2 == 0)
				{
					subTokens = token.split(" ");
					
					if(token == "\*\*")
					{
						alert("The query cannot contain the string **!");
						return false;
					}
					
					for(var j=0; j<subTokens.length; j++)
					{
						subToken = subTokens[j];
						firstIndex = subToken.indexOf("*");
						if(firstIndex == 0)
						{
							subToken = subToken.substring(firstIndex+1, subToken.length);
							secondIndex = subToken.indexOf("*");
							if(secondIndex != subToken.length-1 && secondIndex != -1)
							{
								alert("The symbol * cannot appear in the middle of a word.\nPlease check the query!");
								return false;
							}
						}
						else if(firstIndex != subToken.length-1 && firstIndex != -1)
						{
							alert("The symbol * cannot appear in the middle of a word.\nPlease check the query!");
							return false;
						}
					}
				}
				// Check if it just contains the *
				else if(token.indexOf("\*") != -1)
				{
					alert("The symbol * cannot appear in a string between double quotes. Please check the query");
					return false;
				}
			}
		}	
	});
	
	$('#checkPreciseYear').click(function() {
		checkPreciseYearAction();
	});
	

	$('#selectDating').change(function() {
		checkPreciseYearAction();
	});
	
	$("#search_lost").change(function() 
	{
		var lost = $(this).val();
		if(lost == 'S')
			disableCombo("search_cons_area");
		else
			enableCombo("search_cons_area");
	});
	
	
	$('#greekToogle').click(function(event) {
		greekActive = !greekActive;
	});
	
	
	$('#search_thesaurus').click(function(event) {
		checkTesaurus();
	});
});


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


function checkPreciseYearAction() 
{
	var checked = $('#checkPreciseYear').prop('checked');
	if (checked) 
	{;
		$("#selectDating").attr('readonly', 'readonly');
		$("#selectDating").val(0);
		$("#inputAnnumFrom").removeAttr('readonly');
		$("#inputAnnumTo").removeAttr('readonly');
		$('#inputAnnumFrom').attr('value', "");
		$('#inputAnnumTo').attr('value', "");
		$("#inputAnnumFrom").focus();
	} 
	else 
	{
		$("#selectDating").removeAttr('readonly');
		var idDating = $("#selectDating :selected").val();
		var from = $('#datingFrom'+idDating).val();
		var to = $('#datingTo'+idDating).val();
		$('#inputAnnumFrom').attr('value', from);
		$('#inputAnnumTo').attr('value', to);
		$("#inputAnnumFrom").attr('readonly', 'readonly');
		$("#inputAnnumTo").attr('readonly', 'readonly');
	}
}

