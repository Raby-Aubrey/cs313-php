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
		<title>Survey - Raby</title>
		
		<!-- Input
			
		Processing
			
		Output-->

	</head>
	<body id="survey">
	<?php
		//define variables and set them to empty values
		$q1Err = $q2Err = $q3Err = $q4Err = $q5Err = $q6Err = $q7Err = "";
		$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = "";
		
		//validation
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if (empty($_POST["q1"])) {
				$q1Err = "Answer is required.";
			} else {
				$q1 = test_input($_POST["q1"]);
			}
			
			if (empty($_POST["q2"])) {
				$q2Err = "Answer is required.";
			} else {
				$q2 = test_input($_POST["q2"]);
			}
			
			if (empty($_POST["q3"])) {
				$q3Err = "Answer is required.";
			} else {
				$q3 = test_input($_POST["q3"]);
			}
			
			if (empty($_POST["q4"])) {
				$q4Err = "Answer is required.";
			} else {
				$q4 = test_input($_POST["q4"]);
			}
		}
		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<div class="container">
		<h1 class="page-header">Week 3 - Survey</h1>
		<?php include_once('phpHeader.php');?>
		
		
		<div class="jsDivs" id="surveyIntroDiv">
			<p>Krista Stryker over at <a href="http://www.mindbodygreen.com/0-11284/5-reasons-you-should-do-handstands-every-day.html">MindBodyGreen</a> recommends doing a handstand every day and lists 5 benefits of doing so. Her article (and my CS 313 assignment) inspired this survey.</p>
			<button class="btn btn-default" type="button" id="startSurvey">Start Survey</button>
			<p>To go directly to the survey results without casting your vote click <a href="surveyResults.php">here</a>.</p>
		</div>
		
		
		<form method="post" action="surveyResults.php" id="surveyForm">
                <fieldset>
		<div class="btn-group" data-toggle="button"id="q1Div">
			<label class="btn btn-primary">Do you know how to do a handstand?
				<input type="radio" name="q1" <?php if (isset($q1) && $q1 == "Yes") echo "checked" ; ?> id="q1Yes" value="Yes" required="required">Yes
				<input type="radio" name="q1" <?php if (isset($q1) && $q1 == "No") echo "checked" ; ?> id="q1No" value="No">No
			</label>
			<br/><br/>
		</div>
		<br/><br/>
		<div class="btn-group" data-toggle="button"id="q2Div">
			<label class="btn btn-primary">When did you learn how to do a handstand?
				<input type="radio" name="q2" <?php if (isset($q2) && $q2 == "child") echo "checked" ; ?> id="q2child" value="child" required="required">Child (0-12)
				<input type="radio" name="q2" <?php if (isset($q2) && $q2 == "teen") echo "checked" ; ?> id="q2teen" value="teen">Teen (13-19)
				<input type="radio" name="q2" <?php if (isset($q2) && $q2 == "adult") echo "checked" ; ?> id="q2adult" value="adult">Adult (20+)
				<input type="radio" name="q2" <?php if (isset($q2) && $q2 == "na") echo "checked" ; ?> id="q2na" value="na">N/A
			</label>
			<br/><br/>
		</div>
		<br/><br/>
		<div class="btn-group" data-toggle="button"id="q3Div">
			<label class="btn btn-primary">What kind of handstand did you learn?
				<input type="radio" name="q3" <?php if (isset($q3) && $q3 == "gymnastic") echo "checked" ; ?> id="q3gymnastic" value="gymnastic" required="required">Gymnastic
				<input type="radio" name="q3" <?php if (isset($q3) && $q3 == "yoga") echo "checked" ; ?> id="q3yoga" value="yoga">Yoga
				<input type="radio" name="q3" <?php if (isset($q3) && $q3 == "karate") echo "checked" ; ?> id="q3karate" value="karate">Karate
				<input type="radio" name="q3" <?php if (isset($q3) && $q3 == "informal") echo "checked" ; ?> id="q3informal" value="informal">Informal
				<input type="radio" name="q3" <?php if (isset($q3) && $q3 == "dna") echo "checked" ; ?> id="q3na" value="dna">N/A
			</label>
			<br/><br/>
		</div>
		<br/><br/>
		<div class="btn-group" data-toggle="button"id="q4Div">
			<label class="btn btn-primary">Do you do a handstand every day?
				<input type="radio" name="q4" <?php if (isset($q4) && $q4 == "Yep") echo "checked" ; ?> id="q4Yes" value="Yep" required="required">Yes
				<input type="radio" name="q4" <?php if (isset($q4) && $q4 == "Nope") echo "checked" ; ?> id="q4No" value="Nope">No
			</label>
			<br/><br/>
		</div>
		<br/><br/>
		<div >
			<input class="btn btn-primary " id="surveySubmitDiv" type="submit" name="submit" value="Submit">
		</div>
		
		
		 </fieldset>

		 </form>
		<?php
			//define variables and set them to empty values
			
		?>

		
		 <?php include_once('phpFooter.php');?>
	</div>
	</body>
</html>
