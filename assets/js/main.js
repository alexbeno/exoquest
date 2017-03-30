$(document).ready(function() {
	$( ".filter-toggle" ).click(function() {
		$( "form" ).toggle('fade',500);
	});

	$('input[type=range]').next().text('');
	$('input[type=range]').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});

function redirect(name) {
	var link = name;
	window.location="planete?id="+link;
}

function UpdateQueryString(key, value, url) {
    if (!url) url = window.location.href;

    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

		parameter = key + '=' + value;

		if (url.includes(parameter) && parameter.includes(value)) {
			newUrl = url.replace("&" + parameter, "");
			newUrl = newUrl.replace(parameter, "");

			if (!newUrl.includes("&") && !newUrl.includes("?")) {
				window.location = newUrl.replace('?', '');
			} else {
				window.location = newUrl;
			}
		} else {
			if (re.test(url)) {
	        if (typeof value !== 'undefined' && value !== null)
	            window.location = url.replace(re, '$1' + key + "=" + value + '$2$3');
	        else {
	            hash = url.split('#');
	            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
	            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
	                url += '#' + hash[1];
	            window.location = url;
	        }
	    }
	    else {
	        if (typeof value !== 'undefined' && value !== null) {
	            var separator = url.indexOf('?') !== -1 ? '&' : '?';
	            hash = url.split('#');
	            url = hash[0] + separator + key + '=' + value;
	            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
	                url += '#' + hash[1];
	            window.location = url;
	        }
	        else
	            window.location = url;
	    }
		}
}