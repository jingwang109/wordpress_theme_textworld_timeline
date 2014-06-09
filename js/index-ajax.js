window.onload = function(){
	$('iframe').remove();
	var isLoading = false;
	$(window).bind("scroll", function(){
		if(( $(window).scrollTop() + $(window).height() ) > $(document).height() - 200){
			if(isLoading == false){
				alert("loading");
				isLoading = true;
				console.log("page id is " + $("#ajax-line").text());
				$.ajax({
					url: "/page/" + $('#ajax-line').text(),
					method: "GET",
					success: function(data){
						var content = $(data).find(".timeline");
						if (content.find('section')){
							$('.timeline').append(content);
							$('#ajax-line').text(parseInt($('#ajax-line').text()) + 1);
						}else{
							alert("已经到了最后一页");
						}
						isLoading = false;					
					},
					error: function(data){
						alert("error");
						console.log(data);
						isLoading = false;
					}
				});
			}
			
		}
	});
}
