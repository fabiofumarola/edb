var countAuthors = 1;
var hashAuthors = new Array();

var countEditors= 1;
var hashEditors = new Array();

var countEditorsConf = 1;
var hashEditorsConf = new Array();

var countEditorsVol = 1;
var hashEditorsVol = new Array();


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
		
		var editors = "";
		for (var i in hashEditorsConf) {
			 if(hashEditorsConf[i] != undefined)
				 editors = editors + hashEditorsConf[i] + "@";
		}
		editors = editors.substring(0, editors.length-1);
		
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
				countEditorsConf= 1;
				hashEditorsConf = new Array();
				$('#bibliography_editors_surname_conf').val("");
				$('#bibliography_editors_name_conf').val("");	
				$('#tableEditors_conf > tbody').html("");
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
		if(countEditorsVol == 1)
		{
			alert("You must specify at least an editor");
			return;
		}
		
		var name = $('#volume_name').val();
		var editors = "";
		for (var i in hashEditorsVol) {
			if(hashEditorsVol[i] != undefined)
				editors = editors + hashEditorsVol[i] + "@";
		}
		editors = editors.substring(0, editors.length-1);
		
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
		cleanTables();
		var id = $(this).val();
		if (id == 'Rivista')
		{
			$("#div_bibliography_journal").show();
			$("#div_bibliography_conference").hide();
			$("#div_bibliography_volume").hide();
			$("#div_bibliography_abbr").hide();
			$("#div_bibliography_edcity").hide();
			$("#div_bibliography_editors").hide();
			$("#div_bibliography_editors_table").hide();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_pubyear").show();
			$("#div_bibliography_pagesfrom").show();
			$("#div_bibliography_pagesto").show();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
			$("#div_bibliography_number").show();
			$("#div_bibliography_fig").show();			
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
			$("#div_bibliography_editors_table").hide();
			$("#div_bibliography_fig").hide();
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
			$("#div_bibliography_editors_table").hide();
			$("#div_bibliography_fig").hide();
			$("#div_bibliography_pagesfrom").show();
			$("#div_bibliography_pagesto").show();
			$("#div_bibliography_authors").show();
			$("#div_bibliography_authors_table").show();
			$('#lbl_title').html("Contribute Title*");
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
			$("#div_bibliography_fig").hide();
			$("#div_bibliography_edcity").show();
			$("#div_bibliography_abbr").show();
			$("#div_bibliography_number").show();
			$("#div_bibliography_editors").show();
			$("#div_bibliography_editors_table").show();
			
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
			$("#div_bibliography_editors_table").hide();
			$("#div_bibliography_fig").hide();
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
			$("#div_bibliography_editors_table").hide();
			$("#div_bibliography_fig").hide();
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
	
	$('#addEditorToTable').click(function() 
	{
		addEditorToTable();
	});
	
	$('#addEditorToTableConf').click(function() 
	{
		addEditorConfToTable();
	});
	
	$('#addEditorToTableVol').click(function() 
	{
		addEditorVolToTable();
	});
	
	$('#close_conf').click(function() 
	{
		countEditorsConf= 1;
		hashEditorsConf = new Array();
		$('#bibliography_editors_surname_conf').val("");
		$('#bibliography_editors_name_conf').val("");	
		$('#conference_name').val("");	
		$('#conference_city').val("");	
		$('#conference_date').val("");	
		$('#conference_cityedition').val("");	
		$('#conference_year').val("");	
		$('#tableEditors_conf > tbody').html("");
		
	});
	
	
	$('#close_vol').click(function()
	{
		countEditorsVol= 1;
		hashEditorsVol = new Array();
		$('#bibliography_editors_surname_vol').val("");
		$('#bibliography_editors_name_vol').val("");	
		$('#tableEditors_vol > tbody').html("");
		$('#volume_name').val("");
		$('#volume_cityedition').val("");
		$('#volume_year').val("");		
	});
	
	
	$('#close_journal').click(function()
	{
		$('#journal_name').val("");
	});
});




// Add an author to the table
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
	var row = "<tr> " + "<td>" + name + "</td> " + "<td>" + surname + "</td>";
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







//Add an editor to the table
function addEditorToTable() 
{
	var surname = $('#bibliography_editors_surname').val();
	var name = $('#bibliography_editors_name').val();
	
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
	var inputHidden = "<input type='hidden' name='bibliography[editors_list][]' value='" + hiddenValue + "'/>";

	
	var delTd = "deleteEditor" + countEditors;
	countEditors++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + surname + "</td> " + "<td>" + name + "</td>";
	row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";
	
	if (hashEditors[hiddenValue] != undefined) 
	{
		alert('Author already added to the table.');
		countEditors--;
		return;
	}

	$('#tableEditors > tbody:last').append(row);
	hashEditors[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashEditors[hiddenValue] = undefined;
		countEditors--;
	});
	$('#bibliography_editors_surname').val("");
	$('#bibliography_editors_name').val("");
}



