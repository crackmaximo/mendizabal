$(function(){
   $("#task_Client").autocomplete({
			
			source: "{{ path('autocomplete') }}",
			minLength: 1
		});	 
});