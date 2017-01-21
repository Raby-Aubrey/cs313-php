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
		<title>Survey Results - Raby</title>
		
		<!-- Input
			
		Processing
			
		Output-->

	</head>
	<body id="surveyResults">
	
	<?php
		//reading in summary text
		$myFile = 'surveydata.txt';
		$array = array();
		/*$fh = fopen($myFile, 'r');
		$theSummary = fread($fh, filesize($myFile));
		*/
		foreach (file($myFile) as $line){
			list($key, $value) = explode(' ', $line, 2) + array(NULL, NULL);
			echo "$key = $value"; 
			$value = trim($value);
			
			if($value !== NULL){
				$array[$key] = $value;
			}
		}
		
		echo print_r($array);
		
		//update the tallies
		if(isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) ) {
			$q1Key = $_POST['q1'];
			$q2Key = $_POST['q2'];
			$q3Key = $_POST['q3'];
			$q4Key = $_POST['q4'];
			
			//load the current counts
			$total = $array['Total'];
			$q1 = $array[$q1Key];
			$q2 = $array[$q2Key];
			$q3 = $array[$q3Key];
			$q4 = $array[$q4Key];
			
			//increment the counts
			$total = $total + 1;
			$q1 = $q1 + 1;
			$q2 = $q2 + 1;
			$q3 = $q3 + 1;
			$q4 = $q4 + 1;
			
			//update the counts in array
			$array['Total'] = $total;
			$array[$q1Key] = $q1;
			$array[$q2Key] = $q2;
			$array[$q3Key] = $q3;
			$array[$q4Key] = $q4;
			
			
			//save survey results to text file
			$data = 'Total ' . $array['Total'] . "\r\n";
			$data = $data . 'Yes ' . $array['Yes'] . "\r\n";
			$data = $data . 'No ' . $array['No'] . "\r\n";
			$data = $data . 'child ' . $array['child'] . "\r\n";
			$data = $data . 'teen ' . $array['teen'] . "\r\n";
			$data = $data . 'adult ' . $array['adult'] . "\r\n";
			$data = $data . 'na ' . $array['na'] . "\r\n";
			$data = $data . 'gymnastic ' . $array['gymnastic'] . "\r\n";
			$data = $data . 'yoga ' . $array['yoga'] . "\r\n";
			$data = $data . 'karate ' . $array['karate'] . "\r\n";
			$data = $data . 'informal ' . $array['informal'] . "\r\n";
			$data = $data . 'dna ' . $array['dna'] . "\r\n";
			$data = $data . 'Yep ' . $array['Yep'] . "\r\n";
			$data = $data . 'Nope ' . $array['Nope'] . "\r\n";
			
			$ret = file_put_contents('surveydata.txt', $data, LOCK_EX);
			if($ret == false){
				die('There was an error writing to the surveydata file.');
			} 
			else {
				echo "$ret bytes written to surveydata file";
			}
			
		} else {
			die('no form data to process');
		}
		
		
		//saving survey results
		/*if(isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) ) {
			$data = $_POST['q1']. ',' . $_POST['q2']. ',' . $_POST['q3']. ',' . $_POST['q4']. "\r\n";
			$ret = file_put_contents('surveydata.txt', $data, FILE_APPEND | LOCK_EX);
			if($ret == false){
				die('There was an error writing to the surveydata file.');
			} 
			else {
				echo "$ret bytes written to surveydata file";
			}*/
			
		/*} else {
			die('no form data to process');
		}*/
		
		
		
	?>
	
		<div class="container">
			<h1 class="page-header">Aubrey Raby - Week 3 - Survey Results</h1>
			<?php include_once('phpHeader.php');?>
			
			
			<div class="jsDivs" id="firstDiv">
				<h2>Handstand Survey Results</h2>
				
				Total Votes: <?php echo $array['Total']; ?> <br/>
				Question 1: Yes-<?php echo $array['Yes']; ?> No-<?php echo $array['No']; ?> <br/>
				Question 2: Child-<?php echo $array['child']; ?> Teen-<?php echo $array['teen']; ?> Adult-<?php echo $array['adult']; ?> N/A-<?php echo $array['na']; ?><br/>
				Question 3: Gymnastic-<?php echo $array['gymnastic']; ?> Yoga-<?php echo $array['yoga']; ?> Karate-<?php echo $array['karate']; ?> Informal-<?php echo $array['informal']; ?> N/A-<?php echo $array['dna']; ?><br/>
				Question 4: Yes-<?php echo $array['Yep']; ?> No-<?php echo $array['Nope']; ?> <br/><br/>
				
				
				
				<p>I hope you have enjoyed seeing the results of this survey. Remember to do something fun (like a handstand) every day!</p>
			</div>
			
			 <?php include_once('phpFooter.php');?>
		</div>
	</body>
</html>