//Add an editor to the table of a new conference
function addEditorConfToTable() 
{
	var surname = $('#bibliography_editors_surname_conf').val();
	var name = $('#bibliography_editors_name_conf').val();
	
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
	var inputHidden = "<input type='hidden' name='bibliography[editors_conf_list][]' value='" + hiddenValue + "'/>";

	
	var delTd = "deleteEditorConf" + countEditorsConf;
	countEditorsConf++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + name + "</td> " + "<td>" + surname + "</td>";
	row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";
	
	if (hashEditorsConf[hiddenValue] != undefined) 
	{
		alert('Author already added to the table.');
		countEditorsConf--;
		return;
	}

	$('#tableEditors_conf > tbody:last').append(row);
	hashEditorsConf[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashEditorsConf[hiddenValue] = undefined;
		countEditorsConf--;
	});
	$('#bibliography_editors_surname_conf').val("");
	$('#bibliography_editors_name_conf').val("");
}



//Add an editor to the table of a new volume
function addEditorVolToTable() 
{
	var surname = $('#bibliography_editors_surname_vol').val();
	var name = $('#bibliography_editors_name_vol').val();
	
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
	var inputHidden = "<input type='hidden' name='bibliography[editors_vol_list][]' value='" + hiddenValue + "'/>";
	
	
	var delTd = "deleteEditorVol" + countEditorsVol;
	countEditorsVol++;

	// add values to the table as row
	var row = "<tr> " + "<td>" + name + "</td> " + "<td>" + surname + "</td>";
	row = row + "</td> <td id='" + delTd + "'></td> " + inputHidden + "</tr>";
	
	if (hashEditorsVol[hiddenValue] != undefined) 
	{
		alert('Author already added to the table.');
		countEditorsVol--;
		return;
	}

	$('#tableEditors_vol > tbody:last').append(row);
	hashEditorsVol[hiddenValue] = hiddenValue;

	$("#" + delTd).wrapInner("<a href='#'>Delete</a>");
	$("#" + delTd + " a").click(function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		hashEditorsVol[hiddenValue] = undefined;
		countEditorsVol--;
	});
	$('#bibliography_editors_surname_vol').val("");
	$('#bibliography_editors_name_vol').val("");
}



// Clean all the tables of authors and editors
function cleanTables() 
{
	countAuthors = 1;
	hashAuthors = new Array();
	$('#bibliography_authors_surname').val("");
	$('#bibliography_authors_name').val("");
	$('#tableAuthors > tbody').html("");
	
	countEditors= 1;
	hashEditors = new Array();
	$('#bibliography_editors_surname').val("");
	$('#bibliography_editors_name').val("");	
	$('#tableEditors > tbody').html("");
	
	countEditorsConf= 1;
	hashEditorsConf = new Array();
	$('#bibliography_editors_surname_conf').val("");
	$('#bibliography_editors_name_conf').val("");	
	$('#tableEditors_conf > tbody').html("");
	
	countEditorsVol= 1;
	hashEditorsVol = new Array();
	$('#bibliography_editors_surname_vol').val("");
	$('#bibliography_editors_name_vol').val("");	
	$('#tableEditors_vol > tbody').html("");
}


//Clean the forms
function cleanPage() 
{
	cleanTables();
	$('#bibliography_title').val(""); 
	$('#bibliography_number').val(""); 
	$('#bibliography_pubyear').val(""); 
	$('#bibliography_pagesfrom').val(""); 
	$('#bibliography_pagesto').val("");  
	$('#bibliography_fig').val("");  
	$('#bibliography_url').val("");  
	$('#bibliography_doi').val(""); 
	$('#bibliography_volume').val(""); 
	$('#bibliography_abbr').val(""); 
	$('#bibliography_edcity').val(""); 
}
















