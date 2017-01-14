
$(document).ready(function(){
	
	$('#secondDiv').hover(function () {
		$(".raby-img").attr("src", function(index, attr){
			return attr.replace("Small Aubrey 2012.jpg", "BYUI.png");
		});
		
	}, function(){
		$(".raby-img").attr("src", function(index, attr){
			return attr.replace("BYUI.png", "Small Aubrey 2012.jpg");
		});
	});
	
});