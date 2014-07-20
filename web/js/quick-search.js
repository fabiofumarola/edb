var greekActive = false;

$('document').ready(function() {
	
	// Set the default values
	disableAll(); 
	$('#id_edb').removeAttr('readonly');
	$('#radio_id_edb').prop("checked", true);
	
	// Enable/disable text boxes on the basis of the radio button
	// -------------------------------------------------------------
	$('#radio_id_edb').click(function() {
		disableAll();
		$('#id_edb').removeAttr('readonly');
	});
	
	$('#radio_icvr').click(function() {
		disableAll();
		$('#icvr_number').removeAttr('readonly');
		$('#icvr_subnumber').removeAttr('readonly');
	});
	
	$('#radio_textbiblio').click(function() {
		disableAll();
		$('#transcription').removeAttr('readonly');
		$('#bibliography').removeAttr('readonly');
	});
	// -------------------------------------------------------------
	
	// Switch between Latin and Greek
	$('#greekToogle').click(function(event) {
		greekActive = !greekActive;
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
});




// Disable all the text boxes
// -------------------------------------------------------------
function disableAll() 
{	
	$('#id_edb').val("");
	$('#id_edb').attr('readonly', 'readonly');
	$('#icvr_number').val("");
	$('#icvr_number').attr('readonly', 'readonly');
	$('#icvr_subnumber').val("");
	$('#icvr_subnumber').attr('readonly', 'readonly');
	$('#transcription').val("");
	$('#transcription').attr('readonly', 'readonly');
	$('#bibliography').val("");
	$('#bibliography').attr('readonly', 'readonly');
}	
// -------------------------------------------------------------