//Add a new reference
$('#addNewReference').click(function() 
{
	var type = $('#bibliography_type').val();

	var authors = "";
	for (var i in hashAuthors) {
		 if(hashAuthors[i] != undefined)
			 authors = authors + hashAuthors[i] + "@";
	}
	authors = authors.substring(0, authors.length-1);
	
	var editors = "";
	for (var i in hashEditors) {
		 if(hashEditors[i] != undefined)
			 editors = editors + hashEditors[i] + "@";
	}
	editors = editors.substring(0, editors.length-1);
	
	var title = $('#bibliography_title').val(); 
	var journal = $('#bibliography_journal').val(); 
	var conference = $('#bibliography_conference').val(); 
	var volume = $('#bibliography_volume').val(); 
	var number = $('#bibliography_number').val(); 
	var year = $('#bibliography_pubyear').val(); 
	var pagesFrom = $('#bibliography_pagesfrom').val(); 
	var pagesTo = $('#bibliography_pagesto').val();  
	var figs = $('#bibliography_fig').val();  
	var refUrl = $('#bibliography_url').val();  
	var doi = $('#bibliography_doi').val();  
	var abbr = $('#bibliography_abbr').val();
	var city = $('#bibliography_edcity').val(); 

	var url = "";
	var parameters = "";
	

	
	// Store an article on journal
	// --------------------------------------------------------------------------------------------------------------------
	if(type == "Rivista")
	{
		if(authors == "" || title == "" || journal == "" || year == "" || pagesFrom == "" || pagesTo == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
		
		if(!isInteger(year) || !isInteger(pagesFrom) || !isInteger(pagesTo))
		{
			alert("The fields Year of Edition, Pages-From and Pages-To must be numeric!");
			return;
		}
			
		url = Routing.generate('edb_literature_new_journal_reference');
		parameters = {
				authors : authors,
				title : title,
				journal : journal,
				number : number,
				year : year,
				pagesFrom : pagesFrom,
				pagesTo : pagesTo,
				figs : figs,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------
	
	
	// Store an article for a conference
	// --------------------------------------------------------------------------------------------------------------------
	else if(type == "Convegno")
	{
		if(authors == "" || title == "" || conference == "" || pagesFrom == "" || pagesTo == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
		
		if(!isInteger(pagesFrom) || !isInteger(pagesTo))
		{
			alert("The fields Pages-From and Pages-To must be numeric!");
			return;
		}
			
		url = Routing.generate('edb_literature_new_conference_reference');
		parameters = {
				authors : authors,
				title : title,
				conference : conference,
				pagesFrom : pagesFrom,
				pagesTo : pagesTo,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------

	
	
	// Store an article for a monograph
	// --------------------------------------------------------------------------------------------------------------------
	else if(type == "Monografia")
	{
		if(authors == "" || title == "" || city == "" || year == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
		
		if(!isInteger(year))
		{
			alert("The field Year of Edition must be numeric!");
			return;
		}
		
		url = Routing.generate('edb_literature_new_monograph_reference');
		parameters = {
				authors : authors,
				title : title,
				city : city,
				year : year,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------
	
	
	// Store an article for a corpus
	// --------------------------------------------------------------------------------------------------------------------
	else if(type == "Corpus")
	{
		if(abbr == "" || title == "" || number == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
		
		if(year != "" && !isInteger(year))
		{
			alert("The field Year of Edition must be numeric!");
			return;
		}
			
		url = Routing.generate('edb_literature_new_corpus_reference');
		parameters = {
				abbr : abbr,
				title : title,
				number : number, 
				editors : editors,
				city : city,
				year : year,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------
	
	
	
	// Store an article for a repertory
	// --------------------------------------------------------------------------------------------------------------------
	else if(type == "Repertorio")
	{
		if(abbr == "" || title == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
			
		url = Routing.generate('edb_literature_new_repertory_reference');
		parameters = {
				abbr : abbr,
				title : title,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------
	
	
	
	// Store an article for a repertory
	// --------------------------------------------------------------------------------------------------------------------
	else if(type == "Volume")
	{
		if(authors == "" || title == "" || volume == "" || pagesFrom == "" || pagesTo == "")
		{
			alert("Please compile all the required fields!");
			return;
		}
		
		if(!isInteger(pagesFrom) || !isInteger(pagesTo))
		{
			alert("The fields Pages-From and Pages-To must be numeric!");
			return;
		}
			
		url = Routing.generate('edb_literature_new_volume_reference');
		parameters = {
				authors : authors,
				title : title,
				volume : volume,
				pagesFrom : pagesFrom,
				pagesTo : pagesTo,
				refUrl : refUrl,
				doi : doi};
	}
	// --------------------------------------------------------------------------------------------------------------------

	
	// Store the Reference
	$.post(url, parameters, function(result) 
	{
		if(result.toString() == '"ok"')
		{
			alert("The bibliographic reference has been successfully stored!");
			cleanPage();
		}
		else
			alert(result);
	});
});



























function isInteger(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n) && n%1 == 0;
	}