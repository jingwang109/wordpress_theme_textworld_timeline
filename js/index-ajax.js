window.onload = function(){

	$(window).bind("scroll", function(){
		if(( $(window).scrollTop() + $(window).height() ) > $(document).height() - 100){
			$.ajax({
				url: "http://localhost/memory/?page=" + $('#ajax-line').text(),
				method: "GET",
				success: function(data){
					var content = $(data).find(".timeline");
					$('.timeline').append(content);
				}
			});
		}
	});
}
