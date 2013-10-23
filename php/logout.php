<?PHP
   ob_start("ob_gzhandler");//to modify the header location
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['status']);
?>

	<html>
	<head>
	<title>Basic Logout Script</title>


	</head>
	<body>
<?php 
header ("Location: ../index.php");
//include"home.php";
?>

	</body>
	</html>
