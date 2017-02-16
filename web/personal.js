
	function passwordMatch() {
		var thePassword = document.getElementById("usrPwd2").value;
		var origPswd = document.getElementById("usrPwd").value;
		if (thePassword === origPswd) {
			document.getElementsByClassName("pattern2")[0].style.visibility = 'hidden';
			document.getElementById("signUpButton").style.visibility = 'visible';
			}
		else 	{
				document.getElementsByClassName("pattern2")[0].style.visibility = 'visible';
				document.getElementById("signUpButton").style.visibility = 'hidden';
				}
		}


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
	//hide thinThread elements
	$("#insertEmployee").hide();
	$("#selectEmployees").hide();
	
	
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
	
	//obtain employee list and toggle visible thinThread elements
	$("#getEmployees").click(function() {
		$("#insertEmployee").toggle();
		$("#selectEmployees").toggle();
			console.log("Hit the employee toggle function.");
	});
	
	

});