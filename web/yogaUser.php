<?php 
session_start(); 
require('model/database.php');
		//user is logging in
	if(isset($_POST['usrNameP1']) && isset($_POST['usrPwdP1']) ) {
		$userName = $_POST['usrNameP1'];
		$password = $_POST['usrPwdP1'];
		
		$_SESSION['userIdP1'] = login_user($userName, $password);
		
	} else if(isset($_POST['usrFirstName']) && isset($_POST['usrLastName']) && isset($_POST['usrPhone']) && isset($_POST['usrNameNew']) && isset($_POST['usrPwd']) && (isset($_SESSION['userIdP1'])) ) {
			//logged in user is editing profile
		$firstName = $_POST['usrFirstName'];
		$lastName = $_POST['usrLastName'];
		$phone = $_POST['usrPhone'];
		$userName = $_POST['usrNameNew'];
		$tempPassword = $_POST['usrPwd'];
		$password = password_hash($tempPassword, PASSWORD_DEFAULT);
		
		edit_user($firstName, $lastName, $phone, $userName, $password);
		$message = "Profile updated successfully.";
	} else if(isset($_POST['usrFirstName']) && isset($_POST['usrLastName']) && isset($_POST['usrPhone']) && isset($_POST['usrNameNew']) && isset($_POST['usrPwd']) && (empty($_SESSION['userIdP1'])) ) {
			//new user is creating profile
		$firstName = $_POST['usrFirstName'];
		$lastName = $_POST['usrLastName'];
		$phone = $_POST['usrPhone'];
		$userName = $_POST['usrNameNew'];
		$tempPassword = $_POST['usrPwd'];
		$password = password_hash($tempPassword, PASSWORD_DEFAULT);
		
		$_SESSION['userIdP1'] = create_user($firstName, $lastName, $phone, $userName, $password);
		$message = "New profile creation and log in successful.";
	}
	
	
	

function login_user($userName, $password) {
    global $db;
	global $message;

    try {
        $statement = $db->prepare('SELECT id
									, password
									FROM cs313.users
									WHERE username = :userName
									LIMIT 1');
        $statement->bindValue(':userName', $userName, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
		
		$hash = $result['password'];
	
	if (password_verify($password, $hash)) {
		$message = "Log in successful.";
		return $result['id'];
	}
	else{
		$message2 = "Your User Name or Password do not match";
		echo "<script type='text/javascript'>alert('$message2');</script>";
	}
		
		
        //echo '<pre>'.print_r($result, true) . '</pre>';
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>function get_user in yogaUser.php had an Error: $error_message </p>";
    }
}

function edit_user($firstName, $lastName, $phone, $userName, $password) {
    global $db;

    try {
        $statement = $db->prepare('UPDATE cs313.users
									SET fname = :fname, lname = :lname, phone = :phone, password = :password, username = :userName
									WHERE id = :userId');
        $statement->bindValue(':fname', $firstName, PDO::PARAM_STR);
		$statement->bindValue(':lname', $lastName, PDO::PARAM_STR);
		$statement->bindValue(':phone', $phone, PDO::PARAM_INT);
		$statement->bindparam(":userId", $_SESSION["userIdP1"]);
		$statement->bindValue(':userName', $userName, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>function edit_user in yogaUser.php had an Error: $error_message </p>";
    }
}

function create_user($firstName, $lastName, $phone, $userName, $password) {
    global $db;

    try {
        $statement = $db->prepare('INSERT INTO cs313.users (fname, lname, phone, password, username)
									VALUES (:fname, :lname, :phone, :password, :userName)');
        $statement->bindValue(':fname', $firstName, PDO::PARAM_STR);
		$statement->bindValue(':lname', $lastName, PDO::PARAM_STR);
		$statement->bindValue(':phone', $phone, PDO::PARAM_INT);
		$statement->bindValue(':userName', $userName, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();
		
		$newUserId = $db->lastInsertId("cs313.users_id_seq");
		
		return $newUserId;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>function create_user in yogaUser.php had an Error: $error_message </p>";
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
		<script src="personal.js"></script>
		<title>Yoga User - Raby</title>
	</head>
	<body id="assignments">
		<div class="container">
			<h1 class="page-header">Aubrey Raby - CS313 Project 1</h1>
			<?php include_once('phpHeader.php');?>
			<h2>Yoga User Interface</h2>
			
			
			<div class="jsDivs" id="firstDiv">
				
				<?php echo (isset($message) ? "<div class='alert alert-success'>$message</div>" : ""); ?>
				
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
