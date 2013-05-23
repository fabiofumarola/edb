var countAuthors = 1;
var hashAuthors = new Array();

$('document').ready(function() 
{
	loadJournals();
	loadConferences();
	loadVolumes();
	
	// Open the dialog to add a new journal
	$("#bibliography_journal").change(function() {
			var id = $(this).val();
			if (id == "-1")
				$('#newJournalModal').modal('show');
		});
	
	
	// Add a new Journal
	$('#addNewJournal').click(function() 
	{
		var name = $('#journal_name').val();
				
		// Check if the name is specified
		if (name.length == 0) {
			$('#div_journal_name').attr('class', 'control-group error');
			return;
		}
		
		var url = Routing.generate('edb_literature_new_journal_modal');
		
		// Store the Journal
		$.post(url, {name : name}, function(result) 
		{
			if (result.toString() == '"ok"') 
			{
				loadJournals();
				$('#newJournalModal').modal('hide');
			} 
			else 
				alert(result);		
		});
	});
		
	// Load the list of journals
	function loadJournals() 
	{
		// Clean the current list
		$('#bibliography_journal').html("");

		var url = Routing.generate('edb_bibliography_journal_list');

		$.getJSON(url + '.json', function(data) 
		{
			if(data.length == 0)
				$('#bibliography_journal').html("<option></option>");
			for (i in data) 
				$('#bibliography_journal').append("<option value=\"" + data[i].id + "\">" + data[i].titolo + "</option>");
			$('#bibliography_journal').append("<option value =\"-1\">Add New</option>");
		});
	}
	
	
	
	
	
	
	
	
	
	// Open the dialog to add a new conference
	$("#bibliography_conference").change(function() {
			var id = $(this).val();
			if (id == "-1")
				$('#newConferenceModal').modal('show');
		});
	
	
	
		
	// Add a new Conference
	$('#addNewConference').click(function() 
	{
		var name = $('#conference_name').val();
		var editors = $('#conference_editors').val();
		var year = $('#conference_year').val();
		var city_edition = $('#conference_cityedition').val();
		var city = $('#conference_city').val();
		var date = $('#conference_date').val();
		
		// Check if the name is specified
		if (name.length == 0) {
			$('#div_conference_name').attr('class', 'control-group error');
			return;
		}
		
		// Check if the year is specified
		if (year.length == 0) {
			$('#div_conference_yearedition').attr('class', 'control-group error');
			return;
		}
		
		// Check if the year is numeric
		if(!isInteger(year))
		{
			alert('The field Year must be an integer');
			return;
		}
		
		var url = Routing.generate('edb_literature_new_conference_modal');
		
		// Store the Conference
		$.post(url, {
			name : name,
			editors : editors,
			year : year,
			city_edition : city_edition,
			city : city,
			date : date
			}, function(result) 
		{
			if (result.toString() == '"ok"') 
			{
				loadConferences();
				$('#newConferenceModal').modal('hide');
			} 
			else 
				alert(result);		
		});
	});
	
	
	function loadConferences() 
	{
		// Clean the current list
		$('#bibliography_conference').html("");

		var url = Routing.generate('edb_bibliography_conference_list');

		$.getJSON(url + '.json', function(data) 
		{
			if(data.length == 0)
				$('#bibliography_conference').html("<option></option>");
			for (i in data) 
				$('#bibliography_conference').append("<option value=\"" + data[i].id + "\">" + data[i].titolo + "</option>");
			$('#bibliography_conference').append("<option value =\"-1\">Add New</option>");
		});
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	

	
	
	// Open the dialog to add a new volume
	$("#bibliography_volume").change(function() {
			var id = $(this).val();
			if (id == "-1")
				$('#newVolumeModal').modal('show');
		});
	
	
	// Add a new Conference
	$('#addNewVolume').click(function() 
	{
		var name = $('#volume_name').val();
		var editors = $('#volume_editors').val();
		var year = $('#volume_year').val();
		var city_edition = $('#volume_cityedition').val();

		
		// Check if the name is specified
		if (name.length == 0) {
			$('#div_volume_name').attr('class', 'control-group error');
			return;
		}
		
		// Check if the year is specified
		if (year.length == 0) {
			$('#div_volume_yearedition').attr('class', 'control-group error');
			return;
		}
		
		// Check if the year is numeric
		if(!isInteger(year))
		{
			alert('The field Year must be an integer');
			return;
		}
		
		var url = Routing.generate('edb_literature_new_volume_modal');
		
		// Store the Volume
		$.post(url, {
			name : name,
			editors : editors,
			year : year,
			city_edition : city_edition,
			}, function(result) 
		{
			if (result.toString() == '"ok"') 
			{
				loadVolumes();
				$('#newVolumeModal').modal('hide');
			} 
			else 
				alert(result);		
		});
	});
	
	// Load the list of volumes
	function loadVolumes() 
	{
		// Clean the current list
		$('#bibliography_volume').html("");

		var url = Routing.generate('edb_bibliography_volume_list');

		$.getJSON(url + '.json', function(data) 
		{
			if(data.length == 0)
				$('#bibliography_volume').html("<option></option>");
			for (i in data) 
				$('#bibliography_volume').append("<option value=\"" + data[i].id + "\">" + data[i].titolo + "</option>");
			$('#bibliography_volume').append("<option value =\"-1\">Add New</option>");
		});
	}
	
	
	// Change the showed field when change the type of reference
	$("#bibliography_type").change(function() 
	{
		var id = $(this).val();
		if (id == 'Rivista')
		{
			$("#div_bibliography_journal").show();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").hide();
			$("#div_bibliography_abbr").hide();
			$("#div_bibliography_edcity").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_pubyear").show();
			$("#div_bibliography_pagesfrom").show();
			$("#div_bibliography_pagesto").show();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
			$("#div_bibliography_number").show();
			$('#lbl_title').html("Contribute Title*");
		}
		else if (id == 'Convegno')
		{
			$("#div_bibliography_journal").hide();
			$("#div_bibliography_conference").show();
			$("#div_bibliography_volume").hide();
			$("#div_bibliography_abbr").hide();
			$("#div_bibliography_edcity").hide();
			$("#div_bibliography_pubyear").hide();
			$("#div_bibliography_number").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_pagesfrom").show();
			$("#div_bibliography_pagesto").show();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
			$('#lbl_title').html("Contribute Title*");
		}
		else if (id == 'Volume')
		{
			$("#div_bibliography_journal").hide();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").show();
			$("#div_bibliography_abbr").hide();
			$("#div_bibliography_edcity").hide();
			$("#div_bibliography_number").hide();
			$("#div_bibliography_pubyear").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_pagesfrom").show();
			$("#div_bibliography_pagesto").show();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
		}
		else if(id == 'Corpus')
		{
			$("#div_bibliography_journal").hide();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").hide();	
			$("#div_bibliography_authors").hide();
			$("#div_bibliography_authors_table").hide();
			$("#div_bibliography_pubyear").show();
			$("#div_bibliography_pagesfrom").hide();
			$("#div_bibliography_pagesto").hide();
			$("#div_bibliography_edcity").show();
			$("#div_bibliography_abbr").show();
			$("#div_bibliography_number").show();
			$("#div_bibliography_editors").show();
			$('#lbl_title').html("Corpus Title*");
			$('#lbl_number').html("Volume*");
			$('#lbl_year').html("Year of Edition");
			$('#lbl_city').html("City of Edition");
			
		}
		else if(id == 'Repertorio')
		{
			$("#div_bibliography_journal").hide();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").hide();	
			$("#div_bibliography_authors").hide();
			$("#div_bibliography_authors_table").hide();
			$("#div_bibliography_pubyear").hide();
			$("#div_bibliography_pagesfrom").hide();
			$("#div_bibliography_pagesto").hide();
			$("#div_bibliography_number").hide();
			$("#div_bibliography_edcity").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_abbr").show();
			$('#lbl_title').html("Repertory Title*");
		}
		else if(id == 'Monografia')
		{
			$("#div_bibliography_journal").hide();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").hide();
			$("#div_bibliography_abbr").hide();
			$("#div_bibliography_pagesfrom").hide();
			$("#div_bibliography_pagesto").hide();
			$("#div_bibliography_number").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
			$("#div_bibliography_pubyear").show();
			$("#div_bibliography_edcity").show();
			$('#lbl_title').html("Title*");
			$('#lbl_city').html("City of Edition*");
			$('#lbl_year').html("Year of Edition*");		
		}
	});
	
	$('#addAuthorToTable').click(function() 
	{
		addAuthorToTable();
	});
	
});




// Add an author to the tables
function addAuthorToTable() 
{
	var surname = $('#bibliography_authors_surname').val();
	var name = $('#bibliography_authors_name').val();
	
	// Check if the surname is compiled
	if (!surname) {
		alert('Surname is mandatory!');
		return;
	}
	if (surname.indexOf(";") !=-1 || surname.indexOf("@") !=-1 || name.indexOf(";") !=-1 || name.indexOf("@") !=-1)
	{
		alert('Surname and name fields cannot contain the characters ; and @');
		return;
	}

	var hiddenValue = surname + ";" + name;	
	var inputHidden = "<input type='hidden' name='bibliography[authors_list][]' value='" + hiddenValue + "'/>";

	var delTd = "deleteAuthor" + countAuthors;
	countAuthors++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + surname + "</td> " + "<td>" + name + "</td>";
	row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";

	if (hashAuthors[hiddenValue] != undefined) 
	{
		alert('Author already added to the table.');
		countAuthors--;
		return;
	}

	$('#tableAuthors > tbody:last').append(row);
	hashAuthors[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashAuthors[hiddenValue] = undefined;
		countAuthors--;
	});
	$('#bibliography_authors_surname').val("");
	$('#bibliography_authors_name').val("");
}







function isInteger(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n) && n%1 == 0;
	}