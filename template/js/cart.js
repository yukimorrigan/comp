$(document).ready(function () {
	$(".tobasket").click(function () {
		var id = $(this).attr("data-id");
		// Асинхронный запрос
		$.post("/cart/addAjax/" + id, {}, function (data) {
			$("#cart-count").html(data);
		});
		return false;
	});
});