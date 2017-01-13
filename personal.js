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
	
	$('.col-md-3').hover(function () {
		var $this = $(this);
		$this.removeClass('col-md-3').addClass('col-md-8');
		
	});
	
});