<?php
	// Author: 			Chadd Williams
  // File: 				skeleton.php
  // Date:				March 18, 2013
  // Class:				CS 445	
  // Project: 		In Class PDO Examples
  // Description: skeleton file for PHP/HTML mix

 	require_once('basicErrorHandling.php');
	require_once ('connDB.php');
	
	session_start();

	 $dbh = db_connect();
?>

<html>

	<head>
		<title>Search CLasses</title>
	</head>

	<body>

	</body>

</html>

<?php
	db_close($dbh);
?>