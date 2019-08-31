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

$(function() {
	$('#add-attr').on('click', function(){
		var count = $('[name^=value').length;
		$('#attr').append(
			'<div class="form-inline"> \
				<div class="form-group mb-2 pr-3">  \
					<input type="text" name="value[' + count + ']" placeholder="" value="" class="form-control mb-2"> \
				</div> \
				<div class="form-group mb-2 pr-3">  \
					<button type="button" class="btn btn-link remove"><i class="fa fa-times"></i></button> \
				</div> \
			</div>'); 
	});
});

$('html').on('click','.remove', function () {                              
    $(this).parent().parent().remove();

    $('#attr input').each(function(i, elem) {
		elem.name = 'value[' + i + ']';
	});
});
