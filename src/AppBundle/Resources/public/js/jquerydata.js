$(document).on('change', '.wear', function() {
	
	$.ajax({
		url: '{{ path('wearType') }}',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
	
});
$(function(){
    
});