var greekEnabled = false;

$('document').ready(function() {

	$('#greekToogle').click(function(event) {
		// alert(greekEnabled);
		greekEnabled = !$('#greekToogle').hasClass('active');
		// alert(greekEnabled);
	});
});

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
				// it appears range.select() should select the newly
				// inserted text but that fails with IE
				range.moveStart('character', -replaceString.length);
				range.select();
			}
		}
	}
}

function keyd(e) {
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

function setCaretToPos(input, pos) {
	setSelectionRange(input, pos, pos);
}

function replace(inText, inFindStr, inReplStr) {

	var searchFrom = 0;
	var offset = 0;
	var outText = '';
	var searchText = '';

	searchText = inText;

	offset = searchText.indexOf(inFindStr, searchFrom);
	while (offset != -1) {
		outText += inText.substring(searchFrom, offset);
		outText += inReplStr;
		searchFrom = offset + inFindStr.length;
		offset = searchText.indexOf(inFindStr, searchFrom);
	}
	outText += inText.substring(searchFrom, inText.length);

	return (outText);
	if (navigator.userAgent.indexOf('MSIE') > -1) {
		setCaretAtEnd(document.getElementById('transcription'));
		storeCaret(document.getElementById('transcription'));
	}
}

// thanks to Pablo Rodriguez for the keyboard routine
function doit() {

	if (!greekEnabled)
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

	if (!document.all && navigator.userAgent.indexOf('Mozilla') > -1) {
		var input2 = document.getElementById('transcription');

		if (input2.setSelectionRange)
			var len = input2.selectionStart;

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

	text2 = replace(text2, '``', '“');
	text2 = replace(text2, '\'\'', '”');
	text2 = replace(text2, '´´', '”');
	text2 = replace(text2, ',,', '„');
	text2 = replace(text2, '<<', '«');
	text2 = replace(text2, '>>', '»');
	text2 = replace(text2, ':', '·');
	text2 = replace(text2, '?', ';');
	text2 = replace(text2, ' )', '᾽');

	text2 = replace(text2, 'a', 'α');
	text2 = replace(text2, 'α/', 'ά');
	text2 = replace(text2, 'α\\', 'ὰ');
	text2 = replace(text2, 'α=', 'ᾶ');
	text2 = replace(text2, 'α)', 'ἀ');
	text2 = replace(text2, 'α(', 'ἁ');
	text2 = replace(text2, 'α_', 'ᾱ');
	text2 = replace(text2, 'α-', 'ᾰ');
	text2 = replace(text2, 'α|', 'ᾳ');
	text2 = replace(text2, 'ἀ\\', 'ἂ');
	text2 = replace(text2, 'ἀ/', 'ἄ');
	text2 = replace(text2, 'ἁ\\', 'ἃ');
	text2 = replace(text2, 'ἁ/', 'ἅ');
	text2 = replace(text2, 'ἁ=', 'ἇ');
	text2 = replace(text2, 'ἀ=', 'ἆ');
	text2 = replace(text2, 'ά|', 'ᾴ');
	text2 = replace(text2, 'ὰ|', 'ᾲ');
	text2 = replace(text2, 'ἀ|', 'ᾀ');
	text2 = replace(text2, 'ἁ|', 'ᾁ');
	text2 = replace(text2, 'ᾶ|', 'ᾷ');
	text2 = replace(text2, 'ἆ|', 'ᾆ');
	text2 = replace(text2, 'ἇ|', 'ᾇ');
	text2 = replace(text2, 'ἂ|', 'ᾂ');
	text2 = replace(text2, 'ἄ|', 'ᾄ');
	text2 = replace(text2, 'ἃ|', 'ᾃ');
	text2 = replace(text2, 'ἅ|', 'ᾅ');

	text2 = replace(text2, 'b', 'β');
	text2 = replace(text2, 'c', 'ξ');
	text2 = replace(text2, 'd', 'δ');

	text2 = replace(text2, 'e', 'ε');
	text2 = replace(text2, 'ε/', 'έ');
	text2 = replace(text2, 'ε\\', 'ὲ');
	text2 = replace(text2, 'ε)', 'ἐ');
	text2 = replace(text2, 'ε(', 'ἑ');
	text2 = replace(text2, 'ἐ\\', 'ἒ');
	text2 = replace(text2, 'ἐ/', 'ἔ');
	text2 = replace(text2, 'ἑ\\', 'ἓ');
	text2 = replace(text2, 'ἑ/', 'ἕ');

	text2 = replace(text2, 'f', 'φ');
	text2 = replace(text2, 'g', 'γ');

	text2 = replace(text2, 'h', 'η');
	text2 = replace(text2, 'η/', 'ή');
	text2 = replace(text2, 'η\\', 'ὴ');
	text2 = replace(text2, 'η=', 'ῆ');
	text2 = replace(text2, 'η)', 'ἠ');
	text2 = replace(text2, 'η(', 'ἡ');
	text2 = replace(text2, 'η|', 'ῃ');
	text2 = replace(text2, 'ἠ\\', 'ἢ');
	text2 = replace(text2, 'ἡ\\', 'ἣ');
	text2 = replace(text2, 'ἠ/', 'ἤ');
	text2 = replace(text2, 'ἡ/', 'ἥ');
	text2 = replace(text2, 'ἠ=', 'ἦ');
	text2 = replace(text2, 'ἡ=', 'ἧ');
	text2 = replace(text2, 'ή|', 'ῄ');
	text2 = replace(text2, 'ὴ|', 'ῂ');
	text2 = replace(text2, 'ῆ|', 'ῇ');
	text2 = replace(text2, 'ἠ|', 'ᾐ');
	text2 = replace(text2, 'ἡ|', 'ᾑ');
	text2 = replace(text2, 'ἢ|', 'ᾒ');
	text2 = replace(text2, 'ἣ|', 'ᾓ');
	text2 = replace(text2, 'ἤ|', 'ᾔ');
	text2 = replace(text2, 'ἥ|', 'ᾕ');
	text2 = replace(text2, 'ἦ|', 'ᾖ');
	text2 = replace(text2, 'ἧ|', 'ᾗ');

	text2 = replace(text2, 'i', 'ι');
	text2 = replace(text2, 'ι/', 'ί');
	text2 = replace(text2, 'ι\\', 'ὶ');
	text2 = replace(text2, 'ι=', 'ῖ');
	text2 = replace(text2, 'ι)', 'ἰ');
	text2 = replace(text2, 'ι(', 'ἱ');
	text2 = replace(text2, 'ἰ\\', 'ἲ');
	text2 = replace(text2, 'ἱ/', 'ἵ');
	text2 = replace(text2, 'ἰ/', 'ἴ');
	text2 = replace(text2, 'ἱ\\', 'ἳ');
	text2 = replace(text2, 'ἰ=', 'ἶ');
	text2 = replace(text2, 'ἱ=', 'ἷ');
	text2 = replace(text2, 'ι-', 'ῐ');
	text2 = replace(text2, 'ι_', 'ῑ');
	text2 = replace(text2, 'ι+', 'ϊ');
	text2 = replace(text2, 'ϊ/', 'ΐ');
	text2 = replace(text2, 'ϊ\\', 'ῒ');
	text2 = replace(text2, 'ϊ=', 'ῗ');

	text2 = replace(text2, 'j', 'ς');
	text2 = replace(text2, 'k', 'κ');
	text2 = replace(text2, 'l', 'λ');
	text2 = replace(text2, 'm', 'μ');
	text2 = replace(text2, 'n', 'ν');

	text2 = replace(text2, 'o', 'ο');
	text2 = replace(text2, 'ο/', 'ό');
	text2 = replace(text2, 'ο\\', 'ὸ');
	text2 = replace(text2, 'ο)', 'ὀ');
	text2 = replace(text2, 'ο(', 'ὁ');
	text2 = replace(text2, 'ὀ\\', 'ὂ');
	text2 = replace(text2, 'ὁ\\', 'ὃ');
	text2 = replace(text2, 'ὀ/', 'ὄ');
	text2 = replace(text2, 'ὁ/', 'ὅ');

	text2 = replace(text2, 'p', 'π');
	text2 = replace(text2, 'q', 'θ');

	text2 = replace(text2, 'r', 'ρ');
	text2 = replace(text2, 'ρ)', 'ῤ');
	text2 = replace(text2, 'ρ(', 'ῥ');

	text2 = replace(text2, 's', 'σ');
	text2 = replace(text2, 't', 'τ');

	text2 = replace(text2, 'u', 'υ');
	text2 = replace(text2, 'υ/', 'ύ');
	text2 = replace(text2, 'υ\\', 'ὺ');
	text2 = replace(text2, 'υ=', 'ῦ');
	text2 = replace(text2, 'υ)', 'ὐ');
	text2 = replace(text2, 'υ(', 'ὑ');
	text2 = replace(text2, 'ὐ\\', 'ὒ');
	text2 = replace(text2, 'ὑ\\', 'ὓ');
	text2 = replace(text2, 'ὐ/', 'ὔ');
	text2 = replace(text2, 'ὑ/', 'ὕ');
	text2 = replace(text2, 'ὐ=', 'ὖ');
	text2 = replace(text2, 'ὑ=', 'ὗ');
	text2 = replace(text2, 'υ+', 'ϋ');
	text2 = replace(text2, 'ϋ/', 'ΰ');
	text2 = replace(text2, 'ϋ\\', 'ῢ');
	text2 = replace(text2, 'ϋ=', 'ῧ');
	text2 = replace(text2, 'υ_', 'ῡ');
	text2 = replace(text2, 'υ-', 'ῠ');

	text2 = replace(text2, 'v', 'ϝ');

	text2 = replace(text2, 'w', 'ω');
	text2 = replace(text2, 'ω/', 'ώ');
	text2 = replace(text2, 'ω\\', 'ὼ');
	text2 = replace(text2, 'ω=', 'ῶ');
	text2 = replace(text2, 'ω)', 'ὠ');
	text2 = replace(text2, 'ω(', 'ὡ');
	text2 = replace(text2, 'ω|', 'ῳ');
	text2 = replace(text2, 'ὠ/', 'ὤ');
	text2 = replace(text2, 'ὡ/', 'ὥ');
	text2 = replace(text2, 'ὠ\\', 'ὢ');
	text2 = replace(text2, 'ὡ\\', 'ὣ');
	text2 = replace(text2, 'ὠ=', 'ὦ');
	text2 = replace(text2, 'ὡ=', 'ὧ');
	text2 = replace(text2, 'ώ|', 'ῴ');
	text2 = replace(text2, 'ὼ|', 'ῲ');
	text2 = replace(text2, 'ῶ|', 'ῷ');
	text2 = replace(text2, 'ὠ|', 'ᾠ');
	text2 = replace(text2, 'ὡ|', 'ᾡ');
	text2 = replace(text2, 'ὤ|', 'ᾤ');
	text2 = replace(text2, 'ὥ|', 'ᾥ');
	text2 = replace(text2, 'ὢ|', 'ᾢ');
	text2 = replace(text2, 'ὣ|', 'ᾣ');
	text2 = replace(text2, 'ὦ|', 'ᾦ');
	text2 = replace(text2, 'ὧ|', 'ᾧ');

	text2 = replace(text2, 'x', 'χ');
	text2 = replace(text2, 'y', 'ψ');
	text2 = replace(text2, 'z', 'ζ');

	text2 = replace(text2, 'A', 'Α');
	text2 = replace(text2, 'Α/', 'Ά');
	text2 = replace(text2, 'Α\\', 'Ὰ');
	text2 = replace(text2, 'Α(', 'Ἁ');
	text2 = replace(text2, 'Α)', 'Ἀ');
	text2 = replace(text2, 'Α|', 'ᾼ');
	text2 = replace(text2, 'Ἁ\\', 'Ἃ');
	text2 = replace(text2, 'Ἀ\\', 'Ἂ');
	text2 = replace(text2, 'Ἁ/', 'Ἅ');
	text2 = replace(text2, 'Ἀ/', 'Ἄ');
	text2 = replace(text2, 'Ἁ=', 'Ἇ');
	text2 = replace(text2, 'Ἀ=', 'Ἆ');
	text2 = replace(text2, 'Ἁ|', 'ᾉ');
	text2 = replace(text2, 'Ἀ|', 'ᾈ');
	text2 = replace(text2, 'Ἃ|', 'ᾋ');
	text2 = replace(text2, 'Ἂ|', 'ᾊ');
	text2 = replace(text2, 'Ἅ|', 'ᾍ');
	text2 = replace(text2, 'Ἄ|', 'ᾌ');
	text2 = replace(text2, 'Ἇ|', 'ᾏ');
	text2 = replace(text2, 'Ἆ|', 'ᾎ');
	text2 = replace(text2, 'Α-', 'Ᾰ');
	text2 = replace(text2, 'Α_', 'Ᾱ');

	text2 = replace(text2, 'B', 'Β');
	text2 = replace(text2, 'C', 'Ξ');
	text2 = replace(text2, 'D', 'Δ');

	text2 = replace(text2, 'E', 'Ε');
	text2 = replace(text2, 'Ε/', 'Έ');
	text2 = replace(text2, 'Ε\\', 'Ὲ');
	text2 = replace(text2, 'Ε)', 'Ἐ');
	text2 = replace(text2, 'Ε(', 'Ἑ');
	text2 = replace(text2, 'Ἐ\\', 'Ἒ');
	text2 = replace(text2, 'Ἐ/', 'Ἔ');
	text2 = replace(text2, 'Ἑ\\', 'Ἓ');
	text2 = replace(text2, 'Ἑ/', 'Ἕ');

	text2 = replace(text2, 'F', 'Φ');
	text2 = replace(text2, 'G', 'Γ');

	text2 = replace(text2, 'H', 'Η');
	text2 = replace(text2, 'Η\\', 'Ὴ');
	text2 = replace(text2, 'Η/', 'Ή');
	text2 = replace(text2, 'Η)', 'Ἠ');
	text2 = replace(text2, 'Η(', 'Ἡ');
	text2 = replace(text2, 'Η|', 'ῌ');
	text2 = replace(text2, 'Ἠ\\', 'Ἢ');
	text2 = replace(text2, 'Ἠ/', 'Ἤ');
	text2 = replace(text2, 'Ἠ=', 'Ἦ');
	text2 = replace(text2, 'Ἡ\\', 'Ἣ');
	text2 = replace(text2, 'Ἡ/', 'Ἥ');
	text2 = replace(text2, 'Ἡ=', 'Ἧ');
	text2 = replace(text2, 'Ἠ|', 'ᾘ');
	text2 = replace(text2, 'Ἡ|', 'ᾙ');
	text2 = replace(text2, 'Ἢ|', 'ᾚ');
	text2 = replace(text2, 'Ἤ|', 'ᾜ');
	text2 = replace(text2, 'Ἦ|', 'ᾞ');
	text2 = replace(text2, 'Ἣ|', 'ᾛ');
	text2 = replace(text2, 'Ἥ|', 'ᾝ');
	text2 = replace(text2, 'Ἧ|', 'ᾟ');

	text2 = replace(text2, 'I', 'Ι');
	text2 = replace(text2, 'Ι\\', 'Ὶ');
	text2 = replace(text2, 'Ι/', 'Ί');
	text2 = replace(text2, 'Ι)', 'Ἰ');
	text2 = replace(text2, 'Ι(', 'Ἱ');
	text2 = replace(text2, 'Ἰ\\', 'Ἲ');
	text2 = replace(text2, 'Ἰ/', 'Ἴ');
	text2 = replace(text2, 'Ἱ\\', 'Ἳ');
	text2 = replace(text2, 'Ἱ\\', 'Ἵ');
	text2 = replace(text2, 'Ἰ=', 'Ἶ');
	text2 = replace(text2, 'Ἱ=', 'Ἷ');
	text2 = replace(text2, 'Ι-', 'Ῐ');
	text2 = replace(text2, 'Ι_', 'Ῑ');
	text2 = replace(text2, 'Ι+', 'Ϊ');

	text2 = replace(text2, 'J', '*');
	text2 = replace(text2, 'K', 'Κ');
	text2 = replace(text2, 'L', 'Λ');
	text2 = replace(text2, 'M', 'Μ');
	text2 = replace(text2, 'N', 'Ν');

	text2 = replace(text2, 'O', 'Ο');
	text2 = replace(text2, 'Ο\\', 'Ὸ');
	text2 = replace(text2, 'Ο/', 'Ό');
	text2 = replace(text2, 'Ο(', 'Ὁ');
	text2 = replace(text2, 'Ο)', 'Ὀ');
	text2 = replace(text2, 'Ὁ\\', 'Ὃ');
	text2 = replace(text2, 'Ὁ/', 'Ὅ');
	text2 = replace(text2, 'Ὀ\\', 'Ὂ');
	text2 = replace(text2, 'Ὀ/', 'Ὄ');

	text2 = replace(text2, 'P', 'Π');
	text2 = replace(text2, 'Q', 'Θ');

	text2 = replace(text2, 'R', 'Ρ');
	text2 = replace(text2, 'Ρ(', 'Ῥ');

	text2 = replace(text2, 'S', 'Σ');
	text2 = replace(text2, 'T', 'Τ');

	text2 = replace(text2, 'U', 'Υ');
	text2 = replace(text2, 'Υ/', 'Ύ');
	text2 = replace(text2, 'Υ\\', 'Ὺ');
	text2 = replace(text2, 'Υ(', 'Ὑ');
	text2 = replace(text2, 'Ὑ\\', 'Ὓ');
	text2 = replace(text2, 'Ὑ/', 'Ὕ');
	text2 = replace(text2, 'Ὑ=', 'Ὗ');
	text2 = replace(text2, 'Υ-', 'Ῠ');
	text2 = replace(text2, 'Υ_', 'Ῡ');
	text2 = replace(text2, 'Υ+', 'ϔ');

	text2 = replace(text2, 'V', 'Ϝ');

	text2 = replace(text2, 'W', 'Ω');
	text2 = replace(text2, 'Ω\\', 'Ὼ');
	text2 = replace(text2, 'Ω/', 'Ώ');
	text2 = replace(text2, 'Ω)', 'Ὠ');
	text2 = replace(text2, 'Ω(', 'Ὡ');
	text2 = replace(text2, 'Ω|', 'ῼ');
	text2 = replace(text2, 'Ὠ\\', 'Ὢ');
	text2 = replace(text2, 'Ὠ/', 'Ὤ');
	text2 = replace(text2, 'Ὠ=', 'Ὦ');
	text2 = replace(text2, 'Ὡ\\', 'Ὣ');
	text2 = replace(text2, 'Ὡ/', 'Ὥ');
	text2 = replace(text2, 'Ὡ=', 'Ὧ');
	text2 = replace(text2, 'Ὠ|', 'ᾨ');
	text2 = replace(text2, 'Ὡ|', 'ᾩ');
	text2 = replace(text2, 'Ὢ|', 'ᾪ');
	text2 = replace(text2, 'Ὤ|', 'ᾬ');
	text2 = replace(text2, 'Ὦ|', 'ᾮ');
	text2 = replace(text2, 'Ὣ|', 'ᾫ');
	text2 = replace(text2, 'Ὥ|', 'ᾭ');
	text2 = replace(text2, 'Ὧ|', 'ᾯ');

	text2 = replace(text2, 'X', 'Χ');
	text2 = replace(text2, 'Y', 'Ψ');
	text2 = replace(text2, 'Z', 'Ζ');

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

function setCaretAtEnd(field) {
	if (field.createTextRange) {
		var r = field.createTextRange();
		r.moveStart('character', field.value.length);
		r.collapse();
		r.select();
	}
}

function changeCase(frmObj) {
	var index;
	var tmpStr;
	var tmpChar;
	var preString;
	var postString;
	var strlen;
	tmpStr = frmObj.value.toLowerCase();
	strLen = tmpStr.length;
	if (strLen > 0) {
		for (index = 0; index < strLen; index++) {
			if (index == 0) {
				tmpChar = tmpStr.substring(0, 1).toUpperCase();
				postString = tmpStr.substring(1, strLen);
				tmpStr = tmpChar + postString;
			} else {
				tmpChar = tmpStr.substring(index, index + 1);
				if (tmpChar == " " && index < (strLen - 1)) {
					tmpChar = tmpStr.substring(index + 1, index + 2)
							.toUpperCase();
					preString = tmpStr.substring(0, index + 1);
					postString = tmpStr.substring(index + 2, strLen);
					tmpStr = preString + tmpChar + postString;
				}
			}
		}
	}
	frmObj.value = tmpStr;
	setCaretAtEnd(document.getElementById('transcription'));
	storeCaret(document.getElementById('transcription'));

}

function Upper(TextField) {
	TextField.value = TextField.value.toUpperCase();
	setCaretAtEnd(document.getElementById('transcription'));
	storeCaret(document.getElementById('transcription'));

}

function Lower(TextField) {
	TextField.value = TextField.value.toLowerCase();
	setCaretAtEnd(document.getElementById('transcription'));
	storeCaret(document.getElementById('transcription'));

}

function surftoaddr(form) {
	var surfindex = form.inputfont.selectedIndex;
	if (surfindex > 0)
		location = form.inputfont.options[surfindex].value;
}

function setClassProperty(className, property, value) {
	if (navigator.userAgent.indexOf('MSIE') > -1) {
		var lastStyleSheet = document.styleSheets[document.styleSheets.length - 1];
		var selector = className;
		var css = property + ': ' + value + ';';
		lastStyleSheet.addRule(selector, css);
	} else if (document.getElementById) {
		var lastStyleSheet = document.styleSheets[document.styleSheets.length - 1];
		var ruleText = className + ' { ' + property + ': ' + value + '}';
		lastStyleSheet.insertRule(ruleText, lastStyleSheet.cssRules.length);
	}
}

function toggleElement(el) {
	if (typeof (el) == 'string') {
		el = document.getElementById(el);
	}
	if (el == null) {
		return;
	}
	if (el.style) {
		var dsp = el.style.display;
		if (!el.origDisplay) {
			if (dsp.length) {
				el.origDisplay = dsp;
			} else {
				el.origDisplay = ((el.currentStyle) ? el.currentStyle.display
						: window.getComputedStyle(el, null).display);
			}
		}
		if (dsp == "block") {
			el.style.display = el.origDisplay ? el.origDisplay : "";
		} else {
			el.style.display = "block";
		}
	}
}