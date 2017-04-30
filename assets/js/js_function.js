// str example: 1.000.000
function numToFloat(str){
	if (str == "") return '';

	// replace all dot to blank
	str = str.replace(/\./g, "");
	
	// replace all comma to dot
	str = str.replace(/\,/g, ".");
	
	// str to int
	return parseFloat(str);
}


// output example: 1.000.000
function floatToNum(num){
	var parts = num.toString().split(".");
	parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

$(document).ready(function() {
	$('[type=text]').attr('autocomplete', 'off');
	$('[type=password]').attr('autocomplete', 'off');
	$('.number-format').keyup(function(e) {
		var keyCode = e.keyCode || e.which;
		if (
			// backspace
			keyCode == 8

			// navigation
			|| (keyCode >= 37 && keyCode <= 40)

			// del
			|| keyCode == 46

			//number
			|| (keyCode >= 48 && keyCode <= 57)
		) {
			var str = $(this).val();
			if (str.substr(0, 2) == '0,') $(this).val(str);
			else {
				var float_val = numToFloat(str);
				var number = floatToNum(float_val);
				$(this).val(number);
			}
		}
		else {
			e.preventDefault();
		}
	});
	$('.number-format').keydown(function(e){
		if(
			e.keyCode >= 65 && e.keyCode <= 90 
			|| e.keyCode == 32
			|| e.keyCode == 59
			|| e.keyCode == 61
			|| e.keyCode == 173
			|| e.keyCode == 191
			|| e.keyCode == 192
			|| ( e.keyCode >= 219 && e.keyCode <= 222)
		) {
			e.preventDefault();
		}
	});
});