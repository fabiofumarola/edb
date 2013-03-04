var greekEnabled = false;

var map = new Array();

map['``'] = '“';
map['\'\''] = '”';
map['´´'] = '”';
map[',,'] = '„';
map['<<'] = '«';
map['>>'] = '»';
map[':'] = '·';
map['?'] = ';';
map[' )'] = '᾽';

map['a'] = 'α';
map['α/'] = 'ά';
map['α\\'] = 'ὰ';
map['α='] = 'ᾶ';
map['α)'] = 'ἀ';
map['α('] = 'ἁ';
map['α_'] = 'ᾱ';
map['α-'] = 'ᾰ';
map['α|'] = 'ᾳ';
map['ἀ\\'] = 'ἂ';
map['ἀ/'] = 'ἄ';
map['ἁ\\'] = 'ἃ';
map['ἁ/'] = 'ἅ';
map['ἁ='] = 'ἇ';
map['ἀ='] = 'ἆ';
map['ά|'] = 'ᾴ';
map['ὰ|'] = 'ᾲ';
map['ἀ|'] = 'ᾀ';
map['ἁ|'] = 'ᾁ';
map['ᾶ|'] = 'ᾷ';
map['ἆ|'] = 'ᾆ';
map['ἇ|'] = 'ᾇ';
map['ἂ|'] = 'ᾂ';
map['ἄ|'] = 'ᾄ';
map['ἃ|'] = 'ᾃ';
map['ἅ|'] = 'ᾅ';

map['b'] = 'β';
map['c'] = 'ξ';
map['d'] = 'δ';

map['e'] = 'ε';
map['ε/'] = 'έ';
map['ε\\'] = 'ὲ';
map['ε)'] = 'ἐ';
map['ε('] = 'ἑ';
map['ἐ\\'] = 'ἒ';
map['ἐ/'] = 'ἔ';
map['ἑ\\'] = 'ἓ';
map['ἑ/'] = 'ἕ';

map['f'] = 'φ';
map['g'] = 'γ';

map['h'] = 'η';
map['η/'] = 'ή';
map['η\\'] = 'ὴ';
map['η='] = 'ῆ';
map['η)'] = 'ἠ';
map['η('] = 'ἡ';
map['η|'] = 'ῃ';
map['ἠ\\'] = 'ἢ';
map['ἡ\\'] = 'ἣ';
map['ἠ/'] = 'ἤ';
map['ἡ/'] = 'ἥ';
map['ἠ='] = 'ἦ';
map['ἡ='] = 'ἧ';
map['ή|'] = 'ῄ';
map['ὴ|'] = 'ῂ';
map['ῆ|'] = 'ῇ';
map['ἠ|'] = 'ᾐ';
map['ἡ|'] = 'ᾑ';
map['ἢ|'] = 'ᾒ';
map['ἣ|'] = 'ᾓ';
map['ἤ|'] = 'ᾔ';
map['ἥ|'] = 'ᾕ';
map['ἦ|'] = 'ᾖ';
map['ἧ|'] = 'ᾗ';

map['i'] = 'ι';
map['ι/'] = 'ί';
map['ι\\'] = 'ὶ';
map['ι='] = 'ῖ';
map['ι)'] = 'ἰ';
map['ι('] = 'ἱ';
map['ἰ\\'] = 'ἲ';
map['ἱ/'] = 'ἵ';
map['ἰ/'] = 'ἴ';
map['ἱ\\'] = 'ἳ';
map['ἰ='] = 'ἶ';
map['ἱ='] = 'ἷ';
map['ι-'] = 'ῐ';
map['ι_'] = 'ῑ';
map['ι+'] = 'ϊ';
map['ϊ/'] = 'ΐ';
map['ϊ\\'] = 'ῒ';
map['ϊ='] = 'ῗ';

map['j'] = 'ς';
map['k'] = 'κ';
map['l'] = 'λ';
map['m'] = 'μ';
map['n'] = 'ν';

map['o'] = 'ο';
map['ο/'] = 'ό';
map['ο\\'] = 'ὸ';
map['ο)'] = 'ὀ';
map['ο('] = 'ὁ';
map['ὀ\\'] = 'ὂ';
map['ὁ\\'] = 'ὃ';
map['ὀ/'] = 'ὄ';
map['ὁ/'] = 'ὅ';

