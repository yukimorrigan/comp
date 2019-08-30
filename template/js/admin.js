$(function() {
    $('#add-btn').bind('click', function(){
    	var newValue = $('#new-value').val();
    	if (newValue != '') {
    		$('#attr-values').addClass('alert alert-secondary');
	        var count = $('#attr-values div').length;
	        $('#attr-values').append(
	        	'<div class="form-check"> \
		        	<input name="value[' + count + ']" class="form-check-input" type="checkbox" value="' + newValue + '" checked> \
		        	<label class="form-check-label">' + newValue + '</label> \
	        	</div>');
    	}  
    });
});