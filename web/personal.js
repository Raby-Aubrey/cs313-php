



$(document).ready(function(){
	
	//switch out home page image when hovering over main text block
	$('#secondDiv').hover(function () {
		$(".raby-img").attr("src", function(index, attr){
			return attr.replace("Small Aubrey 2012.jpg", "BYUI.png");
		});
		
	}, function(){
		$(".raby-img").attr("src", function(index, attr){
			return attr.replace("BYUI.png", "Small Aubrey 2012.jpg");
		});
	});
	
	//hide advanced survey elements
	$("#q1Div").hide();
	$("#q2Div").hide();
	$("#q3Div").hide();
	$("#q4Div").hide();
	$("#surveySubmitDiv").hide();
	
	$(function() {
		//highlight the current page in nav
		$("#home a:contains('Home')").parent().addClass('active');
		$("#assignments a:contains('Assignments')").parent().addClass('active');
		
	});
	
	//toggle visible survey segments to start the survey
	$("#startSurvey").click(function() {
		$("#surveyIntroDiv").toggle();
		$("#q1Div").show();
		$("#q2Div").show();
		$("#q3Div").show();
		$("#q4Div").show();
		$("#surveySubmitDiv").show();
						console.log("Hit the q1Div toggle function.");
	});
	

});