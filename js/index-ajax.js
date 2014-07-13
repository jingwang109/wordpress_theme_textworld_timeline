window.onload = function(){
	$('iframe').remove();
	var isLoading = false;
	var current_page = 1;

	$(window).bind("scroll", function(){
		if( ($(window).scrollTop() + $(window).height()) > $(document).height() - 200){
			if(isLoading == false){
				isLoading = true;
				console.log("current page is " + current_page);
				current_page++;
				$('#LoadingTip').show();
				$.ajax({
					url: "http://www.textworld.me/page/" + current_page,
					method: "GET",
					success: function(data){
						isLoading = false;
						//console.log(data);
						var content = $(data).find(".post");
						$(".timeline").append(content);
						$("#LoadingTip").hide();
					},
					error: function(data){
						switch(data.status){
							case 404:
								$("#LoadingTip").hide();
								$("#LoadedTip").show();
								break;
							default:
								break;
						}
						console.log(data);
					}
				});
			}
		}
	});
}
