<?php 
session_start(); 
//if ((isset($_COOKIE['hasVoted'])) || ((isset($_SESSION['voted'])))) { header('Location: surveyResults.php');}
//if (isset($_SESSION['voted'])) { header('Location: surveyResults.php');}
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
		<title>Yoga User Profile - Raby</title>
		
		<!-- Input
			
		Processing
			
		Output-->

	</head>
	<body id="assignments">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<!--two value labels needed, which one displayed based on signed in status  -->
			<h2>Yoga User Sign Up/Edit Profile</h2>
			<div class='lead'>
				Under construction
			</div>
			
			<div class="jsDivs" id="firstDiv">
				<!--two value labels needed, which one displayed based on signed in status  -->
				<p>User sign up/edit profile for a yoga studio.</p> 
				
			<form method="post" action="" id="insertEmployee">
			<fieldset>
				<div class="form-group" >
					<label for="usrFirstName">First Name: </label>
					<input type="text" name="usrFirstName" size="75" id="usrFirstName" required="required">
				</div>
				<div class="form-group" >
					<label for="usrLastName">Last Name: </label>
					<input type="text" name="usrLastName" size="75" id="usrLastName" required="required">
				</div>
				<div class="form-group" >
					<label for="usrPhone">Mobile Phone: </label>
					<input type="number" name="usrPhone" size="75" id="usrPhone" required="required">
				</div>
				<div class="form-group" >
					<label for="usrNameNew">User Name: </label>
					<input type="text" name="usrNameNew" size="75" id="usrNameNew" required="required">
				</div>
				<div class="form-group" >
					<label for="usrPwd">Password: </label>
					<input type="password" name="usrPwd" size="75" id="usrPwd" required="required">
				</div>
				<div class="form-group" >
					<label for="usrPwd2">Confirm Password: </label>
					<input type="password" name="usrPwd2" size="75" id="usrPwd2" required="required">
				</div>
				
				<div >
					<!--two value labels needed, which one displayed based on signed in status  -->
					<input class="btn btn-primary " id="usrSignUp" type="submit" name="usrSignUp" value="SignUp">
				</div>
			
			
			 </fieldset>

			 </form>
				
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
