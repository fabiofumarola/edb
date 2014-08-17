$('document').ready(function() {
	$('#epiResults').tablesorter(); 
	
	var rowCount = $('#epiResults tr').length;
	for(var i=1; i <=rowCount; i++)
	{
		var rowName = '#transcription' + i;
//		alert(rowName);
		$(rowName).readmore({
			  speed: 75,
			  maxHeight: 20
			});
	}
	
});

