<?php 
session_start(); 
//if ((isset($_COOKIE['hasVoted'])) || ((isset($_SESSION['voted'])))) { header('Location: surveyResults.php');}
//if (isset($_SESSION['voted'])) { header('Location: surveyResults.php');}
require('/model/database.php');

	if(isset($_POST['usrNameP1']) && isset($_POST['usrPwdP1']) ) {
		$userName = $_POST['usrNameP1'];
		$password = $_POST['usrPwdP1'];

		
		$_SESSION['userIdP1'] = login_user($userName, $password);
	}

function login_user($userName, $password) {
    global $db;

    try {
        $statement = $db->prepare('SELECT id
									FROM cs313.users
									WHERE username = :userName AND
									password = :password
									LIMIT 1');
        $statement->bindValue(':userName', $userName, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        //echo '<pre>'.print_r($result, true) . '</pre>';
        return $result['id'];
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></></link>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="personal.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="personal.js"></script>
		<title>Yoga User - Raby</title>
		
		<!-- Input
			
		Processing
			
		Output-->

	</head>
	<body id="assignments">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<h2>Yoga User Interface</h2>
			<div class='lead'>
				Under construction
			</div>
			
			<div class="jsDivs" id="firstDiv">
				<p>User interface for a yoga studio.</p> 
				
				<ul class='well' id='nonUser'>
					<li><a href="yogaSignUp.php"><?php if(!empty($_SESSION['userIdP1'])) { echo "Edit Profile"; } else { echo "New user - Sign up" ;} ?></a></li>
					<li><a href="yogaLogIn.php"><?php if(!empty($_SESSION['userIdP1'])) { echo "Log Out"; } else { echo "Log In" ;} ?></a></li>
					<li><a href="yogaClasses.php"><?php if(!empty($_SESSION['userIdP1'])) { echo "My Class Schedule"; } else { echo "See Classes" ;} ?></a></li>
				</ul>
				
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
