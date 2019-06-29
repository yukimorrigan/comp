$( function () {
	$( ".name-of-filter" ).each(function( index ) {
		( this ).className += "-" + index;
	});
	$( ".filter-num" ).each(function( index ) {
		( this ).className += "-" + index;
	});
	$(".filter-group").hide();
});

$(function () {
	$("[class*=name-of-filter]").click(function () {
		var filterName = $(this).attr('class');
		var filterNum = filterName.match("[0-9]+");
		if (filterNum != null) {
			filterNum.toString();
			$(".filter-num-" + filterNum).slideToggle(500);
		}
	});
});