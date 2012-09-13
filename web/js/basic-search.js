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

///GREEK START

function keyd(e) {
    var input2 = document.getElementById('signa_description');
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
		setCaretAtEnd(document.getElementById('signa_description'));
		storeCaret(document.getElementById('signa_description'));
	}
};

//thanks to Pablo Rodriguez for the keyboard routine
function doit() {

	if (!greekActive)
		return;

	text2 = document.getElementById('signa_description').value;
	
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
		
		var input2 = document.getElementById('signa_description');
		
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

	document.getElementById('signa_description').value = text2;

	if (navigator.userAgent.indexOf('MSIE') > -1) {
		document.getElementById('signa_description').focus();

		var range = document.getElementById('signa_description').createTextRange();
		range.moveStart("character", len);
		range.collapse(), range.select();
	}

	if (navigator.userAgent.indexOf('Mozilla') > -1) {

		var obj = document.getElementById('signa_description');

		obj.focus();

		obj.scrollTop = obj.scrollHeight;

		setCaretToPos(document.getElementById('signa_description'), len);
	} else
		document.getElementById('signa_description').value = text2;
	storeCaret(document.getElementById('signa_description'));
}

function GkPoly(replaceString) {
	var input = document.getElementById('signa_description');

	if (input.setSelectionRange) {
		var selectionStart = input.selectionStart;
		var selectionEnd = input.selectionEnd;

		input.value = input.value.substring(0, selectionStart) + replaceString
				+ input.value.substring(selectionEnd);

		var obj = document.getElementById('signa_description');

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
		document.getElementById('signa_description').focus();
	} else {
		input.value += replaceString;
	}
}

///GREEK END

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

var greekActive = false;

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
		//alert(greekActive);
		greekActive = !$('#greekToogle').hasClass('active');		
		//alert(greekActive);
	});
	
	$('signa_description').change(function() {
		if (greekActive) 
			doit();
	});
	
});