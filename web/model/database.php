<?php
   
    
    // heroku database
	
	try
{
  $user = 'uqtjkllofjjisk';
  $password = 'e95f52bcb5f0d3e3da0d2242d8c7bcb51294359daf63a39a7e49ba9246b24de5';
  $db = new PDO('pgsql:host=ec2-174-129-37-15.compute-1.amazonaws.com;dbname=d2j2vabtgtrflq', $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  //echo '<p>You are connected.</p>';
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>