map['p'] = 'π';
map['q'] = 'θ';

map['r'] = 'ρ';
map['ρ)'] = 'ῤ';
map['ρ('] = 'ῥ';

map['s'] = 'σ';
map['t'] = 'τ';

map['u'] = 'υ';
map['υ/'] = 'ύ';
map['υ\\'] = 'ὺ';
map['υ='] = 'ῦ';
map['υ)'] = 'ὐ';
map['υ('] = 'ὑ';
map['ὐ\\'] = 'ὒ';
map['ὑ\\'] = 'ὓ';
map['ὐ/'] = 'ὔ';
map['ὑ/'] = 'ὕ';
map['ὐ='] = 'ὖ';
map['ὑ='] = 'ὗ';
map['υ+'] = 'ϋ';
map['ϋ/'] = 'ΰ';
map['ϋ\\'] = 'ῢ';
map['ϋ='] = 'ῧ';
map['υ_'] = 'ῡ';
map['υ-'] = 'ῠ';

map['v'] = 'ϝ';

map['w'] = 'ω';
map['ω/'] = 'ώ';
map['ω\\'] = 'ὼ';
map['ω='] = 'ῶ';
map['ω)'] = 'ὠ';
map['ω('] = 'ὡ';
map['ω|'] = 'ῳ';
map['ὠ/'] = 'ὤ';
map['ὡ/'] = 'ὥ';
map['ὠ\\'] = 'ὢ';
map['ὡ\\'] = 'ὣ';
map['ὠ='] = 'ὦ';
map['ὡ='] = 'ὧ';
map['ώ|'] = 'ῴ';
map['ὼ|'] = 'ῲ';
map['ῶ|'] = 'ῷ';
map['ὠ|'] = 'ᾠ';
map['ὡ|'] = 'ᾡ';
map['ὤ|'] = 'ᾤ';
map['ὥ|'] = 'ᾥ';
map['ὢ|'] = 'ᾢ';
map['ὣ|'] = 'ᾣ';
map['ὦ|'] = 'ᾦ';
map['ὧ|'] = 'ᾧ';

map['x'] = 'χ';
map['y'] = 'ψ';
map['z'] = 'ζ';

map['A'] = 'Α';
map['Α/'] = 'Ά';
map['Α\\'] = 'Ὰ';
map['Α('] = 'Ἁ';
map['Α)'] = 'Ἀ';
map['Α|'] = 'ᾼ';
map['Ἁ\\'] = 'Ἃ';
map['Ἀ\\'] = 'Ἂ';
map['Ἁ/'] = 'Ἅ';
map['Ἀ/'] = 'Ἄ';
map['Ἁ='] = 'Ἇ';
map['Ἀ='] = 'Ἆ';
map['Ἁ|'] = 'ᾉ';
map['Ἀ|'] = 'ᾈ';
map['Ἃ|'] = 'ᾋ';
map['Ἂ|'] = 'ᾊ';
map['Ἅ|'] = 'ᾍ';
map['Ἄ|'] = 'ᾌ';
map['Ἇ|'] = 'ᾏ';
map['Ἆ|'] = 'ᾎ';
map['Α-'] = 'Ᾰ';
map['Α_'] = 'Ᾱ';

map['B'] = 'Β';
map['C'] = 'Ξ';
map['D'] = 'Δ';

map['E'] = 'Ε';
map['Ε/'] = 'Έ';
map['Ε\\'] = 'Ὲ';
map['Ε)'] = 'Ἐ';
map['Ε('] = 'Ἑ';
map['Ἐ\\'] = 'Ἒ';
map['Ἐ/'] = 'Ἔ';
map['Ἑ\\'] = 'Ἓ';
map['Ἑ/'] = 'Ἕ';

map['F'] = 'Φ';
map['G'] = 'Γ';

