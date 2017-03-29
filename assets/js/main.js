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
