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