map['H'] = 'Η';
map['Η\\'] = 'Ὴ';
map['Η/'] = 'Ή';
map['Η)'] = 'Ἠ';
map['Η('] = 'Ἡ';
map['Η|'] = 'ῌ';
map['Ἠ\\'] = 'Ἢ';
map['Ἠ/'] = 'Ἤ';
map['Ἠ='] = 'Ἦ';
map['Ἡ\\'] = 'Ἣ';
map['Ἡ/'] = 'Ἥ';
map['Ἡ='] = 'Ἧ';
map['Ἠ|'] = 'ᾘ';
map['Ἡ|'] = 'ᾙ';
map['Ἢ|'] = 'ᾚ';
map['Ἤ|'] = 'ᾜ';
map['Ἦ|'] = 'ᾞ';
map['Ἣ|'] = 'ᾛ';
map['Ἥ|'] = 'ᾝ';
map['Ἧ|'] = 'ᾟ';

map['I'] = 'Ι';
map['Ι\\'] = 'Ὶ';
map['Ι/'] = 'Ί';
map['Ι)'] = 'Ἰ';
map['Ι('] = 'Ἱ';
map['Ἰ\\'] = 'Ἲ';
map['Ἰ/'] = 'Ἴ';
map['Ἱ\\'] = 'Ἳ';
map['Ἱ\\'] = 'Ἵ';
map['Ἰ='] = 'Ἶ';
map['Ἱ='] = 'Ἷ';
map['Ι-'] = 'Ῐ';
map['Ι_'] = 'Ῑ';
map['Ι+'] = 'Ϊ';

map['J'] = '*';
map['K'] = 'Κ';
map['L'] = 'Λ';
map['M'] = 'Μ';
map['N'] = 'Ν';

map['O'] = 'Ο';
map['Ο\\'] = 'Ὸ';
map['Ο/'] = 'Ό';
map['Ο('] = 'Ὁ';
map['Ο)'] = 'Ὀ';
map['Ὁ\\'] = 'Ὃ';
map['Ὁ/'] = 'Ὅ';
map['Ὀ\\'] = 'Ὂ';
map['Ὀ/'] = 'Ὄ';

map['P'] = 'Π';
map['Q'] = 'Θ';

map['R'] = 'Ρ';
map['Ρ('] = 'Ῥ';

map['S'] = 'Σ';
map['T'] = 'Τ';

map['U'] = 'Υ';
map['Υ/'] = 'Ύ';
map['Υ\\'] = 'Ὺ';
map['Υ('] = 'Ὑ';
map['Ὑ\\'] = 'Ὓ';
map['Ὑ/'] = 'Ὕ';
map['Ὑ='] = 'Ὗ';
map['Υ-'] = 'Ῠ';
map['Υ_'] = 'Ῡ';
map['Υ+'] = 'ϔ';

map['V'] = 'Ϝ';

map['W'] = 'Ω';
map['Ω\\'] = 'Ὼ';
map['Ω/'] = 'Ώ';
map['Ω)'] = 'Ὠ';
map['Ω('] = 'Ὡ';
map['Ω|'] = 'ῼ';
map['Ὠ\\'] = 'Ὢ';
map['Ὠ/'] = 'Ὤ';
map['Ὠ='] = 'Ὦ';
map['Ὡ\\'] = 'Ὣ';
map['Ὡ/'] = 'Ὥ';
map['Ὡ='] = 'Ὧ';
map['Ὠ|'] = 'ᾨ';
map['Ὡ|'] = 'ᾩ';
map['Ὢ|'] = 'ᾪ';
map['Ὤ|'] = 'ᾬ';
map['Ὦ|'] = 'ᾮ';
map['Ὣ|'] = 'ᾫ';
map['Ὥ|'] = 'ᾭ';
map['Ὧ|'] = 'ᾯ';

map['X'] = 'Χ';
map['Y'] = 'Ψ';
map['Z'] = 'Ζ';

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
	if(e.keyCode !=8)
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

	
	textOriginal = document.getElementById('transcription').value;
	text2 = textOriginal[textOriginal.length-1];
	textOriginal = textOriginal.substring(0, textOriginal.length-1);

	
	
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

	oldText2 = text2;
	for (var i in map) {
		text2 = replace(text2, i, map[i]);
	}

	var countChar = 1;
	while(oldText2 == text2 && countChar < 4)
	{
		text2 = textOriginal[textOriginal.length-1] + text2;
		textOriginal = textOriginal.substring(0, textOriginal.length-1);
		for (var i in map) {
			text2 = replace(text2, i, map[i]);
		}
		countChar++;
	}
	

	
	

	document.getElementById('transcription').value = textOriginal+text2;

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
		document.getElementById('transcription').value = textOriginal+text2;
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