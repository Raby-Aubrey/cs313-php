<?php 
session_start(); 

if ((!empty($_SESSION['userIdP1']))) {
	require('model/database.php');

	global $db;

    try {
        $statement = $db->prepare('SELECT *
									FROM cs313.users
									WHERE id = :userIdP1
									LIMIT 1');
        $statement->execute(array($_SESSION["userIdP1"]));
        $result = $statement->fetch();
        
        $firstName = $result['fname'];
		$lastName = $result['lname'];
		$phone = $result['phone'];
		$userName = $result['username'];
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>function get_user in yogaUser.php had an Error: $error_message </p>";
    }
}

?>
<!DOCTYPE HTML>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="personal.css"></link>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="personal.js"></script>
		<title>Yoga User Profile - Raby</title>
	</head>
	<body id="assignments">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<!--two value labels needed, which one displayed based on signed in status  -->
			<?php if ((empty($_SESSION['userIdP1']))) { ?>
				<h2>Yoga User Sign Up</h2>
			<?php } else { ?>
				<h2>Yoga User Edit Profile</h2>
			<?php } ?>
			
			<div class="jsDivs" id="firstDiv">
				 
			<form method="post" action="yogaUser.php" id="insertUser">
			<fieldset>
				<div class="form-group" >
					<label for="usrFirstName">First Name: </label>
					<input type="text" name="usrFirstName" size="75" id="usrFirstName" required="required" value="<?php echo (!empty($_SESSION['userIdP1']) ? "$firstName" : ""); ?>">
				</div>
				<div class="form-group" >
					<label for="usrLastName">Last Name: </label>
					<input type="text" name="usrLastName" size="75" id="usrLastName" required="required" value="<?php echo (!empty($_SESSION['userIdP1']) ? "$lastName" : ""); ?>">
				</div>
				<div class="form-group" >
					<label for="usrPhone">Mobile Phone: </label>
					<input type="number" name="usrPhone" size="75" id="usrPhone" required="required" value="<?php echo (!empty($_SESSION['userIdP1']) ? "$phone" : ""); ?>">
				</div>
				<div class="form-group" >
					<label for="usrNameNew">User Name: </label>
					<input type="text" name="usrNameNew" size="75" id="usrNameNew" required="required" value="<?php echo (!empty($_SESSION['userIdP1']) ? "$userName" : ""); ?>">
				</div>
				<div class="form-group" >
					<label for="usrPwd">Password: </label>
					<input type="password" name="usrPwd" size="75" id="usrPwd" required="required">
				</div>
				<div class="form-group" >
					<label for="usrPwd2">Confirm Password: </label>
					<input type="password" name="usrPwd2" size="75" id="usrPwd2" data-rule-equalTo="#usrPwd" required="required">
				</div>
				
				<div >
					<!--two value labels needed, which one displayed based on signed in status  -->
					<?php if ((empty($_SESSION['userIdP1']))) { ?>
						<input class="btn btn-primary " id="usrSignUp" type="submit" name="usrSignUp" value="SignUp">
					<?php } else { ?>
						<input class="btn btn-primary " id="usrEdit" type="submit" name="usrEdit" value="Edit Profile">
					<?php } ?>
					
				</div>
			
			
			 </fieldset>

			 </form>
				
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
