<?php 
	session_start(); 
//if ((isset($_COOKIE['hasVoted'])) || ((isset($_SESSION['voted'])))) { header('Location: surveyResults.php');}
//if (isset($_SESSION['voted'])) { header('Location: surveyResults.php');}
	if ((isset($_SESSION['userIdP1']))) {
		session_unset();
		session_destroy();
	}

	//define variables and set them to empty values
	$userNameP1Err = $userPwP1Err =  "";
	$userNameP1 = $userPw = "";
	
	//validation
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["usrNameP1"])) {
			$userNameP1Err = "Answer is required.";
		} else {
			$userNameP1 = test_input($_POST["usrNameP1"]);
		}
		
		if (empty($_POST["usrPwdP1"])) {
			$userPwP1Err = "Answer is required.";
		} else {
			$userPw = test_input($_POST["usrPwdP1"]);
		}
		
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
?>
<!DOCTYPE HTML>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></></link>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="personal.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="personal.js"></script>
		<title>Yoga LogIn - Raby</title>
		
		<!-- Input
			
		Processing
			
		Output-->

	</head>
	<body id="userLogInP1">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<h2>Yoga User LogIn</h2>
			<div class='lead'>
				Under construction
			</div>
			
			<div class="jsDivs" id="firstDiv">
				<p>User login for a yoga studio.</p> 
				
			<form method="post" action="yogaUser.php" id="insertIndiv">
			<fieldset>
			<div class="form-group" >
				<label for="usrNameP1">User Name: </label>
				<input type="text" name="usrNameP1" size="75" id="usrNameP1" required="required">
			</div>
			<div class="form-group" >
				<label for="usrPwd">Password: </label>
				<input type="password" name="usrPwdP1" size="75" id="usrPwdP1" required="required">
			</div>
			<div >
				<input class="btn btn-primary " id="usrLogIn" type="submit" name="usrLogIn" value="LogIn">
			</div>
		
		
		 </fieldset>

		 </form>
				
				
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
