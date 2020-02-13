<!DOCTYPE html>
<?php
$name = $_SESSION['SESS_NAME'];

	if(isset($_SESSION['message'])):
				$sec = "5";
				header("Refresh: $sec");
 endif ?>

<html>
<head>
	<meta name="SYSTEM" content="POS WITH INVENTORY MANAGEMENT">
	<meta name="USED" content="HTML,CSS,XAMPP,PHP,JAVASCRIPT,BOOTSTRAP">
	<meta name="APPLICATION USED" content="NOTEPAD++, BRACKETS, ATOM">
	<meta name="INSTRUCTOR" content="MR. KENNY ROBERTSON TAN">
	<meta name="AUTHOR" content="KENNETH PAUL JUNIO - OB">
	<title>WELCOME: <?php echo $name;?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/jquery.easypiechart.js"></script>
</head>
  </html>
