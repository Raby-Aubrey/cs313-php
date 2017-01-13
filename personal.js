function main()
			{
				alert("Clicked!");
			}
			
function changeDiv1Color()
			{
				var userChoice = document.getElementById('colorPreference').value;
				if( userChoice == "")
					{
						alert("Please enter a valid color name.");
						return false;
					}
				document.getElementById("firstDiv").style.backgroundColor = userChoice;
			}
$(document).ready(function(){
	
	$("#jqButton").click(function(){
		$("#firstDiv").css("background-color", $("#colorPreference").val());
	});
	
	$("#jqFade").click(function(){
		$("#thirdDiv").fadeToggle("slow");
	});
	
});