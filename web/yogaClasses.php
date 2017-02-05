<?php 
session_start(); 
//if ((isset($_COOKIE['hasVoted'])) || ((isset($_SESSION['voted'])))) { header('Location: surveyResults.php');}
//if (isset($_SESSION['voted'])) { header('Location: surveyResults.php');}
require('model/database.php');

	if (isset($_GET['classList'])) {
		$queryType = $_GET['classList'];
		//echo $queryType;
	}
	if (isset($_GET['registered'])) {
		$registered = $_GET['registered'];
		//print_r($_SESSION);
		$userID = intval($_SESSION["userIdP1"]);
		//echo $userID;
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
		<title>Yoga Classes - Raby</title>

	</head>
	<body id="assignments">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<h2>Yoga Class Schedule</h2>
			<div class='lead'>
				Under construction
			</div>
					
			<div class="jsDivs" id="firstDiv">
				<p>Class interface for a yoga studio.</p> 
				
				<form action="" method="get" class='well'>
					<input type="submit" name="classList" value="<?php if(!empty($_SESSION['userIdP1'])) { echo "Sign Up for Classes"; } else { echo "Available Classes" ;} ?>" />
					<?php if((!empty($_SESSION['userIdP1']))) {
						echo '<input type="submit" name="registered" value="My Enrolled Classes" />'
					;} ?>

				</form>
				

 
        <?php 
			if ((isset($queryType)) && ($queryType == 'Sign Up for Classes')) { ?>
				<h3>Sign Up for Classes</h3>
			<table class="table table-striped">
					<tr>
						<th> 
							Class Date 
						</th> 
						<th> 
							Time 
						</th> 
						<th> 
							Class Type 
						</th> 
						<th> 
							Sign Up 
						</th> 
					</tr>
		<?php
				try {
					$statement = $db->prepare('SELECT *
												FROM cs313.available_classes
												');
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					//echo '<pre>'.print_r($result, true) . '</pre>';
					if (!$result) {
						echo "Problem with the query " . $statement . "<br/>";
						print_r($statement->errorInfo());
						exit();
					}
					foreach ($result as $acrow) {
						//replace TODO with link to sign up for class
						printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>TODO</td></tr>", $acrow['classdate'], htmlspecialchars($acrow['timeslot']), htmlspecialchars($acrow['classtype']) );
					}
					
				} catch (PDOException $e) {
					$error_message = $e->getMessage();
					echo "<p>query to get classes to enroll into had an Error: $error_message </p>";
				}
			} else if ((isset($queryType)) && ($queryType == 'Available Classes')) { ?>
				<h3>Available Classes</h3>
				<table class="table table-striped"> 
					<tr> 
						<th>Class Date</th> 
						<th>Time</th> 
						<th>Class Type</th> 
					</tr>
		<?php
				try {
					$statement = $db->prepare('SELECT *
												FROM cs313.available_classes
												');
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					//echo '<pre>'.print_r($result, true) . '</pre>';
					if (!$result) {
						echo "Problem with the query " . $statement . "<br/>";
						print_r($statement->errorInfo());
						exit();
					}
					foreach ($result as $acrow) {
						printf ("<tr><td>%s</td><td>%s</td><td>%s</td>></tr>", $acrow['classdate'], htmlspecialchars($acrow['timeslot']), htmlspecialchars($acrow['classtype']) );
					}
					
				} catch (PDOException $e) {
					$error_message = $e->getMessage();
					echo "<p>query to get available classes had an Error: $error_message </p>";
				}
			} else if ((isset($registered)) && ($registered == 'My Enrolled Classes')) { ?>
				<h3>My Enrolled Classes</h3>
				<table class="table table-striped"> 
					<tr> 
						<th> 
							Class Date 
						</th> 
						<th> 
							Time 
						</th> 
						<th> 
							Class Type 
						</th> 
					</tr>
		<?php
				try {
					$statement = $db->prepare('SELECT *
												FROM cs313.class_attendees
												WHERE userid = :userId');
					 $statement->execute(array($_SESSION["userIdP1"]));
					 //$statement->bindparam(":userId",$_SESSION["userIdP1"]);
					 //$statement->bindValue(':userId', $userID, PDO::PARAM_INT);
					 $statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					//echo '<pre>'.print_r($result, true) . '</pre>';
					if (!$result) {
						echo "Not enrolled in any classes.";
						//echo "Problem with the attendee query.<br/>";
						//print_r($statement->errorInfo());
						exit();
					}
					foreach ($result as $acrow) {
						printf ("<tr><td>%s</td><td>%s</td><td>%s</td>></tr>", $acrow['classdate'], htmlspecialchars($acrow['timeslot']), htmlspecialchars($acrow['classtype']) );
					}
					
				} catch (PDOException $e) {
					$error_message = $e->getMessage();
					echo "<p>query to get enrolled classes had an Error: $error_message </p>";
				}
			}
		?>
        </table> 
				
				
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
